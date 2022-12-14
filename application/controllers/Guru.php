<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Guru extends MY_Controller
{
	var $filePath = 'uploads/guru/';
	public function __construct()
	{
		parent::__construct();

		$this->load->model('guru/M_guru_model', 'm_main');
	}

	public function index()
	{
		$id_guru = decode_id($this->id);
		$profile = $this->db->from('guru_data')->where(['id' => $id_guru])->get()->row();
		$provinsi = $this->db->from('ref_provinsi')->get()->result();
		$data = [
			'scriptExtra' => 'guru/dashboard_js',
			'profile'     => $profile,
			'menu_id' => $this->id,
			'provinsi' => $provinsi,
		];

		$view['title'] = 'Dashboard';
		$view['content'] = 'guru/dashboard';

		$this->template->display($view, $data);
	}

	public function get_kota()
	{
		$id = $this->input->post('id');
		$data = $this->db->where('kode_prop', $id)->get('ref_kabupaten')->result();
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
			'status_lulus' => $this->input->post('status_lulus'),
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
		if ($this->db->update("guru_data", $data) == TRUE) {
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
		$id_guru = decode_id($this->id);
		$instrumen = $this->db->from('instrumen_data')->where(['id_guru' => $id_guru, 'deleted' => NULL, 'selesai !=' => '1'])->get();
		// print_r() ;die;
		if ($instrumen->num_rows() > 0 ) {

			$instrumen = $this->db->from('instrumen_data')->where(['id' => $instrumen->row()->id, 'deleted' => NULL])->get()->row();
			$id_instrumen = @$instrumen->id;

		}else{
			$dt = array(
				'id_guru' => @$id_guru,
				'updated' => date('Y-m-d H:i:s')
			);
			$this->db->insert('instrumen_data', $dt);
			$id_instrumen = @$this->db->insert_id();
			$instrumen = $this->db->from('instrumen_data')->where(['id' => $id_instrumen])->get()->row();
		}
		
		$soal = $this->db->select('b.*, a.soal, a.id as id_soal, a.no')->from('instrumen_soal a')->join('instrumen_jawaban b', "a.id = b.id_soal AND id_instrumen = $id_instrumen", 'left')->order_by('a.id', 'asc')->get()->result();
		$jawaban = [];
		foreach ($soal as $key => $value) {
			$jawaban[$value->id_soal] = $value->jawaban;
		}

		$ref_program = $this->db->get('ref_program')->result();

		// echo json_encode($jawaban);die;
		$data = array(
			'soal' => $soal,
			'instrumen' => $instrumen,
			'ref_program' => $ref_program,
			'jawaban' => $jawaban,
			'file_pendukung' => $this->db->from('instrumen_jawaban_upload')->where('id_instrumen', $id_instrumen)->where('deleted_at', null)->order_by('id', 'desc')->get()->result(),
			'guru' => $this->db->select('a.*, b.nama as nama_kab, c.nama as nama_prov')->from('guru_data a')->join('ref_kabupaten b', 'a.kode_kab = b.kode_wilayah', 'left')->join('ref_provinsi c', 'a.kode_prov = c.kode_wilayah', 'left')->where('id', $id_guru)->get()->row(),
			'scriptExtra' => 'guru/instrumen_js'
		);

		// print_r($this->db->last_query());
		$view['title'] = 'Instrumen';
		$view['content'] = 'guru/instrumen';

		$this->template->display_form($view, $data);
	}

	public function jawab()
	{
		$id_instrumen = decode_id($this->input->post('id_instrumen', true));
		$id_soal = decode_id($this->input->post('id_soal', true));
		$val = $this->input->post('val');
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
		// echo $this->db->last_query();die;
	}

	public function upload_multi($id_instrumen)
	{
		$id_instrumen = decode_id($id_instrumen);
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
					'nama_file' => $file_name,
					'orig_name' => $orig_name,
					'file_size' => $file_size,
					'created_at' => date("Y-m-d H:i:s")
				];
				$this->db->insert("instrumen_jawaban_upload", $data_insert_doc);
			}
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

	public function simpan_submit($kunci = NULL, $id_instrumen=null)
	{	
		$instrumen = $this->db->from('instrumen_data')->where('id', decode_id($id_instrumen))->where('deleted', NULL)->get()->row();

		$cek = $this->db->query("SELECT * FROM instrumen_jawaban WHERE id_instrumen = $instrumen->id")->num_rows();
		// echo json_encode($instrumen);die;
		if ($cek < 4) {
			$this->session->set_flashdata('failed', 'Isian instrumen belum lengkap.');
			redirect($_SERVER['HTTP_REFERER']);
		} else {

			$this->session->set_flashdata('success', 'Isian berhasil disimpan lengkap.');
			if (@$kunci == 'kunci') {
				$this->db->where('id', $instrumen->id)->update('instrumen_data', ['kunci' => '1']);

                if ($instrumen->id_coach==null) {
                    $guru = $this->db->where('id', $instrumen->id_guru)->get('guru_data')->row();
                    $coach = $this->db->query("select a.id, count(*) as jml from coach_data a left join instrumen_data b on a.id=b.id_coach and b.deleted is null where kode_kab='".$guru->kode_kab."' group by a.id having jml < 10 order by jml asc")->row();
                    if ($coach!=null) {
                        $this->db->where('id', $instrumen->id)->update('instrumen_data', array('id_coach' => $coach->id));
                    } else {
                        $coach = $this->db->query("select a.id, count(*) as jml from coach_data a left join instrumen_data b on a.id=b.id_coach and b.deleted is null where kode_prov='".$guru->kode_prov."' group by a.id having jml < 10 order by jml asc")->row();
                        if ($coach!=null) {
                            $this->db->where('id', $instrumen->id)->update('instrumen_data', array('id_coach' => $coach->id));
                        } else {
                        	$coach = $this->db->query("select a.id, count(*) as jml from coach_data a left join instrumen_data b on a.id=b.id_coach and b.deleted is null group by a.id having jml < 10 order by jml asc")->row();
                        	if ($coach!=null) {
                            	$this->db->where('id', $instrumen->id)->update('instrumen_data', array('id_coach' => $coach->id));
                        	}
                        }
                    }
                }

				if ($this->db->affected_rows()) { 
					$this->session->set_flashdata('success', 'Isian berhasil dikunci.');
				} else {
                	$this->session->set_flashdata('failed', 'Gagal mengunci instrumen. Cek kembali koneksi anda.');
                }
			}
			redirect('guru');
		}
	}
	public function delete_upload()
	{
		$id = decode_id($this->input->post('id'));
		$data = $this->db->where('id', $id)->update('instrumen_jawaban_upload', ['deleted_at' => date("Y-m-d H:i:s")]);
	}
}
