<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Seo extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("websiteseo_model", "seo");
	}

	public function get()
	{
		if(is_object(AUTHORIZATION::validateToken()))
		{
			$seo = $this->seo->get_all();

			echo json_encode(
				array(
					"code" => 1, 
					"response" => array(
						"seo"=> $seo
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
			$seo = $this->seo->save($ajax_data);

			echo json_encode(
				array(
					"code" => 1, 
					"response" => array(
						"seo"=> $seo
					)
				)
			);
		}
	}
}