<?php
	session_start();
	include("include/dbcon.php");
	include("include/function.php");
	setGetCookie();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Zentimo - Home</title>
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
<body class="home">

<?php
include("include/head.php")
?>

<div class="main-content">
    <div class="fullwidth-template">
        <div class="home-slider style1 rows-space-30">
            <div class="container">
                <div class="slider-owl owl-slick equal-container nav-center" data-slick="{"autoplay":true, "autoplaySpeed":9000, "arrows":true, "dots":false, "infinite":true, "speed":1000, "rows":1}" data-responsive="[{"breakpoint":"2000","settings":{"slidesToShow":1}}]">
                    <div class="slider-item style1">
                        <div class="slider-inner equal-element">
                            <div class="slider-infor">
                                <h5 class="title-small">
                                    New Arrivals!
                                </h5>
                                <h3 class="title-big">
                                    MacBook Air<br>
                                    Limited Items
                                </h3>
                                <div class="price">
                                    Price from:
                                    <span class="number-price">
											$99.00
										</span>
                                </div>
                                <a href="#" class="button btn-shop-the-look bgroud-style">Shop Now</a>
                            </div>
                        </div>
                    </div>
                    <div class="slider-item style2">
                        <div class="slider-inner equal-element">
                            <div class="slider-infor">
                                <h5 class="title-small">
                                    Table Supplies Sale!
                                </h5>
                                <h3 class="title-big">
                                    Up to <span>75%</span> On All <br> Store Items
                                </h3>
                                <a href="#" class="button btn-shop-now">Shop Now</a>
                            </div>
                        </div>
                    </div>
                    <div class="slider-item style3">
                        <div class="slider-inner equal-element">
                            <div class="slider-infor">
                                <h5 class="title-small">
                                    New Arrivals!
                                </h5>
                                <h3 class="title-big">
                                    Living Room<br>
                                    Limited Items
                                </h3>
                                <div class="price">
                                    Price from:
                                    <span class="number-price">
											$75.00
										</span>
                                </div>
                                <a href="#" class="button btn-shop-the-look bgroud-style">Shop Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="banner-wrapp rows-space-35">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="banner">
                            <div class="item-banner style12">
                                <div class="inner">
                                    <div class="banner-content">
                                        <h3 class="title">Best Seller</h3>
                                        <div class="description">
                                            Check out our new tech collection!
                                        </div>
                                        <a href="#" class="button btn-shop-now">Shop Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="banner">
                            <div class="item-banner style14">
                                <div class="inner">
                                    <div class="banner-content">
                                        <h4 class="zentimo-subtitle">End this weekend</h4>
                                        <h3 class="title">Big Sale <br>75% Off</h3>
                                        <div class="code">
                                            Use promo Code:
                                            <span class="nummer-code">ZENTIMO</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="banner">
                            <div class="item-banner style12 type2">
                                <div class="inner">
                                    <div class="banner-content">
                                        <h3 class="title">Lookbook</h3>
                                        <div class="description">
                                            Tech Collections <br>Summer Lookbook
                                        </div>
                                        <a href="#" class="button btn-view-the-look">view all</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="zentimo-tabs  default rows-space-40">
            <div class="container">
                <div class="tab-head">
                    <ul class="tab-link">
                        <li class="active">
                            <a data-toggle="tab" aria-expanded="true" href="#bestseller">New Arrivals</a>
                        </li>
                    </ul>
                </div>
                <div class="tab-container">
                    <div id="bestseller" class="tab-panel active">
                        <div class="zentimo-product">
                            <ul class="row list-products auto-clear equal-container product-grid">

                                <?php
                                    getProducts();
                                ?>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="banner-wrapp rows-space-60">
            <div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="banner">
                            <div class="item-banner style6">
                                <div class="inner">
                                    <div class="container">
                                        <div class="banner-content">
                                            <h4 class="zentimo-subtitle">Celebrate Day Sale!</h4>
                                            <h3 class="title">Save <span>25%</span> Of On All<br>MacBook Air
                                            </h3>
                                            <a href="#" class="button btn-view-promotion">Shop Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="product-in-stock-wrapp">
            <div class="container">
                <h3 class="custommenu-title-blog white">
                    <span>Featured Products</span>
                </h3>
                <div class="zentimo-product style3">
                    <ul class="row list-products auto-clear equal-container product-grid">

                        <?php 
                        getProductsFeatured();
                        ?>
                        
                    </ul>
                </div>
            </div>
        </div>
        <div class="banner-wrapp rows-space-30">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 col-md-5 col-sm-12">
                        <div class="banner">
                            <div class="item-banner style10">
                                <div class="inner">
                                    <div class="banner-content">
                                        <h4 class="zentimo-subtitle">Best Seller!</h4>
                                        <h3 class="title">Big Deal Of Day</h3>
                                        <div class="description">
                                            We’ve been waiting 4 you!
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7 col-sm-12">
                        <div class="banner">
                            <div class="item-banner style11">
                                <div class="inner">
                                    <div class="banner-content">
                                        <h4 class="zentimo-subtitle">Let’s us make your style!</h4>
                                        <h3 class="title">Gaming Controller </h3>
                                        <div class="description">
                                            A complete shopping guide on what & how to play!
                                        </div>
                                        <a href="#" class="button btn-shopping-us">Shop Now</a>
                                    </div>
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