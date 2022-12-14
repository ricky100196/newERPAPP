<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Material extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_material_table', 'm_main');
	}

	public function index()
	{

		$data = [
			'scriptExtra' => 'material/js',
		];
		$view['title'] = 'Data material';
		$view['content'] = 'material/index';
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
			$row[] = $field->supplier_name;
			$row[] = $field->bulan.'/'.$field->tahun;
			$row[] = $field->jenis_material;
			$row[] = $field->roll;
			$row[] = $field->kg;
			$row[] = rupiah($field->harga_material, 1);
			$row[] = rupiah($field->harga_material*$field->kg, 1);
			$row[] =   '<a href="' . site_url('material/detail/' . encode_id($field->id_material)) . '" class="btn btn-sm btn-primary">Detail</a>&nbsp;<a href="' . site_url('material/edit/' . encode_id($field->id_material)) . '" class="btn btn-sm btn-info">Edit</a>&nbsp;<a href="javascript:;" data-nama="'.$field->supplier_name.'" data-id="'.encode_id($field->id_material).'" class="btn btn-sm btn-danger mr-1 mb-0" onclick="doHapus(this)">Hapus</a>';

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
		$data['scriptExtra'] = 'material/form_js';
		$data['perusahaan'] = $this->db->where('deleted_at is null')->get('data_supplier')->result_array();
		$view['title'] = 'Data Material';
		$view['content'] = 'material/form';
		$this->template->display($view, $data);
	}

	public function edit($id)
	{
		$data['perusahaan'] = $this->db->where('deleted_at is null')->get('data_supplier')->result_array();
		$data['data'] = $this->db->where('id_material', decode_id($id))->get('data_material')->row();
		// var_dump($data['data']);exit;
		$data['scriptExtra'] = 'material/form_js';
		$data['id'] = $id;
		$view['title'] = 'Data Material';
		$view['content'] = 'material/form';
		$this->template->display($view, $data);
	}

	public function save($id_ = null)
	{
		// $this->form_validation->set_rules('id_supplier', 'id_supplier', 'required');
		$this->form_validation->set_rules('jenis', 'jenis', 'required');
		$this->form_validation->set_rules('roll', 'roll', 'required');

		if ($this->form_validation->run() == FALSE) {
			$response = [
				'status' => false,
				'message' => 'Data Utama Harus Dilengkapi',
			];
		} else {
			$data_insert = [
				'id_supplier' => $this->input->post('supplier_id', true),
				'bulan' => date('m', strtotime($this->input->post('bulan', true))),
				'tahun' => date('Y', strtotime($this->input->post('bulan', true))),
				'jenis_material' => $this->input->post('jenis', true),
				'roll' => $this->input->post('roll', true),
				'kg' => $this->input->post('kg', true),
				'harga_material' => $this->input->post('harga_material', true),
				// 'total' => $this->input->post('total', true),
			];

			if($id_!=null) {
				$id = decode_id($id_);
				$data_insert['updated_at'] = date('Y-m-d H:i:s');
				$data_insert['updated_by'] = decode_id($this->id);

				$this->db->set($data_insert)->where('id_material', $id)->update("data_material");
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

				$this->db->insert("data_material", $data_insert);
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
