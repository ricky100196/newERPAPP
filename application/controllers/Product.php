<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Product extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_product_table', 'm_main');
	}

	public function index()
	{

		$data = [
			'scriptExtra' => 'product/js',
		];
		$view['title'] = 'Data Produk';
		$view['content'] = 'product/index';
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
			$row[] = ucfirst($field->customer_name);
			$row[] = ucfirst($field->product_name);
			$row[] = $field->dimensi;
			$row[] = 'Jenis bahan : '.$field->jenis_bahan.'<br>Tebal : '.$field->tebal.'<br>Cavity : '.$field->cavity;
			$row[] = ($field->approve_status=='0') ? '<span class="badge badge-danger">Pending</span>' : 'Rp. '.number_format($field->harga);
			if ($field->approve_status=='0') {
				$approve = '<a href="javascript:;" data-nama="'.$field->product_name.'" data-id="'.encode_id($field->id).'" class="btn btn-sm btn-danger mr-1 mb-0" onclick="doApprove(this)">Approve</a>';
			} else {
				$approve = '<span class="badge badge-success">Approve</span>';
			}
			
			$row[] =   '<a href="' . site_url('product/detail/' . encode_id($field->id)) . '" class="btn btn-sm btn-primary">Detail</a>&nbsp;<a href="' . site_url('product/edit/' . encode_id($field->id)) . '" class="btn btn-sm btn-info">Edit</a>&nbsp;<a href="javascript:;" data-nama="'.$field->product_name.'" data-id="'.encode_id($field->id).'" class="btn btn-sm btn-danger mr-1 mb-0" onclick="doHapus(this)">Hapus</a>'.$approve;

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
		$data['scriptExtra'] = 'product/form_js';
		$data['perusahaan'] = $this->db->where('deleted_at is null')->get('data_customer')->result_array();

		$view['title'] = 'Data Produk';
		$view['content'] = 'product/form';
		$this->template->display($view, $data);
	}

	public function edit($id)
	{
		$data['scriptExtra'] = 'product/form_js';
		$data['perusahaan'] = $this->db->where('deleted_at is null')->get('data_customer')->result_array();
		$data['data'] = $this->db->where('id', decode_id($id))->get('data_product')->row();

		$data['id'] = $id;
		$view['title'] = 'Data Produk';
		$view['content'] = 'product/form';
		$this->template->display($view, $data);
	}

	public function save($id_ = null)
	{
		$this->form_validation->set_rules('customer_id', 'Pilih Perusahaan', 'required');
		$this->form_validation->set_rules('product_name', 'Nama Produk', 'required');
		$this->form_validation->set_rules('dimensi', 'Dimensi', 'required');

		if ($this->form_validation->run() == FALSE) {
			$response = [
				'status' => false,
				'message' => 'Data Utama Harus Dilengkapi',
			];
		} else {
			$data_insert = [
				'customer_id' => $this->input->post('customer_id', true),
				'product_name' => $this->input->post('product_name', true),
				'dimensi' => $this->input->post('dimensi', true),
				'jenis_bahan' => $this->input->post('jenis_bahan', true),
				'tebal' => $this->input->post('tebal', true),
				'lebar' => $this->input->post('lebar', true),
				'cavity' => $this->input->post('cavity', true),
				'panjang_meja' => $this->input->post('panjang_meja', true),
				'masa_jenis' => $this->input->post('masa_jenis', true),
				'tarikan_rol' => $this->input->post('tarikan_rol', true),
				'berat' => $this->input->post('berat', true),
				'harga' => $this->input->post('harga', true),
			];

			if($id_!=null) {
				$id = decode_id($id_);
				$data_insert['updated_at'] = date('Y-m-d H:i:s');
				$data_insert['updated_by'] = decode_id($this->id);

				$this->db->set($data_insert)->where('id', $id)->update("data_product");
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

				$this->db->insert("data_product", $data_insert);
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
		$this->db->where('id', $id)->update('data_product', [
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
		$product = $this->db->from('data_product')->where('id',$id)->get()->row_array();
		$scan_dok = $this->db->from('scan_dokumen')->where('id_product',$product['id'])->where('id_detail !=',NULL)->group_by('id_dokumen')->get()->result();
		
		$data = [
			'scriptExtra' => 'operator/product/detail/js',
			'product' => $product,
			'scan_dok' => $scan_dok,
		];
		$view['title'] = 'Detail Produk';
		$view['content'] = 'operator/product/detail/index';
		$this->template->display($view, $data);
	}

	public function approve_decline()
	{
		$id = decode_id($this->input->post('id', true));
		$tgl = date('Y-m-d H:i:s');
		$this->db->where('id', $id)->update('data_product', [
			'approve_status' => '2',
			'approve_at' => $tgl,
			'approve_by' => decode_id($this->id),
			'approve_catatan' => $this->input->post('catatan', true),
		]);

		if ($this->db->affected_rows() > 0) {
			/*$this->db->insert('log_verifikasi', [
				'is_verif' => '2',
				'date_verif' => $tgl,
				'alasan' => $this->input->post('alasan', true),
				'created' => date('Y-m-d H:i:s'),
			]);*/

			$response = [
				'status' => true,
				'pesan' => 'Berhasil menolak produk',
			];
		} else {
			$response = [
				'status' => false,
				'pesan' => 'Gagal melakukan approval produk',
			];
		}

		echo json_encode($response);
	}

	public function approve_accept()
	{
		$id = decode_id($this->input->post('id', true));
		$tgl = date('Y-m-d H:i:s');
		$this->db->where('id', $id)->update('data_product', [
			'approve_status' => '1',
			'approve_at' => $tgl,
			'approve_by' => decode_id($this->id),
			'approve_catatan' => $this->input->post('catatan', true),
			'harga' => $this->input->post('harga', true),
		]);

		if ($this->db->affected_rows() > 0) {
			/*$this->db->insert('log_verifikasi', [
				'is_verif' => '2',
				'date_verif' => $tgl,
				'alasan' => $this->input->post('alasan', true),
				'created' => date('Y-m-d H:i:s'),
			]);*/

			$response = [
				'status' => true,
				'pesan' => 'Berhasil menolak produk',
			];
		} else {
			$response = [
				'status' => false,
				'pesan' => 'Gagal melakukan approval produk',
			];
		}

		echo json_encode($response);
	}
}
