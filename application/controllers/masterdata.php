<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Masterdata extends CI_Controller{

    public function data_pelanggan()
    {
        $data['data']=$this->m_masterdata->tampil_pelanggan();
        $this->load->view('masterdata/v_datapelanggan',$data);
    }
    public function data_mitra()
    {
        $data['data']=$this->m_masterdata->tampil_mitra();
        $this->load->view('masterdata/v_datamitra',$data);
    }
    public function data_agen()
    {
        $data['data']=$this->m_masterdata->tampil_agen();
        $this->load->view('masterdata/v_dataagen',$data);
    }
    public function agen_forwarder()
    {
        $data['data']=$this->m_masterdata->tampil_agen();
        $this->load->view('masterdata/v_agenforwarder',$data);
    }
    public function tambah_pelanggan(){
        $nama_pelanggan=$this->input->post('nama_pelanggan');
        $alamat_pelanggan=$this->input->post('alamat_pelanggan');
        $telp_pelanggan=$this->input->post('telp_pelanggan');
        $telp_pelanggan_alternatif=$this->input->post('telp_pelanggan_alternatif');
        $email=$this->input->post('email_pelanggan');
        $this->m_masterdata->tambah_pelanggan($nama_pelanggan, $alamat_pelanggan, $telp_pelanggan,$telp_pelanggan_alternatif,$email);
        $this->session->set_flashdata('berhasil', 'Data Berhasil Di Input');
        redirect('masterdata/data_pelanggan');
    
    }

    public function tambah_agen(){
        $nama_agen=$this->input->post('nama_agen');
        $alamat_agen=$this->input->post('alamat_agen');
        $telp_agen=$this->input->post('telp_agen');
        $telp_agen_alternatif=$this->input->post('telp_agen_alternatif');
        $email=$this->input->post('email_agen');
        $this->m_masterdata->tambah_agen($nama_agen, $alamat_agen, $telp_agen,$telp_agen_alternatif,$email);
        $this->session->set_flashdata('berhasil', 'Data Berhasil Di Input');
        redirect('masterdata/data_agen');
    
    }

    public function edit_pelanggan(){
        $id_pelanggan=$this->input->post('id_pelanggan');
        $nama_pelanggan=$this->input->post('nama_pelanggan');
        $alamat_pelanggan=$this->input->post('alamat_pelanggan');
        $telp_pelanggan=$this->input->post('telp_pelanggan');
        $telp_pelanggan_alternatif=$this->input->post('telp_pelanggan_alternatif');
        $email=$this->input->post('email_pelanggan');
        $this->m_masterdata->edit_pelanggan($id_pelanggan,$nama_pelanggan, $alamat_pelanggan, $telp_pelanggan,$telp_pelanggan_alternatif,$email);
        $this->session->set_flashdata('edit', 'Data Berhasil Di edit');
        redirect('masterdata/data_pelanggan');
    }
    public function edit_agen(){
        $id_agen=$this->input->post('id_agen');
        $nama_agen=$this->input->post('nama_agen');
        $alamat_agen=$this->input->post('alamat_agen');
        $telp_agen=$this->input->post('telp_agen');
        $telp_agen_alternatif=$this->input->post('telp_agen_alternatif');
        $email=$this->input->post('email_agen');
        $this->m_masterdata->edit_agen($id_agen,$nama_agen, $alamat_agen, $telp_agen,$telp_agen_alternatif,$email);
        $this->session->set_flashdata('edit', 'Data Berhasil Di edit');
        redirect('masterdata/data_agen');
    }

    public function hapus_pelanggan(){
        $id_pelanggan=$this->input->post('id_pelanggan');
        $this->m_masterdata->hapus_pelanggan($id_pelanggan);
        $this->session->set_flashdata('hapus', 'data berhasil di hapus');
        redirect('masterdata/data_pelanggan');
    }
    public function hapus_agen(){
        $id_agen=$this->input->post('id_agen');
        $this->m_masterdata->hapus_agen($id_agen);
        $this->session->set_flashdata('hapus', 'data berhasil di hapus');
        redirect('masterdata/data_agen');
    }
}