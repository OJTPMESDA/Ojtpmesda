<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

	function __construct() {
        parent::__construct();
    	if(!$this->session->logged_in) redirect(base_url('login'));
    }

	public function index()
	{
		if($this->session->logged_in) redirect(base_url('forums'));

		$join = [
            ['company', 'CID = COMPANY_ID','INNER']
        ];

        $param = [
            'select' => 'CID, USERID, FULL_NAME, CONTACT_NO, COMPANY_NAME, ADDRESS, WORK_HOURS, USER_PHOTO'
        ];

        $rows = $this->Students_model->list_all(['STUDENT_STATUS' => 0, 'COMPANY_ID' => 0], null, null, null, $join, $param);

		$data = [
			'content' 	=> $this->globalPage.'homepage',
			'navbar' 	=> $this->includesPath.'nav-bar',
			'title'		=> 'Home - MinSCAT OJTPMESDA',
			'copyright'	=> true,
			'results'	=> $rows
		];
		$this->load->view($this->globalTemplate, $data);
	}

	public function profile()
	{
        $join = [
            ['requirements r', 'r.studentID = USERID','LEFT'],
            ['students_rating sr', 'sr.studentID = USERID','LEFT']
        ];

        $param = [
            'select' => 'USER_PHOTO, USERID, FULL_NAME, CONTACT_NO, AGE, ADDRESS, GENDER, EMAIL_ADDRESS, GUARDIAN, GURADIAN_NO, resume, clearance, waiver, good_moral, registration_form, parents_consent, rating_by'
        ];
        
		$data = [
    		'content' 	=> $this->folderPath.'profile',
    		'navbar' 	=> $this->includesPath.'nav-bar',
    		'title'		=> 'Profile - MinSCAT OJTPMESDA',
    		'copyright'	=> true,
    		'row'	=> $this->Students_model->get(['USERID' => $this->session->uid], null, $join, $param),
    		'dtr'	=> $this->Students_dtr_model->list_all(['STUDENTID' => $this->session->uid])
    	];
		$this->load->view($this->globalTemplate, $data);
	}

	public function update_profile()
	{
        $dir = $this->_mkdir('assets/images');

        $img = $this->_uploadFiles($dir);

        if($this->input->post('gender') == 1) {
            $gender = "Male";
        } else {
            $gender = "Female";
        }
        $data = [
            'USER_PHOTO' => $img,
            'AGE' => $this->input->post('age'),
            'GENDER' => $gender,
            'ADDRESS' => $this->input->post('address'),
            'EMAIL_ADDRESS' => $this->input->post('email_address'),
            'CONTACT_NO' => $this->input->post('contact_no'),
            'GUARDIAN' => $this->input->post('parents'),
            'GURADIAN_NO' => $this->input->post('parents_contact_no')
        ];

        if (empty($img)) {
            unset($data['USER_PHOTO']);
        }

        $this->Students_model->update(['USERID' => $this->session->uid], $data);
		redirect(base_url('profile'));
	}

    public function ojt_results()
    {
        $this->_ratingResults($this->session->uid);
    }

	public function forum()
	{
		$this->_forumIndex();
	}

	public function forum_post()
	{
		$this->_forumPost();
	}

	public function account_verify()
	{

		$join = [
            ['requirements', 'studentID = USERID','LEFT']
        ];

        $params = [
            'select' => 'resume, clearance, waiver, good_moral, registration_form, parents_consent, resume_status, clearance_status, waiver_status, good_moral_status, registration_status, consent_status'
        ];

		$row = $this->Students_model->get(['USERID' => $this->session->uid], null, $join, $params);
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
			'content' 	=> $this->folderPath.'account-verify',
			'navbar' 	=> $this->includesPath.'nav-bar',
			'title'		=> 'Dashboard - MinSCAT OJTPMESDA',
			'copyright'	=> true,
			'results'	=> $row
		];
		$this->load->view($this->globalTemplate, $data);
	}
}
