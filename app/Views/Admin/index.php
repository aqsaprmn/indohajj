<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Indohajj - <?= $title ?></title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" href="<?= base_url() ?>/public/asset/vendor/Atlantis/assets/img/icon.ico" type="image/x-icon" />

    <!-- Fonts and icons -->
    <script src="<?= base_url() ?>/public/asset/vendor/Atlantis/assets/js/plugin/webfont/webfont.min.js"></script>
    <script>
        WebFont.load({
            google: {
                "families": ["Lato:300,400,700,900"]
            },
            custom: {
                "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"],
                urls: ['<?= base_url() ?>/public/asset/vendor/Atlantis/assets/css/fonts.min.css']
            },
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <!-- My CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>/public/asset/css/admin.css">

    <!-- CSS Files -->
    <link rel="stylesheet" href="<?= base_url() ?>/public/asset/vendor/Atlantis/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/public/asset/vendor/Atlantis/assets/css/atlantis.min.css">

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="<?= base_url() ?>/public/asset/vendor/Atlantis/assets/css/demo.css">

    <link rel="stylesheet" href="<?= base_url() ?>/public/asset/vendor/fontawesome/css/all.min.css">

    <script src="<?= base_url() ?>/public/asset/vendor/Atlantis/assets/js/core/jquery.3.2.1.min.js"></script>
</head>

<body data-background-color="dark">
    <div class="wrapper">
        <div class="main-header">
            <!-- Logo Header -->
            <div class="logo-header" data-background-color="dark2">
                <a href="" class="p-1">
                    <div style="width: 120px; height:54px;" class="bg-light rounded">
                        <img src="<?= base_url() ?>/public/asset/img/logoindohajj.png" alt="navbar brand" class="w-100 h-100 py-1 px-2">
                    </div>
                </a>
                <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon">
                        <i class="icon-menu"></i>
                    </span>
                </button>
                <button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
                <div class="nav-toggle">
                    <button class="btn btn-toggle toggle-sidebar">
                        <i class="icon-menu"></i>
                    </button>
                </div>
            </div>
            <!-- End Logo Header -->

            <!-- Navbar Header -->
            <nav class="navbar navbar-header navbar-expand-lg" data-background-color="dark">

                <div class="container-fluid">
                    <!-- <div class="collapse" id="search-nav">
                        <form class="navbar-left navbar-form nav-search mr-md-3">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <button type="submit" class="btn btn-search pr-1">
                                        <i class="fa fa-search search-icon"></i>
                                    </button>
                                </div>
                                <input type="text" placeholder="Search ..." class="form-control">
                            </div>
                        </form>
                    </div> -->
                    <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
                        <!-- <li class="nav-item toggle-nav-search hidden-caret">
                            <a class="nav-link" data-toggle="collapse" href="#search-nav" role="button" aria-expanded="false" aria-controls="search-nav">
                                <i class="fa fa-search"></i>
                            </a>
                        </li>
                        <li class="nav-item dropdown hidden-caret">
                            <a class="nav-link dropdown-toggle" href="#" id="messageDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-envelope"></i>
                            </a>
                            <ul class="dropdown-menu messages-notif-box animated fadeIn" aria-labelledby="messageDropdown">
                                <li>
                                    <div class="dropdown-title d-flex justify-content-between align-items-center">
                                        Messages
                                        <a href="#" class="small">Mark all as read</a>
                                    </div>
                                </li>
                                <li>
                                    <div class="message-notif-scroll scrollbar-outer">
                                        <div class="notif-center">
                                            <a href="#">
                                                <div class="notif-img">
                                                    <img src="<?= base_url() ?>/public/asset/vendor/Atlantis/assets/img/jm_denis.jpg" alt="Img Profile">
                                                </div>
                                                <div class="notif-content">
                                                    <span class="subject">Jimmy Denis</span>
                                                    <span class="block">
                                                        How are you ?
                                                    </span>
                                                    <span class="time">5 minutes ago</span>
                                                </div>
                                            </a>
                                            <a href="#">
                                                <div class="notif-img">
                                                    <img src="<?= base_url() ?>/public/asset/vendor/Atlantis/assets/img/chadengle.jpg" alt="Img Profile">
                                                </div>
                                                <div class="notif-content">
                                                    <span class="subject">Chad</span>
                                                    <span class="block">
                                                        Ok, Thanks !
                                                    </span>
                                                    <span class="time">12 minutes ago</span>
                                                </div>
                                            </a>
                                            <a href="#">
                                                <div class="notif-img">
                                                    <img src="<?= base_url() ?>/public/asset/vendor/Atlantis/assets/img/mlane.jpg" alt="Img Profile">
                                                </div>
                                                <div class="notif-content">
                                                    <span class="subject">Jhon Doe</span>
                                                    <span class="block">
                                                        Ready for the meeting today...
                                                    </span>
                                                    <span class="time">12 minutes ago</span>
                                                </div>
                                            </a>
                                            <a href="#">
                                                <div class="notif-img">
                                                    <img src="<?= base_url() ?>/public/asset/vendor/Atlantis/assets/img/talha.jpg" alt="Img Profile">
                                                </div>
                                                <div class="notif-content">
                                                    <span class="subject">Talha</span>
                                                    <span class="block">
                                                        Hi, Apa Kabar ?
                                                    </span>
                                                    <span class="time">17 minutes ago</span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <a class="see-all" href="javascript:void(0);">See all messages<i class="fa fa-angle-right"></i> </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown hidden-caret">
                            <a class="nav-link dropdown-toggle" href="#" id="notifDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-bell"></i>
                                <span class="notification">4</span>
                            </a>
                            <ul class="dropdown-menu notif-box animated fadeIn" aria-labelledby="notifDropdown">
                                <li>
                                    <div class="dropdown-title">You have 4 new notification</div>
                                </li>
                                <li>
                                    <div class="notif-scroll scrollbar-outer">
                                        <div class="notif-center">
                                            <a href="#">
                                                <div class="notif-icon notif-primary"> <i class="fa fa-user-plus"></i> </div>
                                                <div class="notif-content">
                                                    <span class="block">
                                                        New user registered
                                                    </span>
                                                    <span class="time">5 minutes ago</span>
                                                </div>
                                            </a>
                                            <a href="#">
                                                <div class="notif-icon notif-success"> <i class="fa fa-comment"></i> </div>
                                                <div class="notif-content">
                                                    <span class="block">
                                                        Rahmad commented on Admin
                                                    </span>
                                                    <span class="time">12 minutes ago</span>
                                                </div>
                                            </a>
                                            <a href="#">
                                                <div class="notif-img">
                                                    <img src="<?= base_url() ?>/public/asset/vendor/Atlantis/assets/img/profile2.jpg" alt="Img Profile">
                                                </div>
                                                <div class="notif-content">
                                                    <span class="block">
                                                        Reza send messages to you
                                                    </span>
                                                    <span class="time">12 minutes ago</span>
                                                </div>
                                            </a>
                                            <a href="#">
                                                <div class="notif-icon notif-danger"> <i class="fa fa-heart"></i> </div>
                                                <div class="notif-content">
                                                    <span class="block">
                                                        Farrah liked Admin
                                                    </span>
                                                    <span class="time">17 minutes ago</span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <a class="see-all" href="javascript:void(0);">See all notifications<i class="fa fa-angle-right"></i> </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown hidden-caret">
                            <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
                                <i class="fas fa-layer-group"></i>
                            </a>
                            <div class="dropdown-menu quick-actions quick-actions-info animated fadeIn">
                                <div class="quick-actions-header">
                                    <span class="title mb-1">Quick Actions</span>
                                    <span class="subtitle op-8">Shortcuts</span>
                                </div>
                                <div class="quick-actions-scroll scrollbar-outer">
                                    <div class="quick-actions-items">
                                        <div class="row m-0">
                                            <a class="col-6 col-md-4 p-0" href="#">
                                                <div class="quick-actions-item">
                                                    <i class="flaticon-file-1"></i>
                                                    <span class="text">Generated Report</span>
                                                </div>
                                            </a>
                                            <a class="col-6 col-md-4 p-0" href="#">
                                                <div class="quick-actions-item">
                                                    <i class="flaticon-database"></i>
                                                    <span class="text">Create New Database</span>
                                                </div>
                                            </a>
                                            <a class="col-6 col-md-4 p-0" href="#">
                                                <div class="quick-actions-item">
                                                    <i class="flaticon-pen"></i>
                                                    <span class="text">Create New Post</span>
                                                </div>
                                            </a>
                                            <a class="col-6 col-md-4 p-0" href="#">
                                                <div class="quick-actions-item">
                                                    <i class="flaticon-interface-1"></i>
                                                    <span class="text">Create New Task</span>
                                                </div>
                                            </a>
                                            <a class="col-6 col-md-4 p-0" href="#">
                                                <div class="quick-actions-item">
                                                    <i class="flaticon-list"></i>
                                                    <span class="text">Completed Tasks</span>
                                                </div>
                                            </a>
                                            <a class="col-6 col-md-4 p-0" href="#">
                                                <div class="quick-actions-item">
                                                    <i class="flaticon-file"></i>
                                                    <span class="text">Create New Invoice</span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li> -->
                        <li class="nav-item dropdown hidden-caret">
                            <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
                                <div class="avatar-sm">
                                    <img src="<?= base_url() ?>/public/asset/vendor/Atlantis/assets/img/profile.jpg" alt="" class="avatar-img rounded-circle">
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-user animated fadeIn">
                                <div class="dropdown-user-scroll scrollbar-outer">
                                    <li>
                                        <div class="user-box">
                                            <div class="avatar-lg"><img src="<?= base_url() ?>/public/asset/vendor/Atlantis/assets/img/profile.jpg" alt="image profile" class="avatar-img rounded"></div>
                                            <div class="u-text">
                                                <h4>Admin Indohajj</h4>
                                                <p class="text-muted">indohajj@gmail.com</p><a href="profile.html" class="btn btn-xs btn-secondary btn-sm">View Profile</a>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">My Profile</a>
                                        <a class="dropdown-item" href="#">My Balance</a>
                                        <a class="dropdown-item" href="#">Inbox</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">Account Setting</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">Logout</a>
                                    </li>
                                </div>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- End Navbar -->
        </div>

        <!-- Sidebar -->
        <div class="sidebar sidebar-style-2" data-background-color="dark2">
            <div class="sidebar-wrapper scrollbar scrollbar-inner">
                <div class="sidebar-content">
                    <!-- <div class="user">
                        <div class="avatar-sm float-left mr-2">
                            <img src="<?= base_url() ?>/public/asset/vendor/Atlantis/assets/img/profile.jpg" alt="..." class="avatar-img rounded-circle">
                        </div>
                        <div class="info">
                            <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                                <span>
                                    Admin Indohajj
                                    <span class="user-level">Administrator</span>
                                    <span class="caret"></span>
                                </span>
                            </a>
                            <div class="clearfix"></div>

                            <div class="collapse in" id="collapseExample">
                                <ul class="nav">
                                    <li>
                                        <a href="#profile">
                                            <span class="link-collapse">My Profile</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#edit">
                                            <span class="link-collapse">Edit Profile</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#settings">
                                            <span class="link-collapse">Settings</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div> -->
                    <ul class="nav nav-primary">
                        <li class="nav-item active">
                            <a href="<?= base_url() ?>/adminuser" class="collapsed">
                                <i class="fas fa-home"></i>
                                <p>Dashboard</p>
                            </a>
                            <!-- <div class="collapse" id="dashboard">
                                <ul class="nav nav-collapse">
                                    <li>
                                        <a href="../demo1/index.html">
                                            <span class="sub-item">Dashboard 1</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="../demo2/index.html">
                                            <span class="sub-item">Dashboard 2</span>
                                        </a>
                                    </li>
                                </ul>
                            </div> -->
                        </li>
                        <li class="nav-section">
                            <span class="sidebar-mini-icon">
                                <i class="fa fa-ellipsis-h"></i>
                            </span>
                            <h4 class="text-section">Menu</h4>
                        </li>
                        <li class="nav-item">
                            <a data-toggle="collapse" href="#base">
                                <i class="fas fa-user"></i>
                                <p>Pengguna</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="base">
                                <ul class="nav nav-collapse">
                                    <li>
                                        <a href="<?= base_url() ?>/adminuser/user/agent">
                                            <span class="sub-item">Approval Agent</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="components/buttons.html">
                                            <span class="sub-item">Individual</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="components/gridsystem.html">
                                            <span class="sub-item">Daftar Pengguna</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a data-toggle="collapse" href="#umrah">
                                <i class="fa-solid fa-mosque"></i>
                                <p>Umrah</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="umrah">
                                <ul class="nav nav-collapse">
                                    <li>
                                        <a href="<?= base_url() ?>/adminuser/paketumrah/">
                                            <span class="sub-item">Daftar Paket</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?= base_url() ?>/adminuser/paketumrah/add">
                                            <span class="sub-item">Tambah Paket</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?= base_url() ?>/adminuser/paketumrah/draft">
                                            <span class="sub-item">Draft Paket</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?= base_url() ?>/adminuser/paketumrah/statpop">
                                            <span class="sub-item">Status & Populer Paket</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?= base_url() ?>/adminuser/paketumrah/remaining">
                                            <span class="sub-item">Ketersediaan Paket</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?= base_url() ?>/adminuser/paketumrah/jamaah">
                                            <span class="sub-item">Jamaah</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a data-toggle="collapse" href="#haji">
                                <i class="fas fa-kaaba"></i>
                                <p>Haji</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="haji">
                                <ul class="nav nav-collapse">
                                    <li>
                                        <a href="<?= base_url() ?>/adminuser/pakethaji/">
                                            <span class="sub-item">Daftar Paket</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?= base_url() ?>/adminuser/pakethaji/add">
                                            <span class="sub-item">Tambah Paket</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?= base_url() ?>/adminuser/pakethaji/draft">
                                            <span class="sub-item">Draft Paket</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?= base_url() ?>/adminuser/pakethaji/status">
                                            <span class="sub-item">Status Paket</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?= base_url() ?>/adminuser/pakethaji/populer">
                                            <span class="sub-item">Populer Paket</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?= base_url() ?>/adminuser/pakethaji/confirm">
                                            <span class="sub-item">Konfirmasi Pembayaran</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a data-toggle="collapse" href="#hotel">
                                <i class="fas fa-hotel"></i>
                                <p>Hotel</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="hotel">
                                <ul class="nav nav-collapse">
                                    <li>
                                        <a href="<?= base_url() ?>/adminuser/hotel/">
                                            <span class="sub-item">Daftar Hotel</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?= base_url() ?>/adminuser/hotel/add">
                                            <span class="sub-item">Tambah Hotel</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?= base_url() ?>/adminuser/hotel/status">
                                            <span class="sub-item">Status Hotel</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?= base_url() ?>/adminuser/hotel/populer">
                                            <span class="sub-item">Populer Hotel</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a data-toggle="collapse" href="#reservasi">
                                <i class="fas fa-book-open"></i>
                                <p>Reservasi</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="reservasi">
                                <ul class="nav nav-collapse">
                                    <li>
                                        <a href="<?= base_url() ?>/adminuser/reservasi/">
                                            <span class="sub-item">Paket Umrah</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?= base_url() ?>/adminuser/reservasi/add">
                                            <span class="sub-item">Paket Haji</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?= base_url() ?>/adminuser/reservasi/draft">
                                            <span class="sub-item">Hotel</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- End Sidebar -->

        <div class="main-panel">
            <div class="content">
                <?= $this->renderSection('content'); ?>
            </div>
            <footer class="footer">
                <div class="container-fluid">
                    <nav class="pull-left">

                    </nav>
                    <div class="copyright ml-auto">
                        2022, made with by <a href="https://www.themekita.com">Indohajj</a>
                    </div>
                </div>
            </footer>
        </div>

        <!-- Custom template | don't include it in your project! -->
        <div class="custom-template">
            <div class="title">Settings</div>
            <div class="custom-content">
                <div class="switcher">
                    <div class="switch-block">
                        <h4>Logo Header</h4>
                        <div class="btnSwitch">
                            <button type="button" class="changeLogoHeaderColor" data-color="dark"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="blue"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="purple"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="light-blue"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="green"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="orange"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="red"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="white"></button>
                            <br />
                            <button type="button" class="selected changeLogoHeaderColor" data-color="dark2"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="blue2"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="purple2"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="light-blue2"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="green2"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="orange2"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="red2"></button>
                        </div>
                    </div>
                    <div class="switch-block">
                        <h4>Navbar Header</h4>
                        <div class="btnSwitch">
                            <button type="button" class="selected changeTopBarColor" data-color="dark"></button>
                            <button type="button" class="changeTopBarColor" data-color="blue"></button>
                            <button type="button" class="changeTopBarColor" data-color="purple"></button>
                            <button type="button" class="changeTopBarColor" data-color="light-blue"></button>
                            <button type="button" class="changeTopBarColor" data-color="green"></button>
                            <button type="button" class="changeTopBarColor" data-color="orange"></button>
                            <button type="button" class="changeTopBarColor" data-color="red"></button>
                            <button type="button" class="changeTopBarColor" data-color="white"></button>
                            <br />
                            <button type="button" class="changeTopBarColor" data-color="dark2"></button>
                            <button type="button" class="changeTopBarColor" data-color="blue2"></button>
                            <button type="button" class="changeTopBarColor" data-color="purple2"></button>
                            <button type="button" class="changeTopBarColor" data-color="light-blue2"></button>
                            <button type="button" class="changeTopBarColor" data-color="green2"></button>
                            <button type="button" class="changeTopBarColor" data-color="orange2"></button>
                            <button type="button" class="changeTopBarColor" data-color="red2"></button>
                        </div>
                    </div>
                    <div class="switch-block">
                        <h4>Sidebar</h4>
                        <div class="btnSwitch">
                            <button type="button" class="changeSideBarColor" data-color="white"></button>
                            <button type="button" class="changeSideBarColor" data-color="dark"></button>
                            <button type="button" class="selected changeSideBarColor" data-color="dark2"></button>
                        </div>
                    </div>
                    <div class="switch-block">
                        <h4>Background</h4>
                        <div class="btnSwitch">
                            <button type="button" class="changeBackgroundColor" data-color="bg2"></button>
                            <button type="button" class="changeBackgroundColor selected" data-color="bg1"></button>
                            <button type="button" class="changeBackgroundColor" data-color="bg3"></button>
                            <button type="button" class="selected changeBackgroundColor" data-color="dark"></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="custom-toggle">
                <i class="flaticon-settings"></i>
            </div>
        </div>
        <!-- End Custom template -->
    </div>
    <!--   Core JS Files   -->

    <script src="<?= base_url() ?>/public/asset/vendor/Atlantis/assets/js/core/popper.min.js"></script>
    <script src="<?= base_url() ?>/public/asset/vendor/Atlantis/assets/js/core/bootstrap.min.js"></script>

    <!-- jQuery UI -->
    <script src="<?= base_url() ?>/public/asset/vendor/Atlantis/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
    <script src="<?= base_url() ?>/public/asset/vendor/Atlantis/assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

    <!-- jQuery Scrollbar -->
    <script src="<?= base_url() ?>/public/asset/vendor/Atlantis/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>


    <!-- Chart JS -->
    <script src="<?= base_url() ?>/public/asset/vendor/Atlantis/assets/js/plugin/chart.js/chart.min.js"></script>

    <!-- jQuery Sparkline -->
    <script src="<?= base_url() ?>/public/asset/vendor/Atlantis/assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

    <!-- Chart Circle -->
    <script src="<?= base_url() ?>/public/asset/vendor/Atlantis/assets/js/plugin/chart-circle/circles.min.js"></script>

    <!-- Datatables -->
    <script src="<?= base_url() ?>/public/asset/vendor/Atlantis/assets/js/plugin/datatables/datatables.min.js"></script>

    <!-- Bootstrap Notify -->
    <script src="<?= base_url() ?>/public/asset/vendor/Atlantis/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

    <!-- jQuery Vector Maps -->
    <script src="<?= base_url() ?>/public/asset/vendor/Atlantis/assets/js/plugin/jqvmap/jquery.vmap.min.js"></script>
    <script src="<?= base_url() ?>/public/asset/vendor/Atlantis/assets/js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>

    <!-- Sweet Alert -->
    <script src="<?= base_url() ?>/public/asset/vendor/Atlantis/assets/js/plugin/sweetalert/sweetalert.min.js"></script>

    <!-- Atlantis JS -->
    <script src="<?= base_url() ?>/public/asset/vendor/Atlantis/assets/js/atlantis.min.js"></script>

    <!-- Atlantis DEMO methods, don't include it in your project! -->
    <script src="<?= base_url() ?>/public/asset/vendor/Atlantis/assets/js/setting-demo.js"></script>
    <script src="<?= base_url() ?>/public/asset/vendor/Atlantis/assets/js/demo.js"></script>
    <script>
        $('#lineChart').sparkline([102, 109, 120, 99, 110, 105, 115], {
            type: 'line',
            height: '70',
            width: '100%',
            lineWidth: '2',
            lineColor: 'rgba(255, 255, 255, .5)',
            fillColor: 'rgba(255, 255, 255, .15)'
        });

        $('#lineChart2').sparkline([99, 125, 122, 105, 110, 124, 115], {
            type: 'line',
            height: '70',
            width: '100%',
            lineWidth: '2',
            lineColor: 'rgba(255, 255, 255, .5)',
            fillColor: 'rgba(255, 255, 255, .15)'
        });

        $('#lineChart3').sparkline([105, 103, 123, 100, 95, 105, 115], {
            type: 'line',
            height: '70',
            width: '100%',
            lineWidth: '2',
            lineColor: 'rgba(255, 255, 255, .5)',
            fillColor: 'rgba(255, 255, 255, .15)'
        });
    </script>
    <!-- My Script -->
    <script src="<?= base_url() ?>/public/asset/js/Admin/message.js"></script>
    <?php if (isset($script)) : ?>
        <script src="<?= $script; ?>"></script>
    <?php endif; ?>
</body>

</html>