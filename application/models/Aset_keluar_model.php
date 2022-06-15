<?php

class Aset_keluar_model extends CI_Model {
    public function getAllAsetKeluar(){
        return $this->db->get('aset_keluar')->result_array();
    }
    public function hapusData($id){
        $this->db->where('id', $id);
        $this->db->delete('aset_keluar');
    }

    public function getDataById($id){
        return $this->db->get_where('aset_keluar', ['id' => $id])->row_array();
    }
}