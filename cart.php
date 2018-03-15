<?php
include_once('Library/header.php');
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
                    
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>eqrewqrewqr</td>
                            <td><img class="img-responsive" src="img/pic3.jpg" width="30px" height="35px" /></td>
                            <td>$888</td>
                            <td>
                                <form action="" method="post">
                                     <input class="input-sm" type="number" value="1" name="qtn" id="cartNum"/>
                                     <input class="btn-sm btn-primary" type="submit" value="Update"/>
                                </form>
                            </td>
                            <td>$888</td>
                            <td>
                                <form action="" method="post" >
                                    <input class="btn btn-danger" type="submit" value="X" />
                                </form>
                            </td>
                        </tr>
                        
                        <tr>
                            <td>2</td>
                            <td>eqrewqrewqr</td>
                            <td><img class="img-responsive" src="img/pic3.jpg" width="30px" height="35px" /></td>
                            <td>$888</td>
                            <td>
                                <form action="" method="post">
                                     <input class="input-sm" type="number" value="1" name="qtn" id="cartNum"/>
                                     <input class="btn-sm btn-primary" type="submit" value="Update"/>
                                </form>
                            </td>
                            <td>$888</td>
                            <td>
                                <form action="" method="post" >
                                    <input class="btn btn-danger" type="submit" value="X" />
                                </form>
                            </td>
                        </tr>
            
                    </tbody>
                    
                    <tfoot>
                        <td colspan="7"><p style="float:right;" >Total :$888</p></td>
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