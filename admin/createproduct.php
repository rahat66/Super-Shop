<?php
include('Library/header.php');
$filepath=realpath(dirname(__FILE__));
//echo $filepath;
include_once($filepath.'/../Classes/Category.php');
include_once($filepath.'/../Classes/Brand.php');
include_once($filepath.'/../Classes/Product.php');

      $pd=new Product();
      if($_SERVER['REQUEST_METHOD']=='POST'){

         $insertProduct=$pd->createProduct($_POST,$_FILES);
    }
?>

    <div class="container">
        <div style="margin-top:30px;" class="row">
            <div class="col-md-offset-3 col-md-6">
                <div class="panel panel-primary ">
                    <div class="panel-heading">
                        <h3 class="panel-title">CREATE PRODUCT<span style="color:red;" ><?php
                            if(isset($insertProduct)){
                                echo "success!!";
                            }
                            ?></span><span style="float:right;"><a class="panel-title" href="showproduct.php">Back</a></span></h3>
                    </div>
                    <div class="panel-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Name</label>
                            <input class="form-control" type="text" placeholder="enter name" name="productName" required />
                        </div>
                        <div class="form-group">
                            <label>Category</label>
                            <select class="form-control" id="select" name="catId">
                            <option>Selete Category</option>
                            <?php
                                $cat = new Category();
                                $getCat=$cat->getAllCategory();
                                if($getCat){
                                    while($result=$getCat->fetch_assoc()){    
                            ?>
                            <option value="<?php echo $result['catId'];?>"><?php echo $result['catName'];?></option>
                            <?php }} ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Brand</label>
                            <select class="form-control" id="select" name="brandId">
                            <option>Selete Brand</option>
                            <?php
                                $brand    = new Brand();
                                $getBrand = $brand -> getAllBrand();
                                if($getBrand){
                                    while($result = $getBrand -> fetch_assoc()){    
                            ?>
                            <option value="<?php echo $result['brandId'];?>"><?php echo $result['brandName'];?></option>
                            <?php }}?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" name="body"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Price</label>
                            <input type="text" placeholder="Enter Price..." class="form-control" name="price" />
                        </div>
                        <div class="form-group">
                            <label>Upload Image</label>
                             <input class="form-control" type="file" name="image" />
                        </div>
                        <div class="form-group">
                            <label>Product Type</label>
                            <select class="form-control" id="select" name="type">
                            <option>Select Type</option>
                            <option value="0">Featured</option>
                            <option value="1">Non-Featured</option>
                            </select>
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