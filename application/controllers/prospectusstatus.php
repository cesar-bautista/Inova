<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Prospectusstatus extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("prospectusstatus_model", "status");
	}

	public function get()
	{
		if(is_object(AUTHORIZATION::validateToken()))
		{
			$status = $this->status->get_all();

			echo json_encode(
				array(
					"code" => 1, 
					"response" => array(
						"status"=> $status
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
			$status = $this->status->save($ajax_data);

			echo json_encode(
				array(
					"code" => 1, 
					"response" => array(
						"status"=> $status
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
			$status = $this->status->delete($ajax_data);

			echo json_encode(
				array(
					"code" => 1, 
					"response" => array(
						"status"=> $status
					)
				)
			);
		}
	}
}