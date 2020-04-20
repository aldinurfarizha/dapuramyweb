<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Voting extends CI_Controller{



   public function see_vote(){
    $data['vote']=$this->m_voting->get_all_vote();
   $this->load->view('vote/v_vote', $data);
}


}

