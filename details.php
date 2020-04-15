<?php
	session_start();
	include("include/dbcon.php");
	include("include/function.php");
	setGetCookie();
?>
<?php
	if(isset($_GET['productId'])){
		
		$productId = $_GET['productId'];
		
		$sqlDet = "SELECT * FROM product WHERE productId = '$productId'";
		
		$getDetail = mysqli_query($conn,$sqlDet);
		$rowDetails = mysqli_fetch_array($getDetail);
		
		$productId = $rowDetails['productId'];
		$productName = $rowDetails['productName'];
		$productPrice = $rowDetails['productPrice'];
		$productImg1 = $rowDetails['image1'];
		$productImg2 = $rowDetails['image2'];
		$productImg3 = $rowDetails['image3'];
		$productImg4 = $rowDetails['image4'];
		$productPrice = $rowDetails['productPrice'];
		$productDetails = $rowDetails['productDetails'];
		$productManu = $rowDetails['manufactureId'];
		$productCate = $rowDetails['categoryId'];
		$productKeyword = $rowDetails['productKeywords'];
		$productFeat = $rowDetails['features'];
		$productAvailability = $rowDetails['availability'];
		$productWarranty = $rowDetails['Warranty'];
		
		$getManufacureSql = "SELECT * FROM manufacture WHERE  manufactureId='$productManu'";
		$getManufacureDetails = mysqli_query($conn,$getManufacureSql);
		$rowGetManufacureDetails = mysqli_fetch_array($getManufacureDetails);
		
		$getCategorySql ="SELECT * FROM category WHERE categoryId ='$productCate'";
		$getCategoryDetails = mysqli_query($conn,$getCategorySql);
		$rowGetCategoryDetails = mysqli_fetch_array($getCategoryDetails);
		
		$manName = $rowGetManufacureDetails['manName'];
        $cateName = $rowGetCategoryDetails['catName'];
        
		function suggest(){
            global $productCate;
            global $connF;
            $getRandomProductsSql = "SELECT * FROM product WHERE categoryId='$productCate' LIMIT 0,4";
				$getRandomProducts = mysqli_query($connF,$getRandomProductsSql);
				while($rowGetRandomProducts = mysqli_fetch_array($getRandomProducts)){
					$productId_suggest = $rowGetRandomProducts['productId'];
					$productName_suggest = $rowGetRandomProducts['productName'];
					$productPrice_suggest = $rowGetRandomProducts['productPrice'];
					$productImg1Mini = $rowGetRandomProducts['image1'];
							
					echo "
<!-- 				One Sub Product Start-->
<li class='product-item  col-lg-3 col-md-4 col-sm-6 col-xs-6 col-ts-12 style-1'>
<div class='product-inner equal-element'>
	<div class='product-top'>
		<div class='flash'>
				<span class='onnew'>
					<span class='text'>
						new
					</span>
				</span>
		</div>
		<div class='yith-wcwl-add-to-wishlist'>
			<div class='yith-wcwl-add-button'>
				<a href='#'>Add to Wishlist</a>
			</div>
		</div>
	</div>
	<div class='product-thumb'>
		<div class='thumb-inner'>
			<a href='details.php?productId=$productId_suggest'>
				<img src='admin/resources/img/product_img/$productImg1Mini' alt='img'>
			</a>
		</div>
		<a href='details.php?productId=$productId_suggest' class='button quick-wiew-button'>Quick View</a>
	</div>
	<div class='product-info'>
		<h5 class='product-name product_title'>
			<a>$productName_suggest</a>
		</h5><br/>
		<div class='group-info'>
			<div class='price'>
				<ins style='color:#758AA2;'>
					<b>$ $productPrice_suggest</b>
				</ins>
			</div>
		</div>
	</div>
</div>
</li>				
					";
				}
        }
    }
    

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Zentimo - Details Fullwith</title>
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

<body class="details-page">

    <?php 
