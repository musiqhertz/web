  <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                2022 © Musiqapp.
                            </div>
                            <div class="col-sm-6">
                                <div class="text-sm-right d-none d-sm-block">
                                    Developed <i class="mdi mdi-heart text-danger"></i> by <a href="www.repunext.com">Repunext</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <div class="rightbar-overlay"></div>
        <script src="<?php echo $base_url; ?>assets/libs/jquery/jquery.min.js"></script>
        <script src="<?php echo $base_url; ?>assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script><script src="<?php echo $base_url; ?>assets/libs/air-datepicker/js/datepicker.min.js"></script>
        <script src="<?php echo $base_url; ?>assets/libs/air-datepicker/js/i18n/datepicker.en.js"></script>
        <script src="<?php echo $base_url; ?>assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="<?php echo $base_url; ?>assets/libs/simplebar/simplebar.min.js"></script>
        <script src="<?php echo $base_url; ?>assets/libs/node-waves/waves.min.js"></script>

        <script src="https://unicons.iconscout.com/release/v2.0.1/script/monochrome/bundle.js"></script>

        <script src="<?php echo $base_url; ?>assets/libs/jquery-knob/jquery.knob.min.js"></script>
        <script src="<?php echo $base_url; ?>assets/js/pages/jquery-knob.init.js"></script>
        <script src="<?php echo $base_url; ?>assets/js/app.js"></script>
        <script src="<?php echo $base_url; ?>assets/libs/dropzone/min/dropzone.min.js"></script>
          <!-- Required datatable js -->
        <script src="<?php echo $base_url; ?>assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="<?php echo $base_url; ?>assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
        <!-- Buttons examples -->
        <script src="<?php echo $base_url; ?>assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
        <script src="<?php echo $base_url; ?>assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
        <script src="<?php echo $base_url; ?>assets/libs/jszip/jszip.min.js"></script>
        <script src="<?php echo $base_url; ?>assets/libs/pdfmake/build/pdfmake.min.js"></script>
        <script src="<?php echo $base_url; ?>assets/libs/pdfmake/build/vfs_fonts.js"></script>
        <script src="<?php echo $base_url; ?>assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
        <script src="<?php echo $base_url; ?>assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
        <script src="<?php echo $base_url; ?>assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>
        <!-- Responsive examples -->
        <script src="<?php echo $base_url; ?>assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script src="<?php echo $base_url; ?>assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
        <script src="<?php echo $base_url; ?>assets/js/pages/dashboard.init.js"></script>
        <script src="<?php echo $base_url; ?>assets/js/app.js"></script>
        <!-- Datatable init js -->
        
        <script src="<?php echo $base_url; ?>assets/js/pages/datatables.init.js"></script>

<script type="text/javascript">
    $(function () {
        $("#songrelease").change(function () {
            if ($(this).val() == "multiple_songs") {
                $("#release_details").show();
            } else {
                $("#release_details").hide();
            }
        });
    });
