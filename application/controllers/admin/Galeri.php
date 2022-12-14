<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Galeri extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('Galeri_model', 'galeri');
	}

    public function index() 
    {
        $data = $this->galeri->get_data();
		$data = [
			'data' => $data,
			'scriptExtra' => 'admin/galeri/index_js'
		];
		$view['title'] = 'Front Beranda';
		$view['content'] = 'admin/galeri/index';
		$this->template->display($view, $data);
    }
}