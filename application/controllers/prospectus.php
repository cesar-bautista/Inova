<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Prospectus extends CI_Controller {

	protected $headers;

	public function __construct()
	{
		parent::__construct();
		$this->load->model("auth_model", "auth");
		$this->load->model("prospectus_model", "prospectus");
		$this->headers = apache_request_headers();
	}

	public function get()
	{
		if(!isset($this->headers["Authorization"]) || empty($this->headers["Authorization"]))
		{
			echo json_encode(array("code" => 0, "response" => "Es necesario volver a iniciar sesión"));
		}
		else
		{
			$token = explode(" ", $this->headers["Authorization"]);
			$user = JWT::decode(trim($token[1],'"'));
			
			if($this->auth->checkUser($user->UserId, $user->Email) !== false)
			{
				$prospectus = $this->prospectus->get_all();

				echo json_encode(
					array(
						"code" => 1, 
						"response" => array(
							"prospectus"=> $prospectus
						)
					)
				);
			}

		}
	}

	public function save()
	{
		if(!isset($this->headers["Authorization"]) || empty($this->headers["Authorization"]))
		{
			echo json_encode(array("code" => 0, "response" => "Es necesario volver a iniciar sesión"));
		}
		else
		{
			$token = explode(" ", $this->headers["Authorization"]);
			$user = JWT::decode(trim($token[1],'"'));
			
			if($this->auth->checkUser($user->UserId, $user->Email) !== false)
			{
				$ajax_data = json_decode(file_get_contents('php://input'), true);
				$prospectu = $this->prospectus->save($ajax_data);

				echo json_encode(
					array(
						"code" => 1, 
						"response" => array(
							"prospectu"=> $prospectu
						)
					)
				);
			}

		}
	}

	public function delete()
	{
		if(!isset($this->headers["Authorization"]) || empty($this->headers["Authorization"]))
		{
			echo json_encode(array("code" => 0, "response" => "Es necesario volver a iniciar sesión"));
		}
		else
		{
			$token = explode(" ", $this->headers["Authorization"]);
			$user = JWT::decode(trim($token[1],'"'));
			
			if($this->auth->checkUser($user->UserId, $user->Email) !== false)
			{
				$ajax_data = json_decode(file_get_contents('php://input'), true);
				$prospectu = $this->prospectus->delete($ajax_data);

				echo json_encode(
					array(
						"code" => 1, 
						"response" => array(
							"prospectu"=> $prospectu
						)
					)
				);
			}

		}
	}
}