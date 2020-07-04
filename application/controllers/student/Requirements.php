<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Requirements extends MY_Controller {

	function __construct() {
        parent::__construct();
    }

    public function resume()
    {

        $dir = $this->_mkdir('assets/pdf');

        $img = $this->_uploadFiles($dir);

        if (!empty($img)) {
            $this->Requirements_model->update(['studentID' => $this->session->uid], ['resume' => $img]);
        } else {
            $this->session->set_flashdata('resume-error', 'Invalid File');
        }
        $this->session->set_flashdata('remove', 'active');
        $this->session->set_flashdata('resume-active', 'active');
        redirect('account/verify/'.$this->session->username);
    }

    public function clearance()
    {
        $dir = $this->_mkdir('assets/pdf');

        $img = $this->_uploadFiles($dir);

        if (!empty($img)) {
            $this->Requirements_model->update(['studentID' => $this->session->uid], ['clearance' => $img]);
        } else {
            $this->session->set_flashdata('clearance-error', 'Invalid File');
        }
        $this->session->set_flashdata('remove', 'active');
        $this->session->set_flashdata('clearance-active', 'active');
        redirect('account/verify/'.$this->session->username);
    }

    public function waiver()
    {
        $dir = $this->_mkdir('assets/pdf');

        $img = $this->_uploadFiles($dir);

        if (!empty($img)) {
            $this->Requirements_model->update(['studentID' => $this->session->uid], ['waiver' => $img]);
        } else {
            $this->session->set_flashdata('waiver-error', 'Invalid File');
        }
        $this->session->set_flashdata('remove', 'active');
        $this->session->set_flashdata('waiver-active', 'active');
        redirect('account/verify/'.$this->session->username);
    }

    public function good_moral()
    {
        
        $dir = $this->_mkdir('assets/pdf');

        $img = $this->_uploadFiles($dir);

        if (!empty($img)) {
            $this->Requirements_model->update(['studentID' => $this->session->uid], ['good_moral' => $img]);
        } else {
            $this->session->set_flashdata('good-moral-error', 'Invalid File');
        }
        $this->session->set_flashdata('remove', 'active');
        $this->session->set_flashdata('good-moral-active', 'active');
        redirect('account/verify/'.$this->session->username);
    }

    public function registration_form()
    {
        $dir = $this->_mkdir('assets/pdf');

        $img = $this->_uploadFiles($dir);

        if (!empty($img)) {
            $this->Requirements_model->update(['studentID' => $this->session->uid], ['registration_form' => $img]);
        } else {
            $this->session->set_flashdata('registration-error', 'Invalid File');
        }
        $this->session->set_flashdata('remove', 'active');
        $this->session->set_flashdata('registration-active', 'active');
        redirect('account/verify/'.$this->session->username);
    }

    public function consent()
    {
        $dir = $this->_mkdir('assets/pdf');

        $img = $this->_uploadFiles($dir);

        if (!empty($img)) {
            $this->Requirements_model->update(['studentID' => $this->session->uid], ['parents_consent' => $img]);
        } else {
            $this->session->set_flashdata('consent-error', 'Invalid File');
        }
        $this->session->set_flashdata('remove', 'active');
        $this->session->set_flashdata('consent-active', 'active');
        redirect('account/verify/'.$this->session->username);
    }
}

?>