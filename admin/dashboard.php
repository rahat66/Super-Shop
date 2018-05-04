<?php
include('Library/header.php');
$filepath=realpath(dirname(__FILE__));
//echo $filepath;
include_once($filepath.'/../Classes/Category.php');
include_once($filepath.'/../Classes/Brand.php');
include_once($filepath.'/../Classes/Product.php');
include_once($filepath.'/../Classes/Customer.php');
    
    $brand  = new Brand();
    $tbrand = $brand -> totalNumOfBrand();
    
    $cat    = new Category();
    $tcat   = $cat -> totalNumOfCategory();

    $pro    = new Product();
    $tpro   = $pro -> totalNumOfProduct();

    $cust   = new Customer();
    $tcust  = $cust -> getNumOfCustomer();
?>
<?php
include('Library/sidebar.php');
?>
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
                 <a class="circle-text" href="#"><?php
                    if(isset($tcust)){
                        echo $tcust;
                    }
                    ?><br/> customers</a>
                </div>

            </div>
        </div>

<!--
      </div>
    </div>
-->

<?php
include('Library/footer.php');
?>