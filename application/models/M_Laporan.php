<?php
class M_Laporan extends CI_Model
{
    public function get_all()
    {
        return $this->db->get("tbl_buku");
    }
 
    public function insert($table, $data)
    {
        return $this->db->insert($table, $data);
    }
}
