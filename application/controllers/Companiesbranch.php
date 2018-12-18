<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Companiesbranch extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("companiesbranch_model", "branch");
	}

	public function get()
	{
		if(is_object(AUTHORIZATION::validateToken()))
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

	public function save()
	{
		if(is_object(AUTHORIZATION::validateToken()))
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

	public function delete()
	{
		if(is_object(AUTHORIZATION::validateToken()))
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