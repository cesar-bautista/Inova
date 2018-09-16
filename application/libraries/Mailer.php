<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Mailer {

    function Mailer()
    {
        $this->CI =& get_instance();
        $this->CI->load->library('email');
    }

    function send_email($subject, $msg)
    {
        $this->CI->email->initialize(array(
			'protocol' => 'smtp',
			'smtp_crypto' => 'ssl',
			'smtp_host' => 'servidor1194.il.controladordns.com',
			'smtp_user' => 'webmaster@ventermac.com.mx',
			'smtp_pass' => '7usDfDfC+',
			'smtp_port' => 465,
			'mailtype' => 'html',
			'charset' => 'utf-8',
			'wordwrap' => TRUE,
			'crlf' => "\r\n",
			'newline' => "\r\n"
		));
		
		$this->CI->email->from('ventas@ventermac.com.mx', 'Ventermac');
		$this->CI->email->to("ventas@ventermac.com.mx");
		//$this->CI->email->cc('another@ventermac.com.mx');
		$this->CI->email->bcc('webmaster@ventermac.com.mx');
		$this->CI->email->subject($subject);
		$this->CI->email->message($msg);
		
		return array(
					'Status' => $this->CI->email->send(),
					'Message' => $this->CI->email->print_debugger()
					);

    }

}