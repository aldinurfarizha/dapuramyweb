<?php

class m_transaction extends CI_Model{

    public function cash(){
        $hsl=$this->db->query("SELECT id_order,product, method, price_total,verif, customer.name, order_date, status_order from transaction  INNER JOIN customer on transaction.id_customer=customer.id_customer WHERE method='CASH'");
        return $hsl;
       }
       public function cod(){
        $hsl=$this->db->query("SELECT id_order,product, method, price_total,verif, customer.name, order_date, status_order from transaction  INNER JOIN customer on transaction.id_customer=customer.id_customer WHERE method='COD'");
        return $hsl;
       }
       public function transfer(){
        $hsl=$this->db->query("SELECT id_order,product, method, price_total,verif, customer.name, order_date, status_order from transaction  INNER JOIN customer on transaction.id_customer=customer.id_customer WHERE method='TRANSFER'");
        return $hsl;
       }
       public function change_status($id_order,$metode){
           $hsl=$this->db->query("UPDATE transaction SET status_order='$metode' where id_order='$id_order'");
           return $hsl;
       }
}

?>