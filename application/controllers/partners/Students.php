<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Students extends MY_Controller {

	function __construct() {
        parent::__construct();
        if(!$this->session->logged_in) redirect(base_url('login'));
    }

    public function index()
    {
        $this->_studentConfirmList();
    }

    public function profile($id = null)
    {
        if (!empty($id)) {
            $this->_ratingResults($id);
        } else {
            show_404();
        }
    }

    public function add_dtr()
    {
        $this->_addDTR();
    }

    public function rating($id = null)
    {
        if (!empty($id)) {
            $this->_ratings($id);
        } else {
            show_404();
        }
    }

    public function dtr($id = null)
    {
        if (!empty($id)) {
            $join = [
                ['school_list', 'school_list.SCHOOL_ID = students.SCHOOL_ID','INNER'],
                ['company', 'company.CID = students.COMPANY_ID','INNER']
            ];

            $row = $this->Students_model->get(['USERID' => $id], null, $join);

            $data = [
                'content'   => $this->folderPath.'student-dtr',
                'navbar'    => $this->includesPath.'nav-bar',
                'title'     => 'Home - MinSCAT OJTPMESDA',
                'copyright' => true,
                'results'   => $row,
                'dtr'       => $this->Students_dtr_model->list_all(['STUDENTID' => $id, 'DTR_DATE' => date('Y-m-d')])
            ];
            $this->load->view($this->globalTemplate, $data);
        } else {
            show_404();
        }
    }

    public function attendance($id)
    {
        if (!empty($id)) {
            $this->_attendance($id);
        } else {
            show_404();
        }
    }

    public function getdtr($id)
    {
        if (!empty($id)) {
            $this->_getDTR($id);
        } else {
            show_404();
        }
    }

    public function ojthours($id)
    {
        if (!empty($id)) {
            $this->_ojtHours($id);
        } else {
            show_404();
        }
    }
}

?>