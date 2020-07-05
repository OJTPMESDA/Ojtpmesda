<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

	function __construct() {
        parent::__construct();
    	if(!$this->session->logged_in) redirect(base_url('login'));
    }

	public function profile()
	{
        $param = [
            'select' => 'FULL_NAME AS FULLNAME, USERNAME, USER_PHOTO AS PHOTO, EMAIL_ADDRESS, CONTACT_NO, ADDRESS'
        ];
        $row = $this->Partners_model->get(['PARTNERS_ID' => $this->session->uid], null, null, $param);
		$data = [
    		'content' 	=> $this->globalPage.'profile',
    		'navbar' 	=> $this->includesPath.'nav-bar',
    		'title'		=> 'Profile - MinSCAT OJTPMESDA',
    		'copyright'	=> true,
    		'row'	=> $row
    	];
		$this->load->view($this->globalTemplate, $data);
	}

    public function changePass()
    {
        $this->_change_password();

        $data = [
            'PASSWORD' => $this->_password_hash($this->input->post('password'))
        ];

        $return = $this->Partners_model->update(['PARTNERS_ID' => $this->session->uid], $data);

        if ($return) {
            $this->response(true, null, ['action' => 'redirect', 'url' => $this->agent->referrer()]);
        }
        
    }

	public function update_profile()
	{
        $dir = $this->_mkdir('assets/images');

        $img = $this->_uploadFiles($dir);
        
        $data = [
            'USER_PHOTO' => $img,
            'USERNAME' => $this->input->post('username'),
            'FULL_NAME' => $this->input->post('fullname'),
            'ADDRESS' => $this->input->post('address'),
            'EMAIL_ADDRESS' => $this->input->post('email_address'),
            'CONTACT_NO' => $this->input->post('contact_no')
        ];

        if (empty($img)) {
            unset($data['PHOTO']);
        }

        $return = $this->Partners_model->update(['PARTNERS_ID' => $this->session->uid], $data);
        if ($return) {
        	redirect('profile');
        }
	}
}
