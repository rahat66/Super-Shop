<?php
$filepath=realpath(dirname(__FILE__));
//echo $filepath;
include_once($filepath.'/../Classes/Admin.php');
//include('../Classes/Admin.php');
session_start();
if(isset($_SESSION['adminId'])){
    header('Location:dashboard.php');
}
?>

<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $uName = $_POST['userName'];
        $uPass = $_POST['userPass'];
        
        $ad = new Admin();
        $result = $ad -> adminLogin($uName, $uPass);
        
//        echo $uName;
//        echo '<br/>';
//        echo $uPass;
        
//        echo '<pre>';
//        print_r($result);
//        echo '</pre>';
    }
?>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

<body>
    <div class="container">
        <div style="margin-top:30px;" class="row">
            <div class="col-md-offset-4 col-md-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Admin Login<span style="color:red;"><?php
                            if(isset($result)){
                                echo $result;
                            }
                            ?></span></h3>
                    </div>
                    <div class="panel-body">
                        <form action="login.php" method="post">
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" class="form-control" placeholder="user name" name="userName" />
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" placeholder="password" name="userPass" />
                            </div>
                            <button class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>