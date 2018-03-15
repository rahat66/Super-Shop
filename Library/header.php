<?php
$filepath=realpath(dirname(__FILE__));
//echo $filepath;
include_once($filepath.'/../Classes/Category.php');
include_once($filepath.'/../Classes/Brand.php');
    $cat      = new Category();
    $brand    = new Brand();
    $allBrand = $brand -> getAllBrand();
    $allcat   = $cat -> getAllCategory();
?>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Super Shop</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

<!--      ********************Header*******************-->
        <div class="container-fluid">
          <div class="header_part">
              
<!--         ***************Header top*****************-->
              <div class="row header_top">
              <div class="col-md-3 col-sm-6 col-xs-12">
                  <img class="img-responsive" src="img/Super-Shop.png" alt="Logo image" />
                  </div>
              <div class="col-md-3 col-sm-6 col-xs-12 search_btn">
                    <div class="input-group ">
                      <input style="height: 46px;" type="text" class="form-control" placeholder="Search">
                      <span class="input-group-btn">
                      <button class="btn btn-default btn-lg" type="button">GO!</button>
                      </span>
                  </div>
                  </div>
              <div class="col-md-3 col-sm-6 col-xs-12 cart_btn">
                  <a class="btn btn-default cart_sp" href="cart.php" ><span><img src="img/header_cart.png" alt="cart" /></span><span>Cart(empty)</span></a>
                  </div>
              <div class="col-md-3 col-sm-6 col-xs-12 ">
                  <a class=" btn btn-default btn-lg login_btn" href="login.php" role="button">Login</a>
                  </div>
              </div>
<!----- ***********************Menu******************************** -->
              <div class="row menu_cs">
                  <div class="col-xs-12">
                  	<ul class="nav navbar-nav">
								<li><a href="index.php" class="active">Home</a></li>
                                <li class="dropdown">
                                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Category <span class="caret"></span></a>
                                  <ul class="dropdown-menu" role="menu">
                                    <?php
                                      if(isset($allcat)){
                                          while($value = $allcat -> fetch_assoc()){

                                      ?>
                                    <li><a href="productbycat.php?catid=<?php echo $value['catId']?>"><?php echo $value['catName']?></a></li>
                                    <?php }} ?>
                                  </ul>
                                </li>
                                <li class="dropdown">
                                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Brand <span class="caret"></span></a>
                                  <ul class="dropdown-menu" role="menu">
                                    <?php
                                      if(isset($allBrand)){
                                          while($value = $allBrand -> fetch_assoc()){

                                      ?>
                                    <li><a href="productbybrand.php?bid=<?php echo $value['brandId'] ?>"><?php echo $value['brandName']?></a></li>
                                    <?php }} ?>
                                  </ul>
                                </li>
								<li><a href="cart.php">Cart</a></li>
								<li><a href="#">Blog</a></li>
								<li><a href="#">Contact</a></li>
							</ul>
                  </div>
              
              
              </div>

          </div>
      </div>