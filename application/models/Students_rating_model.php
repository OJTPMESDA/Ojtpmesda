<?php

class Students_rating_model extends CI_Model
{

	private $tbl = 'students_rating';
	private $id = 'id';


	public function __construct()
    {	
        parent::__construct();
    }

    public function _insert($data)
    {
    	return $this->db->insert($this->tbl,$data);
    }
}