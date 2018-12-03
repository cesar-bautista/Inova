<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Products extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("Products_model", "products");
	}

	public function get()
	{
		if(is_object(AUTHORIZATION::validateToken()))
		{
			$products = $this->products->get_all();

			echo json_encode(
				array(
					"code" => 1, 
					"response" => array(
						"products"=> $products
					)
				)
			);
		}
	}

	public function getbyprovider($id)
	{
		if(is_object(AUTHORIZATION::validateToken()))
		{
			$products = $this->products->get_by_provider($id);

			echo json_encode(
				array(
					"code" => 1, 
					"response" => array(
						"products"=> $products
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
			$product = $this->products->save($ajax_data);

			echo json_encode(
				array(
					"code" => 1, 
					"response" => array(
						"product"=> $product
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
			$product = $this->products->delete($ajax_data);

			echo json_encode(
				array(
					"code" => 1, 
					"response" => array(
						"product"=> $product
					)
				)
			);
		}
	}
}