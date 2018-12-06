<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Productspriority extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("productspriority_model", "priority");
	}

	public function get()
	{
		if(is_object(AUTHORIZATION::validateToken()))
		{
			$priority = $this->priority->get_all();

			echo json_encode(
				array(
					"code" => 1, 
					"response" => array(
						"priorities"=> $priority
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
			$priority = $this->priority->save($ajax_data);

			echo json_encode(
				array(
					"code" => 1, 
					"response" => array(
						"priority"=> $priority
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
			$priority = $this->priority->delete($ajax_data);

			echo json_encode(
				array(
					"code" => 1, 
					"response" => array(
						"priority"=> $priority
					)
				)
			);
		}
	}
}