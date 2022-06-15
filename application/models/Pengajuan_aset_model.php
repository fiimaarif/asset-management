<?php

class Pengajuan_aset_model extends CI_Model {
    public function getAllAsetPengajuan(){
        return $this->db->get('pengajuan')->result_array();
    }
    public function hapusData($id){
        $this->db->where('id', $id);
        $this->db->delete('pengajuan');
    }

    public function getDataById($id){
        return $this->db->get_where('pengajuan', ['id' => $id])->row_array();
    }
}