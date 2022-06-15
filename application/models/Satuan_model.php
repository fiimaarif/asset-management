<?php

class Satuan_model extends CI_Model {

    public function getAllSatuan(){
        return $this->db->get('satuan')->result_array();
         
    }

    public function hapusData($id){
        $this->db->where('id', $id);
        $this->db->delete('satuan');
    }

    public function getDataById($id){
        return $this->db->get_where('satuan', ['id' => $id])->row_array();
    }


}