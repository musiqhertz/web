 <?php error_reporting(0);session_start(); // $base_url=" http://localhost/musiqapp.beatseoanalyzer.com/";
       $base_url="https://musiqapp.bestseoanalyzer.in/"; ?> 
<link rel="shortcut icon" href="<?php echo $base_url; ?>assets/images/favicon.ico">
<link href="<?php echo $base_url; ?>assets/libs/dropzone/min/dropzone.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $base_url; ?>assets/libs/air-datepicker/css/datepicker.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $base_url; ?>assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $base_url; ?>assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $base_url; ?>assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" /> 
<link href="<?php echo $base_url; ?>assets/libs/jqvmap/jqvmap.min.css" rel="stylesheet" />
<link href="<?php echo $base_url; ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $base_url; ?>assets/css/icons.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $base_url; ?>assets/css/app.min.css" rel="stylesheet" type="text/css" />

<link href="<?php echo $base_url; ?>assets/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
<script src="<?php echo $base_url; ?>assets/sweetalert2/sweetalert2.min.js"></script>
</head>
<body data-topbar="colored">
    <div id="layout-wrapper">
        <header id="page-topbar">
            <div class="navbar-header">
                <div class="d-flex">
                    <div class="navbar-brand-box">
                        <a href="#" class="logo logo-dark">
                            <span class="logo-sm">
                                <img src="<?php echo $base_url; ?>assets/images/logo-sm-dark.png" alt="" height="22">
                            </span>
                            <span class="logo-lg">
                                <img src="<?php echo $base_url; ?>assets/images/logo-dark.png" alt="" height="30">
                            </span>
                        </a>
                        <a href="<?php echo $base_url; ?>" class="logo logo-light">
                            <span class="logo-sm">
                                <img src="<?php echo $base_url; ?>assets/images/logo-sm-light.png" alt="" height="22">
                            </span>
                            <span class="logo-lg">
                                <img src="<?php echo $base_url; ?>assets/images/logo-light.png" alt="" height="20">
                            </span>
                        </a>
                    </div>
                    <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                        <i class="mdi mdi-backburger"></i>
                    </button>
                    <!-- <form class="app-search d-none d-lg-block">
                        <div class="position-relative">
                        <input type="text" class="form-control" placeholder="Search...">
                        <span class="mdi mdi-magnify"></span>
                        </div>
                    </form> -->
                </div>
                <div class="d-flex">
                    <div class="dropdown d-inline-block d-lg-none ml-2">
                        <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="mdi mdi-magnify"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0" aria-labelledby="page-header-search-dropdown">
                            <form class="p-3">
                                <div class="form-group m-0">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="rounded-circle header-profile-user" src="<?php echo $base_url; ?>assets/images/users/<?php if($_SESSION["profileimg"]){ echo $_SESSION['profileimg'];}else{echo "profile-img-default.jpg";}?>" alt="Header Avatar">
                                <span class="d-none d-sm-inline-block ml-1"><?php echo ucwords($_SESSION['username']);  ?></span>
                                <i class="mdi mdi-chevron-down d-none d-sm-inline-block"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right"> 
                                <a class="dropdown-item" href="<?php echo $base_url; ?>profile"><i class="mdi mdi-face-profile font-size-16 align-middle mr-1"></i> Profile</a>
                                <a class="dropdown-item" href="<?php echo $base_url; ?>subscription"><i class="mdi mdi-credit-card-outline font-size-16 align-middle mr-1"></i> Subscription</a>
                                <a class="dropdown-item" href="<?php echo $base_url; ?>wallet"><i class="mdi mdi-account-settings font-size-16 align-middle mr-1"></i> Wallet</a>
                                <a class="dropdown-item" href="<?php echo $base_url; ?>kyc-document"><i class="mdi mdi-credit-card-outline font-size-16 align-middle mr-1"></i> KYC Docments</a>
                                <a class="dropdown-item" href="<?php echo $base_url; ?>change-password"><i class="mdi mdi-lock font-size-16 align-middle mr-1"></i> Change Password</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?php echo $base_url; ?>logout"><i class="mdi mdi-logout font-size-16 align-middle mr-1"></i> Logout</a>
                            </div>
                        </div>
                    </div>
                </div>

            </header>