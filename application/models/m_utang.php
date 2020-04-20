<?php

class m_utang extends CI_Model{

    public function tampil_utang_mitra(){
        $hsl=$this->db->query("SELECT * FROM utang_mitra");
        return $hsl;
    }
    public function tampil_utang_mitra_pending(){
        $hsl=$this->db->query("SELECT * FROM utang_mitra where status='PENDING'");
        return $hsl;
    }
    public function tambah_utang_mitra($periode_awal, $periode_akhir, $invoice, $total_utang, $mitra){
       $hsl=$this->db->query("INSERT INTO utang_mitra (tgl_awal, tgl_akhir, invoice_no, total, mitra, status) VALUES('$periode_awal', '$periode_akhir', '$invoice', '$total_utang', '$mitra', 'PENDING')");
       return $hsl;
    }
    public function bayar_utang_mitra($id_utang_mitra,$gambar){
        $hsl=$this->db->query("UPDATE utang_mitra SET  transfer_date=CURDATE(), status='LUNAS', gambar='$gambar' WHERE id_utang_mitra='$id_utang_mitra'");
        return $hsl;
     }
}

?>