<?php

class CRUD_model extends CI_Model{

  protected $_table = null;
  protected $_primary_key = null;
  //-----------------------------------------------------------------------------

  public function __construct(){
    parent::__construct();
  }
  //----------------------------------------------------------------------------

  /**
  *
  *@usage
  * All: $this->user_model->get()
  * Single: $this->user_model->get(2)
  * Custom: $this->user_model->get(array('any'=> 'param'))
  */

    public function get($id = null, $order_by = null){

      if(is_numeric($id)){
        $q = $this->db->where($this->_primary_key, $id);
      }

      if(is_array($id)){
        foreach($id as $key=>$value){
          $q = $this->db->where($key, $value);
        }
      }

        $q = $this->db->get($this->_table);
        return $q->result_array();
    }

  //-----------------------------------------------------------------------------

  /**
  *
  * @param  array $data
  *
  * @usage $result = $this->user_model->insert(['login'=>'Idriss']);
  *         print_r($result);
  */
    public function insert($data){
      $this->db->insert($this->_table, $data);
      return $this->db->insert_id();
    }

  /**
  *
  * @usage $result = $this->user_model->update(['login'=>'Mohamed'], 3);
  *
  */

  //-----------------------------------------------------------------------------

    public function update($new_data, $where){
      if(is_numeric($where)){
        $this->db->where([$this->_primary_key => $where]);
      }

      elseif(is_array($where)){
        foreach($where as $key=>$value){
          $q = $this->db->where($key, $value);
        }
      }
      else{
        die("You must pass a second parameter to the UPDATE()");
      }

      $this->db->update($this->_table, $new_data);
      return $this->db->affected_rows();
    }

    //-----------------------------------------------------------------------

  /**
  *
  * @usage insertUpdate(['name'=>'ted'], 12)
  *
  */
    public function insertUpdate($data, $id=false){
      if(!$id){
        die("You must pass a second parameter to the insertUPDATE()");
      }
      $this->db->select($this->_primary_key);
      $this->db->where($this->_primary_key, $id);
      $q = $this->db->get($this->_table);
      $result = $q->num_rows();

      if($result == 0){
        //update
        return $this->insert($data);
      }
        //insert
        return $this->update($data, $id);
    }
    //-----------------------------------------------------------------------

  /**
  *
  * @usage $result =$this->user_model->delete(2);
  *
  */

  //-----------------------------------------------------------------------------

    public function delete($id){
      if(is_numeric($id)){
        $this->db->where($this->_primary_key, $id);
      }
      elseif(is_array($id)){
        foreach($id as $key=>$value){
          $q = $this->db->where($key, $value);
        }
      }
      else{
        die("You must pass a parameter to the DELETE()");
      }
      $this->db->delete($this->_table);
      return $this->db->affected_rows();
    }

  //-----------------------------------------------------------------------------

}
