<?php

class Admin_model extends MY_Model
{
	public function __construct()
    {	
        parent::__construct();
        $this->tbl = 'admin';
        $this->primary_key = 'ADMIN_ID';
    }
}
?>