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
                    <h4 class="page-title mb-1">Profile</h4>
                </div>
                <div class="col-md-4">
                    <div class="float-right d-none d-md-block">
                        <div class="dropdown">
                            <a href="edit-profile"><button class="btn btn-warning" type="button">
                                    <i class="mdi mdi-settings-outline mr-1"></i> Edit Profile
                                </button></a>
                        </div>
                    </div>
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
                            <table class="table table-striped mb-0 ">
                                <tbody>
                                    <tr><th style="width: 50%;">Username</th>
                                                        <td><?php echo $username; ?></td></tr>
                                    <tr><th style="width: 50%;">Email</th>
                                                        <td><?php echo $email; ?></td></tr>
                                    <tr><th style="width: 50%;">Full Name</th>
                                                        <td><?php echo $name; ?></td></tr>
                                    <tr><th style="width: 50%;">Mobile Number</th>
                                                        <td><?php echo $phone; ?></td></tr>
                                    <tr><th style="width: 50%;">Image</th>
                                                        <td><?php  if($profileimg){?>
                                        <img src="<?php echo $base_url; ?>assets/images/users/<?php echo $profileimg; ?>" width="50px;"/>         
                                                       <?php } ?></td></tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <?php }else{ header("Location: logout");
                echo '<script type="text/javascript">window.location.href="logout";</script>';}?>
</div>
<?php include('preload/footer.php');?>   