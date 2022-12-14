<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
require('./application/third_party/phpSpreadsheet/autoload.php');

use PhpOffice\PhpSpreadsheet\Helper\Sample;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class Instrumen extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data = [
            'scriptExtra' => 'admin/instrumen/index_js',
            'data' => $this->db->query("SELECT a.*, b.nama, c.nama as nama_kab, d.nama as nama_prov
                FROM instrumen_data a
                LEFT JOIN coach_data b ON a.id_supervisor=b.id
                LEFT JOIN ref_kabupaten c ON c.kode_wilayah=b.kode_kab
                LEFT JOIN ref_provinsi d ON d.kode_wilayah=b.kode_prov
                WHERE a.deleted is null
                ORDER BY a.id DESC")->result(),
        ];
        $view['title'] = 'Instrumen Monitoring dan Evaluasi';
        $view['content'] = 'admin/instrumen/index';

        $this->template->display($view, $data);
    }

    public function sess()
    {
        echo json_encode($_SESSION);
    }

    public function get_jenjang($id_, $jenis)
    {
        $id = decode_id($id_);
        $arr_jenjang = array('PAUD', 'SD', 'SMP', 'SMA', 'SLB');
        $form = $this->db->where('deleted is null')->where('id', $id)->get('instrumen_data')->row_array();
        $jenjang = $this->db->where('deleted_at is null')->where('id_wawancara', $id)->where('sasaran', $jenis)->get('wawancara_data_form')->result_array();
        $jenjang_sudah = array_column($jenjang, 'jenjang');
        $jenjang_belum = implode(',', array_diff($arr_jenjang, $jenjang_sudah));

        $data['jenjang'] = $jenjang;
        $data['jenis'] = $jenis;
        $data['code'] = $form['code'];
        $data['wawancara'] = $form;
        $data['jenjang_belum'] = explode(',', $jenjang_belum);
        $data['jenjang_sudah'] = $jenjang_sudah;
        // $data['jenjang'] = explode(',', $form['jenjang_'.$jenis]);
        if ($jenis == 'ps')
            $data['sasaran'] = 'Pengawas Sekolah';
        else if ($jenis == 'ks')
            $data['sasaran'] = 'Kepala Sekolah';
        else if ($jenis == 'guru')
            $data['sasaran'] = 'Guru';
        else
            $data['sasaran'] = null;
        $this->load->view('admin/instrumen/jenjang', $data);
    }

    public function simpan_jenjang($id, $jenis, $jenjang)
    {
        $id = decode_id($id);
        $dt = array(
            'id_wawancara' => $id,
            'jenjang' => $jenjang,
            'sasaran' => $jenis,
        );

        $dt['created_at'] = date('Y-m-d H:i:s');
        $this->db->insert('wawancara_data_form', $dt);

        $this->session->set_flashdata('success', 'Berhasil menambahkan data.');
        // }

        redirect('instrumen');
    }

    public function tambah_instrumen()
    {
        $data['data_asesor'] = $this->db->where('deleted is null')->get('coach_data')->result();
        $data['data_kab'] = $this->db->select('a.kode_wilayah as kode_kab, a.nama as nama_kab, b.nama as nama_prov')->join('ref_provinsi b', 'a.kode_prov=b.kode_wilayah')->get('ref_kabupaten a')->result();
        $this->load->view('admin/instrumen/form', $data);
    }

    public function ubah_instrumen()
    {
        $id = decode_id($this->input->post('id'));
        $data['data_row'] = $this->db->where('id', $id)->get('instrumen_data')->row();
        $data['data_asesor'] = $this->db->where('deleted is null')->get('coach_data')->result();
        $data['data_kab'] = $this->db->select('a.kode_wilayah as kode_kab, a.nama as nama_kab, b.nama as nama_prov')->join('ref_provinsi b', 'a.kode_prov=b.kode_wilayah')->get('ref_kabupaten a')->result();

        $this->load->view('admin/instrumen/form', $data);
    }

    public function hapus_instrumen($id_)
    {
        $id = decode_id($id_);
        if ($id > 0) {
            $this->db->where('id', $id)->update('instrumen_data', array('deleted' => date('Y-m-d H:i:s')));
            $this->session->set_flashdata('success', 'Berhasil menghapus data.');
            redirect('instrumen');
        } else {
            $this->session->set_flashdata('failed', 'Data tidak ditemukan.');
            redirect('instrumen');
        }
    }

    // public function kunci_instrumen($id_, $kunci)
    // {
    //     $id = decode_id($id_);
    //     if ($id > 0) {
    //         $this->db->where('id', $id)->update('instrumen_data', array('last_submit' => date('Y-m-d H:i:s'), 'kunci' => $kunci));
    //         $this->session->set_flashdata('success', 'Berhasil mengunci instrumen monev.');
    //         redirect('instrumen');
    //     } else {
    //         $this->session->set_flashdata('failed', 'Data tidak ditemukan.');
    //         redirect('instrumen');
    //     }
    // }

    public function kunci_instrumen($id_, $kunci)
    {
        $id = decode_id($id_);
        if ($id > 0) {
            $this->db->where('id', $id)->update('instrumen_data', array('last_submit' => date('Y-m-d H:i:s'), 'kunci' => $kunci));
            if ($this->db->affected_rows()) { 
                $instrumen = $this->db->where('instrumen', $id)->get('instrumen_data')->row();
                if ($instrumen->id_coach!=null) {
                    $guru = $this->db->where('id', $instrumen->id_guru)->get('guru_data')->row();
                    $coach = $this->db->query("select a.id, count(*) as jml from coach_data a join instrumen_data b on a.id=b.id_coach and b.deleted is null where kode_kab='".$guru->kode_kab."' group by a.id having jml < 10 order by jml asc")->row();
                    if (@$coach) {
                        $this->db->where('id', $id)->update('instrumen_data', array('id_coach' => $coach->id));
                    } else {
                        $coach = $this->db->query("select a.id, count(*) as jml from coach_data a join instrumen_data b on a.id=b.id_coach and b.deleted is null where kode_prov='".$guru->kode_prov."' group by a.id having jml < 10 order by jml asc")->row();
                        if (@$coach) {
                            $this->db->where('id', $id)->update('instrumen_data', array('id_coach' => $coach->id));
                        }
                    }
                }
                
                $this->session->set_flashdata('success', 'Berhasil mengunci instrumen monev.');
                redirect('instrumen');
            } else {
                $this->session->set_flashdata('failed', 'Gagal mengunci instrumen monev. Cek kembali koneksi anda.');
                redirect('instrumen');
            }
        } else {
            $this->session->set_flashdata('failed', 'Data tidak ditemukan.');
            redirect('instrumen');
        }
    }

    public function simpan_instrumen()
    {
        $id = $this->input->post('id');

        if ($this->session->userdata('type') == 'admin') {
            $dt = array(
                'id_asesor' => $this->input->post('id_asesor'),
                'petugas_administrasi' => $this->input->post('petugas_administrasi'),
            );
            if ($id) {
                $dt['kode_kab'] = $this->input->post('kode_kab');
                $dt['updated'] = date('Y-m-d H:i:s');
                $this->db->where('id', $id)->update('instrumen_data', $dt);
                $this->session->set_flashdata('success', 'Berhasil mengubah data.');
            } else {
                foreach ($this->input->post('kode_kab') as $kode_kab) {
                    $dt['kode_kab'] = $kode_kab;
                    $dt['code'] = date('YHdism');
                    $dt['created'] = date('Y-m-d H:i:s');
                    $this->db->insert('instrumen_data', $dt);
                }
                $this->session->set_flashdata('success', 'Berhasil menambahkan data.');
            }
        } else {
            $dt = array(
                'tanggal_mulai' => date('Y-m-d', strtotime($this->input->post('tanggal_mulai'))),
                'tanggal_selesai' => date('Y-m-d', strtotime($this->input->post('tanggal_selesai'))),
                'lokasi' => $this->input->post('lokasi'),
                'wilayah_upt' => $this->input->post('wilayah_upt'),
            );
            if ($id) {
                $dt['updated'] = date('Y-m-d H:i:s');
                $this->db->where('id', $id)->update('instrumen_data', $dt);
                $this->session->set_flashdata('success', 'Berhasil mengubah data.');
            }
        }

        redirect('instrumen');
    }

    public function kehadiran($id)
    {
        $data = [

            'scriptExtra' => 'admin/instrumen/index_js',
            'id' => $id,
            'data' => $this->db->where('wawancara_kehadiran.deleted_at is NULL')->get('wawancara_kehadiran')->result(),
            // 'row' => $this->db->where('wawancara_kehadiran.deleted_at is NULL')->get('wawancara_kehadiran')->row(),
        ];
        $view['title'] = 'Daftar Kehadiran';
        $view['content'] = 'admin/instrumen/kehadiran';

        $this->template->display($view, $data);
    }

    public function tambah_kehadiran()
    {
        $id = decode_id($this->input->post('id'));
        $form = $this->db->where('deleted is null')->where('id', $id)->get('instrumen_data')->row_array();
        $data['kehadiran'] = $form;

        $this->load->view('admin/instrumen/form_kehadiran', $data);
    }

    public function simpan_wawancara_kehadiran()
    {
        $dt = array(
            'id_wawancara' => decode_id($this->input->post('id')),
            'nama_peserta' => $this->input->post('nama_peserta'),
            'nama_sekolah' => $this->input->post('nama_sekolah'),
            'status' => $this->input->post('status'),
        );

        $dt['created_at'] = date('Y-m-d H:i:s');
        $this->db->insert('wawancara_kehadiran', $dt);

        $this->session->set_flashdata('success', 'Berhasil menambahkan data.');


        redirect('instrumen');
    }

    public function ubah_kehadiran()
    {
        $id = $this->input->post('id');
        $data['data_row'] = $this->db->where('id', $id)->get('wawancara_kehadiran')->row();

        $this->load->view('admin/instrumen/form_ubah_kehadiran', $data);
    }

    public function ubah_wawancara_kehadiran()
    {
        $id = $this->input->post('id');
        $dt = array(
            'id_wawancara' => $this->input->post('id_wawancara'),
            'nama_peserta' => $this->input->post('nama_peserta'),
            // 'jabatan' => $this->input->post('jabatan'),
            'nama_sekolah' => $this->input->post('nama_sekolah'),
            'status' => $this->input->post('status'),

        );

        if ($id) {
            $this->db->where('id', $id)->update('wawancara_kehadiran', $dt);
            $this->session->set_flashdata('success', 'Berhasil mengubah data.');
        }

        redirect('instrumen');
    }

    public function hapus_kehadiran($id)
    {
        $this->db->where('id', $id)->update('wawancara_kehadiran', array('deleted_at' => date('Y-m-d H:i:s')));
        $this->session->set_flashdata('success', 'Berhasil menghapus data.');
        redirect('instrumen/kehadiran/' . $id);
    }
}