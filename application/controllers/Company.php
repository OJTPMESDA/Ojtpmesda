<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Company extends MY_Controller {

	function __construct() {
        parent::__construct();

        // check if already loggedin
        if(!$this->session->logged_in) redirect(base_url());

        // check if role
        if (!in_array($this->session->role,[2,3])) redirect(base_url());
    }

	public function index()
	{
		$data['fetch_data'] = $this->Students_model->get_evaluate();
		$this->load->view('templates/header');
		$this->load->view('pages/evaluate_student', $data);
		$this->load->view('templates/footer');
	}

	public function evaluate($id)
	{
		$data['row'] = $this->Students_model->_getSingleData(['students.company' => $this->session->uid, 'students.id' => $id]);
		$this->load->view('templates/header');
		$this->load->view('pages/evaluate', $data);
		$this->load->view('templates/footer');
	}

	public function submitEvaluate($id)
	{
		if ($this->input->is_ajax_request()) {

			$this->load->model('Students_rating_model');

			$this->form_validation->set_rules('ability', 'Ability to perform the assigned work well', 'xss_clean|trim|required|numeric');
			$this->form_validation->set_rules('accuracy', 'Accuracy of work', 'xss_clean|trim|required|numeric');
			$this->form_validation->set_rules('volume', 'Volume of Work Accomplished', 'xss_clean|trim|required|numeric');
			$this->form_validation->set_rules('knowledge', 'Knowledge of the Basic Principle Neccessary for the Accomplishment of assigned Work', 'xss_clean|trim|required|numeric');
			$this->form_validation->set_rules('extent', 'Extent of Knowledge with regards to Department Operations', 'xss_clean|trim|required|numeric');
			$this->form_validation->set_rules('follow', 'Ability to follow Instructions', 'xss_clean|trim|required|numeric');
			$this->form_validation->set_rules('punctuality', 'Punctuality', 'xss_clean|trim|required|numeric');
			$this->form_validation->set_rules('attendance', 'Attendance', 'xss_clean|trim|required|numeric');
			$this->form_validation->set_rules('department', 'Department/Behavior', 'xss_clean|trim|required|numeric');
			$this->form_validation->set_rules('industry', 'Industry', 'xss_clean|trim|required|numeric');
			$this->form_validation->set_rules('interested', 'Interested and Enthusiasm in the Performance of Work', 'xss_clean|trim|required|numeric');
			$this->form_validation->set_rules('orderliness', 'Orderliness', 'xss_clean|trim|required|numeric');
			$this->form_validation->set_rules('remarks', 'Remarks', 'xss_clean|trim|required|numeric');

			if ($this->form_validation->run()) {
				$save = [
					'studentID'	=> $id,
					'rating_1' => $this->input->post('ability'),
					'rating_2' => $this->input->post('accuracy'),
					'rating_3' => $this->input->post('volume'),
					'rating_4' => $this->input->post('knowledge'),
					'rating_5' => $this->input->post('extent'),
					'rating_6' => $this->input->post('follow'),
					'rating_7' => $this->input->post('punctuality'),
					'rating_8' => $this->input->post('attendance'),
					'rating_9' => $this->input->post('department'),
					'rating_10' => $this->input->post('industry'),
					'rating_11' => $this->input->post('interested'),
					'rating_12' => $this->input->post('orderliness'),
					'remarks' => $this->input->post('remarks'),
					'rating_by' => $this->session->uid
				];

				$res = $this->Students_rating_model->_insert($save);

				if ($res) {
					$this->response(true);
				}

				$this->response(false);
			}
		}
	}
}