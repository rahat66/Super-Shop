<?php
ob_start();
$filepath=realpath(dirname(__FILE__));
//echo $filepath;
include_once($filepath.'/../Classes/Config.php');
//include('../Classes/Config.php');
?>
<?php
    class Customer{
        
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
        
        
        public function addCustomer($name, $email, $pass, $num, $divi, $dist, $add){
            
            $name = mysqli_real_escape_string($this -> conn, $name); 
            $divi = mysqli_real_escape_string($this -> conn, $divi); 
            $dist = mysqli_real_escape_string($this -> conn, $dist); 
            $add  = mysqli_real_escape_string($this -> conn, $add);
                
            $this -> sql = "INSERT INTO `customer` (`custId`, `custName`, `custEmail`, `custPass`, `number`, `division`, `district`, `address`) VALUES (NULL, '$name', '$email', '$pass', '$num', '$divi', '$dist', '$add');";
            $this -> res = mysqli_query($this -> conn, $this -> sql);
                if($this -> res){
                    return "Success!!";
                }else{
                    return "Failed!!";
                } 
        }
        
        public function customerLogIn($uname, $upass){
            $this -> sql = "SELECT * FROM `customer` WHERE custEmail = '$uname' AND custPass = '$upass';";
            $this -> res = mysqli_query($this -> conn, $this -> sql);
            if($this -> res -> num_rows > 0){
                $value = $this -> res -> fetch_assoc();
                $_SESSION['custId'] = $value['custId'];
                $_SESSION['custName'] = $value['custName'];
                echo "<script type='text/javascript'>  window.location='cart.php'; </script>";
                exit();
            }else{
                return "Email or password not match!";
            }
        }
        
        
        public function  getUserById($custID){
            $this -> sql = "SELECT * FROM `customer` WHERE custId = '$custID' ";
            $this -> res = mysqli_query($this -> conn, $this -> sql);
                return $this -> res;
        }
        
        public function getNumOfCustomer(){
            $this -> sql = "SELECT COUNT(custId) AS 'totlacust' FROM `customer`;";
            $this -> res = mysqli_query($this -> conn, $this -> sql);
            if($this -> res){
                $tbrnd = $this -> res -> fetch_assoc();
                $rs    = $tbrnd['totlacust'];
                return $rs;
            }else{
                return "error!";
            }
        }
        
        public function changePassword($pass, $id){
            $this -> sql = "UPDATE `customer` SET `custPass` = '$pass' WHERE `customer`.`custId` = '$id' ;";
            $this -> res = mysqli_query($this -> conn, $this -> sql);
                return $this -> res;
        }
        
        public function getAllCust(){
            $this -> sql = "SELECT * FROM customer ORDER BY custId DESC;";
            $this -> res = mysqli_query($this -> conn, $this -> sql);
                return $this -> res;
        }
        
        public function updateCust($cid, $name, $number, $divi, $dis, $add){
            $this -> sql = "UPDATE `customer` SET `custName` = '$name', `number` = '$number', `division` = '$divi', `district` = '$dis', `address` = '$add' WHERE `customer`.`custId` = '$cid' ;";
            $this -> res = mysqli_query($this -> conn, $this -> sql);
            if($this -> res){
                     echo "<script type='text/javascript'>  window.location='viewprofile.php'; </script>";
                     exit();
                }
        }
            
    }
ob_end_flush();
?>
