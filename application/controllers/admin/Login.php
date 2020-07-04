<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {

	function __construct() {
        parent::__construct();
    }

    public function index()
    {
        if($this->session->logged_in) redirect(base_url('home'));
        
    	$data = [
    		'content' 	=> $this->globalPage.'login',
    		'title'		=> 'Dashboard Login - MinSCAT OJTPMESDA',
    		'copyright'	=> false,
    	];
		$this->load->view($this->globalTemplate, $data);
    }

    public function signin()
    {

    	$this->_login(); // validation

    	$username = $this->input->post('username');
    	$password = $this->input->post('password');

    	$row = $this->Admin_model->get(['USERNAME' => $username]);

    	if (!empty($row)) {
    		if ($this->_password_verify($password,$row->PASSWORD)) {
				$sess = [
					'role' => $row->ADMIN_ROLE,
					'username' => $row->USERNAME,
					'uid' => $row->ADMIN_ID,
                    'cid' => 0,
                    'img' =>  $row->PHOTO,
					'logged_in' => TRUE
				];
				$this->session->set_userdata($sess);

				$url = base_url('home');

				$this->response(true, null, ['action' => 'redirect', 'url' => $url]);
			}
    	}

    	$this->response(false, 'Invalid <strong>Email</strong> or <strong>Password</strong>');
    }

	public function logout()
	{
		$this->_logout();
	}
}

?>