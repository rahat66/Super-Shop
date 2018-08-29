<?php
include_once('Library/header.php');
if(!isset($_SESSION['custId'])){
    echo "<script type='text/javascript'>  window.location='login.php'; </script>";
    exit();
}
include('Classes/Cart.php');
include('Classes/Customer.php');


$logId = $_SESSION['custId'];
$ct = new Cart();
$customer = new Customer();
$getItem = $ct -> getTotalItem();
                if($getItem){
                    $rs    = $getItem -> fetch_assoc();
                    $total = $rs['cnt'];
                    if($total==0){
                        echo "<script type='text/javascript'>  window.location='cart.php'; </script>";
                        exit();
                    }
                }
    
$getCust = $customer -> getUserById($logId);
//    echo"<pre>";
//    print_r($getCust);
//    echo"</pre>";

    if(isset($_POST['select'])){
        $select = $_POST['select'];
        if($select == 1){
           echo "<script type='text/javascript'>  window.location='placeorder.php'; </script>";
           exit(); 
        }else{
            echo "<script type='text/javascript'>  window.location='bkashpayment.php'; </script>";
            exit();
        }
    }

?>
<!--    ******************Body***********************-->
<div class="container">
    <div class="row">
        <div class="col-md-8 col-sm-12 col-xs-12">
        <div class="register_form">
            <h2>ADDRESS</h2>
            <form action="" method="post">
                <?php
                    if(isset($getCust)){
                        $value = $getCust -> fetch_assoc();
                    
                ?>
                <label class="input_label">Full Name:</label>
                <input class="r_input_field" type="text"  value="<?php echo $value['custName']; ?>" name="u_name" required /><br/>
                <label class="input_label">Mobile No:</label>
                <input class="r_input_field" type="" value="0<?php echo $value['number']; ?>" name="u_num" required /><br/>
                <label class="input_label">Division</label>
                <input class="r_input_field" type="text" value="<?php echo $value['division']; ?>" name="divi" required />
                <label class="input_label">District</label>
                <input class="r_input_field" type="text" value="<?php echo $value['district']; ?>" name="dist" required />
                <label class="input_label">Address</label>
                <input class="r_input_field" type="text" value="<?php echo $value['address']; ?>" name="address" required />
                <label class="input_label">Payment Method</label>
                <select class="r_input_field " id="select" name="select">
                    <option value="1">Cash on delivery</option>
                    <option value="2">bKash</option>
                </select>
                <a class="btn btn-primary" href="cart.php">Back</a>
<!--                <input style="float:right; margin-right: 10px;" type="button" class="btn btn-success" value="Submit" />-->
                <input type="submit" style="margin-left:80%;"  value="Next" class="btn btn-success"/>
                <?php } ?>
                
            </form>
        </div>
        </div>
        <div class="col-md-4 col-sm-12 col-xs-12">
        <div class="sort_cart">
            <h3>You have <?php 
                    echo $total;
                ?> items in your cart</h3>
            <hr/>
            <label>Total:Tk.  
            <?php 
                $getTtl = $ct -> getTotalPrice();
                if($getTtl){
                    $rs = $getTtl -> fetch_assoc();
                    $t  =$rs['ttl'];
                    echo $t;
                }
                ?>
            </label><br/><br/>
            <label>Shipping: Tk. 50</label>
            <hr/>
            <label style="color:#FF6600;">Payable Total: Tk.  
            <?php echo $t+50; ?>
            </label>
            </div>
        </div>
    </div>
</div>
<?php
include_once('Library/footer.php');
?>