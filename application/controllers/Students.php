<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Students extends CI_Controller {

    function __construct() {
        parent::__construct();
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
		}
		else
		{

			$this->Students_model->add_students();
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
		if ( ! $this->session->userdata('login'))
        { 
            redirect(base_url().'home/login');
        }

        $dir = 'assets/pdf';

        if(!is_dir($dir)) {
            mkdir($dir, 0755, TRUE);
        }

        $config['upload_path']      = $dir;
        $config['allowed_types']    = 'pdf';
        $config['overwrite'] 		= true;
        $config['max_size']         =   0;

        $this->upload->initialize($config);

            if ( ! $this->upload->do_upload('userfile'))
            {
                $error = array('error' => $this->upload->display_errors());
                $post_image = 'no_pdf.png';
            }
            else
            {
                $data = array('upload_data' => $this->upload->data());
                $post_image = $_FILES['userfile']['name']; 
            }
        $this->Students_model->upload_resume($post_image, $username);
        redirect(base_url().'home/account_verify/'.$username);
	}

	public function upload_clearance($username)
	{
		if ( ! $this->session->userdata('login'))
        { 
            redirect(base_url().'home/login');
        }

        $dir = 'assets/pdf';

        if(!is_dir($dir)) {
            mkdir($dir, 0755, TRUE);
        }

        $config['upload_path']      = $dir;
        $config['allowed_types']    = 'pdf';
        $config['overwrite']        = true;
        $config['max_size']         =   0;

        $config['upload_path']      = './assets/pdf';
        $config['allowed_types']    = 'pdf';
        $config['overwrite'] 		= true;
        $config['max_size']         =   0;

            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('userfile'))
            {
                $error = array('error' => $this->upload->display_errors());
                $post_image = 'no_pdf.png';
            }
            else
            {
                $data = array('upload_data' => $this->upload->data());
                $post_image = $_FILES['userfile']['name']; 
            }
        $this->Students_model->upload_clearance($post_image, $username);
        redirect(base_url().'home/account_verify/'.$username);
	}

	public function upload_waiver($username)
	{
		if ( ! $this->session->userdata('login'))
        { 
            redirect(base_url().'home/login');
        }

        $dir = 'assets/pdf';

        if(!is_dir($dir)) {
            mkdir($dir, 0755, TRUE);
        }

        $config['upload_path']      = './assets/pdf';
        $config['allowed_types']    = 'pdf';
        $config['overwrite'] 		= true;
        $config['max_size']         =   0;

            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('userfile'))
            {
                $error = array('error' => $this->upload->display_errors());
                $post_image = 'no_pdf.png';
            }
            else
            {
                $data = array('upload_data' => $this->upload->data());
                $post_image = $_FILES['userfile']['name']; 
            }
        $this->Students_model->upload_waiver($post_image, $username);
        redirect(base_url().'home/account_verify/'.$username);
	}

	public function upload_good_moral($username)
	{
		if ( ! $this->session->userdata('login'))
        { 
            redirect(base_url().'home/login');
        }
        $config['upload_path']      = './assets/pdf';
        $config['allowed_types']    = 'pdf';
        $config['overwrite'] 		= true;
        $config['max_size']         =   0;

            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('userfile'))
            {
                $error = array('error' => $this->upload->display_errors());
                $post_image = 'no_pdf.png';
            }
            else
            {
                $data = array('upload_data' => $this->upload->data());
                $post_image = $_FILES['userfile']['name']; 
            }
        $this->Students_model->upload_good_moral($post_image, $username);
        redirect(base_url().'home/account_verify/'.$username);
	}

	public function upload_registration_form($username)
	{
		if ( ! $this->session->userdata('login'))
        { 
            redirect(base_url().'home/login');
        }
        $config['upload_path']      = './assets/pdf';
        $config['allowed_types']    = 'pdf';
        $config['overwrite'] 		= true;
        $config['max_size']         =   0;

            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('userfile'))
            {
                $error = array('error' => $this->upload->display_errors());
                $post_image = 'no_pdf.png';
            }
            else
            {
                $data = array('upload_data' => $this->upload->data());
                $post_image = $_FILES['userfile']['name']; 
            }
        $this->Students_model->upload_registration_form($post_image, $username);
        redirect(base_url().'home/account_verify/'.$username);
	}

	public function upload_consent($username)
	{
		if ( ! $this->session->userdata('login'))
        { 
            redirect(base_url().'home/login');
        }
        $config['upload_path']      = './assets/pdf';
        $config['allowed_types']    = 'pdf';
        $config['overwrite'] 		= true;
        $config['max_size']         =   0;

            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('userfile'))
            {
                $error = array('error' => $this->upload->display_errors());
                $post_image = 'no_pdf.png';
            }
            else
            {
                $data = array('upload_data' => $this->upload->data());
                $post_image = $_FILES['userfile']['name']; 
            }
        $this->Students_model->upload_consent($post_image, $username);
        redirect(base_url().'home/account_verify/'.$username);
	}

    public function check_email_availability()
    {
     
        if ($this->Students_model->check_email($_POST['email'])) {
            echo '<label class="text-danger">Username Already Taken</label>';
        }
        else{
             echo '<label class="text-success">Username Available</label>';
        }
    }
}