<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Utang extends CI_Controller{

    public function utang_mitra()
    {
        
if ($this->session->userdata('hakakses')=='0'){
    
    $data['data']=$this->m_utang->tampil_utang_mitra();
    $data['mitra_semua']=$this->m_masterdata->tampil_mitra();
    $this->load->view('utang/v_utang_mitra',$data);
}
else{
    if ($this->session->userdata('hakakses')=='1'){
        
        $data['data']=$this->m_utang->tampil_utang_mitra();
        $data['mitra_semua']=$this->m_masterdata->tampil_mitra();
        $this->load->view('utang/v_utang_mitra',$data);
    }
    else{
      
           echo "Kamu gak ada Akses";

        
        }

}
       
    }
    
    public function tambah_utang_mitra()
    {
        
if ($this->session->userdata('hakakses')=='0'){
           
        $periode_awal=$this->input->post('periode_awal');
        $periode_akhir=$this->input->post('periode_akhir');
        $invoice=$this->input->post('invoice');
        $total_utang=$this->input->post('total_utang');
        $mitra=$this->input->post('mitra');
        $this->m_utang->tambah_utang_mitra($periode_awal,$periode_akhir,$invoice,$total_utang,$mitra);
        $this->session->set_flashdata('berhasil', 'Data Berhasil Di Input');
        redirect('utang/utang_mitra');
}
else{
    if ($this->session->userdata('hakakses')=='1'){
    
        $periode_awal=$this->input->post('periode_awal');
        $periode_akhir=$this->input->post('periode_akhir');
        $invoice=$this->input->post('invoice');
        $total_utang=$this->input->post('total_utang');
        $mitra=$this->input->post('mitra');
        $this->m_utang->tambah_utang_mitra($periode_awal,$periode_akhir,$invoice,$total_utang,$mitra);
        $this->session->set_flashdata('berhasil', 'Data Berhasil Di Input');
        redirect('utang/utang_mitra');
    }
    else{
      
           echo "Kamu gak ada Akses";

        
        }

}
    }
}