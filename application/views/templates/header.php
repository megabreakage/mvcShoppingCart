<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/styles.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/animate.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/fa/css/font-awesome.min.css">
    <link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/images/codeigniter1.png">

    <title>Shopping</title>
  </head>
  <style media="screen">
    li{
      display: inline-block;
      margin: 0;
      padding: 15px;
    }
    .Top{
      /* border: 1px dashed orange; */
    }
  </style>
  <body>
    <div class="row">
      <div class="col-md-12 .navTop Top">
        <div class="col-md-4 text-center logo">
          <h1 class="animated bounceInDown"> <strong><i class="fab fa-opencart fa-lg"></i></strong> </h1>
        </div>
        <div class="col-md-8 text-right topMenu">
          <div class="row">
            <div class="topMenuList">
              <ul class="col-md-8 menu">
                <li class="animated bounceInDown"> <?php echo anchor("welcome", 'Products', ['class'=>'menu-item']); ?> </li>
                <li class="animated bounceInDown"> <i class="fas fa-shopping-cart"></i> <?php echo anchor("cart", 'Cart', ['class'=>'menu-item']); ?> </li>
              </ul>
            </div>
            <div class="col-md-4 settings">
              <p class="animated bounceInDown pt">
              <?php
                if (isset($_SESSION['user_loggedin']) == FALSE) {
                  echo '<i class="fas fa-user"></i>'; echo anchor("auth/login", ' Hi Guest');
                } else {
                  echo '<i class="fas fa-user"></i>'; echo anchor("auth/logout", ' Log out');
                }
               ?>
            </p>
            </div>
          </div>
        </div>
      </div>
    </div>
