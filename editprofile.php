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

    $getProfile = $customer -> getUserById($cId);

    if(isset($_POST['u_name'])){
        $custName = $_POST['u_name'];
        $custNum   = $_POST['u_num'];
        $custDiv   = $_POST['divi'];
        $custDist  = $_POST['dist'];
        $custAdd   = $_POST['address'];
        
        $updateCust = $customer -> updateCust($cId, $custName, $custNum, $custDiv, $custDist, $custAdd);
    }

?>

<div class="container">
    <div class="row">
        <div class="col-md-offset-2 col-md-8">
                <div class="register_form">
                    
                    <h2>UPDATE PROFILE </h2>
                    <form action="" method="post">
                        <?php
                            if(isset($getProfile)){
                                $value = $getProfile -> fetch_assoc();
                        ?>
                        <label class="input_label">Full Name:</label>
                        <input class="r_input_field" type="text" value="<?php echo $value['custName']; ?>" name="u_name" required /><br/>
                        <label class="input_label">Mobile No:</label>
                        <input class="r_input_field" type="" value="<?php echo $value['number']; ?>" name="u_num" required /><br/>
                        <label class="input_label">Division</label>
                        <input class="r_input_field" type="text" value="<?php echo $value['division']; ?>" name="divi" required />
                        <label class="input_label">District</label>
                        <input class="r_input_field" type="text" value="<?php echo $value['district']; ?>" name="dist" required />
                        <label class="input_label">Address</label>
                        <input class="r_input_field" type="text" value="<?php echo $value['address']; ?>" name="address" required />
                        <input type="submit" value="Submit" class="btn btn-success" />
                        <?php } ?>
                    </form>
                </div>
        </div>
    </div>
</div>

<?php
include_once('Library/footer.php');
?>