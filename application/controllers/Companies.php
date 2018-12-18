<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Companies extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("companies_model", "companies");
	}

	public function get()
	{
		if(is_object(AUTHORIZATION::validateToken()))
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

	public function save()
	{
		if(is_object(AUTHORIZATION::validateToken()))
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

	public function delete()
	{
		if(is_object(AUTHORIZATION::validateToken()))
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