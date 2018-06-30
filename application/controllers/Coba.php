<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Coba extends CI_Controller {
	public function index()
	 {
			 $this->load->view('welcome_message');
	 }

	 public function kirim_email()
	 {



							//Load email library
							$this->load->library('email');

							//SMTP & mail configuration
							$config = array(
								'protocol'  => 'smtp',
								'smtp_host' => 'ssl://smtp.googlemail.com',
								'smtp_port' => 465,
								'smtp_user' => 'aryaanggara123456@gmail.com',
								'smtp_pass' => 'alquranhidupku',
								'mailtype'  => 'html',
								'charset'   => 'utf-8'
							);
							$this->email->initialize($config);
							$this->email->set_mailtype("html");
							$this->email->set_newline("\r\n");

							//Email content
							$htmlContent = '<h1>Sending email via SMTP server</h1>';
							$htmlContent .= '<p>This email has sent via SMTP server from CodeIgniter application.</p>';

							$this->email->to('didikeko1997@gmail.com');
							$this->email->from('aryaanggara123456@gmail.com','Bloodemergency');
							$this->email->subject('Uji Coba SMTP Server');
							$this->email->message($htmlContent);

							//Send email
							$this->email->send();


	 }

}
