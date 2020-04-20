<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class m_backup extends CI_Model {
  public function transaksi($tgl_awal,$tgl_akhir){
    return $this->db->query("SELECT * FROM transaksi WHERE tgl_order between '$tgl_awal' and '$tgl_akhir'")->result();
  }
  public function deskripsi(){
    return $this->db->query("SELECT * FROM deskripsi")->result();
  }
  public function pelanggan(){
    return $this->db->query("SELECT * FROM pelanggan")->result();
  }

  public function piutang_pelanggan($tgl_awal,$tgl_akhir){
    return $this->db->query("SELECT id_piutang_pelanggan, nama_pelanggan, id_order, ongkir, tgl, lunas, keterangan, tgl_bayar from piutang_pelanggan INNER JOIN pelanggan ON piutang_pelanggan.id_pelanggan=pelanggan.id_pelanggan where tgl BETWEEN '$tgl_awal' and '$tgl_akhir'")->result();
  }

  public function piutang_agen($tgl_awal,$tgl_akhir){
    return $this->db->query("SELECT id_piutang_agen, nama_user, id_order, ongkir,bayar_jaskipin, tgl, lunas, keterangan, tgl_bayar from piutang_agen INNER JOIN user ON piutang_agen.id_agen=user.id_user where tgl BETWEEN '$tgl_awal' and '$tgl_akhir'")->result();
  }

  public function utang_mitra($tgl_awal,$tgl_akhir){
    return $this->db->query("SELECT * FROM utang_mitra where tgl_awal between '$tgl_awal' and '$tgl_akhir'")->result();
  }

  public function data_agen($tgl_awal,$tgl_akhir){
    return $this->db->query("SELECT * FROM user where hakakses=3")->result();
  }
  
}
