<?php
$filepath=realpath(dirname(__FILE__));
//echo $filepath;
include_once($filepath.'/../Classes/Config.php');
//include('../Classes/Config.php');
?>

<?php
    class Prodcutreview {
        
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
        
        
     public function insertReviw($proId, $custID, $body){
        $body = mysqli_real_escape_string($this -> conn, $body) ; 
        
        $this -> sql = "INSERT INTO `productreview` (`reviewId`, `productId`, `custId`, `body`, `date`) VALUES (NULL, '$proId', '$custID', '$body', CURRENT_DATE());";
        $this -> res = mysqli_query($this -> conn, $this -> sql);
            return $this -> res; 
      }
        
    public function getReviewByProId($proId){
        $this -> sql = "SELECT productreview.*, customer.custName FROM productreview, customer  WHERE productreview.custId = customer.custId AND productreview.productId = '$proId';";
        $this -> res = mysqli_query($this -> conn, $this -> sql);
            return $this -> res;
    }
    
    public function getTotalReviewByCust($cid){
            $this -> sql = "SELECT COUNT(reviewId) AS 'totalreview' FROM productreview WHERE custId = '$cid' ;";
            $this -> res = mysqli_query($this -> conn, $this -> sql);
            $ts = $this -> res -> fetch_assoc();
                return $ts['totalreview'];
    }
        
    public function getReviewByCust($cid){
        $this -> sql = "SELECT productreview.*, product.productName FROM productreview, product WHERE productreview.productId = product.productId AND productreview.custId = '$cid' ;";
        $this -> res = mysqli_query($this -> conn, $this -> sql);
            return $this -> res;
    }
        
    }
?>