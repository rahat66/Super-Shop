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
    <div class="row">
        <h2>Add New Product</h2>
        <div class="table-responsive">
            <?php
            if(isset($insertProduct)){
                echo $insertProduct;
            }
            ?>

         <form action="" method="post" enctype="multipart/form-data">
            <table class="table-bordered">
               
                <tr>
                    <td>
                        <label>Name</label>
                    </td>
                    <td>
                        <input  type="text" placeholder="Enter Product Name..." class="form-control" name="productName" />
                    </td>
                </tr>
                
				<tr>
                    <td>
                        <label>Category</label>
                    </td>
                    <td>
                        <select class="form-control" id="select" name="catId">
                        <option>Select Category</option> 
                        <?php
                                $cat = new Category();
                                $getCat=$cat->getAllCategory();
                                if($getCat){
                                    while($result=$getCat->fetch_assoc()){    
                            ?>
                            <option value="<?php echo $result['catId'];?>"><?php echo $result['catName'];?></option>
                            <?php }} ?>
                            
                        </select>
                    </td>
                </tr>
                
                
<!--
				<tr>
                    <td>
                        <label>Brand</label>
                    </td>
                    <td>
                        <select class="form-control" id="select" name="select">
                            <option>Select Brand</option>
                            <option value="1">Brand One</option>
                            <option value="2">Brand Two</option>
                            <option value="3">Brand Three</option>
                        </select>
                    </td>
                </tr>
-->
				
				 <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Description</label>
                    </td>
                    <td>
                        <textarea class="form-control" name="body"></textarea>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Price</label>
                    </td>
                    <td>
                        <input type="text" placeholder="Enter Price..." class="form-control" name="price" />
                    </td>
                </tr>
            
                <tr>
                    <td>
                        <label>Upload Image</label>
                    </td>
                    <td>
                        <input class="form-control" type="file" name="image" />
                    </td>
                </tr>
				
				<tr>
                    <td>
                        <label>Product Type</label>
                    </td>
                    <td>
                        <select class="form-control" id="select" name="type">
                            <option>Select Type</option>
                            <option value="0">Featured</option>
                            <option value="1">Non-Featured</option>
                        </select>
                    </td>
                </tr>

				<tr>
                    <td></td>
                    <td>
                        <input class="btn btn-success" type="submit" name="submit" Value="Save" />
                    </td>
                </tr>
            </table>
            </form>

        </div>
    </div>
</div>

<?php
include('Library/footer.php');
?>