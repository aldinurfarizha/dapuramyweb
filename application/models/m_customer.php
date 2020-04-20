<?php

class m_customer extends CI_Model{

    public function get_all_customer(){
      $hsl=$this->db->query("SELECT * FROM customer");
      return $hsl;
        }
        public function verified($id_customer){
          $hsl=$this->db->query("UPDATE customer set status='VERIFIED' where id_customer='$id_customer'");
          return $hsl;
        }
        public function delete($id_customer){
          $hsl=$this->db->query("DELETE FROM customer where id_customer='$id_customer'");
          return $hsl;
        }
}

?>