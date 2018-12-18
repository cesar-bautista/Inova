<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Prospectusstatus_model extends CI_Model 
{
	public function __construct()
	{
		parent::__construct();
	}
	
	public function get_all()
	{
		$query = $this->db->get("prospectusstatus");
		return $query->result_array();
	}

	public function save($data)
	{
		if(!isset($data["StatusId"]))
		{
			$this->db->insert("prospectusstatus", $data);
			$data["StatusId"] = $this->db->insert_id();
		}
		else
		{
			$this->db->where('StatusId', $data["StatusId"]);
			$this->db->update('prospectusstatus', $data);
		}

		return array(
					'message' => $this->db->error(),
					'entity' => $data
					);
	}

	public function delete($data)
	{
		$this->db->where('StatusId', $data["StatusId"]);
		$this->db->delete('prospectusstatus');
			
		return array(
					'message' => $this->db->error(),
					'entity' => $this->db->affected_rows()
					);
	}
}