<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Pembayaran extends CI_Controller{



    public function pembayaran_piutang_pelanggan(){
        if ($this->session->userdata('hakakses')=='0'){
            $data['data']=$this->m_piutang->tampil_piutang_pelanggan();
        $this->load->view('pembayaran/v_piutang_pelanggan', $data);
        }
        else{
            if ($this->session->userdata('hakakses')=='1'){
                $data['data']=$this->m_piutang->tampil_piutang_pelanggan();
                $this->load->view('pembayaran/v_piutang_pelanggan', $data);
            }
            else{
                   echo "Kamu gak ada Akses";
                }

        }


       
    }

    public function pembayaran_utang_mitra(){
        if ($this->session->userdata('hakakses')=='0'){
            $data['data']=$this->m_utang->tampil_utang_mitra();
            $this->load->view('pembayaran/v_utang_mitra',$data);
        }
        else{
            if ($this->session->userdata('hakakses')=='1'){
                $data['data']=$this->m_utang->tampil_utang_mitra();
                $this->load->view('pembayaran/v_utang_mitra',$data);
            }
            else{
              
                   echo "Kamu gak ada Akses";

                
                }

        }
      
    }

    public function pembayaran_piutang_agen(){
        if ($this->session->userdata('hakakses')=='0'){
            $data['data']=$this->m_piutang->tampil_piutang_agen();
            $this->load->view('pembayaran/v_piutang_agen',$data);
        }
        else{
            if ($this->session->userdata('hakakses')=='1'){
                $data['data']=$this->m_piutang->tampil_piutang_agen();
            $this->load->view('pembayaran/v_piutang_agen',$data);
            }
            else{
              
                   echo "Kamu gak ada Akses";

                
                }

        }
      
    }

    public function detail_pembayaran_piutang_agen($id_agen)
    {
        if ($this->session->userdata('hakakses')=='0'){
            $data['bank']=$this->m_transaksi->ambil_bank();
            $data['data']=$this->m_piutang->tampil_detail_piutang_agen($id_agen);
        $data['pelanggan']=$this->m_piutang->tampil_detail_agen($id_agen);
        $this->load->view('detail/v_detail_pembayaran_piutang_agen',$data);
        }
        else{
            if ($this->session->userdata('hakakses')=='1'){
                $data['bank']=$this->m_transaksi->ambil_bank();
                $data['data']=$this->m_piutang->tampil_detail_piutang_agen($id_agen);
                $data['pelanggan']=$this->m_piutang->tampil_detail_agen($id_agen);
                $this->load->view('detail/v_detail_pembayaran_piutang_agen',$data);
            }
            else{
              
                   echo "Kamu gak ada Akses";

                
                }

        }
       

    }

    public function detail_pembayaran_piutang_pelanggan($id_pelanggan)
    {
        if ($this->session->userdata('hakakses')=='0'){
            $data['bank']=$this->m_transaksi->ambil_bank();
            $data['data']=$this->m_piutang->tampil_detail_piutang_pelanggan($id_pelanggan);
            $data['pelanggan']=$this->m_piutang->tampil_detail_pelanggan($id_pelanggan);
            $this->load->view('detail/v_detail_pembayaran_piutang_pelanggan',$data);
        }
        else{
            if ($this->session->userdata('hakakses')=='1'){
                $data['bank']=$this->m_transaksi->ambil_bank();
                $data['data']=$this->m_piutang->tampil_detail_piutang_pelanggan($id_pelanggan);
                $data['pelanggan']=$this->m_piutang->tampil_detail_pelanggan($id_pelanggan);
                $this->load->view('detail/v_detail_pembayaran_piutang_pelanggan',$data);
            }
            else{
              
                   echo "Kamu gak ada Akses";

                
                }

        }
       

    }


    public function bayar_piutang_agen()
    {
        if ($this->session->userdata('hakakses')=='0'){
            $id_piutang_agen=$this->input->post('id_piutang_agen');
            $metode=$this->input->post('metode');
            $tgl_bayar=$this->input->post('tgl_bayar');
            $keterangan=$this->input->post('keterangan');
            $jumlah_bayar=$this->input->post('total_bayar');
            $total_harus=$this->input->post('total_harus');
            if($total_harus=$jumlah_bayar){
                if($metode=='transfer'){
                    $this->m_piutang->bayar_piutang_agen($id_piutang_agen,$tgl_bayar,$keterangan);
                    $this->session->set_flashdata('berhasil', 'pembayaran berhasil');
                    redirect('pembayaran/pembayaran_piutang_agen');
                }
                else{
                    $keterangan2="CASH";
                    $this->m_piutang->bayar_piutang_agen($id_piutang_agen,$tgl_bayar,$keterangan2);
                    $this->session->set_flashdata('berhasil', 'pembayaran berhasil');
                    redirect('pembayaran/pembayaran_piutang_agen');
                }
                
            }
            else{
            $this->session->set_flashdata('gagal', 'pembayaran berhasil');
            redirect('pembayaran/pembayaran_piutang_agen');
               }
        }
        else{
            if ($this->session->userdata('hakakses')=='1'){
                $id_piutang_agen=$this->input->post('id_piutang_agen');
                $metode=$this->input->post('metode');
                $tgl_bayar=$this->input->post('tgl_bayar');
                $keterangan=$this->input->post('keterangan');
                $jumlah_bayar=$this->input->post('total_bayar');
                $total_harus=$this->input->post('total_harus');
                if($total_harus=$jumlah_bayar){
                    $this->m_piutang->bayar_piutang_agen($id_piutang_agen,$metode, $tgl_bayar,$keterangan);
                    $this->session->set_flashdata('berhasil', 'pembayaran berhasil');
                    redirect('pembayaran/pembayaran_piutang_agen');
                }
                else{
                $this->session->set_flashdata('gagal', 'pembayaran berhasil');
                redirect('pembayaran/pembayaran_piutang_agen');
                   }
        
            }
            else{
              
                   echo "Kamu gak ada Akses";

                
                }

        }
       

    }

    public function bayar_piutang_pelanggan()
    {
        if ($this->session->userdata('hakakses')=='0'){
            $id_piutang_agen=$this->input->post('id_piutang_pelanggan');
            $metode=$this->input->post('metode');
            $tgl_bayar=$this->input->post('tgl_bayar');
            $keterangan=$this->input->post('keterangan');
            $jumlah_bayar=$this->input->post('total_bayar');
            $total_harus=$this->input->post('total_harus');
            if($total_harus=$jumlah_bayar){
                if($metode=='transfer'){
                    $this->m_piutang->bayar_piutang_pelanggan($id_piutang_agen,$tgl_bayar,$keterangan);
                    $this->session->set_flashdata('berhasil', 'pembayaran berhasil');
                    redirect('pembayaran/pembayaran_piutang_pelanggan');
                }
                else{
                    $keterangan2="CASH";
                    $this->m_piutang->bayar_piutang_pelanggan($id_piutang_agen,$tgl_bayar,$keterangan2);
                    $this->session->set_flashdata('berhasil', 'pembayaran berhasil');
                    redirect('pembayaran/pembayaran_piutang_pelanggan');
                }
                
            }
            else{
            $this->session->set_flashdata('gagal', 'pembayaran berhasil');
            redirect('pembayaran/pembayaran_piutang_agen');
               }
        }
        else{
            if ($this->session->userdata('hakakses')=='1'){
                $id_piutang_agen=$this->input->post('id_piutang_pelanggan');
                $metode=$this->input->post('metode');
                $tgl_bayar=$this->input->post('tgl_bayar');
                $keterangan=$this->input->post('keterangan');
                $jumlah_bayar=$this->input->post('total_bayar');
                $total_harus=$this->input->post('total_harus');
                if($total_harus=$jumlah_bayar){
                    $this->m_piutang->bayar_piutang_pelanggan($id_piutang_agen,$metode, $tgl_bayar,$keterangan);
                    $this->session->set_flashdata('berhasil', 'pembayaran berhasil');
                    redirect('pembayaran/pembayaran_piutang_pelanggan');
                }
                else{
                $this->session->set_flashdata('gagal', 'pembayaran berhasil');
                redirect('pembayaran/pembayaran_piutang_pelanggan');
                   }
        
            }
            else{
              
                   echo "Kamu gak ada Akses";

                
                }

        }
       

    }

        public function bayar_utang_mitra(){
            if ($this->session->userdata('hakakses')=='0'){
                $id_utang_mitra=$this->input->post('id_utang_mitra');
                $jumlah_bayar=$this->input->post('total_bayar');
                $max_pembayaran=$this->input->post('max_pembayaran');
                $gambar=$this->input->post('gambar');
        
                if($max_pembayaran==$jumlah_bayar){
                    $this->m_utang->bayar_utang_mitra($id_utang_mitra,$gambar);
                    $this->session->set_flashdata('berhasil', 'Data Berhasil Di Input');
                    redirect('pembayaran/pembayaran_utang_mitra');
                }
                else{
                    $this->session->set_flashdata('gagal', 'Data gagal Di Input');
                    redirect('pembayaran/pembayaran_utang_mitra');
                   }
            }
            else{
                if ($this->session->userdata('hakakses')=='1'){
                    $id_utang_mitra=$this->input->post('id_utang_mitra');
                    $jumlah_bayar=$this->input->post('total_bayar');
                    $max_pembayaran=$this->input->post('max_pembayaran');
                    $gambar=$this->input->post('gambar');
            
                    if($max_pembayaran==$jumlah_bayar){
                        $this->m_utang->bayar_utang_mitra($id_utang_mitra,$gambar);
                        $this->session->set_flashdata('berhasil', 'Data Berhasil Di Input');
                        redirect('pembayaran/pembayaran_utang_mitra');
                    }
                    else{
                        $this->session->set_flashdata('gagal', 'Data gagal Di Input');
                        redirect('pembayaran/pembayaran_utang_mitra');
                       }
                }
                else{
                  
                       echo "Kamu gak ada Akses";
    
                    
                    }
    
            }
           
            }
        

    
    
   
}