<?php session_start();
    include 'connect.php';
    error_reporting(0);
    $msg="";
    $username=@$_SESSION['username'];
    $userid=$_SESSION["user_id"];
    $id=$_GET['id'];
    if(isset($_POST['disapprove'])){
        $id=@$_POST['track_id'];
        $chkus=mysqli_query($connect,"select * from songreleases where track_id='".$id."' ");
        if(mysqli_num_rows($chkus)!=0){
            while($row= mysqli_fetch_assoc($chkus)){
             mysqli_query($connect,"UPDATE songreleases SET status='2',isdeleted='1' WHERE track_id='".$id."'");
             $msg = 'Your song is takedown successfully';
            }
        }
    }
    $checkdata="select sr.song_name,cmr.release_date,sr.status,cmr.thumbimgfile,sr.track_id,sr.genre,sr.track_title_language,sr.song_url from create_mutliple_release cmr JOIN songreleases sr on cmr.track_id = sr.track_id where cmr.track_id='".$id."'";
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
        </div>
    </div> <?php if(@$_SESSION['username']){?>
    <div class="page-content-wrapper">
        <div class="container-fluid">
            <div class="row">
<?php   if(mysqli_num_rows($query)!=0){
            while($row= mysqli_fetch_assoc($query)){ ?>
                <div class="col-lg-4">
                    <div class="card">
                        <img src="assets/common/<?php echo $row['thumbimgfile'];?>" class="card-img-top img-fluid"> 
                    </div>
                    <div class="card">
                        <div class="card-body"> 
                            <div class="row">
                                <div class="col-7 ">
                                    <h4 class="card-title font-size-16 mt-0"><?php echo $row['song_name'];?></h4>
                            <p class="card-text">by <?php echo $username." ".$row['release_date'];?></p>
                                </div>
                                <div class="col-5 ">
                                    <form action="release-details?id=<?php echo $row['track_id']; ?>" method="post" name="submit" ><input  name="track_id" value="<?php echo $row['track_id']; ?>"  type="hidden"/><button type="submit" name="disapprove" class="btn btn-danger waves-effect waves-light" >Takedown</button></form>
                                </div>
                            </div>
                        </div>  
                    </div>
                    <div class="card">
                        <div class="card-body"> 
                            <div class="row">
                                <div class="col-12 ">
                                    <a href="#" class="btn <?php if($row['status']=='0'||$row['status']=='2'){echo 'btn-danger';}else{echo 'btn-success';}?>  waves-effect waves-light"><?php if($row['status']=='1'){echo ucfirst("Approval");}if($row['status']=='0'){echo ucfirst("Pending");}if($row['status']=='2'){echo ucfirst("Takedown");}?></a>
                                </div>
                            </div>
                        </div>  
                    </div>
                </div> 
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body"> 
                            <div class="row">
                                <div class="col-12 ">
                                    <h4 class="card-title font-size-16 mt-0">View Earning</h4>
                            <p class="card-text"> <?php echo $row['revenue'];?></p>
                                </div>
                            </div>
                        </div>  
                    </div>
                    <div class="card">
                        <div class="card-body"> 
                            <div class="row">
                                <div class="col-12 ">
                                    <h4 class="card-title font-size-16 mt-0">Not Assigning</h4>
                                    <h4 class="card-title font-size-16 mt-0">Not Assigning</h4>
                                </div>
                            </div>
                        </div>  
                    </div>
                    <div class="card">
                        <div class="card-body"> 
                            <div class="row">
                                <div class="col-12 ">
                                    <h4 class="card-title font-size-16 mt-0">Genre: <?php echo $row['genre'];?></h4>
                                    <h4 class="card-title font-size-16 mt-0">Language: <?php echo $row['track_title_language'];?></h4>
                                </div>
                            </div>
                        </div>  
                    </div>
                </div> 
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-1">
                                    <i class="dripicons-music"></i>
                                </div>
                                <div class="col-11">
                                    <h4 class="card-title font-size-16 mt-0"><?php echo $row['song_name'];?></h4>
                                    <p class="card-text">by <?php echo $username." ".$row['release_date'];?></p>
                                </div>

                            </div>
                            <br>
                            <audio controls>
                              <source src="assets/common/<?php echo $row['song_url'];?>.ogg" type="audio/ogg">
                              <source src="assets/common/<?php echo $row['song_url'];?>" type="audio/mpeg">
                            </audio>
                            
                        </div>
                    </div>
                </div> 
            <?php }   }?>                
        </div>
    </div> 
</div> <?php }else{ header("Location: logout");
                echo '<script type="text/javascript">window.location.href="logout";</script>';}?>

  <?php include('preload/footer.php');?>              
              
