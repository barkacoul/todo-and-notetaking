<?php


class Home extends CI_Controller {
  //-----------------------------------------------------------------------------

  public function index(){
    $this->load->view('home/inc/header_view');
    $this->load->view('home/home_view');
    $this->load->view('home/inc/footer_view');
  }

//-----------------------------------------------------------------------------

  public function test(){
    $this->db->select('user_id, login');
    $this->db->from('user');
    $this->db->order_by('user_id DESC');
    $q = $this->db->get('');
    print_r($q->result());

    //$data = array(
    //  'login' => 'Jenkins'
    //);
    //$this->db->insert('user', $data);

    //$data = array(
    //  'login' => 'Zoumana'
    //);
    //$this->db->where(['user_id' => 6]);
    //$this->db->update('user', $data);

    //$this->db->where(['user_id' => 6]);
    //$this->db->delete('user');
  }

//  public function code(){
  //  echo hash('sha256', 'admin' . SALT);
  //}

//-----------------------------------------------------------------------------

  public function register(){
    $this->load->view('home/inc/header_view');
    $this->load->view('home/register_view');
    $this->load->view('home/inc/footer_view');
  }

//-----------------------------------------------------------------------------

}
