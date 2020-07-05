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
    		'title'		=> 'Login - MinSCAT OJTPMESDA',
    		'copyright'	=> false
    	];
		$this->load->view($this->globalTemplate, $data);
    }

    public function signin()
    {

    	$this->_login(); // validation

    	$username = $this->input->post('username');
    	$password = $this->input->post('password');

    	$row = $this->Students_model->get(['USERNAME' => $username]);

    	if (!empty($row)) {
    		if ($this->_password_verify($password,$row->PASSWORD)) {
				$sess = [
					'role' => $row->ROLE,
					'username' => $row->USERNAME,
					'uid' => $row->USERID,
                    'cid' => $row->COMPANY_ID,
					'logged_in' => TRUE
				];
				$this->session->set_userdata($sess);

				if ($row->STUDENT_STATUS != 0) {
					$url = base_url('forums');
				} elseif ($row->STUDENT_STATUS == 0) {
					$url = base_url('account/verify/'.$username);
				}

				$this->response(true, null, ['action' => 'redirect', 'url' => $url]);
			}
    	}

    	$this->response(false, 'Invalid <strong>Email</strong> or <strong>Password</strong>');
    }

    public function usernameAvailability()
    {
        $this->_availability();
    }

	public function logout()
	{
		$this->_logout();
	}
}

?>