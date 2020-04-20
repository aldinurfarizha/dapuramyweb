<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Piutang extends CI_Controller{

    public function piutang_pelanggan()
    {
        if ($this->session->userdata('hakakses')=='0'){
            $data['data']=$this->m_piutang->tampil_piutang_pelanggan();
            $this->load->view('piutang/v_piutang_pelanggan',$data);
        }
        else{
            if ($this->session->userdata('hakakses')=='1'){
                $data['data']=$this->m_piutang->tampil_piutang_pelanggan();
                $this->load->view('piutang/v_piutang_pelanggan',$data);
            }
            else{
              
                   echo "Kamu gak ada Akses";

                
                }

        }
        

    }
    public function detail_piutang_pelanggan($idpelanggan)
    {
        if ($this->session->userdata('hakakses')=='0'){
            $data['data']=$this->m_piutang->tampil_detail_piutang_pelanggan($idpelanggan);
        $data['pelanggan']=$this->m_piutang->tampil_detail_pelanggan($idpelanggan);
        $data['bank']=$this->m_transaksi->ambil_bank();
        $this->load->view('detail/v_detail_piutang_pelanggan',$data);
        }
        else{
            if ($this->session->userdata('hakakses')=='1'){
                $data['data']=$this->m_piutang->tampil_detail_piutang_pelanggan($idpelanggan);
                $data['pelanggan']=$this->m_piutang->tampil_detail_pelanggan($idpelanggan);
                $data['bank']=$this->m_transaksi->ambil_bank();
                $this->load->view('detail/v_detail_piutang_pelanggan',$data);
            }
            else{
              
                   echo "Kamu gak ada Akses";

                
                }

        }
       

    }

    public function piutang_agen()
    {
        if ($this->session->userdata('hakakses')=='0'){
            $data['data']=$this->m_piutang->tampil_piutang_agen();
            $this->load->view('piutang/v_piutang_agen',$data);
        }
        else{
            if ($this->session->userdata('hakakses')=='1'){
                $data['data']=$this->m_piutang->tampil_piutang_agen();
                $this->load->view('piutang/v_piutang_agen',$data);
            }
            else{
              
                   echo "Kamu gak ada Akses";

                
                }

        }
    }
    public function detail_piutang_agen($id_agen)
    {
        if ($this->session->userdata('hakakses')=='0'){
            $data['data']=$this->m_piutang->tampil_detail_piutang_agen($id_agen);
        $data['pelanggan']=$this->m_piutang->tampil_detail_agen($id_agen);
        $data['bank']=$this->m_transaksi->ambil_bank();
        $this->load->view('detail/v_detail_piutang_agen',$data);
        
        }
        else{
            if ($this->session->userdata('hakakses')=='1'){
                $data['data']=$this->m_piutang->tampil_detail_piutang_agen($id_agen);
                $data['pelanggan']=$this->m_piutang->tampil_detail_agen($id_agen);
                $data['bank']=$this->m_transaksi->ambil_bank();
                $this->load->view('detail/v_detail_piutang_agen',$data);
              
            }
            else{
              
                   echo "Kamu gak ada Akses";

                
                }

        }
       

    }
}
    
   

