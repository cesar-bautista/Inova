<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("auth_model", "auth");
		$this->headers = apache_request_headers();
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
				$user = $this->auth->login($email, $password);
				if($user !== false)
				{
					$user->iat = time();
					$user->exp = time() + 60;
					$jwt = JWT::encode($user, '');
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
			$user = JWT::decode(trim($token,'"'));

			if($this->auth->checkUser($user->userId, $user->email) !== false)
			{
				$user->iat = time();
				$user->exp = time() + 180;
				$jwt = JWT::encode($user, '');

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