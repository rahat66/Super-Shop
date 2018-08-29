<?php
include_once('Library/header.php');
include('Classes/Product.php');
    $product = new Product();
    if(isset($_POST['key'])){
        $key = $_POST['key'];
        if(!empty($key))
        $searchPro = $product -> searchProduct($key);
//    echo"<pre>";
//    print_r($searchPro);
//    echo"</pre>";
    }
    
?>

<div class="container-fluid">
            


                <?php
                    if(isset($searchPro)){
                        if($searchPro -> num_rows > 0 ){
                        while($value = $searchPro -> fetch_assoc()){
                            
                ?>
                <div class="row">
                <div class="col-md-offset-4 col-md-4">
                    <div class="divdesign" >
                        <a href="details.php?proid=<?php echo $value['productId']; ?>">
                        <img class="img-responsive imgmaxima" src="admin/<?php echo $value['image']; ?>" /></a>
                        <h4><?php echo $value['productName']; ?></h4>
                        <p><?php echo $value['brandName']; ?></p>
                        <p>Tk. <?php echo $value['price']; ?></p>
                        <a href="details.php?proid=<?php echo $value['productId']; ?>" class="btn btn-sm btn-success" >Details</a>
                    </div>
                </div>
                                
            </div>
                <?php }}else{
                        echo '<p style="text-align: center;font-weight: 400;font-size: 16px;font-family: roboto;">Your search term  did not match any product.</p>';
                    }}else{
                        echo '<p style="text-align: center;font-weight: 400;font-size: 16px;font-family: roboto;">Search with product name.</p>';
                    } ?>

    </div>

<?php
include_once('Library/footer.php');
?>
