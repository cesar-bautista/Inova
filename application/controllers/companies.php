<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Companies extends CI_Controller {

	protected $headers;

	public function __construct()
	{
		parent::__construct();
		$this->load->model("auth_model", "auth");
		$this->load->model("companies_model", "companies");
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
				$companies = $this->companies->get_all();

				echo json_encode(
					array(
						"code" => 1, 
						"response" => array(
							"companies"=> $companies
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
				$company = $this->companies->save($ajax_data);

				echo json_encode(
					array(
						"code" => 1, 
						"response" => array(
							"company"=> $company
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
				$company = $this->companies->delete($ajax_data);

				echo json_encode(
					array(
						"code" => 1, 
						"response" => array(
							"company"=> $company
						)
					)
				);
			}

		}
	}
}