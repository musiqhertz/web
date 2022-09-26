<?php error_reporting(0);require('connect.php');
    if(isset($_POST['adduser'])){
        $user_name=trim(@$_POST['user_name']);
        $emailid=trim(@$_POST['emailid']);
        $name=trim(@$_POST['name']);
        $phone_no=trim(@$_POST['phone_no']);
        $password=sha1(trim(@$_POST['password']));
        $checkda=mysqli_query($connect,"select * from user_login where username='".$user_name."' or email='".$emailid."' ");
        if(mysqli_num_rows($checkda)==0){
            $query="insert into user_login (user_id,username,password,name,role,phone,email,profileimg) values('','".$user_name."','".$password."','".$name."','user','".$phone_no."','".$emailid."','profile-img-default.jpg')";
            mysqli_query($connect,$query);
            $msg ='Your Registration is successfully finished';
        }else{
            $msg ='<span style="color:red">Username or Email already Exists.</span>';
        }
    }
?>
<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>Register | Musiqapp</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="" name="description" />
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
                        <div class="text-center mb-4">
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
                                    <h5 class="mb-3 text-center">Register Account to Musiq Hertz</h5>
                                    <?php if($msg){ ?>
                            <p class="font-size-16 text-center" style="color:#00df7b" ><?php echo $msg;?></p>
                            <?php }?>
                                    <form name="register" class="form-horizontal" action="register" method="post">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group form-group-custom mb-4">
                                                    <input type="text" class="form-control" name="name" id="name" required>
                                                    <label for="name">Name</label>
                                                </div>
                                                <div class="form-group form-group-custom mb-4">
                                                    <input type="email" name="emailid" class="form-control" id="email" required>
                                                    <label for="email">Email</label> 
                                                </div>
                                                <div class="form-group form-group-custom mb-4">
                                                    <input type="text" name="phone_no" class="form-control" id="phoneno" onKeyPress="if(this.value.length==10) return false;" required>
                                                    <label for="phoneno">Phone No</label>
                                                </div>
                                                <div class="form-group form-group-custom mb-4">
                                                    <input type="text" name="user_name" class="form-control" id="username" required>
                                                    <label for="username">Username</label>
                                                </div>
                                                <div class="form-group form-group-custom mb-4">
                                                    <input type="password" name="password" class="form-control" id="userpassword" required>
                                                    <label for="userpassword">Password</label>
                                                </div>
                                                <div class="form-group form-group-custom mb-4">
                                                    <input type="password"  name="conpassword" class="form-control" id="conpassword" onkeyup="checkpass();" required>
                                                    <label for="conpassword">Confirm Password</label>
                                                     <span id="cpass"></span>
                                                </div>
                                               
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="term-conditionCheck">
                                                    <label class="custom-control-label font-weight-normal" for="term-conditionCheck">I accept <a href="#" class="text-primary">Terms and Conditions</a></label>
                                                </div>
                                                <div class="mt-4">
                                                    <button class="btn btn-success btn-block waves-effect waves-light" type="submit" name="adduser">Register</button>
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
        <script type="text/javascript">
            function checkpass(){
                var pass=document.getElementById("userpassword").value;
                var cpass=document.getElementById("conpassword").value;
                if(pass!=cpass){
                    document.getElementById("cpass").style.color = "Red";
                    document.getElementById("cpass").innerHTML = "Passwords do not match!"
                }else{ document.getElementById("cpass").innerHTML =""; }

            }

        </script>

    </body>
</html>
