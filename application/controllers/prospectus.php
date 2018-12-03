<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Prospectus extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("prospectus_model", "prospectus");
	}

	public function get()
	{
		if(is_object(AUTHORIZATION::validateToken()))
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

	public function save()
	{
		if(is_object(AUTHORIZATION::validateToken()))
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

	public function delete()
	{
		if(is_object(AUTHORIZATION::validateToken()))
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