<?php
include_once('Library/header.php');
include('Classes/Product.php');
include('Classes/Cart.php');
    $product = new Product();
    $ct      = new Cart();
    $cname;
    $pid;
if(isset($_GET['proid'])){
    $id=$_GET['proid'];
    $getP=$product -> getProductByID($id);
  
//    echo"<pre>";
//   // var_dump($getP);
//    print_r($getP);
//    echo"</pre>";
    }
if($_SERVER['REQUEST_METHOD']=='POST'){
    
    $quentity = $_POST['qtn'];
    $addCart  = $ct -> addToCart($quentity,$id);
}

?>
<!--    ******************Body***********************-->
      <div class="container">
          <div class="body_part">
            <div class="row">
                <?php
                if(isset($getP)){
                    $value = $getP -> fetch_assoc();
                    $cname = $value['catName'];
                    $pid   = $value['productId'];
                ?>
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <img class="img-responsive" src="admin/<?php echo $value['image']; ?>" />
                </div>
                
                <div class="col-md-4 col-sm-12 col-xs-12">
                    <h1 class="title"><?php echo $value['productName']; ?></h1>
                    <h3>Price:<?php echo $value['price']; ?></h3>
                    <h3>Category:<?php echo $value['catName']; ?></h3>
                    <h3>Brand:<?php echo $value['brandName']; ?></h3>
                    <form class="form-inline" action="" method="post">
                        <input type="number" value="1" name="qtn" /><input type="submit"  value="Buy Now" class="btn btn-sm btn-success" />
                    </form>
               </div>
                
                <div class="col-md-offset-2">
                </div>
            </div>
              
            <div class="row">
                <h1>Product Details</h1>
                <?php echo $value['body']; ?>
              </div>
              
              <?php } ?>

          </div>
      </div>
<div class="container-fluid">
     <div class="row">
        <div class="new_pro">
             <h2>Related Items</h2>
        </div>
                    <?php
            if(isset($cname) && isset($pid)){
//            echo $cname;
//            echo $pid;
             $getPbyCname = $product -> productByCatName($cname, $pid);
//    echo"<pre>";
//   // var_dump($getP);
//    print_r($getPbyCname);
//    echo"</pre>"; 
                if(isset($getPbyCname)){
                    while($value = $getPbyCname -> fetch_assoc()){
                        

            ?>
         <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="divdesign" >
                <a href="#">
                <img class="img-responsive imgmaxima" src="admin/<?php echo $value['image']; ?>" /></a>
                <h4><?php echo $value['productName']; ?></h4>
                <p><?php echo $value['brandName']; ?></p>
                <p>$<?php echo $value['price']; ?></p>
                <a href="details.php?proid=<?php echo $value['productId']; ?>" class="btn btn-sm btn-success" >Details</a>
            </div>
        </div>
        <?php }}} ?>
    </div>
</div>


<?php
include_once('Library/footer.php');
?>