<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Supervisor extends MY_Controller
{var $filePath = 'uploads/supervisor/';
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('custom_helper');
	}

	public function index()
	{
		$id_guru = decode_id($this->id);
		$profile = $this->db->from('supervisor_data')->where(['id' => $id_guru])->get()->row();
		$provinsi = $this->db->from('ref_provinsi')->get()->result();
		$data = [
			'scriptExtra' => 'supervisor/dashboard_js', 
			'profile'     => $profile,
			'menu_id' => $this->id,
			'provinsi' => $provinsi,
		];

		$view['title'] = 'Dashboard';
		$view['content'] = 'supervisor/dashboard';

		$this->template->display($view, $data);
	}
	public function get_kota()
	{
		$id = $this->input->post('id');
		$data= $this->db->where('kode_prop', $id)->get('ref_kabupaten')->result();
		echo json_encode($data);
	}

	public function edit()
	{
		$provinsi = '';
		$kota = '';
		if ($this->input->post('provinsi') !== null) {
			$kode_provinsi = $this->db->from('ref_provinsi')->where('kode_wilayah', $this->input->post('provinsi'))->get()->row();
			if (!empty($kode_provinsi)) {
				$provinsi = $kode_provinsi->nama;
			}
		}
		if ($this->input->post('kota') !== null) {
			$kode_kota = $this->db->from('ref_kabupaten')->where('kode_wilayah', $this->input->post('kota'))->get()->row();

			if (!empty($kode_kota)) {
				$kota = $kode_kota->nama;
			}
		}
		$data = [
			'nama' => $this->input->post('nama'),
			'instansi' => $this->input->post('instansi'),
			'no_hp' => $this->input->post('no_hp'),
			'email' => $this->input->post('email'), 
			'jabatan' => $this->input->post('jabatan'),
			'alamat' => $this->input->post('alamat'),
			'tgl_lahir' => $this->input->post('tgl_lahir'),
			'jk' => $this->input->post('jk'),
			'password' => md5($this->input->post('password')),
			'pass_asli' => $this->input->post('password'),
			'kode_prov' => $this->input->post('provinsi'),
			'kode_kab' => $this->input->post('kota'),
			'kab' => $kota,
			'prov' => $provinsi
		];

		$image = uploadFile('image', $this->filePath, false, 'gif|jpg|png|jpeg');

		// print_r($image);
		if ($image['status']) {
		    $data['foto_path'] = $image['path'];
		}

		$this->db->where('id', $this->input->post('id'));
		if ($this->db->update("supervisor_data", $data) == TRUE) {
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
		echo json_encode($response);
	}


	public function instrumen()
	{
		$id_supervisor = decode_id($this->id);
		// echo $id_supervisor;die;
		$instrumen = $this->db->from('instrumen_data')->where(['id_supervisor' => $id_supervisor])->get();
		if ($instrumen->num_rows() < 1) {

			$dt = array(
				'id_supervisor' => $id_supervisor,
				'created' => date('Y-m-d H:i:s')
			);

			$this->db->insert('instrumen_data', $dt);
			$id = $this->db->insert_id();

			$instrumen = $this->db->from('instrumen_data')->where(['id' => $id])->get();
		}
		$instrumen = $instrumen->row();

		$soal = $this->db->select('b.*, a.soal, a.id as id_soal, a.no')->from('instrumen_soal a')->join('instrumen_jawaban b', "a.id = b.id_soal AND id_instrumen = $instrumen->id", 'left')->get()->result();
		foreach ($soal as $key => $value) {
			$soal[$key]->file = $this->db->from('instrumen_jawaban_upload')->where('id_instrumen', $value->id_instrumen)->where('id_soal', $value->id_soal)->where('deleted_at', null)->order_by('id', 'desc')->get()->result();
		}
		// echo json_encode($soal);die;
		$data = array(
			'soal' => $soal,
			'instrumen' => $instrumen,
			'supervisor' => $this->db->select('a.*, b.nama as nama_kab, c.nama as nama_prov')->from('supervisor_data a')->join('ref_kabupaten b', 'a.kode_kab = b.kode_wilayah')->join('ref_provinsi c', 'a.kode_prov = c.kode_wilayah')->where('id', $id_supervisor)->get()->row(),
			'scriptExtra' => 'supervisor/instrumen_js'
		);

		// print_r($this->db->last_query());
		$view['title'] = 'Instrumen';
		$view['content'] = 'supervisor/instrumen';

		$this->template->display_form($view, $data);
	}

	public function upload_multi($id_instrumen, $id_soal)
	{
		$id_instrumen = decode_id($id_instrumen);
		$id_soal = decode_id($id_soal);
		$this->load->library('upload');
		$path = "uploads/instrumen/" . $id_instrumen;
		if (!file_exists($path)) {
			mkdir("uploads/instrumen/" . $id_instrumen, 0777, TRUE);
		}
		$this->upload->initialize(array(
			"upload_path"	=> "./uploads/instrumen/" . $id_instrumen,
			"allowed_types" => 'png|jpg|jpeg|gif|pdf',
			"max_size" => '150000',
			"encrypt_name" => true
		));

		if ($this->upload->do_upload('file')) {
			$uploaded = $this->upload->data();
			if (array_key_exists('0', $uploaded)) {
				foreach ($uploaded as $key => $value) {
					$file_name = $value['file_name'];
					$file_size = $value['file_size'];
					$orig_name = $value['orig_name'];
					$data_insert_doc = [
						'id_instrumen' => $id_instrumen,
						'id_soal' => $id_soal,
						'nama_file' => $file_name,
						'orig_name' => $orig_name,
						'file_size' => $file_size,
						'created_at' => date("Y-m-d H:i:s")
					];
					$this->db->insert("instrumen_jawaban_upload", $data_insert_doc);
				}
			} else {
				$file_name = $this->upload->data('file_name');
				$file_size = $this->upload->data('file_size');
				$orig_name = $this->upload->data('orig_name');
				$data_insert_doc = [
					'id_instrumen' => $id_instrumen,
					'id_soal' => $id_soal,
					'nama_file' => $file_name,
					'orig_name' => $orig_name,
					'file_size' => $file_size,
					'created_at' => date("Y-m-d H:i:s")
				];
				$this->db->insert("instrumen_jawaban_upload", $data_insert_doc);
			}
		}
	}

	public function jawab()
	{
		$id_instrumen = decode_id($this->input->post('id_instrumen', true));
		$id_soal = decode_id($this->input->post('id_soal', true));
		$val = $this->input->post('val');
		// echo $val;die;
		$where = array(
			'id_instrumen' => $id_instrumen,
			'id_soal' => $id_soal
		);
		$cek = $this->db->where($where)->get('instrumen_jawaban')->result();
		if ($cek) {
			$dt['jawaban'] = $val;
			$this->db->where($where)->update('instrumen_jawaban', $dt);
		} else {
			$dt['jawaban'] = $val;
			$dt['id_soal'] = $id_soal;
			$dt['id_instrumen'] = $id_instrumen;
			$dt['created_at'] = date('Y-m-d H:i:s');
			$this->db->insert('instrumen_jawaban', $dt);
		}
	}

	public function save_session()
	{
		$field = $this->input->post('field');
		$val = $this->input->post('val');

		$dt = array(
			$field => $val
		);
		$this->db->where('id', decode_id($this->id))->update('user', $dt);
		$this->session->set_userdata($dt);

		echo json_encode(array('status' => true, 'message' => 'Ok'));
	}

	public function save_instrumen()
	{
		$id = decode_id($this->input->post('id'));
		$field = $this->input->post('field');
		$val = $this->input->post('val');
		$val = str_replace('.', '', $val);

		$cek = $this->db->where(array('id' => decode_id($this->id), 'id_soal' => $id))->get('responden_jawaban')->result();
		if ($cek) {
			$dt = array(
				$field => $val
			);
			$this->db->where(array('id' => decode_id($this->id), 'id_soal' => $id))->update('responden_jawaban', $dt);
		} else {
			$dt = array(
				'id' => decode_id($this->id),
				'id_soal' => $id,
				$field => $val,
			);
			$this->db->insert('responden_jawaban', $dt);
		}

		echo json_encode(array('status' => true));
	}

	public function simpan_submit()
	{
		$instrumen = $this->db->from('instrumen_data')->where('id_supervisor', decode_id($this->id))->get()->row();

		$cek = $this->db->query("SELECT * FROM instrumen_jawaban WHERE id_instrumen = $instrumen->id")->num_rows();

		if ($cek < 5) {
			$this->session->set_flashdata('message', 'Isian instrumen belum lengkap.');
			$this->session->set_flashdata('message_type', 'warning');
			redirect($_SERVER['HTTP_REFERER']);
		} else {
			$this->session->set_flashdata('message', 'Data berhasil disimpan lengkap.');
			$this->session->set_flashdata('message_type', 'success');
			redirect('supervisor');
		}
	}
	public function delete_upload()
	{
		$id = decode_id($this->input->post('id'));
		$data = $this->db->where('id', $id)->update('instrumen_jawaban_upload', ['deleted_at' => date("Y-m-d H:i:s")]);
	}
}
