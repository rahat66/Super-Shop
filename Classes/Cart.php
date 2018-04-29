<?php
ob_start();
$filepath=realpath(dirname(__FILE__));
include_once($filepath.'/../Classes/Config.php');
?>
<?php
class Cart {
        
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
    public function addToCart($quentity, $proid){
        $sid = session_id();
        $searchP = "SELECT * FROM `cart` WHERE productId='$proid' AND sId='$sid'";
        $getSP = mysqli_query($this -> conn, $searchP);
        if($getSP -> num_rows > 0){
                $result       = $getSP -> fetch_assoc();
                $Qty          = $result['qtn'];
                $exitQuentity = $quentity + $Qty;
                $UpdateSql    = "UPDATE `cart` SET `qtn` = '$exitQuentity' WHERE `cart`.`productId` = '$proid' AND `cart`.`sId` = '$sid';";
                 $this -> res = mysqli_query($this -> conn, $UpdateSql);
                if( $this -> res){ 
                    echo "<script type='text/javascript'>  window.location='cart.php'; </script>";
                    exit();
                }else{
                    echo "<script type='text/javascript'>  window.location='404.php'; </script>";
                    exit();
                }
                
            }else{
            $this -> sql = "INSERT INTO `cart` (`cartId`, `sId`, `productId`, `qtn`) VALUES (NULL, '$sid', '$proid', '$quentity')";
            $this -> res = mysqli_query($this -> conn, $this -> sql);
            if( $this -> res){ 
                    echo "<script type='text/javascript'>  window.location='cart.php'; </script>";
                    exit();
                }else{
                    echo "<script type='text/javascript'>  window.location='404.php'; </script>";
                    exit();
                }
        }
    }
    
    public function getCart(){
        $sid = session_id();
        $this -> sql = "SELECT cart.*, product.productName, product.price, product.image FROM cart, product WHERE cart.productId = product.productId AND cart.sId = '$sid' ;";
        $this -> res = mysqli_query($this -> conn, $this -> sql);
        return $this -> res;
    }
    
    public function updateCart($cart_id, $quentity){
        
            $this -> sql    = "UPDATE `cart` SET `qtn` = '$quentity' WHERE `cart`.`cartId` = $cart_id ";
            $this -> res = mysqli_query($this -> conn, $this -> sql);
            if($this -> res){
                return "Success!";
            }else{
                return "Failed!!!";
            }
    }
    
    public function deleteFromCart($cart_id){
            
            $this -> sql = "DELETE FROM `cart` WHERE `cart`.`cartId` =$cart_id";
            $this -> res = mysqli_query($this -> conn, $this -> sql);
            if($this -> res){
                return "Success!";
            }else{
                return "Failed!!!";
            
            }
    }
    
    public function deleteCartBysId(){
            $sId = session_id();
            $this -> sql     = "DELETE FROM `cart` WHERE `cart`.`sId` ='$sId'";
            $this -> res = mysqli_query($this -> conn, $this -> sql);
                return $this -> res;
        
    }
    
    public function getTotalItem(){
        $sId = session_id();
        $this -> sql = "SELECT COUNT(cartId) AS cnt FROM cart  WHERE sId='$sId'";
        $this -> res = mysqli_query($this -> conn, $this -> sql);
            return $this -> res;
    }
    
    public function getTotalPrice(){
        $sId = session_id();
        $this -> sql = "SELECT SUM(product.price*cart.qtn) AS ttl FROM cart,product WHERE cart.productId = product.productId AND sId='$sId' ";
        $this -> res = mysqli_query($this -> conn, $this -> sql);
            return $this -> res;
    }
    
}
ob_end_flush();
?>