<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Evaluate extends MY_Controller {

	function __construct() {
        parent::__construct();
    }

    private function index($id)
    {
        
        $join = [
            ['school_list', 'school_list.SCHOOL_ID = students.SCHOOL_ID','INNER'],
            ['company', 'company.CID = students.COMPANY_ID','INNER']
        ];

        $row = $this->Students_model->get(['COMPANY_ID' => $this->session->cid], null, $join);

    	$data = [
            'content'   => $this->folderPath.'student-evaluate',
            'navbar'    => $this->includesPath.'nav-bar',
            'title'     => 'Home - MinSCAT OJTPMESDA',
            'copyright' => true,
            'results'   => $row
        ];
        $this->load->view($this->globalTemplate, $data);
    }



    public function evaluation($id)
    {
        if ($this->input->method() == 'get') {
            return $this->index($id);
        }

        if (!$this->input->is_ajax_request()) {
            exit('Direct access not allowed');
        }

        $validation = validation([
            ['ability', '<strong>Ability to perform the assigned work well</strong>', 'xss_clean|required|trim', '#ability'],
            ['accuracy', '<strong>Accuracy of work</strong>', 'xss_clean|required|trim', '#accuracy'],
            ['volume', '<strong>Volume of Work Accomplished</strong>', 'xss_clean|required|trim', '#volume'],
            ['knowledge', '<strong>Knowledge of the Basic Principle Neccessary for the Accomplishment of assigned Work</strong>', 'xss_clean|required|trim', '#knowledge'],
            ['extent', '<strong>Extent of Knowledge with regards to Department Operations</strong>', 'xss_clean|required|trim', '#extent'],
            ['follow', '<strong>Ability to follow Instructions</strong>', 'xss_clean|required|trim', '#follow'],
            ['punctuality', '<strong>Punctuality</strong>', 'xss_clean|required|trim', '#punctuality'],
            ['attendance', '<strong>Attendance</strong>', 'xss_clean|required|trim', '#attendance'],
            ['department', '<strong>Department/Behavior</strong>', 'xss_clean|required|trim', '#department'],
            ['industry', '<strong>Industry</strong>', 'xss_clean|required|trim', '#industry'],
            ['interested', '<strong>Interested and Enthusiasm in the Performance of Work</strong>', 'xss_clean|required|trim', '#interested'],
            ['orderliness', '<strong>Orderliness</strong>', 'xss_clean|required|trim', '#orderliness'],
            ['remarks', '<strong>Remarks</strong>', 'xss_clean|required|trim', '#remarks']
        ]);

        if ($validation) {
            $this->response(false, $validation);
        }

        $save = [
            'studentID' => $id,
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

        $res = $this->Students_rating_model->create($save);

        if ($res) {
            $this->response(true, null, ['action' => 'redirect', 'url' => base_url('students/confirm/list')]);
        }

        $this->response(false);
    }
}

?>