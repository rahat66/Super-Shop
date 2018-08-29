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
            $this -> sql = "SELECT * FROM customerorder WHERE custId = '$cid' ORDER BY orderId DESC;";
            $this -> res = mysqli_query($this -> conn, $this -> sql);
                return $this -> res;
        }
        
        public function getTotalProcessingOrder(){
            $this -> sql = "SELECT COUNT(orderId) AS 'totalP' FROM customerorder WHERE orderStatus = '0';";
            $this -> res = mysqli_query($this -> conn, $this -> sql);
            $ts = $this -> res -> fetch_assoc();
            return $ts['totalP'];
        }
        
        public function getTotalCompleteOrder(){
            $this -> sql = "SELECT COUNT(orderId) AS 'totalC' FROM customerorder WHERE orderStatus = '1' ;";
            $this -> res = mysqli_query($this -> conn, $this -> sql);
            $ts = $this -> res -> fetch_assoc();
            return $ts['totalC'];
        }
        
        public function getProcessingOrder(){
            $this -> sql = "SELECT customerorder.*, customer.custName FROM customerorder,customer WHERE customerorder.custId = customer.custId AND customerorder.orderStatus = '0' ;";
            $this -> res = mysqli_query($this -> conn, $this -> sql);
                return $this -> res;
        }
        
        public function getCompletedOrder(){
            $this -> sql = "SELECT customerorder.*, customer.custName FROM customerorder,customer WHERE customerorder.custId = customer.custId AND customerorder.orderStatus = '1' ;";
            $this -> res = mysqli_query($this -> conn, $this -> sql);
                return $this -> res;
        }
        
        public function setCompletedOrder($oid){
            $this -> sql = "UPDATE `customerorder` SET `orderStatus` = '1' WHERE `customerorder`.`orderId` = '$oid' ;";
            $this -> res = mysqli_query($this -> conn, $this -> sql);
                return $this -> res;
        }
        
        public function getOrderDetailsByID($id){
            $this -> sql = "SELECT product.productName, product.image, product.price, orderedproduct.qtn FROM orderedproduct,product WHERE orderedproduct.productId = product.productId AND orderedproduct.orderId = '$id' ;";
            $this -> res = mysqli_query($this -> conn, $this -> sql);
                return $this -> res;
        }
        
        public function getCustDetailsByOid($oid){
            $this -> sql = "SELECT customer.custName, customer.number, customer.division, customer.district, customer.address, customerorder.orderDate FROM customerorder, customer WHERE customerorder.custId = customer.custId AND customerorder.orderId = '$oid' ";
            $this -> res = mysqli_query($this -> conn, $this -> sql);
                return $this -> res;
        }

        
    }
    ?>