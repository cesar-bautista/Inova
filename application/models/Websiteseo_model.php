
<?php
class WebsiteSeo_model extends CI_Model
{
	public function get_all()
	{
		$query = $this->db->get("WebsiteSeo");
		$result_array = $query->result_array();

		$result = array();
		foreach($result_array as $key => $item)
			$result[$item['GroupSeo']][$key] = $item;

		return $result;
	}

	public function get_by_groupseo($groupseo)
	{
		$query = $this->db->get_where("WebsiteSeo", array('GroupSeo' => $groupseo));
		return $query->result_array();
	}

	public function save($data)
	{
		foreach ($data as $item) {
			$this->db->set('Value', $item["Value"]);
			$this->db->where('WebsiteId', $item["WebsiteId"]);
			$this->db->update('WebsiteSeo');
		}

		return array(
					'message' => "OK",
					'entity' => $data
					);
	}
}
?>