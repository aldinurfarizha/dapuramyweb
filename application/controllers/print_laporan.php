<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');
 
class Print_laporan extends CI_Controller {
    public function __construct()
        {   
            parent::__construct();
            $this->load->library('Pdf');
            $this->load->model('m_laporan');
        }
    
    public function cetak_laporan()
        {
            if ($this->session->userdata('hakakses')=='0'){
                $id_order=$this->input->post('id_order');
            $this->m_laporan->update_invoice($id_order);
            $data['data'] = $this->m_laporan->print_surat_jalan_jalan($id_order);
            $this->load->view('print_laporan/cetak_surat_jalan', $data);
            }
            else{
                if ($this->session->userdata('hakakses')=='2'){
                    $id_order=$this->input->post('id_order');
                    $this->m_laporan->update_invoice($id_order);
                    $data['data'] = $this->m_laporan->print_surat_jalan_jalan($id_order);
                    $this->load->view('print_laporan/cetak_surat_jalan', $data);
                }
                else{
                    if ($this->session->userdata('hakakses')=='3'){
                        $id_order=$this->input->post('id_order');
                        $this->m_laporan->update_invoice($id_order);
                        $data['data'] = $this->m_laporan->print_surat_jalan_jalan($id_order);
                        $this->load->view('print_laporan/cetak_surat_jalan', $data);
                    }
                    else{
                       echo "Kamu gak ada Akses";
                      
                    }
                    
                    }
    
            }
       
    } 


    public function cetak_pelanggan()
        {
            if ($this->session->userdata('hakakses')=='0'){
                $id_pelanggan=$this->input->post('id_pelanggan');
            
            $data['data'] = $this->m_laporan->print_pelanggan($id_pelanggan);
            $this->load->view('print_laporan/cetak_pelanggan', $data);
            }
            else{
                if ($this->session->userdata('hakakses')=='2'){
                    $id_pelanggan=$this->input->post('id_pelanggan');
                    
                    $data['data'] = $this->m_laporan->print_pelanggan($id_pelanggan);
                    $this->load->view('print_laporan/cetak_pelanggan', $data);
                }
                else{
                    if ($this->session->userdata('hakakses')=='3'){
                        echo "Kamu gak ada Akses";
                    }
                    else{
                       echo "Kamu gak ada Akses";
                      
                    }
                    
                    }
    
            }
       
    } 

    public function cetak_semua_pelanggan()
        {
            if ($this->session->userdata('hakakses')=='0'){
                
            
            $data['data'] = $this->m_laporan->print_semua_pelanggan();
            $this->load->view('print_laporan/cetak_pelanggan', $data);
            }
            else{
                if ($this->session->userdata('hakakses')=='2'){
                    
                    
                    $data['data'] = $this->m_laporan->print_semua_pelanggan();
                    $this->load->view('print_laporan/cetak_pelanggan', $data);
                }
                else{
                    if ($this->session->userdata('hakakses')=='3'){
                        echo "Kamu gak ada Akses";
                    }
                    else{
                       echo "Kamu gak ada Akses";
                      
                    }
                    
                    }
    
            }
       
    } 
       
