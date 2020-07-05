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
            ['company', '<strong>Username</strong>', 'xss_clean|required|trim', '#company'],
            ['acronym', '<strong>Password</strong>', 'xss_clean|required|trim', '#acronym'],
            ['address', '<strong>Username</strong>', 'xss_clean|required|trim', '#address'],
            ['contact_no', '<strong>Password</strong>', 'xss_clean|required|trim', '#contact_no'],
            ['contact_person', '<strong>Password</strong>', 'xss_clean|required|trim', '#contact_person']
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
            $this->response(true, null, ['action' => 'redirect', 'url' => base_url('company/list')]);
        }
    }
}

?>