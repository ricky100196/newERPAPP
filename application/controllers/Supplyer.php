<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class supplyer extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_supplyer_table', 'm_main');
	}

	public function index()
	{

		$data = [
			'scriptExtra' => 'supplyer/js',
		];
		$view['title'] = 'Data supplyer';
		$view['content'] = 'supplyer/index';
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
			$row[] = ucfirst($field->supplier_name);
			$row[] = $field->telp.'<br>'.$field->email;
			$row[] = '<b>Pengiriman</b><br>'.$field->delivery_address.'<br><b>Tagihan</b><br>'.$field->invoice_address;
			$row[] = '<b>'.strtoupper($field->payment_method).'</b><br>'.strtoupper($field->payment_term);
			$row[] = $field->npwp;
			$row[] = $field->pic.'<br>'.$field->pic_phone;
			$row[] =   '<a href="' . site_url('supplyer/detail/' . encode_id($field->id)) . '" class="btn btn-sm btn-primary">Detail</a>&nbsp;<a href="' . site_url('supplyer/edit/' . encode_id($field->id)) . '" class="btn btn-sm btn-info">Edit</a>&nbsp;<a href="javascript:;" data-nama="'.$field->supplier_name.'" data-id="'.encode_id($field->id).'" class="btn btn-sm btn-danger mr-1 mb-0" onclick="doHapus(this)">Hapus</a>';

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
		$data['scriptExtra'] = 'supplyer/form_js';
		$view['title'] = 'Data Supplyer';
		$view['content'] = 'supplyer/form';
		$this->template->display($view, $data);
	}

	public function edit($id)
	{
		$data['data'] = $this->db->where('id', decode_id($id))->get('data_supplier')->row();
		$data['scriptExtra'] = 'supplyer/form_js';
		$data['id'] = $id;
		$view['title'] = 'Data supplyer';
		$view['content'] = 'supplyer/form';
		$this->template->display($view, $data);
	}

	public function save($id_ = null)
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('group', 'Vendor Group', 'required');
		$this->form_validation->set_rules('telp', 'Nomor Telepon', 'required');

		if ($this->form_validation->run() == FALSE) {
			$response = [
				'status' => false,
				'message' => 'Data Utama Harus Dilengkapi',
			];
		} else {
			$data_insert = [
				'supplier_name' => $this->input->post('nama', true),
				'group' => $this->input->post('group', true),
				'telp' => $this->input->post('telp', true),
				'email' => $this->input->post('email', true),
				'delivery_address' => $this->input->post('delivery_address', true),
				// 'invoice_address' => $this->input->post('invoice_address', true),
				'country' => $this->input->post('country', true),
				'pic' => $this->input->post('pic_name', true),
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

				$this->db->set($data_insert)->where('id', $id)->update("data_supplier");
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

				$this->db->insert("data_supplier", $data_insert);
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
		$this->db->where('id', $id)->update('data_supplier', [
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
		$supplyer = $this->db->from('data_supplier')->where('id',$id)->get()->row_array();
		$scan_dok = $this->db->from('scan_dokumen')->where('id_supplier',$supplyer['id'])->where('id_detail !=',NULL)->group_by('id_dokumen')->get()->result();
		
		$data = [
			'scriptExtra' => 'operator/supplyer/detail/js',
			'supplyer' => $supplyer,
			'scan_dok' => $scan_dok,
		];
		$view['title'] = 'Detail supplyer';
		$view['content'] = 'operator/supplyer/detail/index';
		$this->template->display($view, $data);
	}
}
