<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Print_lap extends CI_Controller{

    public function print_nota($id_order)
    {
        if ($this->session->userdata('hakakses')=='0'){
            $data['data'] = $this->m_laporan->print_surat_jalan($id_order);
        $data['deskripsi'] = $this->m_laporan->print_deskripsi($id_order);
        $this->load->view('print_laporan/cetak_nota',$data);
        }
        else{
            if ($this->session->userdata('hakakses')=='2'){
                $data['data'] = $this->m_laporan->print_surat_jalan($id_order);
                $data['deskripsi'] = $this->m_laporan->print_deskripsi($id_order);
                $this->load->view('print_laporan/cetak_nota',$data);
            }
            else{
                if ($this->session->userdata('hakakses')=='3'){
                    $data['data'] = $this->m_laporan->print_surat_jalan($id_order);
                    $data['deskripsi'] = $this->m_laporan->print_deskripsi($id_order);
                    $this->load->view('print_laporan/cetak_nota',$data);
                }
                else{
                   echo "Kamu gak ada Akses";
                  
                }
                
                }

        }
       

    }

    public function print_resi($id_order){
        if ($this->session->userdata('hakakses')=='0'){
            $data['data'] = $this->m_laporan->print_surat_jalan($id_order);
            $data['deskripsi'] = $this->m_laporan->print_deskripsi($id_order);
            $this->load->view('print_laporan/cetak_resi',$data);
        }
        else{
            if ($this->session->userdata('hakakses')=='2'){
                $data['data'] = $this->m_laporan->print_surat_jalan($id_order);
                $data['deskripsi'] = $this->m_laporan->print_deskripsi($id_order);
                $this->load->view('print_laporan/cetak_resi',$data);
            }
            else{
                if ($this->session->userdata('hakakses')=='3'){
                    $data['data'] = $this->m_laporan->print_surat_jalan($id_order);
                    $data['deskripsi'] = $this->m_laporan->print_deskripsi($id_order);
                    $this->load->view('print_laporan/cetak_resi',$data);
                }
                else{
                   echo "Kamu gak ada Akses";
                  
                }
                
                }

        }

    }

    public function print_resi_idr($id_order){
        if ($this->session->userdata('hakakses')=='0'){
            $data['data'] = $this->m_laporan->print_surat_jalan($id_order);
            $data['deskripsi'] = $this->m_laporan->print_deskripsi($id_order);
            $this->load->view('print_laporan/cetak_resi_idr',$data);
        }
        else{
            if ($this->session->userdata('hakakses')=='2'){
                $data['data'] = $this->m_laporan->print_surat_jalan($id_order);
                $data['deskripsi'] = $this->m_laporan->print_deskripsi($id_order);
                $this->load->view('print_laporan/cetak_resi_idr',$data);
            }
            else{
                if ($this->session->userdata('hakakses')=='3'){
                    $data['data'] = $this->m_laporan->print_surat_jalan($id_order);
                    $data['deskripsi'] = $this->m_laporan->print_deskripsi($id_order);
                    $this->load->view('print_laporan/cetak_resi_idr',$data);
                }
                else{
                   echo "Kamu gak ada Akses";
                  
                }
                
                }

        }

    }
    
    public function print_proforma($id_order){
        if ($this->session->userdata('hakakses')=='0'){
            $data['data'] = $this->m_laporan->print_surat_jalan($id_order);
            $data['deskripsi'] = $this->m_laporan->print_deskripsi($id_order);
            $data['deskripsi2'] = $this->m_laporan->print_total_deskripsi($id_order);
            $this->load->view('print_laporan/cetak_proforma',$data);
        }
        else{
            if ($this->session->userdata('hakakses')=='2'){
                $data['data'] = $this->m_laporan->print_surat_jalan($id_order);
        $data['deskripsi'] = $this->m_laporan->print_deskripsi($id_order);
        $data['deskripsi2'] = $this->m_laporan->print_total_deskripsi($id_order);
        $this->load->view('print_laporan/cetak_proforma',$data);
            }
            else{
                if ($this->session->userdata('hakakses')=='3'){
                    $data['data'] = $this->m_laporan->print_surat_jalan($id_order);
                    $data['deskripsi'] = $this->m_laporan->print_deskripsi($id_order);
                    $data['deskripsi2'] = $this->m_laporan->print_total_deskripsi($id_order);
                    $this->load->view('print_laporan/cetak_proforma',$data);
                }
                else{
                   echo "Kamu gak ada Akses";
                  
                }
                
                }

        }
    
    }

    public function print_proforma_us($id_order){
        if ($this->session->userdata('hakakses')=='0'){
            $data['data'] = $this->m_laporan->print_surat_jalan($id_order);
            $data['deskripsi'] = $this->m_laporan->print_deskripsi($id_order);
            $data['deskripsi2'] = $this->m_laporan->print_total_deskripsi($id_order);
            $this->load->view('print_laporan/cetak_proforma_us',$data);
        }
        else{
            if ($this->session->userdata('hakakses')=='2'){
                $data['data'] = $this->m_laporan->print_surat_jalan($id_order);
        $data['deskripsi'] = $this->m_laporan->print_deskripsi($id_order);
        $data['deskripsi2'] = $this->m_laporan->print_total_deskripsi($id_order);
        $this->load->view('print_laporan/cetak_proforma_us',$data);
            }
            else{
                if ($this->session->userdata('hakakses')=='3'){
                    $data['data'] = $this->m_laporan->print_surat_jalan($id_order);
                    $data['deskripsi'] = $this->m_laporan->print_deskripsi($id_order);
                    $data['deskripsi2'] = $this->m_laporan->print_total_deskripsi($id_order);
                    $this->load->view('print_laporan/cetak_proforma_us',$data);
                }
                else{
                   echo "Kamu gak ada Akses";
                  
                }
                
                }

        }
    
    }

    public function print_label($id_order){
        if ($this->session->userdata('hakakses')=='0'){
            $data['data'] = $this->m_laporan->print_surat_jalan($id_order);
            $this->load->view('print_laporan/cetak_label',$data);
        }
        else{
            if ($this->session->userdata('hakakses')=='2'){
                $data['data'] = $this->m_laporan->print_surat_jalan($id_order);
                $this->load->view('print_laporan/cetak_label',$data);
            }
            else{
                if ($this->session->userdata('hakakses')=='3'){
                    $data['data'] = $this->m_laporan->print_surat_jalan($id_order);
        $this->load->view('print_laporan/cetak_label',$data);
                }
                else{
                   echo "Kamu gak ada Akses";
                  
                }
                
                }

        }
      
    }

    
   
}