</script>
<script type="text/javascript">
    // add row
    $("#addRow").click(function () {
        var html = '';
        html += '<div id="inputFormRow">';
        html += '<div class="form-group row"><label for="example-search-input" class="col-md-2 col-form-label">Song Name</label> <div class="col-md-10"> <input class="form-control" type="text" name="song_name[]" > </div></div>';
        html += '<div class="form-group row"><label for="example-search-input" class="col-md-2 col-form-label">UPC</label><div class="col-md-10"><input class="form-control" type="text" name="upc[]" ></div></div>';
        html += '<div class="form-group row"><label for="example-email-input" class="col-md-2 col-form-label">Type Of Release</label><div class="col-md-10"><select id="type_of_release" name="type_of_release[]" class="form-control" ><option value="">Select the Release Type</option><option value="Orginal">Orginal</option><option value="Remix">Remix</option><option value="Cover">Cover</option></select></div></div>';
        html += '<div class="form-group row"><label for="example-email-input" class="col-md-2 col-form-label">Language</label><div class="col-md-10"><select id="language" name="language[]" class="form-control" ><option value="">Select the Language</option><option value="Arabic">Arabic</option><option value="Bengali">Bengali</option> <option value="Cambodian">Cambodian</option>  <option value="Dutch">Dutch</option>  <option value="English">English</option> <option value="Kannada">Kannada</option> <option value="French">French</option>  <option value="German">German</option>  <option value="Greek">Greek</option>  <option value="Gujarati">Gujarati</option>  <option value="Hindi">Hindi</option>  <option value="Latin">Latin</option>  <option value="Malay">Malay</option>  <option value="Malayalam">Malayalam</option>  <option value="Marathi">Marathi</option>  <option value="Nepali">Nepali</option>  <option value="Persian">Persian</option>  <option value="Punjabi">Punjabi</option>  <option value="Spanish">Spanish</option>  <option value="Tamil">Tamil</option>  <option value="Telugu">Telugu</option>  <option value="Tibetan">Tibetan</option>  <option value="Urdu">Urdu</option></select></div></div>';
        html += '<div class="form-group row"><label for="example-email-input" class="col-md-2 col-form-label">Genre / Catergory</label> <div class="col-md-10"> <select id="genre" name="genre[]" class="form-control" > <option value="">Select the Genre</option> <option value="Blues">Blues</option> <option value="Easy listening">Easy listening</option> <option value="Electronic">Electronic</option> <option value="Contemporary folk">Contemporary folk</option> <option value="Hip hop">Hip hop</option> <option value="Jazz">Jazz</option> <option value="Pop">Pop</option> <option value="R&B and soul">R&B and soul</option> <option value="Rock">Rock</option> </select> </div></div>';
        html +='<div class="form-group row"> <label for="example-email-input" class="col-md-2 col-form-label">Sub Catergory</label> <div class="col-md-10"> <select id="sub_catergory" name="sub_catergory[]" class="form-control" > <option value="">Select the Sub Catergory</option> <option value="Blues">Blues</option> <option value="Easy listening">Easy listening</option> <option value="Electronic">Electronic</option> <option value="Contemporary folk">Contemporary folk</option> <option value="Hip hop">Hip hop</option> <option value="Jazz">Jazz</option> <option value="Pop">Pop</option> <option value="R&B and soul">R&B and soul</option> <option value="Rock">Rock</option> </select> </div> </div> <div class="form-group row"> <label for="example-search-input" class="col-md-2 col-form-label">Song Description</label> <div class="col-md-10"> <textarea class="form-control" name="song_description[]"></textarea> </div> </div> <div class="form-group row"> <label for="example-text-input" class="col-md-2 col-form-label">Release Date</label> <div class="col-md-10"><input class="form-control"  type="date" name="release_date[]" >  </div> </div> <div class="form-group row"> <label for="example-search-input" class="col-md-2 col-form-label">Owned / Exclusive License</label> <div class="col-md-10"> <input class="form-control" type="text" name="owned_exclusive_license[]" > </div> </div> <div class="form-group row"> <label for="example-search-input" class="col-md-2 col-form-label">Album Id</label> <div class="col-md-10"> <input class="form-control" type="text" name="album_id[]" > </div> </div> <div class="form-group row"> <label for="example-search-input" class="col-md-2 col-form-label">ISRC</label> <div class="col-md-10"> <input class="form-control" type="text" name="isrc[]" > </div> </div> <div class="form-group row"> <label for="example-search-input" class="col-md-2 col-form-label">Label</label> <div class="col-md-10"> <input class="form-control" type="text" name="label[]" > </div> </div> <div class="form-group row"> <label for="example-search-input" class="col-md-2 col-form-label">Singer Name</label> <div class="col-md-10"> <input class="form-control" type="text" name="singer_name[]" > </div> </div> <div class="form-group row"> <label for="example-search-input" class="col-md-2 col-form-label">Lyricist</label> <div class="col-md-10"> <input class="form-control" type="text" name="lyricist[]" > </div> </div> <div class="form-group row"> <label for="example-search-input" class="col-md-2 col-form-label">ARTIST</label> <div class="col-md-10"> <input class="form-control" type="text" name="artist[]" > </div> </div> <div class="form-group row"> <label for="example-search-input" class="col-md-2 col-form-label">NAME OF OWNER OF SOUND RECORDING COPYRIGHTS</label> <div class="col-md-10"> <input class="form-control" type="text" name="name_of_owner_song[]" > </div> </div> <div class="form-group row"> <label for="example-search-input" class="col-md-2 col-form-label">NAME OF OWNER OF COPYRIGHTS IN MUSICAL & LYRIC WORKS</label> <div class="col-md-10"> <input class="form-control" type="text" name="name_of_owner_music[]" > </div> </div> <div class="form-group row"> <label for="example-search-input" class="col-md-2 col-form-label">ACTOR </label> <div class="col-md-10"> <input class="form-control" type="text" name="actor[]" > </div> </div> <div class="form-group row"> <label for="example-search-input" class="col-md-2 col-form-label">DIRECTOR</label> <div class="col-md-10"> <input class="form-control" type="text" name="director[]" > </div> </div> <div class="form-group row"> <label for="example-search-input" class="col-md-2 col-form-label">PRODUCER</label> <div class="col-md-10"> <input class="form-control" type="text" name="producer[]" > </div> </div> <div class="form-group row"> <label for="example-search-input" class="col-md-2 col-form-label">Upload Song</label> <div class="col-md-10"> <input class="form-control" type="file" name="song[]" > </div> </div> <div class="form-group row"> <label for="example-search-input" class="col-md-2 col-form-label">Upload Poster (3000X3000Px)(Png/JPEG)</label> <div class="col-md-10"> <input class="form-control" type="file" name="poster_name[]" > </div> </div> <div class="form-group row"> <label for="example-search-input" class="col-md-2 col-form-label">Deployment</label> <div class="col-md-10"> <select id="deployment" name="deployment[]" class="form-control" > <option value="">Select the Deployment</option> <option value="Gaana">Gaana</option><option value="Amazon IN">Amazon IN</option><option value="Amazon WW-IN">Amazon WW-IN</option><option value="JioSaavn">JioSaavn</option><option value="AtlantisCRBT">AtlantisCRBT</option><option value="Jio CRBT">Jio CRBT</option><option value="Wynk">Wynk</option><option value="iTunes">iTunes</option><option value="Tiktok ByteDance">Tiktok ByteDance</option><option value="Spotify">Spotify</option><option value="Audible Magic">Audible Magic</option><option value="AWA Co Ltd">AWA Co Ltd</option><option value="Deezer">Deezer</option><option value="Facebook_AAP WW">Facebook_AAP WW</option><option value="Facebook_SRP WW">Facebook_SRP WW</option><option value="Jaxsta">Jaxsta</option><option value="KKBOX Taiwan Co Ltd">KKBOX Taiwan Co Ltd</option><option value="Mixcloud Ltd">Mixcloud Ltd</option><option value="Netease">Netease</option><option value="Pandora">Pandora</option><option value="RESSO-Bytedance">RESSO-Bytedance</option><option value="SoundCloud">SoundCloud</option><option value="iHeart Radio">iHeart Radio</option><option value="Boomplay">Boomplay</option><option value="Kuack Media Group Corp">Kuack Media Group Corp</option><option value="Napster">Napster</option><option value="iMusicaCorp">iMusicaCorp</option><option value="TouchTunes">TouchTunes</option></select> </div> </div>';
        /*html +=' <div class="form-group row"> <label for="example-text-input" class="col-md-2 col-form-label">Youtube Content Id</label> <div class="col-md-10"> <div class="form-check form-check-inline"> <input class="form-check-input" type="radio" name="youtube_content_id[]" id="releaseradio[]" value="yes" checked=""> <label class="form-check-label" for="releaseradio[]">Yes</label> </div> <div class="form-check form-check-inline"> <input class="form-check-input" type="radio" name="youtube_content_id[]" id="releaseradio[]" value="no" > <label class="form-check-label" for="releaseradio[]">No</label> </div> </div> </div>';*/
         html += '<div class="input-group-append">';
        html += '<button id="removeRow" type="button" class="btn btn-danger">Remove</button>';
        html += '</div><hr></div>';

        $('#newRow').append(html);
    });

    
