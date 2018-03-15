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
        
        public function addBrand($brandname){
            
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
        
        public function delBrandById($id){
            $this -> sql = "DELETE FROM `brand` WHERE brandId = '$id';";
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