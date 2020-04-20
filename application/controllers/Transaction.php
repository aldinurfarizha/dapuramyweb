<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Transaction extends CI_Controller{
  


   public function cash(){
       $data['order']=$this->m_transaction->cash();
       $this->load->view('transaction/v_cash',$data);
   }
   public function cash_on_delivery(){
    $data['order']=$this->m_transaction->cod();
    $this->load->view('transaction/v_cod',$data);
}
public function transfer(){
    $data['order']=$this->m_transaction->transfer();
    $this->load->view('transaction/v_transfer',$data);
}

public function change_status_cash(){
    $id_order=$this->input->post('id_order');
    $metode=$this->input->post('metode');
    $this->m_transaction->change_status($id_order,$metode);
    $this->session->set_flashdata('display', 'asd');
    $data['order']=$this->m_transaction->cash();
    $this->load->view('transaction/v_cash',$data);
}
 
public function change_status_cod(){
    $id_order=$this->input->post('id_order');
    $metode=$this->input->post('metode');
    $this->m_transaction->change_status($id_order,$metode);
    $this->session->set_flashdata('display', 'asd');
    $data['order']=$this->m_transaction->cod();
    $this->load->view('transaction/v_cod',$data);
}

public function change_status_transfer(){
    $id_order=$this->input->post('id_order');
    $metode=$this->input->post('metode');
    $this->m_transaction->change_status($id_order,$metode);
    $this->session->set_flashdata('display', 'asd');
    $data['order']=$this->m_transaction->transfer();
    $this->load->view('transaction/v_transfer',$data);

}

}