<?php
include('Library/header.php');
$filepath=realpath(dirname(__FILE__));
include_once($filepath.'/../Classes/Customer.php');
include_once($filepath.'/../Classes/Productreview.php');
include_once($filepath.'/../Classes/Order.php');
    
    $customer = new Customer();
    $order    = new Order();
    $pr       = new Prodcutreview();
    
    $getAllC = $customer -> getAllCust();

?>
<?php
include('Library/sidebar.php');
?>
<div class="col-md-9 col-sm-12 col-xs-12">
    <div class="row">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Customer Details </h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <th>Sl. No.</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Total Order</th>
                            <th>Total Review</th>
                            <th>Address</th>
                        </thead>
                        <tbody>
                            <?php 
                                if(isset($getAllC)){
                                    $i = 0;
                                    while($value = $getAllC -> fetch_assoc()){
                                        $i ++;
                                        
                                        $id = $value['custId']; 
                            
                                        $totalorder   = $order -> getTotalOrderByCust($id);
                                        $totalreview  = $pr -> getTotalReviewByCust($id);
                            ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $value['custName']; ?></td>
                                <td><?php echo $value['custEmail']; ?></td>
                                <td>0<?php echo $value['number']; ?></td>
                                <td><?php if(isset($totalorder)) echo $totalorder; ?></td>
                                <td><?php if(isset($totalreview)) echo $totalreview; ?></td>
                                <td><?php echo $value['address']; ?></td>
                            </tr>
                            <?php }} ?>
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