<?php session_start();
    include 'connect.php';
    error_reporting(0);
    $msg="";
    $username=@$_SESSION['username'];
    if(isset($_POST['checkpass'])){
        if($username){
            $password=@$_POST['password'];
            $repassword=@$_POST['repassword'];
            $pass_en=sha1($password);
            $chkpd=mysqli_query($connect,"select * from user_login where username='".$username."' ");
            if($password==$repassword){
                if(mysqli_num_rows($chkpd)!=0){
                    while($row= mysqli_fetch_assoc($chkpd)){
                        mysqli_query($connect,"UPDATE user_login SET password='".$pass_en."' WHERE username='".$username."'");
                        $msg = 'Your password is changed successfully';
                    }
                }
            }
            else{
                $msg = 'Your password not Matched';
            }
        }
    }
mysqli_close($connect); 
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>Musiqapp - Profile</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php include('preload/header.php');?>
<?php include('preload/leftsidebar.php');?>
<div class="main-content"><?php if($msg){ ?> <script>Swal.fire('<?php echo $msg; ?>')</script><?php } ?>
<div class="page-content">
    <div class="page-title-box">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <h4 class="page-title mb-1">Change Password</h4>
                </div>
            </div>
        </div>
    </div>
    <?php if(@$_SESSION['username']){?>
    <div class="page-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form name="submit" action="change-password" method="post" enctype="multipart/form-data">
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-md-2 col-form-label">Password</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="password" name="password" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-search-input" class="col-md-2 col-form-label">Confirm Password</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="password" name="repassword" >
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                        <label class="col-md-2 col-form-label"></label>
                                    <div class="col-md-10">
                                        <button type="submit" name="checkpass" class="btn btn-primary mt-2">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
    <?php }else{ header("Location: logout");
                echo '<script type="text/javascript">window.location.href="logout";</script>';}?>
</div>

  <?php include('preload/footer.php');?>              
              
