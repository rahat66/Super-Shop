<?php
include_once('Library/header.php');
?>

<!--    ******************Body***********************-->
      <div class="container">
          <div class="body_part">
              <div class="row">
                  <div class="col-md-4 col-sm-12 col-xs-12">
                    <div class="login_form">
                    <h2>LOGIN</h2>
                    <form action="" method="post">
                        <input class="lg_input_field" type="text" placeholder="user name" name="userEmail"/><br/>
                        <input class="lg_input_field" type="password" placeholder="userPass" name="userPass"/><br/>
                        <input class="btn btn-sm btn-success" type="submit" value="Login"/>
                    </form>
                    </div>
                  </div>
                  
                <div class="col-md-offset-2 col-md-6 col-sm-12 col-xs-12">
                <div class="register_form">
                    <h2>REGISTER NOW </h2>
                    <form action="" method="post">
                        <label class="input_label">Full Name:</label>
                        <input class="r_input_field" type="text" placeholder="Enter name" name="u_name" /><br/>
                        <label class="input_label">Email Address:</label>
                        <input class="r_input_field" type="email" placeholder="Enter email" name="u_email" /><br/>
                        <label class="input_label">Mobile No:</label>
                        <input class="r_input_field" type="" placeholder="Enter mobile number" name="u_num" /><br/>
                        <label class="input_label">Password:</label>
                        <input class="r_input_field" type="password" placeholder="password" name="u_pass" /><br/>
                        <label class="input_label">Division</label>
                        <input class="r_input_field" type="text" placeholder="Enter Division" name="divi" />
                        <label class="input_label">District</label>
                        <input class="r_input_field" type="text" placeholder="Enter District" name="dist" />
                        <label class="input_label">Address</label>
                        <input class="r_input_field" type="text" placeholder="Enter Address" name="address" />
                        <label class="input_label">Gender:</label>
                        <input type="radio" placeholder="" value="male" name="gender" />Male
                        <input type="radio" placeholder="" value="female" name="gender" />Female<br/>
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