<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

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
		}
		else
		{
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$role = $this->input->post('role');
			if ($role == 1) {
				if($this->Students_model->login_students($username, $password))
				{
					$session_data = array(
						'role' => $this->input->post('role'),
						'username' => $username,
						'login' => TRUE
					);
					$this->session->set_userdata($session_data);
					redirect(base_url());
				}
				elseif ($this->Students_model->verify_students($username, $password)) {
					$session_data = array(
						'role' => $this->input->post('role'),
						'username' => $username,
						'login' => TRUE
					);
					$this->session->set_userdata($session_data);
					redirect('home/account_verify/'.$this->session->userdata('username').'');
				}
				else
				{
					$this->session->set_flashdata('error', 'Invalid Username and Password');
					redirect(base_url().'home/login');
				}
			}
			elseif ($role == 2) {
				if($this->Students_model->login_company($username, $password, $role))
				{
					$session_data = array(
						'role' => $this->input->post('role'),
						'username' => $username,
						'login' => TRUE
					);
					$this->session->set_userdata($session_data);
					redirect(base_url());
				}
				elseif ($this->Students_model->verify_company($username, $password)) {
					redirect('home/account_verify');
				}
				else
				{
					$this->session->set_flashdata('error', 'Invalid Username and Password');
					redirect(base_url().'home/login');
				}
			}
			elseif ($role == 3) {
				if($this->Students_model->login_admin($username, $password, $role))
				{
					$session_data = array(
						'role' => $this->input->post('role'),
						'username' => $username,
						'login' => TRUE
					);
					$this->session->set_userdata($session_data);
					redirect(base_url());
				}
				else
				{
					$this->session->set_flashdata('error', 'Invalid Username and Password');
					redirect(base_url().'home/login');
				}
			}
			else
			{
				return false;
			}
			
		}

	}

	public function logout()
	{
		$this->session->unset_userdata(array('role', 'username', 'login'));
		redirect(base_url().'home/login');
	}
}
