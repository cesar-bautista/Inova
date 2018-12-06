<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Productsformat extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("productsformat_model", "format");
	}

	public function get()
	{
		if(is_object(AUTHORIZATION::validateToken()))
		{
			$format = $this->format->get_all();

			echo json_encode(
				array(
					"code" => 1, 
					"response" => array(
						"formats"=> $format
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
			$format = $this->format->save($ajax_data);

			echo json_encode(
				array(
					"code" => 1, 
					"response" => array(
						"format"=> $format
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
			$format = $this->format->delete($ajax_data);

			echo json_encode(
				array(
					"code" => 1, 
					"response" => array(
						"format"=> $format
					)
				)
			);
		}
	}
}