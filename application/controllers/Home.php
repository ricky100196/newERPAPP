<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Home extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
	}

	public function index() {
		$data = array(
			'beranda' => $this->db->get('beranda')->row(),
			'content' => $this->db->get('front_content')->row(),
			'about' => $this->db->get('about')->row(),
			'user' => array(),
		);
		$this->load->view('front/home', $data);
	}
}