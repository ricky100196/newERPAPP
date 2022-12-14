<?php

class M_ploting extends CI_Model
{
    var $column_order = array(null, 'a.nama', 'a.nik', null, 'a.email',null); //field yang ada di table user
    var $column_search = array('a.nama', 'a.nik', 'a.nip', 'a.nuptk'); //field yang diizin untuk pencarian
    var $order = array('a.id' => 'desc'); // default order

    public function __construct()
    {
        parent::__construct();
    }

    private function _get_datatables_query()
    {
        $this->db->select("a.*, 
        (select distinct id_supervisor as id_supervisor from instrumen_data where id_coach=a.id and deleted is null and id_coach is not null limit 1) as id_supervisor, 
        (select count(*) as jml from instrumen_data where id_coach=a.id and deleted is null) as jml");
        $this->db->where('a.deleted', null);
        $this->db->where(" a.id in (select id_coach from instrumen_data where deleted is null)");
        $this->db->from('coach_data a');

        $i = 0;

        foreach ($this->column_search as $item) { // looping awal
            if ($_GET['search']['value']) { // jika datatable mengirimkan pencarian dengan metode POST

                if ($i === 0) // looping awal
                {
                    $this->db->group_start();
                    $this->db->like($item, $_GET['search']['value']);
                } else {
                    $this->db->or_like($item, $_GET['search']['value']);
                }

                if (count($this->column_search) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }

        if (isset($_GET['order'])) {
            $this->db->order_by($this->column_order[$_GET['order']['0']['column']], $_GET['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables()
    {
        $this->_get_datatables_query();
        if ($_GET['length'] != -1)
            $this->db->limit($_GET['length'], $_GET['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->_get_datatables_query();
        return $this->db->count_all_results();
    }

    function generate_table()
    {
        $list = $this->get_datatables();
        $data = array();
        $no = $_GET['start'];

        $supervisor = $this->db->where('deleted is null')->get('supervisor_data')->result_array();

        foreach ($list as $field) {
            $select = "
                <select class='select_spv' onchange='ubah_supervisor(\"" . encode_id($field->id) . "\")' id='pilih_spv_" . encode_id($field->id) . "'>
                    <option>Pilih Supervisor</option>
            ";
            foreach ($supervisor as $val) {
                $select .= "<option value='" . encode_id($val['id']) . "'" . ($val['id'] == $field->id_supervisor ? 'selected' : '') . ">" . $val['nama'] . "</option>";
            }
            $select .= "</select>";

            $no++;
            $row = [];
            $row[] = $no;
            $row[] = $field->nama;
            $row[] = 'NIP. ' . $field->nip . '<br>No KTP' . $field->nik;
            $row[] = $field->jabatan;
            $row[] = $field->no_hp . '<br>' . $field->email;
            $row[] = "<a href='javascript:;' data-toggle='modal' data-target='#modal-popout' onclick='daftar_guru(\"" . encode_id($field->id) . "\")' class='btn btn-primary btn-sm'> <i class='fa fa-user'></i> $field->jml Guru</a> ";
            $row[] = $select;

            $data[] = $row;
        }

        $output = array(
            "draw" => $_GET['draw'],
            "recordsTotal" => $this->count_all(),
            "recordsFiltered" => $this->count_filtered(),
            "data" => $data,
        );
        return json_encode($output);
    }
}
