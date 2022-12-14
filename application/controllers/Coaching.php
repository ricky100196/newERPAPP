<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Coaching extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$type = $this->type;
		$id = decode_id($this->id);

		if ($type == 'coach') {
			$data = [
				'scriptExtra' => 'coaching/daftar_instrumen_js',
				'data' => $this->db->query("SELECT a.*, b.nama, b.nuptk, b.program as program_bi, b.instansi, b.email, b.no_hp
	                FROM instrumen_data a
	                JOIN guru_data b ON a.id_guru=b.id and b.deleted is null
	                WHERE a.deleted is null and id_coach=" . $id . "
	                ORDER BY b.nama asc")->result(),
			];
			$view['title'] = 'Daftar Instrumen Guru';
			$view['content'] = 'coaching/daftar_instrumen';

			$this->template->display($view, $data);
		} else if ($type == 'supervisor' || $type == 'dinas') {
			$data = [
				'scriptExtra' => 'coaching/daftar_instrumen_js',
			];
			$view['title'] = 'Daftar Instrumen Guru';
			$view['content'] = 'coaching/daftar_instrumen_supervisor';

			if ($type == 'supervisor') {
				$data['data'] = $this->db->query("SELECT a.*, b.nama, b.program as program_bi, b.instansi, b.email, b.no_hp, c.nama as nama_coach  
				FROM instrumen_data a
				JOIN guru_data b ON a.id_guru=b.id and b.deleted is null
				JOIN coach_data c ON a.id_coach=c.id and c.deleted is null
				WHERE a.deleted is null and id_supervisor=" . $id . "
				ORDER BY b.nama asc")->result();
			} elseif ($type == 'dinas') {
				$kode_kab = $this->session->userdata('kode_kab');
				$data['data'] = $this->db->query("SELECT a.*, b.nama, b.program as program_bi, b.instansi, b.email, b.no_hp, c.nama as nama_coach  
				FROM instrumen_data a
				JOIN guru_data b ON a.id_guru=b.id and b.deleted is null
				JOIN coach_data c ON a.id_coach=c.id and c.deleted is null
				WHERE a.deleted is null and c.kode_kab='$kode_kab'
				ORDER BY b.nama asc")->result();
			}

			$this->template->display($view, $data);
		} else if ($type == 'guru') {
			$data = [
				'scriptExtra' => 'coaching/daftar_instrumen_js',
				'data' => $this->db->query("SELECT a.*, b.nama, b.nuptk, b.program as program_bi, b.instansi, b.email, b.no_hp
	                FROM instrumen_data a
	                JOIN guru_data b ON a.id_guru=b.id and b.deleted is null
	                WHERE a.deleted is null and id_guru=" . decode_id($this->id) . "
	                ORDER BY b.nama asc")->result(),
			];
			$view['title'] = 'Daftar Instrumen Guru';
			$view['content'] = 'coaching/daftar_instrumen';

			$this->template->display($view, $data);
		} else {
			redirect('admin');
		}
	}

	public function sess()
	{
		echo json_encode($_SESSION);
	}

	public function guru($id)
	{
		$type = $this->type;
		$id = decode_id($id);

		$get_data = $this->db->where('id', $id)->get('instrumen_data')->row();
		$coach_data = $this->db->select('a.*, b.nama as nama_kab, c.nama as nama_prov')->where('id', $get_data->id_coach)->join('ref_kabupaten b', 'a.kode_kab = b.kode_wilayah', 'left')->join('ref_provinsi c', 'a.kode_prov = c.kode_wilayah', 'left')->get('coach_data a')->row();
		$user_chat = $this->db->from($type . '_data')->where(['id' => decode_id($this->id)])->get()->row();

		//profil guru
		$profile_guru = $this->db->select('a.*, b.nama as nama_kab, c.nama as nama_prov')->from('guru_data a')->join('ref_kabupaten b', 'a.kode_kab = b.kode_wilayah', 'left')->join('ref_provinsi c', 'a.kode_prov = c.kode_wilayah', 'left')->where('id', $get_data->id_guru)->get()->row();

		//instrumen guru
		$instrumen = $get_data;
		$program = $this->db->from('ref_program')->where('id', $instrumen->id_program)->get()->row();
		$soal = $this->db->select('b.*, a.soal, a.id as id_soal, a.no')->from('instrumen_soal a')->join('instrumen_jawaban b', "a.id = b.id_soal AND id_instrumen = $instrumen->id", 'left')->order_by('a.id', 'asc')->get()->result();
		/*foreach ($soal as $key => $value) {
			$soal[$key]->file = $this->db->from('instrumen_jawaban_upload')->where('id_instrumen', $value->id_instrumen)->where('id_soal', $value->id_soal)->where('deleted_at', null)->order_by('id', 'desc')->get()->result();
		}*/
		$jawaban = [];
		foreach ($soal as $key => $value) {
			$jawaban[$value->id_soal] = $value->jawaban;
		}

		//chat
		$chat = $this->db->where('id_instrumen', $id)->where('deleted_at is null')->order_by('id', 'asc')->get('chat_request')->result_array();

		$data = [
			'scriptExtra' => 'coaching/index_js',
			'guru' => $profile_guru,
			'coach' => $coach_data,
			'chat_request' => $chat,
			'user_chat' => $user_chat,
			'instrumen_id' => encode_id($get_data->id),
			'soal' => $soal,
			'jawaban' => $jawaban,
			'instrumen' => $instrumen,
			'program' => $program,
			'file_pendukung' => $this->db->from('instrumen_jawaban_upload')->where('id_instrumen', $instrumen->id)->where('deleted_at', null)->order_by('id', 'desc')->get()->result(),
		];

		$view['title'] = 'Coaching / Ekosistem Sekolah Merdeka';
		$view['content'] = 'coaching/index';

		$this->template->display($view, $data);
	}

	public function instrumen($id_program = NULL)
	{
		$id_guru = decode_id($this->id);
		$id_program = decode_id($id_program);
		// echo $id_guru;die;
		$instrumen = $this->db->from('instrumen_data')->where(['id_guru' => $id_guru])->get();
		if ($instrumen->num_rows() < 1) {
			$program = $this->db->from('ref_program')->where('id', $id_program)->get()->row();

			$dt = array(
				'id_guru' => $id_guru,
				'id_program' => @$program->id,
				'program' => @$program->program,
				'created' => date('Y-m-d H:i:s')
			);

			$this->db->insert('instrumen_data', $dt);
			$id = $this->db->insert_id();

			$instrumen = $this->db->from('instrumen_data')->where(['id' => $id])->get();
		}
		$instrumen = $instrumen->row();
		$program = $this->db->from('ref_program')->where('id', $instrumen->id_program)->get()->row();

		$this->session->set_userdata('program', $instrumen->program);

		$soal = $this->db->select('b.*, a.soal, a.id as id_soal, a.no')->from('instrumen_soal a')->join('instrumen_jawaban b', "a.id = b.id_soal AND id_instrumen = $instrumen->id", 'left')->order_by('a.id', 'asc')->get()->result();
		foreach ($soal as $key => $value) {
			$soal[$key]->file = $this->db->from('instrumen_jawaban_upload')->where('id_instrumen', $value->id_instrumen)->where('id_soal', $value->id_soal)->where('deleted_at', null)->order_by('id', 'desc')->get()->result();
		}
		// echo json_encode($soal);die;
		$data = array(
			'soal' => $soal,
			'instrumen' => $instrumen,
			'program' => $program,
			'guru' => $this->db->select('a.*, b.nama as nama_kab, c.nama as nama_prov')->from('guru_data a')->join('ref_kabupaten b', 'a.kode_kab = b.kode_wilayah', 'left')->join('ref_provinsi c', 'a.kode_prov = c.kode_wilayah', 'left')->where('id', $id_guru)->get()->row(),
			'scriptExtra' => 'guru/instrumen_js'
		);

		// print_r($this->db->last_query());
		$view['title'] = 'Instrumen';
		$view['content'] = 'guru/instrumen';

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

	public function send_chat($instrumen_id)
	{
		$send['id_instrumen'] = decode_id($instrumen_id);
		$send['id_pengirim'] = decode_id($this->id);
		$send['type_pengirim'] = $this->type;
		$send['nama_pengirim'] = $this->nama;
		$send['chat'] = $this->input->post('chat', true);
		$send['created_at'] = date('Y-m-d H:i:s');
		$date = date('YmdHis', strtotime($send['created_at']));

		if ($_FILES['attachment_file']['name'] != '' && $_FILES['attachment_file']['name'] != null) {
			$this->load->library('upload');
			$path = "uploads/chat_attachment/" . $send['id_instrumen'];
			if (!file_exists($path)) {
				mkdir("uploads/chat_attachment/" . $send['id_instrumen'], 0777, TRUE);
			}
			$this->upload->initialize(array(
				"upload_path"	=> "./uploads/chat_attachment/" . $send['id_instrumen'],
				// "allowed_types" => 'png|jpg|jpeg|gif|pdf|word|',
				"allowed_types" => '*',
				"max_size" => 2 * 1024,
				"file_name" => 'Attachfile_' . $send['id_pengirim'] . '_' . $date
			));

			if ($this->upload->do_upload('attachment_file')) {
				$send['attachment_file'] = $this->upload->data('file_name');
			} else {
				var_dump($this->upload->display_errors());
				exit;
			}
		}

		$ins = $this->db->where('id', $send['id_instrumen'])->get('instrumen_data')->row();
		if ($this->type == 'guru') {
			$role = 'peserta';
			$get_data = $this->db->where('id', $ins->id_coach)->get('coach_data')->row_array();
		} else if ($this->type == 'coach') {
			$role = 'coach';
			$get_data = $this->db->where('id', $ins->id_guru)->get('guru_data')->row_array();
		}

		$this->load->library('api_wa');
		$message = "Hi " . $send['nama_pengirim'] . ", \nAnda mendapat balasan/pesan dari " . strtoupper($role) . " a/n " . $get_data['nama'] . ".\nSilahkan buka Aplikasi Coaching Sekolah Merdeka untuk melihat pesan \n\nBalai Guru Penggerak \nKalimantan Selatan.";
		$this->api_wa->send($get_data['no_hp'], $message);

		$this->db->insert('chat_request', $send);
		redirect('coaching/guru/' . $instrumen_id);
	}

	public function delete_chat()
	{
		$id = decode_id($this->input->post('id'));
		$this->db->where('id', $id)->update('chat_request', ['deleted_at' => date("Y-m-d H:i:s")]);
		if ($this->db->affected_rows() > 0) {
			echo json_encode(['status' => '1']);
		} else {
			echo json_encode(['status' => '0']);
		}
	}

	public function done_chat($instrumen_id)
	{
		$id = decode_id($instrumen_id);
		if ($this->input->post('checklist_chat') == '1') {
			$this->db->set('selesai', '1')->where('id', $id)->update('instrumen_data');
		}
		redirect('coaching');
	}

	public function submit_rating($id)
	{
		$rating = $this->input->post('rating');
		$ulasan_peserta = $this->input->post('ulasan_peserta');


		$this->db->where('id', $id)->update('instrumen_data', ['selesai' => '1', 'rating' => $rating, 'ulasan_peserta' => $ulasan_peserta]);
		$this->session->set_flashdata('success', 'Terimakasih telah memberi rating dan ulasan.');
		redirect($_SERVER['HTTP_REFERER']);
	}

	function get_time_call($id, $ket)
	{
		if ($ket == 'guru') {
			$this->db->where('id', $id)->update('instrumen_data', ['call_time_guru' => date('Y-m-d H:i:s')]);
		} else {
			$this->db->where('id', $id)->update('instrumen_data', ['call_time_coach' => date('Y-m-d H:i:s')]);
		}
	}
}
