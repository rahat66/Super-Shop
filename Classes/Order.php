<?php
$filepath=realpath(dirname(__FILE__));
//echo $filepath;
include_once($filepath.'/../Classes/Config.php');
//include('../Classes/Config.php');
?>

<?php
    class Order{
        
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
        
        public function insertUserOrder($uId, $tt){
            $uId = $uId;
            $this -> sql = "INSERT INTO `customerorder` (`orderId`, `custId`, `orderStatus`, `amount`, `orderDate`) VALUES (NULL, '$uId', '', '$tt', CURRENT_DATE());";
            $this -> res = mysqli_query($this -> conn, $this -> sql);
                return $this -> res;
        }
        
        public function getLastoId(){
            $this -> sql = "SELECT MAX(orderId) AS 'oid' FROM `customerorder`;";
            $this -> res = mysqli_query($this -> conn, $this -> sql);
               // return $rs;
    //        echo "<pre>";
    //        print_r($rs);
    //        var_dump($rs);
    //        echo "</pre>";
            $ts = $this -> res -> fetch_assoc();
            return $ts['oid'];
            }
        
        public function insertOrderedProduct($oId,$proId,$q){
            
            $this -> sql = "INSERT INTO `orderedproduct` (`orderId`, `productId`, `qtn`) VALUES ('$oId', '$proId', '$q')";
            $this -> res = mysqli_query($this -> conn, $this -> sql);
                return $this -> res;

        }
        
        public function getTotalOrderByCust($id){
            $this -> sql = "SELECT COUNT(orderId) AS 'totalorder' FROM customerorder WHERE custId = '$id' ;";
            $this -> res = mysqli_query($this -> conn, $this -> sql);
            $ts = $this -> res -> fetch_assoc();
                return $ts['totalorder'];
        }
        
        public function getOrderByCust($cid){
            $this -> sql = "SELECT * FROM customerorder WHERE custId = '$cid' ;";
            $this -> res = mysqli_query($this -> conn, $this -> sql);
                return $this -> res;
        }

        
    }
    ?>