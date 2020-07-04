<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends MY_Controller {

	function __construct() {
        parent::__construct();
    }

    public function index()
    {
    	$data = [
    		'content' 	=> $this->folderPath.'register',
    		'title'		=> 'Register - MinSCAT OJTPMESDA',
    		'copyright'	=> false
    	];
		$this->load->view($this->globalTemplate, $data);
    }

    public function create()
    {
        if (!$this->input->is_ajax_request()) {
            exit('Direct access not allowed');
        }

        $validation = validation([
            ['fname', '<strong>Fullname</strong>', 'xss_clean|required|trim', '#fname'],
            ['contact_no', '<strong>Contact No.</strong>', 'xss_clean|required|trim', '#contact_no'],
            ['address', '<strong>Permanent Address</strong>', 'xss_clean|required|trim', '#address'],
            ['username', '<strong>Username</strong>', 'xss_clean|required|trim', '#username'],
            ['password', '<strong>Password</strong>', 'xss_clean|required|trim', '#password'],
            ['confirm_password', '<strong>Confirm Password</strong>', 'xss_clean|required|trim|matches[password]', '#confirm_password']
        ]);

        if ($validation) {
            $this->response(false, $validation);
        }

        $save = [
            'FULL_NAME' => $this->input->post('fname'),
            'CONTACT_NO' => $this->input->post('contact_no'),
            'ADDRESS' => $this->input->post('address'),
            'USERNAME' => $this->input->post('username'),
            'PASSWORD' => $this->_password_hash($this->input->post('password'))
        ];

        $return = $this->Students_model->create($save);

        if (!empty($return)) {
            $this->response(true, null, ['action' => 'redirect', 'url' => base_url('login')]);
        }
    }
}

?>