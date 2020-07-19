<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

	function __construct() {
        parent::__construct();
    	if(!$this->session->logged_in) redirect(base_url('login'));
    }

	public function index()
	{

        $param = [
            'select' => 'USERID, FULL_NAME, CONTACT_NO, ADDRESS, WORK_HOURS, USER_PHOTO'
        ];

        $pending = $this->Students_model->list_all(['STUDENT_STATUS' => 0, 'COMPANY_ID' => 0], null, null, null, null, $param);
        $confirm = $this->Students_model->list_all(['STUDENT_STATUS' => 1, 'COMPANY_ID !=' => 0], null, null, null, null, $param);

		$data = [
			'content' 	=> $this->globalPage.'homepage',
			'navbar' 	=> $this->includesPath.'nav-bar',
			'title'		=> 'Home - MinSCAT OJTPMESDA',
			'copyright'	=> true,
			'pending'	=> count($pending),
            'confirm'   => count($confirm)
		];
		$this->load->view($this->globalTemplate, $data);
	}

    public function requirementBarGraph()
    {
        $requirements = $this->Requirements_model->list_all(['status' => 0]);

        $resume = [];
        $clearance = [];
        $waiver = [];
        $good_moral = [];
        $registration_form = [];
        $parents_consent = [];

        if (!empty($requirements)) {
            foreach ($requirements as $k) {
                if ($k->resume_status == 1) {
                    array_push($resume, $k->resume);
                }
                if ($k->clearance_status == 1) {
                    array_push($clearance, $k->clearance);
                }
                if ($k->waiver_status == 1) {
                    array_push($waiver, $k->waiver);
                }
                if ($k->good_moral_status == 1) {
                    array_push($good_moral, $k->good_moral);
                }
                if ($k->registration_status == 1) {
                    array_push($registration_form, $k->registration_form);
                }
                if ($k->consent_status == 1) {
                    array_push($parents_consent, $k->parents_consent);
                }
            }
        }

        $output = [
            'label' => ['Resume','Clearance','Waiver','Good Moral','Registration Form','Parents Consent'],
            'Requirements' => [count($resume),count($clearance),count($waiver),count($good_moral),count($registration_form),count($parents_consent)]
        ];

        echo json_encode($output);
    }

	public function confirm_list()
    {
        $join = [
            ['company', 'CID = COMPANY_ID','INNER'],
            ['school_list', 'school_list.SCHOOL_ID = students.SCHOOL_ID','INNER']
        ];

        $rows = $this->Students_model->list_all(null, null, null, null, $join, null);
        
        $data = [
            'content'   => $this->globalPage.'confirm-list',
            'navbar'    => $this->includesPath.'nav-bar',
            'title'     => 'Confirm list - MinSCAT OJTPMESDA',
            'copyright' => true,
            'results'   => $rows
        ];
        $this->load->view($this->globalTemplate, $data);
    }

	public function profile()
	{
		$data = [
    		'content' 	=> $this->folderPath.'profile',
    		'navbar' 	=> $this->includesPath.'nav-bar',
    		'title'		=> 'Profile - MinSCAT OJTPMESDA',
    		'copyright'	=> true,
    		'row'	=> $this->Admin_model->get(['ADMIN_ID' => $this->session->uid], null, null, null)
    	];
		$this->load->view($this->globalTemplate, $data);
	}

    public function changePass()
    {
        $this->_change_password();

        $data = [
            'PASSWORD' => $this->_password_hash($this->input->post('password'))
        ];

        $return = $this->Admin_model->update(['ADMIN_ID' => $this->session->uid], $data);

        if ($return) {
            $this->response(true, null, ['action' => 'redirect', 'url' => $this->agent->referrer()]);
        }
        
    }

	public function update_profile()
	{
        $dir = $this->_mkdir('assets/images');

        $img = $this->_uploadFiles($dir);
        
        $data = [
            'PHOTO' => $img,
            'USERNAME' => $this->input->post('username'),
            'FULLNAME' => $this->input->post('fullname'),
            'ADDRESS' => $this->input->post('address'),
            'EMAIL_ADDRESS' => $this->input->post('email_address'),
            'CONTACT_NO' => $this->input->post('contact_no')
        ];

        if (empty($img)) {
            unset($data['PHOTO']);
        }

        $return = $this->Admin_model->update(['ADMIN_ID' => $this->session->uid], $data);
        if ($return) {
        	redirect('profile/');
        }
	}
}
