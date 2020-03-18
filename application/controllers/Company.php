<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Company extends CI_Controller {

	public function index()
	{
		if ( ! $this->session->userdata('login'))
        { 
            redirect(base_url().'home/login');
        }
		$data['fetch_data'] = $this->Students_model->get_evaluate();
		$this->load->view('templates/header');
		$this->load->view('pages/evaluate_student', $data);
		$this->load->view('templates/footer');
	}

	public function evaluate()
	{
		
		$this->load->view('templates/header');
		$this->load->view('pages/evaluate');
		$this->load->view('templates/footer');
	}
}