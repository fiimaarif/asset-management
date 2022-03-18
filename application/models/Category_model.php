<?php

class Category_model extends CI_Model {
    public function getAllCategory(){
        return $this->db->get('category')->result_array();
         
    }

    public function hapusData($id){
        $this->db->where('id', $id);
        $this->db->delete('category');
    }

    public function getDataById($id){
        return $this->db->get_where('category', ['id' => $id])->row_array();
    }
}