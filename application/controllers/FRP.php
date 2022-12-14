<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class FRP extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_FRP_table', 'm_main');
	}

	public function index()
	{

		$data = [
			'scriptExtra' => 'FRP/js',
		];
		$view['title'] = 'Data FRP';
		$view['content'] = 'FRP/index';
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
			$row[] = $field->po_no;
			$row[] = $field->customer_name;
			$row[] = $field->product_name;
			$row[] = $field->po_date;
			$row[] = $field->qty_po;
			$row[] = $field->delivery_date;
			$row[] =   '<a href="' . site_url('FRP/detail/' . encode_id($field->id)) . '" class="btn btn-sm btn-primary">Detail</a>&nbsp;<a href="' . site_url('FRP/edit/' . encode_id($field->id)) . '" class="btn btn-sm btn-info">Edit</a>&nbsp;<a href="javascript:;" data-nama="'.$field->customer_name.'" data-id="'.encode_id($field->id).'" class="btn btn-sm btn-danger mr-1 mb-0" onclick="doHapus(this)">Hapus</a>&nbsp;<a href="' . site_url('FRP/detail/' . encode_id($field->id)) . '" class="btn btn-sm btn-primary">Invoice</a>';

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
		$data['scriptExtra'] = 'FRP/form_js';
		$data['perusahaan'] = $this->db->where('deleted_at is null')->get('data_customer')->result_array();
		$data['product'] = $this->db->where('deleted_at is null')->get('data_product')->result_array();
		$data['supplier'] = $this->db->where('deleted_at is null')->get('data_supplier')->result_array();
		$data['material'] = $this->db->where('deleted_at is null')->get('data_material')->result_array();
		$view['title'] = 'Data FRP';
		$view['content'] = 'FRP/form';
		$this->template->display($view, $data);
	}

	public function edit($id)
	{
		$data['data'] = $this->db->where('id', decode_id($id))->get('data_FRP')->row();
		$data['scriptExtra'] = 'FRP/form_js';
		$data['id'] = $id;
		$view['title'] = 'Data FRP';
		$view['content'] = 'FRP/form';
		$this->template->display($view, $data);
	}

	public function save($id_ = null)
	{
		// $this->form_validation->set_rules('id_FRP', 'id_FRP', 'required');
		$this->form_validation->set_rules('customer_id', 'customer_id', 'required');
		//$this->form_validation->set_rules('material', 'id_material', 'required');

		if ($this->form_validation->run() == FALSE) {
			$response = [
				'status' => false,
				'message' => 'Data Utama Harus Dilengkapi',
			];
		} else {
			$data_insert = [
				'id_supplier' => $this->input->post('suppier_id', true),
				'id_customer' => $this->input->post('customer_id', true),
				'id_material' => $this->input->post('material_id', true),
				'id_product' => $this->input->post('product_id', true),
				'po_no' => $this->input->post('no_po', true),
				'qty_po' => $this->input->post('qty_po', true),
				'po_date' => $this->input->post('tgl_po', true),
				'delivery_date' => $this->input->post('tgl_delivery', true),
			];

			if($id_!=null) {
				$id = decode_id($id_);
				$data_insert['updated_at'] = date('Y-m-d H:i:s');
				$data_insert['updated_by'] = decode_id($this->id);

				$this->db->set($data_insert)->where('id', $id)->update("data_FRP");
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

				$this->db->insert("data_FRP", $data_insert);
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
		$this->db->where('id', $id)->update('data_FRP', [
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
		$FRP = $this->db->from('data_FRP')->where('id',$id)->get()->row_array();
		// $scan_dok = $this->db->from('scan_dokumen')->where('id_FRP',$FRP['id'])->where('id_detail !=',NULL)->group_by('id_dokumen')->get()->result();

		$data = [
			'scriptExtra' => 'FRP/form_js',
			'FRP' => $FRP,
			// 'scan_dok' => $scan_dok,
		];
		$view['title'] = 'Detail FRP';
		$view['content'] = 'FRP/form';
		$this->template->display($view, $data);
	}
}
