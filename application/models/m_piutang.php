<?php

class m_piutang extends CI_Model{

    public function tampil_piutang_pelanggan(){
        $hsl=$this->db->query("SELECT piutang_pelanggan.id_piutang_pelanggan, piutang_pelanggan.id_pelanggan, piutang_pelanggan.ongkir, piutang_pelanggan.id_order, piutang_pelanggan.lunas,COUNT( piutang_pelanggan.id_order) as total_order,SUM(piutang_pelanggan.lunas='LUNAS') as total_lunas,SUM(piutang_pelanggan.lunas='TIDAK') as total_tidak_lunas,sum(case when piutang_pelanggan.lunas= 'TIDAK' then piutang_pelanggan.ongkir end) as 'total_piutang', pelanggan.id_pelanggan, pelanggan.nama_pelanggan from pelanggan, piutang_pelanggan where piutang_pelanggan.id_pelanggan=pelanggan.id_pelanggan GROUP BY pelanggan.nama_pelanggan DESC");
        return $hsl;
    }
 
    public function tampil_detail_piutang_pelanggan($id_pelanggan){
        $hsl=$this->db->query("SELECT id_piutang_pelanggan,id_pelanggan ,tgl,lunas,keterangan,tgl_bayar, piutang_pelanggan.id_order, nama_penerima, negara_penerima, jenis_layanan, berat ,total, piutang_pelanggan.ongkir, awb_no FROM piutang_pelanggan INNER JOIN transaksi ON piutang_pelanggan.id_order=transaksi.id_order WHERE piutang_pelanggan.id_pelanggan='$id_pelanggan'");
        return $hsl;
    }
    public function tampil_detail_piutang_agen($id_agen){
        /// SELECT id_piutang_agen,id_agen ,tgl,lunas,keterangan,tgl_bayar, piutang_agen.id_order, nama_penerima, negara_penerima, jenis_layanan, berat FROM piutang_agen INNER JOIN transaksi ON piutang_agen.id_order=transaksi.id_order WHERE piutang_agen.id_agen=13
        ///$hsl=$this->db->query(" SELECT * from piutang_agen WHERE id_agen='$id_agen' order by id_piutang_agen ASC ");
        $hsl=$this->db->query("SELECT id_piutang_agen,id_agen ,tgl,lunas,keterangan,tgl_bayar, piutang_agen.id_order, nama_penerima, negara_penerima, jenis_layanan, berat ,total,piutang_agen.bayar_jaskipin, piutang_agen.ongkir, awb_no FROM piutang_agen INNER JOIN transaksi ON piutang_agen.id_order=transaksi.id_order WHERE piutang_agen.id_agen='$id_agen'");
        return $hsl;
    }
    public function tampil_detail_pelanggan($id_pelanggan){
        $hsl=$this->db->query(" SELECT * FROM pelanggan where id_pelanggan ='$id_pelanggan'");
        return $hsl;
    }
    public function tampil_detail_agen($id_agen){
        $hsl=$this->db->query(" SELECT * FROM user where id_user ='$id_agen'");
        return $hsl;
    }
    public function tampil_piutang_agen(){
        $hsl=$this->db->query("SELECT piutang_agen.id_piutang_agen, piutang_agen.id_agen, piutang_agen.bayar_jaskipin, piutang_agen.id_order, piutang_agen.lunas,COUNT( piutang_agen.id_order) as total_order,SUM(piutang_agen.lunas='LUNAS') as total_lunas,SUM(piutang_agen.lunas='TIDAK') as total_tidak_lunas,sum(case when piutang_agen.lunas= 'TIDAK' then piutang_agen.bayar_jaskipin end) as 'total_piutang', user.id_user, user.username from user, piutang_agen where piutang_agen.id_agen=user.id_user GROUP BY user.username DESC");
        return $hsl;
    }

    public function bayar_piutang_agen($id_piutang_agen,$tgl_bayar,$keterangan){
        $number = count($id_piutang_agen);
        if($number > 0)  
        {  
             for($i=0; $i<$number; $i++)  
             {  
              $hsl=$this->db->query("UPDATE piutang_agen SET lunas='LUNAS', keterangan='$keterangan', tgl_bayar='$tgl_bayar' where id_piutang_agen='$id_piutang_agen[$i]'");
             }  
           return $hsl; 
            }
        else{
  
        }
    }
    public function bayar_piutang_pelanggan($id_piutang_agen,$tgl_bayar,$keterangan){
        $number = count($id_piutang_agen);
        if($number > 0)  
        {  
             for($i=0; $i<$number; $i++)  
             {  
              $hsl=$this->db->query("UPDATE piutang_pelanggan SET lunas='LUNAS', keterangan='$keterangan', tgl_bayar='$tgl_bayar' where id_piutang_pelanggan='$id_piutang_agen[$i]'");
             }  
           return $hsl; 
            }
        else{
  
        }
    }
}

?>