<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

	function __construct() {
        parent::__construct();
    }

	public function index()
	{
        $data['fetch_data'] = $this->Students_model->get_confirm_students();
		$this->load->view('templates/header');
		$this->load->view('pages/home', $data);
		$this->load->view('templates/footer');
	}

	public function account_verify($username)
	{
		if ( ! $this->session->userdata('login'))
        { 
            redirect(base_url().'home/login');
        }
		$data['fetch_data'] = $this->Students_model->get_students_requirements($username);
		$this->load->view('pages/account_verify', $data);
	}

	public function login()
	{
		$this->load->view('templates/header');
		$this->load->view('pages/login');
		$this->load->view('templates/footer');
	}

	public function register()
	{
		$this->load->view('templates/header');
		$this->load->view('pages/register');
		$this->load->view('templates/footer');
	}

	public function get_login()
	{
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		if ($this->form_validation->run()== FALSE) {
			$this->load->view('templates/header');
			$this->load->view('pages/login');
			$this->load->view('templates/footer');
		} else {
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$role = $this->input->post('role');
			if ($role == 1) {
				$students = $this->Students_model->login_students(['username' => $username]);
				if(!empty($students)) {

					if ($this->_password_verify($password,$students->password)) {
						$sess = [
							'role' => $role,
							'username' => $students->username,
							'uid' => $students->id,
							'login' => TRUE
						];
						$this->session->set_userdata($sess);

						if ($students->status == 0) {
							redirect(base_url());
						} elseif ($students->status == 1) {
							redirect('home/account_verify/'.$username
								.'');
						}
					} else {
						$this->session->set_flashdata('error', 'Invalid Username and Password');
						redirect(base_url().'home/login');
					}
				}
			} elseif ($role == 2) {
				$company = $this->Students_model->login_company(['username' => $username]);
				if(!empty($company)) {

					if ($this->_password_verify($password,$company->password)) {
						$sess = [
							'role' => $role,
							'username' => $company->username,
							'uid' => $company->id,
							'login' => TRUE
						];

						$this->session->set_userdata($sess);

						if ($company->username == 1) {
							redirect(base_url());
						} else {
							show_404();
						}
						
					}
						
				} else {
					$this->session->set_flashdata('error', 'Invalid Username and Password');
					redirect(base_url().'home/login');
				}
			} elseif ($role == 3) {
				$admin = $this->Students_model->login_admin(['username' => $username]);
				if(!empty($admin)) {
					if ($this->_password_verify($password,$admin->password)) {
						$sess = [
							'role' => $role,
							'username' => $admin->username,
							'uid' => $admin->id,
							'login' => TRUE
						];

						$this->session->set_userdata($sess);

						redirect(base_url());

					} else {
						$this->session->set_flashdata('error', 'Invalid Username and Password');
						redirect(base_url().'home/login');
					}
				} else {
					$this->session->set_flashdata('error', 'Invalid Username and Password');
					redirect(base_url().'home/login');
				}
			} else {
				return false;
			}
			
		}

	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url().'home/login');
	}
}
