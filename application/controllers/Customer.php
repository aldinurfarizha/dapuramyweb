<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Customer extends CI_Controller{



   public function customer_data(){
    $data['customer']=$this->m_customer->get_all_customer();
   $this->load->view('customer/v_customer_data', $data);
}
public function verified_customer(){
    $id_customer=$this->input->post('id_customer');
    $body="Congratulation Your Account is Verified! You can order some product";
    $token=$this->input->post('token');
    $url = "https://fcm.googleapis.com/fcm/send";
    $serverKey = 'AAAA8Ax1P4Q:APA91bH4xS7weR5gzU0RMNkOb692vvFZOgfucp7HI-EMR0OY2fUe7hA4ItKfiBsVbRdrzYgz6AAeD9CMLqhZUljz0wLapwEnI7GdDCUBUG9MEF5TJr9KgYnOCFJJH5gCwuNaoEMaOB46';
    $title = "Account Verified";
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
    $this->m_customer->verified($id_customer);
    $this->session->set_flashdata('display', 'asd');
    $data['customer']=$this->m_customer->get_all_customer();
    redirect('customer/customer_data');
}


public function delete(){
    $id_customer=$this->input->post('id_customer');
    $this->m_customer->delete($id_customer);
    $this->session->set_flashdata('delete', 'asd');
    $data['customer']=$this->m_customer->get_all_customer();
    $this->load->view('customer/v_customer_data', $data);
}

}

