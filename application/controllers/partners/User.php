<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller {

    function __construct() {
        parent::__construct();
        if(!$this->session->logged_in) redirect(base_url('login'));
    }

    public function index()
    {
        $rows = $this->Partners_model->list_all(['COMPANY' => $this->session->cid, 'PARTNERS_ID != ' => $this->session->uid]);

        $data = [
            'content'   => $this->folderPath.'user-list',
            'navbar'    => $this->includesPath.'nav-bar',
            'title'     => 'User list - MinSCAT OJTPMESDA',
            'copyright' => true,
            'results'   => $rows
        ];
        $this->load->view($this->globalTemplate, $data);
    }

    public function add()
    {
        if (!$this->input->is_ajax_request()) {
            exit('Direct access not allowed');
        }

        $validation = validation([
            ['fname', '<strong>Contact No.</strong>', 'xss_clean|required|trim', '#fname'],
            ['email', '<strong>Permanent Address</strong>', 'xss_clean|required|trim', '#email'],
            ['username', '<strong>Username</strong>', 'xss_clean|required|trim|is_unique[partners.USERNAME]', '#username'],
            ['password', '<strong>Password</strong>', 'xss_clean|required|trim', '#password'],
            ['confirm_password', '<strong>Confirm Password</strong>', 'xss_clean|required|trim|matches[password]', '#confirm_password']
        ]);

        if ($validation) {
            $this->response(false, $validation);
        }

        $save = [
            'FULL_NAME' => $this->input->post('fname'),
            'CONTACT_NO' => $this->input->post('contact_no'),
            'EMAIL_ADDRESS' => $this->input->post('email'),
            'ADDRESS' => $this->input->post('address'),
            'USERNAME' => $this->input->post('username'),
            'COMPANY'   =>  $this->session->cid,
            'COMPANY'   =>  $this->session->cid,
            'PASSWORD' => $this->_password_hash($this->input->post('password')),
            'ROLE'  =>  $this->session->role
        ];

        $return = $this->Partners_model->create($save);

        if (!empty($return)) {
            $this->response(true, null, ['action' => 'redirect', 'url' => base_url('user/list')]);
        }
    }

    public function suspended($id)
    {
        if (!empty($id)) {
            $return = $this->Partners_model->update(['PARTNERS_ID' => $id],['PARTNERS_STATUS' => 2]);

            if ($return) {
                redirect('user/list');
            }
        } else {
            show_404();
        }
    }

    public function remove($id)
    {
        if (!empty($id)) {
            $return = $this->Partners_model->update(['PARTNERS_ID' => $id],['PARTNERS_STATUS' => 3]);

            if ($return) {
                redirect('user/list');
            }
        } else {
            show_404();
        }
    }

    public function activate($id)
    {
        if (!empty($id)) {
            $return = $this->Partners_model->update(['PARTNERS_ID' => $id],['PARTNERS_STATUS' => 1]);

            if ($return) {
                redirect('user/list');
            }
        } else {
            show_404();
        }
    }
}

?>