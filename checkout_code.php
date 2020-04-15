<?php
	setGetCookie();
?>

<div class="checkout-wrapp">
            
            <div class="payment-method-wrapp">
                <div class="payment-method-form checkout-form">
                    <div class="row-col-1 row-col">
                        <div class="payment-method">
                            <h3 class="title-form">
                                Payment Method
                            </h3>
                           
                            <?php 
                            include('payment.php');
                            ?>
                           
                            
                            
                        </div>
                    </div>
                    <div class="row-col-2 row-col">
                        <div class="your-order">
                            <h3 class="title-form">
                                Your Order
                            </h3>
                            <ul class="list-product-order">
                             
                            <?php
                            		$userCookie = setGetCookie();
                                    $grabCartItemsSql = "SELECT * FROM cart WHERE cartCookie='$userCookie'";
                                    $grabCartItems = mysqli_query($conn,$grabCartItemsSql);
                                    $rowGrab = mysqli_num_rows($grabCartItems);
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

                                        echo " <li class='product-item-order'>
                                        <div class='product-thumb'>
                                            <a>
                                                <img src='admin/resources/img/product_img/$productImg' alt='img'>
                                            </a>
                                        </div>
                                        <div class='product-order-inner'>
                                            <h5 class='product-name'>
                                                <a href='details.php?productId=$productId'>$productName</a>
                                            </h5>
                                            <div class='price'>
                                                $ $unitPrice
                                                <span class='count'>x$productQty</span>
                                            </div>
                                        </div>
                                    </li>";
                                    } 
                                    ?>
                               <!--  <li class='product-item-order'>
                                    <div class='product-thumb'>
                                        <a href='#'>
                                            <img src='images/item-order1.jpg' alt='img'>
                                        </a>
                                    </div>
                                    <div class='product-order-inner'>
                                        <h5 class='product-name'>
                                            <a href='#'>3D Dining Chair</a>
                                        </h5>
                                        <div class='price'>
                                            $45
                                            <span class='count'>x1</span>
                                        </div>
                                    </div>
                                </li> -->

                            </ul>
                            <div class="order-total">
									<span class="title">
										Total Price:
									</span>
                                <span class="total-price">
                                $<?php echo returnPriceCart(); ?>
									</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="button-control">
                    <a href="#" class="button btn-back-to-shipping">BACK TO SHIPPING</a>
                </div>
            </div>

        </div>