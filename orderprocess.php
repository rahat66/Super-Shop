<?php
include_once('Library/header.php');
if(!isset($_SESSION['custId'])){
    echo "<script type='text/javascript'>  window.location='login.php'; </script>";
    exit();
}
include('Classes/Cart.php');
include('Classes/Customer.php');
include('Classes/Order.php');


$logId = $_SESSION['custId'];
$ct = new Cart();
$od = new Order();
$customer = new Customer();
$getCart = $ct -> getCart();
                 if($getCart){
            $getTtl = $ct -> getTotalPrice();
            $rs     = $getTtl -> fetch_assoc();
            $t      = $rs['ttl'];
            $ttal   =  $t + 15;
                     
            $uId      = $logId;
            $iniOrder = $od -> insertUserOrder($uId, $ttal);
            $oId     = $od -> getLastoId();

            while($result = $getCart -> fetch_assoc()){
                $proId  = $result['productId'];
                $q      = $result['qtn'];
               $ordPro = $od -> insertOrderedProduct($oId,$proId,$q);

            }
                             
        $delCart = $ct -> deleteCartBysId();
            }
?>
<div class="container">
    <div class="new_pro">
        <h2>Congratulation! Order has confirmed.</h2>
    </div>
            <a href="index.php" class="btn btn-lg btn-info">Continue Shopping</a>
</div>
<?php
include_once('Library/footer.php');
?>