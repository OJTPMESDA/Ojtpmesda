<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {

	function __construct() {
        parent::__construct();
    }

    public function index()
    {
        if($this->session->logged_in) redirect(base_url('forums'));
        
    	$data = [
    		'content' 	=> $this->globalPage.'login',
    		'title'		=> 'Partners Login - MinSCAT OJTPMESDA',
    		'copyright'	=> false
    	];
		$this->load->view($this->globalTemplate, $data);
    }

    public function signin()
    {

    	$this->_login(); // validation

    	$username = $this->input->post('username');
    	$password = $this->input->post('password');

    	$row = $this->Partners_model->get(['USERNAME' => $username, 'PARTNERS_STATUS !=' => 3]);

    	if (!empty($row)) {
            if ($row->PARTNERS_STATUS == 2) {
                if ($this->_password_verify($password,$row->PASSWORD)) {
                    $sess = [
                        'role' => $row->ROLE,
                        'username' => $row->USERNAME,
                        'uid' => $row->PARTNERS_ID,
                        'cid' => $row->COMPANY,
                        'img' =>  $row->USER_PHOTO,
                        'logged_in' => TRUE
                    ];
                    $this->session->set_userdata($sess);

                    $url = base_url('forums');

                    $this->response(true, null, ['action' => 'redirect', 'url' => $url]);
                }
            }

            $this->response(false, 'Your acct has been suspended');
    	}

    	$this->response(false, 'Invalid <strong>Email</strong> or <strong>Password</strong>');
    }

	public function logout()
	{
		$this->_logout();
	}
}

?>