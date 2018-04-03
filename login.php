<?php
include_once('Library/header.php');
include('Classes/Customer.php');
    $customer = new Customer();

    if(isset($_POST['u_name'])){
        $custName = $_POST['u_name'];
        $custEmail = $_POST['u_email'];
        $custNum   = $_POST['u_num'];
        $custPass  = $_POST['u_pass'];
        $custDiv   = $_POST['divi'];
        $custDist  = $_POST['dist'];
        $custAdd   = $_POST['address'];
        
        $addCust = $customer -> addCustomer($custName, $custEmail, $custPass, $custNum, $custDiv, $custDist, $custAdd);
    }
    
    if(isset($_POST['userEmail'])){
        $userEmail = $_POST['userEmail'];
        $userPass  = $_POST['userPass'];
        $custLog    = $customer -> customerLogIn($userEmail, $userPass);
    }

?>

<!--    ******************Body***********************-->
      <div class="container">
          <div class="body_part">
              <div class="row">
                  <?php
                  if(isset($addCust)){  
                  if($addCust == "Success!!" ){ ?>
                    <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><strong>Registrasion successfull!</strong> Now you can  login.
                  </div>
                <?php  }}
                  ?>
                  <div class="col-md-4 col-sm-12 col-xs-12">
                    <div class="login_form">
                    <h2>LOGIN</h2>
                    <form action="" method="post">
                        <input class="lg_input_field" type="text" placeholder="user name" name="userEmail" required/><br/>
                        <input class="lg_input_field" type="password" placeholder="userPass" name="userPass" required /><br/>
                        <input class="btn btn-sm btn-success" type="submit" value="Login"/>
                    </form>
                    <span><p>
                        <?php
                            if(isset($custLog))
                                echo $custLog;
                            ?>    
                        </p></span>
                    </div>
                  </div>
                  
                <div class="col-md-offset-2 col-md-6 col-sm-12 col-xs-12">
                <div class="register_form">
                <?php
                        
                ?>
                    <h2>REGISTER NOW </h2>
                    <form action="" method="post">
                        <label class="input_label">Full Name:</label>
                        <input class="r_input_field" type="text" placeholder="Enter name" name="u_name" required /><br/>
                        <label class="input_label">Email Address:</label>
                        <input class="r_input_field" type="email" placeholder="Enter email" name="u_email" required /><br/>
                        <label class="input_label">Mobile No:</label>
                        <input class="r_input_field" type="" placeholder="Enter mobile number" name="u_num" required /><br/>
                        <label class="input_label">Password:</label>
                        <input class="r_input_field" type="password" placeholder="password" name="u_pass" required /><br/>
                        <label class="input_label">Division</label>
                        <input class="r_input_field" type="text" placeholder="Enter Division" name="divi" required />
                        <label class="input_label">District</label>
                        <input class="r_input_field" type="text" placeholder="Enter District" name="dist" required />
                        <label class="input_label">Address</label>
                        <input class="r_input_field" type="text" placeholder="Enter Address" name="address" required />
                        <input type="submit" value="create" class="btn btn-success" />

                    </form>
                </div>
                </div>
                    
              </div>
          </div>
      </div>
<?php
include_once('Library/footer.php');
?>