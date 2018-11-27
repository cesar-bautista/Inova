<?php
class Products_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}
	
	public function get_all()
	{
		$this->db->select('PD.ProductId, PD.ProductName, PD.ProductDescription, PV.ProviderId, PV.ProviderName');
		$this->db->from('products PD'); 
		$this->db->join('providers PV', 'PD.ProviderId = PV.ProviderId');
		$this->db->order_by('PD.ProductName');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_by_id($id)
	{
		$this->db->select('PD.ProductId, PD.ProductName, PD.ProductDescription, PV.ProviderId, PV.ProviderName');
		$this->db->from('products PD'); 
		$this->db->join('providers PV', 'PD.ProviderId = PV.ProviderId');
		$this->db->where('PD.ProductId', $id);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function get_by_provider($id)
	{
		$this->db->select('PD.ProductId, PD.ProductName, PD.ProductDescription');
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