    public function cetak_mitra()
    {
        if ($this->session->userdata('hakakses')=='0'){
            $id_mitra=$this->input->post('id_mitra');
        
        $data['data'] = $this->m_laporan->print_mitra($id_mitra);
        $this->load->view('print_laporan/cetak_mitra', $data);
        }
        else{
            if ($this->session->userdata('hakakses')=='2'){
                $id_mitra=$this->input->post('id_mitra');
                
                $data['data'] = $this->m_laporan->print_mitra($id_mitra);
                $this->load->view('print_laporan/cetak_mitra', $data);
            }
            else{
                if ($this->session->userdata('hakakses')=='3'){
                    echo "Kamu gak ada Akses";
                }
                else{
                   echo "Kamu gak ada Akses";
                  
                }
                
                }

        }
   
} 

public function cetak_utang_mitra()
    {
        if ($this->session->userdata('hakakses')=='0'){
            $id_utang_mitra=$this->input->post('id_utang_mitra');
        
        $data['data'] = $this->m_laporan->print_utang_mitra($id_utang_mitra);
        $this->load->view('print_laporan/cetak_utang_mitra', $data);
        }
        else{
            if ($this->session->userdata('hakakses')=='2'){
                $id_utang_mitra=$this->input->post('id_utang_mitra');
        
        $data['data'] = $this->m_laporan->print_utang_mitra($id_utang_mitra);
        $this->load->view('print_laporan/cetak_utang_mitra', $data);
            }
            else{
                if ($this->session->userdata('hakakses')=='3'){
                    echo "Kamu gak ada Akses";
                }
                else{
                   echo "Kamu gak ada Akses";
                  
                }
                
                }

        }
   
} 

public function cetak_semua_mitra()
    {
        if ($this->session->userdata('hakakses')=='0'){
            
        
        $data['data'] = $this->m_laporan->print_semua_mitra();
        $this->load->view('print_laporan/cetak_mitra', $data);
        }
        else{
            if ($this->session->userdata('hakakses')=='2'){
                
                
                $data['data'] = $this->m_laporan->print_semua_mitra();
                $this->load->view('print_laporan/cetak_mitra', $data);
            }
            else{
                if ($this->session->userdata('hakakses')=='3'){
                    echo "Kamu gak ada Akses";
                }
                else{
                   echo "Kamu gak ada Akses";
                  
                }
                
                }

        }
   
} 

public function cetak_semua_utang_mitra()
    {
        if ($this->session->userdata('hakakses')=='0'){
            
        
        $data['data'] = $this->m_laporan->print_semua_utang_mitra();
        $this->load->view('print_laporan/cetak_utang_mitra', $data);
        }
        else{
            if ($this->session->userdata('hakakses')=='2'){
                
                
                $data['data'] = $this->m_laporan->print_semua_utang_mitra();
                $this->load->view('print_laporan/cetak_utang_mitra', $data);
            }
            else{
                if ($this->session->userdata('hakakses')=='3'){
                    echo "Kamu gak ada Akses";
                }
                else{
                   echo "Kamu gak ada Akses";
                  
                }
                
                }

        }
   
} 

public function cetak_agen()
{
    if ($this->session->userdata('hakakses')=='0'){
        $id_agen=$this->input->post('id_agen');
    
    $data['data'] = $this->m_laporan->print_agen($id_agen);
    $this->load->view('print_laporan/cetak_agen', $data);
    }
    else{
        if ($this->session->userdata('hakakses')=='2'){
            $id_agen=$this->input->post('id_agen');
            
            $data['data'] = $this->m_laporan->print_agen($id_agen);
            $this->load->view('print_laporan/cetak_agen', $data);
        }
        else{
            if ($this->session->userdata('hakakses')=='3'){
                echo "Kamu gak ada Akses";
            }
            else{
               echo "Kamu gak ada Akses";
              
            }
            
            }

    }

} 

public function cetak_semua_agen()
{
    if ($this->session->userdata('hakakses')=='0'){
        
    
    $data['data'] = $this->m_laporan->print_semua_agen();
    $this->load->view('print_laporan/cetak_agen', $data);
    }
    else{
        if ($this->session->userdata('hakakses')=='2'){
            
            
            $data['data'] = $this->m_laporan->print_semua_agen();
            $this->load->view('print_laporan/cetak_agen', $data);
        }
        else{
            if ($this->session->userdata('hakakses')=='3'){
                echo "Kamu gak ada Akses";
            }
            else{
               echo "Kamu gak ada Akses";
              
            }
            
            }

    }

} 


    public function cetak_tagihan()
    {
        if ($this->session->userdata('hakakses')=='0'){
            $id_agen=$this->input->post('id_piutang_agen');
            $nama=$this->input->post('nama_user');
            $alamat=$this->input->post('alamat');
            $telepon=$this->input->post('telepon');
            $jatuh_tempo=$this->input->post('jatuh_tempo');
            $pembayaran=$this->input->post('bank');
        
            $data['pembayaran'] = $pembayaran;
            $data['nama_user_ditunjuk'] = $nama;
            $data['alamat_ditunjuk']=$alamat;
            $data['telepon_ditunjuk']=$telepon;
            $data['jatuh_tempo']=$jatuh_tempo;
          
            $data['data'] = $this->m_laporan->print_surat_tagihan_agen($id_agen);
            $this->load->view('print_laporan/cetak_tagihan_agen', $data);
        }
        else{
            if ($this->session->userdata('hakakses')=='1'){
                $id_agen=$this->input->post('id_piutang_agen');
                $data['data'] = $this->m_laporan->print_surat_tagihan_agen($id_agen);
                $this->load->view('print_laporan/cetak_tagihan_agen', $data);
            }
            else{
                if ($this->session->userdata('hakakses')=='2'){
                    $id_agen=$this->input->post('id_piutang_agen');
                    $data['data'] = $this->m_laporan->print_surat_tagihan_agen($id_agen);
                    $this->load->view('print_laporan/cetak_tagihan_agen', $data);
                }
                else{
                   echo "Kamu gak ada Akses";
                  
                }
                
                }

        }
   
} 
public function print_laporan_operasional(){

    if ($this->session->userdata('hakakses')=='0'){
        $tgl_awal=$this->input->post('tgl_awal');
        $tgl_akhir=$this->input->post('tgl_akhir');
        $data['data'] = $this->m_laporan->cetak_operasional($tgl_awal,$tgl_akhir);
        $this->load->view('print_laporan/cetak_operasional',$data);
    }
    else{
        if ($this->session->userdata('hakakses')=='2'){
            $tgl_awal=$this->input->post('tgl_awal');
            $tgl_akhir=$this->input->post('tgl_akhir');
            $data['data'] = $this->m_laporan->cetak_operasional($tgl_awal,$tgl_akhir);
            $this->load->view('print_laporan/cetak_operasional',$data);
        }
        else{
            if ($this->session->userdata('hakakses')=='3'){
                $tgl_awal=$this->input->post('tgl_awal');
                $tgl_akhir=$this->input->post('tgl_akhir');
                $data['data'] = $this->m_laporan->cetak_operasional($tgl_awal,$tgl_akhir);
                $this->load->view('print_laporan/cetak_operasional',$data);
            }
            else{
               echo "Kamu gak ada Akses";
              
            }
            
            }

    }
}
}