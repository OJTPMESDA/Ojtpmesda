<?php

class Students_model extends CI_Model
{

	private $arr = [];

	public function __construct()
    {	
        parent::__construct();
    }

	public function insertStudent($data)
	{
		$this->db->insert('students', $data);
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
		if($this->session->userdata('role') == 2)
		{
			$this->db->select('id');
			$this->db->where('username', $this->session->userdata('username'));
			$tsk = $this->db->get('admin');
			foreach ($tsk->result() as $row) {
				$hey = $row->id;
			}

			$this->db->order_by('total_hours', 'DESC');
			$this->db->where('status', 1);
			$this->db->where('company', $hey);
			$data = $this->db->get('students');
			return $data;
		}else
		{
			$this->db->order_by('total_hours', 'DESC');
			$this->db->where('status', 1);
			$data = $this->db->get('students');
			return $data;
		}
		
	}

	function _getData($where)
	{
		$data = [];

		$res = $this->db->where($where)->get('students');

		if($res->num_rows() > 0){
			$data = $res->row_array();
		}

		$res->free_result();

		return $data;
	}

	function _updateStudent($where, $data)
	{
		return $this->db->where($where)->update('students', $data);
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
		$res = $this->db->where($where)
						->join('students','students.id = requirements.studentID','INNER')
						->get('requirements');

		if($res->num_rows() > 0) {         
		    $this->arr = $res->row_array();
		}
		$res->free_result();

		return $this->arr;
	}


	function confirm_resume($username)
	{
		$data = array(
			'resume_status' => 1
		);
		$this->db->where('username', $username);
		$this->db->update('requirements', $data);
	}

	function confirm_clearance($username)
	{
		$data = array(
			'clearance_status' => 1
		);
		$this->db->where('username', $username);
		$this->db->update('requirements', $data);
	}

	function confirm_waiver($username)
	{
		$data = array(
			'waiver_status' => 1
		);
		$this->db->where('username', $username);
		$this->db->update('requirements', $data);
	}

	function confirm_good_moral($username)
	{
		$data = array(
			'good_moral_status' => 1
		);
		$this->db->where('username', $username);
		$this->db->update('requirements', $data);
	}

	function confirm_registration($username)
	{
		$data = array(
			'registration_status' => 1
		);
		$this->db->where('username', $username);
		$this->db->update('requirements', $data);
	}

	function confirm_consent($username)
	{
		$data = array(
			'consent_status' => 1
		);
		$this->db->where('username', $username);
		$this->db->update('requirements', $data);
	}

	function decline_resume($username)
	{
		$data = array(
			'resume' => 'no_pdf.png',
			'resume_status' => 0
		);
		$this->db->where('username', $username);
		$this->db->update('requirements', $data);
	}

	function decline_clearance($username)
	{
		$data = array(
			'clearance' => 'no_pdf.png',
			'clearance_status' => 0
		);
		$this->db->where('username', $username);
		$this->db->update('requirements', $data);
	}

	function decline_waiver($username)
	{
		$data = array(
			'waiver' => 'no_pdf.png',
			'waiver_status' => 0
		);
		$this->db->where('username', $username);
		$this->db->update('requirements', $data);
	}

	function decline_good_moral($username)
	{
		$data = array(
			'good_moral' => 'no_pdf.png',
			'good_moral_status' => 0
		);
		$this->db->where('username', $username);
		$this->db->update('requirements', $data);
	}

	function decline_registration($username)
	{
		$data = array(
			'registration_form' => 'no_pdf.png',
			'registration_status' => 0
		);
		$this->db->where('username', $username);
		$this->db->update('requirements', $data);
	}

	function decline_consent($username)
	{
		$data = array(
			'parents_consent' => 'no_pdf.png',
			'consent_status' => 0
		);
		$this->db->where('username', $username);
		$this->db->update('requirements', $data);
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