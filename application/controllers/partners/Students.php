<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Students extends MY_Controller {

	function __construct() {
        parent::__construct();
        if(!$this->session->logged_in) redirect(base_url('login'));
    }

    public function index()
    {

        $join = [
            ['school_list', 'school_list.SCHOOL_ID = students.SCHOOL_ID','INNER']
        ];

        $rows = $this->Students_model->list_all(['COMPANY_ID' => $this->session->cid], null, null, null, $join);
        
        $data = [
            'content'   => $this->folderPath.'confirm-list',
            'navbar'    => $this->includesPath.'nav-bar',
            'title'     => 'Home - MinSCAT OJTPMESDA',
            'copyright' => true,
            'results'   => $rows
        ];
        $this->load->view($this->globalTemplate, $data);
    }

    public function profile($id)
    {
        $join = [
            ['school_list', 'school_list.SCHOOL_ID = students.SCHOOL_ID','INNER'],
            ['company', 'company.CID = students.COMPANY_ID','INNER']
        ];

        $rateJoin = [
            ['partners', 'PARTNERS_ID = rating_by','INNER']
        ];

        $rows = $this->Students_model->get(['COMPANY_ID' => $this->session->cid], null, $join);

        $rate = $this->Students_rating_model->get(['studentID' => $id, 'rating_status' => 0], null, $rateJoin);

        if (!empty($rate)) {
            $first = array_sum([
                $rate->rating_1,
                $rate->rating_2,
                $rate->rating_3
            ]);
            $second = array_sum([
                $rate->rating_4,
                $rate->rating_5,
                $rate->rating_6
            ]);
            $third = array_sum([
                $rate->rating_7,
                $rate->rating_8,
                $rate->rating_9,
                $rate->rating_10,
                $rate->rating_11,
                $rate->rating_12
            ]);

            $rate->first = $first / 3;
            $rate->second = $second / 3;
            $rate->third = $third / 6;

            if (strlen($rate->first) > 2) {
                $rate->first = number_format($rate->first,1);
            }
            if (strlen($rate->second) > 2) {
                $rate->second = number_format($rate->second,1);
            }
            if (strlen($rate->third) > 2) {
                $rate->third = number_format($rate->third,1);
            }
        }

        $data = [
            'content'   => $this->folderPath.'student-profile',
            'navbar'    => $this->includesPath.'nav-bar',
            'title'     => 'Home - MinSCAT OJTPMESDA',
            'copyright' => true,
            'results'   => $rows,
            'rating'    => $rate,
            'dtr'       => $this->Students_dtr_model->list_all(['STUDENTID' => $id])
        ];
        $this->load->view($this->globalTemplate, $data);
    }

    public function rating($id)
    {
        $this->_ratings($id);
    }

    public function dtr($id)
    {
        $data = [
            'content'   => $this->folderPath.'student-dtr',
            'navbar'    => $this->includesPath.'nav-bar',
            'title'     => 'Home - MinSCAT OJTPMESDA',
            'copyright' => true,
        ];
        $this->load->view($this->globalTemplate, $data);
    }

    public function attendance($id)
    {
        $this->_attendance($id);
    }

    public function getdtr($id)
    {
        $this->_getDTR($id);
    }
}

?>