<?php
include_once('Library/header.php');
include('Classes/Product.php');
    $product = new Product();
if(isset($_GET['catid'])){
    $id=$_GET['catid'];
    $getPbyCat=$product -> productByCatID($id);
    
//    echo"<pre>";
//   // var_dump($getP);
//    print_r($getPbyCat);
//    echo"</pre>";
    }
?>
<div class="container-fluid">

            <div class="row">

                <?php
                    if(isset($getPbyCat)){
                        $i = 0;
                        while($value = $getPbyCat -> fetch_assoc()){
                        if($i == 0){
                        echo '<div class="new_pro"><h2>'.$value['catName'].' Items </h2></div>' ;   
                        }
                            $i = 1;
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
<?php
include_once('Library/footer.php');
?>