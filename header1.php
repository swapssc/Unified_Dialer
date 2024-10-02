<?php
session_start();
$page = "";
if(isset($_GET['page'])){
    $page = $_GET['page'];
}
    $filename = basename($_SERVER['REQUEST_URI']);
    if(strpos($filename, "?")){
        $tmp_filename = explode("?", $filename);
        $filename = $tmp_filename[0];
    }
?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="description" content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>Vuexy</title>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="apple-touch-icon" href="app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/vendors.min.css">
    <!-- END: Vendor CSS-->
    <style>
        .mobileshow { 
display:none; 
}
@media screen and (max-width: 500px) {
.mobileshow { 
display:block; }
}
    </style>
    <script>
        window.onload = () => {
            if(window.innerWidth < 500){
                document.getElementById("mobile_only").innerHTML = `
                <nav class="header-navbar mobileshow navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow container-xxl">
        <div class="navbar-container d-flex content">
            <div class="bookmark-wrapper d-flex align-items-center">
                <ul class="nav navbar-nav d-xl-none">
                    <li class="nav-item"><a class="nav-link menu-toggle" href="javascript:void(0);"><i class="ficon" data-feather="menu"></i></a></li>
                </ul>
                <!-- <ul class="nav navbar-nav">
                    <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-style"><i class="ficon" data-feather="moon"></i></a></li>
                </ul> -->
            </div>
            <ul class="nav navbar-nav align-items-center ml-auto">
                <!-- <li class="nav-item dropdown dropdown-user"><a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="javascript:void(0);" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="user-nav d-sm-flex d-none"><span class="user-name font-weight-bolder">John Doe</span><span class="user-status">Admin</span></div><span class="avatar"><img class="round" src="app-assets/images/portrait/small/avatar-s-11.jpg" alt="avatar" height="40" width="40"><span class="avatar-status-online"></span></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-user"><a class="dropdown-item" href="javascript:void(0);"><i class="mr-50" data-feather="user"></i> Profile</a><a class="dropdown-item" href="javascript:void(0);"><i class="mr-50" data-feather="mail"></i> Inbox</a><a class="dropdown-item" href="javascript:void(0);"><i class="mr-50" data-feather="check-square"></i> Task</a><a class="dropdown-item" href="javascript:void(0);"><i class="mr-50" data-feather="message-square"></i> Chats</a>
                        <div class="dropdown-divider"></div><a class="dropdown-item" href="javascript:void(0);"><i class="mr-50" data-feather="settings"></i> Settings</a><a class="dropdown-item" href="javascript:void(0);"><i class="mr-50" data-feather="credit-card"></i> Pricing</a><a class="dropdown-item" href="javascript:void(0);"><i class="mr-50" data-feather="help-circle"></i> FAQ</a><a class="dropdown-item" href="javascript:void(0);"><i class="mr-50" data-feather="power"></i> Logout</a>
                    </div>
                </li> -->
            </ul> 
        </div>
      </div>
    </nav>
                `;
                document.getElementById("mobile_only").removeAttribute("style");
                
            } else {
                document.querySelector(".header-navbar-shadow").remove();
                document.querySelector(".content-overlay").remove();
                document.querySelector(".content-wrapper").setAttribute("style", "margin-top:-80px;");
                document.getElementById("mobile_only").remove();
            }
            // alert(window.innerWidth);
        }
    </script>
    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/themes/semi-dark-layout.css">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="app-assets/css/core/menu/menu-types/vertical-menu.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="">

    <!-- BEGIN: Header-->
    <header id="mobile_only" style="display:none;">

    </header>
    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
    <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mr-auto"><a class="navbar-brand" href="../../../starter-kit/ltr/vertical-menu-template/"><span class="brand-logo">
                            <svg viewbox="0 0 139 95" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" height="24">
                                <defs>
                                    <lineargradient id="linearGradient-1" x1="100%" y1="10.5120544%" x2="50%" y2="89.4879456%">
                                        <stop stop-color="#000000" offset="0%"></stop>
                                        <stop stop-color="#FFFFFF" offset="100%"></stop>
                                    </lineargradient>
                                    <lineargradient id="linearGradient-2" x1="64.0437835%" y1="46.3276743%" x2="37.373316%" y2="100%">
                                        <stop stop-color="#EEEEEE" stop-opacity="0" offset="0%"></stop>
                                        <stop stop-color="#FFFFFF" offset="100%"></stop>
                                    </lineargradient>
                                </defs>
                                <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g id="Artboard" transform="translate(-400.000000, -178.000000)">
                                        <g id="Group" transform="translate(400.000000, 178.000000)">
                                            <path class="text-primary" id="Path" d="M-5.68434189e-14,2.84217094e-14 L39.1816085,2.84217094e-14 L69.3453773,32.2519224 L101.428699,2.84217094e-14 L138.784583,2.84217094e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L6.71554594,44.4188507 C2.46876683,39.9813776 0.345377275,35.1089553 0.345377275,29.8015838 C0.345377275,24.4942122 0.230251516,14.560351 -5.68434189e-14,2.84217094e-14 Z" style="fill:currentColor"></path>
                                            <path id="Path1" d="M69.3453773,32.2519224 L101.428699,1.42108547e-14 L138.784583,1.42108547e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L32.8435758,70.5039241 L69.3453773,32.2519224 Z" fill="url(#linearGradient-1)" opacity="0.2"></path>
                                            <polygon id="Path-2" fill="#000000" opacity="0.049999997" points="69.3922914 32.4202615 32.8435758 70.5039241 54.0490008 16.1851325"></polygon>
                                            <polygon id="Path-21" fill="#000000" opacity="0.099999994" points="69.3922914 32.4202615 32.8435758 70.5039241 58.3683556 20.7402338"></polygon>
                                            <polygon id="Path-3" fill="url(#linearGradient-2)" opacity="0.099999994" points="101.428699 0 83.0667527 94.1480575 130.378721 47.0740288"></polygon>
                                        </g>
                                    </g>
                                </g>
                            </svg></span>
                        <h2 class="brand-text">Vuexy</h2>
                    </a>
                   </li>
                <!-- <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i><i class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc" data-ticon="disc"></i></a></li> -->
            </ul>
        </div>
        <div class="shadow-bottom"></div>
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
<li class="<?php if($filename == "index.php"){ echo "active"; } ?> nav-item"><a class="d-flex align-items-center" href="index.php"><i data-feather="home"></i><span class="menu-title text-truncate" data-i18n="Home">Dashboard </span></a>
                                </li>

