<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	

	public function input_order()
	{
		if ($this->session->userdata('hakakses')=='0'){
			$data['data']=$this->m_transaksi->ambil_pelanggan();
			$data['mitra']=$this->m_transaksi->ambil_mitra();
			$data['bank']=$this->m_transaksi->ambil_bank();
			$this->load->view('transaksi/v_order',$data);
        }
        else{
            if ($this->session->userdata('hakakses')=='2'){
				$data['data']=$this->m_transaksi->ambil_pelanggan();
				$data['mitra']=$this->m_transaksi->ambil_mitra();
			$data['bank']=$this->m_transaksi->ambil_bank();
					$this->load->view('transaksi/v_order',$data);
            }
            else{
                if ($this->session->userdata('hakakses')=='3'){
					$data['mitra']=$this->m_transaksi->ambil_mitra();
					$data['data']=$this->m_transaksi->ambil_pelanggan();
					$this->load->view('transaksi/v_order_agen',$data);
                }
                else{
                   echo "Kamu gak ada Akses";
                  
                }
                
                }

        }
	
	}
	public function biaya_operasional(){
		if ($this->session->userdata('hakakses')=='0'){
		
			$data['bank']=$this->m_transaksi->ambil_bank();
			$this->load->view('transaksi/v_biaya_operasional',$data);
        }
        else{
            if ($this->session->userdata('hakakses')=='2'){
				$data['bank']=$this->m_transaksi->ambil_bank();
            	$this->load->view('transaksi/v_biaya_operasional',$data);
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
	public function simpan_biaya_operasional(){
		if ($this->session->userdata('hakakses')=='0'){
			$deskripsi=$this->input->post('deskripsi');
			$nominal=$this->input->post('nominal');
			$gambar=$this->input->post('gambar');
			$metode=$this->input->post('metode');
			$keterangan=$this->input->post('keterangan');
			$this->m_transaksi->simpan_biaya_operasional($deskripsi, $nominal, $gambar,$metode,$keterangan);
			$this->session->set_flashdata('berhasil', 'Data Berhasil Di Input');
			redirect('transaksi/biaya_operasional');
        }
        else{
            if ($this->session->userdata('hakakses')=='2'){
            	$deskripsi=$this->input->post('deskripsi');
		$nominal=$this->input->post('nominal');
		$gambar=$this->input->post('gambar');
		$this->m_transaksi->simpan_biaya_operasional($deskripsi, $nominal, $gambar);
		$this->session->set_flashdata('berhasil', 'Data Berhasil Di Input');
        redirect('transaksi/biaya_operasional');
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
	public function kelola_order(){
		if ($this->session->userdata('hakakses')=='0'){
			$data['data']=$this->m_laporan->tampil_invoice();
			$this->load->view('transaksi/v_kelola_order',$data);
        }
        else{
            if ($this->session->userdata('hakakses')=='2'){
				$admin=$this->session->userdata('username');
                $data['data']=$this->m_laporan->tampil_invoice_user($admin);
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
	public function edit_input_order(){
		if ($this->session->userdata('hakakses')=='0'){
			$nama_pengirim=$this->input->post('nama_pengirim');
			$alamat_pengirim=$this->input->post('alamat_pengirim');
			$telp_pengirim=$this->input->post('telp_pengirim');
			$nama_penerima=$this->input->post('nama_penerima');
			$alamat_penerima=$this->input->post('alamat_penerima');
			$negara=$this->input->post('negara');
			$kode_pos=$this->input->post('kode_pos');
			$telp_penerima=$this->input->post('telp_penerima');
			$id_penerima=$this->input->post('id_penerima');
			$mitra_expedisi=$this->input->post('mitra_expedisi');
			$awb_no=$this->input->post('awb_no');
			$berat=$this->input->post('berat');
			$jenis_layanan=$this->input->post('jenis_layanan');
			$panjang=$this->input->post('panjang');
			$lebar=$this->input->post('lebar');
			$tinggi=$this->input->post('tinggi');
			$ongkirbefore=$this->input->post('ongkir');
			$ongkir=str_replace(".","",$ongkirbefore);
			$id_order=$this->input->post('id_order');
			$jumlah_kodi=$this->input->post('jumlah_kodi');
			$total=$panjang*$lebar*$tinggi/5000;
			
			$this->m_transaksi->simpan_edit($id_order, $nama_pengirim, $alamat_pengirim, $telp_pengirim, $nama_penerima, $alamat_penerima, $negara, $kode_pos, $telp_penerima, $id_penerima, $mitra_expedisi, $awb_no, $berat, $jenis_layanan, $panjang, $lebar, $tinggi, $total, $ongkir,$jumlah_kodi);
			$this->session->set_flashdata('berhasil', 'Data Berhasil Di Input');
       		 redirect('transaksi/kelola_order');
        }
        else{
            if ($this->session->userdata('hakakses')=='2'){
            	$nama_pengirim=$this->input->post('nama_pengirim');
			$alamat_pengirim=$this->input->post('alamat_pengirim');
			$telp_pengirim=$this->input->post('telp_pengirim');
			$nama_penerima=$this->input->post('nama_penerima');
			$alamat_penerima=$this->input->post('alamat_penerima');
			$negara=$this->input->post('negara');
			$kode_pos=$this->input->post('kode_pos');
			$telp_penerima=$this->input->post('telp_penerima');
			$id_penerima=$this->input->post('id_penerima');
			$mitra_expedisi=$this->input->post('mitra_expedisi');
			$awb_no=$this->input->post('awb_no');
			$berat=$this->input->post('berat');
			$jenis_layanan=$this->input->post('jenis_layanan');
			$panjang=$this->input->post('panjang');
			$lebar=$this->input->post('lebar');
			$tinggi=$this->input->post('tinggi');
			$ongkirbefore=$this->input->post('ongkir');
			$ongkir=str_replace(".","",$ongkirbefore);
			$id_order=$this->input->post('id_order');
			$jumlah_kodi=$this->input->post('jumlah_kodi');
			$total=$panjang*$lebar*$tinggi/5000;
			$this->m_transaksi->simpan_edit($id_order, $nama_pengirim, $alamat_pengirim, $telp_pengirim, $nama_penerima, $alamat_penerima, $negara, $kode_pos, $telp_penerima, $id_penerima, $mitra_expedisi, $awb_no, $berat, $jenis_layanan, $panjang, $lebar, $tinggi, $total, $ongkir,$jumlah_kodi);
			$this->session->set_flashdata('berhasil', 'Data Berhasil Di Input');
       		 redirect('transaksi/kelola_order');
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
	public function simpan_order(){
		if ($this->session->userdata('hakakses')=='0'){
			$metode=$this->input->post('metode');
			if (in_array('credit', $metode))
			{
				$nama_pengirim=$this->input->post('nama_pengirim');
				$alamat_pengirim=$this->input->post('alamat_pengirim');
				$telp_pengirim=$this->input->post('telp_pengirim');
				$nama_penerima=$this->input->post('nama_penerima');
				$alamat_penerima=$this->input->post('alamat_penerima');
				$negara=$this->input->post('negara');
				$kode_pos=$this->input->post('kode_pos');
				$telp_penerima=$this->input->post('telp_penerima');
				$id_penerima=$this->input->post('id_penerima');
				$mitra_expedisi=$this->input->post('mitra_expedisi');
				$awb_no=$this->input->post('awb_no');
				$berat=$this->input->post('berat');
				$jenis_layanan=$this->input->post('jenis_layanan');
				$panjang=$this->input->post('panjang');
				$lebar=$this->input->post('lebar');
				$tinggi=$this->input->post('tinggi');
				$total=$this->input->post('total');
				$ongkirbefore=$this->input->post('ongkir');
				$ongkir=str_replace(".","",$ongkirbefore);
				$nama_barang=$this->input->post('nama_barang');
				$hs_code=$this->input->post('hs_code');
				$satuan=$this->input->post('satuan');
				$quantity=$this->input->post('quantity');
				$total_nilai=$this->input->post('total_nilai');
				$utang_pelanggan=$this->input->post('utang_pelanggan');
				$jumlah_kodi=$this->input->post('jumlah_kodi');
				$admin='manager';
				$id_admin=$this->session->userdata('id_user');
				$this->m_transaksi->simpan_piutang($nama_barang,$hs_code,$quantity, $satuan, $total_nilai, $nama_pengirim, $alamat_pengirim, $telp_pengirim, $nama_penerima, $alamat_penerima, $negara, $kode_pos, $telp_penerima, $id_penerima, $mitra_expedisi, $awb_no, $berat, $jenis_layanan, $panjang, $lebar, $tinggi, $total, $ongkir, $metode,$utang_pelanggan,$jumlah_kodi,$admin,$id_admin);
			}
			
			else{
				$nama_pengirim=$this->input->post('nama_pengirim');
				$alamat_pengirim=$this->input->post('alamat_pengirim');
				$telp_pengirim=$this->input->post('telp_pengirim');
				$nama_penerima=$this->input->post('nama_penerima');
				$alamat_penerima=$this->input->post('alamat_penerima');
				$negara=$this->input->post('negara');
				$kode_pos=$this->input->post('kode_pos');
				$telp_penerima=$this->input->post('telp_penerima');
				$id_penerima=$this->input->post('id_penerima');
				$mitra_expedisi=$this->input->post('mitra_expedisi');
				$awb_no=$this->input->post('awb_no');
				$berat=$this->input->post('berat');
				$jenis_layanan=$this->input->post('jenis_layanan');
				$panjang=$this->input->post('panjang');
				$lebar=$this->input->post('lebar');
				$tinggi=$this->input->post('tinggi');
				$total=$this->input->post('total');
				$ongkirbefore=$this->input->post('ongkir');
				$ongkir=str_replace(".","",$ongkirbefore);
				$nama_barang=$this->input->post('nama_barang');
				$hs_code=$this->input->post('hs_code');
				$satuan=$this->input->post('satuan');
				$total_nilai=$this->input->post('total_nilai');
				$jumlah_kodi=$this->input->post('jumlah_kodi');
				$admin=$this->session->userdata('username');
				$admin='manager';
				$id_admin=$this->session->userdata('id_user');
				$quantity=$this->input->post('quantity');
				$this->m_transaksi->simpan($nama_barang,$hs_code,$quantity, $satuan, $total_nilai, $nama_pengirim, $alamat_pengirim, $telp_pengirim, $nama_penerima, $alamat_penerima, $negara, $kode_pos, $telp_penerima, $id_penerima, $mitra_expedisi, $awb_no, $berat, $jenis_layanan, $panjang, $lebar, $tinggi, $total, $ongkir, $metode,$jumlah_kodi,$admin,$id_admin);
				
			}
        }
        else{
            if ($this->session->userdata('hakakses')=='2'){
				$metode=$this->input->post('metode');
				if (in_array('credit', $metode))
				{
					$nama_pengirim=$this->input->post('nama_pengirim');
					$alamat_pengirim=$this->input->post('alamat_pengirim');
					$telp_pengirim=$this->input->post('telp_pengirim');
					$nama_penerima=$this->input->post('nama_penerima');
					$alamat_penerima=$this->input->post('alamat_penerima');
					$negara=$this->input->post('negara');
					$kode_pos=$this->input->post('kode_pos');
					$telp_penerima=$this->input->post('telp_penerima');
					$id_penerima=$this->input->post('id_penerima');
					$mitra_expedisi=$this->input->post('mitra_expedisi');
					$awb_no=$this->input->post('awb_no');
					$berat=$this->input->post('berat');
					$jenis_layanan=$this->input->post('jenis_layanan');
					$panjang=$this->input->post('panjang');
					$lebar=$this->input->post('lebar');
					$tinggi=$this->input->post('tinggi');
					$total=$this->input->post('total');
					$ongkirbefore=$this->input->post('ongkir');
					$ongkir=str_replace(".","",$ongkirbefore);
					$nama_barang=$this->input->post('nama_barang');
					$hs_code=$this->input->post('hs_code');
					$satuan=$this->input->post('satuan');
					$total_nilai=$this->input->post('total_nilai');
					$utang_pelanggan=$this->input->post('utang_pelanggan');
					$jumlah_kodi=$this->input->post('jumlah_kodi');
					$admin=$this->session->userdata('username');
					$quantity=$this->input->post('quantity');
					$id_admin=$this->session->userdata('id_user');
					$this->m_transaksi->simpan_piutang($nama_barang,$hs_code,$quantity, $satuan, $total_nilai, $nama_pengirim, $alamat_pengirim, $telp_pengirim, $nama_penerima, $alamat_penerima, $negara, $kode_pos, $telp_penerima, $id_penerima, $mitra_expedisi, $awb_no, $berat, $jenis_layanan, $panjang, $lebar, $tinggi, $total, $ongkir, $metode,$utang_pelanggan,$jumlah_kodi,$admin,$id_admin);
				}
				
				else{
					$nama_pengirim=$this->input->post('nama_pengirim');
					$alamat_pengirim=$this->input->post('alamat_pengirim');
					$telp_pengirim=$this->input->post('telp_pengirim');
					$nama_penerima=$this->input->post('nama_penerima');
					$alamat_penerima=$this->input->post('alamat_penerima');
					$negara=$this->input->post('negara');
					$kode_pos=$this->input->post('kode_pos');
					$telp_penerima=$this->input->post('telp_penerima');
					$id_penerima=$this->input->post('id_penerima');
					$mitra_expedisi=$this->input->post('mitra_expedisi');
					$awb_no=$this->input->post('awb_no');
					$berat=$this->input->post('berat');
					$jenis_layanan=$this->input->post('jenis_layanan');
					$panjang=$this->input->post('panjang');
					$lebar=$this->input->post('lebar');
					$tinggi=$this->input->post('tinggi');
					$total=$this->input->post('total');
					$ongkirbefore=$this->input->post('ongkir');
					$ongkir=str_replace(".","",$ongkirbefore);
					$nama_barang=$this->input->post('nama_barang');
					$hs_code=$this->input->post('hs_code');
					$satuan=$this->input->post('satuan');
					$total_nilai=$this->input->post('total_nilai');
					$jumlah_kodi=$this->input->post('jumlah_kodi');
					$admin=$this->session->userdata('username');
					$quantity=$this->input->post('quantity');
					$id_admin=$this->session->userdata('id_user');
					$this->m_transaksi->simpan($nama_barang,$hs_code,$quantity, $satuan, $total_nilai, $nama_pengirim, $alamat_pengirim, $telp_pengirim, $nama_penerima, $alamat_penerima, $negara, $kode_pos, $telp_penerima, $id_penerima, $mitra_expedisi, $awb_no, $berat, $jenis_layanan, $panjang, $lebar, $tinggi, $total, $ongkir, $metode,$jumlah_kodi,$admin,$id_admin);
					
				}
            }
            else{
                if ($this->session->userdata('hakakses')=='3'){
						$metode=$this->input->post('metode');
						$nama_pengirim=$this->input->post('nama_pengirim');
						$alamat_pengirim=$this->input->post('alamat_pengirim');
						$telp_pengirim=$this->input->post('telp_pengirim');
						$nama_penerima=$this->input->post('nama_penerima');
						$alamat_penerima=$this->input->post('alamat_penerima');
						$negara=$this->input->post('negara');
						$kode_pos=$this->input->post('kode_pos');
						$telp_penerima=$this->input->post('telp_penerima');
						$id_penerima=$this->input->post('id_penerima');
						$mitra_expedisi=$this->input->post('mitra_expedisi');
						$awb_no=$this->input->post('awb_no');
						$berat=$this->input->post('berat');
						$jenis_layanan=$this->input->post('jenis_layanan');
						$panjang=$this->input->post('panjang');
						$lebar=$this->input->post('lebar');
						$tinggi=$this->input->post('tinggi');
						$total=$this->input->post('total');
						$ongkirbefore=$this->input->post('ongkir');
						$ongkir=str_replace(".","",$ongkirbefore);
						$nama_barang=$this->input->post('nama_barang');
						$hs_code=$this->input->post('hs_code');
						$satuan=$this->input->post('satuan');
						$total_nilai=$this->input->post('total_nilai');
						$jumlah_kodi=$this->input->post('jumlah_kodi');
						$admin=$this->session->userdata('username');
						$id_admin=$this->session->userdata('id_user');
						$quantity=$this->input->post('quantity');
						$before_bayar_jaskipin=$this->input->post('bayar_jaskipin');
						$bayar_jaskipin=str_replace(".","",$before_bayar_jaskipin);
						$this->m_transaksi->simpan_agen($nama_barang,$hs_code,$quantity, $satuan, $total_nilai, $nama_pengirim, $alamat_pengirim, $telp_pengirim, $nama_penerima, $alamat_penerima, $negara, $kode_pos, $telp_penerima, $id_penerima, $mitra_expedisi, $awb_no, $berat, $jenis_layanan, $panjang, $lebar, $tinggi, $total, $ongkir, $bayar_jaskipin, $metode,$jumlah_kodi,$admin,$id_admin);
						
					
                }
                else{
                   echo "Kamu gak ada Akses";
                  
                }
                
                }

        }
		
		
	}
}
