<?php session_start();
    include 'connect.php';
    error_reporting(0);
    $msg="";
    $username=@$_SESSION['username'];
    $userid=$_SESSION["user_id"];
    $checkdata="select sr.song_name,cmr.release_date,sr.status,cmr.thumbimgfile,cmr.track_id from create_mutliple_release cmr JOIN songreleases sr on cmr.track_id = sr.track_id";
    $query=mysqli_query($connect,$checkdata);
    
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
                    <h4 class="page-title mb-1">View Songs</h4>
                </div>
            </div>
        </div>
    </div><?php if(@$_SESSION['username']){?>
    <div class="page-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
<?php   if(mysqli_num_rows($query)!=0){
            while($row= mysqli_fetch_assoc($query)){ ?>
                <div class="col-lg-3">
                    <div class="card">
                        <img src="assets/common/<?php echo $row['thumbimgfile'];?>" class="card-img-top img-fluid">
                        <div class="card-body">
                            <h4 class="card-title font-size-16 mt-0"><?php echo ucfirst($row['song_name']);?></h4>
                            <p class="card-text">by <?php echo $username." ".$row['release_date'];?></p>
                            <div class="row">
                                <div class="col-6">
                                    <a href="#" class="btn <?php if($row['status']=='1'){echo 'btn-success';}else{echo 'btn-danger';}?>  waves-effect waves-light"><?php if($row['status']=='1'){ echo ucfirst(Approval);}if($row['status']=='2'){echo ucfirst(Takedown);}if($row['status']=='0'){echo ucfirst(Pending);}?></a>
                                </div>
                                <div class="col-6">
                                    <a href="release-details?id=<?php echo $row['track_id'];?>"><button class="btn btn-outline-info waves-effect waves-light" type="submit">Detials</button></a>
                                </div>
                            </div>
                        </div>  
                    </div>
                </div> 
                                

<?php  }   }?>
              </table>  
                
        </div>
    </div> 
</div> <?php }else{ header("Location: logout");
                echo '<script type="text/javascript">window.location.href="logout";</script>';}?>

  <?php include('preload/footer.php');?>              
              
