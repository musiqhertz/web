<?php error_reporting(0);
    session_start();
    include 'connect.php';
    $username=@$_SESSION['username'];
    $user_id=@$_SESSION['user_id'];
    $users_id=@$_POST['user_id'];
    if(isset($_POST['update'])){
        $user_name=trim(@$_POST['user_name']);
        $emailid=trim(@$_POST['emailid']);
        $name=trim(@$_POST['name']);
        $phone_no=trim(@$_POST['phone']);
        $role=trim(@$_POST['role']);
        $password=trim(@$_POST['password']);
        $pass_en=sha1($password);
        if($password){
            $query="UPDATE user_login SET username='$user_name',name='$name',role='$role', phone='$phone_no',email='$emailid',password='".$pass_en."' WHERE user_id='$users_id'" ;
        }else{
            $query="UPDATE user_login SET username='$user_name',name='$name',role='$role', phone='$phone_no',email='$emailid' WHERE user_id='$users_id'" ;
        }
        
        mysqli_query($connect,$query);
        $msg = 'Your data is successfully updated';
        mysqli_close($connect); 
        header('Location:view-add-edit-user');
        echo '<script type="text/javascript">window.location.href="view-add-edit-user";</script>';
    }
    else{
        $checkdata="select * from user_login where user_id='".$users_id."'";
        $query=mysqli_query($connect,$checkdata);
        if(mysqli_num_rows($query)!=0){
            while($row= mysqli_fetch_assoc($query)){
                $user_name=$row['username'];
                $emailid=$row['email'];
                $name=$row['name'];
                $role=$row['role'];
                $phone=$row['phone'];
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
                    <h4 class="page-title mb-1">Edit Profile</h4>
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
                            <form name="submit" action="edituser" method="post" enctype="multipart/form-data">
                            <input name="user_id" type="hidden" id="user_id" value="<?php echo $users_id; ?>" required/>
                                <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Username</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="user_name" value="<?php echo $user_name; ?>" >
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="name" value="<?php echo $name; ?>" >
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="password" placeholder="Password" >
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="email" name="emailid"  value="<?php echo $emailid; ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Phone</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="number" name="phone"  value="<?php echo $phone; ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Role</label>
                                <div class="col-sm-10">
                                    <select id="role" name="role" class="form-control" >
                                    <option value="<?php echo $role;?>" selected><?php echo $role;?></option>
                                        <option value="admin">Admin</option>
                                        <option value="superadmin">Super Admin</option>
                                        <option value="user">User</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <button type="submit" name="update" class="btn btn-primary waves-effect waves-light"> Update </button>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <?php }else{ header("Location: logout");
                echo '<script type="text/javascript">window.location.href="logout";</script>';}?>
</div>

  <?php include('preload/footer.php');?>              
              
