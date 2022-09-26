<?php session_start();
    include 'connect.php';
    error_reporting(0);
    $msg="";
    $username=@$_SESSION['username'];
    $userid=$_SESSION["user_id"];
    $id_pas=$_GET['id'];
    if(isset($_POST['submit'])){
        $title= $_POST['title']; //$imageupload = $_POST['imageupload'];
        $song_name = $_POST['song_name'];
        $upc = $_POST['upc'];
        $genre = $_POST['genre'];
        $p_line = $_POST['p_line'];
        $sub_genre = $_POST['sub_genre'];
        $c_line = $_POST['c_line'];
        $production_year = $_POST['production_year'];
        $production_catalogue = $_POST['production_catalogue'];
        $release_date = $_POST['release_date'];
        $label_name = $_POST['label_name'];
        $country=$_POST['country'];
        $deloyment=$_POST['deloyment'];
        $exclusive_date=$_POST['exclusive_date'];
        $preorder_date=$_POST['preorder_date'];
        $name_of_owner=$_POST['name_of_owner'];
        $pan_card=$_POST['pan_card'];
        $address=$_POST['address'];
        $gst=$_POST['gst'];
        $phone_no=$_POST['phone_no'];
        $aadhar_number=$_POST['aadhar_number'];
        $royality_information=$_POST['royality_information'];
        foreach($_POST['primaryartist'] as $pa1){$primaryartist.=$pa1.","; }
        foreach($_POST['author'] as $ar1){$author.=$ar1.","; }
        foreach($_POST['composer'] as $c1){$composer.=$c1.","; }
        $query="UPDATE create_mutliple_release SET title='$title',song_name='$song_name',upc='$upc',genre='$genre', p_line='$p_line',sub_genre='$sub_genre',c_line='$c_line', production_year='$production_year', production_catalogue='$production_catalogue', release_date='$release_date', label_name='$label_name', primaryartist='$primaryartist',author='$author', composer='$composer',country='$country',deloyment='$deloyment',exclusive_date='$exclusive_date',preorder_date='$preorder_date',name_of_owner='$name_of_owner',pan_card='$pan_card',address='$address',gst='$gst',phone_no='$phone_no',aadhar_number='$aadhar_number',royality_information='$royality_information' WHERE track_id='$id_pas'";
        mysqli_query($connect,$query);
        $msg="Your data is Saved Successfully";
    }
    if(isset($_POST['approveablum'])){
        $title= $_POST['title']; //$imageupload = $_POST['imageupload'];
        $song_name = $_POST['song_name'];
        $upc = $_POST['upc'];
        $genre = $_POST['genre'];
        $p_line = $_POST['p_line'];
        $sub_genre = $_POST['sub_genre'];
        $c_line = $_POST['c_line'];
        $production_year = $_POST['production_year'];
        $production_catalogue = $_POST['production_catalogue'];
        $release_date = $_POST['release_date'];
        $label_name = $_POST['label_name'];
        $country=$_POST['country'];
        $deloyment=$_POST['deloyment'];
        $exclusive_date=$_POST['exclusive_date'];
        $preorder_date=$_POST['preorder_date'];
        $name_of_owner=$_POST['name_of_owner'];
        $pan_card=$_POST['pan_card'];
        $address=$_POST['address'];
        $gst=$_POST['gst'];
        $phone_no=$_POST['phone_no'];
        $aadhar_number=$_POST['aadhar_number'];
        $royality_information=$_POST['royality_information'];
        foreach($_POST['primaryartist'] as $pa1){$primaryartist.=$pa1.","; }
        foreach($_POST['author'] as $ar1){$author.=$ar1.","; }
        foreach($_POST['composer'] as $c1){$composer.=$c1.","; }
        $query="UPDATE create_mutliple_release SET title='$title',song_name='$song_name',upc='$upc',genre='$genre', p_line='$p_line',sub_genre='$sub_genre',c_line='$c_line', production_year='$production_year', production_catalogue='$production_catalogue', release_date='$release_date', label_name='$label_name', primaryartist='$primaryartist',author='$author', composer='$composer',country='$country',deloyment='$deloyment',exclusive_date='$exclusive_date',preorder_date='$preorder_date',name_of_owner='$name_of_owner',pan_card='$pan_card',address='$address',gst='$gst',phone_no='$phone_no',aadhar_number='$aadhar_number',royality_information='$royality_information',status='1' WHERE track_id='$id_pas'";
        mysqli_query($connect,$query);
        $msg="Your data is Saved Successfully";
    }
    if(isset($_POST['addimg'])){
        $ext_thumbimgfile   =   pathinfo( $_FILES["imageupload"]["name"], PATHINFO_EXTENSION ); 
        $basename_thumbimgfile   = uniqid(). "." . $ext_thumbimgfile;
        $destination_thumbimgfile  = "assets/common/{$basename_thumbimgfile}";
        $source_thumbimgfile=$_FILES["imageupload"]["tmp_name"];
        move_uploaded_file($source_thumbimgfile , $destination_thumbimgfile );
        $queryimg="UPDATE create_mutliple_release SET thumbimgfile='$basename_thumbimgfile' WHERE track_id='$id_pas'";
         mysqli_query($connect,$queryimg);
        $msg="Your image Uploaded Successfully";
    }
    if(isset($_POST['addsong'])){
            $title = $_POST['title'];
            $songtempname = $_FILES['song_single_track']['tmp_name'];
            $filename_song = "song-". uniqid();  
            $ext_song   =   pathinfo( $_FILES['song_single_track']['name'], PATHINFO_EXTENSION );
            $basename_song   = $filename_song . "." . $ext_song;
            $destination_song  = "assets/common/{$basename_song}";
            move_uploaded_file($songtempname , $destination_song );
            $querysongrelease="insert into songreleases (id, track_id,title,song_url,status,isdeleted) values('','".$id_pas."','".$title."','".$basename_song."','0','0')";
            mysqli_query($connect,$querysongrelease);
            $msg="Your song is updated Successfully";
    }
    if(isset($_POST['editsong'])){
        $id= $_POST['id'];
        $primary_track_type= $_POST['primary_track_type'];
        $secondary_track_type = $_POST['secondary_track_type'];
        $instrumental = $_POST['instrumental'];
        $title = $_POST['title'];
        $arranger = $_POST['arranger'];
        $producer = $_POST['producer'];
        $p_line = $_POST['p_line'];
        $production_year = $_POST['production_year'];
        $publisher = $_POST['publisher'];
        $ask_to_generate_an_irsc = $_POST['ask_to_generate_an_irsc'];
        $genre = $_POST['genre'];
        $subgenre = $_POST['subgenre'];
        $secondary_genre = $_POST['secondary_genre'];
        $parental_advisory = $_POST['parental_advisory'];
        $track_title_language = $_POST['track_title_language'];
        $lyrics_language = $_POST['lyrics_language'];
        $lyrics = $_POST['lyrics'];
        foreach($_POST['primary_artist'] as $pa1){$primary_artist.=$pa1.","; }
        foreach($_POST['release_author'] as $ar1){$author.=$ar1.","; }
        foreach($_POST['release_composer'] as $c1){$composer.=$c1.","; }
        $queryes="UPDATE songreleases SET primary_track_type='$primary_track_type',secondary_track_type='$secondary_track_type',instrumental='$instrumental',title='$title', arranger='$arranger',producer='$producer',p_line='$p_line', production_year='$production_year', publisher='$publisher', ask_to_generate_an_irsc='$ask_to_generate_an_irsc', genre='$genre', subgenre='$subgenre',secondary_genre='$secondary_genre', parental_advisory='$parental_advisory', track_title_language='$track_title_language', lyrics_language='$lyrics_language',lyrics='$lyrics', primary_artist='$primary_artist', author='$author', composer='$composer' WHERE id='$id'";
        mysqli_query($connect,$queryes);
        $msg="Your data updated Successfully";
    }
    if(isset($_POST['deletesong'])){
        $id = $_POST['id'];
        $queydel="DELETE FROM songreleases WHERE id='$id'";
        mysqli_query($connect,$queydel);
        $msg = 'Your data is deleted successfully updated';
    }
    $checkid="select * from create_mutliple_release where track_id='".$id_pas."' and status='0' ;";
    $query=mysqli_query($connect,$checkid);
        if(mysqli_num_rows($query)!=0){
            while($row= mysqli_fetch_assoc($query)){
                $id=$row['id'];
                $title=$row['title'];
                $track_id=$row['track_id'];
                $song_name=$row['song_name'];
                $thumbimgfile=$row['thumbimgfile'];
                $upc=$row['upc'];
                $genre=$row['genre'];
                $p_line=$row['p_line'];
                $sub_genre=$row['sub_genre'];
                $c_line=$row['c_line'];
                $production_year=$row['production_year'];
                $production_catalogue=$row['production_catalogue'];
                $release_date=$row['release_date'];
                $label_name=$row['label_name'];
                $primaryartist=$row['primaryartist'];
                $author=$row['author'];
                $composer=$row['composer'];
                $deloyment=$row['deloyment'];
                $exclusive_date=$row['exclusive_date'];
                $country=$row['country'];
                $preorder_date=$row['preorder_date'];
                $name_of_owner=$row['name_of_owner'];
                $pan_card=$row['pan_card'];
                $address=$row['address'];
                $gst=$row['gst'];
                $phone_no=$row['phone_no'];
                $aadhar_number=$row['aadhar_number'];
                $royality_information=$row['royality_information'];
            }
        }
    $checksongreles="select * from songreleases where track_id='".$id_pas."' and status='0' ;";
    $querysongreles=mysqli_query($connect,$checksongreles);  

    $checkpayment="select * from payment where user_id='".$userid."' and status='1' ;";
    $querypayment=mysqli_query($connect,$checkpayment);
    if(mysqli_num_rows($querypayment)!=0){
        $pay="paid";
    }
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>Musiqapp - Edit Mutiple Release</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php include('preload/header.php');?>
<?php include('preload/leftsidebar.php');?>
<div class="main-content"><?php if($msg){ ?> <script>Swal.fire('<?php echo $msg; ?>')</script><?php } ?>
<div class="page-content">
    <form action="editrelease-multiple?id=<?php echo $track_id;?>" method="post" enctype="multipart/form-data">
    <div class="page-title-box">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h4 class="page-title mb-1">Edit Multiple Release</h4>
                </div>
                <div class="col-md-4">
                    <div class="float-right d-none d-md-block">
                        <button class="btn btn-light btn-rounded" name="submit" type="submit">Save
                        </button>
                    </div>
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
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#release-information" role="tab">
                                        <i class="fas fa-home mr-1"></i> <span class="d-none d-md-inline-block">Release Information</span> 
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " data-toggle="tab" href="#poster-image" role="tab">
                                        <i class="fas fa-plus mr-1"></i> <span class="d-none d-md-inline-block">Poster Image</span> 
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#upload" role="tab">
                                        <i class="fas fa-user mr-1"></i> <span class="d-none d-md-inline-block">Upload</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#tracks" role="tab">
                                        <i class="far fa-envelope mr-1"></i> <span class="d-none d-md-inline-block">Tracks</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#territories" role="tab">
                                        <i class="fas fa-cog mr-1"></i> <span class="d-none d-md-inline-block">Territories</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#release-date" role="tab">
                                        <i class="fas fa-cog mr-1"></i> <span class="d-none d-md-inline-block">Release Date</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#documentation-process" role="tab">
                                        <i class="fas fa-cog mr-1"></i> <span class="d-none d-md-inline-block">Documentation Process</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#royality-information" role="tab">
                                        <i class="fas fa-cog mr-1"></i> <span class="d-none d-md-inline-block">Royality Information</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#submission" role="tab">
                                        <i class="fas fa-cog mr-1"></i> <span class="d-none d-md-inline-block">Submission</span>
                                    </a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content p-3">
                                <div class="tab-pane active" id="release-information" role="tabpanel">
                                    <br>
                                    <div class="row mb-3">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Title*</label>
                                        <div class="col-sm-4 ">
                                            <input class="form-control" type="text" name="title" value="<?php echo $title; ?>" required>
                                        </div>
                                        
                                    </div>
                                    <div class="row mb-3">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Song Title*</label>
                                        <div class="col-sm-4">
                                            <input class="form-control" type="text" name="song_name" value="<?php echo $song_name; ?>" required>
                                        </div>
                                        <label for="example-text-input" class="col-sm-2 col-form-label">UPC</label>
                                        <div class="col-sm-4">
                                            <input class="form-control" type="text" name="upc" value="<?php echo $upc; ?>" >
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Genre*</label>
                                        <div class="col-sm-4">
                                            <select id="genre" name="genre" class="form-control" required>
                                                <?php if($genre){ ?> 
                                                    <option value="<?php echo $genre;?>" selected><?php echo $genre;?></option>
                                                <?php } ?>
                                                <option value="">Select the Genre</option>
                                                <option value="Blues">Blues</option>
                                                <option value="Easy listening">Easy listening</option>
                                                <option value="Electronic">Electronic</option>
                                                <option value="Contemporary folk">Contemporary folk</option>
                                                <option value="Hip hop">Hip hop</option>
                                                <option value="Jazz">Jazz</option>
                                                <option value="Pop">Pop</option>
                                                <option value="R&B and soul">R&B and soul</option>
                                                <option value="Rock">Rock</option>
                                            </select>
                                        </div>
                                        <label for="example-text-input" class="col-sm-2 col-form-label">P.Line*</label>
                                        <div class="col-sm-4">
                                            <input class="form-control" type="text" name="p_line" value="<?php echo $p_line; ?>" required>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Sub Genre*</label>
                                        <div class="col-sm-4">
                                            <input class="form-control" type="text" name="sub_genre" value="<?php echo $sub_genre; ?>" required>
                                        </div>
                                        <label for="example-text-input" class="col-sm-2 col-form-label">C.Line*</label>
                                        <div class="col-sm-4">
                                            <input class="form-control" type="text" name="c_line" value="<?php echo $c_line; ?>" required>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Release Date*</label>
                                        <div class="col-sm-4">
                                            <input class="form-control" type="date" name="release_date" value="<?php echo $release_date; ?>" required>
                                        </div>
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Production Year*</label>
                                        <div class="col-sm-4">
                                            <input class="form-control" type="text" name="production_year" value="<?php echo $production_year; ?>" required>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Label Name*</label>
                                        <div class="col-sm-4">
                                            <input class="form-control" type="text" name="label_name" value="<?php echo $label_name; ?>" required>
                                        </div>
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Production Catalogue</label>
                                        <div class="col-sm-4">
                                            <input class="form-control" type="text" name="production_catalogue" value="<?php echo $production_catalogue; ?>" >
                                        </div>
                                    </div>
                                    <?php $primaryartista=explode(",",$primaryartist); 
                                    if(!empty($primaryartist)){ $i=1;
                                        foreach($primaryartista as $primaryartista){
                                            if(!empty($primaryartista)){?>
                                    <div id="row" class="row mb-3">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Primary Artist*</label>
                                        <div class="col-sm-4"> 
                                            <div class="input-group">
                                                <div class="input-group-prepend"><button class="btn btn-danger" id="DeleteprimaryartistRow" type="button"><i class="fa fa-trash"></i></button></div>
                                                <input type="text" name="primaryartist[]" class="form-control m-input" value="<?php echo $primaryartista; ?>" required>
                                                <?php if($i==1){$i++?><button id="rowprimaryartistAdder" type="button" class="btn btn-dark">
                                                <span class="fa fa-plus"> </span></button><?php }?>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="newprimaryartistinput"></div>

                                    <?php } } }else{ ?>
                                    <div id="row" class="row mb-3">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Primary Artist*</label>
                                        <div class="col-sm-4"> 
                                            <div class="input-group">
                                                <input type="text" name="primaryartist[]" class="form-control m-input" required><button id="rowprimaryartistAdder" type="button" class="btn btn-dark">
                                                <span class="fa fa-plus"> </span></button>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div id="newprimaryartistinput"></div>
                                    <?php } ?>
                                    
                                    <?php $authora=explode(",",$author); 
                                    if(!empty($author)){ $j=1;
                                        foreach($authora as $authora){
                                            if(!empty($authora)){?>
                                    <div id="row" class="row mb-3">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Author(Lyric Writer)*</label>
                                        <div class="col-sm-4"> 
                                            <div class="input-group">
                                                <div class="input-group-prepend"><button class="btn btn-danger" id="DeleteAuthorRow" type="button"><i class="fa fa-trash"></i></button></div>

                                                <input type="text" name="author[]" class="form-control m-input" value="<?php echo $authora; ?>" required>
                                                <?php if($j==1){$j++?><button id="rowAuthorAdder" type="button" class="btn btn-dark">
                                                <span class="fa fa-plus"> </span></button><?php }?>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="newAuthorinput"></div>
                                    <?php } } }else{ ?>
                                    <div id="row" class="row mb-3">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Author(Lyric Writer)*</label>
                                        <div class="col-sm-4"> 
                                            <div class="input-group">
                                                <input type="text" name="author[]" class="form-control m-input" required><button id="rowAuthorAdder" type="button" class="btn btn-dark">
                                                <span class="fa fa-plus"> </span></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="newAuthorinput"></div>
                                    <?php } ?>
                                     <?php $composera=explode(",",$composer); 
                                    if(!empty($composer)){ $k=1;
                                        foreach($composera as $composera){
                                            if(!empty($composera)){ ?>
                                     <div id="row" class="row mb-3">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Composer*</label>
                                        <div class="col-sm-4"> 
                                            <div class="input-group">
                                                <div class="input-group-prepend"><button class="btn btn-danger" id="DeleteComposerRow" type="button"><i class="fa fa-trash"></i></button></div>
                                                <input type="text" name="composer[]" value="<?php echo $composera; ?>" class="form-control m-input" required>
                                                <?php if($k==1){$k++?>
                                                <button id="rowComposerAdder" type="button" class="btn btn-dark">
                                                <span class="fa fa-plus"> </span></button> <?php }?>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="newComposerinput"></div>
                                    <?php } } }else{ ?>
                                    <div id="row" class="row mb-3">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Composer*</label>
                                        <div class="col-sm-4"> 
                                            <div class="input-group">
                                                <input type="text" name="composer[]" class="form-control m-input" required><button id="rowComposerAdder" type="button" class="btn btn-dark">
                                                <span class="fa fa-plus"> </span></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="newComposerinput"></div>
                                    <?php } ?>
                                </div>
                                <div class="tab-pane" id="poster-image" role="tabpanel">
                                    <br>
                                    <center><?php if($thumbimgfile){?>
                                            <img src="assets/common/<?php echo $thumbimgfile;?>" width="50px">
                                            <button type="button" class="btn btn-success btn-lg waves-effect waves-light" data-toggle="modal" data-target="#myModalimg">Change Image</button>
                                          <?php } else{?>
                                           <button type="button" class="btn btn-success btn-lg waves-effect waves-light" data-toggle="modal" data-target="#myModalimg">Upload Image</button>
                                        <?php }?>
                                    </center>
                                </div>
                                <div class="tab-pane" id="upload" role="tabpanel">
                                    <br>
                                    <center><button type="button" class="btn btn-success btn-lg waves-effect waves-light" data-toggle="modal" data-target="#myModal">Upload New Song</button>
                                    </center>
                                </div>
                                <div class="tab-pane" id="tracks" role="tabpanel">
                                   <table id="example-11" class="table table-striped dt-responsive display" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Sno</th>
                                                <th>Title</th>
                                                <th>Action</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php   if(mysqli_num_rows($querysongreles)!=0){ $r=1;
                                                    while($row= mysqli_fetch_assoc($querysongreles)){ ?>
                                            <tr>
                                                <td><?php echo $r; ?></td><td><?php echo $row['title']; ?></td>
                                                <td><button type="button" class="btn btn-dark waves-effect waves-light" data-toggle="modal" data-target="#myMod<?php echo $r;?>"><i class="ti-pencil-alt"></i> Edit</button></td>
                                                <td><button type="button" class="btn btn-danger waves-effect waves-light" data-toggle="modal" data-target="#myModDel<?php echo $r;?>"><i class="ti-trash"></i> Delete</button>
                                                </td>
                                            </tr>
                                            <?php $r++;}}?>

                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane" id="territories" role="tabpanel">
                                    <br>
                                    <div class="row mb-3">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Country</label>
                                        <div class="col-sm-4 ">
                                            <input class="form-control" type="text" name="country" value="<?php echo $country; ?>" >
                                        </div>
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Deloyment</label>
                                        <div class="col-sm-4">
                                            <input class="form-control" type="text" name="deloyment" value="<?php echo $deloyment; ?>" >
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="release-date" role="tabpanel">
                                    <br>
                                    <div class="row mb-3">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Release Date</label>
                                        <div class="col-sm-4 ">
                                            <input class="form-control" type="date" name="release_date1" value="<?php echo $release_date; ?>" disabled>
                                        </div>
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Exclusive Date</label>
                                        <div class="col-sm-4">
                                            <input class="form-control" type="date" name="exclusive_date" value="<?php echo $exclusive_date; ?>" > 
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Pre-order Date</label>
                                        <div class="col-sm-4 ">
                                            <input class="form-control" type="date" name="preorder_date" value="<?php echo $preorder_date; ?>" >
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="documentation-process" role="tabpanel">
                                    <br>
                                    <div class="row mb-3">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Name of the Owner</label>
                                        <div class="col-sm-4 ">
                                            <input class="form-control" type="text" name="name_of_owner" value="<?php echo $name_of_owner; ?>" >
                                        </div>
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Pan Card</label>
                                        <div class="col-sm-4">
                                            <input class="form-control" type="text" name="pan_card" value="<?php echo $pan_card; ?>" >
                                           
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Address</label>
                                        <div class="col-sm-4 ">
                                            <input class="form-control" type="text" name="address" value="<?php echo $address; ?>" >
                                        </div>
                                        <label for="example-text-input" class="col-sm-2 col-form-label">GST (If)</label>
                                        <div class="col-sm-4">
                                            <input class="form-control" type="text" name="gst" value="<?php echo $gst; ?>" >
                                           
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Phone No</label>
                                        <div class="col-sm-4 ">
                                            <input class="form-control" type="text" name="phone_no" value="<?php echo $phone_no; ?>" >
                                        </div>
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Aadhar Number</label>
                                        <div class="col-sm-4">
                                            <input class="form-control" type="text" name="aadhar_number" value="<?php echo $aadhar_number; ?>" > 
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="royality-information" role="tabpanel">
                                    <div class="row mb-3">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Royality Information</label>
                                        <div class="col-sm-4 ">
                                            <select class="form-control" name="royality">
                                                <?php if($row['royality']){ ?> 
                                                    <option value="<?php echo $row['royality'];?>" selected><?php echo $row['royality'];?></option>
                                                <?php } ?>
                                                <option value="">Select the Royality</option>
                                                <option value="100">100%</option>
                                                <option value="70">70%</option>
                                                <option value="30">30%</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="submission" role="tabpanel">
                                    <br>
                                    <center><button type="button" class="btn btn-success btn-lg waves-effect waves-light" data-toggle="modal" data-target="#myfinalsubmit">Submit</button></center>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
