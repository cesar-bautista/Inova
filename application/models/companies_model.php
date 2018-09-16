<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Companies_model extends CI_Model 
{
	public function __construct()
	{
		parent::__construct();
	}
	
	public function get_all()
	{
		$query = $this->db->get("companies");
		return $query->result_array();
	}

	public function save($data)
	{
		if(!isset($data["CompanyId"]))
		{
			$this->db->insert("companies", $data);
			$data["CompanyId"] = $this->db->insert_id();
		}
		else
		{
			$this->db->where('CompanyId', $data["CompanyId"]);
			$this->db->update('companies', $data);
		}

		return array(
					'message' => $this->db->error(),
					'entity' => $data
					);
	}

	public function delete($data)
	{
		$this->db->where('CompanyId', $data["CompanyId"]);
		$this->db->delete('companies');
			
		return array(
					'message' => $this->db->error(),
					'entity' => $this->db->affected_rows()
					);
	}
}
/* End of file companies_model.php */
/* Location: ./application/models/companies_model.php */