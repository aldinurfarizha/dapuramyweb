<?php

class m_kelola_akun extends CI_Model{

    public function tampil_user(){
        $hsl=$this->db->query("SELECT * FROM user");
        return $hsl;
    }
    public function tambah_user($nama_user,$username,$password,$hak_akses,$telepon,$kota,$alamat,$email){
        $hsl=$this->db->query("INSERT INTO user(id_user, nama_user, username, password, hakakses,telepon,kota, alamat, email) VALUES ('', '$nama_user','$username',SHA1('$password'),'$hak_akses', '$telepon','$kota', '$alamat','$email')");
        return $hsl;
    }
    public function ubah_hak_akses($hak_akses,$id_user){
        $hsl=$this->db->query("UPDATE user set hakakses='$hak_akses' where id_user='$id_user'");
        return $hsl;
    }
    public function change_password($id_user,$password){
        $hsl=$this->db->query("UPDATE user set password=SHA1('$password') where id_user='$id_user'");
        return $hsl;
    }
}
?>