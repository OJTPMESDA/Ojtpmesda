<?php

class Students_rating_model extends MY_Model
{

	private $table = 'students_rating';
	private $pk = 'id';


	public function __construct()
    {	
        parent::__construct();
        $this->tbl = $this->table;
        $this->primary_key = $this->pk;
    }

    public function _insert($data)
    {
    	return $this->db->insert($this->table,$data);
    }

    public function _getAllData($where)
    {
        $data = [];
        
        $res = $this->db->where($where)
                        ->get($this->table);
        if($res->num_rows() > 0){
            $data = $res->result();
        }

        $res->free_result();
        return $data;
    }
}