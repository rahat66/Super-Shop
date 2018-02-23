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
            
            $this -> sql = "INSERT INTO `category` (`catId`, `catName`) VALUES (NULL, '$catname');";
            $this -> res = mysqli_query($this -> conn, $this -> sql);
            return $this -> res;
 
        }
        
        public function getAllCategory(){
            $this -> sql = "SELECT * FROM `category` ORDER BY catId DESC;";
            $this -> res = mysqli_query($this -> conn, $this -> sql);
            return $this -> res;
 
        }
        
    }
?>