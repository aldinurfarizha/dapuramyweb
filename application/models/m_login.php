<?php defined('BASEPATH') OR exit('No direct script access allowed');

class m_login extends CI_Model{

    function login($post)
    {
   
      $this->db->select('*');
      $this->db->from('user');
      $this->db->where('username', $post['username']);
      $this->db->where('password', sha1($post['password']));
      $query= $this->db->get();
      return $query;
    }
   
}
?>