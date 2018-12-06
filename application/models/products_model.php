<?php
class Products_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}
	
	public function get_all()
	{
		$this->db->select('PD.*, PV.ProviderId, PV.ProviderName');
		$this->db->from('products PD'); 
		$this->db->join('providers PV', 'PD.ProviderId = PV.ProviderId');
		$this->db->order_by('PD.ProductName');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_by_id($id)
	{
		$this->db->select('PD.*, PV.ProviderId, PV.ProviderName');
		$this->db->from('products PD'); 
		$this->db->join('providers PV', 'PD.ProviderId = PV.ProviderId');
		$this->db->where('PD.ProductId', $id);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function get_by_provider($id)
	{
		$this->db->select('PD.*');
		$this->db->from('products PD');
		$this->db->where('PD.ProviderId =', $id);
		$this->db->order_by('PD.ProductName');
		$query = $this->db->get();
		return $query->result_array();
	}
	
	public function save($data)
	{
		$datas = array(
			"ProductName" => $data["ProductName"],
			"ProductDescription" => $data["ProductDescription"],
			"ProviderId" => $data["ProviderId"]
		);

		if(isset($data["ProductPrice"]))
		{
			$datas["ProductPrice"] = $data["ProductPrice"];
		}

		if(isset($data["ProductFair"]))
		{
			$datas["ProductFair"] = $data["ProductFair"];
		}

		if(isset($data["IsDigitalContent"]))
		{
			$datas["IsDigitalContent"] = $data["IsDigitalContent"];
		}

		if(isset($data["PriorityId"]))
		{
			$datas["PriorityId"] = $data["PriorityId"];
		}

		if(isset($data["FormatId"]))
		{
			$datas["FormatId"] = $data["FormatId"];
		}
		
		if(!isset($data["ProductId"]))
		{
			$this->db->insert("products", $datas);
			$data["ProductId"] = $this->db->insert_id();
		}
		else
		{
			$this->db->where('ProductId', $data["ProductId"]);
			$this->db->update('products', $datas);
		}

		return array(
					'message' => $this->db->error(),
					'entity' => $this->get_by_id($data["ProductId"])
					);
	}

	public function delete($data)
	{
		$this->db->where('ProductId', $data["ProductId"]);
		$this->db->delete('products');
			
		return array(
					'message' => $this->db->error(),
					'entity' => $this->db->affected_rows()
					);
	}
}
?>