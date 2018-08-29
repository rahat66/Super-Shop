<?php
include('Library/header.php');
$filepath=realpath(dirname(__FILE__));
//echo $filepath;
include_once($filepath.'/../Classes/Category.php');
include_once($filepath.'/../Classes/Brand.php');
include_once($filepath.'/../Classes/Product.php');
include_once($filepath.'/../Classes/Customer.php');
include_once($filepath.'/../Classes/Order.php');
include_once($filepath.'/../Classes/Productreview.php');
    
    $brand  = new Brand();
    $tbrand = $brand -> totalNumOfBrand();
    
    $cat    = new Category();
    $tcat   = $cat -> totalNumOfCategory();

    $pro    = new Product();
    $tpro   = $pro -> totalNumOfProduct();

    $cust   = new Customer();
    $tcust  = $cust -> getNumOfCustomer();
    
    $order  = new Order();
    $getPo  = $order -> getTotalProcessingOrder();
    $getCo  = $order -> getTotalCompleteOrder();

    $pr = new Prodcutreview();
    $tr = $pr -> getTotalReview();
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
                 <a class="circle-text" href="completedorder.php"><?php
                     if(isset($getCo)){
                         echo $getCo;
                     }
                     ?><br/> orders completed</a>
                </div>
                
                <div class="col-md-4 col-sm-12 mgbottom20">
                 <a class="circle-text" href="processingorder.php"><?php
                     if(isset($getPo)){
                         echo $getPo;
                     }
                     ?><br/> orders processing</a>
                </div>
                
                <div class="col-md-4 col-sm-12 mgbottom20">
                 <a class="circle-text" href="customerdetails.php"><?php
                    if(isset($tcust)){
                        echo $tcust;
                    }
                    ?><br/> customers</a>
                </div>
                
                <div class="col-md-4 col-sm-12 mgbottom20">
                 <a class="circle-text" href="showreview.php"><?php
                     if(isset($tr)){
                         echo $tr;
                     }
                     ?><br/> Reviews</a>
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