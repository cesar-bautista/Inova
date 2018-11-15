<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Companiesbranch extends CI_Controller {

	protected $headers;

	public function __construct()
	{
		parent::__construct();
		$this->load->model("auth_model", "auth");
		$this->load->model("companiesbranch_model", "branch");
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
			
			if($this->auth->checkUser($user->userId, $user->email) !== false)
			{
				$branch = $this->branch->get_all();

				echo json_encode(
					array(
						"code" => 1, 
						"response" => array(
							"companiesbranch"=> $branch
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
			
			if($this->auth->checkUser($user->userId, $user->email) !== false)
			{
				$ajax_data = json_decode(file_get_contents('php://input'), true);
				$branch = $this->branch->save($ajax_data);

				echo json_encode(
					array(
						"code" => 1, 
						"response" => array(
							"companybranch"=> $branch
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
			
			if($this->auth->checkUser($user->userId, $user->email) !== false)
			{
				$ajax_data = json_decode(file_get_contents('php://input'), true);
				$branch = $this->branch->delete($ajax_data);

				echo json_encode(
					array(
						"code" => 1, 
						"response" => array(
							"companybranch"=> $branch
						)
					)
				);
			}

		}
	}
}