<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Jenis_material extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('referensi/M_jenis_material', 'm_main');
    }

    public function index()
    {
        $data = [
            'scriptExtra' => 'referensi/jenis_material/js',
        ];
        $view['title'] = 'Referensi Jenis Material';
        $view['content'] = 'referensi/jenis_material/index';
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
            $row[] = '<b>'.strtoupper($field->jenis).'</b>';
            $row[] = $field->tebal.' X '.$field->panjang;
            $row[] = '<a href="javascript:;" data-id="'.encode_id($field->id).'" class="btn btn-sm btn-primary" onclick="doEdit(this)">Edit</a>&nbsp;<a href="javascript:;" data-id="'.encode_id($field->id).'" class="btn btn-sm btn-danger mr-1 mb-0" onclick="doHapus(this)">Hapus</a>';

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

    public function edit($id)
    {
        $data['data'] = $this->db->where('id', decode_id($id))->get('data_customer')->row();
        $data['scriptExtra'] = 'customer/form_js';
        $data['id'] = $id;
        $view['title'] = 'Data Customer';
        $view['content'] = 'customer/form';
        $this->template->display($view, $data);
    }

    public function save($id_ = null)
    {
        $this->form_validation->set_rules('jenis', 'Jenis', 'required');
        $this->form_validation->set_rules('tebal', 'Tebal', 'required');
        $this->form_validation->set_rules('panjang', 'Panjang', 'required');

        if ($this->form_validation->run() == FALSE) {
            $response = [
                'status' => false,
                'message' => 'Data Utama Harus Dilengkapi',
            ];
        } else {
            $data_insert = [
                'jenis' => $this->input->post('jenis', true),
                'tebal' => $this->input->post('tebal', true),
                'panjang' => $this->input->post('panjang', true),
            ];

            if($id_!=null) {
                $id = decode_id($id_);
                $data_insert['updated_at'] = date('Y-m-d H:i:s');

                $this->db->set($data_insert)->where('id', $id)->update("ref_jenis_material");
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

                $this->db->insert("ref_jenis_material", $data_insert);
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
        $this->db->where('id', $id)->update('ref_jenis_material', [
            'deleted_at' => date('Y-m-d H:i:s'),
            // 'deleted_by' => decode_id($this->id),
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
}
