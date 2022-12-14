<?php if( ! defined('BASEPATH')) exit('No direct script access allowed');
class Sender {
	protected $CI;
	private $emailUser = '';
	private $emailPassword = '';

	public function __construct()
	{
	
		$this->CI =& get_instance();
	}

public function send_email($data = array())
	{
		$this->CI->load->library('email');
		$config['protocol'] = 'smtp';
	    $config['smtp_host'] = 'smtp.sendgrid.net';
	    //$config['smtp_host'] = '169.38.103.39';
	    $config['smtp_port'] = '587';
	    $config['smtp_user'] = $this->emailUser;
	    $config['smtp_pass'] = $this->emailPassword;
	    $config['mailtype'] = 'html';
	    $config['charset'] = 'iso-8859-1';
	    $config['wordwrap'] = TRUE;
	    $config['newline'] = "\r\n";

		$this->CI->email->initialize($config);
		//$this->CI->email->from($data['email_from'], $data['email_from_name']);
		$this->CI->email->to($data['emailpenerima']);
		$this->CI->email->subject($data['isiemail']);
		//$this->CI->email->message($data['template']);
		//$this->CI->email->attach($data['attach']);

		return $this->CI->email->send();
	}

// class Phpmailer{
// 	public function _construct(){
// 		log_message('Debug', 'PHPMailer class is loaded.');
// 	}
// 	public function load(){
// 		require_once(APPPATH.'third_party/phpmailer/src/PHPMailer.php');
// 		require_once(APPPATH.'third_party/phpmailer/src/SMTP.php');
// 		require_once(APPPATH.'third_party/phpmailer/src/Exception.php');

// 		$objMail = new PHPMailer\PHPMailer\PHPMailer();
// 		return $objMail;
// 	}
}
?>