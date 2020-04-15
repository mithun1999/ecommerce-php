<?php
	session_start();
	include("include/dbcon.php");
	include("include/function.php");
	setGetCookie();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Zentimo - Products Grid Left Sidebar</title>
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

<body class="productsgrid-page">

    <?php 
include('include/head.php');
?>

    <div class="main-content main-content-product left-sidebar">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-trail breadcrumbs">
                        <ul class="trail-items breadcrumb">
                            <li class="trail-item trail-begin">
                                <a href="index.php">Home</a>
                            </li>
                            <li class="trail-item trail-end active">
                                Store
                            </li>
                        </ul>
                    </div>
                </div>
            </div>


            <div class="row">
            <?php include('include/side.php'); ?>
                <div class="content-area shop-grid-content no-banner col-lg-9 col-md-9 col-sm-12 col-xs-12">
                    <div class="site-main">
                        <h3 class="custom_blog_title">
                            Shop our products
                        </h3>

                        <ul class="row list-products auto-clear equal-container product-grid">
                            <?php
	if(!isset($_POST['priceSort'])){
        if(!isset($_GET['manufacture'])){
            if(!isset($_GET['category'])){
                $itemLimit = 6;
                if(isset($_GET['currentPage'])){
                    $currentPage = $_GET['currentPage'];
                }
                else{
                    $currentPage = 1;
                }
                $startPage = ($currentPage-1) * $itemLimit;
                $sql = "SELECT * FROM product ORDER BY 1 DESC LIMIT $startPage,$itemLimit";
                $getProductList = mysqli_query($conn,$sql);
                while($rowPageItem = mysqli_fetch_array($getProductList)){

                    $productId = $rowPageItem['productId'];
                    $productName = $rowPageItem['productName'];
                    $productPrice = $rowPageItem['productPrice'];
                    $productImg1 = $rowPageItem['image1'];

                    echo "
                                        <li class='product-item col-lg-4 col-md-6 col-sm-6 col-xs-6 col-ts-12 style-1'>
                                        <div class='product-inner equal-element'>
                                            <div class='product-top'>
                                                
                                            </div>
                                            <div class='product-thumb'>
                                                <div class='thumb-inner'>
                                                    <a href='details.php?productId=$productId'>
                                                        <img src='admin/resources/img/product_img/$productImg1' alt='img'>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class='product-info'>
                                                <h5 class='product-name product_title'>
                                                    <a>$productName</a>
                                                </h5><br />
                                                <div class='group-info'>
                                                    <div class='price'>
                                                        <ins style='color:#758AA2;'>
                                                            <b>$ $productPrice</b>
                                                        </ins>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class='loop-form-add-to-cart'>
                                            <a href='details.php?productId=$productId'><button class='single_add_to_cart_button button'>View More
                                                                                </button></a>
                                            </div>
                                        </div>
                                    </li>";
                                    }
                                        ?>


                        </ul>
    

                        <div class="pagination clearfix style3">
                            <div class="nav-link">
                            
                                <ul class="pagination">
                                    <?php
								
										$sql2 = "SELECT * FROM product";
										$getItems = mysqli_query($conn,$sql2);
										$totalItems = mysqli_num_rows($getItems);
										$noOfPages = ceil($totalItems/$itemLimit);

										echo "
											<li><a href='store.php?currentPage=1'>".'First Page'."</a></li>
										";

										for ($i = 1;$i <= $noOfPages; $i++){
											echo "
												<li><a href='store.php?currentPage=".$i."'>".$i."</a></li>
											";
										}

										echo "
											<li><a href='store.php?currentPage=$noOfPages'>".'Last Page'."</a></li>
										";


									}
								}
                            }
						?>
                                </ul>
                                <ul class="row list-products auto-clear equal-container product-grid">
                                <?php 
                                if(isset($_GET['category'])){
                                    sortCategory();
                                }
                                ?>
                                </ul>

                                <ul class="row list-products auto-clear equal-container product-grid">
                                <?php 
                                if(isset($_POST['priceSort'])){
                                    sortPrice();
                                }
                                ?>
                                </ul>

                                <ul class="row list-products auto-clear equal-container product-grid">
                                <?php 
                                if(isset($_GET['manufacture'])){
                                    sortManufacture();
                                }
                                ?>
                                </ul>


                               

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