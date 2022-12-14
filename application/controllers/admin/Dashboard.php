<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends MY_Controller {
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data = [
            'scriptExtra' => 'admin/dashboard/chart_js',
            'guru' => $this->db->select('COUNT(guru_data.id) as total')->where('deleted',NULL)->get('guru_data')->row(),
            'coach' => $this->db->select('COUNT(coach_data.id) as total')->where('deleted',NULL)->get('coach_data')->row(),
            'plotting' => $this->db->select('COUNT(guru_data.id) as jml')->where('deleted',NULL)->where('guru_data.id IN (SELECT id_guru FROM instrumen_data WHERE deleted IS NULL)')->get('guru_data')->row(),
            'plotting_coach' => $this->db->select('COUNT(coach_data.id) as jml')->where('deleted',NULL)->where('coach_data.id IN (SELECT id_coach FROM instrumen_data WHERE deleted IS NULL)')->get('coach_data')->row()
        ];

        // print_r($this->db->last_query());exit;

        $view['title'] = 'Dashboard';
        $view['content'] = 'admin/dashboard/index';

        $this->template->display($view, $data);
	}
}