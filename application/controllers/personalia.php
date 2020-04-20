<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Personalia extends CI_Controller{

    public function karyawan(){
        $data['data']=$this->m_personalia->tampil_karyawan();
        $this->load->view('personalia/v_karyawan',$data);
    
    }
    public function gaji_karyawan(){
        $data['data']=$this->m_personalia->tampil_karyawan();
        $this->load->view('personalia/v_gaji_karyawan',$data);
    
    }

}