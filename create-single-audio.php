<?php session_start();
    include 'connect.php';
    error_reporting(0);
    $msg="";
    $username=@$_SESSION['username'];
    /*if(isset($_POST['submit'])){
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
    }*/
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
                    <h4 class="page-title mb-1">Create Single</h4>
                </div>
            </div>
        </div>
    </div>
    <div class="page-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form name="submit" action="create-single-audio" method="post" enctype="multipart/form-data">
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-md-2 col-form-label">Song Title</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="text" name="song-title" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-email-input" class="col-md-2 col-form-label">Album Name</label>
                                    <div class="col-md-10">
                                        <select id="language" name="language" class="form-control" >
                                            <option value=" "> </option>
                                            <option value="tamil">Album 1</option>
                                            <option value="english">Album 2</option>
                                            <option value="kannada">Album 3</option>
                                            <option value="hindi">Album 4</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-search-input" class="col-md-2 col-form-label">Song</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="file" name="songfile" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-search-input" class="col-md-2 col-form-label">Song Poster</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="file" name="uploadfile" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-md-2 col-form-label">UPC/EAN Code</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="text" name="album-title" >
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                        <label class="col-md-2 col-form-label"> </label>
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
    </div> 
</div>

  <?php include('preload/footer.php');?>              
              
