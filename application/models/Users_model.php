<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Users_model extends CI_Model 
{
	public function __construct()
	{
		parent::__construct();
	}
	
	public function get_menu($id, $email)
	{
		$this->db->select('M.*');
		$this->db->from('users U'); 
		$this->db->join('menugroups G', 'U.GroupId = G.GroupId');
		$this->db->join('menu M', 'G.Bitwise & M.Bitwise', NULL, FALSE);
		$this->db->where('U.IsActive', 1);
		$this->db->where('U.UserId', $id);
		$this->db->where('U.Email', $email);
		$this->db->order_by('M.ParentId','asc');
		$this->db->order_by('M.Position','asc');
		$query = $this->db->get();

		return $query->result_array();
	}
}
/* End of file movies_model.php */
/* Location: ./application/models/movies_model.php */