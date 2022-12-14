<?php if(! defined('BASEPATH')) exit('Akses langsung tidak diperbolehkan');
require FCPATH.'vendor/mailjet/vendor/autoload.php';
use \Mailjet\Resources;
class Send_email {
	public function __construct() {
	}

	public function send($email=null,$dt=null)
	{
		$url = 'https://api.mailjet.com/v3.1/send';
		$mj = new \Mailjet\Client('0a85b41fbe68e1f0e3db675ce78b5fd1','61aa9efc87283f863347796de9895376',true,['version' => 'v3.1']);
		$body = [
			'Messages' => [
				[
					'From' => [
						'Email' => "noreply.aksespembiayaan@gmail.com",
						'Name' => "Kementerian Pariwisata dan Ekonomi Kreatif"
					],
					'To' => [
						[
							'Email' => $email,
							'Name' => 'Notifikasi'
						]
					],
					'Subject' => $dt['judul'],
					'HTMLPart' => $dt['isi'],
					'CustomID' => "AppGettingStartedTest"
				]
			]
		];
		$response = $mj->post(Resources::$Email, ['body' => $body]);
		return json_encode($response->getData());
	}
}
