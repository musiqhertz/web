<?php session_start();
include 'connect.php';
error_reporting(0);
$msg="";
$username=@$_SESSION['username'];
$userid=$_SESSION["user_id"];
if(isset($_POST['submit'])){
    $title= $_POST['title'];
    $track_id= $_POST['title']. uniqid();
    $date=date("Y-m-d");
    $query="insert into create_mutliple_release (id,track_id,title,status,isdeleted,userid,date) values('','".$track_id."','".$title."','0','0','".$userid."','".$date."')";
    mysqli_query($connect,$query); 
    $msg="Your multiple song is sucessfully updated.";
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
                        <div class="col-md-12 ">
                            <h4 class="page-title mb-1">Create Release</h4>
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
                                    <form name="submit" action="create-release-multiple" method="post" enctype="multipart/form-data">
                                        <div class="form-group row">
                                            <label for="example-email-input" class="col-md-2 col-form-label">Title</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="text" name="title" >
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
            <?php }else{ header("Location: logout");
                echo '<script type="text/javascript">window.location.href="logout";</script>';}?>
        </div>

        <?php include('preload/footer.php');?>              

