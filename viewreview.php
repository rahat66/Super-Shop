<?php
include_once('Library/header.php');
if(!isset($_SESSION['custId'])){
    echo "<script type='text/javascript'>  window.location='login.php'; </script>";
    exit();
}

include('Classes/Productreview.php');
    $pr = new Prodcutreview();

if(isset( $_SESSION['custId'])){
     $cId =  $_SESSION['custId'];
}

    $getReview = $pr -> getReviewByCust($cId);

?>

<div class="container">
    <div class="new_pro">
        <h2>REVIES</h2>
    </div>
    <div class="row">
        <div class="table-responsive">
            <table class="table table-bordered table-condensed">
                <thead>
                    <th>SL</th>
                    <th>Date</th>
                    <th>Product</th>
                    <th>Content</th>
                    <th>Action</th>
                </thead>
                <tbody>
                        <?php
                        if(isset($getReview)){
                            $i = 0;
                            while($value = $getReview -> fetch_assoc()){
                                $i++;
                    ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $value['date']; ?></td>
                        <td><?php echo $value['productName']; ?></td>
                        <td><?php echo $value['body']; ?></td>
                        <td><a href="#" class="btn btn-link" >Remove</a></td>
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