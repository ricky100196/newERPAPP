<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class MaterialUse extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_penggunaan_material', 'm_main');
	}

	public function index()
	{

		$data = [
			'scriptExtra' => 'produksi/js',
		];
		$view['title'] = 'Data Penggunaan Material';
		$view['content'] = 'produksi/index';
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
			$row[] = $field->tanggal;
			$row[] = $field->roll_awal;
			$row[] = $field->kg_awal;
			$row[] = $field->supplier_name;
			$row[] = $field->shift;
			$row[] = $field->vacum;
			$row[] = $field->roll_vacum;
			$row[] = $field->kg_vacum;
			$row[] = $field->firstname; $field->lastname;
			$row[] = $field->roll_akhir;
			$row[] = $field->kg_akhir;
			$row[] =   '<a href="' . site_url('MaterialUse/detail/' . encode_id($field->id)) . '" class="btn btn-sm btn-primary">Detail</a>&nbsp;<a href="' . site_url('MaterialUse/edit/' . encode_id($field->id)) . '" class="btn btn-sm btn-info">Edit</a>&nbsp;<a href="javascript:;" data-nama="'.$field->supplier_name.'" data-id="'.encode_id($field->id_material).'" class="btn btn-sm btn-danger mr-1 mb-0" onclick="doHapus(this)">Hapus</a>';

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
		$data['scriptExtra'] = 'produksi/form_js';
		$data['perusahaan'] = $this->db->where('deleted_at is null')->get('data_material')->result_array();
		$view['title'] = 'Data Penggunaan Material';
		$view['content'] = 'produksi/form';
		$this->template->display($view, $data);
	}

	public function edit($id)
	{
		$data['data'] = $this->db->where('id', decode_id($id))->get('data_penggunaan')->row();
		$data['scriptExtra'] = 'produksi/form_js';
		$data['id'] = $id;
		$view['title'] = 'Data Penggunaan Material';
		$view['content'] = 'produksi/form';
		$this->template->display($view, $data);
	}

	public function save($id_ = null)
	{
		// $this->form_validation->set_rules('id_supplier', 'id_supplier', 'required');
		//$this->form_validation->set_rules('jenis', 'jenis', 'required');
		$this->form_validation->set_rules('roll_vacum', 'roll_vacum', 'required');

		if ($this->form_validation->run() == FALSE) {
			$response = [
				'status' => false,
				'message' => 'Data Utama Harus Dilengkapi',
			];
		} else {
			$data_insert = [
				'id_material' => $this->input->post('id_material', true),
				'tanggal' => $this->input->post('tanggal', true),
				'roll_vacum' => $this->input->post('roll_vacum', true),
				'kg_vacum' => $this->input->post('kg_vacum', true),
				'shift' => $this->input->post('shift', true),
				'vacum' => $this->input->post('vacum', true),
			];

			if($id_!=null) {
				$id = decode_id($id_);
				$data_insert['updated_at'] = date('Y-m-d H:i:s');
				$data_insert['updated_by'] = decode_id($this->id);

				$this->db->set($data_insert)->where('id', $id)->update("data_penggunaan_material");
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

				$this->db->insert("data_penggunaan_material", $data_insert);
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
