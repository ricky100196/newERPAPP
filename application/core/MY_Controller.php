<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->router->fetch_class()!="login" && $this->router->fetch_class()!="form") {
			if (!$this->session->userdata('logged_in')) {
				redirect(base_url('login'));
			}
		}

		$this->id = @$this->session->userdata('user_id')??1;
		$this->nama = @$this->session->userdata('nama')??0;
		$this->type = @$this->session->userdata('type')??0;
		$this->logged_in = @$this->session->userdata('logged_in')??0;
		// $this->load->model('Beranda_model', 'beranda');
	}
	public function _set_success($data)
    {
        $this->output
            ->set_content_type('application/json', 'utf-8')
            ->set_status_header(200)
            ->set_output(json_encode($data));

        return false;
    }
}