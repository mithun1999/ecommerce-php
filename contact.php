<?php
	session_start();
	include("include/dbcon.php");
	include("include/function.php");
	setGetCookie();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Zentimo - Contact</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png">
    <link href="css/css_1.css" rel="stylesheet">
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

<?php include('include/head.php'); ?>

<div class="main-content main-content-contact">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-trail breadcrumbs">
                    <ul class="trail-items breadcrumb">
                        <li class="trail-item trail-begin">
                            <a href="index.php">Home</a>
                        </li>
                        <li class="trail-item trail-end active">
                            Contact us
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="content-area content-contact col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="site-main">
                    <h3 class="custom_blog_title">Contact us</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="page-main-content">
        <div class="google-map">
            <div class="zentimo-google-maps" id="zentimo-google-maps" data-hue data-lightness="1" data-map-style="2" data-saturation="-99" data-longitude="-73.985130" data-latitude="40.758896" data-pin-icon data-zoom="14" data-map-type="ROADMAP"></div>
            <span class="fa fa-map-marker"></span>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-contact">
                        <div class="col-lg-8 no-padding">
                            <div class="form-message">
                                <h2 class="title">
                                    Send us a Message!
                                </h2>
                                <form action="contact.php" method="post" class="zentimo-contact-fom">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <p>
                                                <span class="form-label">Your Name *</span>
                                                <span class="form-control-wrap your-name">
														<input type="text" name="name" size="40" class="form-control form-control-name" required="required">
													</span>
                                            </p>
                                        </div>
                                        <div class="col-sm-6">
                                            <p>
													<span class="form-label">
														Your Email *
													</span>
                                                <span class="form-control-wrap your-email">
														<input type="email" name="email" size="40" class="form-control form-control-email" required="required">
													</span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <p>
                                                <span class="form-label">Subject</span>
                                                <span class="form-control-wrap your-phone">
														<input type="text" name="subject" class="form-control form-control-phone" required="required">
													</span>
                                            </p>
                                        </div>
                                       
                                    </div>
                                    <p>
											<span class="form-label">
												Your Message
											</span>
                                        <span class="wpcf7-form-control-wrap your-message">
												<textarea name="message" cols="40" rows="9" class="form-control your-textarea"></textarea>
											</span>
                                    </p>
                                    <p>
                                        <input name="contactus" type="submit" value="SEND MESSAGE" class="form-control-submit button-submit">
                                    </p>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-4 no-padding">
                            <div class="form-contact-information">
                                <form action="#" class="zentimo-contact-info">
                                    <h2 class="title">
                                        Contact information
                                    </h2>
                                    <div class="info">
                                        <div class="item address">
												<span class="icon">
													
												</span>
                                            <span class="text">
													 Restfield White City London G12 Ariel Way - United Kingdom
												</span>
                                        </div>
                                        <div class="item phone">
												<span class="icon">
													
												</span>
                                            <span class="text">
													(+800) 123 456 7890
												</span>
                                        </div>
                                        <div class="item email">
												<span class="icon">
													
												</span>
                                            <span class="text">
													info@zentimooutfit.co.uk
												</span>
                                        </div>
                                    </div>
                                    <div class="socials">
                                        <a href="#" class="social-item" target="_blank">
												<span class="icon fa fa-facebook">
													
												</span>
                                        </a>
                                        <a href="#" class="social-item" target="_blank">
												<span class="icon fa fa-twitter-square">
													
												</span>
                                        </a>
                                        <a href="#" class="social-item" target="_blank">
												<span class="icon fa fa-instagram">
													
												</span>
                                        </a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('include/foot.php');  ?>

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
</body>
</html>


<?php
    @contactUs();
?>