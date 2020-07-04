<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Partners extends MY_Controller {

	function __construct() {
        parent::__construct();
        if(!$this->session->logged_in) redirect(base_url('login'));
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
}

?>