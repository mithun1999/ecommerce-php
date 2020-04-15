<?php

	session_start();
	include("include/dbcon.php");
	include("include/function.php");
	include("include/md5salt.php");
	require 'include/phpmailer/PHPMailerAutoload.php'; 
	setGetCookie();

	$wrongpass = "";
	@recoverPassword();		//hiding phpmailer unwanted error msg using @
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Zentimo - Login</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png">
    <link href="css/css.css" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/slick.css">
    <link rel="stylesheet" href="css/chosen.min.css">
    <link rel="stylesheet" href="css/pe-icon-7-stroke.css">
    <link rel="stylesheet" href="css/magnific-popup.min.css">
    <link rel="stylesheet" href="css/lightbox.min.css">
    <link rel="stylesheet" href="css/jquery.fancybox.css">
    <link rel="stylesheet" href="css/jquery.scrollbar.min.css">
    <link rel="stylesheet" href="css/mobile-menu.css">
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="inblog-page">

    <?php 
include("include/head.php")
?>

    <div class="main-content main-content-login">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-trail breadcrumbs">
                        <ul class="trail-items breadcrumb">
                            <li class="trail-item trail-begin">
                                <a href="index.html">Home</a>
                            </li>
                            <li class="trail-item trail-end active">
                                Password Recovery
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="content-area col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="site-main">
                        <h3 class="custom_blog_title">
                           Account Recovery
                        </h3>
                        <div class="customer_login">
                            <div class="row">
                                <div class="col-md-3"></div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="login-item">
                                        <h5 class="title-login">Recover your Account</h5>
                                        <form action="forgetpassword.php" method="post" enctype="multipart/form-data""
                                            class=" login">
                                            <p class="form-row form-row-wide">
                                                <label class="text">Email</label>
                                                <input type="email" class="input-text" name="cus_email" required>
                                            </p>
                                            <center>
                                                <div class="form-warn"
                                                    style="font-size: 12px !important;font-weight: 600 !important;letter-spacing: 2px !important;color: red;	">
                                                    <?php if($wrongpass != "") echo $wrongpass?>
                                                </div>
                                                <br>
                                            </center>
                                            <p class="form-row">
                                                <input value="Recover" name="recoverpass" type="submit" class="button-submit">
                                            </p>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php 
 include("include/foot.php")
 ?>
    <a href="#" class="backtotop">
        <i class="pe-7s-angle-up"></i>
    </a>
    <script src="js/jquery-1.12.4.min.js"></script>
    <script src="js/jquery.plugin-countdown.min.js"></script>
    <script src="js/jquery-countdown.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/magnific-popup.min.js"></script>
    <script src="js/isotope.min.js"></script>
    <script src="js/jquery.scrollbar.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/mobile-menu.js"></script>
    <script src="js/chosen.min.js"></script>
    <script src="js/slick.js"></script>
    <script src="js/jquery.elevateZoom.min.js"></script>
    <script src="js/jquery.actual.min.js"></script>
    <script src="js/jquery.fancybox.js"></script>
    <script src="js/lightbox.min.js"></script>
    <script src="js/owl.thumbs.min.js"></script>
    <script src="js/jquery.scrollbar.min.js"></script>
    <script src="js/js.js"></script>
    <script src="js/frontend-plugin.js"></script>
<script src="js/search.js"></script>
</body>

</html>