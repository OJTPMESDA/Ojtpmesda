<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

    public $includesPath;
    public $folderPath = 'student/pages/';
    public $globalTemplate = 'global-templates/templates';
    public $globalPage = 'global-templates/pages/';
    public $globalincludes = 'global-templates/includes/';

	public function __construct()
    {	
        parent::__construct();

        $this->includesPath = strtolower(APP).'/includes/';
        $this->folderPath = strtolower(APP).'/pages/';
    }

    protected function _availability()
    {
        $email = $this->input->post('email');

        if ($this->Students_model->check_email($email)) {
            echo '<label class="text-danger">Username Already Taken</label>';
        }
        else{
             echo '<label class="text-success">Username Available</label>';
        }
    }

    protected function _ratings($id)
    {
        $results = $this->Students_rating_model->list_all(['studentID' => $id]);

        $rate = [];
        $rate1 = [];
        $rate2 = [];
        foreach ($results as $k) {
            array_push($rate, [
                $k->rating_1,
                $k->rating_2,
                $k->rating_3
            ]);
            array_push($rate1, [
                $k->rating_4,
                $k->rating_5,
                $k->rating_6
            ]);
            array_push($rate2, [
                $k->rating_7,
                $k->rating_8,
                $k->rating_9,
                $k->rating_10,
                $k->rating_11,
                $k->rating_12
            ]);
        }

        $quality = array_sum(end($rate));
        $knowledge = array_sum(end($rate1));
        $personality = array_sum(end($rate2));

        $output = json_encode(['Quality' => $quality, 'Knowledge' => $knowledge, 'Personality' => $personality]);

        echo $output;
    }

    protected function _attendance($id)
    {
        $results = $this->Students_dtr_model->list_all(['studentID' => $id]);

        $rate = [];
        $rate1 = [];
        foreach ($results as $k) {

            if ($k->DTR_HOURS == 0) {
                array_push($rate, $k->DTR_HOURS);
            } else {
                array_push($rate1, $k->DTR_HOURS);
            }
        }

        $attendance = count($rate1);
        $absent = count($rate);

        $output = json_encode(['Attendance' => $attendance, 'Absent' => $absent]);

        echo $output;
    }

    protected function _forumIndex()
    {
        if ($this->session->role == 1) {
            $join = [
                    ['admin','ADMIN_ID = POST_BY_ADMIN','LEFT'],
                    ['partners','PARTNERS_ID = POST_BY_COMPANY','LEFT'],
                    ['company','partners.COMPANY = CID','LEFT'],
                    ['students','USERID = POST_BY_STUDENT','LEFT']
                ];

            $param = [
                'select' => 'forum.*, admin.USERNAME AS admin, PHOTO, students.FULL_NAME AS student, students.USER_PHOTO AS sphoto, partners.FULL_NAME AS partners, COMPANY_NAME, LOGO'
            ];

            $results = $this->Forum_model->list_all(['POST_STATUS' => 1], null, null, 'POST_AT DESC', $join, $param);
        } else {
            $results = $this->Forum_model->_union();
        }

        $data = [
            'content'   => $this->globalPage.'forum',
            'navbar'    => $this->includesPath.'nav-bar',
            'title'     => 'Confirm list - MinSCAT OJTPMESDA',
            'copyright' => true,
            'results'   => $results
        ];
        $this->load->view($this->globalTemplate, $data);
    }

    public function _forumPostRequest()
    {
        $join = [
                    ['admin','ADMIN_ID = POST_BY_ADMIN','LEFT'],
                    ['company','CID = POST_BY_COMPANY','LEFT'],
                    ['students','USERID = CID','LEFT'],
                    ['partners','COMPANY = CID','LEFT']
                ];

        $param = [
            'select' => 'forum.*, admin.USERNAME AS admin, PHOTO, students.FULL_NAME AS student, students.USER_PHOTO AS sphoto, partners.FULL_NAME AS partners, COMPANY_NAME, LOGO'
        ];

        $rows = $this->Forum_model->list_all(['POST_STATUS' => 0], null, null, null, $join, $param);

        $data = [
            'content'   => $this->folderPath.'forum-post-request-list',
            'navbar'    => $this->includesPath.'nav-bar',
            'title'     => 'Home - MinSCAT OJTPMESDA',
            'copyright' => true,
            'results'   => $rows
        ];
        $this->load->view($this->globalTemplate, $data);
    }

    protected function _forumPost()
    {
        $dir = $this->_mkdir('assets/forums');
        $img = $this->_uploadFiles($dir, 'gif|jpg|png');

        $save = [
            'POST_TITLE' => $this->input->post('post_title'),
            'POST_DESC' => $this->input->post('post_content'),
            'POST_BY_ADMIN' => 0,
            'POST_BY_STUDENT' => 0,
            'POST_BY_COMPANY' => 0,
            'POST_STATUS' => 0,
            'IMAGE' => $img
        ];

        if ($this->session->role == 1) {
            $save['POST_BY_ADMIN'] = $this->session->uid;
            $save['POST_STATUS'] = 1;
            unset($save['POST_BY_COMPANY']);
            unset($save['POST_BY_STUDENT']);
        }

        if ($this->session->role == 2) {
            $save['POST_BY_COMPANY'] = $this->session->uid;
            unset($save['POST_BY_ADMIN']);
            unset($save['POST_BY_STUDENT']);
        }

        if ($this->session->role == 3) {
            $save['POST_BY_STUDENT'] = $this->session->uid;
            unset($save['POST_BY_COMPANY']);
            unset($save['POST_BY_STUDENT']);
        }

        $return = $this->Forum_model->create($save);

        if ($return) {
            redirect('forums');
        }
    }

    /**
     * Upload files, accept file extension pdf, jpg, png, jpeg, gif
     * @param string $dir 
     * @return string (fullpath with image) 
     */
    protected function _uploadFiles($dir, $allowed = 'pdf|jpg|png|jpeg|gif')
    {
    	$config['upload_path']      = $dir;
        $config['allowed_types']    = $allowed;
        $config['overwrite'] 		= true;
        $config['max_size']         =   0;

        $this->upload->initialize($config);

        if (!$this->upload->do_upload('userfile')) {
            $error = array('error' => $this->upload->display_errors());
            $post_image = null;
        } else {
            $data = array('upload_data' => $this->upload->data());
            $post_image = $dir.'/'.$_FILES['userfile']['name']; 
        }

        return $post_image;
    }

    /**
     * create directory with permission 755
     * 0 – no permission
     * 1 – execute
     * 2 – write
     * 3 – write and execute
     * 4 – read
     * 5 – read and execute
     * 6 – read and write
     * 7 – read, write, and execute
     * @return string $dir
     */
    protected function _mkdir($dir)
    {
    	if (!empty($dir)) {
    		if(!is_dir($dir)) {
	            mkdir($dir, 0755, TRUE);
	        }

	        return $dir;
    	}
    }

    /**
     * Password hashing
     * @link https://www.php.net/manual/en/function.password-hash.php
     * @param string $email
     * @return bool
     */
	public function _password_hash($password) {

		$options = ['cost' => 12];

		$hash = password_hash($password, PASSWORD_BCRYPT, $options);

		return $hash;

	}

    /**
     * Password Verify
     * @link https://www.php.net/manual/en/function.password-verify.php
     * @param string $password
     * @param string $hash
     * @return bool
     */
	public function _password_verify($password,$hash) {

		$verified = password_verify($password, $hash);

		return $verified;

	}

    /**
     * use for ajax response
     * @param bool $success
     * @param string $text
     * @param array $params
     * @return json
     */
    public function response($success, $text = null, $params = [])
    {   

        if (is_bool($success)) {

            $response['status'] = $success;

            if ($text) {
                $response['text'] = $text;
            }
    
            if (!empty($params)) {
                foreach($params as $key => $val) {
                    $response[$key] = $val;
                }
            }
        } else {
            $response = $success;
        }

        echo json_encode($response);
        exit;
    }

    /**
     * Login validation
     * @return void
     */
    protected function _login()
    {
        if (!$this->input->is_ajax_request()) {
            exit('Direct access not allowed');
        }

        $validation = validation([
            ['username', '<strong>Username</strong>', 'xss_clean|required|trim', '#username'],
            ['password', '<strong>Password</strong>', 'xss_clean|required|trim', '#password']
        ]);

        if ($validation) {
            $this->response(false, $validation);
        }
    }

    /**
     * Session Destroy
     * @return void
     */
    protected function _logout()
    {
        $this->session->sess_destroy();
        redirect(base_url('login'));
    }

    protected function _change_password()
    {
        if (!$this->input->is_ajax_request()) {
            exit('Direct access not allowed');
        }

        $validation = validation([
            ['password', '<strong>Password</strong>', 'xss_clean|required|trim', '#password'],
            ['confirm_password', '<strong>Confirm Password</strong>', 'xss_clean|required|trim|matches[password]', '#confirm_password']
        ]);

        if ($validation) {
            $this->response(false, $validation);
        }
    }

    public function _getDTR($id)
    {
        $output = [];

        $results = $this->Students_dtr_model->list_all(['STUDENTID' => $id, 'DTR_STATUS' => 0]);

        if (!empty($results)) {
            foreach ($results as $k) {
                array_push($output, [
                    'title' => 'DTR '.$k->DTR_HOURS.' hours',
                    'start' => $k->DTR_DATE,
                    'end'   => $k->DTR_DATE
                ]);
            }
        }

        echo json_encode($output);
    }
}