<?php

class Department_model extends CI_Model {

    public function getAllDepartment(){
        return $this->db->get('department')->result_array();
         
    }

    public function hapusData($id){
        $this->db->where('id', $id);
        $this->db->delete('department');
    }

    public function getDataById($id){
        return $this->db->get_where('department', ['id' => $id])->row_array();
    }

}