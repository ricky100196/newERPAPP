<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Surat_jalan extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/surat_jalan/SuratJalanModel', 'm_main');
	}

    public function index() 
    {
		$data = [
			'scriptExtra'   => 'admin/surat_jalan/index_js'
		];
		$view['title']      = 'Front Beranda';
		$view['content']    = 'admin/surat_jalan/index';
        $view['btn_tambah'] = 'button';

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
			$row[] = ucfirst($field->exit_date);
			$row[] = ucfirst($field->no_pol);
			$row[] = $field->qty;
			$row[] = $field->information;
			$row[] =   '<a href="' . site_url('admin/surat_jalan/export/' . encode_id($field->id)) . '" class="btn btn-sm btn-primary">Export</a>
                        &nbsp;<a href="' . site_url('admin/surat_jalan/edit/' . encode_id($field->id)) . '" class="btn btn-sm btn-info">Edit</a>
                        &nbsp;<a href="javascript:;" data-nama="'.$field->no_pol.'" data-id="'.encode_id($field->id).'" class="btn btn-sm btn-danger mr-1 mb-0" onclick="doHapus(this)">Hapus</a>
                        &nbsp;<a href="' . site_url('admin/surat_jalan/invoice/' . encode_id($field->id)) . '" class="btn btn-sm btn-primary">Invoice</a>';
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
        $data = [
			'data_frp'      => $this->db->where('deleted_at', null)->get('data_frp')->result(),
			'scriptExtra'   => 'admin/surat_jalan/add/index_js'
		];
		$view['title']      = 'Front Beranda';
		$view['content']    = 'admin/surat_jalan/add/index';

		$this->template->display($view, $data);
    }

    public function edit($id)
    {
        $data = [
			'data_frp'      => $this->db->where('deleted_at', null)->get('data_frp')->result(),
			'surat_jalan'   => $this->db->where('deleted_at', null)->where('id', decode_id($id))->get('surat_jalan')->row(),
			'scriptExtra'   => 'admin/surat_jalan/edit/index_js'
		];
		$view['title']      = 'Front Beranda';
		$view['content']    = 'admin/surat_jalan/edit/index';

		$this->template->display($view, $data);
    }

    public function save()
    {
        $this->form_validation->set_rules('data_frp_id', 'Data FRP', 'required');
		$this->form_validation->set_rules('no_pol', 'No Pol', 'required');
		$this->form_validation->set_rules('exit_date', 'Tanggal', 'required');
		$this->form_validation->set_rules('qty', 'QTY', 'required');
		$this->form_validation->set_rules('information', 'Informasi', 'required');
        $id_ = $this->input->post('id', true);
		if ($this->form_validation->run() == FALSE) {
			$response = [
				'status' => false,
				'message' => 'Data Utama Harus Dilengkapi',
			];
		} else {
			$data_insert = [
				'data_frp_id' => $this->input->post('data_frp_id', true),
				'no_pol' => $this->input->post('no_pol', true),
				'exit_date' => $this->input->post('exit_date', true),
				'qty' => $this->input->post('qty', true),
				'information' => $this->input->post('information', true),
			];

			if($id_!=null) {
				$id = decode_id($id_);
				$data_insert['updated_at'] = date('Y-m-d H:i:s');
				$data_insert['updated_by'] = decode_id($this->id);
				$this->db->set($data_insert)->where('id', $id)->update("surat_jalan");
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
				$this->db->insert("surat_jalan", $data_insert);
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
		$this->db->where('id', $id)->update('surat_jalan', [
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

    public function invoice($id_)
    {
        $id = decode_id($id_);
        $mpdf = new \Mpdf\Mpdf();
		$data = $this->load->view('admin/surat_jalan/export/invoice', [], TRUE);
		$mpdf->WriteHTML($data);
		$mpdf->Output();
    }

    public function export($id_)
    {
        $id = decode_id($id_);
        $mpdf = new \Mpdf\Mpdf();
		$data = $this->load->view('admin/surat_jalan/export/surat-jalan', [], TRUE);
		$mpdf->WriteHTML($data);
		$mpdf->Output();
    }

}