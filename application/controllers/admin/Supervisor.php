<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Supervisor extends MY_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/supervisor/M_supervisor_model', 'm_main');
	}

	public function index()
	{
		$data = [
            'scriptExtra' => 'admin/supervisor/js',
			'btn_tambah'  => '<a href="' . site_url('admin/supervisor/add') . '" class="btn btn-sm btn-rounded btn-outline-primary"><i class="icon-plus"></i> Tambah</a>'
		
		];
		$view['title'] = 'Data Supervisor';
        $view['content'] = 'admin/supervisor/index';
        $this->template->display($view, $data);
    }

	function get_data_table()
	{
		$list = $this->m_main->get_datatables();
		$data = array();
		$no = $_GET['start'];

		foreach ($list as $field) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = ucfirst($field->nip);
			$row[] = ucfirst($field->nama);
			$row[] = ucfirst($field->instansi);
			$row[] = ucfirst($field->prov);
			$row[] = ucfirst($field->kab);
			$row[] = $field->deleted == null ? '<span class="badge badge-pill badge-success">
            <i class="fa fa-times"></i> Aktif
        </span>' : '<span class="badge badge-pill badge-danger"><i class="fa fa-check"></i> Non Aktif</span>';
			$row[] =   '<a href="' . site_url('admin/supervisor/edit/' . $field->id) . '" class="btn btn-sm btn-primary">Edit</a>&nbsp;
			<a href="javascript:;" data-url="'.site_url('admin/supervisor/hapus/' . $field->id).'" class="btn btn-sm btn-rounded btn-danger mr-1 mb-0" onclick="doHapus(this)"> NONAKTIF </a>';

				// check_access(@$id_menu_hash, 2)==true ? '<button class="btn btn-sm btn-rounded btn-outline-danger mr-1 mb-0"  onclick="delete(\''.$id_menu_hash.'\','. $field->id .')"><i class="fa fa-trash"></i> Hapus</button>':'-';
			;

			$data[] = $row;
		}

		$output = array(
			"draw" => $_GET['draw'],
			"recordsTotal" => $this->m_main->count_all(),
			"recordsFiltered" => $this->m_main->count_filtered(),
			"data" => $data,
		);
		//output dalam format JSON
		echo json_encode($output);
	}

	public function aksi($aksi,$id){
        $id = decode_id($id);
		$cek_exist = $this->db->get_where('supervisor_data',['id' => $id]);
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
			$this->db->where('id', $id)->update('supervisor_data',$dt);
		}
		$this->session->set_flashdata('success', $pesan);
            
        redirect('admin/supervisor');
    }
	public function get_kota()
	{
		$id = $this->input->post('id');
		$data = $this->db->where('kode_prop', $id)->get('ref_kabupaten')->result();
		echo json_encode($data);
	}
	function add()
	{
		$provinsi = $this->db->from('ref_provinsi')->get()->result();
		$data['csrf'] = [
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash()
		];
		$data['scriptExtra'] 	= 'admin/supervisor/form_js';
		$data['id']         	= '';
		$data['provinsi']   	= $provinsi;
		$view['title'] 			= 'Data supervisor';
		$view['content'] 		= 'admin/supervisor/form';
		$this->template->display($view, $data);
	}

	function edit($id = null)
	{
		$provinsi = $this->db->from('ref_provinsi')->get()->result();
		$data['csrf'] = [
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash()
		];
		$data['scriptExtra'] 	= 'admin/supervisor/form_js';
		$data['id'] 			= $id;
		$data['provinsi']   	= $provinsi;
		$data['data'] 			= $this->m_main->get_where_id($id);
		$view['title'] 			= 'Data supervisor';
		$view['content'] 		= 'admin/supervisor/form';
		$this->template->display($view, $data);
	}

	function simpan()
	{
		$this->form_validation->set_rules('provinsi', 'Provinsi', 'required');
		$this->form_validation->set_rules('kota', 'Kota', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('no_hp', 'No Handphone', 'required');
		$this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required');
		$this->form_validation->set_rules('nip', 'NIP', 'required');
		$this->form_validation->set_rules('nik', 'NIK', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('failed', '<i class="fa fa-times"></i> Kolom dengan tanda * harus diisi.');
		} else {
			$nama_provinsi = '';
			$nama_kota = '';
			if ($this->input->post('provinsi') !== null && $this->input->post('provinsi') !== 0) {
				$provinsi = $this->db->from('ref_provinsi')->where('kode_wilayah', $this->input->post('provinsi'))->get()->row();

				$nama_provinsi = $provinsi->nama;
			}
			if ($this->input->post('kota') !== null && $this->input->post('kota') !== 0) {
				$kota = $this->db->from('ref_kabupaten')->where('kode_wilayah', $this->input->post('kota'))->get()->row();

				$nama_kota = $kota->nama;
			}

			$data_insert = [
				'nama' => $this->input->post('nama'),
				'nip' => $this->input->post('nip'),
				'nik' => $this->input->post('nik'),
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
			];
			$data_insert['prov'] = $nama_provinsi;
			$data_insert['kab'] = $nama_kota;
			if ($this->db->insert("supervisor_data", $data_insert) == TRUE) {
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
	}

	function update()
	{
		$this->form_validation->set_rules('provinsi', 'Provinsi', 'required');
		$this->form_validation->set_rules('kota', 'Kota', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('no_hp', 'No Handphone', 'required');
		$this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required');
		$this->form_validation->set_rules('nip', 'NIP', 'required');
		$this->form_validation->set_rules('nik', 'NIK', 'required');
		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('failed', '<i class="fa fa-times"></i> Kolom dengan tanda * harus diisi.');
		} else {
			$nama_provinsi = '';
			$nama_kota = '';
			if ($this->input->post('provinsi') !== null && $this->input->post('provinsi') !== 0) {
				$provinsi = $this->db->from('ref_provinsi')->where('kode_wilayah', $this->input->post('provinsi'))->get()->row();

				$nama_provinsi = $provinsi->nama;
			}
			if ($this->input->post('kota') !== null && $this->input->post('kota') !== 0) {
				$kota = $this->db->from('ref_kabupaten')->where('kode_wilayah', $this->input->post('kota'))->get()->row();

				$nama_kota = $kota->nama;
			}

			$data_insert = [
				'nama' => $this->input->post('nama'),
				'nip' => $this->input->post('nip'),
				'nik' => $this->input->post('nik'),
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
			];
			$data_insert['prov'] = $nama_provinsi;
			$data_insert['kab'] = $nama_kota;
			$this->db->where('id', $this->input->post('id'));
			if ($this->db->update("supervisor_data", $data_insert) == TRUE) {
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
	}
	public function hapus($id)
	{
		$this->db->where('id', $id)->update('supervisor_data', [
			'deleted' => date('Y-m-d H:i:s'),
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

	public function cek_nip() {
			$nip = $this->input->post('nip');

			$this->db->where('nip', $nip);


		$user =  $this->db->get('view_user');
		if ($user->num_rows() > 0) {
			$send = [
				'status' => '3',
				'title' =>'Informasi',
				'msg' => "Anda Telah Memiliki Akun. \n Gunakan Akun Ini Untuk Login \n Username : ".$user->row()->username,
				'icon' => 'warning',
			];
		} else {
	        $this->load->model('M_api');
			
			$api_lulusan = $this->M_api->cek_coach($nip, true);
			if ($api_lulusan != null) {
				$send = [
					'status' => true,
					'title' => 'Berhasil',
					'data' => $api_lulusan,
					'msg' => "Data ditemukan!",
					'icon' => 'error',
				];
	        } else {
	        	$send = [
					'status' => false,
					'title' => 'Gagal',
					'msg' => "Data Tidak Ditemukan. \n Cek Kembali NIK/NUPTK/NIP Anda",
					'icon' => 'error',
				];
	        }
	    } 

	    echo json_encode($send);
	}
}