<?php
include_once('Library/header.php');
if(!isset($_SESSION['custId'])){
    echo "<script type='text/javascript'>  window.location='login.php'; </script>";
    exit();
}
include('Classes/Customer.php');
    $customer = new Customer();

if(isset( $_SESSION['custId'])){
     $cId =  $_SESSION['custId'];
}
if(isset($_POST['newPass'])){
    $pass = $_POST['newPass'];
    $cp = $customer -> changePassword($pass, $cId);
}



?>
<div class="container">
    <div class="col-md-offset-4 col-md-4">
            <div class="login_form">
                <h2>Change Password</h2>
                    <form action="" method="post">
                        <input class="lg_input_field" type="password" placeholder="Enter new password" name="newPass" required /><br/>
                        <input class="btn btn-sm btn-success" type="submit" value="Submit"/>
                    </form>
            </div>
    </div>
</div>
<?php
include_once('Library/footer.php');
?>