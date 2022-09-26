<?php session_start();
include 'connect.php';
$user_id=@$_SESSION['user_id'];
if($user_id){
    $status = "Offline now";
    $sql = mysqli_query($connect, "UPDATE user_login SET status ='{$status}' WHERE user_id='{$user_id}'");
    if($sql){ session_destroy(); }
}
?><!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>Logout | Musiqapp</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="assets/images/favicon.ico">
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />
    </head>
    <body class="bg-primary bg-pattern">

        <div class="account-pages my-5 pt-sm-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center mb-3">
                            <a href="index.html" class="logo"><img src="assets/images/logo-light.png" height="30" alt="logo"></a>
                        </div>
                    </div>
                </div>
                <!-- end row -->

                <div class="row justify-content-center">
                    <div class="col-xl-5 col-sm-8">
                        <div class="card">
                            <div class="card-body p-4">
                                <div class="p-2">
                                    <h5 class="mb-3 text-center">Logout</h5>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <p class=" text-center">You have successfully logged out of Musiq.</p>
                                                <p class=" text-center">Thank you for using Musiq.</p>
                                                <div class="mt-4 text-center">
                                                    <a href="login" class="text-muted"><i class="mdi mdi-account-circle mr-1"></i>Click here to Login the page</a>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>
        <script src="https://unicons.iconscout.com/release/v2.0.1/script/monochrome/bundle.js"></script>
        <script src="assets/js/app.js"></script>

    </body>
</html>
