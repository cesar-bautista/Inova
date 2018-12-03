<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Providers extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("providers_model", "providers");
	}

	public function get()
	{
		if(is_object(AUTHORIZATION::validateToken()))
		{
			$providers = $this->providers->get_all();

			echo json_encode(
				array(
					"code" => 1, 
					"response" => array(
						"providers"=> $providers
					)
				)
			);
		}
	}

	public function save()
	{
		if(is_object(AUTHORIZATION::validateToken()))
		{
			$ajax_data = json_decode(file_get_contents('php://input'), true);
			$provider = $this->providers->save($ajax_data);

			echo json_encode(
				array(
					"code" => 1, 
					"response" => array(
						"provider"=> $provider
					)
				)
			);
		}
	}

	public function delete()
	{
		if(is_object(AUTHORIZATION::validateToken()))
		{
			$ajax_data = json_decode(file_get_contents('php://input'), true);
			$provider = $this->providers->delete($ajax_data);

			echo json_encode(
				array(
					"code" => 1, 
					"response" => array(
						"provider"=> $provider
					)
				)
			);
		}
	}
}