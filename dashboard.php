<?php session_start();
    include 'connect.php';
    error_reporting(0);
    $msg="";
    $username=@$_SESSION['username'];
    $userid=$_SESSION["user_id"];
    $checkdata="select * from songreleases where userid='".$userid."' LIMIT 5;";
    $query=mysqli_query($connect,$checkdata);
?><!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Dashboard | Musiq</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="" name="description" />
	<?php include('preload/header.php');?>
	<?php include('preload/leftsidebar.php');?>

            <div class="main-content">

                <div class="page-content">
                    
                    <!-- Page-Title -->
                    <div class="page-title-box">
                        <div class="container-fluid">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <h4 class="page-title mb-1">Dashboard</h4>
                                </div>
                                <div class="col-md-4">
                                    <div class="float-right d-none d-md-block">
                                        <div class="dropdown">
                                            <a href="create-release">
                                            <button class="btn btn-light btn-rounded dropdown-toggle" type="button"  >
                                                <i class="uim uim-circle-layer"></i> Release
                                            </button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- end page title end breadcrumb -->
<?php if(@$_SESSION['username']){?>
                    <div class="page-content-wrapper">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="text-center">
                                                        <div class="icons-xl uim-icon-success my-4">
                                        <span class="uim-svg" style=""><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="1em"><path class="uim-primary" d="M10.3125,16.09375a.99676.99676,0,0,1-.707-.293L6.793,12.98828A.99989.99989,0,0,1,8.207,11.57422l2.10547,2.10547L15.793,8.19922A.99989.99989,0,0,1,17.207,9.61328l-6.1875,6.1875A.99676.99676,0,0,1,10.3125,16.09375Z" opacity=".99"></path><path class="uim-tertiary" d="M12,2A10,10,0,1,0,22,12,10.01146,10.01146,0,0,0,12,2Zm5.207,7.61328-6.1875,6.1875a.99963.99963,0,0,1-1.41406,0L6.793,12.98828A.99989.99989,0,0,1,8.207,11.57422l2.10547,2.10547L15.793,8.19922A.99989.99989,0,0,1,17.207,9.61328Z"></path></svg></span>
                                                        </div>
        <?php   $checkaprove="SELECT * FROM songreleases where status='1' and userid='".$userid."'";
                $querycheaprove=mysqli_query($connect,$checkaprove);
                $aproveresult=mysqli_num_rows($querycheaprove); ?>
                                                        <h4 class="alert-heading font-size-22"><?php echo $aproveresult; ?></h4>
                                                        <p class="text-muted">Releases Approved</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="text-center">
                                                        <div class="icons-xl uim-icon-warning my-4">
                                        <span class="uim-svg" style=""><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="1em"><path class="uim-tertiary" d="M20.05713,22H3.94287A3.02288,3.02288,0,0,1,1.3252,17.46631L9.38232,3.51123a3.02272,3.02272,0,0,1,5.23536,0L22.6748,17.46631A3.02288,3.02288,0,0,1,20.05713,22Z"></path><circle cx="12" cy="17" r="1" class="uim-primary"></circle><path class="uim-primary" d="M12,14a1,1,0,0,1-1-1V9a1,1,0,0,1,2,0v4A1,1,0,0,1,12,14Z"></path></svg></span>
                                                        </div>
                                                        <?php $checkpend="SELECT * FROM songreleases where status='0' and userid='".$userid."'";
                                                            $querychepen=mysqli_query($connect,$checkpend);
                                                            $pendresult=mysqli_num_rows($querychepen);
                                                        ?>
                                                        <h4 class="alert-heading font-size-22"><?php echo $pendresult; ?></h4>
                                                        <p class="text-muted">Releases Pending</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="text-center">
                                                        <div class="icons-xl uim-icon-danger my-4">
                                        <span class="uim-svg" style=""><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="1em"><path class="uim-primary" d="M13.41406,12l3.293-3.293A.99989.99989,0,0,0,15.293,7.293L12,10.58594,8.707,7.293A.99989.99989,0,0,0,7.293,8.707L10.58594,12,7.293,15.293A.99989.99989,0,0,0,8.707,16.707L12,13.41406l3.293,3.293A.99989.99989,0,0,0,16.707,15.293Z"></path><path class="uim-tertiary" d="M19.0708,4.9292A9.99962,9.99962,0,1,0,4.9292,19.0708,9.99962,9.99962,0,1,0,19.0708,4.9292ZM16.707,15.293A.99989.99989,0,1,1,15.293,16.707L12,13.41406,8.707,16.707A.99989.99989,0,0,1,7.293,15.293L10.58594,12,7.293,8.707A.99989.99989,0,0,1,8.707,7.293L12,10.58594l3.293-3.293A.99989.99989,0,0,1,16.707,8.707L13.41406,12Z"></path></svg>
                                         </span>
                                        </div>
    <?php   $checktakedown="SELECT * FROM songreleases where status='2' and userid='".$userid."'";
            $querytakedown=mysqli_query($connect,$checktakedown);
            $approvresult=mysqli_num_rows($querytakedown);  ?>
                                                        <h4 class="alert-heading font-size-22"><?php echo $approvresult; ?></h4>
                                                        <p class="text-muted">Take Down</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="float-right ml-2">
                                                <a href="view-release">View all</a>
                                            </div>
                                            <h5 class="header-title mb-4">Latest Song Release</h5>

                                            <div class="table-responsive">
                                                <table class="table table-centered table-hover mb-0">
                                                    <thead>
                                                        <tr>
                                                            <th>Date</th>
                                                            <th>Song Name</th>
                                                            <th>UPC</th>
                                                            <th>Genre</th>
                                                            <th>Status</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php   if(mysqli_num_rows($query)!=0){
                                                            while($row= mysqli_fetch_assoc($query)){ ?>
                                                <tr>
                                                    <td><?php echo $row['date']; ?></td>
                                                    <td><?php echo $row['song_name']; ?></td>
                                                    <td><?php echo $row['upc']; ?></td>
                                                    <td><?php echo $row['genre']; ?></td>
                                                    <td><?php if($row['status']=='1'){ echo ucfirst(Approval);}if($row['status']=='2'){echo ucfirst(Takedown);}if($row['status']=='0'){echo ucfirst(Pending);}?></td>
                                                    <td><form action="editrelease" method="post" name="submit" ><input name="id" value="<?php echo $row['id']; ?>" type="hidden"/><button type="submit" name="submit" class="btn btn-dark waves-effect waves-light" ><i class='ti-pencil-alt'></i> Edit</button></form></td>
                                                </tr>
                                                <?php }}?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="card">
                                        <div class=" card-body">
                                            <h4 class="card-title font-size-16 mt-0">Balance Amount</h4>
                                                <div class="text-center" dir="ltr">
                                                    <div style="display:inline;width:180px;height:180px;"><input data-plugin="knob" data-width="180" data-height="180" data-cursor="true" data-fgcolor="#3ddc97" value="45" style="width: 94px; height: 60px; position: absolute; vertical-align: middle; margin-top: 60px; margin-left: -137px; border: 0px; background: none; font: bold 36px Arial; text-align: center; color: rgb(61, 220, 151); padding: 0px; appearance: none;"></div>
                                                </div>
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
