<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Providers_model extends CI_Model 
{
	public function __construct()
	{
		parent::__construct();
	}
	
	public function get_all()
	{
		$query = $this->db->get("providers");
		return $query->result_array();
	}

	public function save($data)
	{
		if(!isset($data["ProviderId"]))
		{
			$this->db->insert("providers", $data);
			$data["ProviderId"] = $this->db->insert_id();
		}
		else
		{
			$this->db->where('ProviderId', $data["ProviderId"]);
			$this->db->update('providers', $data);
		}

		return array(
					'message' => $this->db->error(),
					'entity' => $data
					);
	}

	public function delete($data)
	{
		$this->db->where('ProviderId', $data["ProviderId"]);
		$this->db->delete('providers');
			
		return array(
					'message' => $this->db->error(),
					'entity' => $this->db->affected_rows()
					);
	}
}