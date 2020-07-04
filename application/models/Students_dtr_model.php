<?php

class Students_dtr_model extends MY_Model
{

	private $table = 'students_dtr';
	private $pk = 'id';

	public function __construct()
    {	
        parent::__construct();
        $this->tbl = $this->table;
        $this->primary_key = $this->pk;
    }
}