</script>
<script type="text/javascript">
    $("#rowprimaryartistAdder").click(function () {
        newprimaryartistRowAdd =
        '<div id="row" class="row mb-3"><label for="example-text-input" class="col-sm-2 col-form-label">Primary Artist</label><div class="col-sm-4"><div class="input-group "><div class="input-group-prepend"><button class="btn btn-danger" id="DeleteprimaryartistRow" type="button"><i class="fa fa-trash"></i></button></div><input type="text" class="form-control m-input" name="primaryartist[]"></div></div></div>';

        $('#newprimaryartistinput').append(newprimaryartistRowAdd);
    });
    $("body").on("click", "#DeleteprimaryartistRow", function () {
        $(this).parents("#row").remove();
    });
    $("#rowAuthorAdder").click(function () {
        newAuthorRowAdd =
        '<div id="row" class="row mb-3"><label for="example-text-input" class="col-sm-2 col-form-label">Author(Lyric Writer)</label><div class="col-sm-4"><div class="input-group "><div class="input-group-prepend"><button class="btn btn-danger" id="DeleteAuthorRow" type="button"><i class="fa fa-trash"></i></button></div><input type="text" class="form-control m-input" name="author[]"></div></div></div>';

        $('#newAuthorinput').append(newAuthorRowAdd);
    });
    $("body").on("click", "#DeleteAuthorRow", function () {
        $(this).parents("#row").remove();
    });
    $("#rowComposerAdder").click(function () {
        newComposerRowAdd =
        '<div id="row" class="row mb-3"><label for="example-text-input" class="col-sm-2 col-form-label">Composer(Lyric Writer)</label><div class="col-sm-4"><div class="input-group "><div class="input-group-prepend"><button class="btn btn-danger" id="DeleteComposerRow" type="button"><i class="fa fa-trash"></i></button></div><input type="text" class="form-control m-input" name="composer[]"></div></div></div>';

        $('#newComposerinput').append(newComposerRowAdd);
    });
    $("body").on("click", "#DeleteComposerRow", function () {
        $(this).parents("#row").remove();
    });

    $("#rowprimaryartistAdderfinal").click(function () {
        newprimaryartistRowAdd =
        '<div id="row" class="row mb-3"><label for="example-text-input" class="col-sm-2 col-form-label">Primary Artist</label><div class="col-sm-4"><div class="input-group "><div class="input-group-prepend"><button class="btn btn-danger" id="DeleteprimaryartistRowfinal" type="button"><i class="fa fa-trash"></i></button></div><input type="text" class="form-control m-input" name="primaryartist[]"></div></div></div>';

        $('#newprimaryartistinputfinal').append(newprimaryartistRowAdd);
    });
    $("body").on("click", "#DeleteprimaryartistRowfinal", function () {
        $(this).parents("#row").remove();
    });
    $("#rowAuthorAdderfinal").click(function () {
        newAuthorRowAdd =
        '<div id="row" class="row mb-3"><label for="example-text-input" class="col-sm-2 col-form-label">Author(Lyric Writer)</label><div class="col-sm-4"><div class="input-group "><div class="input-group-prepend"><button class="btn btn-danger" id="DeleteAuthorRowfinal" type="button"><i class="fa fa-trash"></i></button></div><input type="text" class="form-control m-input" name="author[]"></div></div></div>';

        $('#newAuthorinputfinal').append(newAuthorRowAdd);
    });
    $("body").on("click", "#DeleteAuthorRowfinal", function () {
        $(this).parents("#row").remove();
    });
    $("#rowComposerAdderfinal").click(function () {
        newComposerRowAdd =
        '<div id="row" class="row mb-3"><label for="example-text-input" class="col-sm-2 col-form-label">Composer(Lyric Writer)</label><div class="col-sm-4"><div class="input-group "><div class="input-group-prepend"><button class="btn btn-danger" id="DeleteComposerRowfinal" type="button"><i class="fa fa-trash"></i></button></div><input type="text" class="form-control m-input" name="composer[]"></div></div></div>';

        $('#newComposerinputfinal').append(newComposerRowAdd);
    });
    $("body").on("click", "#DeleteComposerRowfinal", function () {
        $(this).parents("#row").remove();
    });




    $("#rowprimary_artistAdder").click(function () {
        newprimary_artistRowAdd =
        '<div id="row" class="row mb-3"><div class="col-sm-4"><label for="formFileLg" class="form-label">Primary Artist</label></div><div class="col-sm-8"><div class="input-group"><div class="input-group-prepend"><button class="btn btn-danger" id="Deleteprimary_artistRow" type="button"><i class="fa fa-trash"></i></button></div><input type="text" name="primary_artist[]" class="form-control m-input" ></div></div></div>';

        $('#newprimary_artistinput').append(newprimary_artistRowAdd);
    });
    $("body").on("click", "#Deleteprimary_artistRow", function () {
        $(this).parents("#row").remove();
    });
    $("#rowrelease_authorAdder").click(function () {
        newrelease_authorRowAdd =
        '<div id="row" class="row mb-3"><div class="col-sm-4"><label for="formFileLg" class="form-label">Author</label></div><div class="col-sm-8"><div class="input-group"><div class="input-group-prepend"><button class="btn btn-danger" id="Deleterelease_authorRow" type="button"><i class="fa fa-trash"></i></button></div><input type="text" name="release_author[]" class="form-control m-input" ></div></div></div>';

        $('#newrelease_authorinput').append(newrelease_authorRowAdd);
    });
    $("body").on("click", "#Deleterelease_authorRow", function () {
        $(this).parents("#row").remove();
    });
    $("#rowrelease_composerAdder").click(function () {
        newrelease_composerRowAdd =
        '<div id="row" class="row mb-3"><div class="col-sm-4"><label for="formFileLg" class="form-label">Composer</label></div><div class="col-sm-8"><div class="input-group"><div class="input-group-prepend"><button class="btn btn-danger" id="Deleterelease_composerRow" type="button"><i class="fa fa-trash"></i></button></div><input type="text" name="release_composer[]" class="form-control m-input" ></div></div></div>';

        $('#newrelease_composerinput').append(newrelease_composerRowAdd);
    });
    $("body").on("click", "#Deleterelease_composerRow", function () {
        $(this).parents("#row").remove();
    });
    </script>
    </body>
</html>