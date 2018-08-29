<?php
include('Library/header.php');
$filepath=realpath(dirname(__FILE__));
include_once($filepath.'/../Classes/Order.php');
$order  = new Order();

    if(isset($_POST['oid'])){
        $oid   = $_POST['oid'];
        $setCo = $order -> setCompletedOrder($oid);
    }
    $getPRdetails = $order -> getProcessingOrder();

?>
<?php
include('Library/sidebar.php');
?>
<div class="col-md-9 col-sm-12 col-xs-12">
    <div class="row">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Processing Order </h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <th>Sl. No.</th>
                            <th>Date</th>
                            <th>Customer</th>
                            <th>Amount</th>
                            <th>Details</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            <?php 
                                if(isset($getPRdetails)){
                                    $i = 0;
                                    while($value = $getPRdetails -> fetch_assoc()){
                                        $i ++;
                            ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $value['orderDate']; ?></td>
                                <td><?php echo $value['custName']; ?></td>
                                <td>Tk. <?php echo $value['amount']; ?></td>
                                <td><a href="orderdetails.php?oid=<?php echo $value['orderId']; ?>" class="btn btn-default">Details</a></td>
                                <td><form action="" method="post"><input type="number" value="<?php echo $value['orderId']; ?>" hidden="hidden" name="oid" /><input type="submit" value="Make Complete" class="btn" /></form></td>
                            </tr>
                            <?php }}?>
                        </tbody>
                        <tfoot></tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include('Library/footer.php');
?>