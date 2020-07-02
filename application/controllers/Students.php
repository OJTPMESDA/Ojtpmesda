<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Students extends MY_Controller {

    function __construct() {
        parent::__construct();
        // check if already loggedin
        if(!$this->session->logged_in) redirect(base_url());
    }

    public function students_requirements($id)
    {
        
        $data['fetch_data'] = $this->Students_model->_getRequirements(['students.id' => $id]);
        $this->load->view('templates/header');
        $this->load->view('pages/student_requirements', $data);
        $this->load->view('templates/footer');
    }

	public function students_list()
	{

		$data['fetch_data'] = $this->Students_model->get_student_request();
		$this->load->view('templates/header');
		$this->load->view('pages/students_request', $data);
		$this->load->view('templates/footer');
	}

	public function company_list()
	{

		$data['fetch_data'] = $this->Students_model->get_company_request();
		$this->load->view('templates/header');
		$this->load->view('pages/company_request', $data);
		$this->load->view('templates/footer');
	}

	public function confirm_student($id)
	{
		$this->Students_model->_updateStudent(['id' => $id]);
		redirect('students/students_list');
	}

	public function confirm_company($id)
	{

		$this->Students_model->confirm_company($id);
		redirect('students/company_list');
	}

	public function get_confirm_students()
	{
        $join = [
            ['admin', 'admin.id = students.company','INNER']
        ];

        $data['results'] = $this->Students_model->_getAllStudentData(null, null, $join, null);

		$this->load->view('templates/header');
		$this->load->view('pages/confirm_students', $data);
		$this->load->view('templates/footer');
		
	}

	public function delete_company($id)
	{

		$this->Students_model->delete_company($id);
		redirect('students/company_list');
	}

	public function student_profile($id)
	{
        $this->load->model('Students_dtr_model');
        $this->load->model('Students_rating_model');
		$data['fetch_data'] = $this->Students_model->_getData(['id' => $id]);
        $data['dtr'] = $this->Students_dtr_model->_getAllData(['studentID' => $id]);
        $data['ratings'] = $this->Students_rating_model->_getAllData(['studentID' => $id]);
		$this->load->view('templates/header');
		$this->load->view('pages/student_profile', $data);
		$this->load->view('templates/footer');
	}

	public function update_student_profile($id)
	{
        $dir = $this->_mkdir('assets/images');

        $img = $this->_uploadFiles($dir);

        if($this->input->post('gender') == 1) {
            $gender = "Male";
        } else {
            $gender = "Female";
        }
        $data = [
            'user_image' => $img,
            'age' => $this->input->post('age'),
            'gender' => $gender,
            'address' => $this->input->post('address'),
            'email_address' => $this->input->post('email_address'),
            'contact_no' => $this->input->post('contact_no'),
            'parents' => $this->input->post('parents'),
            'parents_contact_no' => $this->input->post('parents_contact_no')
        ];

        if (empty($img)) {
            unset($data['user_image']);
        }

        $this->Students_model->_updateStudent(['id' => $id], $data);
		redirect(base_url('profile/'.$id));
	}

	public function delete_request($id)
	{
		$this->Students_model->_updateData(['studentID' => $id], ['status' => 1]);
		redirect('students/students_list');
	}

	public function student_dtr($id)
	{
		$data['fetch_data'] = $this->Students_model->_getData(['id' => $id]);
		$this->load->view('templates/header');
		$this->load->view('pages/student_dtr', $data);
		$this->load->view('templates/footer');
	}

	public function student_attendance()
	{
		$data['fetch_data'] = $this->Students_model->get_confirm_students();
		$this->load->view('templates/header');
		$this->load->view('pages/attendance', $data);
		$this->load->view('templates/footer');
	}

	public function add_hours($id)
	{
        if (ctype_digit($id)) {
            $save = [
                'check_by' => $this->session->uid,
                'studentID' => $id,
                'ojt_date' => date('Y-m-d'),
                'ojt_hours' => $this->input->post('ojt_hours')
            ];
            $this->Students_model->_insertDTR($save);
            redirect(base_url('student/dtr/'.$id));
        }

        show_error('Invalid request');
	}

	public function confirm_requirements($username)
	{
		$this->Students_model->confirm_requirements($username);
		redirect(base_url().'students/students_list');
	}

	public function upload_resume($username)
	{

        $dir = $this->_mkdir('assets/pdf');

        $img = $this->_uploadFiles($dir);

        if (!empty($img)) {
            $this->Students_model->_updateData(['studentID' => $this->session->uid], ['resume' => $img]);
        } else {
            $this->session->set_flashdata('resume-error', 'Invalid File');
        }
        $this->session->set_flashdata('remove', 'active');
        $this->session->set_flashdata('resume-active', 'active');
        redirect(base_url().'home/account_verify/'.$username);
	}

	public function upload_clearance($username)
	{
        $dir = $this->_mkdir('assets/pdf');

        $img = $this->_uploadFiles($dir);

        if (!empty($img)) {
            $this->Students_model->_updateData(['studentID' => $this->session->uid], ['clearance' => $img]);
        } else {
            $this->session->set_flashdata('clearance-error', 'Invalid File');
        }
        $this->session->set_flashdata('remove', 'active');
        $this->session->set_flashdata('clearance-active', 'active');
        redirect(base_url().'home/account_verify/'.$username);
	}

	public function upload_waiver($username)
	{
        $dir = $this->_mkdir('assets/pdf');

        $img = $this->_uploadFiles($dir);

        if (!empty($img)) {
            $this->Students_model->_updateData(['studentID' => $this->session->uid], ['waiver' => $img]);
        } else {
            $this->session->set_flashdata('waiver-error', 'Invalid File');
        }
        $this->session->set_flashdata('remove', 'active');
        $this->session->set_flashdata('waiver-active', 'active');
        redirect(base_url().'home/account_verify/'.$username);
	}

	public function upload_good_moral($username)
	{
        
        $dir = $this->_mkdir('assets/pdf');

        $img = $this->_uploadFiles($dir);

        if (!empty($img)) {
            $this->Students_model->_updateData(['studentID' => $this->session->uid], ['good_moral' => $img]);
        } else {
            $this->session->set_flashdata('good-moral-error', 'Invalid File');
        }
        $this->session->set_flashdata('remove', 'active');
        $this->session->set_flashdata('good-moral-active', 'active');
        redirect(base_url().'home/account_verify/'.$username);
	}

	public function upload_registration_form($username)
	{
        $dir = $this->_mkdir('assets/pdf');

        $img = $this->_uploadFiles($dir);

        if (!empty($img)) {
            $this->Students_model->_updateData(['studentID' => $this->session->uid], ['registration_form' => $img]);
        } else {
            $this->session->set_flashdata('registration-error', 'Invalid File');
        }
        $this->session->set_flashdata('remove', 'active');
        $this->session->set_flashdata('registration-active', 'active');
        redirect(base_url().'home/account_verify/'.$username);
	}

	public function upload_consent($username)
	{
        $dir = $this->_mkdir('assets/pdf');

        $img = $this->_uploadFiles($dir);

        if (!empty($img)) {
            $this->Students_model->_updateData(['studentID' => $this->session->uid], ['parents_consent' => $img]);
        } else {
            $this->session->set_flashdata('consent-error', 'Invalid File');
        }
        $this->session->set_flashdata('remove', 'active');
        $this->session->set_flashdata('consent-active', 'active');
        redirect(base_url().'home/account_verify/'.$username);
	}
}