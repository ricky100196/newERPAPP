<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Guru extends MY_Controller {
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data = [
			'data' => $this->db->get('guru_data')->result(),
            'scriptExtra' => 'admin/guru/js'
		];
		$view['title'] = 'Data Guru';
        $view['content'] = 'admin/guru/index';
        $this->template->display($view, $data);
    }

	public function aksi($aksi,$id){
        $id = decode_id($id);
		$cek_exist = $this->db->get_where('guru_data',['id' => $id]);
		if($aksi == 'hapus') {
			$dt = array(
				'deleted' => date('Y-m-d H:i:s')
			);
			$pesan = 'Berhasil non aktifkan data.';
		}else{
			$dt = array(
				'deleted' => NULL
			);
			$pesan = 'Berhasil aktifkan data.';
		}
		if ($cek_exist->num_rows() > 0) {
			$this->db->where('id', $id)->update('guru_data',$dt);
		}
		$this->session->set_flashdata('success', $pesan);
            
        redirect('admin/guru');
    }
}