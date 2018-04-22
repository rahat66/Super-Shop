<?php
include_once('Library/header.php');
include('Classes/Product.php');
    $product = new Product();
    $feturedPro = $product -> featuredProduct();
    $newPro     = $product -> newProduct();
?>
<div class="container-fluid">
          <div class="body_part">
            <div class="row">
                <div class="new_pro">
                    <h2>Fetured Product</h2>
                </div>
<!--
                <hr/>
                <h2>Fetured Product</h2>
                <hr/>
-->
                <?php
                    if(isset($feturedPro)){
                        while($value = $feturedPro -> fetch_assoc()){
                            
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
                <?php }} ?>
            
            </div>
              
            <div class="row">
                <div class="new_pro">
                    <h2>New Relesed</h2>
                </div>
                
              <?php
                    if(isset($newPro)){
                        while($value = $newPro -> fetch_assoc()){
                            
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
                <?php }} ?>
                
            
            </div>
          </div>
      </div>
<?php
include_once('Library/footer.php');
?>