<?php
include('Library/header.php');
$filepath=realpath(dirname(__FILE__));
//echo $filepath;
include_once($filepath.'/../Classes/Category.php');
include_once($filepath.'/../Classes/Brand.php');
include_once($filepath.'/../Classes/Product.php');
    
    $brand  = new Brand();
    $tbrand = $brand -> totalNumOfBrand();
    
    $cat    = new Category();
    $tcat   = $cat -> totalNumOfCategory();

    $pro    = new Product();
    $tpro   = $pro -> totalNumOfProduct();
?>
<?php
include('Library/sidebar.php');
?>
<!--
    <div class="container-fluid">
      <div class="row mgtop">
        <div class="col-md-3 col-sm-12 col-xs-12 nav-sidebar">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <th style="background-color: #428BCA;color:white;">Admin Panel</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td><a href="#">Overview</a></td>
                        </tr>
                        <tr>
                            <td><a href="showproduct.php">Product</a></td>
                        </tr>
                        <tr>
                            <td><a href="#">Category</a></td>
                        </tr>
                        <tr>
                            <td><a href="#">Brand</a></td>
                        </tr>
                        <tr>
                            <td><a href="#">Order</a></td>
                        </tr>
                        <tr>
                            <td><a href="#">Customer</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>  
        </div>
-->
        <div class="col-md-9 col-sm-12 col-xs-12">
            <div class="row">
                <div class="col-md-4 col-sm-12 mgbottom20">
                <a class="circle-text " href="showproduct.php"><?php
                    if(isset($tpro)){
                        echo $tpro;
                    }
                    ?><br/> products</a>
                </div>
                <div class="col-md-4 col-sm-12 mgbottom20">
                 <a class="circle-text" href="showcategory.php"><?php
                     if(isset($tcat)){
                         echo $tcat;
                     }
                     ?><br/> categories</a>
                </div>
                <div class="col-md-4 col-sm-12 mgbottom20">
                 <a class="circle-text" href="showbrand.php"><?php
                     if(isset($tbrand)){
                         echo $tbrand;
                     }
                     ?><br/> brands</a>
                </div>
                                <div class="col-md-4 col-sm-12 mgbottom20">
                 <a class="circle-text" href="#">202<br/> orders completed</a>
                </div>
                                <div class="col-md-4 col-sm-12 mgbottom20">
                 <a class="circle-text" href="#">202<br/> orders processing</a>
                </div>
                                <div class="col-md-4 col-sm-12 mgbottom20">
                 <a class="circle-text" href="#">202<br/> customers</a>
                </div>

            </div>
        </div>

      </div>
    </div>

<?php
include('Library/footer.php');
?>