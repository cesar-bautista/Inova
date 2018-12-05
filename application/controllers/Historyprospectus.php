<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class HistoryProspectus extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("historyprospectus_model", "historyprospectus");

	}
	public function get_by_id($id)
	{
		if(is_object(AUTHORIZATION::validateToken()))
		{
			$historyprospectus = $this->historyprospectus->get_by_id($id);

			echo json_encode(
				array(
					"code" => 1, 
					"response" => array(
						"historyprospectus"=> $historyprospectus
					)
				)
			);
		}
	}
}