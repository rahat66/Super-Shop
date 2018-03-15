<?php
include_once('Library/header.php');
?>
<!--    ******************Body***********************-->
<div class="container">
    <div class="row">
        <div class="col-md-8 col-sm-12 col-xs-12">
        <div class="register_form">
            <h2>ADDRESS</h2>
            <form action="" method="">
                <label class="input_label">Full Name:</label>
                <input class="r_input_field" type="text" placeholder="enter name" required /><br/>
                <label class="input_label">Email</label>
                <input class="r_input_field" type="text" placeholder="enter email" required /><br/>
                <label class="input_label">District</label>
                <input class="r_input_field" type="text" placeholder="enter District"  required /><br/>
                <label class="input_label">Area</label>
                <input class="r_input_field" type="text" placeholder="enter email"  required /><br/>
                <label class="input_label">Address</label>
                <input class="r_input_field" type="text" placeholder="enter your name" required /><br/>
                <label class="input_label">Mobile No:</label>
                <input class="r_input_field" type="number" placeholder="enter number" readonly/><br/>
                <label class="input_label">Alternative Mobile No.</label>
                <input class="r_input_field" type="number" placeholder="another number"  /><br/>
                <label class="input_label">Payment Method</label>
                <select class="r_input_field " id="select" name="select">
                    <option value="1">bKash</option>
                    <option value="2">cash on delivery</option>
                </select>
                <a class="btn btn-primary" href="cart.php">Back</a>
                <a style="margin-left:80%;"  class="btn btn-success" href="placeorder.php">Next</a>
                
                
            </form>
        </div>
        </div>
        <div class="col-md-4 col-sm-12 col-xs-12">
        <div class="sort_cart">
            <h3>You have 1 items in your cart</h3>
            <hr/>
            <label>Total:   620.870Tk</label><br/><br/>
            <label>Shipping:50Tk.</label>
            <hr/>
            <label style="color:#FF6600;">Payable Total: 670.87Tk.</label>
            </div>
        </div>
    </div>
</div>
<?php
include_once('Library/footer.php');
?>