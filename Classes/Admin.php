<?php
$filepath=realpath(dirname(__FILE__));
//echo $filepath;
include_once($filepath.'/../Classes/Config.php');
//include('../Classes/Config.php');
?>

<?php
    class Admin{
        
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
        
        public function adminLogin($uname, $upass){
            
            $this -> sql = "SELECT * FROM `admin` WHERE adminUser = '$uname' AND adminPass = '$upass'; ";
            $this -> res = mysqli_query($this -> conn, $this -> sql);
           // return $this -> res;
            if( $this -> res -> num_rows > 0){
                $value = $this -> res -> fetch_assoc();
                session_start();
                $_SESSION['adminlogin'] = true;
                $_SESSION['adminId']    = $value['adminId'];
                $_SESSION['adminName']  = $value['adminName'];
                header('Location:dashboard.php');
            }
            else{
                return "not match";
            }
        }
        

        
    }
?>