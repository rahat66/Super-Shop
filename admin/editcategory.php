<?php
include('Library/header.php');
$filepath=realpath(dirname(__FILE__));
//echo $filepath;
include_once($filepath.'/../Classes/Category.php');
    
    $cat = new Category();
    
    if(isset($_GET['editcat'])){
        $catId = $_GET['editcat'];
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        $catName = $_POST['catName'];
        //echo $catName;

        
        $result = $cat -> updateCat($catName, $catId);
    }
    
    $getCat = $cat -> getCatByID($catId);

?>
    <div class="container">
        <div style="margin-top:30px;" class="row">
            <div class="col-md-offset-4 col-md-4">
                <div class="panel panel-primary ">
                    <div class="panel-heading">
                        <h3 class="panel-title">UPDATE CATEGORY<span style="color:red;" ><?php
                            if(isset($result)){
                                echo $result;
                            }
                            ?></span><span style="float:right;"><a class="panel-title" href="showcategory.php">Back</a></span></h3>
                    </div>
                    <div class="panel-body">
                    <?php
                        if(isset($getCat)){
                            $value = $getCat -> fetch_assoc();    
                    ?>
                    <form action="" method="post">
                        <div class="form-group">
                            <label>Name</label>
                            <input class="form-control" type="text" placeholder="enter name" value="<?php echo $value['catName']; ?>" name="catName" required />
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