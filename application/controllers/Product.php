<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Product extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->library('upload');
    } 


   public function list_product(){
       $data['get_product']=$this->m_product->get_all_product();
       $this->load->view('product/v_list_product',$data);
   }
   public function display_product(){
       $id_product=$this->input->post('id_product');
       $this->m_product->display_product($id_product);
       $this->session->set_flashdata('display', 'asd');
       $data['get_product']=$this->m_product->get_all_product();
       $this->load->view('product/v_list_product',$data);
   }
   public function notdisplay_product(){
    $id_product=$this->input->post('id_product');
    $this->m_product->notdisplay_product($id_product);
    $this->session->set_flashdata('not_display', 'sdf');
    $data['get_product']=$this->m_product->get_all_product();
    $this->load->view('product/v_list_product',$data);
   }
   public function edit_product(){
    $config['upload_path'] = './assets/images/product/';
    $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; 
    $config['encrypt_name'] = TRUE; 
    $this->upload->initialize($config);
    $id_product=$this->input->post('id_product');
    $product_name=$this->input->post('product_name');
    $description=$this->input->post('description');
    $stock=$this->input->post('stock');
    $price=$this->input->post('price');
    if(!empty($_FILES['picture']['name'])){
 
        if ($this->upload->do_upload('picture')){
            $gbr = $this->upload->data();
            //Compress Image
            $config['image_library']='gd2';
            $config['source_image']='./assets/images/product/'.$gbr['file_name'];
            $config['create_thumb']= FALSE;
            $config['maintain_ratio']= FALSE;
            $config['quality']= '50%';
            $config['width']= 600;
            $config['height']= 400;
            $config['new_image']= './assets/images/product/'.$gbr['file_name'];
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();

            $picture=$gbr['file_name'];
            $this->m_product->edit_product_with_image($id_product,$product_name,$description,$stock,$price,$picture);
            $this->session->set_flashdata('edit', 'sdf');
            $data['get_product']=$this->m_product->get_all_product();
            $this->load->view('product/v_list_product',$data);
        }
       
    }else{
        $this->m_product->edit_product($id_product,$product_name,$description,$stock,$price);
        $this->session->set_flashdata('edit', 'sdf');
        $data['get_product']=$this->m_product->get_all_product();
        $this->load->view('product/v_list_product',$data);
    }

   }
   public function add_new_product(){
       $this->load->view('product/v_add_new_product');
   }
   public function save_product(){
    $config['upload_path'] = './assets/images/product/';
    $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; 
    $config['encrypt_name'] = TRUE; 
    $this->upload->initialize($config);

       $product_name=$this->input->post('product_name');
       $description=$this->input->post('description');
       $stock=$this->input->post('stock');
       $price=$this->input->post('price');
if(!empty($_FILES['picture']['name'])){
 
        if ($this->upload->do_upload('picture')){
            $gbr = $this->upload->data();
            //Compress Image
            $config['image_library']='gd2';
            $config['source_image']='./assets/images/product/'.$gbr['file_name'];
            $config['create_thumb']= FALSE;
            $config['maintain_ratio']= FALSE;
            $config['quality']= '50%';
            $config['width']= 600;
            $config['height']= 400;
            $config['new_image']= './assets/images/product/'.$gbr['file_name'];
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();

            $picture=$gbr['file_name'];
            $this->m_product->save_product($product_name,$description,$stock,$price,$picture);
            $this->session->set_flashdata('berhasil', 'sdf');
            $this->load->view('product/v_add_new_product');
        }
       
    }

   }
}

