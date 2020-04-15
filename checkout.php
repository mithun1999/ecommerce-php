<?php
	
	session_start();
	include("include/dbcon.php");
	include("include/function.php");
	include("include/md5salt.php");
	setGetCookie();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Zentimo - Checkout</title>
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
include('include/head.php')
?>

<div class="main-content main-content-checkout">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-trail breadcrumbs">
                    <ul class="trail-items breadcrumb">
                        <li class="trail-item trail-begin">
                            <a href="index.html">Home</a>
                        </li>
                        <li class="trail-item trail-end active">
                            Checkout
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <h3 class="custom_blog_title">
            Checkout
        </h3>

        <?php
					if(!isset($_SESSION['cusEmail'])){

						echo "<script>window.open('login.php','_self')</script>";
					}else{
						include("checkout_code.php"); 
					}
				?>
     
    </div>
</div>

<?php 
include('include/foot.php');
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