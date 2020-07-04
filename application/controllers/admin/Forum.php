<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forum extends MY_Controller {

	function __construct() {
        parent::__construct();
        if(!$this->session->logged_in) redirect(base_url('login'));
    }

    public function index()
    {
        $this->_forumIndex();
    }

    public function post()
    {
        $this->_forumPost();
    }

    public function request()
    {
        $this->_forumPostRequest();
    }

    public function approved($id)
    {
        $return = $this->Forum_model->update(['POST_ID' => $id],['POST_STATUS' => 1]);

        if ($return) {
            redirect('forums/post/request');
        }
    }

    public function decline($id)
    {
        $return = $this->Forum_model->update(['POST_ID' => $id],['POST_STATUS' => 2]);

        if ($return) {
            redirect('forums/post/request');
        }
    }
}

?>