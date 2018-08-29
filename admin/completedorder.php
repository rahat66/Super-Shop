<?php
include('Library/header.php');
$filepath=realpath(dirname(__FILE__));
include_once($filepath.'/../Classes/Order.php');
$order  = new Order();

    $getCOdetails = $order -> getCompletedOrder();

?>
<?php
include('Library/sidebar.php');
?>
<div class="col-md-9 col-sm-12 col-xs-12">
    <div class="row">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Completed Order </h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <th>Sl. No.</th>
                            <th>Date</th>
                            <th>Customer</th>
                            <th>Amount</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            <?php 
                                if(isset($getCOdetails)){
                                    $i = 0;
                                    while($value = $getCOdetails -> fetch_assoc()){
                                        $i ++;
                            ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $value['orderDate']; ?></td>
                                <td><?php echo $value['custName']; ?></td>
                                <td>Tk. <?php echo $value['amount']; ?></td>
                                <td><a class="btn btn-default" href="orderdetails.php?oid=<?php echo $value['orderId']; ?>">Details</a></td>
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