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
public function send(){
    $url = "https://fcm.googleapis.com/fcm/send";
    $token = "cGqjWN4oS4Cb76t2LLrT65:APA91bFjrEUwmrwIATItBxSb3cVdpgJtXVu8R9C6Fx0X98Nzg_OgJgJHsVBQBBY04lV_8Le_aLUwdABxjZeaiBApYvjr6dGE2XGxSmDwim1eqqX8UUtC5snNJA1I3DxvPrmEDNxFLyBA";
    $serverKey = 'AAAA8Ax1P4Q:APA91bH4xS7weR5gzU0RMNkOb692vvFZOgfucp7HI-EMR0OY2fUe7hA4ItKfiBsVbRdrzYgz6AAeD9CMLqhZUljz0wLapwEnI7GdDCUBUG9MEF5TJr9KgYnOCFJJH5gCwuNaoEMaOB46';
    $title = "Notification title";
    $body = "Hello I am from CI";
    $notification = array('title' =>$title , 'body' => $body, 'sound' => 'default', 'badge' => '1');
    $arrayToSend = array('to' => $token, 'notification' => $notification,'priority'=>'high');
    $json = json_encode($arrayToSend);
    $headers = array();
    $headers[] = 'Content-Type: application/json';
    $headers[] = 'Authorization: key='. $serverKey;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST,"POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
    curl_setopt($ch, CURLOPT_HTTPHEADER,$headers);
    //Send the request
    $response = curl_exec($ch);
    //Close request
    if ($response === FALSE) {
    die('FCM Send Error: ' . curl_error($ch));
    }
    curl_close($ch);
}

}