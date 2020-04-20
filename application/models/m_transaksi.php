<?php

class m_transaksi extends CI_Model{

    public function simpan($nama_barang,$hs_code,$quantity, $satuan, $total_nilai, $nama_pengirim, $alamat_pengirim, $telp_pengirim, $nama_penerima, $alamat_penerima, $negara, $kode_pos, $telp_penerima, $id_penerima, $mitra_expedisi, $awb_no, $berat, $jenis_layanan, $panjang, $lebar, $tinggi, $total, $ongkir, $metode,$jumlah_kodi,$admin,$id_admin){
        
      
        $kode=$this->db->query("SELECT max(id_order) as idorder FROM transaksi");
        foreach ($kode->result() as $row)
        {
            $id=$row->idorder;
            $idorder = (int) substr($id, 4, 7);
            $idorder++;
            $char = "JCRX";
            $id_order= $char . sprintf("%07s", $idorder);
        }
        if (is_null($id_order))
        {
        echo 'Error Hubungi Developer, Kesalahan id_order Null';
        }
        else
        {
            $transaksi=$this->db->query("INSERT INTO transaksi (id_order, nama_pengirim, alamat_pengirim, telp_pengirim, nama_penerima, alamat_penerima, negara_penerima, kode_pos, telp_penerima, no_id, mitra_expedisi, awb_no, berat, jenis_layanan, panjang, lebar, tinggi, total, ongkir,bayar_jaskipin, metode_pembayaran, tgl_order, jumlah_kodi, admin )
                VALUES('$id_order', '$nama_pengirim[0]', '$alamat_pengirim[0]', '$telp_pengirim[0]', '$nama_penerima[0]','$alamat_penerima[0]', '$negara[0]', '$kode_pos[0]', '$telp_penerima[0]', '$id_penerima[0]', '$mitra_expedisi[0]', '$awb_no[0]', '$berat[0]', '$jenis_layanan[0]', '$panjang[0]', '$lebar[0]', '$tinggi[0]' , '$total[0]','$ongkir[0]','$ongkir[0]','$metode[0]', CURDATE(), '$jumlah_kodi[0]', '$admin')");
            $total_order=$this->db->query("UPDATE user set total_order= total_order+1 where id_user='$id_admin'");
            $number = count($nama_barang);
            if($number > 0)  
            {  
                 for($i=0; $i<$number; $i++)  
                 {  
                        $hsl=$this->db->query("INSERT INTO deskripsi(id_order, nama_barang,hs_code,satuan,total_nilai, quantity) VALUES('$id_order','$nama_barang[$i]','$hs_code[$i]','$satuan[$i]','$total_nilai[$i]','$quantity[$i]')");
                 }  
                 
                 return $hsl; 
                return $transaksi;
                return $total_order;
                echo "Data Berhasil Di input !";  
            }  
            else  
            {  
                 echo "Please Enter Name";  
            }
        }
         
    }

    public function tampil_order_hari_ini(){
        $hsl=$this->db->query('SELECT count(id_order) as "total_order" from transaksi where tgl_order =  CURRENT_DATE');
        return $hsl;
    }

    public function tampil_operasional_hari_ini(){
        $hsl=$this->db->query('select sum(nominal) as "total_operasional" from biaya_operasional  WHERE MONTH(tgl_operasional) = MONTH(CURRENT_DATE()) AND YEAR(tgl_operasional) = YEAR(CURRENT_DATE())');
        //sudah di ganti dengan bulan ini, namun nama method belum di ubah
        return $hsl;
    }
    public function simpan_agen($nama_barang,$hs_code,$quantity,$satuan, $total_nilai, $nama_pengirim, $alamat_pengirim, $telp_pengirim, $nama_penerima, $alamat_penerima, $negara, $kode_pos, $telp_penerima, $id_penerima, $mitra_expedisi, $awb_no, $berat, $jenis_layanan, $panjang, $lebar, $tinggi, $total, $ongkir, $bayar_jaskipin, $metode,$jumlah_kodi,$admin, $id_admin){
        
      
        $kode=$this->db->query("SELECT max(id_order) as idorder FROM transaksi");
        foreach ($kode->result() as $row)
        {
            $id=$row->idorder;
            $idorder = (int) substr($id, 4, 7);
            $idorder++;
            $char = "JCRX";
            $id_order= $char . sprintf("%07s", $idorder);
        }
        if (is_null($id_order))
        {
        echo 'Error Hubungi Developer, Kesalahan id_order Null';
        }
        else
        {
            $transaksi=$this->db->query("INSERT INTO transaksi (id_order, nama_pengirim, alamat_pengirim, telp_pengirim, nama_penerima, alamat_penerima, negara_penerima, kode_pos, telp_penerima, no_id, mitra_expedisi, awb_no, berat, jenis_layanan, panjang, lebar, tinggi, total, ongkir,bayar_jaskipin, metode_pembayaran, tgl_order, jumlah_kodi, admin )
                VALUES('$id_order', '$nama_pengirim[0]', '$alamat_pengirim[0]', '$telp_pengirim[0]', '$nama_penerima[0]','$alamat_penerima[0]', '$negara[0]', '$kode_pos[0]', '$telp_penerima[0]', '$id_penerima[0]', '$mitra_expedisi[0]', '$awb_no[0]', '$berat[0]', '$jenis_layanan[0]', '$panjang[0]', '$lebar[0]', '$tinggi[0]' , '$total[0]','$ongkir[0]','$bayar_jaskipin[0]','$metode[0]', CURDATE(), '$jumlah_kodi[0]', '$admin')");
            $masuk_agen=$this->db->query("INSERT INTO piutang_agen (id_piutang_agen, id_agen, id_order, ongkir,bayar_jaskipin, tgl, lunas) VALUES('','$id_admin', '$id_order','$ongkir[0]','$bayar_jaskipin[0]',CURDATE(),'TIDAK')");
            $total_order=$this->db->query("UPDATE user set total_order= total_order+1 where id_user='$id_admin'");
            $number = count($nama_barang);
            if($number > 0)  
            {  
                 for($i=0; $i<$number; $i++)  
                 {  
                        $hsl=$this->db->query("INSERT INTO deskripsi(id_order, nama_barang,hs_code,satuan,total_nilai,quantity) VALUES('$id_order','$nama_barang[$i]','$hs_code[$i]','$satuan[$i]','$total_nilai[$i]','$quantity[$i]')");
                 }  
                 
                 return $hsl; 
                return $transaksi;
                return $masuk_agen;
                return $total_order;
                echo "Data Berhasil Di input !";  
            }  
            else  
            {  
                 echo "Please Enter Name";  
            }
        }
         
    }
    public function ambil_pelanggan(){
        $hsl=$this->db->query("SELECT * FROM pelanggan");
        return $hsl;
    }

    public function tampil_omset_hari_ini(){
        $hsl=$this->db->query("SELECT sum(bayar_jaskipin) as 'total_omset' from transaksi where tgl_order =  CURRENT_DATE");
        return $hsl;
    }
    public function ambil_mitra(){
        $hsl=$this->db->query("SELECT * FROM mitra where status='0'");
        return $hsl;
    }

    public function ambil_mitra_semua(){
        $hsl=$this->db->query("SELECT * FROM mitra ");
        return $hsl;
    }

    public function ambil_bank(){
        $hsl=$this->db->query("SELECT * FROM bank where status='0'");
        return $hsl;
    }


    public function simpan_edit($id_order, $nama_pengirim, $alamat_pengirim, $telp_pengirim, $nama_penerima, $alamat_penerima, $negara, $kode_pos, $telp_penerima, $id_penerima, $mitra_expedisi, $awb_no, $berat, $jenis_layanan, $panjang, $lebar, $tinggi, $total, $ongkir, $jumlah_kodi){
    $hsl=$this->db->query("UPDATE transaksi SET nama_pengirim='$nama_pengirim', alamat_pengirim='$alamat_pengirim', telp_pengirim='$telp_pengirim', nama_penerima='$nama_penerima', alamat_penerima='$alamat_penerima', negara_penerima='$negara', kode_pos='$kode_pos', telp_penerima='$telp_penerima', no_id='$id_penerima', mitra_expedisi='$mitra_expedisi', awb_no='$awb_no', berat='$berat', jenis_layanan='$jenis_layanan', panjang='$panjang', lebar='$lebar', tinggi='$tinggi', total='$total', ongkir='$ongkir',jumlah_kodi='$jumlah_kodi', no_id='$id_penerima' WHERE id_order='$id_order' ");
    return $hsl;
    }
    public function simpan_biaya_operasional($deskripsi, $nominal, $gambar,$metode, $keterangan){
        $hsl=$this->db->query("INSERT INTO biaya_operasional(id_operasional, deskripsi, nominal, gambar, tgl_operasional,metode, keterangan) values ('', '$deskripsi', '$nominal', '$gambar',CURDATE(), '$metode', '$keterangan')");
        return $hsl;
    }
    public function simpan_piutang($nama_barang,$hs_code,$quantity,$satuan, $total_nilai, $nama_pengirim, $alamat_pengirim, $telp_pengirim, $nama_penerima, $alamat_penerima, $negara, $kode_pos, $telp_penerima, $id_penerima, $mitra_expedisi, $awb_no, $berat, $jenis_layanan, $panjang, $lebar, $tinggi, $total, $ongkir, $metode, $utang_pelanggan, $jumlah_kodi, $admin,$id_admin){
        
      
        $kode=$this->db->query("SELECT max(id_order) as idorder FROM transaksi");
        foreach ($kode->result() as $row)
        {
            $id=$row->idorder;
            $idorder = (int) substr($id, 4, 7);
            $idorder++;
            $char = "JCRX";
            $id_order= $char . sprintf("%07s", $idorder);
        }
        if (is_null($id_order))
        {
        echo 'Error Hubungi Developer, Kesalahan id_order Null';
        }
        else
        {
          
            $transaksi=$this->db->query("INSERT INTO transaksi (id_order, nama_pengirim, alamat_pengirim, telp_pengirim, nama_penerima, alamat_penerima, negara_penerima, kode_pos, telp_penerima, no_id, mitra_expedisi, awb_no, berat, jenis_layanan, panjang, lebar, tinggi, total, ongkir,bayar_jaskipin, metode_pembayaran, tgl_order, jumlah_kodi, admin)
                VALUES('$id_order', '$nama_pengirim[0]', '$alamat_pengirim[0]', '$telp_pengirim[0]', '$nama_penerima[0]','$alamat_penerima[0]', '$negara[0]', '$kode_pos[0]', '$telp_penerima[0]', '$id_penerima[0]', '$mitra_expedisi[0]', '$awb_no[0]', '$berat[0]', '$jenis_layanan[0]', '$panjang[0]', '$lebar[0]', '$tinggi[0]' , '$total[0]','$ongkir[0]','$ongkir[0]','$metode[0]',CURDATE(), '$jumlah_kodi[0]','$admin')");
          $masuk_pelanggan=$this->db->query("INSERT INTO piutang_pelanggan (id_piutang_pelanggan, id_pelanggan, id_order, ongkir, tgl, lunas) VALUES('','$utang_pelanggan[0]', '$id_order','$ongkir[0]',CURDATE(),'TIDAK')");
            $total_order=$this->db->query("UPDATE user set total_order= total_order+1 where id_user='$id_admin'"); 
            $number = count($nama_barang);
            if($number > 0)  
            {  
                 for($i=0; $i<$number; $i++)  
                 {  
                        $hsl=$this->db->query("INSERT INTO deskripsi(id_order, nama_barang,hs_code,satuan,total_nilai,quantity) VALUES('$id_order','$nama_barang[$i]','$hs_code[$i]','$satuan[$i]','$total_nilai[$i]','$quantity[$i]')");
                 }  
                 echo "Data Berhasil Di input !";  
                 return $hsl; 
                return $transaksi;
                return $masuk_pelanggan;
                return $total_order;
               
            }  
            else  
            {  
                 echo "Lengkapi Form Yang kosong !";  
            }
        }
         
    }
}?>