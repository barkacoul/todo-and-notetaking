<?php

class Test extends CI_controller{

//-----------------------------------------------------------------------------

  public function __construct(){
    parent::__construct();
    $this->load->model('user_model');
    // $result = $this->user_model->get(array('user_id'=>17, 'login'=>'zakaria'));
    //$result = $this->user_model->delete(array('login'=>'Yacob'));

    //$result = $this->user_model->update(array('password'=>'dog','login'=>'idinia'),15);
    $result = $this->user_model->insertUpdate([
      'login' => 'Donny',

    ], 15);
    echo '<pre>';
    print_r($result);
  }

//-----------------------------------------------------------------------------

  public function get(){
    $data = $this->user_model->get();
    print_r($data);
  }

//-----------------------------------------------------------------------------

  public function insert(){
    $result = $this->user_model->insert(['login'=>'Idriss']);
    print_r($result);
  }

//-----------------------------------------------------------------------------

  public function update(){
    $result = $this->user_model->update(['login'=>'Mohamed'], 3);
    print_r($result);
  }

//-----------------------------------------------------------------------------

  public function delete(){
    $result =$this->user_model->delete(2);
    print_r($result);
  }

//-----------------------------------------------------------------------------

}
