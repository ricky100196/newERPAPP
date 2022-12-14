<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends MY_Controller {
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data = [ ];

        // print_r($this->db->last_query());exit;

        $view['title'] = 'Dashboard';
        $view['content'] = 'dashboard/index';

        $this->template->display($view, $data);
	}
}