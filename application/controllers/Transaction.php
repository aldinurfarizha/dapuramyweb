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
    $id_customer=$this->input->post('id_customer');
    $metode=$this->input->post('metode');
    $token=$this->input->post('token');
    switch ($metode){
        case 1:
            $body="(Order No.".$id_order.") ORDER IN PROSESS";
        break;
        case 2:
            $body="(Order No.".$id_order.") ORDER IN DELIVERY";
        break;
    }
    $url = "https://fcm.googleapis.com/fcm/send";
    $serverKey = 'AAAA8Ax1P4Q:APA91bH4xS7weR5gzU0RMNkOb692vvFZOgfucp7HI-EMR0OY2fUe7hA4ItKfiBsVbRdrzYgz6AAeD9CMLqhZUljz0wLapwEnI7GdDCUBUG9MEF5TJr9KgYnOCFJJH5gCwuNaoEMaOB46';
    $title = "Your Order Have Progress";
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
    $this->m_transaction->change_status($id_order,$metode);
    $this->m_transaction->update_notif($id_order,$metode,$id_customer);
    $this->session->set_flashdata('display', 'asd');
    $data['order']=$this->m_transaction->cash();
    redirect('transaction/cash');
}
 
public function change_status_cod(){
    $id_order=$this->input->post('id_order');
    $id_customer=$this->input->post('id_customer');
    $metode=$this->input->post('metode');
    $token=$this->input->post('token');
    switch ($metode){
        case 1:
            $body="(Order No.".$id_order.") ORDER IN PROSESS";
        break;
        case 3:
            $body="(Order No.".$id_order.") ORDER IS READY";
        break;
    }
    $url = "https://fcm.googleapis.com/fcm/send";
    $serverKey = 'AAAA8Ax1P4Q:APA91bH4xS7weR5gzU0RMNkOb692vvFZOgfucp7HI-EMR0OY2fUe7hA4ItKfiBsVbRdrzYgz6AAeD9CMLqhZUljz0wLapwEnI7GdDCUBUG9MEF5TJr9KgYnOCFJJH5gCwuNaoEMaOB46';
    $title = "Your Order Have Progress";
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
    $this->m_transaction->change_status($id_order,$metode);
    $this->m_transaction->update_notif($id_order,$metode,$id_customer);
    $this->session->set_flashdata('display', 'asd');
    $data['order']=$this->m_transaction->cod();
    redirect('transaction/cash_on_delivery');
}

public function change_status_transfer(){
    $id_order=$this->input->post('id_order');
    $id_customer=$this->input->post('id_customer');
    $metode=$this->input->post('metode');
    $token=$this->input->post('token');
    switch ($metode){
        case 1:
            $body="(Order No.".$id_order.") ORDER IN PROSESS";
        break;
        case 2:
            $body="(Order No.".$id_order.") ORDER IN DELIVERY";
        break;
        case 5:
            $body="(Order No.".$id_order.") TRANSFERED VERIFICATION";
        break;
    }
    $url = "https://fcm.googleapis.com/fcm/send";
    $serverKey = 'AAAA8Ax1P4Q:APA91bH4xS7weR5gzU0RMNkOb692vvFZOgfucp7HI-EMR0OY2fUe7hA4ItKfiBsVbRdrzYgz6AAeD9CMLqhZUljz0wLapwEnI7GdDCUBUG9MEF5TJr9KgYnOCFJJH5gCwuNaoEMaOB46';
    $title = "Your Order Have Progress";
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
    $this->m_transaction->change_status($id_order,$metode);
    $this->m_transaction->update_notif($id_order,$metode,$id_customer);
    $this->session->set_flashdata('display', 'asd');
    $data['order']=$this->m_transaction->transfer();
    redirect('transaction/transfer');

}

public function description($id_order){
    $data['id_order'] = $id_order;
    $data['order']=$this->m_transaction->description($id_order);
    $this->load->view('transaction/v_description',$data);
}

}