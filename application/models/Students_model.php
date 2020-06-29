<?php

class Students_model extends CI_Model
{

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
		$this->db->order_by('id', 'DESC');
		$this->db->where('status', 0);
		$data = $this->db->get('students');
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

	function get_students_profile($username)
	{
		$this->db->where('username', $username);
		$data = $this->db->get('students');
		return $data->row_array();
	}

	function update_students_profile($username, $post_image)
	{
		if($this->input->post('gender') == 1)
		{
			$data = "Male";
		}
		else
		{
		$data = "Female";
		}
		$data = array(
			'user_image' => $post_image,
			'age' => $this->input->post('age'),
			'gender' => $data,
			'address' => $this->input->post('address'),
			'email_address' => $this->input->post('email_address'),
			'contact_no' => $this->input->post('contact_no'),
			'parents' => $this->input->post('parents'),
			'parents_contact_no' => $this->input->post('parents_contact_no')
		);
		$this->db->where('username', $username);
		$this->db->update('students', $data);
	}

	function delete_student_request($username)
	{
		$this->db->where('username', $username);
		$this->db->delete(array('students', 'requirements'));
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

	function add_hours($username)
	{
		$date = date('Y-m-d');
		$data = array(
			'check_by' => $this->session->userdata('username'),
			'student_username' => $username,
			'ojt_date' => $date,
			'ojt_hours' => $this->input->post('ojt_hours')
		);
		$this->db->insert('students_dtr', $data);

		$this->db->select_sum('ojt_hours');
		$this->db->where('student_username', $username);
		$data = $this->db->get('students_dtr');
		foreach ($data->result() as $row) {
			$sum = $row->ojt_hours;
			$rose = array(
			'total_hours' => $sum
			);
			$this->db->where('username', $username);
			$this->db->update('students', $rose);
		}

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

	function get_students_requirements($username)
	{
		$this->db->where('username', $username);
		$data = $this->db->get('requirements');
		return $data->row_array();
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