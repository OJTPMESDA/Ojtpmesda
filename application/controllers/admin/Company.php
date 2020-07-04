<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Company extends MY_Controller {

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
}

?>