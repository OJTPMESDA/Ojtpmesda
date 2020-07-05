<?php

class School_list_model extends MY_Model
{
	public function __construct()
    {	
        parent::__construct();
        $this->tbl = 'school_list';
        $this->primary_key = 'SCHOOL_ID';
    }
}
?>