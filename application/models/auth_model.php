<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth_model extends CI_Model 
{
	public function __construct()
	{
		parent::__construct();
	}

	public function login($email, $password)
	{
		$query = $this->db->select("UserId, Email")
		->from("users")
		->where("Email", $email)
        ->where("Pasword", sha1($password))
        ->where("IsActive", 1)
		->get();
		if($query->num_rows() === 1)
			return $query->row();
		return false;
	}

	public function checkUser($id, $email)
	{
		$query = $this->db->limit(1)->get_where("users", array("UserId" => $id, "Email" => $email));
		return $query->num_rows() === 1;
	}
}

/* End of file auth_model.php */
/* Location: ./application/models/auth_model.php */