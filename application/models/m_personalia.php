<?php

class m_personalia extends CI_Model{

    public function tampil_karyawan(){
        $hsl=$this->db->query("SELECT * FROM karyawan");
        return $hsl;
    }
}
?>