<?php
include_once('Library/header.php');
if(!isset($_SESSION['custId'])){
    echo "<script type='text/javascript'>  window.location='login.php'; </script>";
    exit();
}
include('Classes/Customer.php');
include('Classes/Order.php');
include('Classes/Productreview.php');
    $customer = new Customer();
    $order    = new Order();
    $pr      = new Prodcutreview();
    
if(isset( $_SESSION['custId'])){
     $cId =  $_SESSION['custId'];
}


    $totalorder   = $order -> getTotalOrderByCust($cId);
    $totalreview  = $pr -> getTotalReviewByCust($cId);

    $getCust = $customer -> getUserById($cId);
?>
<div class="container">
    <div class="row">
        <div class="col-md-offset-3 col-md-6">
            <div class="register_form">
            <h2>Account Information</h2>
                <hr/>
                    <?php
                        if(isset($getCust)){
                            $value = $getCust -> fetch_assoc();
                    ?>
                    <p><strong>NAME:</strong> <?php echo $value['custName']; ?></p>
                    <p><strong>EMAIL:</strong> <?php echo $value['custEmail']; ?></p>
                    <p><strong>MOBILE:</strong> 0<?php echo $value['number']; ?></p>
                    <p><strong>TOTAL ORDERS:</strong> <?php if(isset($totalorder)) echo $totalorder; ?> <a href="vieworder.php" class="btn-link">View</a></p>
                    <p><strong>TOTAL REVIEWS:</strong> <?php if(isset($totalreview)) echo $totalreview; ?> <a href="viewreview.php" class="btn-link">View</a></p>
                    <p><strong>ADDRESS:</strong> <?php echo $value['address']; ?></p>
                    <?php }?>
                </div>
        </div>
    </div>
</div>
<?php
include_once('Library/footer.php');
?>