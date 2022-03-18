<?php

class Aset_model extends CI_Model {
    public function getAllAset(){
        return $this->db->get('aset')->result_array();
         
    }
    public function hapusData($id){
        $this->db->where('id', $id);
        $this->db->delete('aset');
    }

    public function getDataById($id){
        return $this->db->get_where('aset', ['id' => $id])->row_array();
    }
}