<?php
/**
 *
 */
class products_model extends CI_Model {

  function __construct()  {
    parent::__construct();
  }

  public function get_products(){
    return $this->db->get('products')->result_array();
  }

  public function get_product($id){
    return $this->db->get_where(
      'products',
       array('product_id' =>$id))->row_array();
  }
}
 ?>
