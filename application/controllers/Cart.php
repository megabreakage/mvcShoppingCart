<?php

class Cart extends CI_Controller {

  public function index(){

    $data['products'] = $this->products_model->get_products();

    $this->load->view('templates/header');
    $this->load->view('cart_view', $data);
    $this->load->view('templates/footer');

  }

  public function add_items($id){
    $data = $this->input->post();
    unset($data['submit']);

    $this->cart->insert($data);
    $data = $this->cart->contents();

    return redirect("welcome");
  }

  function empty_cart(){
    $this->cart->destroy();
    return redirect("welcome",'refresh');
  }

  function remove_item($rowid){
    $data = array(
      'rowid' => $rowid,
      'qty' => 0
     );
    $this->cart->update($data);
    return redirect("cart"); 

  }

  function update_cart(){

  }
}
 ?>
