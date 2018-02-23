<?php
include('Library/header.php');
$filepath=realpath(dirname(__FILE__));
//echo $filepath;
include_once($filepath.'/../Classes/Category.php');
    $cat    = new Category();

    if(isset($_GET['delcat'])){
        
        $id     = $_GET['delcat'];
//        echo $id;
        $delcat = $cat -> delCatById($id);
    }

    $result = $cat -> getAllCategory();
//    echo '<pre>';
//    print_r($result);
//    echo '</pre>';

?>
<?php
include('Library/sidebar.php');
?>

<div class="col-md-9 col-sm-12 col-xs-12">
    <div class="row">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Category List <span style="color:red;"><?php
                    if(isset($delcat)){
                        echo $delcat;
                    }
                    ?></span><span style="float:right;"><a class="panel-title" href="createcategory.php">Create Category >></a></span></h3>
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
                                if($result){
                                    $i = 0;
                                    while($value = $result -> fetch_assoc()){
                                        $i++;

                            ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $value['catName'];?></td>
                                <td><a class="btn-link" href="#" >Edit</a> || <a class="btn-link" href="?delcat=<?php echo $value['catId'];?>">Delete</a></td>
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