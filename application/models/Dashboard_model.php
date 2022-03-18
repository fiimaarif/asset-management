<?php

class Dashboard_model extends CI_Model {
    public function total($table){
        return $this->db->get($table)->num_rows();
    }
}