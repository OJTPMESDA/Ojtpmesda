<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

	function __construct() {
        parent::__construct();
    	if(!$this->session->logged_in) redirect(base_url('login'));
    }

	public function index()
	{
        redirect('students/pending/list');
		$join = [
            ['company', 'CID = COMPANY_ID','INNER']
        ];

        $param = [
            'select' => 'CID, USERID, FULL_NAME, CONTACT_NO, COMPANY_NAME, ADDRESS, WORK_HOURS, USER_PHOTO'
        ];

        $rows = $this->Students_model->list_all(['STUDENT_STATUS' => 0, 'COMPANY_ID' => 0], null, null, null, $join, $param);

		$data = [
			'content' 	=> $this->globalPage.'homepage',
			'navbar' 	=> $this->includesPath.'nav-bar',
			'title'		=> 'Home - MinSCAT OJTPMESDA',
			'copyright'	=> true,
			'results'	=> $rows
		];
		$this->load->view($this->globalTemplate, $data);
	}

	public function confirm_list()
    {
        $join = [
            ['company', 'CID = COMPANY_ID','INNER'],
            ['school_list', 'school_list.SCHOOL_ID = students.SCHOOL_ID','INNER']
        ];

        $rows = $this->Students_model->list_all(null, null, null, null, $join, null);
        
        $data = [
            'content'   => $this->globalPage.'confirm-list',
            'navbar'    => $this->includesPath.'nav-bar',
            'title'     => 'Confirm list - MinSCAT OJTPMESDA',
            'copyright' => true,
            'results'   => $rows
        ];
        $this->load->view($this->globalTemplate, $data);
    }

	public function profile()
	{
		$data = [
    		'content' 	=> $this->folderPath.'profile',
    		'navbar' 	=> $this->includesPath.'nav-bar',
    		'title'		=> 'Profile - MinSCAT OJTPMESDA',
    		'copyright'	=> true,
    		'row'	=> $this->Admin_model->get(['ADMIN_ID' => $this->session->uid], null, null, null)
    	];
		$this->load->view($this->globalTemplate, $data);
	}

    public function changePass()
    {
        $this->_change_password();

        $data = [
            'PASSWORD' => $this->_password_hash($this->input->post('password'))
        ];

        $return = $this->Admin_model->update(['ADMIN_ID' => $this->session->uid], $data);

        if ($return) {
            $this->response(true, null, ['action' => 'redirect', 'url' => $this->agent->referrer()]);
        }
        
    }

	public function update_profile()
	{
        $dir = $this->_mkdir('assets/images');

        $img = $this->_uploadFiles($dir);
        
        $data = [
            'PHOTO' => $img,
            'USERNAME' => $this->input->post('username'),
            'FULLNAME' => $this->input->post('fullname'),
            'ADDRESS' => $this->input->post('address'),
            'EMAIL_ADDRESS' => $this->input->post('email_address'),
            'CONTACT_NO' => $this->input->post('contact_no')
        ];

        if (empty($img)) {
            unset($data['PHOTO']);
        }

        $return = $this->Admin_model->update(['ADMIN_ID' => $this->session->uid], $data);
        if ($return) {
        	redirect('profile/');
        }
	}
}
