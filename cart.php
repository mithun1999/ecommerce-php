<?php
	session_start();
	include("include/dbcon.php");
	include("include/function.php");
	setGetCookie();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Zentimo - Shopping Cart</title>
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
include('include/head.php');
?>

<div class="site-content">
    <main class="site-main  main-container no-sidebar">
        <div class="container">
            <div class="breadcrumb-trail breadcrumbs">
                <ul class="trail-items breadcrumb">
                    <li class="trail-item trail-begin">
                        <a href="index.php">
								<span>
									Home
								</span>
                        </a>
                    </li>
                    <li class="trail-item trail-end active">
							<span>
							<a href="cart.php">	Shopping Cart </a>
							</span>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="main-content-cart main-content col-sm-12">
                    <h3 class="custom_blog_title">
                        Shopping Cart
                    </h3>

                    <div class="page-main-content">
                        <div class="shoppingcart-content">
                            <form action="cart.php" method="post" enctype="multipart/form-data" class="cart-form">
                            
                                <?php
							    $userCookie = setGetCookie();
							    $grabCartItemsSql = "SELECT * FROM cart WHERE cartCookie='$userCookie'";
							    $grabCartItems = mysqli_query($conn,$grabCartItemsSql);
							    $rowGrab = mysqli_num_rows($grabCartItems);
						        ?>

                                <table class="shop_table">
                                    <thead>
                                    <tr>
                                        <th class="product-remove"></th>
                                        <th class="product-thumbnail"></th>
                                        <th class="product-name"></th>
                                        <th class="product-price"></th>
                                        <th class="product-quantity"></th>
                                        <th class="product-subtotal"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    
                                    <?php
									$subTotal = 0;
									while($rowGrabCart = mysqli_fetch_array($grabCartItems)){
										$productId = $rowGrabCart['productId'];
										$productQty = $rowGrabCart['cartQty'];
										$productColor = $rowGrabCart['cartColour'];
										$productWarr= $rowGrabCart['cartWarranty'];
										
										$productPriceSql = "SELECT * FROM product WHERE productId='$productId'";
										$getProductPrice = mysqli_query($conn,$productPriceSql);
										$rowPrice = mysqli_fetch_array($getProductPrice);
										$unitPrice = $rowPrice['productPrice'];
										$productName = $rowPrice['productName'];
										$productImg = $rowPrice['image1'];
										
                                        $subTotal = $unitPrice * $productQty;
                                        
                                        echo "
                                        <tr class='cart_item'>
                                        <td class='product-remove'>
                                        <button name='remove[]' type='submit' value='$productId'>
                                        <i class='fa fa-trash'></i>
                                        </button>
                                        </td>
                                        <td class='product-thumbnail'>
                                            <a>
                                                <img src='admin/resources/img/product_img/$productImg' alt='img' class='attachment-shop_thumbnail size-shop_thumbnail wp-post-image'>
                                            </a>
                                        </td>
                                        <td class='product-name' data-title='Product'>
                                            <a href='#' class='title'>$productName</a>
                                        </td>
                                        <td class='product-quantity' data-title='Quantity'>
                                            <div class='quantity'>
                                                <div class='control'>
                                                    <input type='text' data-step='1' data-min='0' value='$productQty' title='Quantity' class='input-qty qty' size='4' disabled>
                                                </div>
                                            </div>
                                        </td>
                                        <td class='product-price' data-title='Price'>
													<span class='woocommerce-Price-amount amount'>
														<span class='woocommerce-Price-currencySymbol'>
															$
														</span>
														$subTotal
													</span>
                                        </td>
                                    </tr>

                                        ";
                                        global $connF;
                                        $cartAmountSql = "UPDATE cart SET cartAmount='$subTotal' WHERE productId='$productId'";
                                        $cartAmount = mysqli_query($connF,$cartAmountSql);

                                    }
                                        ?>

                                    <tr>
                                        <td class="actions">
                                            <div class="coupon">
                                                <label class="coupon_code">Coupon Code:</label>
                                                <input type="text" name="couponcode" class="input-text" placeholder="Promotion code here">
                                                <input type="submit" name="coupon" value="Apply">
                                                <!-- <a href="#" class="button"></a> -->
                                            </div>
                                            <div class="order-total">
														<span class="title">
															Total Price:
														</span>
                                                <span class="total-price">
															$<?php echo returnPriceCart(); ?>
														</span>
                                            </div>
                                        </td>
                                    </tr>

                                    </tbody>
                                </table>
                                <?php cartUpdate(); ?>
                            </form>
                            <div class="control-cart">
                              <a href="index.php">  <button class="button btn-continue-shopping">
                                    CONTINUE SHOPPING
                                </button></a>
                                <?php
                                if(countCartCheckout()>0){
                                    echo "
                               <a href='checkout.php'> <button class='button btn-cart-to-checkout'>
                               CHECK OUT
                           </button> </a>";
                                }
                                else{
                                    echo "<button class='button btn-cart-to-checkout'>NOTHING IN CART</button>";
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
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