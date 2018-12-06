<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Productspriority_model extends CI_Model 
{
	public function __construct()
	{
		parent::__construct();
	}
	
	public function get_all()
	{
		$query = $this->db->get("productspriority");
		return $query->result_array();
	}

	public function save($data)
	{
		if(!isset($data["PriorityId"]))
		{
			$this->db->insert("productspriority", $data);
			$data["PriorityId"] = $this->db->insert_id();
		}
		else
		{
			$this->db->where('PriorityId', $data["PriorityId"]);
			$this->db->update('productspriority', $data);
		}

		return array(
					'message' => $this->db->error(),
					'entity' => $data
					);
	}

	public function delete($data)
	{
		$this->db->where('PriorityId', $data["PriorityId"]);
		$this->db->delete('productspriority');
			
		return array(
					'message' => $this->db->error(),
					'entity' => $this->db->affected_rows()
					);
	}
}