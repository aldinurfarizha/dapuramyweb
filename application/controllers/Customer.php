<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Customer extends CI_Controller{



   public function customer_data(){
    $data['customer']=$this->m_customer->get_all_customer();
   $this->load->view('customer/v_customer_data', $data);
}
public function verified_customer(){
    $id_customer=$this->input->post('id_customer');
    $this->m_customer->verified($id_customer);
    $this->session->set_flashdata('display', 'asd');
    $data['customer']=$this->m_customer->get_all_customer();
    $this->load->view('customer/v_customer_data', $data);
}


public function delete(){
    $id_customer=$this->input->post('id_customer');
    $this->m_customer->delete($id_customer);
    $this->session->set_flashdata('delete', 'asd');
    $data['customer']=$this->m_customer->get_all_customer();
    $this->load->view('customer/v_customer_data', $data);
}

}

