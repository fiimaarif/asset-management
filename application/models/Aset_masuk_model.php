<?php

class Aset_masuk_model extends CI_Model {
    public function getAllAsetMasuk(){
        return $this->db->get('aset_masuk')->result_array();
    }
    public function hapusData($id){
        $this->db->where('id', $id);
        $this->db->delete('aset_masuk');
    }

    public function getDataById($id){
        return $this->db->get_where('aset_masuk', ['id' => $id])->row_array();
    }
}