<?php

class Post_model extends MY_Model
{

	function post()
	{
		$this->db->order_by('post_date', 'DESC');
		$this->db->where('post_status', 1);
		$data = $this->db->get('post');
		return $data;
	}

	function post_admin($hey, $post_image)
	{
		$data = array(
			'post_title' => $this->input->post('post_title'),
			'post_body' => $this->input->post('post_content'),
			'post_by' => $this->session->userdata('username'),
			'post_status' => 1,
			'post_image' => $hey,
			'post_image_content' => $post_image
		);
		$this->db->insert('post', $data);
	}

	function post_students($hey, $post_image, $haha)
	{
		$data = array(
			'post_title' => $this->input->post('post_title'),
			'post_body' => $this->input->post('post_content'),
			'post_by' => $this->session->userdata('username'),
			'post_status' => 0,
			'post_image' => $hey,
			'post_image_content' => $post_image,
			'post_from' => $haha
		);
		$this->db->insert('post', $data);
	}

	function delete_post($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('post');
	}

	function get_post_request()
	{
		$this->db->where('post_status', 0);
		return $this->db->get('post');
	}

	function approve_post($id)
	{
		$now = date('Y-m-d H:i:s');
		$data = array(
			'post_status' => 1,
			'post_date' => $now
		);
		$this->db->where('post_status', 0);
		$this->db->update('post', $data);

	}


}
?>