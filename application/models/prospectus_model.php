<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Prospectus_model extends CI_Model 
{
	public function __construct()
	{
		parent::__construct();
	}
	
	public function get_all()
	{
		$this->db->select('PP.*, US.UserName, PV.ProviderName, PD.ProductName, PS.StatusName');
		$this->db->from('prospectus PP'); 
		$this->db->join('users US', 'US.UserId = PP.UserId');
		$this->db->join('providers PV', 'PV.ProviderId = PP.ProviderId');
		$this->db->join('products PD', 'PD.ProductId = PP.ProductId');
		$this->db->join('prospectusstatus PS', 'PS.StatusId = PP.StatusId');		
		$this->db->order_by('PP.ProspectuId');
		$query = $this->db->get();

		return $query->result_array();
	}

	public function save($data)
	{
		$datas = array(
			"ProspectuId" => $data["ProspectuId"],
			"UserId" => $data["UserId"],
			"ProviderId" => $data["ProviderId"],
			"ProductId" => $data["ProductId"],
			"StatusId" => $data["StatusId"],
			"Comments" => $data["Comments"],
			"RegisterDate" => $data["RegisterDate"],
			"RememberDate" => $data["RememberDate"]
		);

		if(!isset($data["ProspectuId"]))
		{
			$this->db->insert("prospectus", $datas);
			$data["ProspectuId"] = $this->db->insert_id();
		}
		else
		{
			$this->db->where('ProspectuId', $data["ProspectuId"]);
			$this->db->update('prospectus', $datas);
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