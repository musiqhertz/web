<?php session_start();
require('connect.php');
$msg = '';
$username=@$_POST['username'];
$password=@$_POST['password'];
if(isset($_POST['login'])){
    if($username && $password){
        $check=mysqli_query($connect,"select * from user_login where username='".$username."' ");
        $rows=mysqli_num_rows($check);
        if(mysqli_num_rows($check)!=0){
            while($row= mysqli_fetch_assoc($check)){
                $db_username=$row['username'];
                $db_password=$row['password'];
                $db_role=$row['role'];
                $db_user_id=$row['user_id'];
                $db_prof_img=$row['profileimg'];
                $db_verify=$row['verify'];
            }
            if($username==$db_username && sha1($password)==$db_password){
                $_SESSION["username"]=$username;
                $_SESSION["role"]=$db_role;
                $_SESSION["user_id"]=$db_user_id;
                $_SESSION["profileimg"]=$db_prof_img;
                $_SESSION["verify"]=$db_verify;
                $sql = mysqli_query($connect, "UPDATE user_login SET status ='Online now' WHERE user_id='{$db_user_id}'");
                header("Location: dashboard");
                echo '<script type="text/javascript">window.location.href="dashboard";</script>';
            }
            else{$msg = 'Wrong username or password';}
        }
        else{ $msg = 'Your username is not exist'; }    
    }
    else{ $msg = 'Please Enter Username and Password'; }
    mysqli_close($connect); 
}
?><!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>Login | Musiqapp</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content=" " name="description" />
        <link rel="shortcut icon" href="assets/images/favicon.ico">
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />
    </head>

    <body class="bg-primary bg-pattern">

        <div class="account-pages my-5 ">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center mb-3">
                            <a href="index.html" class="logo"><img src="assets/images/logo-light.png" height="40" alt="logo"></a>
                            
                        </div>
                    </div>
                </div>
                <!-- end row -->

                <div class="row justify-content-center">
                    <div class="col-xl-5 col-sm-8">
                        <div class="card">
                            <div class="card-body p-4">
                                <div class="p-2"> 
                                    <h5 class="text-center mb-3">Sign in to Musiq Hertz</h5> <?php if($msg){ ?>
                            <p class="font-size-16 text-center" style="color:#ff0000b3" ><?php echo $msg;?></p>
                            <?php }?>
                                    <form name="login" action="login" method="post" class="form-horizontal">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group form-group-custom mb-4">
                                                    <input type="text" class="form-control" name="username" id="username" required>
                                                    <label for="username">User Name</label>
                                                </div>

                                                <div class="form-group form-group-custom mb-4">
                                                    <input type="password" name="password" class="form-control" id="userpassword" required>
                                                    <label for="userpassword">Password</label>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" id="customControlInline">
                                                            <label class="custom-control-label" for="customControlInline">Remember me</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="text-md-right mt-3 mt-md-0">
                                                            <a href="forget-password" class="text-muted"><i class="mdi mdi-lock"></i> Forgot your password?</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="mt-4">
                                                    <button class="btn btn-success btn-block waves-effect waves-light" name="login" id="login" type="submit">Log In</button>
                                                </div>
                                                <div class="mt-4 text-center">
                                                    <a href="register" class="text-muted"><i class="mdi mdi-account-circle mr-1"></i> Create an account</a>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div>
        </div>
        <!-- end Account pages -->

        <!-- JAVASCRIPT -->
        <script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>

        <script src="https://unicons.iconscout.com/release/v2.0.1/script/monochrome/bundle.js"></script>

        <script src="assets/js/app.js"></script>

    </body>
</html>
