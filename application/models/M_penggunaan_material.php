<?php

class M_penggunaan_material extends CI_Model {
    var $table = 'data_penggunaan_material a'; //nama tabel dari database
    var $column_order = array(); //field yang ada di table user
    var $column_search = array(); //field yang diizin untuk pencarian
    var $order = array('a.id' => 'desc'); // default order

    public function __construct() {
        parent::__construct();
    }

    private function _get_datatables_query() {
        $this->db->select('a.*,supplier_name,firstname,lastname');
        $this->db->from($this->table);
        $this->db->join('data_material b','b.id_material=a.id_material');
        $this->db->join('data_supplier c','c.id=b.id_supplier');
        $this->db->join('users d','d.id=a.created_by');
        $this->db->where('a.deleted_at is null');

        $i = 0;

        foreach ($this->column_search as $item) { // looping awal
            if($_GET['search']['value']) { // jika datatable mengirimkan pencarian dengan metode POST

                if($i===0) // looping awal
                {
                    $this->db->group_start();
                    $this->db->like($item, $_GET['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_GET['search']['value']);
                }

                if(count($this->column_search) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }

        if(isset($_GET['order']))
        {
            $this->db->order_by($this->column_order[$_GET['order']['0']['column']], $_GET['order']['0']['dir']);
        }
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    public function get_datatables() {
        $this->_get_datatables_query();
        if($_GET['length'] != -1)
        $this->db->limit($_GET['length'], $_GET['start']);
        $query = $this->db->get();
        return $query->result();
    }

    public function count_filtered() {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all() {
        $this->_get_datatables_query();
        return $this->db->count_all_results();
    }
}
