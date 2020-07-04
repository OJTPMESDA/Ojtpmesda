<?php

class Company_model extends MY_Model
{
	public function __construct()
    {	
        parent::__construct();
        $this->tbl = 'company';
        $this->primary_key = 'CID';
    }
}
?>