</form><?php }else{ header("Location: logout");
                echo '<script type="text/javascript">window.location.href="logout";</script>';}?>
</div>

<div id="myfinalsubmit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myModalLabel">Alblum Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
            <form action="editrelease-multiple?id=<?php echo $track_id;?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Title*</label>
                        <div class="col-sm-2 ">
                            <input class="form-control" type="text" name="title" value="<?php echo $title; ?>" required>
                        </div>
                        <label for="example-text-input" class="col-sm-2 col-form-label">Song Title*</label>
                        <div class="col-sm-2">
                            <input class="form-control" type="text" name="song_name" value="<?php echo $song_name; ?>" required>
                        </div>
                        <label for="example-text-input" class="col-sm-2 col-form-label">UPC</label>
                        <div class="col-sm-2">
                            <input class="form-control" type="text" name="upc" value="<?php echo $upc; ?>" >
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Genre*</label>
                        <div class="col-sm-2">
                            <select id="genre" name="genre" class="form-control" required>
                                <?php if($genre){ ?> 
                                    <option value="<?php echo $genre;?>" selected><?php echo $genre;?></option>
                                <?php } ?>
                                <option value="">Select the Genre</option>
                                <option value="Blues">Blues</option>
                                <option value="Easy listening">Easy listening</option>
                                <option value="Electronic">Electronic</option>
                                <option value="Contemporary folk">Contemporary folk</option>
                                <option value="Hip hop">Hip hop</option>
                                <option value="Jazz">Jazz</option>
                                <option value="Pop">Pop</option>
                                <option value="R&B and soul">R&B and soul</option>
                                <option value="Rock">Rock</option>
                            </select>
                        </div>
                        <label for="example-text-input" class="col-sm-2 col-form-label">Sub Genre*</label>
                        <div class="col-sm-2">
                            <input class="form-control" type="text" name="sub_genre" value="<?php echo $sub_genre; ?>" required>
                        </div>
                        <label for="example-text-input" class="col-sm-2 col-form-label">Release Date*</label>
                        <div class="col-sm-2">
                            <input class="form-control" type="date" name="release_date" value="<?php echo $release_date; ?>" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">P.Line*</label>
                        <div class="col-sm-2">
                            <input class="form-control" type="text" name="p_line" value="<?php echo $p_line; ?>" required>
                        </div>
                         <label for="example-text-input" class="col-sm-2 col-form-label">C.Line*</label>
                        <div class="col-sm-2">
                            <input class="form-control" type="text" name="c_line" value="<?php echo $c_line; ?>" required>
                        </div>
                        <label for="example-text-input" class="col-sm-2 col-form-label">Production Year*</label>
                        <div class="col-sm-2">
                            <input class="form-control" type="text" name="production_year" value="<?php echo $production_year; ?>" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Label Name*</label>
                        <div class="col-sm-2">
                            <input class="form-control" type="text" name="label_name" value="<?php echo $label_name; ?>" required>
                        </div>
                        <label for="example-text-input" class="col-sm-2 col-form-label">Production Catalogue</label>
                        <div class="col-sm-2">
                            <input class="form-control" type="text" name="production_catalogue" value="<?php echo $production_catalogue; ?>" >
                        </div>
                        <label for="example-text-input" class="col-sm-2 col-form-label">Country</label>
                        <div class="col-sm-2">
                            <input class="form-control" type="text" name="country" value="<?php echo $country; ?>" >
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Deloyment</label>
                        <div class="col-sm-2">
                            <input class="form-control" type="text" name="deloyment" value="<?php echo $deloyment; ?>" required>
                        </div>
                        <label for="example-text-input" class="col-sm-2 col-form-label">Exclusive Date</label>
                        <div class="col-sm-2">
                            <input class="form-control" type="date" name="exclusive_date" value="<?php echo $exclusive_date; ?>" >
                        </div>
                        <label for="example-text-input" class="col-sm-2 col-form-label">Pre-order Date</label>
                        <div class="col-sm-2 ">
                            <input class="form-control" type="date" name="preorder_date" value="<?php echo $preorder_date; ?>" >
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Name of the Owner</label>
                        <div class="col-sm-2 ">
                            <input class="form-control" type="text" name="name_of_owner" value="<?php echo $name_of_owner; ?>" >
                        </div>
                        <label for="example-text-input" class="col-sm-2 col-form-label">Pan Card</label>
                        <div class="col-sm-2">
                            <input class="form-control" type="text" name="pan_card" value="<?php echo $pan_card; ?>" >
                        </div>
                        <label for="example-text-input" class="col-sm-2 col-form-label">Address</label>
                        <div class="col-sm-2">
                            <input class="form-control" type="text" name="address" value="<?php echo $address; ?>" >
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">GST (If)</label>
                        <div class="col-sm-2">
                            <input class="form-control" type="text" name="gst" value="<?php echo $gst; ?>" >
                        </div>
                        <label for="example-text-input" class="col-sm-2 col-form-label">Phone No</label>
                        <div class="col-sm-2 ">
                            <input class="form-control" type="text" name="phone_no" value="<?php echo $phone_no; ?>" >
                        </div>
                        <label for="example-text-input" class="col-sm-2 col-form-label">Aadhar Number</label>
                        <div class="col-sm-2">
                            <input class="form-control" type="text" name="aadhar_number" value="<?php echo $aadhar_number; ?>" > 
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Royality Information</label>
                        <div class="col-sm-4 ">
                            <select class="form-control" name="royality">
                            <?php if($row['royality']){ ?> 
                                <option value="<?php echo $row['royality'];?>" selected><?php echo $row['royality'];?></option>
                                <?php } ?>
                                <option value="">Select the Royality</option>
                                <option value="100">100%</option>
                                <option value="70">70%</option>
                                <option value="30">30%</option>
                            </select>
                        </div>
                    </div>
                    <?php $primaryartista=explode(",",$primaryartist); 
                    if(!empty($primaryartist)){ $i=1;
                        foreach($primaryartista as $primaryartista){
                            if(!empty($primaryartista)){?>
                                <div id="row" class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Primary Artist*</label>
                                    <div class="col-sm-4"> 
                                        <div class="input-group">
                                            <div class="input-group-prepend"><button class="btn btn-danger" id="DeleteprimaryartistRowfinal" type="button"><i class="fa fa-trash"></i></button></div>
                                            <input type="text" name="primaryartist[]" class="form-control m-input" value="<?php echo $primaryartista; ?>" required>
                                            <?php if($i==1){$i++?><button id="rowprimaryartistAdderfinal" type="button" class="btn btn-dark">
                                                <span class="fa fa-plus"> </span></button><?php }?>
                                            </div>
                                        </div>
                                </div>
                                <div id="newprimaryartistinputfinal"></div>
                            <?php } } }
                        else{ ?>
                                <div id="row" class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Primary Artist*</label>
                                    <div class="col-sm-4"> 
                                        <div class="input-group">
                                            <input type="text" name="primaryartist[]" class="form-control m-input" required><button id="rowprimaryartistAdderfinal" type="button" class="btn btn-dark">
                                                <span class="fa fa-plus"> </span></button>
                                        </div>
                                    </div>
                                </div>
                                <div id="newprimaryartistinputfinal"></div>
                        <?php } ?>
                        <?php $authora=explode(",",$author); 
                    if(!empty($author)){ $j=1;
                        foreach($authora as $authora){
                            if(!empty($authora)){?>
                                <div id="row" class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Author(Lyric Writer)*</label>
                                    <div class="col-sm-4"> 
                                        <div class="input-group">
                                            <div class="input-group-prepend"><button class="btn btn-danger" id="DeleteAuthorRowfinal" type="button"><i class="fa fa-trash"></i></button></div>

                                            <input type="text" name="author[]" class="form-control m-input" value="<?php echo $authora; ?>" required>
                                            <?php if($j==1){$j++?><button id="rowAuthorAdderfinal" type="button" class="btn btn-dark">
                                                <span class="fa fa-plus"> </span></button><?php }?>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="newAuthorinputfinal"></div>
                        <?php } } }
                        else{ ?>
                            <div id="row" class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Author(Lyric Writer)*</label>
                                <div class="col-sm-4"> 
                                    <div class="input-group">
                                        <input type="text" name="author[]" class="form-control m-input" required><button id="rowAuthorAdderfinal" type="button" class="btn btn-dark">
                                            <span class="fa fa-plus"> </span></button>
                                        </div>
                                    </div>
                                </div>
                                <div id="newAuthorinputfinal"></div>
                        <?php } ?>
                        <?php $composera=explode(",",$composer); 
                        if(!empty($composer)){ $k=1;
                            foreach($composera as $composera){
                                if(!empty($composera)){ ?>
                                <div id="row" class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Composer*</label>
                                    <div class="col-sm-4"> 
                                        <div class="input-group">
                                            <div class="input-group-prepend"><button class="btn btn-danger" id="DeleteComposerRowfinal" type="button"><i class="fa fa-trash"></i></button></div>
                                            <input type="text" name="composer[]" value="<?php echo $composera; ?>" class="form-control m-input" required>
                                            <?php if($k==1){$k++?>
                                            <button id="rowComposerAdderfinal" type="button" class="btn btn-dark">
                                            <span class="fa fa-plus"> </span></button> <?php }?>
                                        </div>
                                    </div>
                                </div>
                                <div id="newComposerinputfinal"></div>
                        <?php } } }else{ ?>
                                <div id="row" class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Composer*</label>
                                <div class="col-sm-4"> 
                                <div class="input-group">
                                <input type="text" name="composer[]" class="form-control m-input" required><button id="rowComposerAdderfinal" type="button" class="btn btn-dark">
                                <span class="fa fa-plus"> </span></button>
                                </div>
                                </div>
                                </div>
                                <div id="newComposerinputfinal"></div>
                        <?php } ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                    <button type="submit" name="approveablum" class="btn btn-primary waves-effect waves-light">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>









