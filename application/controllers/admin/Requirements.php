<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Requirements extends MY_Controller {

	function __construct() {
        parent::__construct();
        if(!$this->session->logged_in) redirect(base_url('login'));
    }

    public function deleteAll($id)
    {
        $this->Requirements_model->update(['studentID' => $id],['status' => 1]);
        redirect('students/pending/list');
    }

    public function confirm_resume($id)
    {
        $this->session->set_flashdata('remove', 'active');
        $this->session->set_flashdata('resume-active', 'active');
        $this->Requirements_model->update(['studentID' => $id],['resume_status' => 1]);
        redirect(base_url('students/requirements/'.$id));
    }

    public function confirm_clearance($id)
    {
        $this->session->set_flashdata('remove', 'active');
        $this->session->set_flashdata('clearance-active', 'active');
        $this->Requirements_model->update(['studentID' => $id],['clearance_status' => 1]);
        redirect(base_url('students/requirements/'.$id));
    }

    public function confirm_waiver($id)
    {
        $this->session->set_flashdata('remove', 'active');
        $this->session->set_flashdata('waiver-active', 'active');
        $this->Requirements_model->update(['studentID' => $id],['waiver_status' => 1]);
        redirect(base_url('students/requirements/'.$id));
    }

    public function confirm_registration($id)
    {
        $this->session->set_flashdata('remove', 'active');
        $this->session->set_flashdata('registration-active', 'active'); 
        $this->Requirements_model->update(['studentID' => $id],['registration_status' => 1]);
        redirect(base_url('students/requirements/'.$id));
    }

    public function confirm_consent($id)
    {
        $this->session->set_flashdata('remove', 'active');
        $this->session->set_flashdata('consent-active', 'active');
        $this->Requirements_model->update(['studentID' => $id],['consent_status' => 1]);
        redirect(base_url('students/requirements/'.$id));
    }

    public function confirm_good_moral($id)
    {
        $this->session->set_flashdata('remove', 'active');
        $this->session->set_flashdata('good-moral-active', 'active');
        $this->Requirements_model->update(['studentID' => $id],['good_moral_status' => 1]);
        redirect(base_url('students/requirements/'.$id));
    }

    public function decline_resume($id)
    {
        $this->Requirements_model->update(['studentID' => $id],['resume_status' => 0, 'resume' => null]);
        redirect(base_url('students/requirements/'.$id));
    }

    public function decline_clearance($id)
    {
        $this->Requirements_model->update(['studentID' => $id],['clearance_status' => 0, 'clearance' => null]);
        redirect(base_url('students/requirements/'.$id));
    }

    public function decline_waiver($id)
    {
        $this->Requirements_model->update(['studentID' => $id],['waiver_status' => 0, 'waiver' => null]);
        redirect(base_url('students/requirements/'.$id));
    }

    public function decline_registration($id)
    {
        $this->Requirements_model->update(['studentID' => $id],['registration_status' => 0, 'registration_form' => null]);
        redirect(base_url('students/requirements/'.$id));
    }

    public function decline_consent($id)
    {
        $this->Requirements_model->update(['studentID' => $id],['consent_status' => 0, 'parents_consent' => null]);
        redirect(base_url('students/requirements/'.$id));
    }

    public function decline_good_moral($id)
    {
        $this->Requirements_model->update(['studentID' => $id],['good_moral_status' => 0, 'good_moral' => null]);
        redirect(base_url('students/requirements/'.$id));
    }
}

?>