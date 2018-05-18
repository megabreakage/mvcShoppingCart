<?php
 ?>
<h2 class="text-center animated fadeIn">Product View</h2>
 <div class="container pt pb">

   <!-- <pre> <?php echo print_r($product) ?> </pre> -->
   <div class="row">
      <div class="col-md-6 pt pb thumbnail">
        <img src="<?php echo $product['product_image']; ?>" alt="">
      </div>
      <div class="col-md-6 pt pbr">
        <div class="row">
          <div class="col-md-12 pt pb">
            <p><strong><?php echo $product['product_name'] ?></strong></p>
          </div>
          <div class="col-md-12 pt pb">
            <!-- price -->
            <p>Price: <strong><?php echo $product['product_price'] ?></strong></p>
          </div>
          <div class="col-md-12 pt pb">
            <div class="row">
              <div class="col-md-2">
                <!-- quantity input button -->
                <?php echo form_input(['name'=>'qty', 'value'=> '1', 'class'=>'form-control']); ?>
              </div>
              <div class="col-md-6 ">
                <!-- add to cart button -->
                <?php
                $id = $product['product_id'];
                $qty = 1;
                $price = $product['product_price'];
                $name = $product['product_name'];
                $image = $product['product_image'];

                echo form_open('cart/add_items/'.$id);
                  echo form_hidden('id', $id);
                  echo form_hidden('qty', $qty);
                  echo form_hidden('price', $price);
                  echo form_hidden('name', $name);
                  echo form_hidden('image', $image);

                  echo form_submit(['name'=>'submit', 'value'=>'Add to Cart', 'class'=>'btn btn-primary']);
                echo form_close();

                 ?>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-12 pt">
        <div class="col-md-8 col-md-offset-2">
          <p> <?php echo $product['product_description'] ?> </p>
        </div>
      </div>
   </div>
 </div>
