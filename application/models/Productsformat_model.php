<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Productsformat_model extends CI_Model 
{
	public function __construct()
	{
		parent::__construct();
	}
	
	public function get_all()
	{
		$query = $this->db->get("productsformat");
		return $query->result_array();
	}

	public function save($data)
	{
		if(!isset($data["FormatId"]))
		{
			$this->db->insert("productsformat", $data);
			$data["FormatId"] = $this->db->insert_id();
		}
		else
		{
			$this->db->where('FormatId', $data["FormatId"]);
			$this->db->update('productsformat', $data);
		}

		return array(
					'message' => $this->db->error(),
					'entity' => $data
					);
	}

	public function delete($data)
	{
		$this->db->where('FormatId', $data["FormatId"]);
		$this->db->delete('productsformat');
			
		return array(
					'message' => $this->db->error(),
					'entity' => $this->db->affected_rows()
					);
	}
}