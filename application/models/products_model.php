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

		$result_array = $query->result_array();

		return $result_array;
	}

	public function save($data)
	{
		$datas = array(
			"ProductId" => $data["ProductId"],
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
					'entity' => $data
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