<?php

class m_transaction extends CI_Model{

    public function cash(){
        $hsl=$this->db->query("SELECT id_order, method, price_total, customer.name, order_date, status_order, customer.token_fcm, customer.address, transaction.id_customer from transaction INNER JOIN customer on transaction.id_customer=customer.id_customer WHERE method='CASH'");
        return $hsl;
       }
       public function cod(){
        $hsl=$this->db->query("SELECT id_order, method, price_total, customer.name, order_date, status_order, customer.token_fcm, customer.address, transaction.id_customer from transaction INNER JOIN customer on transaction.id_customer=customer.id_customer WHERE method='COD'");
        return $hsl;
       }
       public function transfer(){
        $hsl=$this->db->query("SELECT id_order, method,img, price_total, customer.name, order_date, status_order, customer.token_fcm, customer.address, transaction.id_customer from transaction INNER JOIN customer on transaction.id_customer=customer.id_customer WHERE method='TRANSFER'");
        return $hsl;
       }
       public function change_status($id_order,$metode){
           $hsl=$this->db->query("UPDATE transaction SET status_order='$metode' where id_order='$id_order'");
           return $hsl;
       }
       public function description ($id_order){
           $hsl=$this->db->query("SELECT id_order,product.product_name, qty  FROM detail_transaction INNER JOIN product on detail_transaction.id_product=product.id_product WHERE id_order='$id_order'");
           return $hsl;
       }
       public function update_notif($id_order,$metode,$id_customer){
           switch ($metode){
               case 1:
                $message="ORDER IN PROSSESS";
                break;
                case 2:
                $message="ORDER IN DELIVERY";
                break;
                case 3:
                $message="ORDER IS READY";
                break;
                case 4:
                $message="ORDER IS READY";
                break;
                case 5:
                $message="TRANSFERED VERIFICATION";
                break;
           }
           $hsl=$this->db->query("INSERT INTO notification (id_notification, message, id_customer, tanggal, id_order) VALUES ('','$message','$id_customer',NOW(),'$id_order')");
           return $hsl;
       }
       public function customer(){
        $hsl=$this->db->query("SELECT COUNT(id_customer) as customer FROM customer");
        return $hsl;
    }
    public function transaction(){
        $hsl=$this->db->query("SELECT COUNT(id_order) as transaction FROM transaction");
        return $hsl;
    }
    public function profit(){
        $hsl=$this->db->query("SELECT SUM(price_total) as profit FROM transaction");
        return $hsl;
    }
    public function report($month,$year){
        $hsl=$this->db->query("SELECT id_order, method, price_total, customer.name, order_date, status_order, customer.token_fcm, customer.address, transaction.id_customer from transaction INNER JOIN customer on transaction.id_customer=customer.id_customer WHERE MONTH(order_date)='$month' AND YEAR(order_date)='$year'");
        return $hsl;
    }
}

?>