<?php
include_once('Library/header.php');
if(!isset($_SESSION['custId'])){
    echo "<script type='text/javascript'>  window.location='login.php'; </script>";
    exit();
}

include('Classes/Order.php');
$order    = new Order();

if(isset( $_SESSION['custId'])){
     $cId =  $_SESSION['custId'];
}

$getCor = $order -> getOrderByCust($cId);

?>

<div class="container">
    <div class="new_pro">
        <h2>ORDER</h2>
    </div>
    <div class="row">
        <div class="table-responsive">
            <table class="table table-bordered table-condensed">
                <thead>
                    <th>SL</th>
                    <th>Date</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Action</th>
                </thead>
                <tbody>
                        <?php
                        if(isset($getCor)){
                            $i = 0;
                            while($value = $getCor -> fetch_assoc()){
                                $i++;
                    ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $value['orderDate']; ?></td>
                        <td><?php echo $value['amount']; ?></td>
                        <td><?php if($value['orderDate']) echo "processing"; else echo "Completed"; ?></td>
                        <td><a href="#" class="btn btn-link" >Details</a></td>
                    </tr>
                    <?php }} ?>
                </tbody>
                <tfoot></tfoot>
            </table>
        
        </div>
    </div>
</div>

<?php
include_once('Library/footer.php');
?>