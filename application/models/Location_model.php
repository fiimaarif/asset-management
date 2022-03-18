<?php

class Location_model extends CI_Model {

    public function getAllLocation(){
        return $this->db->get('location')->result_array();
         
    }

    public function hapusData($id){
        $this->db->where('id', $id);
        $this->db->delete('location');
    }

    public function getDataById($id){
        return $this->db->get_where('location', ['id' => $id])->row_array();
    }


}