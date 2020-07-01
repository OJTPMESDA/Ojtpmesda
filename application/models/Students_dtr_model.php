<?php

class Students_dtr_model extends CI_Model
{

	private $tbl = 'students_dtr';
	private $id = 'id';


	public function __construct()
    {	
        parent::__construct();
    }

    public function _insertDTR($data)
    {
    	return $this->db->insert($this->tbl,$data);
    }

    public function _getAllData($where)
    {
        $data = [];
        
        $res = $this->db->where($where)
                        ->get($this->tbl);
        if($res->num_rows() > 0){
            $data = $res->result();
        }

        $res->free_result();
        return $data;
    }
}