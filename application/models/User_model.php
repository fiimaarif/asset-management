<?php

class User_model extends CI_Model {
    public function getAllUser(){
        return $this->db->get('user')->result_array();
         
    }
    public function hapusData($id){
        $this->db->where('id', $id);
        $this->db->delete('user');
    }
    public function getDataById($id){
        return $this->db->get_where('user', ['id' => $id])->row_array();
    }
}