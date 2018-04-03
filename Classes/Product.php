<?php
$filepath=realpath(dirname(__FILE__));
include_once($filepath.'/../Classes/Config.php');
//include('../Classes/Config.php');
//define("DB_HOST", "localhost");
//define("DB_USER", "root");
//define("DB_PASS", "");
//define("DB_NAME", "product_db");
?>

<?php
    class Product{
        
     public $uhost = DB_HOST;
     public $uuser = DB_USER;
     public $upass = DB_PASS;
     public $udb   = DB_NAME;

        
     private $conn;
     private $sql;
     private $res;
        
    function __construct(){
            $this -> conn = mysqli_connect($this -> uhost, $this -> uuser, $this -> upass, $this -> udb);
        }
    
    public function createProduct($data, $file){
        
        $productName = $data['productName']; 
        $catId       = $data['catId']; 
        $brandId     = $data['brandId']; 
        $body        = $data['body']; 
        $price       = $data['price'];  
        $type        = $data['type'];
            
            
            $permited  = array('jpg', 'jpeg', 'png', 'gif');
            $file_name = $file['image']['name'];
            $file_size = $file['image']['size'];
            $file_temp = $file['image']['tmp_name'];

            $div      = explode('.', $file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
            $uploaded_image = "uploads/".$unique_image;

            if($productName=="" || $catId==""|| $body=="" || $price=="" || $type==""){
                        $msg="failed!";
                        return $msg; 
            }else {
                            move_uploaded_file($file_temp, $uploaded_image);
            $this -> sql = "INSERT INTO `product` (`productId`, `productName`, `catId`, `brandId`, `body`, `price`, `image`, `type`) VALUES ('NULL', '$productName', '$catId', '$brandId', '$body', '$price', '$uploaded_image', '$type');";
            
                   $this -> res = mysqli_query($this -> conn, $this -> sql);;
                    return $this -> res;
            }
        
    }
        
    public function getAllProduct(){
        
            $this -> sql = "SELECT productId, productName, category.catName, brand.brandName, body, image, price, type FROM product, category, brand WHERE product.catId = category.catId AND product.brandId = brand.brandId;";
            $this -> res = mysqli_query($this -> conn, $this -> sql);
            return $this -> res;
        }
        
    public function getProductByID($proId){
            $this -> sql = "SELECT productId, productName, category.catName, brand.brandName, body, image, price, type FROM product, category, brand WHERE product.catId = category.catId AND product.brandId = brand.brandId AND product.productId='$proId';";
            $this -> res = mysqli_query($this -> conn, $this -> sql);
            return $this -> res;  
    }
        
   public function updateProduct($data, $file, $id){
        $productName = $data['productName']; 
        $catId       = $data['catId']; 
        $brandId     = $data['brandId']; 
        $body        = $data['body']; 
        $price       = $data['price'];  
        $type        = $data['type'];
        $imgPath     = $data['imgpth'];
            
            
            $permited  = array('jpg', 'jpeg', 'png', 'gif');
            $file_name = $file['image']['name'];
            $file_size = $file['image']['size'];
            $file_temp = $file['image']['tmp_name'];

            $div      = explode('.', $file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
            $uploaded_image = "uploads/".$unique_image;

            if(!empty($file_name)){
                unlink($imgPath);
                move_uploaded_file($file_temp, $uploaded_image);
            $this -> sql = "UPDATE `product` SET `productName` = '$productName', `catId` = '$catId', `brandId` = '$brandId', `body` = '$body', `price` = '$price', `image` = '$uploaded_image', `type` = '$type' WHERE `product`.`productId` = '$id' ;";
            
                   $this -> res = mysqli_query($this -> conn, $this -> sql);;
                    return $this -> res;
                        
            }else {
                
            $this -> sql = "UPDATE `product` SET `productName` = '$productName', `catId` = '$catId', `brandId` = '$brandId', `body` = '$body', `price` = '$price', `type` = '$type' WHERE `product`.`productId` = '$id' ;";
            
                   $this -> res = mysqli_query($this -> conn, $this -> sql);;
                    return $this -> res;
            }
        
   }
    
    public function totalNumOfProduct(){
        $this -> sql = "SELECT COUNT(productId) AS 'totalpro' FROM product;";
        $this -> res = mysqli_query($this -> conn, $this -> sql);
        if($this -> res){
            $tpro = $this -> res -> fetch_assoc();
            $res   = $tpro['totalpro'];
            return $res;
        }else{
            return "error!";
        }
    }
        
    public function deleteProductByID($delId){
        $this -> sql = "SELECT image FROM `product` WHERE productId = '$delId';";
        $this -> res = $this -> res = mysqli_query($this -> conn, $this -> sql);
        $tmp = $this -> res -> fetch_assoc();
        $upimg = $tmp['image'];
        if(isset($upimg)){
            unlink($upimg);
        }
        
        $this -> sql = "DELETE FROM `s_shop`.`product` WHERE `product`.`productId` = '$delId'";
        $this -> res = mysqli_query($this -> conn, $this -> sql);;
        return $this -> res;

    }
        
    } 
?>