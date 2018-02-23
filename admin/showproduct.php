<?php
include('Library/header.php');
?>
<?php
include('Library/sidebar.php');
?>

<div class="col-md-9 col-sm-12 col-xs-12">
    <div class="row">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Product List<span style="float:right;"><a class="panel-title" href="createproduct.php">Create Product >></a></span></h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <th>Sl. No.</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Brand</th>
                            <th>Image</th>
                            <th>Price</th>
                            <th>Action</th>
                            
                        </thead>
                        <tbody>
                            <td>01</td>
                            <td>J1</td>
                            <td>Samsung</td>
                            <td>Samsung</td>
                            <td><img src="uploads/bfa6d735c0.png" height="40px" /></td>
                            <td>1200</td>
                            <td><a class="btn-link" href="#" >Edit</a> || <a class="btn-link" href="#">Delete</a></td>
                        </tbody>
                        <tfoot></tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include('Library/footer.php');
?>