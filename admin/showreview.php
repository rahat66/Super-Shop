<?php
include('Library/header.php');
$filepath=realpath(dirname(__FILE__));
//echo $filepath;
include_once($filepath.'/../Classes/Productreview.php');
    $pr = new Prodcutreview();
    
    if(isset($_GET['rid'])){
        $rid = $_GET['rid'];
        $removeR = $pr -> deleteReviewById($rid);
    }

    $getReview = $pr -> getAllReview();

?>
<?php
include('Library/sidebar.php');
?>

<div class="col-md-9 col-sm-12 col-xs-12">
    <div class="row">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Category List </h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <th>SL</th>
                            <th>Date</th>
                            <th>Product</th>
                            <th>Customer</th>
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
                        <td><?php echo $value['custName']; ?></td>
                        <td><?php echo $value['body']; ?></td>
                        <td><a href="?rid=<?php echo $value['reviewId']; ?>" class="btn btn-link" >Remove</a></td>
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