<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Report extends CI_Controller{
    public function __construct()
    {   
        parent::__construct();
        $this->load->library('upload');
        $this->load->library('Pdf');
        $this->load->model('m_transaction');
    }
  public function rep(){
      $this->load->view('report/v_report');
  }
  public function banner(){
    $data['get_banner'] = $this->m_product->get_banner();
    $this->load->view('report/v_banner',$data);
}
public function change_banner(){
    $id=$this->input->post('id');
    $config['upload_path'] = './assets/images/banner/';
    $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; 
    $config['encrypt_name'] = TRUE; 
    $this->upload->initialize($config);
    if ($this->upload->do_upload('picture')){
        $gbr = $this->upload->data();
        $config['image_library']='gd2';
        $config['source_image']='./assets/images/banner/'.$gbr['file_name'];
        $config['create_thumb']= FALSE;
        $config['maintain_ratio']= FALSE;
        $config['quality']= '50%';
        $config['width']= 1400;
        $config['height']= 700;
        $config['new_image']= './assets/images/banner/'.$gbr['file_name'];
        $this->load->library('image_lib', $config);
        $this->image_lib->resize();

        $picture=$gbr['file_name'];
        $this->m_product->change_banner($id,$picture);
        $this->session->set_flashdata('edit', 'sdf');
        redirect('report/banner');
    }
}
  public function print_report(){
    $month=$this->input->post('month');
    $year=$this->input->post('year');
    switch ($month){
        case 1:
        $month_name="JANUARY";
        break;
        case 2:
            $month_name="FEBRUARI";
            break;
            case 3:
                $month_name="MARCH";
                break;
                case 4:
                    $month_name="APRIL";
                    break;
                    case 5:
                        $month_name="MAY";
                        break;
                        case 6:
                            $month_name="JUNE";
                            break;
                            case 7:
                                $month_name="JULY";
                                break;
                                case 8:
                                    $month_name="AGUSTUS";
                                    break;
                                    case 9:
                                        $month_name="SEPTEMBER";
                                        break;
                                        case 10:
                                            $month_name="OKTOBER";
                                            break;
                                            case 11:
                                                $month_name="NOVEMBER";
                                                break;
                                                case 12:
                                                    $month_name="DECEMBER";
                                                    break;
    }
    $data['year'] = $year;
    $data['month'] = $month_name;
    $data['data'] = $this->m_transaction->report($month,$year);
    $this->load->view('report/print_report',$data);
  }
}