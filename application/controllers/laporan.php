<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Laporan extends CI_Controller{

    public function resi()
    {
       
        
        if ($this->session->userdata('hakakses')=='0'){
            $data['data']=$this->m_laporan->tampil_invoice();
            $this->load->view('laporan/v_resi',$data);
        }
        else{
            if ($this->session->userdata('hakakses')=='2'){
                $admin=$this->session->userdata('username');
                $data['data']=$this->m_laporan->tampil_invoice_user($admin);
                $this->load->view('laporan/v_resi',$data);
            }
            else{
                if ($this->session->userdata('hakakses')=='3'){
                    $admin=$this->session->userdata('username');
                    $data['data']=$this->m_laporan->tampil_invoice_user($admin);
                    $this->load->view('laporan/v_resi',$data);
                }
                else{
                   echo "Kamu gak ada Akses";
                  
                }
                
                }

        }
       

    }
    public function filter_tgl(){

        if ($this->session->userdata('hakakses')=='0'){
            $tgl_awal=$this->input->post('tgl_awal');
            $tgl_akhir=$this->input->post('tgl_akhir');
            $data['data']=$this->m_laporan->tampil_invoice_tgl($tgl_awal,$tgl_akhir);
            $this->load->view('laporan/v_resi',$data);
        }
        else{
            if ($this->session->userdata('hakakses')=='2'){
                $admin=$this->session->userdata('username');
                $tgl_awal=$this->input->post('tgl_awal');
                $tgl_akhir=$this->input->post('tgl_akhir');
                $data['data']=$this->m_laporan->tampil_invoice_tgl_user($tgl_awal,$tgl_akhir,$admin);
                $this->load->view('laporan/v_resi',$data);
            }
            else{
                if ($this->session->userdata('hakakses')=='3'){
                    $admin=$this->session->userdata('username');
                    $tgl_awal=$this->input->post('tgl_awal');
                    $tgl_akhir=$this->input->post('tgl_akhir');
                     $data['data']=$this->m_laporan->tampil_invoice_tgl_user($tgl_awal,$tgl_akhir,$admin);
                        $this->load->view('laporan/v_resi',$data);
                }
                else{
                   echo "Kamu gak ada Akses";
                  
                }
                
                }

        }

      
    }

    public function filter_id_order(){
        if ($this->session->userdata('hakakses')=='0'){
            $id_order=$this->input->post('id_order');
            $data['data']=$this->m_laporan->tampil_invoice_idorder($id_order);
            $this->load->view('laporan/v_resi',$data);
        }
        else{
            if ($this->session->userdata('hakakses')=='2'){
                $admin=$this->session->userdata('username');
                $id_order=$this->input->post('id_order');
                $data['data']=$this->m_laporan->tampil_invoice_idorder_user($id_order,$admin);
                $this->load->view('laporan/v_resi',$data);
            }
            else{
                if ($this->session->userdata('hakakses')=='3'){
                    $admin=$this->session->userdata('username');
                    $id_order=$this->input->post('id_order');
                    $data['data']=$this->m_laporan->tampil_invoice_idorder_user($id_order,$admin);
                    $this->load->view('laporan/v_resi',$data);
                }
                else{
                   echo "Kamu gak ada Akses";
                  
                }
                
                }

        }
     
    }

    public function nota()
    {
        if ($this->session->userdata('hakakses')=='0'){
            $data['data']=$this->m_laporan->tampil_invoice();
            $this->load->view('laporan/v_nota',$data);
        }
        else{
            if ($this->session->userdata('hakakses')=='2'){
                $admin=$this->session->userdata('username');
                $data['data']=$this->m_laporan->tampil_invoice_user($admin);
                $this->load->view('laporan/v_nota',$data);
            }
            else{
                if ($this->session->userdata('hakakses')=='3'){
                    $admin=$this->session->userdata('username');
                    $data['data']=$this->m_laporan->tampil_invoice_user($admin);
                    $this->load->view('laporan/v_nota',$data);
                }
                else{
                   echo "Kamu gak ada Akses";
                  
                }
                
                }

        }
     

    }

    public function filter_tgl_nota(){
        if ($this->session->userdata('hakakses')=='0'){
            $tgl_awal=$this->input->post('tgl_awal');
            $tgl_akhir=$this->input->post('tgl_akhir');
            $data['data']=$this->m_laporan->tampil_invoice_tgl($tgl_awal,$tgl_akhir);
            $this->load->view('laporan/v_nota',$data);
        }
        else{
            if ($this->session->userdata('hakakses')=='2'){
                $admin=$this->session->userdata('username');
                $tgl_awal=$this->input->post('tgl_awal');
                $tgl_akhir=$this->input->post('tgl_akhir');
                $data['data']=$this->m_laporan->tampil_invoice_tgl_user($tgl_awal,$tgl_akhir,$admin);
                $this->load->view('laporan/v_nota',$data);
            }
            else{
                if ($this->session->userdata('hakakses')=='3'){
                    $admin=$this->session->userdata('username');
                    $tgl_awal=$this->input->post('tgl_awal');
                    $tgl_akhir=$this->input->post('tgl_akhir');
                    $data['data']=$this->m_laporan->tampil_invoice_tgl_user($tgl_awal,$tgl_akhir,$admin);
                    $this->load->view('laporan/v_nota',$data);
                }
                else{
                   echo "Kamu gak ada Akses";
                  
                }
                
                }

        }
        

    }

    public function filter_id_order_nota(){
        if ($this->session->userdata('hakakses')=='0'){
            $id_order=$this->input->post('id_order');
            $data['data']=$this->m_laporan->tampil_invoice_idorder($id_order);
            $this->load->view('laporan/v_nota',$data);
        }
        else{
            if ($this->session->userdata('hakakses')=='2'){
                $admin=$this->session->userdata('username');
                $id_order=$this->input->post('id_order');
                $data['data']=$this->m_laporan->tampil_invoice_idorder_user($id_order,$admin);
                $this->load->view('laporan/v_nota',$data);
            }
            else{
                if ($this->session->userdata('hakakses')=='3'){
                    $admin=$this->session->userdata('username');
                    $id_order=$this->input->post('id_order');
                    $data['data']=$this->m_laporan->tampil_invoice_idorder_user($id_order,$admin);
                    $this->load->view('laporan/v_nota',$data);
                }
                else{
                   echo "Kamu gak ada Akses";
                  
                }
                
                }

        }
     
    }

    public function label_pengiriman()
    {
        if ($this->session->userdata('hakakses')=='0'){
            $data['data']=$this->m_laporan->tampil_invoice();
        $this->load->view('laporan/v_label_pengiriman',$data);
        }
        else{
            if ($this->session->userdata('hakakses')=='2'){
                $admin=$this->session->userdata('username');
                $data['data']=$this->m_laporan->tampil_invoice_user($admin);
                $this->load->view('laporan/v_label_pengiriman',$data);
            }
            else{
                if ($this->session->userdata('hakakses')=='3'){
                    $admin=$this->session->userdata('username');
                    $data['data']=$this->m_laporan->tampil_invoice_user($admin);
                    $this->load->view('laporan/v_label_pengiriman',$data);
                }
                else{
                   echo "Kamu gak ada Akses";
                  
                }
                
                }

        }
       

    }
    public function filter_tgl_label_pengiriman(){
        if ($this->session->userdata('hakakses')=='0'){
            $tgl_awal=$this->input->post('tgl_awal');
            $tgl_akhir=$this->input->post('tgl_akhir');
        $data['data']=$this->m_laporan->tampil_invoice_tgl($tgl_awal,$tgl_akhir);
        $this->load->view('laporan/v_label_pengiriman',$data);
        }
        else{
            if ($this->session->userdata('hakakses')=='2'){
                $bulan=$this->input->post('bulan');
                $tahun=$this->input->post('tahun');
                $data['data']=$this->m_laporan->tampil_invoice_tgl($tgl_awal,$tgl_akhir);
                $this->load->view('laporan/v_label_pengiriman',$data);
            }
            else{
                if ($this->session->userdata('hakakses')=='3'){
                    $bulan=$this->input->post('bulan');
                    $tahun=$this->input->post('tahun');
                    $data['data']=$this->m_laporan->tampil_invoice_tgl($tgl_awal,$tgl_akhir);
                    $this->load->view('laporan/v_label_pengiriman',$data);
                }
                else{
                   echo "Kamu gak ada Akses";
                  
                }
                
                }

        }
       
    }

    public function filter_id_order_label_pengiriman(){
        if ($this->session->userdata('hakakses')=='0'){
            $id_order=$this->input->post('id_order');
            $data['data']=$this->m_laporan->tampil_invoice_idorder($id_order);
            $this->load->view('laporan/v_label_pengiriman',$data);
        }
        else{
            if ($this->session->userdata('hakakses')=='2'){
                $id_order=$this->input->post('id_order');
                $data['data']=$this->m_laporan->tampil_invoice_idorder($id_order);
                $this->load->view('laporan/v_label_pengiriman',$data);
            }
            else{
                if ($this->session->userdata('hakakses')=='3'){
                    $id_order=$this->input->post('id_order');
                    $data['data']=$this->m_laporan->tampil_invoice_idorder($id_order);
                    $this->load->view('laporan/v_label_pengiriman',$data);
                }
                else{
                   echo "Kamu gak ada Akses";
                  
                }
                
                }

        }
   
    }

    public function proforma_invoice()
    {
        if ($this->session->userdata('hakakses')=='0'){
            $data['data']=$this->m_laporan->tampil_invoice();
            $this->load->view('laporan/v_proforma_invoice',$data);
        }
        else{
            if ($this->session->userdata('hakakses')=='2'){
                $admin=$this->session->userdata('username');
                $data['data']=$this->m_laporan->tampil_invoice_user($admin);
                $this->load->view('laporan/v_proforma_invoice',$data);
            }
            else{
                if ($this->session->userdata('hakakses')=='3'){
                    $admin=$this->session->userdata('username');
                    $data['data']=$this->m_laporan->tampil_invoice_user($admin);
                    $this->load->view('laporan/v_proforma_invoice',$data);
                }
                else{
                   echo "Kamu gak ada Akses";
                  
                }
                
                }

        }


    }
    public function filter_tgl_proforma_invoice(){
        if ($this->session->userdata('hakakses')=='0'){
            $tgl_awal=$this->input->post('tgl_awal');
            $tgl_akhir=$this->input->post('tgl_akhir');
            $data['data']=$this->m_laporan->tampil_invoice_tgl($tgl_awal,$tgl_akhir);
            $this->load->view('laporan/v_proforma_invoice',$data);
        }
        else{
            if ($this->session->userdata('hakakses')=='2'){
                $tgl_awal=$this->input->post('tgl_awal');
                $tgl_akhir=$this->input->post('tgl_akhir');
        $tahun=$this->input->post('tahun');
        $data['data']=$this->m_laporan->tampil_invoice_tgl_user($tgl_awal,$tgl_akhir,$admin);
        
        $this->load->view('laporan/v_proforma_invoice',$data);
            }
            else{
                if ($this->session->userdata('hakakses')=='3'){
                    $admin=$this->session->userdata('username');
                    $tgl_awal=$this->input->post('tgl_awal');
                    $tgl_akhir=$this->input->post('tgl_akhir');
                    $data['data']=$this->m_laporan->tampil_invoice_tgl_user($tgl_awal,$tgl_akhir,$admin);
                    $this->load->view('laporan/v_proforma_invoice',$data);
                }
                else{
                   echo "Kamu gak ada Akses";
                  
                }
                
                }

        }
    
    }

    public function filter_id_order_proforma_invoice(){
        if ($this->session->userdata('hakakses')=='0'){
            $id_order=$this->input->post('id_order');
            $data['data']=$this->m_laporan->tampil_invoice_idorder($id_order);
            $this->load->view('laporan/v_proforma_invoice',$data);
        }
        else{
            if ($this->session->userdata('hakakses')=='2'){
                $admin=$this->session->userdata('username');
                $id_order=$this->input->post('id_order');
                $data['data']=$this->m_laporan->tampil_invoice_idorder_user($id_order,$admin);
                $this->load->view('laporan/v_proforma_invoice',$data);
            }
            else{
                if ($this->session->userdata('hakakses')=='3'){
                    $admin=$this->session->userdata('username');
                    $id_order=$this->input->post('id_order');
                    $data['data']=$this->m_laporan->tampil_invoice_idorder_user($id_order,$admin);
                    $this->load->view('laporan/v_proforma_invoice',$data);
                }
                else{
                   echo "Kamu gak ada Akses";
                  
                }
                
                }

        }
   
    }
    public function surat_jalan()
    {
        if ($this->session->userdata('hakakses')=='0'){
            $data['data']=$this->m_laporan->tampil_invoice();
            $data['mitra']=$this->m_transaksi->ambil_mitra_semua();
        $this->load->view('laporan/v_surat_jalan',$data);
        }
        else{
            if ($this->session->userdata('hakakses')=='2'){
                $data['data']=$this->m_laporan->tampil_invoice();
                $data['mitra']=$this->m_transaksi->ambil_mitra_semua();
                $this->load->view('laporan/v_surat_jalan',$data);
            }
            else{
                if ($this->session->userdata('hakakses')=='3'){
                    $admin=$this->session->userdata('username');
                    $data['data']=$this->m_laporan->tampil_invoice_user($admin);
                    $data['mitra']=$this->m_transaksi->ambil_mitra_semua();
                $this->load->view('laporan/v_surat_jalan',$data);
                }
                else{
                   echo "Kamu gak ada Akses";
                  
                }
                
                }

        }
       

    }
    public function filter_tgl_surat_jalan(){
        if ($this->session->userdata('hakakses')=='0'){
            $tgl_awal=$this->input->post('tgl_awal');
            $tgl_akhir=$this->input->post('tgl_akhir');
            $mitra=$this->input->post('mitra_expedisi');
            $data['mitra']=$this->m_transaksi->ambil_mitra_semua();
            $data['data']=$this->m_laporan->tampil_invoice_tgl_mitra($tgl_awal,$tgl_akhir,$mitra);
            $this->load->view('laporan/v_surat_jalan',$data);
        }
        else{
            if ($this->session->userdata('hakakses')=='2'){
                $tgl_awal=$this->input->post('tgl_awal');
                $tgl_akhir=$this->input->post('tgl_akhir');
                $mitra=$this->input->post('mitra_expedisi');
                $data['mitra']=$this->m_transaksi->ambil_mitra_semua();
                $data['data']=$this->m_laporan->tampil_invoice_tgl_mitra($tgl_awal,$tgl_akhir,$mitra);
                $this->load->view('laporan/v_surat_jalan',$data);
            }
            else{
                if ($this->session->userdata('hakakses')=='3'){
                    $admin=$this->session->userdata('username');
                    $tgl_awal=$this->input->post('tgl_awal');
                    $tgl_akhir=$this->input->post('tgl_akhir');
                    $mitra=$this->input->post('mitra_expedisi');
                    $data['mitra']=$this->m_transaksi->ambil_mitra_semua();
                    $data['data']=$this->m_laporan->tampil_invoice_tgl_mitra_agen($tgl_awal,$tgl_akhir,$mitra,$admin);
                    $this->load->view('laporan/v_surat_jalan',$data);
                }
                else{
                   echo "Kamu gak ada Akses";
                  
                }
                
                }

        }
      
    }

    public function filter_id_order_surat_jalan(){
        if ($this->session->userdata('hakakses')=='0'){
            $id_order=$this->input->post('id_order');
            $data['data']=$this->m_laporan->tampil_invoice_idorder($id_order);
            $this->load->view('laporan/v_surat_jalan',$data);
        }
        else{
            if ($this->session->userdata('hakakses')=='2'){
                $id_order=$this->input->post('id_order');
        $data['data']=$this->m_laporan->tampil_invoice_idorder($id_order);
        $this->load->view('laporan/v_surat_jalan',$data);
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
   
    public function cetak_surat_jalan(){
        if ($this->session->userdata('hakakses')=='0'){
            $id_order=$this->input->post('id_order');
            $this->m_laporan->update_invoice($id_order);
            $data['data']=$this->m_laporan->print_surat_jalan($id_order);
            $this->load->view('print_laporan/cetak_surat_jalan',$data);
        }
        else{
            if ($this->session->userdata('hakakses')=='2'){
                $id_order=$this->input->post('id_order');
                $this->m_laporan->update_invoice($id_order);
                $data['data']=$this->m_laporan->print_surat_jalan($id_order);
                $this->load->view('print_laporan/cetak_surat_jalan',$data);
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
    public function laporan_biaya_operasional()
    {
        if ($this->session->userdata('hakakses')=='0'){
            $data['data']=$this->m_laporan->tampil_operasional();
            $data['bank']=$this->m_transaksi->ambil_bank();
            $this->load->view('laporan/v_laporan_biaya_operasional',$data);
        }
        else{
            if ($this->session->userdata('hakakses')=='2'){
                $data['data']=$this->m_laporan->tampil_operasional();
                $data['bank']=$this->m_transaksi->ambil_bank();
                $this->load->view('laporan/v_laporan_biaya_operasional',$data);
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

    public function cetak_laporan_operasional()
    {
        if ($this->session->userdata('hakakses')=='0'){
            $this->load->view('laporan/v_cetak_laporan_operasional');
        }
        else{
            if ($this->session->userdata('hakakses')=='2'){
     
                $this->load->view('laporan/v_laporan_biaya_operasional');
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

    public function filter_tgl_laporan_biaya_operasional(){
        if ($this->session->userdata('hakakses')=='0'){
            $tgl_awal=$this->input->post('tgl_awal');
            $tgl_akhir=$this->input->post('tgl_akhir');
            $data['data']=$this->m_laporan->tampil_operasional_tgl($tgl_awal,$tgl_akhir);
            $this->load->view('laporan/v_laporan_biaya_operasional',$data);
        }
        else{
            if ($this->session->userdata('hakakses')=='2'){
                $tgl_awal=$this->input->post('tgl_awal');
            $tgl_akhir=$this->input->post('tgl_akhir');
                $data['data']=$this->m_laporan->tampil_operasional_tgl($tgl_awal,$tgl_akhir);
                $this->load->view('laporan/v_laporan_biaya_operasional',$data);
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
    public function filter_tgl_kelola_order(){
        if ($this->session->userdata('hakakses')=='0'){
            $tgl_awal=$this->input->post('tgl_awal');
            $tgl_akhir=$this->input->post('tgl_akhir');
            $data['data']=$this->m_laporan->tampil_kelola_order_tgl_manager($tgl_awal,$tgl_akhir);
            $this->load->view('transaksi/v_kelola_order',$data);
        }
        else{
            if ($this->session->userdata('hakakses')=='2'){
                $tgl_awal=$this->input->post('tgl_awal');
            $tgl_akhir=$this->input->post('tgl_akhir');
                $admin="manager";
                $data['data']=$this->m_laporan->tampil_kelola_order_tgl($tgl_awal,$tgl_akhir,$admin);
                $this->load->view('transaksi/v_kelola_order',$data);
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
    public function edit_biaya_operasional(){
        if ($this->session->userdata('hakakses')=='0'){
            $deskripsi=$this->input->post('deskripsi');
            $id_operasional=$this->input->post('id_operasional');
            $gambar=$this->input->post('gambar');
            $nominal=$this->input->post('nominal');
            $metode=$this->input->post('metode');
			$keterangan=$this->input->post('keterangan');
            $this->m_laporan->edit_biaya_operasional($id_operasional,$deskripsi,$nominal,$gambar,$metode,$keterangan);
            $this->session->set_flashdata('berhasil', 'Data Berhasil Di Edit');
            redirect('laporan/laporan_biaya_operasional');
        }
        else{
            if ($this->session->userdata('hakakses')=='2'){
                $deskripsi=$this->input->post('deskripsi');
                $id_operasional=$this->input->post('id_operasional');
                $gambar=$this->input->post('gambar');
                $nominal=$this->input->post('nominal');
                $metode=$this->input->post('metode');
			$keterangan=$this->input->post('keterangan');
            $this->m_laporan->edit_biaya_operasional($id_operasional,$deskripsi,$nominal,$gambar,$metode,$keterangan);
                $this->session->set_flashdata('berhasil', 'Data Berhasil Di Edit');
                redirect('laporan/laporan_biaya_operasional');
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
    
    public function hapus_biaya_operasional(){
        if ($this->session->userdata('hakakses')=='0'){
            $id_operasional=$this->input->post('id_operasional');
            $this->m_laporan->hapus_biaya_operasional($id_operasional);
            $this->session->set_flashdata('hapus', 'Data Berhasil Di hapus');
            redirect('laporan/laporan_biaya_operasional');
        }
        else{
            if ($this->session->userdata('hakakses')=='2'){
                $id_operasional=$this->input->post('id_operasional');
                $this->m_laporan->hapus_biaya_operasional($id_operasional);
                $this->session->set_flashdata('hapus', 'Data Berhasil Di hapus');
                redirect('laporan/laporan_biaya_operasional');
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
}