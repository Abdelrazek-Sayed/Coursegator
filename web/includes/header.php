<?php
$cats = $db->select("id,`name`","cats");
?>


<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Coursegator</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="<?= $url; ?>web/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= $url; ?>web/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= $url; ?>web/assets/css/magnific-popup.css">
    <link rel="stylesheet" href="<?= $url; ?>web/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= $url; ?>web/assets/css/themify-icons.css">
    <link rel="stylesheet" href="<?= $url; ?>web/assets/css/nice-select.css">
    <link rel="stylesheet" href="<?= $url; ?>web/assets/css/flaticon.css">
    <link rel="stylesheet" href="<?= $url; ?>web/assets/css/gijgo.css">
    <link rel="stylesheet" href="<?= $url; ?>web/assets/css/animate.css">
    <link rel="stylesheet" href="<?= $url; ?>web/assets/css/slicknav.css">
    <link rel="stylesheet" href="<?= $url; ?>web/assets/css/style.css">
    <!-- <link rel="stylesheet" href="<?= $url; ?>web/assets/css/responsive.css"> -->
</head>

<body>
    <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

    <!-- header-start -->
    <header>
        <div class="header-area ">
            <div id="sticky-header" class="main-header-area">
                <div class="container-fluid p-0">
                    <div class="row align-items-center no-gutters">
                        <div class="col-xl-2 col-lg-2">
                            <div class="logo-img">
                                <a href="index.html">
                                    <img src="img/logo.png" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-7 col-lg-7">
                            <div class="main-menu  d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a class="active" href="<?= $url; ?>web/pages/index.php">home</a></li>
                                        <li><a href="<?= $url; ?>web/pages/courses.php">All Courses</a></li>
                                        <li><a href="#">Categories <i class="ti-angle-down"></i></a>

                                            <ul class="submenu">
                                                <?php foreach ($cats as $cat) { ?>
                                                    <li><a href="<?= $url; ?>web/pages/category.php?id=<?= $cat['id']; ?>"> <?= $cat['name']; ?></a></li>
                                                <?php } ?>
                                            </ul>
                                        </li>
                                        <li><a href="<?= $url; ?>web/pages/contact.php">Enroll</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 d-none d-lg-block">
                            <div class="log_chat_area d-flex align-items-center">
                                <div class="live_chat_btn">
                                    <a class="boxed_btn_orange" href="#">
                                        <i class="fa fa-phone"></i>
                                        <span>+10 378 467 3672</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header-end -->