include("include/head.php");
?>

    <div class="main-content main-content-details single no-sidebar">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-trail breadcrumbs">
                        <ul class="trail-items breadcrumb">
                            <li class="trail-item trail-begin">
                                <a href="index.php">Home</a>
                            </li>
                            <li class="trail-item">
                                <a href="store.php">Products</a>
                            </li>
                            <li class="trail-item trail-end active">
                                <?php echo $productName; ?>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="content-area content-details full-width col-lg-9 col-md-8 col-sm-12 col-xs-12">
                    <div class="site-main">
                        <div class="details-product">
                            <div class="details-thumd">

                            <div id="productSlideShow" class="carousel slide" data-ride="carousel">
								<ol class="carousel-indicators">
									<li data-target="#productSlideShow" data-slide-to="0" class="active"></li>
									<li data-target="#productSlideShow" data-slide-to="1"></li>
									<li data-target="#productSlideShow" data-slide-to="2"></li>
									<li data-target="#productSlideShow" data-slide-to="3"></li>
								</ol>
								<div class="carousel-inner">
									<div class="item active">
										<center>
											<img src="admin/resources/img/product_img/<?php echo $productImg1;?>" alt="" class="img-responsive">
										</center>
									</div>
									<div class="item">
										<center>
											<img src="admin/resources/img/product_img/<?php echo $productImg2;?>" alt="" class="img-responsive">
										</center>
									</div>
									<div class="item">
										<center>
											<img src="admin/resources/img/product_img/<?php echo $productImg3;?>" alt="" class="img-responsive">
										</center>
									</div>
									<div class="item">
										<center>
											<img src="admin/resources/img/product_img/<?php echo $productImg4;?>" alt="" class="img-responsive">
										</center>
									</div>
								</div>
								<a href="#productSlideShow" class="left carousel-control" data-slide="prev">
									<span class="glyphicon glyphicon-chevron-left"></span>
									<span class="sr-only">Previous</span>
								</a>
								<a href="#productSlideShow" class="right carousel-control" data-slide="next">
									<span class="glyphicon glyphicon-chevron-right"></span>
									<span class="sr-only">Next</span>
								</a>
							</div>
                            
                                </div>
                            </div>
                            <div class="details-infor">
                                <h1 class="product-title">
                                    <?php echo $productName; ?>
                                </h1>
                                <div class="availability">
                                    availability:
                                    <a>
                                    <?php 
                                    if($productAvailability>0){
                                        echo "In Stock";
                                    }
                                    else{
                                        echo "Out of Stock";
                                    }
                                    ?>
                                   </a>
                                </div><br/>
                                <?php
								addCart();
							?>
                            <form action="" method="post" class="form-horizontal">
                            <div class="form-group">
									<input type="hidden" name="productId" value="<?php echo $productId;?>">
								</div>
                                <div class="price">
                                    <span>$ <?php echo $productPrice; ?></span>
                                </div><br/>
                                <div class="product-details-description">
                                    <ul>
                                        <?php echo $productDetails; ?>
                                    </ul>
                                </div><br/>
                                <div class="group-button">
                                <?php
										if(isset($_SESSION['cusEmail'])){
											echo "
                                            <button type='submit' name='addwishlist'>
												<i class='fa fa-heart'></i> Add to Wishlist
												</button>	
											";
										}
									?>
                                    <br/><br/><br/>
                                    <div class="quantity-add-to-cart">
                                        <div class="quantity">
                                            <div class="control">
                                                <a class="btn-number qtyminus quantity-minus" href="#">-</a>
                                                <input type="text" data-step="1" data-min="0" value="1" name="qty"
                                                    class="input-qty qty" size="4">
                                                <a href="#" class="btn-number qtyplus quantity-plus">+</a>
                                            </div>
                                        </div>
                                        <button type="submit" name="addCart" class="single_add_to_cart_button button">Add to cart</button>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>




                        <div style="clear: left;"></div>

                            <h2 class="product-grid-title">You may also like</h2>
                            <div class="zentimo-product">
                            <ul class="row list-products auto-clear equal-container product-grid">

                                <?php
                                    suggest();
                                ?>
                            </ul>
                        </div>
                              
                               
                    </div>
                </div>
            </div>
        </div>
    </div>
 
<?php 
include("include/foot.php");
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

<?php
	addWishList();
?>