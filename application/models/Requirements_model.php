<?php

class Requirements_model extends MY_Model
{
	public function __construct()
    {	
        parent::__construct();
        $this->tbl = 'requirements';
        $this->primary_key = 'id';
    }
}
?>