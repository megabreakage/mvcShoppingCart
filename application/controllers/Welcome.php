<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()	{

		$data['products'] = $this->products_model->get_products();

		$this->load->view('templates/header');
		$this->load->view('products', $data);
		$this->load->view('templates/footer');
	}

	public function view($id){
		$data['product'] = $this->products_model->get_product($id);

		// echo '<pre>';
		// 	echo print_r($data);
		// echo '</pre>';
		// exit();

		$this->load->view('templates/header');
		$this->load->view('product_view', $data);
		$this->load->view('templates/footer');
	}

}

?>
