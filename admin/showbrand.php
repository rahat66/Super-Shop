<?php
include('Library/header.php');
$filepath=realpath(dirname(__FILE__));
//echo $filepath;
include_once($filepath.'/../Classes/Brand.php');

    $brand  = new Brand();
    if(isset($_GET['delbrand'])){
        $id  = $_GET['delbrand'];
//        echo $id;
        $del = $brand -> delBrandById($id); 
//        echo '<pre>';
//        print_r($del);
//        echo '</pre>';
    }
    $result = $brand -> getAllBrand();
?>
<?php
include('Library/sidebar.php');
?>

<div class="col-md-9 col-sm-12 col-xs-12">
    <div class="row">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Brand List <span style="color:red;"><?php
                    if(isset($del)){
                        echo $del;
                    }
                    ?></span><span style="float:right;"><a class="panel-title" href="createbrand.php">Create Brand >></a></span></h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <th>Sl. No.</th>
                            <th>Name</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            <?php
                            if(isset($result)){
                                $i = 0;
                                while($value = $result -> fetch_assoc()){
                                    $i++;
                            ?>
                            <tr>
                                <td><?php echo $i;?></td>
                                <td><?php echo $value['brandName'];?></td>
                                <td><a class="btn-link" href="editbrand.php?editbrand=<?php echo $value['brandId']; ?>" >Edit</a> || <a class="btn-link" href="?delbrand=<?php echo $value['brandId']; ?>">Delete</a></td>
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