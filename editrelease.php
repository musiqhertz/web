<?php error_reporting(0);
    session_start();
    include 'connect.php';
    $username=@$_SESSION['username'];
    $user_id=@$_SESSION['user_id'];
    $id=@$_POST['id'];
    if(isset($_POST['update'])){
        $date=@$_POST['date'];
        $id=@$_POST['id'];
        $songrelease=@$_POST['songrelease'];
        $song_name=@$_POST['song_name'];
        $type_of_release=@$_POST['type_of_release'];
        $language=@$_POST['language'];
        $genre=@$_POST['genre'];
        $sub_catergory=@$_POST['sub_catergory'];
        $song_description=@$_POST['song_description'];
        $release_date=@$_POST['release_date'];
        $owned_exclusive_license=@$_POST['owned_exclusive_license'];   
        $album_id=@$_POST['album_id'];
        $isrc=@$_POST['isrc'];
        $label=@$_POST['label'];
        $singer_name=@$_POST['singer_name'];
        $lyricist=@$_POST['lyricist'];
        $artist=@$_POST['artist'];
        $name_of_owner_song=@$_POST['name_of_owner_song'];
        $name_of_owner_music=@$_POST['name_of_owner_music'];
        $actor=@$_POST['actor'];
        $director=@$_POST['director'];
        $producer=@$_POST['producer'];
        $song=@$_POST['song'];
        $poster_name=@$_POST['poster_name'];
        $deployment=@$_POST['deployment'];
        
        $query="UPDATE songrelease SET date='$date',songrelease='$songrelease',song_name='$song_name',type_of_release='$type_of_release',language='$language',genre='$genre',sub_catergory='$sub_catergory',song_description='$song_description',release_date='$release_date',owned_exclusive_license='$owned_exclusive_license',album_id='$album_id',isrc='$isrc',label='$label',singer_name='$singer_name',lyricist='$lyricist',artist='$artist',name_of_owner_song='$name_of_owner_song',name_of_owner_music='$name_of_owner_music',actor='$actor',director='$director',producer='$producer',song='$song',poster_name='$poster_name',deployment='$deployment' WHERE id='$id'" ;
        mysqli_query($connect,$query);
        $msg = 'Your data is successfully updated';
        header('Location:edit-release');
        echo '<script type="text/javascript">window.location.href="edit-release";</script>';
    }
    else{
        $checkdata="select * from songrelease where id='".$id."'";
        $query=mysqli_query($connect,$checkdata);
        if(mysqli_num_rows($query)!=0){
            while($row= mysqli_fetch_assoc($query)){
                $date=$row['date'];
                $emailid=$row['email'];
                $songrelease=$row['songrelease'];
                $song_name=$row['song_name'];
                $type_of_release=$row['type_of_release'];
                $language=$row['language'];
                $genre=$row['genre'];
                $sub_catergory=$row['sub_catergory'];
                $song_description=$row['song_description'];
                $release_date=$row['release_date'];
                $owned_exclusive_license=$row['owned_exclusive_license'];   
                $album_id=$row['album_id'];
                $isrc=$row['isrc'];
                $label=$row['label'];
                $singer_name=$row['singer_name'];
                $lyricist=$row['lyricist'];
                $artist=$row['artist'];
                $name_of_owner_song=$row['name_of_owner_song'];
                $name_of_owner_music=$row['name_of_owner_music'];
                $actor=$row['actor'];
                $director=$row['director'];
                $producer=$row['producer'];
                $song=$row['song'];
                $poster_name=$row['poster_name'];
                $deployment=$row['deployment'];
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
                            <form name="submit" action="editrelease" method="post" enctype="multipart/form-data">
                            <input name="id" type="hidden" id="id" value="<?php echo $id; ?>" required/>
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Date</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="date" value="<?php echo $date; ?>" >
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Song Name</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="song_name" value="<?php echo $song_name; ?>" >
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Type Of Release</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="type_of_release" value="<?php echo $type_of_release; ?>" >
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Language</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="language" value="<?php echo $language; ?>" >
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Genre</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="genre" value="<?php echo $genre; ?>" >
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Sub Catergory</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="sub_catergory" value="<?php echo $sub_catergory; ?>" >
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Song Description</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="song_description" value="<?php echo $song_description; ?>" >
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Release Date</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="release_date" value="<?php echo $release_date; ?>" >
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Owned Exclusive License</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="owned_exclusive_license" value="<?php echo $owned_exclusive_license; ?>" >
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Album Id</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="album_id" value="<?php echo $album_id; ?>" >
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Isrc </label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="isrc" value="<?php echo $isrc; ?>" >
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Label</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="label" value="<?php echo $label; ?>" >
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Singer Name</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="singer_name" value="<?php echo $singer_name; ?>" >
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Lyricist</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="lyricist" value="<?php echo $lyricist; ?>" >
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Artist</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="artist" value="<?php echo $artist; ?>" >
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">    Name Of Owner Song</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="name_of_owner_song" value="<?php echo $name_of_owner_song; ?>" >
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">    Name Of Owner Music</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="name_of_owner_music" value="<?php echo $name_of_owner_music; ?>" >
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">    Actor</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="actor" value="<?php echo $actor; ?>" >
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">    Director</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="director" value="<?php echo $director; ?>" >
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">    Producer</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="producer" value="<?php echo $producer; ?>" >
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">    Song</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="song" value="<?php echo $song; ?>" >
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">    Poster Name</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="poster_name" value="<?php echo $poster_name; ?>" >
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">    Deployment</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="deployment" value="<?php echo $deployment; ?>" >
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
              
