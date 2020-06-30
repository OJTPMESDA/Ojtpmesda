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
        if ( ! $this->session->userdata('login'))
        { 
            redirect(base_url().'home/login');
        }
        $data['fetch_data'] = $this->Students_model->get_students_requirements($username);
        $this->load->view('templates/header');
        $this->load->view('pages/student_requirements', $data);
        $this->load->view('templates/footer');
    }

	public function students_list()
	{
		if ( ! $this->session->userdata('login'))
        { 
            redirect(base_url().'home/login');
        }
		$data['fetch_data'] = $this->Students_model->get_student_request();
		$this->load->view('templates/header');
		$this->load->view('pages/students_request', $data);
		$this->load->view('templates/footer');
	}

	public function company_list()
	{
		if ( ! $this->session->userdata('login'))
        { 
            redirect(base_url().'home/login');
        }
		$data['fetch_data'] = $this->Students_model->get_company_request();
		$this->load->view('templates/header');
		$this->load->view('pages/company_request', $data);
		$this->load->view('templates/footer');
	}

	public function confirm_student($username)
	{
		if ( ! $this->session->userdata('login'))
        { 
            redirect(base_url().'home/login');
        }
		$this->Students_model->confirm_students($username);
		redirect('students/students_list');
	}

	public function confirm_company($id)
	{
		if ( ! $this->session->userdata('login'))
        { 
            redirect(base_url().'home/login');
        }
		$this->Students_model->confirm_company($id);
		redirect('students/company_list');
	}

	public function get_confirm_students()
	{
		if ( ! $this->session->userdata('login'))
        { 
            redirect(base_url().'home/login');
        }
		$data['fetch_data'] = $this->Students_model->get_confirm_students();
		$this->load->view('templates/header');
		$this->load->view('pages/confirm_students', $data);
		$this->load->view('templates/footer');
		
	}

	public function delete_company($id)
	{
		if ( ! $this->session->userdata('login'))
        { 
            redirect(base_url().'home/login');
        }
		$this->Students_model->delete_company($id);
		redirect('students/company_list');
	}

	public function student_profile($username)
	{
		if ( ! $this->session->userdata('login'))
        { 
            redirect(base_url().'home/login');
        }
		$data['fetch_data'] = $this->Students_model->get_students_profile($username);
		$this->load->view('templates/header');
		$this->load->view('pages/student_profile', $data);
		$this->load->view('templates/footer');
	}

	public function update_student_profile($username)
	{
		if ( ! $this->session->userdata('login'))
        { 
            redirect(base_url().'home/login');
        }
        $config['upload_path']      = './assets/images';
        $config['allowed_types']    = 'gif|jpg|png';
        $config['overwrite'] 		= true;

            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('userfile'))
            {
                $error = array('error' => $this->upload->display_errors());
                $post_image = 'no_image.png';
            }
            else
            {
                $data = array('upload_data' => $this->upload->data());
                $post_image = $_FILES['userfile']['name']; 
            }
		$this->Students_model->update_students_profile($username, $post_image);
		redirect('students/student_profile/'.$username.'');
	}

	public function delete_request($username)
	{
		if ( ! $this->session->userdata('login'))
        { 
            redirect(base_url().'home/login');
        }
		$this->Students_model->delete_student_request($username);
		redirect('students/students_list');
	}

	public function student_dtr($username)
	{
		if ( ! $this->session->userdata('login'))
        { 
            redirect(base_url().'home/login');
        }
		$data['fetch_data'] = $this->Students_model->get_students_profile($username);
		$this->load->view('templates/header');
		$this->load->view('pages/student_dtr', $data);
		$this->load->view('templates/footer');
	}

	public function student_attendance()
	{
		if ( ! $this->session->userdata('login'))
        { 
            redirect(base_url().'home/login');
        }
		$data['fetch_data'] = $this->Students_model->get_confirm_students();
		$this->load->view('templates/header');
		$this->load->view('pages/attendance', $data);
		$this->load->view('templates/footer');
	}

	public function add_hours($username)
	{
		$this->Students_model->add_hours($username);
		redirect(base_url().'students/student_dtr/'.$username.'');
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
		if ( ! $this->session->userdata('login')) { 
            redirect(base_url().'home/login');
        }

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
		if ( ! $this->session->userdata('login')) { 
            redirect(base_url().'home/login');
        }

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
		if ( ! $this->session->userdata('login'))
        { 
            redirect(base_url().'home/login');
        }
        
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
		if ( ! $this->session->userdata('login')) { 
            redirect(base_url().'home/login');
        }
        
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
		if ( ! $this->session->userdata('login'))
        { 
            redirect(base_url().'home/login');
        }
        
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
		if ( ! $this->session->userdata('login')) { 
            redirect(base_url().'home/login');
        }
        
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