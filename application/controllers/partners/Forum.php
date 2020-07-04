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
}

?>