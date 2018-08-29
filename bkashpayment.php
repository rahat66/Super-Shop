<?php
include_once('Library/header.php');
if(!isset($_SESSION['custId'])){
    echo "<script type='text/javascript'>  window.location='login.php'; </script>";
    exit();
}

include('Classes/Cart.php');
include('Classes/Customer.php');


$logName = $_SESSION['custName'];
$logId = $_SESSION['custId'];
$ct = new Cart();
$customer = new Customer();
$getItem = $ct -> getTotalItem();
                if($getItem){
                    $rs    = $getItem -> fetch_assoc();
                    $total = $rs['cnt'];
                    if($total==0){
                        header('location:cart.php');
                    }
                }
    
$getCust = $customer -> getUserById($logId);
    if(isset($getCust)){
        $tmp = $getCust -> fetch_assoc();
        $getNum = $tmp['number'];
    }
?>

<!--    ******************Body***********************-->
<div class="container">
    <div class="row">
        <div class="col-md-8 col-sm-12 col-xs-12">
            <h2  class="hd_cash">bKash Payment</h2>
            <?php 
                $getTtl = $ct -> getTotalPrice();
                if($getTtl){
                    $rs = $getTtl -> fetch_assoc();
                    $t  =$rs['ttl'];
                    
                ?>
            <h3 class="cs_h3">Your Payable Amount: <span style="color:#F16565;">Tk. <?php echo $t+50; ?></span></h3>
            <?php } ?>
            <h2 class="cs_h3">How to Pay</h2>
            <ul class="list-group mg_15b">
            <li class="pad_15b ">Step 1: Dial *247#</li>
            <li class=" pad_15b">Step 2: Select Payment option 3</li>
            <li class=" pad_15b">Step 3: Write Merchant Account Number: <strong>018XXXXXXX</strong></li>
            <li class=" pad_15b">Step 4: Write Order Amount <strong><?php echo $t+50; ?></strong></li>
            <li class=" pad_15b">Step 5: Write Cart ID in Reference Box <strong>XXXXXX</strong></li>
            <li class=" pad_15b">Step 6: Write Counter Number: <strong>X</strong></li>
            <li class=" pad_15b">Step 7: Write Four Digit Secret PIN (XXXX)</li>
            </ul>
            <br/>
            <h3 class="cs_h3">Now, You will get a Transaction ID through SMS </h3>
            <p>Please write down that Transaction ID here:</p>
            <input class="input-sm" type="text" placeholder="Transaction Id" required /><br/><br/>
            <a class="btn btn-success" href="shipping.php">Back</a>
            <a class="btn btn-primary" href="orderprocess.php">Confirm Order</a>
        </div>
        <div class="col-md-4 col-sm-12 col-xs-12">
        <div class="sort_cart">
          <label>Order Summary</label>
            <hr/>
            <h3>You have <?php 
                    echo $total;
                ?> items in your cart</h3>
            <hr/>
            <label>Total: Tk. <?php 
                $getTtl = $ct -> getTotalPrice();
                if($getTtl){
                    $rs = $getTtl -> fetch_assoc();
                    $t  =$rs['ttl'];
                    echo $t;
                }
                ?></label><br/><br/>
            <label>Shipping:  Tk. 50</label>
            <hr/>
            <label style="color:#FF6600;">Payable Total: Tk. <?php echo $t+50; ?>.</label>
            <hr/>
            <label>Shipping Address</label>
            <hr/>
            <?php echo $logName; ?>            <br/>
            Mobile: 0<?php echo $getNum; ?>            </div>
        </div>
    
        </div>

</div>
<?php
include_once('Library/footer.php');
?>