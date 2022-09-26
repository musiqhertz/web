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
    if(isset($_POST['submit'])){
        $email=@$_POST['email'];
        $name=@$_POST['name'];
        $phone=@$_POST['phone'];
        $country=@$_POST['country'];
        $filename = $_FILES["uploadfile"]["name"];
        $tempname = $_FILES["uploadfile"]["tmp_name"];    
        $folder = "assets/images/users/".$filename;     
        if($filename){
            $editdata="UPDATE user_login SET email='$email',name='$name',phone='$phone',profileimg='$filename'  WHERE username='$username'";
            mysqli_query($connect,$editdata);
            if (move_uploaded_file($tempname, $folder)) { $msg = 'Your profile data is updated successfully'; }
            
        }else{
            $editdata="UPDATE user_login SET email='$email',name='$name',phone='$phone' WHERE username='$username'";
            mysqli_query($connect,$editdata);
            $msg = 'Your profile data is updated successfully';
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
                    <h4 class="page-title mb-1">Edit Profile</h4>
                </div>
            </div>
        </div>
    </div><?php if(@$_SESSION['username']){?>
    <div class="page-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form name="submit" action="edit-profile" method="post" enctype="multipart/form-data">
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-md-2 col-form-label">Username</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="text" name="username" value="<?php echo $username; ?>" Readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-search-input" class="col-md-2 col-form-label">Email</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="email" name="email" value="<?php echo $email; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-email-input" class="col-md-2 col-form-label">Name</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="text" name="name" value="<?php echo $name; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-url-input" class="col-md-2 col-form-label">Mobile No</label>
                                    <div class="col-md-10">
                                                    <input class="form-control" type="number" name="phone" value="<?php echo $phone; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-tel-input" class="col-md-2 col-form-label">Image</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="file" name="uploadfile" >
                                        <?php  if($profileimg){?>
                                        <img src="<?php echo $base_url; ?>assets/images/users/<?php echo $profileimg; ?>" width="100px;"/>         
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                        <label class="col-md-2 col-form-label">Custom Select</label>
                                    <div class="col-md-10">
                                        <button type="submit" name="submit" class="btn btn-primary mt-2">Save</button>
                                        <button type="reset" class="btn">Cancel</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>  <?php }else{ header("Location: logout");
                echo '<script type="text/javascript">window.location.href="logout";</script>';}?>
</div>

  <?php include('preload/footer.php');?>              
              
