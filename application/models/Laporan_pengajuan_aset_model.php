<?php

class Laporan_pengajuan_aset_model extends CI_Model {

    public function getAllLaporanPengajuan(){
        return $this->db->get('pengajuan')->result_array();
         
    }

}