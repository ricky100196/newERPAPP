<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_guru_model extends CI_Model
{

    var $table = 'guru_data';
    var $column_order = [null, 'nama'];
    var $column_search = ['nama'];
    var $order = ['created_at' => 'desc'];
    var $filePath = 'uploads/guru/';

    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->helper('custom_helper');
    }
    
    public function update($id, $data)
    {
        $provinsi = '';
		$kota = '';
		if ($this->input->post('provinsi') !== null) {
			$provinsi = $this->db->from('ref_provinsi')->where('kode_wilayah', $this->input->post('provinsi'))->get()->row();
		}
		if ($this->input->post('kota') !== null) {
			$kota = $this->db->from('ref_kabupaten')->where('kode_wilayah', $this->input->post('kota'))->get()->row();
		}
		$update_data = [
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
			'kab' => $kota->nama,
			'prov' => $provinsi->nama,
            'updated_at' => date('Y-m-d H:i:s')
		];

        $image = uploadFile('image', $this->filePath, false, 'gif|jpg|png|jpeg');

        if ($image['status']) {
            $update_data['foto_path'] = $image['path'];
        }

        $this->db->where('id', $id);
        $this->db->update($this->table, $update_data);

        return $this->db->affected_rows() ? true : false;
    }
}
