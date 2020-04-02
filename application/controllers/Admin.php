<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index()
	{
		$this->load->view('templates/header');
		$this->load->view('pages/admin_settings');
		$this->load->view('templates/footer');
	}

	public function confirm_resume($username)
	{
		$this->Students_model->confirm_resume($username);
		redirect(base_url('Students/students_requirements/'.$username.''));
	}

	public function confirm_clearance($username)
	{
		$this->Students_model->confirm_clearance($username);
		redirect(base_url('Students/students_requirements/'.$username.''));
	}

	public function confirm_waiver($username)
	{
		$this->Students_model->confirm_waiver($username);
		redirect(base_url('Students/students_requirements/'.$username.''));
	}

	public function confirm_registration($username)
	{
		$this->Students_model->confirm_registration($username);
		redirect(base_url('Students/students_requirements/'.$username.''));
	}

	public function confirm_consent($username)
	{
		$this->Students_model->confirm_consent($username);
		redirect(base_url('Students/students_requirements/'.$username.''));
	}

	public function confirm_good_moral($username)
	{
		$this->Students_model->confirm_good_moral($username);
		redirect(base_url('Students/students_requirements/'.$username.''));
	}

	public function decline_resume($username)
	{
		$this->Students_model->decline_resume($username);
		redirect(base_url('Students/students_requirements/'.$username.''));
	}

	public function decline_clearance($username)
	{
		$this->Students_model->decline_clearance($username);
		redirect(base_url('Students/students_requirements/'.$username.''));
	}

	public function decline_waiver($username)
	{
		$this->Students_model->decline_waiver($username);
		redirect(base_url('Students/students_requirements/'.$username.''));
	}

	public function decline_registration($username)
	{
		$this->Students_model->decline_registration($username);
		redirect(base_url('Students/students_requirements/'.$username.''));
	}

	public function decline_consent($username)
	{
		$this->Students_model->decline_consent($username);
		redirect(base_url('Students/students_requirements/'.$username.''));
	}

	public function decline_good_moral($username)
	{
		$this->Students_model->decline_good_moral($username);
		redirect(base_url('Students/students_requirements/'.$username.''));
	}

}