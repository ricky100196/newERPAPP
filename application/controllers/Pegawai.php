<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Pegawai extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_pegawai_table', 'm_main');
	}

	public function index()
	{

		$data = [
			'scriptExtra' => 'pegawai/js',
		];
		$view['title'] = 'Data pegawai';
		$view['content'] = 'pegawai/index';
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
			$row[] = ucfirst($field->nama);
			$row[] = $field->nip;
			$row[] = $field->nik;
			$row[] = $field->jenis_kelamin;
			$row[] = $field->npwp;
			$row[] = $field->no_hp;
			$row[] =   '<a href="' . site_url('pegawai/detail/' . encode_id($field->id)) . '" class="btn btn-sm btn-primary">Detail</a>&nbsp;<a href="' . site_url('pegawai/edit/' . encode_id($field->id)) . '" class="btn btn-sm btn-info">Edit</a>&nbsp;<a href="javascript:;" data-nama="'.$field->pegawai_name.'" data-id="'.encode_id($field->id).'" class="btn btn-sm btn-danger mr-1 mb-0" onclick="doHapus(this)">Hapus</a>';

			$data[] = $row;
		}

		$output = array(
			"draw" => $_GET['draw'],
			"recordsTotal" => $this->m_main->count_all(),
			"recordsFiltered" => $this->m_main->count_filtered(),
			"data" => $data,
		);
		echo json_encode($output);
	}

	public function add()
	{	
		$data['scriptExtra'] = 'pegawai/form_js';
		$view['title'] = 'Data Pegawai';
		$view['content'] = 'pegawai/form';
		$this->template->display($view, $data);
	}

	public function edit($id)
	{
		$data['data'] = $this->db->where('id', decode_id($id))->get('data_pegawai')->row();
		$data['scriptExtra'] = 'pegawai/form_js';
		$data['id'] = $id;
		$view['title'] = 'Data pegawai';
		$view['content'] = 'pegawai/form';
		$this->template->display($view, $data);
	}

	public function save($id_ = null)
	{
		$this->form_validation->set_rules('pegawai_name', 'Nama pegawai', 'required');
		// $this->form_validation->set_rules('group', 'Vendor Group', 'required');
		// $this->form_validation->set_rules('telp', 'Nomor Telepon', 'required');

		if ($this->form_validation->run() == FALSE) {
			$response = [
				'status' => false,
				'message' => 'Data Utama Harus Dilengkapi',
			];
		} else {
			$data_insert = [
				'pegawai_name' => $this->input->post('pegawai_name', true),
				'group' => $this->input->post('group', true),
				'telp' => $this->input->post('telp', true),
				'email' => $this->input->post('email', true),
				'delivery_address' => $this->input->post('delivery_address', true),
				'invoice_address' => $this->input->post('invoice_address', true),
				'country' => $this->input->post('country', true),
				'pic_name' => $this->input->post('pic_name', true),
				'pic_phone' => $this->input->post('pic_phone', true),
				'sales_tax' => $this->input->post('sales_tax', true),
				'currency' => $this->input->post('currency', true),
				'npwp' => $this->input->post('npwp', true),
				'delivery_type' => $this->input->post('delivery_type', true),
				'delivery_term' => $this->input->post('delivery_term', true),
				'payment_term' => $this->input->post('payment_term', true),
				'payment_method' => $this->input->post('payment_method', true),
			];

			if($id_!=null) {
				$id = decode_id($id_);
				$data_insert['updated_at'] = date('Y-m-d H:i:s');
				$data_insert['updated_by'] = decode_id($this->id);

				$this->db->set($data_insert)->where('id', $id)->update("data_pegawai");
				if ($this->db->affected_rows() > 0) {
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
				$data_insert['created_at'] = date('Y-m-d H:i:s');
				$data_insert['created_by'] = decode_id($this->id);

				$this->db->insert("data_pegawai", $data_insert);
				if ($this->db->affected_rows() > 0) {
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

	public function delete($id_)
	{
		$id = decode_id($id_);
		$this->db->where('id', $id)->update('data_pegawai', [
			'deleted_at' => date('Y-m-d H:i:s'),
			'deleted_by' => decode_id($this->id),
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

	public function detail($id)
	{
		$id = decode_id($id);

		$data = [];
		$pegawai = $this->db->from('data_pegawai')->where('id',$id)->get()->row_array();
		$scan_dok = $this->db->from('scan_dokumen')->where('id_pegawai',$pegawai['id'])->where('id_detail !=',NULL)->group_by('id_dokumen')->get()->result();
		
		$data = [
			'scriptExtra' => 'operator/pegawai/detail/js',
			'pegawai' => $pegawai,
			'scan_dok' => $scan_dok,
		];
		$view['title'] = 'Detail pegawai';
		$view['content'] = 'operator/pegawai/detail/index';
		$this->template->display($view, $data);
	}
}
