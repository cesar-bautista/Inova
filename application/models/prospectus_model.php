<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Prospectus_model extends CI_Model 
{
	public function __construct()
	{
		parent::__construct();
	}
	
	public function get_all()
	{
		$query = $this->db->get("prospectus");
		return $query->result_array();
	}

	public function save($data)
	{
		if(!isset($data["ProspectuId"]))
		{
			$this->db->insert("prospectus", $data);
			$data["ProspectuId"] = $this->db->insert_id();
		}
		else
		{
			$this->db->where('ProspectuId', $data["ProspectuId"]);
			$this->db->update('prospectus', $data);
		}

		return array(
					'message' => $this->db->error(),
					'entity' => $data
					);
	}

	public function delete($data)
	{
		$this->db->where('ProspectuId', $data["ProspectuId"]);
		$this->db->delete('prospectus');
			
		return array(
					'message' => $this->db->error(),
					'entity' => $this->db->affected_rows()
					);
	}
}