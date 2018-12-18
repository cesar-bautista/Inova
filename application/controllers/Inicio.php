<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}
	
	public function index()
	{
		$this->template->view('inicio_view');
	}

	public function content()
	{
		$this->template->partial_view('common/content');
	}

	public function navigation()
	{
		$this->template->partial_view('common/navigation');
	}

	public function topnavbar()
	{
		$this->template->partial_view('common/topnavbar');
	}

	public function footer()
	{
		$this->template->partial_view('common/footer');
	}

	public function right_sidebar()
	{
		$this->template->partial_view('common/right_sidebar');
	}

	public function notify()
	{
		$this->template->partial_view('common/notify');
	}
	
}