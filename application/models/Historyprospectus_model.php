<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class HistoryProspectus_model extends CI_Model 
{
	public function __construct()
	{
		parent::__construct();
	}
	public function get_by_id($id)
	{
		$this->db->select('HP.*, US.UserName, PS.StatusName');
		$this->db->from('historyprospectus HP'); 
		$this->db->join('users US', 'US.UserId = HP.UserId');
		$this->db->join('prospectusstatus PS', 'PS.StatusId = HP.StatusId');	
		$this->db->where('HP.ProspectuId', $id);	
		$this->db->order_by('HP.RegisterDate', 'DESC');							
		$query = $this->db->get();
		return $query->result_array();
	}
}