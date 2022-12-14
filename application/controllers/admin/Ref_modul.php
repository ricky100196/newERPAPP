<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Ref_modul extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('admin/Table_ref_modul', 'table');
    }

    public function index()
    {
        $data = [
            'scriptExtra' => 'admin/ref_modul/index_js'
        ];
        $data['title'] = 'Referensi Modul';
        $view['title'] = 'Referensi Modul';
        $view['content'] = 'admin/ref_modul/index';
        $this->template->display($view, $data);
    }

    public function table()
    {
        echo $this->table->generate_table();
    }

    public function tambah()
    {

        $data['ref_program'] = $this->db->query("SELECT 
            * from ref_program
        ")->result();

        $html = $this->load->view('admin/ref_modul/form', $data, true);

        echo json_encode([
            'status' => 'success',
            'html' => $html,
        ]);
    }

    public function ubah()
    {
        $id = decode_id($this->input->post('id'));

        $data['ref_program'] = $this->db->query("SELECT 
            * from ref_program
        ")->result();

        $data['data'] = $this->db->query("SELECT
            a.* from ref_modul a
            where a.id='$id' and a.deleted is null 
        ")->row();

        $html = $this->load->view('admin/ref_modul/form', $data, true);

        echo json_encode([
            'status' => 'success',
            'html' => $html,
        ]);
    }

    public function do_submit()
    {
        $id = decode_id($this->input->post('id'));
        $hapus = $this->input->post('hapus');

        $nama_modul = $this->input->post('nama_modul');
        $id_program = $this->input->post('id_program');

        if ($hapus) {
            $this->db->where('id', $id);
            $this->db->update('ref_modul', [
                'deleted' => date('Y-m-d H:i:s')
            ]);
        } else {
            if (empty($id)) {
                $this->db->insert('ref_modul', [
                    'nama_modul' => $nama_modul,
                    'id_program' => $id_program,
                    'created' => date('Y-m-d H:i:s')
                ]);
            } else {
                $this->db->where('id', $id);
                $this->db->update('ref_modul', [
                    'nama_modul' => $nama_modul,
                    'id_program' => $id_program,
                    'updated' => date('Y-m-d H:i:s')
                ]);
            }
        }

        echo json_encode([
            'status' => 'success',
            'msg' => 'berhasil menyimpan data',
        ]);
    }
}
