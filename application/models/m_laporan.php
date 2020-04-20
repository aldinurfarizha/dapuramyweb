<?php

class m_laporan extends CI_Model{

    public function tampil_invoice(){
        $hsl=$this->db->query("SELECT *
        FROM transaksi
        WHERE MONTH(tgl_order) = MONTH(CURRENT_DATE())
        AND YEAR(tgl_order) = YEAR(CURRENT_DATE())");
        return $hsl;
    }
    public function tampil_invoice_user($admin){
      $hsl=$this->db->query("SELECT *
      FROM transaksi
      WHERE MONTH(tgl_order) = MONTH(CURRENT_DATE())
      AND YEAR(tgl_order) = YEAR(CURRENT_DATE()) AND (admin) = '$admin' ");
      return $hsl;
  }
    public function tampil_operasional(){
      $hsl=$this->db->query("SELECT *
      FROM biaya_operasional
      WHERE MONTH(tgl_operasional) = MONTH(CURRENT_DATE())
      AND YEAR(tgl_operasional) = YEAR(CURRENT_DATE())");
      return $hsl;
  }
    public function tampil_invoice_tgl($tgl_awal,$tgl_akhir){
      $hsl=$this->db->query("SELECT *
        FROM transaksi
        WHERE tgl_order between '$tgl_awal' and '$tgl_akhir'");
      return $hsl;
  }

  public function tampil_invoice_tgl_mitra($tgl_awal,$tgl_akhir,$mitra){
    if($mitra==1){
      $hsl=$this->db->query("SELECT *
      FROM transaksi
      WHERE tgl_order between '$tgl_awal' and '$tgl_akhir'");
    return $hsl;
  }
  else{
    $hsl=$this->db->query("SELECT *
    FROM transaksi
    WHERE tgl_order between '$tgl_awal' and '$tgl_akhir' and (mitra_expedisi)='$mitra'");
  return $hsl;
  }
}
public function tampil_invoice_tgl_mitra_agen($tgl_awal,$tgl_akhir,$mitra,$admin){
  if($mitra==1){
    $hsl=$this->db->query("SELECT *
    FROM transaksi
    WHERE tgl_order between '$tgl_awal' and '$tgl_akhir' and (admin)='$admin'");
  return $hsl;
}
else{
  $hsl=$this->db->query("SELECT *
  FROM transaksi
  WHERE tgl_order between '$tgl_awal' and '$tgl_akhir' and (admin)='$admin' and (mitra_expedisi)='$mitra'");
return $hsl;
}
}

  public function tampil_invoice_tgl_user($tgl_awal,$tgl_akhir,$admin){
    $hsl=$this->db->query("SELECT *
      FROM transaksi
      WHERE tgl_order between '$tgl_awal' and '$tgl_akhir' and admin='$admin'");
    return $hsl;
}

public function cetak_operasional($tgl_awal,$tgl_akhir){
  $hsl=$this->db->query("SELECT *
    FROM biaya_operasional
    WHERE tgl_operasional between '$tgl_awal' and '$tgl_akhir'");
  return $hsl;
}

  public function edit_biaya_operasional($id_operasional,$deskripsi,$nominal,$gambar,$metode,$keterangan){
    $hsl=$this->db->query("UPDATE biaya_operasional SET deskripsi='$deskripsi', nominal='$nominal', gambar='$gambar', metode='$metode', keterangan='$keterangan' where id_operasional='$id_operasional'");
  return $hsl;
  }
  public function hapus_biaya_operasional($id_operasional){
    $hsl=$this->db->query("DELETE FROM biaya_operasional where id_operasional='$id_operasional'");
    return $hsl;
  }
  public function tampil_operasional_tgl($tgl_awal,$tgl_akhir){
    $hsl=$this->db->query("SELECT *
      FROM biaya_operasional
      WHERE tgl_operasional between '$tgl_awal' and '$tgl_akhir'");
    return $hsl;
}

public function tampil_kelola_order_tgl($tgl_awal,$tgl_akhir,$admin){
  $hsl=$this->db->query("SELECT * FROM transaksi WHERE tgl_order between '$tgl_awal' and '$tgl_akhir' and admin='$admin'");
  return $hsl;
}
public function tampil_kelola_order_tgl_manager($tgl_awal,$tgl_akhir){
  $hsl=$this->db->query("SELECT * FROM transaksi WHERE tgl_order between '$tgl_awal' and '$tgl_akhir'");
  return $hsl;
}

  public function tampil_invoice_idorder($id_order){
    $hsl=$this->db->query("SELECT * FROM transaksi where id_order='$id_order'");
    return $hsl;
}
public function tampil_invoice_idorder_user($id_order,$admin){
  $hsl=$this->db->query("SELECT * FROM transaksi where id_order='$id_order' AND (admin) = '$admin' ");
  return $hsl;
}
    public function tampil_agen(){
      $hsl=$this->db->query("SELECT * FROM agenfwd");
      return $hsl;
    }

    public function update_invoice($id_order){

      
      $number = count($id_order);
      if($number > 0)  
      {  
           for($i=0; $i<$number; $i++)  
           {  
            $hsl=$this->db->query("UPDATE transaksi SET status='MANIFESTED' where id_order='$id_order[$i]'");
           }  
         return $hsl; 
          }
      else{

      }
    }
  public function print_surat_jalan($id_order){
    // $order = "id_order = '".implode("' \n   OR id_order = '",$id_order)."'";
            $hsl=$this->db->query("SELECT * FROM transaksi where id_order='$id_order'");
    
            return $hsl;
  }
  public function print_surat_jalan_jalan($id_order){
     $order = "id_order = '".implode("' \n   OR id_order = '",$id_order)."'";
            $hsl=$this->db->query("SELECT * FROM transaksi where $order");
    
            return $hsl;
  }

  public function print_pelanggan($id_pelanggan){
    $pelanggan = "id_pelanggan = '".implode("' \n   OR id_pelanggan = '",$id_pelanggan)."'";
           $hsl=$this->db->query("SELECT * FROM pelanggan where $pelanggan");
   
           return $hsl;
 }

 public function print_mitra($id_mitra){
  $mitra = "id_mitra = '".implode("' \n   OR id_mitra = '",$id_mitra)."'";
         $hsl=$this->db->query("SELECT * FROM mitra where $mitra");
 
         return $hsl;
}

public function print_utang_mitra($id_utang_mitra){
  $mitra = "id_utang_mitra = '".implode("' \n   OR id_utang_mitra = '",$id_utang_mitra)."'";
         $hsl=$this->db->query("SELECT * FROM utang_mitra where $mitra");
 
         return $hsl;
}

public function print_agen($id_agen){
  $agen = "id_agen = '".implode("' \n   OR id_agen = '",$id_agen)."'";
         $hsl=$this->db->query("SELECT * FROM agen where $agen");
 
         return $hsl;
}
 public function print_semua_pelanggan(){
         $hsl=$this->db->query("SELECT * FROM pelanggan");
 
         return $hsl;
}
public function print_semua_mitra(){
  $hsl=$this->db->query("SELECT * FROM mitra");

  return $hsl;
}

public function print_semua_utang_mitra(){
  $hsl=$this->db->query("SELECT * FROM utang_mitra");

  return $hsl;
}

public function print_semua_agen(){
  $hsl=$this->db->query("SELECT * FROM user where hakakses=3");

  return $hsl;
}

  public function print_surat_tagihan_agen($id_order){
    ///$agen = "id_piutang_agen = '".implode("' \n   OR id_piutang_agen = '",$id_agen)."'";
           ///$hsl=$this->db->query("SELECT * FROM piutang_agen where $agen");
           $order = "id_order = '".implode("' \n   OR id_order = '",$id_order)."'";
           $hsl=$this->db->query("Select * from transaksi where $order");
           return $hsl;
 }
  public function print_deskripsi($id_order){
   // $order = "id_order = '".implode("' \n   OR id_order = '",$id_order)."'";
            $hsl=$this->db->query("SELECT * FROM deskripsi WHERE id_order='$id_order'");
    
            return $hsl;
  }
  public function print_total_deskripsi($id_order){
    // $order = "id_order = '".implode("' \n   OR id_order = '",$id_order)."'";
             $hsl=$this->db->query("SELECT SUM(total_nilai) as totalsemua FROM deskripsi WHERE id_order='$id_order'");
     
             return $hsl;
   }
}

?>