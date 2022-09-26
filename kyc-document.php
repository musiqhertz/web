<?php session_start();
    include 'connect.php';
    error_reporting(0);
    $msg="";
    $username=@$_SESSION['username'];
    $userid=$_SESSION["user_id"];
    
    if(isset($_POST['submit'])){
        $name=@$_POST['name'];
        $bname=@$_POST['bname'];
        $banum=@$_POST['banum'];
        $ifsccode=@$_POST['ifsccode'];
        $filename = $_FILES["uploadfile"]["name"];
        $tempname = $_FILES["uploadfile"]["tmp_name"];    
        $folder = "assets/kyc/".$filename;     
        if($filename){
            $insquery="insert into kyc_document (id,user_refid,name,bankname,bankaccountnumber,ifsccode,idproof,status,isdeleted) values('','".$userid."','".$name."','".$bname."','".$banum."','".$ifsccode."','".$filename."','inactive','0')";
            mysqli_query($connect,$insquery);
            if (move_uploaded_file($tempname, $folder)) { $msg = 'Your profile data is updated successfully'; }
        }
    }
    $checkdata="select * from kyc_document where user_refid='".$userid."'";
        $query=mysqli_query($connect,$checkdata);
        if(mysqli_num_rows($query)!=0){
            while($row= mysqli_fetch_assoc($query)){
                $status=$row['status'];
                $bankname=$row['bankname'];
                $name=$row['name'];
                $bankaccountnumber=$row['bankaccountnumber'];	
                $ifsccode=$row['ifsccode'];
                $idproof=$row['idproof'];
            }   
        }
mysqli_close($connect); 
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>Musiqapp - Subscription</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php include('preload/header.php');?>
<?php include('preload/leftsidebar.php');?>
<div class="main-content"><?php if($msg){ ?> <script>Swal.fire('<?php echo $msg; ?>')</script><?php } ?>
<div class="page-content">
    <div class="page-title-box">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h4 class="page-title mb-1">KYC Document</h4>
                </div>
            </div>
        </div>
    </div>
    <?php if(@$_SESSION['username']){?>
    <div class="page-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12 col-sm-12">
                    <div class="card ">
                        <div class="card-body">
                            <?php if($status=="inactive"){ echo "<h4>Your account is inactive and it is under processing..</h4>"; }
                            if($status=="active"){ echo "<h4>Your account is active.</h4>"; ?>
                                <table class="table table-striped mb-0 ">
                                <tbody>
                                    <tr><th style="width: 50%;">Name</th>
                                                        <td><?php echo $name; ?></td></tr>
                                    <tr><th style="width: 50%;">Bank Name</th>
                                                        <td><?php echo $bankname; ?></td></tr>
                                    <tr><th style="width: 50%;">Bank Account Number</th>
                                                        <td><?php echo $bankaccountnumber; ?></td></tr>
                                    <tr><th style="width: 50%;">IFSC Code</th>
                                                        <td><?php echo $ifsccode; ?></td></tr>
                                    <tr><th style="width: 50%;">ID Proof</th>
                                                        <td><?php  if($idproof){?>
                                        <img src="<?php echo $base_url; ?>assets/kyc/<?php echo $idproof; ?>" width="50px;"/>         
                                                       <?php } ?></td></tr>
                                </tbody>
                            </table>
                                
                                
                            <?php } if($status==""){ ?>
                            <form name="submit" action="kyc-document" method="post" enctype="multipart/form-data">
                            <div class="form-group row">
                                <label for="example-text-input" class="col-md-2 col-form-label">Name</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" name="name" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                    <label for="example-search-input" class="col-md-2 col-form-label">Bank Name</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="text" name="bname" required>
                                    </div>
                            </div>
                            <div class="form-group row">
                                    <label for="example-email-input" class="col-md-2 col-form-label">Bank Account Number</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="text" name="banum" required>
                                    </div>
                            </div>
                            <div class="form-group row">
                                    <label for="example-url-input" class="col-md-2 col-form-label">Bank IFSC Code</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="text" name="ifsccode" required>
                                    </div>
                            </div>
                            <div class="form-group row">
                                    <label for="example-tel-input" class="col-md-2 col-form-label">ID / Address Proof (Max 10mb file)</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="file" name="uploadfile" accept="image/*,.pdf" required>
                                    </div>
                            </div>
                            <div class="form-group row mb-0"> 
                                    <label for="example-tel-input" class="col-md-2 col-form-label"> </label>
                                    <div class="col-md-10">
                                        <button type="submit" name="submit" class="btn btn-primary mt-2">Save</button>
                                        <button type="reset" class="btn">Cancel</button>
                                    </div>
                            </div>
                            </form> 
                        <?php  }?>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </div>  <?php }else{ header("Location: logout");
                echo '<script type="text/javascript">window.location.href="logout";</script>';}?>
</div>
<?php include('preload/footer.php');?>   