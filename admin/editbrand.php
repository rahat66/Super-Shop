<?php
include('Library/header.php');
$filepath=realpath(dirname(__FILE__));
//echo $filepath;
include_once($filepath.'/../Classes/Brand.php');
    $brand = new Brand();

    if(isset($_GET['editbrand'])){
        $bId = $_GET['editbrand'];
//        echo $bId;
        
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        $brandName = $_POST['brandName'];
//        echo $bId;

        
        $result = $brand -> editBrand($brandName, $bId);
    }
//    echo $bId;
    $getBnd = $brand -> getBrandByID($bId);
?>
    <div class="container">
        <div style="margin-top:30px;" class="row">
            <div class="col-md-offset-4 col-md-4">
                <div class="panel panel-primary ">
                    <div class="panel-heading">
                        <h3 class="panel-title">CREATE BRAND<span style="color:red;" ><?php
                            if(isset($result)){
                                echo $result;
                            }
                            ?></span><span style="float:right;"><a class="panel-title" href="showbrand.php">Back</a></span></h3>
                    </div>
                    <div class="panel-body">
                        <?php
                        if(isset($getBnd)){
                            $value = $getBnd -> fetch_assoc();
                        ?>
                    <form action="" method="post">
                        <div class="form-group">
                            <label>Name</label>
                            <input class="form-control" type="text" placeholder="enter name" value="<?php echo $value['brandName']; ?>" name="brandName" required />
                        </div>
                        <button class="btn btn-success">Submit</button>
                    </form>
                    <?php }?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
include('Library/footer.php');
?>