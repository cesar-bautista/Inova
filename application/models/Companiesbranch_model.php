<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Companiesbranch_model extends CI_Model 
{
	public function __construct()
	{
		parent::__construct();
	}
	
	public function get_all()
	{
		$this->db->select('CB.*, C.CompanyName');
		$this->db->from('companiesbranch CB'); 
		$this->db->join('companies C', 'CB.CompanyId = C.CompanyId');
		$query = $this->db->get();
		
		return $query->result_array();
	}

	public function save($data)
	{
		unset($data["CompanyName"]);
		if(!isset($data["CompanyBranchId"]))
		{
			$this->db->insert("companiesbranch", $data);
			$data["CompanyBranchId"] = $this->db->insert_id();
		}
		else
		{
			$this->db->where('CompanyBranchId', $data["CompanyBranchId"]);
			$this->db->update('companiesbranch', $data);
		}

		return array(
					'message' => $this->db->error(),
					'entity' => $data
					);
	}

	public function delete($data)
	{
		$this->db->where('CompanyBranchId', $data["CompanyBranchId"]);
		$this->db->delete('companiesbranch');
			
		return array(
					'message' => $this->db->error(),
					'entity' => $this->db->affected_rows()
					);
	}
}
/* End of file companies_model.php */
/* Location: ./application/models/companies_model.php */