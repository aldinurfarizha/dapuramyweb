<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelola_akun extends CI_Controller  {

    public function tambah_akun()
    {
       
        if ($this->session->userdata('hakakses')=='0'){
            $this->load->view('kelola_akun/v_tambah_akun');
        }
        else{
            echo "Kamu tidak Ada akses untuk kesini";
        }
           
        
      
    }

    public function insert_akun(){

        if ($this->session->userdata('hakakses')=='0'){
            $nama_user=$this->input->post('nama_user');
            $username=$this->input->post('username');
            $password=$this->input->post('password');
            $hak_akses=$this->input->post('hak_akses');
            $telepon=$this->input->post('telepon');
            $alamat=$this->input->post('alamat');
            $email=$this->input->post('email');
            $kota=$this->input->post('kota');
            $this->m_kelola_akun->tambah_user($nama_user,$username,$password,$hak_akses,$telepon,$kota,$alamat,$email);
            $this->session->set_flashdata('berhasil', 'Akun berhasil di tambahkan');
            redirect('kelola_akun/tambah_akun');
        }
        else{
            echo "Kamu tidak Ada akses untuk kesini";
        }
      
    }
    
    public function ubah_hak_akses(){
        if ($this->session->userdata('hakakses')=='0'){
            $hak_akses=$this->input->post('hak');
            $id_user=$this->input->post('user');
            $this->m_kelola_akun->ubah_hak_akses($hak_akses,$id_user);
            $this->session->set_flashdata('berhasil', 'Hak Akses Berhasil di rubah');
            redirect('kelola_akun/hak_akses');
        }
        else{
            echo "Kamu tidak Ada akses untuk kesini";
        }
           
       
    }

    public function hak_akses()
    {
        if ($this->session->userdata('hakakses')=='0'){
            $data['data']=$this->m_kelola_akun->tampil_user();
            $this->load->view('kelola_akun/v_hak_akses',$data);
        }
        else{
            echo "Kamu tidak Ada akses untuk kesini";
        }
      
    }

    public function ganti_password()
    {
        if ($this->session->userdata('hakakses')=='0'){
            $data['data']=$this->m_kelola_akun->tampil_user();
            $this->load->view('kelola_akun/v_ganti_password',$data);
        }
        else{
            echo "Kamu tidak Ada akses untuk kesini";
        }
      
    }
    
    public function change_password(){

        if ($this->session->userdata('hakakses')=='0'){
            $id_user=$this->input->post('user');
            $password=$this->input->post('password');
            $this->m_kelola_akun->change_password($id_user,$password);
            $this->session->set_flashdata('berhasil', 'Password Berhasil di rubah');
            redirect('kelola_akun/ganti_password');
        }
        else{
            echo "Kamu tidak Ada akses untuk kesini";
        }
           
   
    }
}

