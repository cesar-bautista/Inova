<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Mailer {

    public function __construct()
    {
        $this->CI =& get_instance();
        $this->CI->load->library('email');
    }

    function send_email($subject, $msg)
    {
        $this->CI->email->initialize(array(
			'protocol' => 'smtp',
			'smtp_crypto' => 'ssl',
			'smtp_host' => 'controladordns.com',
			'smtp_user' => 'user@inova.com',
			'smtp_pass' => 'pass',
			'smtp_port' => 465,
			'mailtype' => 'html',
			'charset' => 'utf-8',
			'wordwrap' => TRUE,
			'crlf' => "\r\n",
			'newline' => "\r\n"
		));
		
		$this->CI->email->from('cesar@inova.com', 'Message');
		$this->CI->email->to("cesar@inova.com");
		$this->CI->email->cc('another@ventermac.com.mx');
		$this->CI->email->bcc('webmaster@inova.com');
		$this->CI->email->subject($subject);
		$this->CI->email->message($msg);
		
		return array(
					'Status' => $this->CI->email->send(),
					'Message' => $this->CI->email->print_debugger()
					);

    }

}