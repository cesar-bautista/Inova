<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Template {
	
	public function __construct()
	{
		$this->CI =& get_instance();
    }

	/**
	*
	* Viewer for admin
	* @param 	@view 	View controller
	* @return 	array
	*
	*/
	function view($view, $data = array())
	{
		$data['content'] = $this->CI->load->view($view, $data, TRUE);
        return $this->CI->load->view('template/admin_view', $data, FALSE);
	}

	function partial_view($view, $data = array())
	{
		$data['content'] = $this->CI->load->view($view, $data, TRUE);
        return $this->CI->load->view('template/admin_partial_view', $data, FALSE);
	}
}