<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Instrumen_table extends MY_Controller {
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
        $data = [
            'data' => $this->db->from("(SELECT
            a.id,
            b.nama AS guru,
            b.instansi AS instansi_guru,
            b.kab AS kab_guru,
            b.prov AS prov_guru,
            c.nama AS coach,
            c.instansi AS instansi_coach,
            a.created as tgl_ploting,
            max(case when id_soal = 1 then jawaban end) as j1,
            max(case when id_soal = 2 then jawaban end) as j2,
            max(case when id_soal = 3 then jawaban end) as j3,
            max(case when id_soal = 4 then jawaban end) as j4
        FROM
            instrumen_data a
            JOIN guru_data b ON a.id_guru = b.id
            JOIN coach_data c ON a.id_coach = c.id
            LEFT JOIN instrumen_jawaban d ON a.id = d.id_instrumen
            WHERE a.deleted IS NULL) a")->get()->result()
        ];
        $view['title'] = 'Rekap Instrumen';
        $view['content'] = 'admin/instrumen_table/index';
        $this->template->display($view, $data);
    }
}