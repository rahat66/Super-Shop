<?php
include_once('Library/header.php');
include('Classes/Cart.php');
$ct = new Cart();

if(isset($_POST['cart_id'])){
    
    $cart_id  = $_POST['cart_id'];
    $delCart  = $ct -> deleteFromCart($cart_id);
    }

if(isset($_POST['cartUp'])){
    
    $cart_id  = $_POST['cartUp'];
    $quentity = $_POST['qtn'];
    $updateCart  = $ct -> updateCart($cart_id, $quentity);
        
    }
?>
<!--    ******************Body***********************-->
      <div class="container">
          <div class="body_part">
          <div class="row">
              <h2 class="panel-title">Your Cart</h2>
                <div class="table-responsive">
                <table class="table table-bordered  table-condensed">
                    <thead>
                        <th style="widht:5%;">SL</th>
                        <th style="widht:15%;">Product Name</th>
                        <th style="widht:15%;">Image</th>
                        <th style="widht:5%;">Price</th>
                        <th style="widht:15%;">Qantity</th>
                        <th style="widht:10%;">Total Price</th>
                        <th style="widht:5%;">Action</th>
                    </thead>
        <?php 
             $getCart = $ct -> getCart();
             $total  = 0;
//            echo "<pre>";
//            print_r($getCart);
//            echo "</pre>";
            if($getCart){
                $i = 0;
               
                while($result = $getCart -> fetch_assoc()){
                   $i++; 

        ?>
        <tbody>
            
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $result['productName']; ?></td>
                <td><img class="img-responsive" src="admin/<?php echo $result['image']; ?>" width="30px" height="35px" /></td>
                <td>$<?php echo $result['price']; ?></td>
                <td>
                    <form action="" method="post">
                         <input type="hidden" value="<?php echo $result['cartId']; ?>" name="cartUp" readonly />
                         <input class="input-sm" type="number" value="<?php echo $result['qtn']; ?>" name="qtn" id="cartNum" onkeypress="updateValue(this.value)" />
                         <input class="btn-sm btn-primary" type="submit" value="Update" onclick="updateCart()" />
                    </form>
                </td>
                <td>$<?php echo $result['price'] * $result['qtn']; ?></td>
                <td>
                    <form action="" method="post" >
                        <input type="hidden" value="<?php echo $result['cartId']; ?>" name="cart_id" readonly />
                        <input class="btn btn-danger" type="submit" value="X" />
                    </form>
                </td>
            </tr>
            
        </tbody>
                <?php $total += $result['price'] * $result['qtn']; }} ?>
        <tfoot>
            <td colspan="7"><p style="float:right;" >Total : $<?php echo $total;  ?></p></td>
        </tfoot>

    </table>
              </div>
          </div>
              
          <div class="row">
            <div class="col-md-offset-6 col-md-3">
                <a href="index.php" class="btn btn-lg btn-info">Continue Shopping</a>
            </div>
            <div class="col-md-3">
                <a href="shipping.php" class="btn btn-lg btn-info">Check Out</a>
            </div>
          </div>
          </div>
      </div>
<?php
include_once('Library/footer.php');
?>