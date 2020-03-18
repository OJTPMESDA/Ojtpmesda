<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forums extends CI_Controller {

	public function index()
	{
		if ( ! $this->session->userdata('login'))
        { 
            redirect(base_url().'home/login');
        }
		$data['fetch_data'] = $this->Post_model->post();
		$this->load->view('templates/header');
		$this->load->view('pages/forums', $data);
		$this->load->view('templates/footer');
	}

	public function add_post()
	{
		if ( ! $this->session->userdata('login'))
        { 
            redirect(base_url().'home/login');
        }
		$config['upload_path']      = './assets/post_images';
        $config['allowed_types']    = 'gif|jpg|png';

            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('userfile'))
            {
                $error = array('error' => $this->upload->display_errors());
                $post_image = 'no_images.png';
            }
            else
            {
                $data = array('upload_data' => $this->upload->data());
                $post_image = $_FILES['userfile']['name']; 
            }

		if($this->session->userdata('role') == 3)
			{
			$this->db->select('*');
			$this->db->where('username', $this->session->userdata('username'));
			$tsk = $this->db->get('main_admin');
			foreach ($tsk->result() as $row) {
				$hey = $row->admin_image;
			}
			$this->Post_model->post_admin($hey, $post_image);
		}
		elseif ($this->session->userdata('role') == 2)
			{
			$this->db->select('*');
			$this->db->where('username', $this->session->userdata('username'));
			$tsk = $this->db->get('admin');
			foreach ($tsk->result() as $row) {
				$hey = $row->user_image;
			}
			$this->Post_model->post_admin($hey, $post_image);
		}
		else
		{
			$this->db->select('*');
			$this->db->where('username', $this->session->userdata('username'));
			$tsk = $this->db->get('students');
			foreach ($tsk->result() as $row) {
				$hey = $row->user_image;
				$haha = $row->company;
			}
			$this->Post_model->post_students($hey, $post_image, $haha);
		}
		redirect(base_url().'forums');
	}

	public function delete_post($id)
	{
		if ( ! $this->session->userdata('login'))
        { 
            redirect(base_url().'home/login');
        }
		$this->Post_model->delete_post($id);
		redirect(base_url().'forums');
	}

	public function post_request()
	{
		if ( ! $this->session->userdata('login'))
        { 
            redirect(base_url().'home/login');
        }
		$data['fetch_data'] = $this->Post_model->get_post_request();
		$this->load->view('templates/header');
		$this->load->view('pages/post_request', $data);
		$this->load->view('templates/footer');
	}

	public function approve_post($id)
	{
		if ( ! $this->session->userdata('login'))
        { 
            redirect(base_url().'home/login');
        }
		$this->Post_model->approve_post($id);
		redirect(base_url().'Forums/post_request');
	}
}