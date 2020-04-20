<?php

class m_masterdata extends CI_Model{

    public function tampil_pelanggan(){
        $hsl=$this->db->query("SELECT * FROM pelanggan");
        return $hsl;
    }
public function total_pelanggan(){
  $hsl=$this->db->query("select count(id_pelanggan) as 'total_pelanggan' from pelanggan");
  return $hsl;
}
    public function tampil_agen(){
      $hsl=$this->db->query("SELECT * FROM user where hakakses=3");
      return $hsl;
    }

public function tampil_mitra(){
  $hsl=$this->db->query('SELECT * from mitra');
  return $hsl;
}

public function tampil_mitra_aktif(){
  $hsl=$this->db->query('SELECT * from mitra where status=0');
  return $hsl;
}

public function tampil_bank(){
  $hsl=$this->db->query('SELECT * from bank');
  return $hsl;
}

public function tampil_semua_admin(){
  $hsl=$this->db->query('SELECT * from user where hakakses=2');
  return $hsl;
}

public function tampil_semua_agen(){
  $hsl=$this->db->query('SELECT * from user where hakakses=3');
  return $hsl;
}

    public function tambah_pelanggan($nama_pelanggan, $alamat_pelanggan, $telp_pelanggan,$telp_pelanggan_alternatif,$email){
      $hsl=$this->db->query("INSERT INTO pelanggan(nama_pelanggan, alamat_pelanggan, telp_pelanggan, telp_alternatif,email) VALUES('$nama_pelanggan', '$alamat_pelanggan', '$telp_pelanggan','$telp_pelanggan_alternatif','$email')");
    }
    public function tambah_agen($nama_agen, $alamat_agen, $telp_agen,$telp_agen_alternatif,$email){
      $hsl=$this->db->query("INSERT INTO agen(nama_agen, alamat_agen, telepon_agen, telepon_alternatif,email) VALUES('$nama_agen', '$alamat_agen', '$telp_agen','$telp_agen_alternatif','$email')");
    }


    public function tambah_mitra($nama_mitra, $alamat_mitra, $telp_mitra,$email){
      $hsl=$this->db->query("INSERT INTO mitra(nama_mitra, alamat_mitra, telepon, email) VALUES('$nama_mitra', '$alamat_mitra', '$telp_mitra','$email')");
    }

    public function tambah_bank($nama_bank, $rekening, $atas_nama){
      $hsl=$this->db->query("INSERT INTO bank(nama_bank, rekening, atas_nama) VALUES('$nama_bank', '$rekening', '$atas_nama')");
    }

    public function edit_pelanggan($id_pelanggan,$nama_pelanggan,$alamat_pelanggan,$telp_pelanggan,$telp_pelanggan_alternatif,$email){
      $hsl=$this->db->query("UPDATE pelanggan set nama_pelanggan='$nama_pelanggan', alamat_pelanggan='$alamat_pelanggan', telp_pelanggan='$telp_pelanggan', telp_alternatif='$telp_pelanggan_alternatif',email='$email' where id_pelanggan='$id_pelanggan'");
    return $hsl;
    }

    
    public function edit_agen($id_agen,$nama_agen, $alamat_agen, $telp_agen,$telp_agen_alternatif,$email){
      $hsl=$this->db->query("UPDATE agen set nama_agen='$nama_agen', alamat_agen='$alamat_agen', telepon_agen='$telp_agen', telepon_alternatif='$telp_agen_alternatif',email='$email' where id_agen='$id_agen'");
    return $hsl;
    }

    public function edit_mitra($id_mitra,$nama_mitra, $alamat_mitra, $telp_mitra,$email){
      $hsl=$this->db->query("UPDATE mitra set nama_mitra='$nama_mitra', alamat_mitra='$alamat_mitra', telepon='$telp_mitra',email='$email' where id_mitra='$id_mitra'");
    return $hsl;
    }

    public function edit_bank($id_bank,$nama_bank, $rekening, $atas_nama){
      $hsl=$this->db->query("UPDATE bank set nama_bank='$nama_bank', rekening='$rekening', atas_nama='$atas_nama' where id_bank='$id_bank'");
    return $hsl;
    }


    public function get_data()
    {
        return $this->db->get('user');
    }
    public function input_data($data,$table)
    {
  $this->db->insert($table,$data);
 }
 public function hapus_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);

    }
    function cari_siswa($nama){
      $hsl=$this->db->query("SELECT * from siswa where nama like '%".$nama."%'");
      return $hsl;
    }
    function tampil_akun(){
   
        $hsl=$this->db->query("SELECT * FROM user ");
        return $hsl;
    }
    function update_siswa($id_siswa,$nama,$alamat,$telepon){
		$hsl=$this->db->query("UPDATE siswa SET nama='$nama',alamat='$alamat',telepon='$telepon' WHERE id_siswa='$id_siswa'");
		return $hsl;
    }
    function tambah_akun($username,$kelas,$password,$level){
      $hsl=$this->db->query("INSERT INTO user (`username`, `password`, `nama`, `level`) VALUES ('$username', SHA1('$password'), '$kelas', '$level');");
      return $hsl;
      }
    
    function hapus_akun($id_akun){
		$hsl=$this->db->query("DELETE FROM user where user_id='$id_akun'");
		return $hsl;
  }
  function hapus_pelanggan($id_pelanggan){
    $hsl=$this->db->query("DELETE FROM pelanggan where id_pelanggan='$id_pelanggan'");
		return $hsl;
  }
  function hapus_agen($id_agen){
    $hsl=$this->db->query("DELETE FROM agen where id_agen='$id_agen'");
		return $hsl;
  }
  function ubah_status_mitra($status, $id_mitra){
    $hsl=$this->db->query("UPDATE mitra SET status='$status' where id_mitra='$id_mitra'");
    return $hsl;
  }

  function ubah_status_bank($status, $id_bank){
    $hsl=$this->db->query("UPDATE bank SET status='$status' where id_bank='$id_bank'");
    return $hsl;
  }
}

?>