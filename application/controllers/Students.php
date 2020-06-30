<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Students extends MY_Controller {

    function __construct() {
        parent::__construct();
        // check if already loggedin
        if(!$this->session->logged_in) redirect(base_url());
    }

	public function add_new_data()
	{
		$this->form_validation->set_rules('name', 'Complete Name', 'trim|required');
		$this->form_validation->set_rules('email', 'Username', 'trim|required');
		$this->form_validation->set_rules('address', 'Address', 'trim|required');
		$this->form_validation->set_rules('contact_no', 'Contact No.', 'max_length[11]|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|matches[password]');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header');
			$this->load->view('pages/register');
			$this->load->view('templates/footer');
		} else {
            $hash = $this->_password_hash($this->input->post('password'));
            $email = $this->input->post('email');
            $name = $this->input->post('name');
            $contact_no = $this->input->post('contact_no');
            $address = $this->input->post('address');
                
            if($this->input->post('role') == 1) {
                $data = [
                    'name' => $name,
                    'contact_no' => $contact_no,
                    'address' => $address,
                    'username' => $email,
                    'password' => $hash
                ];
                $this->Students_model->insertStudent($data);

            } else {
                $admin = [
                    'company_name' => $name,
                    'contact_no' => $contact_no,
                    'address' => $address,
                    'username' => $email,
                    'password' => $hash
                ];
                $this->Students_model->insertAdmin($admin);

            }
			redirect('home/login');
		}
	}

    public function students_requirements($username)
    {
        
        $data['fetch_data'] = $this->Students_model->get_students_requirements($username);
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

	public function confirm_student($username)
	{

		$this->Students_model->confirm_students($username);
		redirect('students/students_list');
	}

	public function confirm_company($id)
	{

		$this->Students_model->confirm_company($id);
		redirect('students/company_list');
	}

	public function get_confirm_students()
	{

		$data['fetch_data'] = $this->Students_model->get_confirm_students();
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
		$data['fetch_data'] = $this->Students_model->_getData(['id' => $id]);
		$this->load->view('templates/header');
		$this->load->view('pages/student_profile', $data);
		$this->load->view('templates/footer');
	}

	public function update_student_profile($id)
	{
        $dir = $this->_mkdir('assets/images');

        $img = $this->_uploadFiles($dir);

        slack(json_encode($_POST), ENVIRONMENT, 'debug');

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

        if (!empty($img)) {
            $this->Students_model->_updateStudent(['id' => $id], $data);
        } else {
            $this->session->set_flashdata('error', 'Invalid File');
        }
		redirect(base_url('profile/'.$id));
	}

	public function delete_request($username)
	{
		$this->Students_model->delete_student_request($username);
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
		if ( ! $this->session->userdata('login'))
        { 
            redirect(base_url().'home/login');
        }
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

    public function check_email_availability()
    {
        $email = $this->input->post('email');

        if ($this->Students_model->check_email($email)) {
            echo '<label class="text-danger">Username Already Taken</label>';
        }
        else{
             echo '<label class="text-success">Username Available</label>';
        }
    }
}