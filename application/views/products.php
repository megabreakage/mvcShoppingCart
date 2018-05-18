<?php
defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<style media="screen">
  .borders{
    /* border: 1px dashed green; */
  }
</style>

<h2 class="text-center animated fadeIn">Products</h2>
<div class="col-md-11 col-md-offset-1 pt pb">
  <div class="row">
    <div class="col-md-8 col-sm-12 borders">

      <!-- <pre><?php echo print_r($products) ?></pre> -->
      <?php if (count(($products))): ?>

        <?php foreach ($products as $product): ?>
          <?php
            echo form_hidden('[row_id]')
           ?>
          <div class="col-md-3 pt pb text-center">
            <a href="<?php echo base_url() ?>welcome/view/<?php echo $product['product_id']; ?>">
              <div class="thumbnail productImage animaed fadeIn">
                <img src="<?php echo $product['product_image']; ?>" alt="">
              </div>
              <p class="animated bounceIn"> <small><?php echo $product['product_name']; ?></small> </p>
              <p class="animated fadeIn"> <small>Ksh</small>  <?php echo $product['product_price']; ?></p>
            </a>
            <div class="col-md-12 addToCart">
              <?php
                $id = $product['product_id'];
                $qty = 1;
                $price = $product['product_price'];
                $name = $product['product_name'];
                $image = $product['product_image'];

                echo form_open('cart/add_items/'.$id);
                  echo form_hidden('id', $id);
                  echo form_hidden('qty', 1);
                  echo form_hidden('price', $price);
                  echo form_hidden('name', $name);
                  echo form_hidden('image', $image);

                  echo form_submit(['name'=>'submit', 'value'=>'Add to Cart', 'class'=>'btn buttons']);
                echo form_close();
                ?>
            </div>
          </div>
        <?php endforeach; ?>

      <?php else: ?>
        <div class="col-md-6 offset-md-3 alert alert danger">
          <p class="animated bounceIn">No Products Available</p>
        </div>
      <?php endif; ?>
    </div>

    <div class="col-md-3 .sideBar borders pt pb">
      <h4 class="text-center animated fadeIn">Cart</h4>
      <?php $cart_check = $this->cart->contents(); ?>
      <?php if ($cart_check):
        $cart = $this->cart->contents();
        $grandtotal = 0;
        $i = 1;
        ?>
        <?php foreach ($cart as $item): ?>
          <div class="row">
            <div class="col-md-5 name">
              <small><?php echo $item['name']; ?></small>
            </div>
            <div class="col-md-1  quantity">
              <small><?php echo $item['qty']; ?></small>
            </div>
            <div class="col-md-2 total text-right">
              <small><?php echo $item['subtotal']; ?></small>
              <?php $grandtotal = $grandtotal + $item['subtotal']; ?>
            </div>
          </div>
        <?php endforeach; ?>
          <hr>
          <div class="row">
            <div class="col-md-6">
              <small><strong>Total</strong></small>
            </div>
            <div class="col-md-6 text-right">
              <small><strong> <?php echo $grandtotal ?> </strong></small>
            </div>
          </div>
          <div class="col-md-12 pt text-right">
            <?php echo anchor('cart/empty_cart', 'Empty Cart', ['class'=>'btn btn-primary']) ?>
          </div>
      <?php else: ?>
          <p class="text-center animated bounceIn"> Cart is Empty!</p>
      <?php endif; ?>
    </div>

  </div>
</div>
