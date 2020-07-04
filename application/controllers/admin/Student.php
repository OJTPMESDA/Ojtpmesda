<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends MY_Controller {

	function __construct() {
        parent::__construct();
        if(!$this->session->logged_in) redirect(base_url('login'));
    }

    public function student_pending_list()
    {

        $join = [
            ['requirements', 'studentID = USERID','LEFT']
        ];

        $rows = $this->Students_model->list_all(['COMPANY_ID' => 0], null, null, null, $join);
        
        $data = [
            'content'   => $this->folderPath.'pending-student-list',
            'navbar'    => $this->includesPath.'nav-bar',
            'title'     => 'Home - MinSCAT OJTPMESDA',
            'copyright' => true,
            'results'   => $rows
        ];
        $this->load->view($this->globalTemplate, $data);
    }

    public function requirements($id)
    {

        $join = [
            ['requirements', 'studentID = USERID','LEFT']
        ];

        $row = $this->Students_model->get(['USERID' => $id], null, $join);

        $row->requirementsCount = 0;
        if (!empty($row)) {
            $row->requirementsCount = array_sum(
                    [
                        $row->resume_status,
                        $row->clearance_status,
                        $row->waiver_status,
                        $row->good_moral_status,
                        $row->registration_status,
                        $row->consent_status
                    ]
                );
        }
        
        $data = [
            'content'   => $this->folderPath.'student-requirements',
            'navbar'    => $this->includesPath.'nav-bar',
            'title'     => 'Home - MinSCAT OJTPMESDA',
            'copyright' => true,
            'results'   => $row
        ];
        $this->load->view($this->globalTemplate, $data);
    }

    public function confirm_student($id)
    {

        if (!$this->input->is_ajax_request()) {
            exit('Direct access not allowed');
        }

        $validation = validation([
            ['partners', '<strong>Company</strong>', 'xss_clean|required|trim', '#partners']
        ]);

        if ($validation) {
            $this->response(false, $validation);
        }

        $data = [
            'COMPANY_ID' => $this->input->post('partners')
        ];
        
        $return = $this->Students_model->update(['USERID' => $id], $data);

        if ($return) {
            $this->response(true, null, ['action' => 'redirect', 'url' => base_url('students/pending/list')]);
        }

        $this->response(false, 'Oops not update please contact administrator');
    }
}

?>