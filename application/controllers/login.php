<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller  {

    public function index()
    {
        if($this->session->userdata('hakakses')=='0'){
            redirect('dashboard');
        }
        else{
            if($this->session->userdata('hakakses')=='1'){
                redirect('dashboard');
                
            }
            else{
                if($this->session->userdata('hakakses')=='2'){
                    redirect('dashboard');
            }
            else{
                if($this->session->userdata('hakakses')=='3'){
                    redirect('dashboard');
                }
                    else{
                        $this->load->view('v_login');
                    }
            }
        }
    }
}
       
      
    
    public function prosess(){
        $post = $this->input->post(null,TRUE);
        if(isset($post['login'])){
            $this->load->model('m_login');
            $query=$this->m_login->login($post);
            if($query->num_rows() > 0){
                $row=$query->row();
                $params=array(
                    'username'=>$row->username,
                    'hakakses'=>$row->hakakses,
                    'id_user'=>$row->id_user,
                    'nama_user'=>$row->nama_user,
                    'kota'=>$row->kota,
                    'telepon'=>$row->telepon,
                    'alamat'=>$row->alamat
                );
                $this->session->set_userdata($params);
                echo"<script>
                     alert('Selamat, Login Berhasil');
                     window.location='".site_url('dashboard')."';
                     </script>";
            }
            else{
             echo"<script>
             alert('Maaf, Login Gagal');
             window.location='".site_url('login')."';
             </script>";
            }
        }

    }
    public function logout(){
        $this->session->sess_destroy();
        $url=base_url('login');
        redirect($url);
    }
   
}

