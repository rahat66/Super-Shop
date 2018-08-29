<?php
include_once('Library/header.php');
if(!isset($_SESSION['custId'])){
    echo "<script type='text/javascript'>  window.location='login.php'; </script>";
    exit();
}
include('Classes/Order.php');
$od = new Order();

    if(isset($_GET['oid'])){
        $oid = $_GET['oid'];
        $getOd = $od -> getOrderDetailsByID($oid);
    }
?>
<div class="container">
    <div class="new_pro">
        <h2>ORDER DETAILS</h2>
    </div>
    <div class="row">
        <div class="table-responsive">
            <table class="table table-bordered table-condensed">
                <thead>
                    <th style="widht:10%;">SL</th>
                    <th style="widht:25%;">Product Name</th>
                    <th style="widht:25%;">Image</th>
                    <th style="widht:25%;">Price</th>
                    <th style="widht:15%;">Quentity</th>
                </thead>
                <tbody>
                        <?php
                        if(isset($getOd)){
                            $i = 0;
                            while($value = $getOd -> fetch_assoc()){
                                $i++;
                    ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $value['productName']; ?></td>
                        <td><img class="img-responsive" src="admin/<?php echo $value['image']; ?>" width="30px" height="35px" /></td>
                        <td>Tk. <?php echo $value['price']; ?></td>
                        <td><?php echo $value['qtn']; ?></td>
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