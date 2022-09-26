<?php session_start();
    include 'connect.php';
    error_reporting(0);
    $msg="";
    $username=@$_SESSION['username'];
    $userid=$_SESSION["user_id"];
    $checkdata="select * from create_mutliple_release";
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
                    <h4 class="page-title mb-1">Edit Multiple Release</h4>
                </div>
            </div>
        </div>
    </div><?php if(@$_SESSION['username']){?>
    <div class="page-content-wrapper">
        <div class="container-fluid">
            <div class="row">

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                <thead>
                                                <tr>
                                                    <th>S.No</th>
                                                    <th>Title</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php   if(mysqli_num_rows($query)!=0){
                                                            while($row= mysqli_fetch_assoc($query)){ ?>
                                                <tr>
                                                    <td><?php echo $row['id']; ?></td>
                                                    <td><?php echo $row['title']; ?></td>
                                                    <td><?php echo $row['status']; ?></td>
                                                    <td><a href="editrelease-multiple?id=<?php echo $row['track_id'];?>" class="btn btn-dark waves-effect waves-light">Edit</a></td>
                                                </tr>
                                                <?php }}?>
                                                </tbody>
                                            </table>
                        </div>  
                    </div>
                </div> 
            
        </div>
    </div> 
</div> <?php }else{ header("Location: logout");
                echo '<script type="text/javascript">window.location.href="logout";</script>';}?>
<?php include('preload/footer.php');?>     