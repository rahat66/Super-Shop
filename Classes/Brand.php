<?php
$filepath=realpath(dirname(__FILE__));
//echo $filepath;
include_once($filepath.'/../Classes/Config.php');
//include('../Classes/Config.php');
?>

<?php
    class Brand{
        
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
        
        public function addBrand($bname){
             
            $brandname =  mysqli_real_escape_string($this -> conn, $bname);
            
            $this -> sql = "SELECT brandName FROM brand WHERE brandName = '$brandname'; ";
            $this -> res = mysqli_query($this -> conn, $this -> sql);
            if($this -> res -> num_rows > 0){
                return "all ready exist!!";
            }else{
                
            $this -> sql = "INSERT INTO `brand` (`brandId`, `brandName`) VALUES (NULL, '$brandname');";
            $this -> res = mysqli_query($this -> conn, $this -> sql);
//            return $this -> res;   
            if($this -> res){
                return "Success!!";
            }else{
                return "Failed!!";
            }
            }
            
            
 
        }
        
        public function getAllBrand(){
            $this -> sql = "SELECT * FROM `brand` ORDER BY brandId DESC;";
            $this -> res = mysqli_query($this -> conn, $this -> sql);
            return $this -> res;
        }
        
        public function getBrandByID($bId){
            $this -> sql = "SELECT * FROM `brand` WHERE brandId = '$bId' ";
            $this -> res = mysqli_query($this -> conn, $this -> sql);
            return $this -> res;
        }
        
        public function delBrandById($id){
            
            $this -> sql = "SELECT product.* FROM product,brand WHERE brand.brandId=product.brandId AND brand.brandId = '$id';";
            $this -> res = mysqli_query($this -> conn, $this -> sql);
            if($this -> res -> num_rows > 0){
                  return "Failed!!";
            }else{
                $this -> sql = "DELETE FROM `brand` WHERE brandId = '$id';";
                $this -> res = mysqli_query($this -> conn, $this -> sql);
    //            return $this -> res;
                if($this -> res){
                    return "Success!!";
                }else{
                    return "Failed!!";
                }
            }
            

         }
        
        public function editBrand($bname, $bid){
            $this -> sql = "UPDATE `brand` SET `brandName` = '$bname' WHERE `brand`.`brandId` = '$bid' ;";
            $this -> res = mysqli_query($this -> conn, $this -> sql);
    //            return $this -> res;
                if($this -> res){
                    return "Success!!";
                }else{
                    return "Failed!!";
                }
        }
        
        public function totalNumOfBrand(){
            $this -> sql = "SELECT COUNT(brandId) AS 'totalbrand' FROM brand;";
            $this -> res = mysqli_query($this -> conn, $this -> sql);
            if($this -> res){
                $tbrnd = $this -> res -> fetch_assoc();
                $rs    = $tbrnd['totalbrand'];
                return $rs;
            }else{
                return "error!";
            }
            
        }
        
    }
?>