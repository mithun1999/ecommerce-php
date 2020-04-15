<?php
	$cusEmail = $_SESSION['cusEmail'];

	$getCustomerSql = "SELECT * FROM customer WHERE cusEmail='$cusEmail'";
	$getCustomer = mysqli_query($conn,$getCustomerSql);
	$rowGetCustomer = mysqli_fetch_array($getCustomer);

	$customerPic = $rowGetCustomer['cusImage'];
	$customerName = $rowGetCustomer['cusName'];

?>

<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                    <div class="wrapper-sidebar shop-sidebar">
                        <div class="widget woof_Widget">
                            <div class="widget" style="color:black;font-weight:bolder;">
							<a href="myaccount.php?myorders">Order Details</a>
							</div>
							<div class="widget" style="color:black;font-weight:bolder;">
							<a href="myaccount.php?changepassword">Change Password</a>
							</div>
							<div class="widget" style="color:black;font-weight:bolder;">
							<a href="myaccount.php?editprofile">Edit profile</a>
							</div>
							<div class="widget" style="color:black;font-weight:bolder;">
							<a href="myaccount.php?wishlist">Wishlist</a>
							</div>
							<div class="widget" style="color:black;font-weight:bolder;">
							<a href="../logout.php">Logout</a>
							</div>

			
                    </div>
                </div>