<?php

class Laporan_aset_keluar_model extends CI_Model {

    public function getAllLaporanKeluar(){
        return $this->db->get('aset_keluar')->result_array();
         
    }

}