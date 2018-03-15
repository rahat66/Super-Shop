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
        
            $this -> sql = "SELECT * FROM `product`; ";
            $this -> res = mysqli_query($this -> conn, $this -> sql);
            return $this -> res;
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
        
    } 
?>