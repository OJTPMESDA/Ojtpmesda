<?php

class Students_model extends MY_Model
{
	public function __construct()
    {	
        parent::__construct();
    }

	public function insertStudent($data)
	{
		$this->db->insert('students', $data);
	}

	public function _getData($where)
	{
		$data = [];

		$res = $this->db->where($where)->get('students');

		if($res->num_rows() > 0){
			$data = $res->row_array();
		}

		$res->free_result();

		return $data;
	}

	public function _getAllStudentData($where = null, $limit = null, $offset = null, $order = null, $join = null, $params = null)
	{
		$this->tbl = 'students';
        $this->id = 'id';
		return $this->list_all($where, $limit, $offset, $order, $join, $params);
	}

	public function _getSingleData($where)
	{
		$data = [];

		$res = $this->db->where($where)
						->join('admin','admin.id = students.company','INNER')
						->get('students');

		if($res->num_rows() > 0){
			$data = $res->row();
		}

		$res->free_result();

		return $data;
	}

	public function _updateStudent($where, $data)
	{
		return $this->db->where($where)->update('students', $data);
	}

	public function insertAdmin($data)
	{
		$this->db->insert('admin', $data);
	}

	function get_evaluate()
	{
		$this->db->where('status', 2);
		return $this->db->get('students');
	}

	function get_student_request()
	{
		$data = [];
		$res = $this->db->order_by('id', 'DESC')
						->where('status', 0)
						->get('students');

		if($res->num_rows() > 0){
			$data = $res->result();
		}

		$res->free_result();
		return $data;
	}

	function get_company_request()
	{
		$this->db->order_by('id', 'DESC');
		$this->db->where('status', 0);
		$data = $this->db->get('admin');
		return $data;
	}

	function confirm_company($id)
	{
		$data = array(
			'status' => 1
		);
		$this->db->where('id', $id);
		$this->db->update('admin', $data);
	}

	function delete_company($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('admin');
	}

	function confirm_students($username)
	{
		$data = $this->input->post('company');
		$config = array(
			'status' => 1,
			'company' => $data
		);
		$this->db->where('username', $username);
		$this->db->update('students', $config);
	}

	function get_confirm_students()
	{
		$data = [];
		$select = 'admin.id AS adminID, students.id as studID, students.name as studentName, students.contact_no as studentPhone, admin.company_name as cname, admin.address as cAddress, students.total_hours as hours, students.user_image as profile';
		if($this->session->userdata('role') == 2) {
			$res = $this->db->select($select)
							->where(['students.status' => 1, 'admin.id' => $this->session->uid])
							->join('admin','admin.id = students.company','LEFT')
							->order_by('total_hours', 'DESC')
							->get('students');
		} else {
			$res = $this->db->select($select)
							->where('students.status', 1)
							->join('admin','admin.id = students.company','LEFT')
							->order_by('total_hours', 'DESC')
							->get('students');
		}
		if($res->num_rows() > 0){
			$data = $res->result();
		}

		$res->free_result();

		return $data;
	}

	function login_students($where)
	{
		$data = [];

		$res = $this->db->where($where)
						->get('students');

		if($res->num_rows() > 0) {         
		    $data = $res->row();
		}
		$res->free_result();
        return $data;
	}

	function verify_company($username, $password)
	{
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		$this->db->where('status', 0);
		$query = $this->db->get('admin');
		if($query->num_rows() == 1)
			{         
			    return true;
			}
			else
			{
			    return false;
			} 
	}

	function login_company($where)
	{
		$data = [];

		$res = $this->db->where($where)
						->get('admin');

		if($res->num_rows() > 0) {         
		    $data = $res->row();
		}
		$res->free_result();
        return $data; 
	}

	function login_admin($where)
	{
		$data = [];

		$res = $this->db->where($where)
						->get('main_admin');

		if($res->num_rows() > 0) {         
		    $data = $res->row();
		}
		$res->free_result();
        return $data; 
	}

	public function _insertDTR($data)
	{
		$this->db->insert('students_dtr', $data);
	}

	function get_students_dtr($username)
	{
		$this->db->where('username', $username);
		return $this->db->get('students_dtr');
	}

	function confirm_requirements($username)
	{
		$config = array(
			'pending' => 1
		);
		$this->db->where('username', $username);
		$this->db->update('students', $config);

	}

	public function _updateData($where, $data)
	{
		return $this->db->where($where)->update('requirements', $data);
	}

	function _getRequirements($where)
	{
		$data = [];

		$res = $this->db->where($where)
						->join('requirements','students.id = requirements.studentID','LEFT')
						->get('students');

		if($res->num_rows() > 0) {         
		    $data = $res->row_array();
		}
		$res->free_result();

		return $data;
	}

	function check_email($email)
	{
		$this->db->where('username', $email);
		$query = $this->db->get('students');
		if ($query->num_rows() > 0) {
			return true;
		}
		else
		{
			return false;
		}
	}
}
?>