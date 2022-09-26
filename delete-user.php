<?php error_reporting(0); session_start(); 
    require('connect.php');
    $username=@$_SESSION['username'];
    $msg="";
    if(isset($_POST['submit'])){
            $user_id=trim(@$_POST['user_id']);
            $quey="DELETE FROM user_login WHERE user_id='$user_id'";
            mysqli_query($connect,$quey);
            $msg = 'Your data is deleted successfully updated';
    }
    $checkdata="select * from user_login ORDER BY `user_id` DESC;";
    $query=mysqli_query($connect,$checkdata);  
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>Musiqapp - Delete</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php include('preload/header.php');?>
<?php include('preload/leftsidebar.php');?>
<div class="main-content"><?php if($msg){ ?> <script>Swal.fire('<?php echo $msg; ?>')</script><?php } ?>
<div class="page-content">
    <div class="page-title-box">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h4 class="page-title mb-1">Delete User</h4>
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
                            <table id="example-11" class="table table-striped dt-responsive display" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>User Name</th>
                                                    <th>Email Id</th>
                                                    <th>Phone</th>
                                                    <th>Role</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>User Name</th>
                                                    <th>Email Id</th>
                                                    <th>Phone</th>
                                                    <th>Role</th>
                                                    <th>Action</th>
                                                </tr>
                                            </tfoot>
                                           <tbody>
                                                <?php   if(mysqli_num_rows($query)!=0){
                                                    while($row= mysqli_fetch_assoc($query)){ ?>
                                        <tr>
                                            <td><?php echo $row['name']; ?></td>
                                            <td><?php echo $row['username']; ?></td>
                                            <td><?php echo $row['email']; ?></td>
                                            <td><?php echo $row['phone']; ?></td>
                                            <td><?php echo $row['role']; ?></td> 
                                            <td><form action="delete-user" method="post" name="submit" ><input  name="user_id" value="<?php echo $row['user_id']; ?>"  type="hidden"/><button type="submit" name="submit" class="btn btn-danger waves-effect waves-light" ><i class='ti-trash'></i> Delete</button></form></td>
                                        </tr>
                                            <?php  }    
                                                }mysqli_close($connect);    ?>
                                            </tbody>
                                        </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
     <?php }else{ header("Location: logout");
                echo '<script type="text/javascript">window.location.href="logout";</script>';}?>
</div>
<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myModalLabel">Add New User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
            </div>
            <form action="view-add-edit-user" method="post">
            <div class="modal-body">
                <div class="row mb-3">
                                    <label for="example-search-input" class="col-sm-3 col-form-label">User Name</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" placeholder="Username" name="user_name" id="user_name" required="">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="example-search-input" class="col-sm-3 col-form-label">Name</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" placeholder="Name" name="name" id="name" required="">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="example-search-input" class="col-sm-3 col-form-label">Password</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" placeholder="Password" name="password" id="password" required="">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="example-search-input" class="col-sm-3 col-form-label">Email Id</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="email" placeholder="Email Id" name="emailid" id="emailid" required="">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="example-search-input" class="col-sm-3 col-form-label">Phone</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="number" placeholder="Phone" name="phone_no" id="phone_no" required="">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="example-search-input" class="col-sm-3 col-form-label">Role</label>
                                    <div class="col-sm-9">
                                         <select id="role" name="role" class="form-control" >
                                            <option value="superadmin">Super Admin</option>
                                            <option value="admin">Admin</option>
                                            <option value="moderator">Moderator</option>
                                            <option value="user">User</option>
                                            <option value="digitalmarketing">Digital Marketing</option>
                                            <option value="designer">Designer</option>
                                            <option value="developer">Developer</option>
                                            <option value="hr">HR</option>
                                            <option value="processor">Processor</option>
                                            <option value="sales">Sales</option>
                                            <option value="packer">Packer</option>
                                        </select>
                                    </div>
                                </div>
                    
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                <button type="submit" name="adduser" class="btn btn-primary waves-effect waves-light">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>
<?php include('preload/footer.php');?>   