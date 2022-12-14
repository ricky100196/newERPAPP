<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class About extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('About_model', 'about');
    }

    public function index()
    {
        $data = [
            'data' => $this->about->get_data(),
            'scriptExtra' => 'admin/about/edit_js'
        ];
        $view['title'] = 'Front About';
        $view['content'] = 'admin/about/edit';
        $this->template->display($view, $data);
    }

    public function getId()
    {
        $data = $this->about->get_data();

        $this->_set_success(['data' => $data]);
    }

    public function do_update()
    {
        $id = $this->input->post('id');

        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'trim|required');
        $this->form_validation->set_rules('latitude', 'latitude', 'trim|required');
        $this->form_validation->set_rules('longitude', 'longitude', 'trim|required');
        $this->form_validation->set_rules('telepon', 'telepon', 'trim|required');
        $this->form_validation->set_rules('email', 'email', 'trim|required');
        $this->form_validation->set_rules('alamat', 'alamat', 'trim|required');

        if ($this->form_validation->run() == false) {
            $front_content_id = decode_id($id);
            redirect('admin/about/');
        } else {
            $front_content_id = decode_id($id);
            $update_data = [
                'deskripsi' => $this->input->post('deskripsi'),
                'latitude' => $this->input->post('latitude'),
                'longitude' => $this->input->post('longitude'),
                'telepon' => $this->input->post('telepon'),
                'telepon' => $this->input->post('telepon'),
                'email' => $this->input->post('email'),
                'alamat' => $this->input->post('alamat'),
                'title_tugas_1' => $this->input->post('title_tugas_1'),
                'desc_tugas_1' => $this->input->post('desc_tugas_1'), 
                'title_tugas_2' => $this->input->post('title_tugas_2'),
                'desc_tugas_2' => $this->input->post('desc_tugas_2'), 
                'title_tugas_3' => $this->input->post('title_tugas_3'),
                'desc_tugas_3' => $this->input->post('desc_tugas_3'),
                'updated_at' => date('Y-m-d H:i:s')
            ];
            $this->db->where('id', $front_content_id);
            $this->db->update('about', $update_data);
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