<li class="nav-item <?php if($filename == "user_roles.php"){ echo "active"; } ?>"><a class="d-flex align-items-center" href="user_roles.php"><i data-feather="users"></i><span class="menu-title text-truncate" data-i18n="users">User Roles</span></a>
                                </li>

<li class="nav-item <?php if ($filename == "process.php") { echo "active"; } ?>"><a class="d-flex align-items-center" href="process.php"><i data-feather="cpu"></i><span class="menu-title text-truncate" data-i18n="cpu">Process</span></a>
                             </li>                                

<li class="<?php if($filename == "users.php"){ echo "active"; } ?> nav-item"><a class="d-flex align-items-center" href="users.php"><i data-feather="user"></i><span class="menu-title text-truncate" data-i18n="user">Users </span></a>
                             </li>

<li class="nav-item <?php if ($filename == "script.php") { echo "active"; } ?>"><a class="d-flex align-items-center" href="script.php"><i data-feather="file-text"></i><span class="menu-title text-truncate" data-i18n="file-text">Script</span></a>
                             </li>

<li class="nav-item <?php if ($filename == "campaign.php") { echo "active"; } ?>"><a class="d-flex align-items-center" href="campaign.php"><i data-feather="grid"></i><span class="menu-title text-truncate" data-i18n="grid">Campaign</span></a>
                             </li>

<li class="nav-item <?php if ($filename == "audio_store.php") { echo "active"; } ?>"><a class="d-flex align-items-center" href="audio_store.php"><i data-feather="headphones"></i><span class="menu-title text-truncate" data-i18n="volume">Audio Store</span></a>
                                     </li>

<li class="nav-item <?php if ($filename == "queue.php") { echo "active"; } ?>"><a class="d-flex align-items-center" href="queue.php"><i data-feather="layers"></i><span class="menu-title text-truncate" data-i18n="layers">Queue</span></a>
</li>

<li class="<?php if($filename == "leads.php"){ echo "active"; } ?> nav-item"><a class="d-flex align-items-center" href="leads.php"><i data-feather="list"></i><span class="menu-title text-truncate" data-i18n="list">Leads </span></a>
</li>
                               
<li class="nav-item <?php if($filename == "incoming_mapping.php"){ echo "active"; } ?>"><a class="d-flex align-items-center" href="incoming_mapping.php"><i data-feather="phone-incoming"></i><span class="menu-title text-truncate" data-i18n="phone-incoming">Incoming Mapping</span></a>
                               </li>

<li class="nav-item <?php if ($filename == "ivr.php") { echo "active"; } ?>"><a class="d-flex align-items-center" href="ivr.php"><i data-feather="speaker"></i><span class="menu-title text-truncate" data-i18n="speaker">IVR</span></a>
</li>


<li class="nav-item <?php if ($filename == "#") { echo "active"; } ?>">
  <a class="d-flex align-items-center" href="#">
    <i data-feather="file"></i>
    <span class="menu-title text-truncate" data-i18n="file">Reports</span>
  </a>
  <ul style="margin-left:10px; font-weight:lighter;">
    <li class="<?php if ($filename == "user_stat.php") { echo "active"; } ?>">
      <a href="user_stat.php">User Stat Report</a>
    </li>
    <!-- <li class="<?php if ($filename == "#") { echo "active"; } ?>">
      <a href="#">Outbound Hourly Report</a>
    </li>
    <li class="<?php if ($filename == "#") { echo "active"; } ?>">
      <a href="#">Outbound Monthly Report</a>
    </li>
    <li class="<?php if ($filename == "#") { echo "active"; } ?>">
      <a href="#">Team Wise Outbound Report</a>
    </li> -->
  </ul>
</li>



            </ul>
        </div>
    </div>
    <!-- END: Main Menu-->
