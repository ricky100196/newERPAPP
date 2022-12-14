<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Supplier_po extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_supplier_po_table', 'm_main');
	}

	public function index()
	{

		$data = [
			'scriptExtra' => 'supplier_po/js',
		];
		$view['title'] = 'Data Form PO';
		$view['content'] = 'supplier_po/index';
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
			$row[] = '<b>'.$field->po_number.'</b>';
			$row[] = tgl_indo($field->po_date);
			$row[] = tgl_indo($field->delivery_date);
			$row[] = strtoupper($field->payment_term);
			$row[] = '<b>'.$field->delivery_address.'</b>';
			$row[] = $field->email.'<br>'.$field->telp;
			$row[] =   '<a href="' . site_url('supplier_po/detail/' . encode_id($field->id)) . '" class="btn btn-sm btn-primary">Detail</a>&nbsp;<a href="' . site_url('supplier_po/export_excel/' . encode_id($field->id)) . '" class="btn btn-sm btn-primary">Cetak</a>&nbsp;<a href="' . site_url('supplier_po/edit/' . encode_id($field->id)) . '" class="btn btn-sm btn-info">Edit</a>&nbsp;<a href="javascript:;" data-nama="'.$field->po_number.'" data-id="'.encode_id($field->id).'" class="btn btn-sm btn-danger mr-1 mb-0" onclick="doHapus(this)">Hapus</a>';

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
		$data['supplier'] = $this->db->where('deleted_at is null')->get('data_supplier')->result_array();
		$data['pegawai'] = $this->db->where('deleted_at is null')->get('data_pegawai')->result_array();
		$data['scriptExtra'] = 'supplier_po/form_js';
		$view['title'] = 'Data Form PO';
		$view['content'] = 'supplier_po/form';
		$this->template->display($view, $data);
	}

	public function edit($id)
	{
		$data['data'] = $this->db->where('id', decode_id($id))->get('data_supplier_po')->row();
		$data['scriptExtra'] = 'supplier_po/form_js';
		$data['id'] = $id;
		$view['title'] = 'Data Form PO';
		$view['content'] = 'supplier_po/form';
		$this->template->display($view, $data);
	}

	public function save($id_ = null)
	{
		$this->form_validation->set_rules('id_supplier', 'Supplier', 'required');
		$this->form_validation->set_rules('po_date', 'Tanggal PO', 'required');
		$this->form_validation->set_rules('delivery_date', 'Tanggal Pengiriman', 'required');
		$this->form_validation->set_rules('known_by', 'Diketahui', 'required');
		$this->form_validation->set_rules('approved_by', 'Diapprove', 'required');

		if ($this->form_validation->run() == FALSE) {
			$response = [
				'status' => false,
				'message' => 'Data Utama Harus Dilengkapi',
			];
		} else {
			$data_insert = [
				'id_supplier' => $this->input->post('id_supplier', true),
				'po_date' => date('Y-m-d', strtotime($this->input->post('po_date', true))),
				'delivery_date' => date('Y-m-d', strtotime($this->input->post('delivery_date', true))),
				'known_by' => $this->input->post('known_by', true),
				'approved_by' => $this->input->post('approved_by', true),
			];

			if($id_!=null) {
				$id = decode_id($id_);
				$data_insert['updated_at'] = date('Y-m-d H:i:s');
				$data_insert['updated_by'] = decode_id($this->id);

				$this->db->set($data_insert)->where('id', $id)->update("data_supplier_po");
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
				$sup = $this->db->limit(1)->order_by('id', 'desc')->get('data_supplier_po')->row_array();
				if (@$sup) {
					$urut_no = explode('/', $sup['po_number']);
					$no_po = (int)($urut_no[0])+1;
				} else {
					$no_po = 1;
				}
				$tahun = date('m/Y', strtotime($this->input->post('po_date', true)));

				$data_insert['po_number'] = str_pad($no_po,3,"0",STR_PAD_LEFT).'/PO-APP/'.$tahun;
				$data_insert['created_at'] = date('Y-m-d H:i:s');
				$data_insert['created_by'] = decode_id($this->id);

				$this->db->insert("data_supplier_po", $data_insert);
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

	public function save_material($id_po, $id_ = null)
	{
		$this->form_validation->set_rules('id_material', 'Material', 'required');
		$this->form_validation->set_rules('qty', 'Qty/Jumlah', 'required');

		if ($this->form_validation->run() == FALSE) {
			$response = [
				'status' => false,
				'message' => 'Data Utama Harus Dilengkapi',
			];
		} else {
			$data_insert = [
				'id_po' => decode_id($id_po),
				'id_material' => $this->input->post('id_material', true),
				'qty' => $this->input->post('qty', true),
				'no_sj' => implode(',', $this->input->post('sj_list', true)),
				'kedatangan' => implode(',', $this->input->post('kedatangan_list', true)),
				'no_invoice' => implode(',', $this->input->post('invoice_list', true)),
			];
			$data_insert['harga'] = $this->db->where('id_material', $data_insert['id_material'])->get('data_material')->row()->harga_material;

			if($id_!=null) {
				$id = decode_id($id_);
				$data_insert['updated_at'] = date('Y-m-d H:i:s');
				$data_insert['updated_by'] = decode_id($this->id);

				$this->db->set($data_insert)->where('id', $id)->update("detail_supplier_po");
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

				$this->db->insert("detail_supplier_po", $data_insert);
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
		$this->db->where('id', $id)->update('data_supplier_po', [
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
		$data['data'] = $this->db->select('a.*, b.supplier_name as nama_supplier, b.delivery_address as alamat_supplier, b.telp as telepon_supplier, b.email as email_supplier, b.sales_tax, b.currency, b.delivery_term, b.payment_term, b.payment_method, b.delivery_type')->where('a.id', decode_id($id))->join('data_supplier b', 'a.id_supplier=b.id')->get('data_supplier_po a')->row();
		
		$data['created_by'] = $this->db->where('id', $data['data']->created_by)->get('data_pegawai')->row()->nama;
		$data['known_by'] = $this->db->where('id', $data['data']->known_by)->get('data_pegawai')->row()->nama;
		$data['approved_by'] = $this->db->where('id', $data['data']->approved_by)->get('data_pegawai')->row()->nama;

		$data['material'] = $this->db->where('id_supplier', $data['data']->id_supplier)->where('deleted_at is null')->where('id_material not in (select id_material from detail_supplier_po where id="'.$data['data']->id.'")')->get('data_material')->result_array();
		$data['detail'] = $this->db->select('a.*, b.jenis_material')->join('data_material b', 'a.id_material=b.id_material')->where('id_po', $data['data']->id)->where('a.deleted_at is null')->get('detail_supplier_po a')->result_array();

		$data['scriptExtra'] = 'supplier_po/detail_js';
		$data['id'] = $id;
		$view['title'] = 'Data Form PO';
		$view['content'] = 'supplier_po/detail';
		$this->template->display($view, $data);
	}
}