<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myModalLabel">Add Songs</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
            <form action="editrelease-multiple?id=<?php echo $track_id;?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row mb-3">
                        <div class="col-sm-4">
                            <label for="formFileLg" class="form-label">Upload Song</label>
                        </div>
                        <div class="col-sm-8">
                            <input class="form-control form-control-lg" id="formFileLg" name="song_single_track" type="file" />
                            <input class="form-control form-control-lg" name="title" value="<?php echo $title; ?>" type="hidden" />
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                    <button type="submit" name="addsong" class="btn btn-primary waves-effect waves-light">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div id="myModalimg" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myModalLabel">Add Image</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
            <form action="editrelease-multiple?id=<?php echo $track_id;?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row mb-3">
                        <div class="col-sm-4">
                            <label for="formFileLg" class="form-label">Upload Image</label>
                        </div>
                        <div class="col-sm-8">
                            <input class="form-control form-control-lg" id="formFileLg" name="imageupload" type="file" />
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                    <button type="submit" name="addimg" class="btn btn-primary waves-effect waves-light">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php  $checksongreles="select * from songreleases where track_id='".$id_pas."' and status='0' ;";
    $querysongreles=mysqli_query($connect,$checksongreles);  if(mysqli_num_rows($querysongreles)!=0){ $g=1;
        while($row= mysqli_fetch_assoc($querysongreles)){ ?>

<div class="modal fade" id="myMod<?php echo $g;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-modal="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form  action="editrelease-multiple?id=<?php echo $track_id;?>" method="post" enctype="multipart/form-data">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myModalLabel">Edit Songs</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row mb-3">
                    <div class="col-sm-4">
                        <input class="form-control form-control-lg" id="formFileLg" name="id" value="<?php echo $row['id']; ?>" type="hidden" />
                        <input class="form-control form-control-lg" id="formFileLg" name="track_id" value="<?php echo $row['track_id']; ?>" type="hidden" />
                        <label for="formFileLg" class="form-label">Primary Track Type</label> 
                    </div>
                    <div class="col-sm-8">
                        <input class="form-control form-control-lg" id="formFileLg" name="primary_track_type" value="Music" type="text"  readonly />
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-4">
                        <label for="formFileLg" class="form-label">Secondary Track Type</label> 
                    </div>
                    <div class="col-sm-8">
                        <input type="radio" name="secondary_track_type" value="1" <?php if($row['secondary_track_type']=="1"){echo "checked";} ?> > Original 
                        <input type="radio" name="secondary_track_type" value="2" <?php if($row['secondary_track_type']=="2"){echo "checked";} ?>> Karaoke 
                        <input type="radio" name="secondary_track_type" value="3" <?php if($row['secondary_track_type']=="3"){echo "checked";} ?>> Madley 
                        <input type="radio" name="secondary_track_type" value="4" <?php if($row['secondary_track_type']=="4"){echo "checked";} ?>> Cover 
                       <!--  <input type="radio" name="secondary_track_type" value="5" <?php if($row['instrumental']=="5"){echo "checked";} ?>> Cover by Cive -->
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-4">
                        <label for="formFileLg" class="form-label">Instrumental</label> 
                    </div>
                    <div class="col-sm-8">
                        <input type="radio" name="instrumental" value="Yes" <?php if($row['instrumental']=="Yes"){echo "checked";} ?> > YES
                        <input type="radio" name="instrumental" value="No" <?php if($row['instrumental']=="No"){echo "checked";} ?>> No
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-4">
                        <label for="formFileLg" class="form-label">Title</label> 
                    </div>
                    <div class="col-sm-8">
                        <input class="form-control form-control-lg" id="formFileLg" name="title" value="<?php echo $row['title']; ?>" type="text" />
                    </div>
                </div>

            <?php   $primary_artist=$row['primary_artist'];
                    $primary_artist=explode(",",$primary_artist); 
                    if($primary_artist){ $pr=1;
                        foreach($primary_artist as $primary_artist){?>
                <div id="row" class="row mb-3">
                    <div class="col-sm-4">
                        <label for="formFileLg" class="form-label">Primary Artist</label> 
                    </div>
                    <div class="col-sm-8">
                        <div class="input-group">
                            <div class="input-group-prepend"><button class="btn btn-danger" id="Deleteprimary_artistRow" type="button"><i class="fa fa-trash"></i></button></div>
                            <input type="text" name="primary_artist[]" class="form-control m-input" value="<?php echo $primary_artist; ?>">
                            <?php if($pr==1){$pr++?><button id="rowprimary_artistAdder" type="button" class="btn btn-dark">
                            <span class="fa fa-plus"> </span></button><?php }?>
                        </div>
                    </div>
                </div>
                <div id="newprimary_artistinput"></div>
            <?php } }else{ ?>
                <div id="row" class="row mb-3">
                    <div class="col-sm-4">
                        <label for="formFileLg" class="form-label">Primary Artist*</label> 
                    </div>
                    <div class="col-sm-8">
                        <div class="input-group">
                            <input type="text" name="primary_artist[]" class="form-control m-input" required><button id="rowprimary_artistAdder" type="button" class="btn btn-dark">
                                <span class="fa fa-plus"> </span></button>
                        </div>
                    </div>
                </div>
                <div id="newprimary_artistinput"></div>
                <?php } ?>

                <?php   $release_author=$row['author'];
                    $release_author=explode(",",$release_author); 
                    if($release_author){ $pr=1;
                        foreach($release_author as $release_author){?>
                <div id="row" class="row mb-3">
                    <div class="col-sm-4">
                        <label for="formFileLg" class="form-label">Author</label> 
                    </div>
                    <div class="col-sm-8">
                        <div class="input-group">
                            <div class="input-group-prepend"><button class="btn btn-danger" id="Deleterelease_authorRow" type="button"><i class="fa fa-trash"></i></button></div>
                            <input type="text" name="release_author[]" class="form-control m-input" value="<?php echo $release_author; ?>">
                            <?php if($pr==1){$pr++?><button id="rowrelease_authorAdder" type="button" class="btn btn-dark">
                            <span class="fa fa-plus"> </span></button><?php }?>
                        </div>
                    </div>
                </div>
                <div id="newrelease_authorinput"></div>
                <?php } }else{ ?>
                <div id="row" class="row mb-3">
                    <div class="col-sm-4">
                        <label for="formFileLg" class="form-label">Author*</label> 
                    </div>
                    <div class="col-sm-8">
                        <div class="input-group">
                            <input type="text" name="release_author[]" class="form-control m-input" required><button id="rowrelease_authorAdder" type="button" class="btn btn-dark">
                                <span class="fa fa-plus"> </span></button>
                        </div>
                    </div>
                </div>
                <div id="newrelease_authorinput"></div>
                <?php } ?>

                <?php   $release_composer=$row['composer'];
                    $release_composer=explode(",",$release_composer); 
                    if($release_composer){ $pr=1;
                        foreach($release_composer as $release_composer){?>
                <div id="row" class="row mb-3">
                    <div class="col-sm-4">
                        <label for="formFileLg" class="form-label">Composer</label> 
                    </div>
                    <div class="col-sm-8">
                        <div class="input-group">
                            <div class="input-group-prepend"><button class="btn btn-danger" id="Deleterelease_composerRow" type="button"><i class="fa fa-trash"></i></button></div>
                            <input type="text" name="release_composer[]" class="form-control m-input" value="<?php echo $release_composer; ?>">
                            <?php if($pr==1){$pr++?><button id="rowrelease_composerAdder" type="button" class="btn btn-dark">
                            <span class="fa fa-plus"> </span></button><?php }?>
                        </div>
                    </div>
                </div>
                <div id="newrelease_composerinput"></div>
                <?php } }else{ ?>
                <div id="row" class="row mb-3">
                    <div class="col-sm-4">
                        <label for="formFileLg" class="form-label">Composer*</label> 
                    </div>
                    <div class="col-sm-8">
                        <div class="input-group">
                            <input type="text" name="release_composer[]" class="form-control m-input" required><button id="rowrelease_composerAdder" type="button" class="btn btn-dark">
                                <span class="fa fa-plus"> </span></button>
                        </div>
                    </div>
                </div>
                <div id="newrelease_composerinput"></div>
                <?php } ?>

                <div class="row mb-3">
                    <div class="col-sm-4">
                        <label for="formFileLg" class="form-label">Arranger</label> 
                    </div>
                    <div class="col-sm-8">
                        <input class="form-control form-control-lg" id="formFileLg" name="arranger" value="<?php echo $row['arranger']; ?>" type="text" />
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-4">
                        <label for="formFileLg" class="form-label">Producer</label> 
                    </div>
                    <div class="col-sm-8">
                        <input class="form-control form-control-lg" id="formFileLg" name="producer" value="<?php echo $row['producer']; ?>" type="text" />
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-4">
                        <label for="formFileLg" class="form-label">P.line</label> 
                    </div>
                    <div class="col-sm-8">
                        <input class="form-control form-control-lg" id="formFileLg" name="p_line" value="<?php echo $row['p_line']; ?>" type="text" />
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-4">
                        <label for="formFileLg" class="form-label">Production Year</label> 
                    </div>
                    <div class="col-sm-8">
                        <input class="form-control form-control-lg" id="formFileLg" name="production_year" value="<?php echo $row['production_year']; ?>" type="text" />
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-4">
                        <label for="formFileLg" class="form-label">Publisher</label> 
                    </div>
                    <div class="col-sm-8">
                        <input class="form-control form-control-lg" id="formFileLg" name="publisher" value="<?php echo $row['publisher']; ?>" type="text" />
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-4">
                        <label for="formFileLg" class="form-label">Ask to generate an ISRC</label> 
                    </div>
                    <div class="col-sm-8">
                        <input type="radio" name="ask_to_generate_an_irsc" value="Yes" <?php if($row['ask_to_generate_an_irsc']=="Yes"){echo "checked";} ?> > YES
                        <input type="radio" name="ask_to_generate_an_irsc" value="No" <?php if($row['ask_to_generate_an_irsc']=="No"){echo "checked";} ?>> No
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-4">
                        <label for="formFileLg" class="form-label">Genre</label> 
                    </div>
                    <div class="col-sm-8">
                        <select id="genre" name="genre" class="form-control" required>
                            <?php if($row['genre']){ ?> 
                                <option value="<?php echo $row['genre'];?>" selected><?php echo $row['genre'];?></option>
                            <?php } ?>
                            <option value="">Select the Genre</option>
                            <option value="Blues">Blues</option>
                            <option value="Easy listening">Easy listening</option>
                            <option value="Electronic">Electronic</option>
                            <option value="Contemporary folk">Contemporary folk</option>
                            <option value="Hip hop">Hip hop</option>
                            <option value="Jazz">Jazz</option>
                            <option value="Pop">Pop</option>
                            <option value="R&B and soul">R&B and soul</option>
                            <option value="Rock">Rock</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-4">
                        <label for="formFileLg" class="form-label">Subgenre</label> 
                    </div>
                    <div class="col-sm-8">
                        <input class="form-control form-control-lg" name="subgenre" value="<?php echo $row['subgenre']; ?>" type="text" />
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-4">
                        <label for="formFileLg" class="form-label">Secondary genre</label> 
                    </div>
                    <div class="col-sm-8">
                        <input class="form-control form-control-lg" name="secondary_genre" value="<?php echo $row['secondary_genre']; ?>" type="text" />
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-4">
                        <label for="formFileLg" class="form-label">Parental Advisory</label> 
                    </div>
                    <div class="col-sm-8">
                        <input type="radio" name="parental_advisory" value="Yes" <?php if($row['parental_advisory']=="Yes"){echo "checked";} ?> > YES
                        <input type="radio" name="parental_advisory" value="No" <?php if($row['parental_advisory']=="No"){echo "checked";} ?>> No
                    </div>
                </div>
                
                <div class="row mb-3">
                    <div class="col-sm-4">
                        <label for="formFileLg" class="form-label">Track title Language</label> 
                    </div>
                    <div class="col-sm-8">
                        <input class="form-control form-control-lg" name="track_title_language" value="<?php echo $row['track_title_language']; ?>" type="text" />
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-4">
                        <label for="formFileLg" class="form-label">Lyrics Language</label> 
                    </div>
                    <div class="col-sm-8">
                        <input class="form-control form-control-lg" name="lyrics_language" value="<?php echo $row['lyrics_language']; ?>" type="text" />
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-4">
                        <label for="formFileLg" class="form-label">Lyrics</label> 
                    </div>
                    <div class="col-sm-8">
                        <input class="form-control form-control-lg" name="lyrics" value="<?php echo $row['lyrics']; ?>" type="text" />
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="editsong" class="btn btn-primary">Save changes</button>
            </div>
        </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>



<div id="myModDel<?php echo $g;?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myModalLabel">Delete Songs</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
            <form action="editrelease-multiple?id=<?php echo $track_id;?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row mb-3">
                       <label class="form-control form-control-lg">Are you sure to delete the Song?</label>
                        <input name="id" value="<?php echo $row['id']; ?>"  type="hidden"/>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                    <button type="submit" name="deletesong" class="btn btn-primary waves-effect waves-light">Ok</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $g++;}}?>
<?php include('preload/footer.php');?>      