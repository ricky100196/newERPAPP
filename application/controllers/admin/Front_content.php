<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Front_content extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('Front_content_model', 'content');
	}

	public function index()
	{
		$data = [
			'data' => $this->content->get_data(),
			'scriptExtra' => 'admin/front_content/edit_js'
		];
		$view['title'] = 'Front Content';
		$view['content'] = 'admin/front_content/edit';
		$this->template->display($view, $data);
	}
	public function hapus($id)
	{
		$this->db->where('id', $id)->update('front_content', [
			'deleted_at' => date('Y-m-d H:i:s'),
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

	public function do_update()
	{
		$id = $this->input->post('id');

		$this->form_validation->set_rules('title', 'Title', 'trim|required');
		$this->form_validation->set_rules('ideas', 'Ideas', 'trim|required');
		$this->form_validation->set_rules('desc_ideas', 'Desc Ideas', 'trim|required');
		$this->form_validation->set_rules('analysis', 'analysis', 'trim|required');
		$this->form_validation->set_rules('desc_analysis', 'Desc analysis', 'trim|required');
		$this->form_validation->set_rules('touch', 'touch', 'trim|required');
		$this->form_validation->set_rules('desc_touch', 'Desc Touch', 'trim|required');

		if ($this->form_validation->run() == false) {
			$front_content_id = decode_id($id);
			redirect('admin/front_content/edit/');
		} else {
			$front_content_id = decode_id($id);
			$update_data = [
				'title' => $this->input->post('title'),
				'ideas' => $this->input->post('ideas'),
				'desc_ideas' => $this->input->post('desc_ideas'),
				'analysis' => $this->input->post('analysis'),
				'desc_analysis' => $this->input->post('desc_analysis'),
				'touch' => $this->input->post('touch'),
				'desc_touch' => $this->input->post('desc_touch'),
				'updated_at' => date('Y-m-d H:i:s')
			];
			$this->db->where('id', $front_content_id);
			$this->db->update('front_content', $update_data);
			$berita = $this->db->affected_rows() ? true : false;
			if ($berita) {
				$response = [
					'status' => true,
					'pesan' => 'Data Tersimpan'
				];
			} else {
				$response = [
					'status' => true,
					'pesan' => 'Data Tersimpan'
				];
			}
			// echo $berita;
			echo json_encode($response);
		}
	}
}
