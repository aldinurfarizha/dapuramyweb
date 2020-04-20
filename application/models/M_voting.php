<?php

class m_voting extends CI_Model{

    public function get_all_vote(){
      $hsl=$this->db->query("SELECT product.product_name, customer.name, tgl from vote INNER JOIN product on vote.id_product=product.id_product INNER JOIN customer on vote.id_customer=customer.id_customer");
      return $hsl;
        }

}

?>