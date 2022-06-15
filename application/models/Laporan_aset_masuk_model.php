<?php

class Laporan_aset_masuk_model extends CI_Model {

    public function getAllLaporanMasuk(){
        return $this->db->get('aset_masuk')->result_array();
         
    }

}