<?php session_start();
require('connect.php');
$msg = '';
$emailid=trim(@$_POST['email']);
if(isset($_POST['forget-password'])){
    $check=mysqli_query($connect,"select * from user_login where email='".$emailid."' ");
    $rows=mysqli_num_rows($check);
    if(mysqli_num_rows($check)!=0){
        $datav = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz';
        $password=substr(str_shuffle($datav), 0, 8);
        $subject = "Your Recovered Password";
        $message = "Please use this password to login " . $password;
        $headers = "From : support@musiqapp.com";
        if(mail($to, $subject, $message, $headers)){
            $msg ='<span style="color:#00df7b">Your Password has been sent to your email id</span>';
            $password=sha1($password);
            $sql = mysqli_query($connect, "UPDATE user_login SET password ='".$password."' WHERE email='{$emailid}'");
        }else{
            $msg ='<span style="color:#ff0000b3">Failed to Recover your password, try again</span>';
        }
    }else{
        $msg ='<span style="color:#ff0000b3">Please provide valid Email Address</span>';
    }
    mysqli_close($connect); 
}
?><!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>Forget Password | Musiqapp</title>
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
                                    <h5 class="text-center mb-3">Forget Password</h5> <?php if($msg){ ?>
                            <p class="font-size-16 text-center"  ><?php echo $msg;?></p>
                            <?php }?>
                                    <form action="forget-password" method="post" class="form-horizontal">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group form-group-custom mb-4">
                                                    <input type="email" class="form-control" name="email" id="email" required>
                                                    <label for="email">Email Id</label>
                                                </div>
                                                
                                                <div class="mt-4">
                                                    <button class="btn btn-success btn-block waves-effect waves-light" name="forget-password" id="login" type="submit">Send</button>
                                                </div>
                                                <div class="mt-4 text-center">
                                                    <a href="login" class="text-muted"><i class="mdi mdi-account-circle mr-1"></i> Already have account?</a>
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
