<?php
include('Library/header.php');
$filepath=realpath(dirname(__FILE__));
//echo $filepath;
include_once($filepath.'/../Classes/Brand.php');
    
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        $brandName = $_POST['brandName'];
        //echo $catName;
        $brand = new Brand();
        
        $result = $brand -> addBrand($brandName);
    }

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
                    <form action="createbrand.php" method="post">
                        <div class="form-group">
                            <label>Name</label>
                            <input class="form-control" type="text" placeholder="enter name" name="brandName" required />
                        </div>
                        <button class="btn btn-success">Submit</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
include('Library/footer.php');
?>