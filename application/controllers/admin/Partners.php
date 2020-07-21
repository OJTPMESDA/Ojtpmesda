<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Partners extends MY_Controller {

	function __construct() {
        parent::__construct();
        if(!$this->session->logged_in) redirect(base_url('login'));
    }

    public function index()
    {
        $rows = $this->Company_model->list_all(['CSTATUS != ' => 3]);
        
        $data = [
            'content'   => $this->folderPath.'company-list',
            'navbar'    => $this->includesPath.'nav-bar',
            'title'     => 'Home - MinSCAT OJTPMESDA',
            'copyright' => true,
            'results'   => $rows
        ];
        $this->load->view($this->globalTemplate, $data);
    }

    public function approved($id)
    {
        $return = $this->Company_model->update(['CID' => $id],['CSTATUS' => 1]);

        if ($return) {
            redirect('company/list');
        }
    }

    public function decline($id)
    {
        $return = $this->Company_model->update(['CID' => $id],['CSTATUS' => 3]);

        if ($return) {
            redirect('company/list');
        }
    }

    public function add()
    {
        if (!$this->input->is_ajax_request()) {
            exit('Direct access not allowed');
        }

        $validation = validation([
            ['company', '<strong>Company Name</strong>', 'xss_clean|required|trim', '#company'],
            ['acronym', '<strong>Acronym</strong>', 'xss_clean|trim', '#acronym'],
            ['address', '<strong>Address</strong>', 'xss_clean|required|trim', '#address'],
            ['contact_no', '<strong>Contact No</strong>', 'xss_clean|required|trim', '#contact_no'],
            ['contact_person', '<strong>Contact Person</strong>', 'xss_clean|required|trim', '#contact_person'],
            ['email', '<strong>Email Address</strong>', 'xss_clean|trim', '#email'],
            ['username', '<strong>Username</strong>', 'xss_clean|required|trim', '#username'],
            ['password', '<strong>Password</strong>', 'xss_clean|required|trim', '#password'],
            ['cpassword', '<strong>Confirm Password</strong>', 'xss_clean|required|trim|matches[password]', '#cpassword']
        ]);

        if ($validation) {
            $this->response(false, $validation);
        }

        $save = [
            'COMPANY_NAME' => $this->input->post('company'),
            'ACRONYM' => $this->input->post('acronym'),
            'COMPANY_ADDRESS' => $this->input->post('address'),
            'COMPANY_CONTACT_NO' => $this->input->post('contact_no'),
            'CONTACT_PERSON' => $this->input->post('contact_person')
        ];

            

        $return = $this->Company_model->create($save);

        if (!empty($return)) {
            $partners = [
                'USERNAME' => $this->input->post('username'),
                'PASSWORD' => $this->_password_hash($this->input->post('password')),
                'EMAIL_ADDRESS' => $this->input->post('email'),
                'COMPANY' => $return->CID
            ];

            $this->Partners_model->create($partners);
            
            $this->response(true, null, ['action' => 'redirect', 'url' => base_url('company/list')]);
        }
    }
}

?>