<?php
include('Library/header.php');
$filepath=realpath(dirname(__FILE__));
include_once($filepath.'/../Classes/Order.php');
$order  = new Order();

    if(isset($_GET['oid'])){
        
        $oid   = $_GET['oid'];
        $getCd = $order -> getCustDetailsByOid($oid);
        $getPd = $order -> getOrderDetailsByID($oid); 
    }
   

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
                        <tbody>
                            <?php
                                if(isset($getCd)){
                                    $value = $getCd -> fetch_assoc();
                            ?>
                            <tr>
                                <th>Order By</th>
                                <td><?php echo $value['custName']; ?></td>
                            </tr>
                            <tr>
                                <th>Date</th>
                                <td><?php echo $value['orderDate']; ?></td>
                            </tr>
                            <tr>
                                <th>Mobile</th>
                                <td>0<?php echo $value['number']; ?></td>
                            </tr>
                            <tr>
                                <th>Division</th>
                                <td><?php echo $value['division']; ?></td>
                            </tr>
                            <tr>
                                <th>District</th>
                                <td><?php echo $value['district']; ?></td>
                            </tr>
                            <tr>
                                <th>Address</th>
                                <td><?php echo $value['address']; ?></td>
                            </tr>
                            
                            <?php }?>
                            
                        </tbody>
                        <tfoot></tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Product Details </h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        
                        <thead>
                            <th>Sl. No.</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Price</th>
                            <th>Quentity</th>
                        </thead>
                        
                        <tbody>
                        <?php
                        if(isset($getPd)){
                            $i = 0;
                            while($value = $getPd -> fetch_assoc()){
                                $i++;
                    ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $value['productName']; ?></td>
                        <td><img class="img-responsive" src="<?php echo $value['image']; ?>" width="30px" height="35px" /></td>
                        <td>Tk. <?php echo $value['price']; ?></td>
                        <td><?php echo $value['qtn']; ?></td>
                    </tr>
                    <?php }} ?>
                </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include('Library/footer.php');
?>