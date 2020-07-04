<?php

class Students_model extends MY_Model
{
	public function __construct()
    {	
        parent::__construct();
        $this->tbl = 'students';
        $this->primary_key = 'id';
    }
}
?>