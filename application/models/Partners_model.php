<?php

class Partners_model extends MY_Model
{
	public function __construct()
    {	
        parent::__construct();
        $this->tbl = 'partners';
        $this->primary_key = 'PARTNERS_ID';
    }
}
?>