<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function login()
	{
		if($this->input->is_ajax_request())
		{
			$email = $this->input->post("email");
			$password = $this->input->post("password");
			
			if(!$email || !$password)
				echo json_encode(array("code" => 0, "response" => "Datos insuficientes"));
			else
			{
				$user = AUTHORIZATION::loginUser($email, $password);
				if($user !== false)
				{
					$jwt = AUTHORIZATION::encodeToken($user);
					echo json_encode(
						array(
							"code" => 1,
							"response" => array(
								"token" => $jwt
							)
						)
					);
				}
				else
				{
					echo json_encode(array("code" => 0, "response" => "Datos incorrectos"));
				}
			}
		}
		else
		{
			show_404();
		}	
	}

	public function refreshtoken()
	{
		if($this->input->is_ajax_request())
		{
			$ajax_data = json_decode(file_get_contents('php://input'), true);
			$token = $ajax_data["token"];			
			$decodedToken = AUTHORIZATION::decodeToken(trim($token,'"'));
			
			if(AUTHORIZATION::validateUser($decodedToken) == true)
			{
				$jwt = AUTHORIZATION::encodeToken($decodedToken);
				echo json_encode(
					array(
						"code" => 1,
						"response" => array(
							"token" => $jwt
						)
					)
				);
			}
			else
			{
				echo json_encode(array("code" => 0, "response" => "Es necesario volver a iniciar sesión"));
			}
		}
		else
		{
			show_404();
		}	
	}
}