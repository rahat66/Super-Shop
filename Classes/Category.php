<?php
$filepath=realpath(dirname(__FILE__));
//echo $filepath;
include_once($filepath.'/../Classes/Config.php');
//include('../Classes/Config.php');
?>

<?php
    class Category{
        
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
        
        public function addCategory($catname){
            
            $catname = mysqli_real_escape_string($this -> conn, $bname);
            
            $this -> sql = "SELECT catName FROM category WHERE catName = '$catname'; ";
            $this -> res = mysqli_query($this -> conn, $this -> sql);
            if($this -> res -> num_rows > 0){
                return "all ready exist!!";
            }else{
                 

            $this -> sql = "INSERT INTO `category` (`catId`, `catName`) VALUES (NULL, '$catname');";
            $this -> res = mysqli_query($this -> conn, $this -> sql);
//            return $this -> res;
            if($this -> res){
                return "Success!!";
            }else{
                return "Failed!!";
            }
                
            }

 
        }
        
        public function getAllCategory(){
            $this -> sql = "SELECT * FROM `category` ORDER BY catId DESC;";
            $this -> res = mysqli_query($this -> conn, $this -> sql);
            return $this -> res;
 
        }
        
        public function getCatByID($catId){
           $this -> sql = "SELECT * FROM `category` WHERE catId = '$catId';";
            $this -> res = mysqli_query($this -> conn, $this -> sql);
            return $this -> res; 
        }
        
         public function delCatById($id){
            
             $this -> sql = "SELECT product.* FROM product,category WHERE category.catId=product.catId AND category.catId = '$id';";
            $this -> res = mysqli_query($this -> conn, $this -> sql);
            if($this -> res -> num_rows > 0){
                  return "Failed!!";
            }else{
                
                $this -> sql = "DELETE FROM `category` WHERE catId = '$id';";
                $this -> res = mysqli_query($this -> conn, $this -> sql);
    //            return $this -> res;
                if($this -> res){
                    return "Success!!";
                }else{
                    return "Failed!!";
                }
            }
             
            
         }
        
        public function updateCat($catName, $catId){
            $this -> sql = "UPDATE `category` SET `catName` = '$catName' WHERE `category`.`catId` = '$catId' ;";
            $this -> res = mysqli_query($this -> conn, $this -> sql);
    //            return $this -> res;
                if($this -> res){
                    return "Success!!";
                }else{
                    return "Failed!!";
                }
        }
        
        public function totalNumOfCategory(){
            $this -> sql = "SELECT COUNT(catId) as totalCat FROM category;";
            $this -> res = mysqli_query($this -> conn, $this -> sql);
            if($this -> res){
                
                $tcat = $this -> res -> fetch_assoc();
                $rs    = $tcat['totalCat'];
                return $rs;
            }else{
                return "error!";
            }
        }
        
    }
?>