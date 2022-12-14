<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Beranda extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('Beranda_model', 'beranda');
	}

	public function index()
	{
		$data = $this->db->where('deleted_at', null)->get('beranda')->row();
		$data = [
			'data' => $data,
			'scriptExtra' => 'admin/beranda/edit_js'
		];
		$view['title'] = 'Front Beranda';
		$view['content'] = 'admin/beranda/edit';
		$this->template->display($view, $data);
	}

	public function edit($id = null)
	{

		$this->db->where('id', $id);
		$data = $this->db->get('beranda')->row();
		$data = [
			'data' => $data,
			'scriptExtra' => 'admin/beranda/edit_js'
		];
		$view['title'] = 'Front Beranda';
		$view['content'] = 'admin/beranda/edit';
		$this->template->display($view, $data);
	}

	public function tambah()
	{
		$data = [
			'scriptExtra' => 'admin/beranda/add_js'
		];
		$view['title'] = 'Front Beranda';
		$view['content'] = 'admin/beranda/add';
		$this->template->display($view, $data);
	}

	public function do_update()
	{
		$id = $this->input->post('id');

		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'trim|required');

		if ($this->form_validation->run() == false) {
			$beranda_id = decode_id($id);
            redirect('admin/beranda/edit/' . $beranda_id);
        } else {
			$beranda_id = decode_id($id);

			$berita = $this->beranda->update($beranda_id, $this->input->post());

			if ($berita) {
				$response = [
					'status' => true,
					'pesan' => 'Data Tersimpan'
				];
            } else {
				$response = [
					'status' => true,
					'pesan' => 'Data Tersimpan'
				];
            }
			// echo $berita;
			echo json_encode($response);
		}
	}
	public function do_insert()
	{
		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'trim|required');

		if ($this->form_validation->run() == false) {
            redirect('admin/beranda/tambah/');
        } else {

			$berita = $this->beranda->insert($this->input->post());

			if ($berita) {
                $this->session->set_flashdata('msg', 'Data berhasil disimpan');
                redirect('admin/beranda/');
            } else {
                $this->session->set_flashdata('error', 'Terjadi kesalahan saat menyimpan data');
                redirect('admin/beranda/');
            }
			// echo $berita;
		}
	}
	public function hapus($id)
	{
		$this->db->where('id', $id)->update('beranda', [
			'deleted_at' => date('Y-m-d H:i:s'),
		]);

		if ($this->db->affected_rows() > 0) {
			$response = [
				'status' => true,
				'pesan' => 'Berhasil menghapus data',
			];
		} else {
			$response = [
				'status' => false,
				'pesan' => 'Gagal menghapus data',
			];
		}

		echo json_encode($response);
	}
}
