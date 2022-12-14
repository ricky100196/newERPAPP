<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Akun extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('bcrypt');
	}

	public function index()
	{
		$data = [
			'groups' => $this->db->get('groups')->result_array(),
			'data' => $this->db->select(' a.*, GROUP_CONCAT(abc.group_name SEPARATOR "<br>- ") as role ')->where('deleted_at is null')->join('(select z.*,group_name from user_group z join groups x on z.group_id=x.id) abc', 'abc.user_id=a.id')->group_by('a.id')->get('users a')->result(),
			'scriptExtra' => 'admin/akun/js'
		];
		$view['title'] = 'Manajemen Akun';
		$view['content'] = 'admin/akun/index';
		$this->template->display($view, $data);
	}

	public function save()
	{
		$this->form_validation->set_rules('nama', 'Nama Pengguna', 'required');
		$this->form_validation->set_rules('username', 'Username Pengguna', 'required');
		if ($this->form_validation->run() == FALSE) {
			$response = [
				'status' => false,
				'message' => 'Data Utama Harus Dilengkapi',
			];
		} else {
			$data_insert['nama'] = $this->input->post('nama', true);
			$data_insert['phone'] = $this->input->post('telp', true);
			$data_insert['email'] = $this->input->post('email', true);
			$data_insert['username'] = $this->input->post('username', true);

			$id_ = $this->input->post('id', true);
			if($id_!='') {
				$id = decode_id($id_);
				$data_insert['updated_at'] = date('Y-m-d H:i:s');
				$data_insert['updated_by'] = decode_id($this->id);
				if ($this->input->post('password', true)!='')
					$data_insert['password'] = $this->bcrypt->hash_password($this->input->post('password', true));

				$this->db->set($data_insert)->where('id', $id)->update("users");
				if ($this->db->affected_rows() > 0) {
					$group = $this->input->post('role', true);

					$response = [
						'status' => true,
						'message' => 'Berhasil Mengubah Data'
					];
				} else {
					$response = [
						'status' => false,
						'message' => 'Gagal Mengubah Data'
					];
				}
			} else {
				$data_insert['password'] = $this->bcrypt->hash_password($this->input->post('password', true));
				$data_insert['created_at'] = date('Y-m-d H:i:s');
				$data_insert['created_by'] = decode_id($this->id);

				$this->db->insert("users", $data_insert);
				if ($this->db->affected_rows() > 0) {
					$id_user = $this->db->insert_id();
					$group = $this->input->post('role', true);
					foreach ($group as $getid) {
						$this->db->insert('user_group', ['user_id'=>$id_user, 'group_id'=>$getid]);
					}

					$response = [
						'status' => true,
						'message' => 'Berhasil Menyimpan Data'
					];
				} else {
					$response = [
						'status' => false,
						'message' => 'Gagal Menyimpan Data'
					];
				}
			}
		}
		echo json_encode($response);
	}

	public function aksi($aksi, $id, $type)
	{
		$id = decode_id($id);
		if ($type == 'admin') {
			$table = 'user';
		} elseif ($type == 'operator') {
			$table = 'operator_data';
		} elseif ($type == 'supervisor') {
			$table = 'supervisor_data';
		} elseif ($type == 'guru') {
			$table = 'guru_data';
		} elseif ($type == 'coach') {
			$table = 'coach_data';
		}
		$cek_exist = $this->db->get_where($table, ['id' => $id]);
		if ($aksi == 'hapus') {
			$dt = array(
				'deleted' => date('Y-m-d H:i:s')
			);
			$pesan = 'Berhasil hapus data.';
		}
		if ($cek_exist->num_rows() > 0) {
			$this->db->where('id', $id)->update($table, $dt);
		}
		$this->session->set_flashdata('success', $pesan);

		redirect('admin/akun');
	}

	public function tambah()
	{
		$data['provinsi'] = $this->db->from('ref_provinsi')->get()->result();
		$data['scriptExtra'] 	= 'admin/akun/tambah_js';
		$view['title'] 			= 'Data Akun';
		$view['content'] 		= 'admin/akun/tambah';
		$this->template->display($view, $data);
	}

	function edit($id = null, $type = null)
	{
		$id = decode_id($id);
		if ($type == 'admin') {
			$table = 'user';
		} elseif ($type == 'operator') {
			$table = 'operator_data';
		} elseif ($type == 'supervisor') {
			$table = 'supervisor_data';
		} elseif ($type == 'guru') {
			$table = 'guru_data';
		} elseif ($type == 'coach') {
			$table = 'coach_data';
		}
		$provinsi = $this->db->from('ref_provinsi')->get()->result();
		$data['csrf'] = [
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash()
		];
		$data['scriptExtra'] 	= 'admin/akun/form_js';
		$data['id'] 			= $id;
		$data['provinsi']   	= $provinsi;
		$data['data'] 			= $this->db->get_where($table, ['id' => $id])->row();
		$view['title'] 			= 'Data Akun';
		$view['content'] 		= 'admin/akun/form';
		$this->template->display($view, $data);
	}

	public function get_kab()
	{
		$kode_prov = $this->input->post('kode_prov');
		$data = $this->db->query("SELECT * from ref_kabupaten where kode_prop='$kode_prov' ")->result();
		echo json_encode([
			'data' => $data,
		]);
	}
}
