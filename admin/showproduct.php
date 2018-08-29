<?php
include('Library/header.php');
$filepath=realpath(dirname(__FILE__));
//echo $filepath;
include_once($filepath.'/../Classes/Product.php');
    $pd = new Product();
    if(isset($_GET['delpro_id'])){
        $proId  = $_GET['delpro_id'];
        $delpro = $pd -> deleteProductByID($proId);
    }
    $getPro = $pd -> getAllProduct();
//    echo '<pre>';
//    print_r($getPro);
//    echo'</pre>';
?>
<?php
include('Library/sidebar.php');
?>

<div class="col-md-9 col-sm-12 col-xs-12">
    <div class="row">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Product List<span style="float:right;"><a class="panel-title" href="createproduct.php">Create Product >></a></span></h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <th>Sl. No.</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Brand</th>
                            <th>Image</th>
                            <th>Price</th>
                            <th>Action</th>
                            
                        </thead>
                        <tbody>
                            <?php 
                            if(isset($getPro)){
                                $i = 0;
                                while($value = $getPro -> fetch_assoc()){
                                $i++;    
                            ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $value['productName'];?></td>
                                <td><?php echo $value['catName'];?></td>
                                <td><?php echo $value['brandName'];?></td>
                                <td><img src="<?php echo $value['image'];?>" height="40px" /></td>
                                <td>Tk. <?php echo $value['price'];?></td>
                                <td><a class="btn-link" href="editproduct.php?pro_id=<?php echo $value['productId'];?>">Edit</a> || <a class="btn-link" href="?delpro_id=<?php echo $value['productId'];?>">Delete</a></td>
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