<?php

class m_product extends CI_Model{

    public function get_all_product(){
      $hsl=$this->db->query("SELECT * FROM product");
      return $hsl;
    }
    public function display_product($id_product){
      $hsl=$this->db->query("UPDATE product set status=1 where id_product='$id_product'");
      return $hsl;
    }
    public function notdisplay_product($id_product){
      $hsl=$this->db->query("UPDATE product set status=0 where id_product='$id_product'");
      return $hsl;
    }
    public function edit_product_with_image($id_product,$product_name,$description,$stock,$price,$picture){
      $hsl=$this->db->query("UPDATE product set product_name='$product_name', description='$description', stock='$stock',price='$price',picture='$picture'  where id_product='$id_product'");
      return $hsl;
    }
    public function edit_product($id_product,$product_name,$description,$stock,$price){
      $hsl=$this->db->query("UPDATE product set product_name='$product_name', description='$description', stock='$stock',price='$price' where id_product='$id_product'");
      return $hsl;
    }
    public function save_product($product_name,$description,$stock,$price,$picture){
      $hsl=$this->db->query("INSERT INTO product (id_product, product_name, description, stock, price, picture) VALUES ('','$product_name','$description','$stock','$price','$picture')");
      return $hsl;
    }
}

?>