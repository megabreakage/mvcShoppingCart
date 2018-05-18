<?php
defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<style media="screen">
  .borders{
    border: 1px dashed red;
  }
  .border-bt{
    border-bottom: 1px solid #000000;
  }
  .divPad{
    padding: 0;
  }
</style>


<h2 class="text-center animated fadeIn pb">Your Shopping Cart</h2>


<?php if (empty($cart = $this->cart->contents())): ?>

<div class="col-md-6 col-md-offset-3 text-center pt pb">
  <p class="alert alert-danger text-center animated bounceIn"> Your Shopping Cart is Empty!
    <?php echo anchor('welcome', 'Let\'s Go Shopping') ?>
   </p>
</div>

<?php endif; ?>

<div class="container pt">
  <?php echo form_open('cart/update_cart'); ?>
    <div class="col-md-12 border-bt">
      <div class="row">
        <?php
        $total = 0;
        $discount = 0;
        $shipping = 0;
        $grandtotal = 0;
        $i = 1;

        foreach ($cart as $item):

          $id = $item['id'];
          $rowid = $item['rowid'];
          $qty = $item['qty'];
          $price = $item['price'];
          $name = $item['name'];
          // collect cart data for update
          // format <input type="hidden" name="cart[id][id/rowid/name/qty/name]" value="1" />
          echo form_hidden('cart[' .$item['id']. '][id]', $id);//for id
          echo form_hidden('cart[' .$item['id']. '][rowid]', $rowid);//for row_id
          echo form_hidden('cart[' .$item['id']. '][qty]', $qty);//for $qty
          echo form_hidden('cart[' .$item['id']. '][price]', $price);//for Price
          echo form_hidden('cart[' .$item['id']. '][name]', $name);//for name
          ?>
          <div class="col-md-2  thumbnail">
            <img src="<?php echo $item['image']; ?>" alt="thumbnail">
          </div>
          <div class="col-md-6 ">
            <?php echo $item['name']; ?><br>
            <p><small>Value: Ksh.<?php echo $item['price']; ?></small></p>
          </div>
          <div class="col-md-2">
            <div class="col-md-5">
              Quantity:
            </div>
            <div class="col-md-7">
              <?php echo form_input('cart['.$item['id'].'][qty]', $item['qty'], ['class'=>'form-control text-center']); ?>
            </div>
          </div>
          <div class="col-md-2 pt text-right ">
            <!-- subtotal -->
            Ksh. <?php echo $item['subtotal'] ?>
          </div>
          <div class="col-md-12 text-right">
            <?php echo anchor('cart/remove_item/'.$item['rowid'], 'Remove') ?>
          </div>
          <?php
            $total = $total + $item['price'];
            ?>
        <?php endforeach; ?>
      </div>
    </div>
    <div class="col-md-12 text-right ">
      <div class="row">
        <div class="col-md-9 text-right ">
          <p> Subtotals ( <em><?php echo count($cart); ?> item<small>(s)</small> </em> )</p>
          <p>Discount</p>
          <p>Shipping</p>
        </div>
        <div class="col-md-3 text-right ">
          <div class="col-md-12 border-bt divPad">
            <p><?php echo $total; ?></p>
            <p><?php echo $discount; ?></p>
            <p><?php echo $shipping; ?></p>
            <p><?php $grandtotal = ($total + $shipping) - $discount; ?></p>
          </div>
          <div class="col-md-12 text-right border-bt divPad">
            <p> <strong>Ksh. <?php echo $grandtotal; ?></strong> </p>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-12 text-right pt">
      <?php echo form_submit(['name'=>'submit', 'value'=>'Update Cart', 'class'=>'btn btn-primary']) ?>
    </div>
  <?php echo form_close(); ?>
  <hr>
  <div class="col-md-12 text-center pt pb">
    <?php echo anchor('billing', 'Proceed to Checkout', ['class'=>'btn btn-primary']) ?>
  </div>
</div>
