<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Partial extends CI_Controller {
	
	public function login()
	{
		$this->template->partial_view('login');
	}
	

	public function dashboard()
	{
		$this->template->partial_view('dashboard');
	}
	

	public function companies()
	{
		$this->template->partial_view('companies/index');
	}

	public function company()
	{
		$this->template->partial_view('companies/edit');
	}

	public function companiesbranch()
	{
		$this->template->partial_view('companiesbranch/index');
	}

	public function companybranch()
	{
		$this->template->partial_view('companiesbranch/edit');
	}

	public function products()
	{
		$this->template->partial_view('products/index');
	}

	public function product()
	{
		$this->template->partial_view('products/edit');
	}

	public function providers()
	{
		$this->template->partial_view('providers/index');
	}

	public function provider()
	{
		$this->template->partial_view('providers/edit');
	}

	public function prospectus()
	{
		$this->template->partial_view('prospectus/index');
	}

	public function prospectu()
	{
		$this->template->partial_view('prospectus/edit');
	}

	public function seo()
	{
		$this->template->partial_view('seo/index');
	}
}