<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Ploting_table extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/ploting/M_ploting', 'table');
    }   

    public function index()
    {
        $data = [
            'scriptExtra' => 'admin/ploting_table/index_js',
        ];
        $view['title'] = 'Ploting Coaching';
        $view['content'] = 'admin/ploting_table/index';
        $this->template->display($view, $data);
    }

    public function table()
    {
        echo $this->table->generate_table();
    }

    public function tambah()
    {
        $data = [
            'coach' => $this->db->from("coach_data")->where('deleted is null')->get()->result(),
            'guru' => $this->db->from("guru_data")->where('id not in (select id_guru from instrumen_data where deleted is null and id_coach is not null) and deleted is null')->get()->result(),
        ];
        $view['title'] = 'Ploting Coaching';
        $view['content'] = 'admin/ploting_table/tambah';
        $this->template->display($view, $data);
    }

    public function view_guru()
    {
        $id = decode_id($this->input->post('id', true));
        $data = [
            'data_guru' => $this->db->select('a.id as id_instrumen, a.id_guru, a.kunci, a.id_coach, b.*')->from("instrumen_data a")->join('guru_data b', 'a.id_guru=b.id')->where('id_coach', $id)->where('a.deleted is null')->get()->result(),
            'data_coach' => $this->db->from("coach_data a")->where('id', $id)->get()->row(),
        ];
        $this->load->view('admin/ploting_table/view_guru', $data);
    }

    public function simpan()
    {
        $id_coach = decode_id($this->input->post('id_coach'));
        $id_guru = $this->input->post('id_guru');
        // echo json_encode($this->input->post());die;
        foreach ($id_guru as $key => $value) {
            $cek_exist = $this->db->get_where('instrumen_data', ['id_coach' => $id_coach, 'id_guru' => decode_id($value), 'deleted' => NULL]);
            if ($cek_exist->num_rows() < 1) {
                $dt = array(
                    'id_coach' => $id_coach,
                    'id_guru' => decode_id($value),
                    'created' => date('Y-m-d H:i:s'),
                );
                $get_spv = $this->db->where('id_coach', $id_coach)->where('deleted is null and id_supervisor is not null')->limit(1)->get('instrumen_data')->row();
                if (@$get_spv) {
                    $dt['id_supervisor'] = $get_spv->id_supervisor;
                }
                $this->db->insert('instrumen_data', $dt);
            }
        }
        $this->session->set_flashdata('success', 'Berhasil menambahkan data.');

        redirect('admin/ploting_table');
    }

    public function save_supervisor()
    {
        $id_coach = decode_id($this->input->post('id'));
        $id_supervisor = decode_id($this->input->post('val'));

        $this->db->where(['id_coach' => $id_coach, 'deleted' => null])->set('id_supervisor', $id_supervisor)->update('instrumen_data');
        if ($this->db->affected_rows() > 0) {
            echo json_encode(['status' => true]);
        } else {
            echo json_encode(['status' => false]);
        }
    }

    public function hapus($id)
    {
        $id = decode_id($id);

        $cek_exist = $this->db->get_where('instrumen_data', ['id' => $id]);
        if ($cek_exist->num_rows() > 0) {
            $dt = array(
                'deleted' => date('Y-m-d H:i:s'),
            );
            $this->db->where('id', $id)->update('instrumen_data', $dt);
        }
        $this->session->set_flashdata('success', 'Berhasil hapus data.');

        redirect('admin/ploting_table');
    }
}
