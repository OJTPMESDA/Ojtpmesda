<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index()
	{
		$this->load->view('templates/header');
		$this->load->view('pages/admin_settings');
		$this->load->view('templates/footer');
	}

	public function confirm_resume($id)
	{
		$this->Students_model->_updateData(['studentID' => $id],['resume_status' => 1]);
		redirect(base_url('Students/students_requirements/'.$id));
	}

	public function confirm_clearance($id)
	{
		$this->Students_model->_updateData(['studentID' => $id],['clearance_status' => 1]);
		redirect(base_url('Students/students_requirements/'.$id));
	}

	public function confirm_waiver($id)
	{
		$this->Students_model->_updateData(['studentID' => $id],['waiver_status' => 1]);
		redirect(base_url('Students/students_requirements/'.$id));
	}

	public function confirm_registration($id)
	{
		$this->Students_model->_updateData(['studentID' => $id],['registration_status' => 1]);
		redirect(base_url('Students/students_requirements/'.$id));
	}

	public function confirm_consent($id)
	{
		$this->Students_model->_updateData(['studentID' => $id],['consent_status' => 1]);
		redirect(base_url('Students/students_requirements/'.$id));
	}

	public function confirm_good_moral($id)
	{
		$this->Students_model->_updateData(['studentID' => $id],['good_moral_status' => 1]);
		redirect(base_url('Students/students_requirements/'.$id));
	}

	public function decline_resume($id)
	{
		$this->Students_model->_updateData(['studentID' => $id],['resume_status' => 0, 'resume' => null]);
		redirect(base_url('Students/students_requirements/'.$id));
	}

	public function decline_clearance($id)
	{
		$this->Students_model->_updateData(['studentID' => $id],['clearance_status' => 0, 'clearance' => null]);
		redirect(base_url('Students/students_requirements/'.$id));
	}

	public function decline_waiver($id)
	{
		$this->Students_model->_updateData(['studentID' => $id],['waiver_status' => 0, 'waiver' => null]);
		redirect(base_url('Students/students_requirements/'.$id));
	}

	public function decline_registration($id)
	{
		$this->Students_model->_updateData(['studentID' => $id],['registration_status' => 0, 'registration_form' => null]);
		redirect(base_url('Students/students_requirements/'.$id));
	}

	public function decline_consent($id)
	{
		$this->Students_model->_updateData(['studentID' => $id],['consent_status' => 0, 'parents_consent' => null]);
		redirect(base_url('Students/students_requirements/'.$id));
	}

	public function decline_good_moral($id)
	{
		$this->Students_model->_updateData(['studentID' => $id],['good_moral_status' => 0, 'good_moral' => null]);
		redirect(base_url('Students/students_requirements/'.$id));
	}

}