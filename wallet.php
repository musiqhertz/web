<?php session_start();
    include 'connect.php';
    error_reporting(0);
    $msg="";
    $username=@$_SESSION['username'];
    $checkdata="select * from user_login where username='".$username."'";
    $query=mysqli_query($connect,$checkdata);
    if(mysqli_num_rows($query)!=0){
                while($row= mysqli_fetch_assoc($query)){
                    $username=$row['username'];
                    $email=$row['email'];
                    $name=$row['name'];
                    $phone=$row['phone'];
                    $profileimg=$row['profileimg'];
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
                <div class="col-md-8">
                    <h4 class="page-title mb-1">Wallet</h4>
                </div>
            </div>
        </div>
    </div>
    <?php if(@$_SESSION['username']){?>
    <div class="page-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-6">
                    <div class="card card-body">
                        <h4 class="card-title font-size-16 mt-0">Balance Amount</h4>
                            <div class="text-center" dir="ltr">
                                <div style="display:inline;width:180px;height:180px;"><input data-plugin="knob" data-width="180" data-height="180" data-cursor="true" data-fgcolor="#3ddc97" value="45" style="width: 94px; height: 60px; position: absolute; vertical-align: middle; margin-top: 60px; margin-left: -137px; border: 0px; background: none; font: bold 36px Arial; text-align: center; color: rgb(61, 220, 151); padding: 0px; appearance: none;"></div>
                            </div>
                            <p class="card-text">You Should withdrawal mininum amount of 1000 INR.</p>
                            <a href="#" class="btn btn-danger waves-effect waves-light">Withdrawal</a>
                    </div>
                </div>                
            </div>
        </div>
    </div>  <?php }else{ header("Location: logout");
                echo '<script type="text/javascript">window.location.href="logout";</script>';}?>
</div>
<?php include('preload/footer.php');?>   