<?php

class Laporan_model extends CI_Model {

    public function getAllLaporan(){
        return $this->db->get('aset')->result_array();
         
    }

}