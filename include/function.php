<?php
	$server = "localhost";
	$user	= "root";
	$password = "";
	$database	= "azone";
	$connF = null;

	$connF = mysqli_connect($server,$user,$password,$database);



	function getProducts(){
		
		global $connF;
		$sql = "SELECT * FROM product ORDER BY 1 DESC LIMIT 0,8";
		$getProduct = mysqli_query($connF,$sql);
		
		while($rowProduct = mysqli_fetch_array($getProduct)){
			
			$productId = $rowProduct['productId'];
			$productName = $rowProduct['productName'];
			$productPrice = $rowProduct['productPrice'];
			$productImg1 = $rowProduct['image1'];
			
			echo"
			
			<!--	One Product Code Start-->
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
					</h5><br/>
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
		</li>
<!--	One Product Code End-->
			";
		}
	}

	function getProductsFeatured(){
		global $connF;
		$sql = "SELECT * FROM product ORDER BY availability DESC LIMIT 0,6";
		$getProduct = mysqli_query($connF,$sql);
		
		while($rowProduct = mysqli_fetch_array($getProduct)){
			
			$productId = $rowProduct['productId'];
			$productName = $rowProduct['productName'];
			$productPrice = $rowProduct['productPrice'];
			$productImg1 = $rowProduct['image1'];

			echo "
			<li class='product-item  col-lg-4 col-md-6 col-sm-6 col-xs-6 col-ts-12 style-3'>
			<div class='product-inner equal-element'>
				<div class='product-thumb'>
					<div class='product-top'>
						
					</div>
					<div class='thumb-inner'>
						<a href='#' tabindex='0'>
							<img src='admin/resources/img/product_img/$productImg1' alt='img'>
						</a>
					</div>
				</div>
				<div class='product-info'>
					<h5 class='product-name product_title'>
						<a href='details.php?productId=$productId' tabindex='0'>$productName</a>
					</h5>
					<div class='group-info'>
						<div class='price'>
							<span>$ $productPrice</span>
						</div>
					</div>
					<div class='group-buttons'>
					<a href='details.php?productId=$productId'><button class='add_to_cart_button button' tabindex='0'>Shop Now</button></a>`
					</div>
				</div>
				
			</div>
		</li>
			";
	}
}

	function getManufactures(){
		
		global $connF;
		$sql = "SELECT * FROM manufacture ORDER BY 1 LIMIT 0,10";
		$getManufacture = mysqli_query($connF,$sql);
		
		while($rowManufacture = mysqli_fetch_array($getManufacture)){
			
			$manufactureId = $rowManufacture['manufactureId'];
			$manName = $rowManufacture['manName'];
			$manImage = $rowManufacture['manImage'];
				
			echo"
			
				<li><a href='store.php?manufacture=$manufactureId'>$manName</a></li>
			";
			
		}

	}

	function getCategory(){
		
		global $connF;
		$sql = "SELECT * FROM category";
		$getCategory = mysqli_query($connF,$sql);
		
		while($rowCategory = mysqli_fetch_array($getCategory)){
			
			$categoryId = $rowCategory['categoryId'];
			$categoryName = $rowCategory['catName'];
			$categoryImage = $rowCategory['catImage'];
				
			echo"
			
				<li><a href='store.php?category=$categoryId'>$categoryName</a></li>
			";
			
		}
		
		
	}

	function getCategoryNav(){
		global $connF;
		$sql = "SELECT * FROM category";
		$getCategory = mysqli_query($connF,$sql);
		
		while($rowCategory = mysqli_fetch_array($getCategory)){
			
			$categoryId = $rowCategory['categoryId'];
			$categoryName = $rowCategory['catName'];
			$categoryImage = $rowCategory['catImage'];
				
			echo"
			<a href='store.php?category=$categoryId'><option>$categoryName</option></a>
			";
			
		}
	}

	function getCategoryNav1(){
		global $connF;
		$sql = "SELECT * FROM category";
		$getCategory = mysqli_query($connF,$sql);
		
		while($rowCategory = mysqli_fetch_array($getCategory)){
			
			$categoryId = $rowCategory['categoryId'];
			$categoryName = $rowCategory['catName'];
			$categoryImage = $rowCategory['catImage'];
				
			echo"
			<li class='menu-item'>
                <a href='store.php?category=$categoryId' class='zentimo-menu-item-title'>$categoryName</a>
            </li>
			";
			
		}
	}

function sortManufacture(){
	
	global $connF;
	if(isset($_GET['manufacture'])){
		$manuId = $_GET['manufacture'];
		$sql = "SELECT * FROM product WHERE manufactureId='$manuId'";
		$sortManufacture = mysqli_query($connF,$sql);
		
		while($rowManufactureSort = mysqli_fetch_array($sortManufacture)){
			$productId = $rowManufactureSort['productId'];
			$productName = $rowManufactureSort['productName'];
			$productPrice = $rowManufactureSort['productPrice'];
			$productImg1 = $rowManufactureSort['image1'];
			
			echo"
			
			<!--	One Product Code Start-->
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
                                    </li>
<!--	One Product Code End-->
			";
			
		}
	}
}

function sortCategory(){
	
	global $connF;
	if(isset($_GET['category'])){
		$categoryId = $_GET['category'];
		$sql = "SELECT * FROM product WHERE categoryId='$categoryId'";
		$sortCategory = mysqli_query($connF,$sql);
		
		while($rowCategory = mysqli_fetch_array($sortCategory)){
			$productId = $rowCategory['productId'];
			$productName = $rowCategory['productName'];
			$productPrice = $rowCategory['productPrice'];
			$productImg1 = $rowCategory['image1'];
			
			echo"
			
			<!--	One Product Code Start-->
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
                                    </li>
<!--	One Product Code End-->
			";
			
		}
	}
}

function sortPrice(){
	if(isset($_POST['priceSort'])){
		global $connF;
		$minPrice = $_POST['minPrice'];
		$maxPrice = $_POST['maxPrice'];
		if(empty($minPrice)){
			$minPrice = 0;
		}
		if(empty($maxPrice)){
			$maxPrice = 9999999;
		}	
		$sql = "SELECT * FROM product WHERE productPrice BETWEEN $minPrice AND $maxPrice ORDER BY productPrice ASC";
		$sortPrice = mysqli_query($connF,$sql);
		
		while($rowSortPrice = mysqli_fetch_array($sortPrice)){
			$productId = $rowSortPrice['productId'];
			$productName = $rowSortPrice['productName'];
			$productPrice = $rowSortPrice['productPrice'];
			$productImg1 = $rowSortPrice['image1'];
						
			echo"

			<!--	One Product Code Start-->
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
                                    </li>
<!--	One Product Code End-->
			";
	}
	}
}

function generateConfimCode(){
	
	$combination = 'qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM0123456789!@$%()*';
	$combination = str_shuffle($combination);
	$confirmCode = substr($combination,0,15);
	return $confirmCode;
}

function generateRandomPassword(){
	
	$combination = 'qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM0123456789~!@#$%^&*()_+[]{}<>?';
	$combination = str_shuffle($combination);
	$randomPassword = substr($combination,0,8);
	return $randomPassword;
}

function sentConfirmMail($email,$name,$cCode){
	
	//PHPMailer Function
			$mail = new PHPMailer;
			$mail->isSMTP();
			$mail->SMTPDebug = 0;
			$mail->Debugoutput = 'html';
			$mail->Host = 'smtp.gmail.com';
			$mail->Port = 587;
			$mail->SMTPSecure = 'tls';
			$mail->SMTPAuth = true;
			$mail->Username = "mailer.azone@gmail.com";
			$mail->Password = "azone@123456";
			$mail->setFrom('mailer.azone@gmail.com', 'Azone Support');
			$mail->addAddress($email, $name);
			$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
			$mail->Subject = 'Please Confirm Your Azone Account';
			$mail->Body = "
						<p>Hi! $name </p>
						<p>Thank you for registering on our site </p>
						<br><br><br>
						<b> Please visit My Account page on site to confirm your email </b>
						<br><br>
						Your Azone Account Confirmation Code:&nbsp; <strong>$cCode</strong>
						<br><br>
						<b><i>Important! Please verifiy your email just after logged into the site</i></b>
						";
			if (!$mail->send()) {
    			echo "<script>alert('Somthing Wrong! Please Contact Us')</script>";
			}
	
}

function customerRegister(){
	
	global $connF;
	
	if(isset($_POST['register'])){
		
		$cusName = $_POST['cus_name'];
		$cusEmail = $_POST['cus_email'];
		$cusPass = $_POST['cus_pass'];
		$cusCPass = $_POST['cus_cpass'];
		$cusPNo = $_POST['cus_pno'];
		$cusAddress = $_POST['cus_address'];
		$cusCity = $_POST['cus_city'];
		$cusProfilePic = $_FILES['cus_dp']['name'];
		$cusProfilePicTemp = $_FILES['cus_dp']['tmp_name'];
		$cusConfimCode = generateConfimCode();
		$cusPassEncrpt = encNanoSec($cusPass);
		
		
		$getCustomerInfoSql = "SELECT * FROM customer WHERE cusEmail='$cusEmail'";
		$getCustomerInfo = mysqli_query($connF,$getCustomerInfoSql);
		$alreadyRegistered = mysqli_num_rows($getCustomerInfo);
		
		//Google Recaptcha
		$sKey = "6LdScHYUAAAAAL6_FSP4Jgmv_Vd4-2sYytWiBt0K";
		$gResponse = $_POST['g-recaptcha-response'];
		$remoteIP = $_SERVER['REMOTE_ADDR'];
		$guRL = "https://www.google.com/recaptcha/api/siteverify?secret=$sKey&response=$gResponse&remoteip=$remoteIP";
		$retuenResponse = file_get_contents($guRL);
		$jsonResponse = json_decode($retuenResponse);
		
		if($cusPass == $cusCPass || $jsonResponse->success && $alreadyRegistered==0){
			move_uploaded_file($cusProfilePicTemp,"customers/resources/img/userpics/$cusProfilePic");
			
			$registerCustomerSql = "INSERT INTO customer(cusName, cusEmail, cusPassword, cusAddress, cusCity, cusImage, cConfirmCode, cusPNum) VALUES ('$cusName','$cusEmail','$cusPassEncrpt','$cusAddress','$cusCity','$cusProfilePic','$cusConfimCode','$cusPNo')";
			
			$registerCustomer = mysqli_query($connF,$registerCustomerSql);
			
			//PHPMailer Function
			$mail = new PHPMailer;
			$mail->isSMTP();
			$mail->SMTPDebug = 0;
			$mail->Debugoutput = 'html';
			$mail->Host = 'smtp.gmail.com';
			$mail->Port = 587;
			$mail->SMTPSecure = 'tls';
			$mail->SMTPAuth = true;
			$mail->Username = "mailer.azone@gmail.com";
			$mail->Password = "azone@123456";
			$mail->setFrom('mailer.azone@gmail.com', 'Azone Support');
			$mail->addAddress($cusEmail, $cusName);
			$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
			$mail->Subject = 'Please Confirm Your Azone Account';
			$mail->Body = "
						<p>Hi! $cusName </p>
						<p>Thank you for registering on our site </p>
						<br><br><br>
						<b> Please visit My Account page on site to confirm your email </b>
						<br><br>
						Your Azone Account Confirmation Code:&nbsp; <strong>$cusConfimCode</strong>
						<br><br>
						<b><i>Important! Please verifiy your email just after logged into the site</i></b>
						";
			if (!$mail->send()) {
    			echo "<script>alert('Somthing Wrong! Please Contact Us')</script>";
			}
			
			//Check register customer have items on cart
			$registerCusCookie = setGetCookie();
			$checkCartSql = "SELECT * FROM cart WHERE cartCookie='$registerCusCookie'";
			$checkCart = mysqli_query($connF,$checkCartSql);
			$countCheckCart = mysqli_num_rows($checkCart);
			
			if($countCheckCart>0){
				$_SESSION['cusEmail'] = $cusEmail;
				echo "<script>alert('Registered Success')</script>";
				echo "<script>window.open('cart.php','_self')</script>";
			}else{
				echo "<script>alert('Registered Success')</script>";
				echo "<script>window.open('store.php','_self')</script>";
			}
		}
		else if(!$gResponse){
			echo "<script>alert('Please complete recaptcha!')</script>";
		}
		else if($cusPass != $cusCPass){
			echo "<script>alert('Password and Confirm Password are not matched')</script>";
		}
		else if($alreadyRegistered>0){
			echo "<script>alert('Your email have been registered already!')</script>";
		}
		else{
			echo "<script>alert('Please check your inputs')</script>";
		}
		
		
	}
}



function customerLogin(){
	
	global $connF;
	global $wrongpass;
	
	if(isset($_POST['login'])){
		
		$cusEmail = $_POST['cus_email'];
		$cusPass = $_POST['cus_pass'];
		$cusPassEncrypt = encNanoSec($cusPass);
		
		//Google Recaptcha
		$sKey = "6LdScHYUAAAAAL6_FSP4Jgmv_Vd4-2sYytWiBt0K";
		$gResponse = $_POST['g-recaptcha-response'];
		$remoteIP = $_SERVER['REMOTE_ADDR'];
		$guRL = "https://www.google.com/recaptcha/api/siteverify?secret=$sKey&response=$gResponse&remoteip=$remoteIP";
		$retuenResponse = file_get_contents($guRL);
		$jsonResponse = json_decode($retuenResponse);
		
		if($jsonResponse->success || $cusEmail != ""){
			
			$loginCustomerSql = "SELECT * FROM customer WHERE cusEmail='$cusEmail' AND cusPassword='$cusPassEncrypt'";
			$loginCustomer = mysqli_query($connF,$loginCustomerSql);
			$checklogin = mysqli_num_rows($loginCustomer);
			
			$registerCusCookie = setGetCookie();
			$checkCartSql = "SELECT * FROM cart WHERE cartCookie='$registerCusCookie'";
			$checkCart = mysqli_query($connF,$checkCartSql);
			$countCheckCart = mysqli_num_rows($checkCart);
			
			if($checklogin>0 && $countCheckCart > 0){
				
				$_SESSION['cusEmail'] = $cusEmail;
				echo "<script>window.open('cart.php','_self')</script>";
				
			}else if($checklogin > 0 && $countCheckCart == 0){
				$_SESSION['cusEmail'] = $cusEmail;
				echo "<script>window.open('myaccount.php?myorders','_self')</script>";
			}else{
				$wrongpass = "Invalid Email/Password";
			}
		}else{
			$wrongpass = "Please complete the Recaptcha";
		}
		
		
		
		
	}
}



function recoverPassword(){
	
	global $connF;
	global $wrongpass;
	
	if(isset($_POST['recoverpass'])){
		
		$customerEmail = $_POST['cus_email'];
		
		//Google Recaptcha
		$sKey = "6LdScHYUAAAAAL6_FSP4Jgmv_Vd4-2sYytWiBt0K";
		$gResponse = $_POST['g-recaptcha-response'];
		$remoteIP = $_SERVER['REMOTE_ADDR'];
		$guRL = "https://www.google.com/recaptcha/api/siteverify?secret=$sKey&response=$gResponse&remoteip=$remoteIP";
		$retuenResponse = file_get_contents($guRL);
		$jsonResponse = json_decode($retuenResponse);
		
		$getCustomerSql = "SELECT * FROM customer WHERE cusEmail='$customerEmail'";
		$getCustomer = mysqli_query($connF,$getCustomerSql);
		$getCustomerRow = mysqli_fetch_array($getCustomer);
		$getCustomerCount = mysqli_num_rows($getCustomer);
		
		if($getCustomerCount > 0 || $jsonResponse->success){
			
			$randomPassword = generateRandomPassword();
			$encRandomPassword = encNanoSec($randomPassword);
			
			$setRandowPasswordSql = "UPDATE customer SET cusPassword='$encRandomPassword' WHERE cusEmail='$customerEmail'";
			$setRandowPassword = mysqli_query($connF,$setRandowPasswordSql);
			$customerName = $getCustomerRow['cusName'];


			//PHPMailer Function
			$mail = new PHPMailer;
			$mail->isSMTP();
			$mail->SMTPDebug = 0;
			$mail->Debugoutput = 'html';
			$mail->Host = 'smtp.gmail.com';
			$mail->Port = 587;
			$mail->SMTPSecure = 'tls';
			$mail->SMTPAuth = true;
			$mail->Username = "mailer.azone@gmail.com";
			$mail->Password = "azone@123456";
			$mail->setFrom('mailer.azone@gmail.com', 'Azone Support');
			$mail->addAddress($customerEmail, $customerName);
			$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
			$mail->Subject = 'Your Azone Account Password';
			$mail->Body = "
						<b> This password is generated by Azone Servers </b>
						<br><br>
						Your Azone Account Password:&nbsp; <strong>$randomPassword</strong>
						<br><br>
						<b><i>Important! Please change your password just after logged into the site</i></b>
						";
			if (!$mail->send()) {
    			$wrongpass = "Somthing Wrong";
			} 
			else {
   				$wrongpass = "Password has been sent your email! Please check your inbox/spam folder";
			}
		}
		else{
			if(!$getCustomerCount>0){
				$wrongpass = "Email not found, Please check your email";
			}
			$wrongpass = "Please complete the Recaptcha!";
		}
	}
	
	
}

function setGetCookie(){
	
	global $random; 
	$random= rand(0, 9999999); 
	if(!isset($_COOKIE['user_cookie'])) {
    	setcookie('user_cookie',$random, time() + (86400), "/");//86400 = 1 day
	}
	else {
    	return $_COOKIE['user_cookie']; 
	}
	
}

function getProductPrice($productId){
	global $connF;
	$productPriceSql = "SELECT * FROM product WHERE productId='$productId'";
	$getProductPrice = mysqli_query($connF,$productPriceSql);	
	$rowPrice = mysqli_fetch_array($getProductPrice);
	$productPrice = $rowPrice['productPrice'];
	
	return $productPrice;
}

function addCart(){
	
	global $connF;
	if(isset($_POST['addCart'])){
		$userCookie = setGetCookie(); 
		$productIdCart = $_POST['productId'];
		$productQty = $_POST['qty'];
		//$productColor = $_POST['color'];
		//$productWarrenty = $_POST['warrenty'];
		$productPrice = getProductPrice($productIdCart);
		
		$cartProductsSql = "SELECT * FROM cart WHERE cartCookie='$userCookie' AND productId ='$productIdCart'";
		
		$checkCart = mysqli_query($connF,$cartProductsSql);
		
		if(mysqli_num_rows($checkCart)>0){
			echo"<script>alert('Product already added to cart')</script>";
			echo "<script>window.open('details.php?productId=$productIdCart','_self')</script>";
				
		}else{
			$addCartSql = "INSERT INTO cart(productId,cartPrice,cartQty, cartCookie) VALUES ('$productIdCart','$productPrice','$productQty','$userCookie')";
			
			$addProdutCart = mysqli_query($connF,$addCartSql);
			echo "<script>window.open('details.php?productId=$productIdCart','_self')</script>";
			
		}
	}
	 
}

function countCart(){
	global $connF;
	$userCookie = setGetCookie();
	$countItemsSql = "SELECT * FROM cart WHERE cartCookie='$userCookie'";
	$countItems = mysqli_query($connF,$countItemsSql);
	$count = mysqli_num_rows($countItems);
	
	echo $count;
}

function countCartCheckout(){
	global $connF;
	$userCookie = setGetCookie();
	$countItemsSql = "SELECT * FROM cart WHERE cartCookie='$userCookie'";
	$countItems = mysqli_query($connF,$countItemsSql);
	$count = mysqli_num_rows($countItems);
	
	return $count;
}

function priceCart(){
	
	global $connF;
	
	$totalPrice = 0;
	$userCookie = setGetCookie();
	$cartItemsSql = "SELECT * FROM cart WHERE cartCookie='$userCookie'";
	$cartItems = mysqli_query($connF,$cartItemsSql);
		
	while($row = mysqli_fetch_array($cartItems)){
		$productId = $row['productId'];
		$productQty = $row['cartQty'];
		$productWarrenty = $row['cartWarranty'];
		
		$productWarrenty = $row['cartWarranty'];
		$cartPrice = $row['cartPrice'];
		$Price = $cartPrice * $productQty;
		
		$totalPrice += $Price;
		
	}
	
	echo " " . $totalPrice . " ";
}


function returnPriceCart(){
	
	global $connF;
	
	$totalPrice = 0;
	$userCookie = setGetCookie();
	$cartItemsSql = "SELECT * FROM cart WHERE cartCookie='$userCookie'";
	$cartItems = mysqli_query($connF,$cartItemsSql);
	
	while($row = mysqli_fetch_array($cartItems)){
		$productId = $row['productId'];
		$productQty = $row['cartQty'];
		$productWarrenty = $row['cartWarranty'];
		$cartPrice = $row['cartPrice'];
		$Price = $cartPrice * $productQty;
		
		$totalPrice += $Price;

	}
	
	return round($totalPrice,2);
}

/*  function cartUpdate(){
	global $connF;
	if(isset($_POST['update'])){
		foreach($_POST['remove'] as $removeItemId){
			
			$removeItemSql = "DELETE FROM cart WHERE productId='$removeItemId'";
			$removeItem = mysqli_query($connF,$removeItemSql);
			if($removeItem){
				echo "<script>window.open('cart.php','_self')</script>";
			}
		}
	}
}  */
 function cartUpdate(){
	global $connF;
	if(isset($_POST['remove'])){
		foreach($_POST['remove'] as $removeItemId){
			
			$removeItemSql = "DELETE FROM cart WHERE productId='$removeItemId'";
			$removeItem = mysqli_query($connF,$removeItemSql);
			if($removeItem){
				echo "<script>window.open('cart.php','_self')</script>";
			}
		}
	}
} 


function suggestProducts(){
	
				global $connF;
				$getRandomProductsSql = "SELECT * FROM product ORDER BY RAND() LIMIT 0,3";
				$getRandomProducts = mysqli_query($connF,$getRandomProductsSql);
				while($rowGetRandomProducts = mysqli_fetch_array($getRandomProducts)){
					$productId = $rowGetRandomProducts['productId'];
					$productName = $rowGetRandomProducts['productName'];
					$productPrice = $rowGetRandomProducts['productPrice'];
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
			<a href='details.php?productId=$productId'>
				<img src='admin/resources/img/product_img/$productImg1Mini' alt='img'>
			</a>
		</div>
		<a href='details.php?productId=$productId' class='button quick-wiew-button'>Quick View</a>
	</div>
	<div class='product-info'>
		<h5 class='product-name product_title'>
			<a>$productName</a>
		</h5><br/>
		<div class='group-info'>
			<div class='price'>
				<ins style='color:#758AA2;'>
					<b>$ $productPrice</b>
				</ins>
			</div>
		</div>
	</div>
</div>
</li>
<!--						One Sub Product Start-->
							
							
							
					";
				}
					
}

function welcomeUser(){
	if(!isset($_SESSION['cusEmail'])){
		echo "Welcome : Guest";
	}else{
		echo "Welcome : " . $_SESSION['cusEmail'];
	}
}

function switchLoginLogout(){
	if(!isset($_SESSION['cusEmail'])){
		echo "<a href='register.php'>Register | </a>";
		echo "<a href='login.php'>Login</a>";
	}else{
		echo "<a href='logout.php'>Logout</a>";
	}
}

function makeOrder(){
	global $connF;
	if(isset($_GET['customerId'])){
		
		$cusId = $_GET['customerId'];
		$userCookie = setGetCookie();
		
		$getCartItemSql = "SELECT * FROM cart WHERE cartCookie = '$userCookie'";
		$getCartItem = mysqli_query($connF,$getCartItemSql);
		
		$generateInvoice = mt_rand();

		while($rowGetCartItem = mysqli_fetch_array($getCartItem)){
			
			$productId = $rowGetCartItem['productId'];
			$productQty = $rowGetCartItem['cartQty'];
			$productWarrenty = $rowGetCartItem['cartWarranty'];
			$productColor = $rowGetCartItem['cartColour'];
			$Price = $rowGetCartItem['cartPrice'];
				
			$createOrderSql = "INSERT INTO orders(cusId,productId , orderAmount, invoiceNumber, qty, colour,warranty, date, status) VALUES ('$cusId',$productId ,'$Price','$generateInvoice','$productQty','$productColor','$productWarrenty',NOW(),'Unpaid')";
				$createOrder = mysqli_query($connF,$createOrderSql);
				
			$removeCartSql = "DELETE FROM cart WHERE cartCookie = '$userCookie' AND productId = '$productId'";
			$removeCart = mysqli_query($connF,$removeCartSql);

		}
		
		
		$getCustomerEmailSql = "SELECT * FROM customer WHERE cusId='$cusId'";
		$getCustomerEmail = mysqli_query($connF,$getCustomerEmailSql);
		$getCustomerEmailRow = mysqli_fetch_array($getCustomerEmail);
		$cusEmail = $getCustomerEmailRow['cusEmail'];
	
		//PHPMailer Function
			$mail = new PHPMailer;
			$mail->isSMTP();
			$mail->SMTPDebug = 0;
			$mail->Debugoutput = 'html';
			$mail->Host = 'smtp.gmail.com';
			$mail->Port = 587;
			$mail->SMTPSecure = 'tls';
			$mail->SMTPAuth = true;
			$mail->Username = "mailer.azone@gmail.com";
			$mail->Password = "azone@123456";
			$mail->setFrom('mailer.azone@gmail.com', 'Azone Support');
			$mail->addAddress($cusEmail,$cusEmail );
			$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
			$mail->Subject = 'Order Placed Successfully';
			$mail->Body = "
						<b>You order have been successfully placed, Please wait! Our customer care will contact you ASAP</b>
						<br><br>
						<b>Thanks<br>Azone Team</b>
						
						
						<br><br>
						<b><i>If you need any kind of assistant, please contact Us</i></b>
						";
			if (!$mail->send()) {
    			echo "<script>alert('Please contact us')</script>";
			} 
			else {
   				echo "<script>alert('Order placed successfully! Please complete the payment')</script>";
				echo "<script>window.open('myaccount.php?myorders','_self')</script>";
			}
		
	}
}

function offlinePayment(){
	
	global $connF;

	if(isset($_POST['payconfirm'])){
		
		$orderId = $_GET['offlinePayment'];
		$offlineOrderId = $_GET['offlinePayment'];
		$invoiceNo = $_POST['invoiceno'];
		$payDate = $_POST['paydat'];
		$paymentMode = $_POST['paymode'];
		$paymentBranch = $_POST['paybank'];
		$transactionId = $_POST['payid'];
		$paidAmount = $_POST['payamount'];
		
		
		$getCustomerIdSql = "SELECT * FROM orders WHERE orderId=$orderId";
		$getCustomerId = mysqli_query($connF,$getCustomerIdSql);
		$getCustomerIdRow = mysqli_fetch_array($getCustomerId);
		
		$getPaymentStatus = $getCustomerIdRow['status'];
		
		if($getPaymentStatus == "unpaid" || $getPaymentStatus == "Unpaid"){
				
			//slip upload
			$paymentSlip = $_FILES['attachslip']['name'];
			$paymentSlipTemp = $_FILES['attachslip']['tmp_name'];
			move_uploaded_file($paymentSlipTemp,"resources/img/userpayslips/$paymentSlip");
		
			$getCustomerIdSql = "SELECT * FROM orders WHERE orderId=$orderId";
			$getCustomerId = mysqli_query($connF,$getCustomerIdSql);
			$getCustomerIdRow = mysqli_fetch_array($getCustomerId);
		
			$customerId = $getCustomerIdRow['cusId'];
		
			$makePaymentSql = "INSERT INTO payement(customerId, pInvoiceNum, amount, payMethod, date) VALUES ('$customerId','$invoiceNo','$paidAmount','$paymentMode','$payDate')";
			$makePayment = mysqli_query($connF,$makePaymentSql);
		
			$lastInsertId = mysqli_insert_id($connF);
		
			$saveOffliePaymentSql = "INSERT INTO offlinepayement(branch, depositImage, depositDate, amount, payId) VALUES ('$paymentBranch','$paymentSlip','$payDate','$paidAmount','$lastInsertId')"; 
			$saveOffliePayment = mysqli_query($connF,$saveOffliePaymentSql);
		
			$updateOrderStatusSql = "UPDATE orders SET status='Paid' WHERE invoiceNumber='$invoiceNo'";
			$updateOrderStatus = mysqli_query($connF,$updateOrderStatusSql);
		
			if($updateOrderStatus){
				echo "<script>alert('Payment Completed, You will receive confirmation soon!')</script>";
				echo "<script>window.open('myaccount.php?myorders','_self')</script>";
			}
			
		}else{
			echo "<script>alert('You already have paid for this item, You will receive confirmation soon!')</script>";
			echo "<script>window.open('myaccount.php?myorders','_self')</script>";
		}
			
	}
	
}


function editProfile(){
	
	global $connF;
	
	if(isset($_POST['editprofile'])){
		
		$currentUser = $_SESSION['cusEmail'];
		
		$cusName = $_POST['cus_name'];
		$cusEmail = $_POST['cus_email'];
		$cusPNo = $_POST['cus_pno'];
		$cusAddress = $_POST['cus_address'];
		$cusCity = $_POST['cus_city'];
		$cusProfilePic = $_FILES['cus_dp']['name'];
		$cusProfilePicTemp = $_FILES['cus_dp']['tmp_name'];
		$cusConfimCode = rand();
		
		if($cusProfilePic != ""){
			$editProfileSql = "UPDATE customer SET cusName='$cusName',cusEmail='$cusEmail',cusAddress='$cusAddress',cusCity='$cusCity',cusImage='$cusProfilePic',cConfirmCode='$cusConfimCode',cusPNum='$cusPNo' WHERE cusEmail='$currentUser'";
		}
		else{
			$editProfileSql = "UPDATE customer SET cusName='$cusName',cusEmail='$cusEmail',cusAddress='$cusAddress',cusCity='$cusCity',cConfirmCode='$cusConfimCode',cusPNum='$cusPNo' WHERE cusEmail='$currentUser'";
		}
		move_uploaded_file($cusProfilePicTemp,"customers/resources/img/userpics/$cusProfilePic");
		$editProfile = mysqli_query($connF,$editProfileSql);
		
	}
}

function changePassword(){
	
	global $connF;
	
	if(isset($_POST['changepassword'])){
		$currentUser = $_SESSION['cusEmail'];
		$getCustomerPasswordSql = "SELECT * FROM customer WHERE cusEmail='$currentUser'";
		$getCustomerPassword = mysqli_query($connF,$getCustomerPasswordSql);	
		$getCustomerPasswordRow = mysqli_fetch_array($getCustomerPassword);
		
		$currentPassword = $_POST['current_pass'];
		$newPassword = $_POST['new_pass'];
		$cNewPassword = $_POST['new_cpass'];
		
		$currentPasswordDB = $getCustomerPasswordRow['cusPassword'];
		$decryptCurrentPassword = decNanoSec($currentPasswordDB);
		
		if($currentPassword == $decryptCurrentPassword && $newPassword == $cNewPassword){
			$encryptNewPassword = encNanoSec($newPassword);
			$changePasswordSql = "UPDATE customer SET cusPassword='$encryptNewPassword' WHERE cusEmail = '$currentUser'";
			$changePassword = mysqli_query($connF,$changePasswordSql);
			echo "<script>alert('Password changed successfully!, Please login to contiune')</script>";
			session_destroy();
			echo "<script>window.open('../login.php','_self')</script>";
		}
		else if($currentPasswordDB != $currentPassword && $newPassword == $cNewPassword){
			
			echo "<script>alert('Your current password is wrong!')</script>";
		}
		else if($currentPasswordDB == $currentPassword && $newPassword != $cNewPassword){
			
			echo "<script>alert('Confirm password mismatch')</script>";
		}
		else{
			echo "<script>alert('Something wrong!')</script>";
		}
			
	}
}

function addNewProducts(){
	global $connF;
	if(isset($_POST['addnewproduct'])){
		
		$productName = $_POST['productName'];
		$productUrl = $_POST['productUrl'];
		$productPrice = $_POST['productPrice'];
		$productDet = $_POST['productDet'];
		$productManuf = $_POST['productManuf'];
		$productCateg = $_POST['productCateg'];
		$productKeyword = $_POST['productKeyword'];
		$productFea = $_POST['productFea'];
		$productAva = $_POST['productAva'];
		$productWarrenty = $_POST['productWarrenty'];
		
		$productImg1 = $_FILES['productimg1']['name'];
		$productImg2 = $_FILES['productimg2']['name'];
		$productImg3 = $_FILES['productimg3']['name'];
		$productImg4 = $_FILES['productimg4']['name'];

		$tempImg1 = $_FILES['productimg1']['tmp_name'];
		$tempImg2 = $_FILES['productimg2']['tmp_name'];
		$tempImg3 = $_FILES['productimg3']['tmp_name'];
		$tempImg4 = $_FILES['productimg4']['tmp_name'];

		move_uploaded_file($tempImg1,"resources/img/product_img/$productImg1");
		move_uploaded_file($tempImg2,"resources/img/product_img/$productImg2");
		move_uploaded_file($tempImg3,"resources/img/product_img/$productImg3");
		move_uploaded_file($tempImg4,"resources/img/product_img/$productImg4");


		
		$sql = "INSERT INTO product(productDate,productName, customUrl, image1, image2, image3, image4, productPrice, productDetails, manufactureId, categoryId, productKeywords, features, availability, Warranty) VALUES (NOW(),'$productName','$productUrl','$productImg1','$productImg2','$productImg3','$productImg4','$productPrice','$productDet','$productManuf','$productCateg','$productKeyword','$productFea','$productAva','$productWarrenty')";
		
		$addProduct = mysqli_query($connF,$sql);
		if($addProduct){
			echo "<script>alert('Product Added')</script>";
			echo "<script>window.open('index.php?addproducts','_self')</script>";
		}
	}
}

function getAdminDetails(){
	
	global $connF;
	
	$currentAdmin = $_SESSION['email'];
	$adminDetailsSql = "SELECT * FROM admin WHERE adminEmail ='$currentAdmin'";
	$adminDetails = mysqli_query($connF,$adminDetailsSql);
	$adminDetailsRow = mysqli_fetch_array($adminDetails);
	
	$adminName = $adminDetailsRow['adminName'];
	echo "$adminName";	
}

function countNoOrders(){
	global $connF;
	$getOrderDetailSql = "SELECT * FROM orders WHERE 1";
	$getOrderDetail = mysqli_query($connF,$getOrderDetailSql);
	$orderCount = mysqli_num_rows($getOrderDetail);
	
	echo "$orderCount";
}

function countProducts(){
	
	global $connF;
	$getProductDetailSql = "SELECT * FROM product WHERE 1";
	$getProductDetail = mysqli_query($connF,$getProductDetailSql);
	$productCount = mysqli_num_rows($getProductDetail);
	
	echo "$productCount";
}

function countPayment(){
	
	global $connF;
	$getPaymentDetailSql = "SELECT * FROM payement WHERE 1";
	$getPaymentDetail = mysqli_query($connF,$getPaymentDetailSql);
	$paymentCount = mysqli_num_rows($getPaymentDetail);
	
	echo "$paymentCount";
}

function printNewOrders(){
	
	global $connF;
	$getNewOrdersSql = "SELECT * FROM orders WHERE 1 ORDER BY orderId DESC LIMIT 10";
	$getNewOrders = mysqli_query($connF,$getNewOrdersSql);
	
	while($getNewOrdersRow = mysqli_fetch_array($getNewOrders)){
		
		$orderNo = $getNewOrdersRow['orderId'];
		$invoiceNo = $getNewOrdersRow['invoiceNumber'];
		$orderDate = $getNewOrdersRow['date'];
		
		$productId = $getNewOrdersRow['productId'];
		$getProductNameSql = "SELECT * FROM product WHERE productId='$productId'";
		$getProductName = mysqli_query($connF,$getProductNameSql);
		$getProductNameRow = mysqli_fetch_array($getProductName);
		$productName = $getProductNameRow['productName'];
		
		$orderQty = $getNewOrdersRow['qty'];
		$orderColor = $getNewOrdersRow['colour'];
		$orderWarranty = $getNewOrdersRow['warranty'];
		
		$cusId = $getNewOrdersRow['cusId'];
		$getCustomerEmailSql= "SELECT * FROM customer WHERE cusId='$cusId'";
		$getCustomerEmail = mysqli_query($connF,$getCustomerEmailSql);
		$getCustomerEmailRow = mysqli_fetch_array($getCustomerEmail);
		$customerEmail = $getCustomerEmailRow['cusEmail'];
		
		$orderStatus = $getNewOrdersRow['status'];
		
		echo "
			<tr>
				<td>$orderNo</td>
				<td>$invoiceNo</td>
				<td>$orderDate</td>
				<td>$productName</td>
				<td>$orderQty</td>
				<td>$orderColor</td>
				<td>$orderWarranty</td>
				<td>$customerEmail</td>
				<td>$orderStatus</td>
			</tr>
		
		";
		
		
	}
}
  
function displayProducts(){
	
	global $connF;
	$getProductsSql = "SELECT * FROM product WHERE 1";
	$getProducts = mysqli_query($connF,$getProductsSql);
	
	while($getProductsRow = mysqli_fetch_array($getProducts)){
		
		$productId = $getProductsRow['productId'];
		$productDate = $getProductsRow['productDate'];
		$productName = $getProductsRow['productName'];
		$productCUrl = $getProductsRow['customUrl'];
		$productImage1 = $getProductsRow['image1'];
		$productImage2 = $getProductsRow['image2'];
		$productImage3 = $getProductsRow['image3'];
		$productImage4 = $getProductsRow['image4'];
		$productPrice = $getProductsRow['productPrice'];
		$productDetails = $getProductsRow['productDetails'];
		$productManufa = $getProductsRow['manufactureId'];
		$productCateg = $getProductsRow['categoryId'];
		$productKeyword = $getProductsRow['productKeywords'];
		$productFea = $getProductsRow['features'];
		$productAvail = $getProductsRow['availability'];
		$productWarrenty = $getProductsRow['Warranty'];
		
		if($productAvail==0){
			$productAvail = "Coming Soon";
		}
		else if($productAvail==1){
			$productAvail = "Available";
		}
		else{
			$productAvail = "Out of Stock";
		}
		
		$getCategoryNameSql = "SELECT * FROM category WHERE categoryId='$productCateg'";
		$getCategoryName = mysqli_query($connF,$getCategoryNameSql);
		$getCategoryNameRow = mysqli_fetch_array($getCategoryName);
		
		$categoryName = $getCategoryNameRow['catName'];
		
		$getManufactureNameSql = "SELECT * FROM manufacture WHERE manufactureId='$productManufa'";
		$getManufactureName = mysqli_query($connF,$getManufactureNameSql);
		$getManufactureNameRow = mysqli_fetch_array($getManufactureName);
		
		$ManufactureName = $getManufactureNameRow['manName'];
		
		
		echo "
		<tr>
			<td>$productId</td>
			<td>$productDate</td>
			<td>$productName</td>
			<td>$productCUrl</td>
			<td><img src='resources/img/product_img/$productImage1' style='width: 50px;height:50px;'></td>
			<td><img src='resources/img/product_img/$productImage2' style='width: 50px;height:50px;'></td>
			<td><img src='resources/img/product_img/$productImage3' style='width: 50px;height:50px;'></td>
			<td><img src='resources/img/product_img/$productImage4' style='width: 50px;height:50px;'></td>
			<td>$productPrice</td>
<!--		<td>$productDetails</td> -->
			<td>$ManufactureName</td>
			<td>$categoryName</td>
			<td>$productKeyword</td>
<!--		<td>$productFea</td> -->
			<td>$productAvail</td>
			<td>$productWarrenty</td>
			<td><a href='index.php?editProduct=$productId'>Edit</a></td>
			<td><a href='index.php?deleteProduct=$productId'>Delete</a></td>
			
		</tr>
		";
		
		
		
		
	}
	
}

function deleteProduct(){
	
	global $connF;
	if(isset($_GET['deleteProduct'])){
		
		$productId = $_GET['deleteProduct'];
		$deleteProductSql = "DELETE FROM product WHERE productId='$productId'";
		$deleteProduct = mysqli_query($connF,$deleteProductSql);
		
		if($deleteProduct){
			echo "<script>alert('Product Deleted')</script>";
			echo "<script>window.open('index.php?viewproducts','_self')</script>";
			
		}
		else{
			echo "<script>alert('Something Wrong!')</script>";
			echo "<script>window.open('index.php?viewproducts','_self')</script>";
		}
	}
}

function updateProduct(){
	
	global $connF;
	
	if(isset($_POST['updateproduct'])){
		
		$productId = $_GET['editProduct'];
		
		$getProductsSql = "SELECT * FROM product WHERE productId='$productId'";
		$getProducts = mysqli_query($connF,$getProductsSql);
		$getProductsRow = mysqli_fetch_array($getProducts);
		
		$productImage1Old = $getProductsRow['image1'];
		$productImage2Old = $getProductsRow['image2'];
		$productImage3Old = $getProductsRow['image3'];
		$productImage4Old = $getProductsRow['image4'];
		
		$productName = $_POST['productName'];
		$productCUrl = $_POST['productUrl'];
		$productImage1 = $_FILES['productimg1']['name'];
		$productImage2 = $_FILES['productimg2']['name'];
		$productImage3 = $_FILES['productimg3']['name'];
		$productImage4 = $_FILES['productimg4']['name'];
		$productPrice = $_POST['productPrice'];
		$productDetails = $_POST['productDet'];
		$productManufa = $_POST['productManuf'];
		$productCateg = $_POST['productCateg'];
		$productKeyword = $_POST['productKeyword'];
		$productFea = $_POST['productFea'];
		$productAvail = $_POST['productAva'];
		$productWarrenty = $_POST['productWarrenty'];
		
		if(empty($productImage1)){
			$productImage1 = $productImage1Old;
		}
		
		if(empty($productImage2)){
			$productImage2 = $productImage2Old;
		}
		
		if(empty($productImage3)){
			$productImage3 = $productImage3Old;
		}
		
		if(empty($productImage4)){
			$productImage4 = $productImage4Old;
		}
		
		$tempImg1 = $_FILES['productimg1']['tmp_name'];
		$tempImg2 = $_FILES['productimg2']['tmp_name'];
		$tempImg3 = $_FILES['productimg3']['tmp_name'];
		$tempImg4 = $_FILES['productimg4']['tmp_name'];

		move_uploaded_file($tempImg1,"resources/img/product_img/$productImage1");
		move_uploaded_file($tempImg2,"resources/img/product_img/$productImage2");
		move_uploaded_file($tempImg3,"resources/img/product_img/$productImage3");
		move_uploaded_file($tempImg4,"resources/img/product_img/$productImage4");
		
		$updateProductSql = "UPDATE product SET productName='$productName',customUrl='$productCUrl',image1='$productImage1',image2='$productImage2',image3='$productImage3',image4='$productImage4',productPrice='$productPrice',productDetails='$productDetails',manufactureId='$productManufa',categoryId='$productCateg',productKeywords='$productKeyword',features='$productFea',availability=$productAvail,Warranty='$productWarrenty' WHERE productId='$productId'";
		
		$updateProduct = mysqli_query($connF,$updateProductSql);
		
		if($updateProduct){
			echo "<script>alert('Product Updated')</script>";
			echo "<script>window.open('index.php?viewproducts','_self')</script>";
		}
		else{
			echo "<script>alert('Something Wrong!')</script>";
			echo "<script>window.open('index.php?viewproducts','_self')</script>";
		}
	
	}
 
}

function displayOrders(){
	
	global $connF;
	$getNewOrdersSql = "SELECT * FROM orders WHERE 1 ORDER BY orderId ASC";
	$getNewOrders = mysqli_query($connF,$getNewOrdersSql);
	
	while($getNewOrdersRow = mysqli_fetch_array($getNewOrders)){
		
		$orderNo = $getNewOrdersRow['orderId'];
		$invoiceNo = $getNewOrdersRow['invoiceNumber'];
		$orderDate = $getNewOrdersRow['date'];
		
		$productId = $getNewOrdersRow['productId'];
		$getProductNameSql = "SELECT * FROM product WHERE productId='$productId'";
		$getProductName = mysqli_query($connF,$getProductNameSql);
		$getProductNameRow = mysqli_fetch_array($getProductName);
		$productName = $getProductNameRow['productName'];
		
		$orderQty = $getNewOrdersRow['qty'];
		$orderColor = $getNewOrdersRow['colour'];
		$orderWarranty = $getNewOrdersRow['warranty'];
		
		$cusId = $getNewOrdersRow['cusId'];
		$getCustomerEmailSql= "SELECT * FROM customer WHERE cusId='$cusId'";
		$getCustomerEmail = mysqli_query($connF,$getCustomerEmailSql);
		$getCustomerEmailRow = mysqli_fetch_array($getCustomerEmail);
		$customerEmail = $getCustomerEmailRow['cusEmail'];
		
		$orderStatus = $getNewOrdersRow['status'];
		
		echo "
			<tr>
				<td>$orderNo</td>
				<td>$invoiceNo</td>
				<td>$orderDate</td>
				<td>$productName</td>
				<td>$orderQty</td>
				<td>$orderColor</td>
				<td>$orderWarranty</td>
				<td>$customerEmail</td>
				<td>$orderStatus</td>
				<td><a href='index.php?shipConfirm=$invoiceNo'>Confirm</a></td>
			</tr>
		
		";
		
		
	}
}

function confirmShip(){
	
	global $connF;
	if(isset($_GET['shipConfirm'])){
		
		$invoiceNo = $_GET['shipConfirm'];
		$confirmOrderSql = "UPDATE orders SET status='Shipped' WHERE invoiceNumber='$invoiceNo'";
		$confirmOrder = mysqli_query($connF,$confirmOrderSql);
		
		if($confirmOrder){
			echo "<script>window.open('index.php?orderlist','_self')</script>";
		}
		
	}
}

function displayPayment(){
	
	global $connF;
	$getPaymentSql = "SELECT * FROM payement WHERE 1";
	$getPayment = mysqli_query($connF,$getPaymentSql);
	
	while($getPaymentRow = mysqli_fetch_array($getPayment)){
		
		$payId = $getPaymentRow['payId'];
		
		$cusId = $getPaymentRow['customerId'];
		$getCustomerEmailSql= "SELECT * FROM customer WHERE cusId='$cusId'";
		$getCustomerEmail = mysqli_query($connF,$getCustomerEmailSql);
		$getCustomerEmailRow = mysqli_fetch_array($getCustomerEmail);
		$customerEmail = $getCustomerEmailRow['cusEmail'];
		
		$invoiceNo = $getPaymentRow['pInvoiceNum'];
		$amount = $getPaymentRow['amount'];
		$payMethod = $getPaymentRow['payMethod'];
		$payDate = $getPaymentRow['date'];
		$depositSlip = '';
		$branch = '';
		$depositeDate = '';
		$depositAmount = '';
		//getOffline Payment Details
		$getOfflinePaymentSql = "SELECT * FROM offlinepayement WHERE payId='$payId'";
		$getOfflinePayment = mysqli_query($connF,$getOfflinePaymentSql);
		while($getOfflinePaymentRow = mysqli_fetch_array($getOfflinePayment)){
			
			$depositSlip = $getOfflinePaymentRow['depositImage'];
			$branch = $getOfflinePaymentRow['branch'];
			$depositeDate = $getOfflinePaymentRow['depositDate'];
			$depositAmount = $getOfflinePaymentRow['amount'];

		}
		
		if($depositSlip==''){
			echo "
			
				<tr>
					<td>$payId</td>
					<td>$invoiceNo</td>
					<td>$amount</td>
					<td>$payMethod</td>
					<td>$payDate</td>
					<td>$branch</td>
					<td>$depositSlip</td>
					<td>$depositeDate</td>
					<td>$depositAmount</td>
					<td><a href='index.php?payConfirm=$invoiceNo'>Confirm</a></td>
				</tr>
			";
		}
		else{
			echo "
			
				<tr>
					<td>$payId</td>
					<td>$invoiceNo</td>
					<td>$amount</td>
					<td>$payMethod</td>
					<td>$payDate</td>
					<td>$branch</td>
					<td><a href='../customers/resources/img/userpayslips/$depositSlip' target='_blank'>view</a></td>
					<td>$depositeDate</td>
					<td>$depositAmount</td>
					<td><a href='index.php?payConfirm=$invoiceNo'>Confirm</a></td>
				</tr>
			";
		}

	}
}

function confirmPayment(){ 
	
	global $connF;
	if(isset($_GET['payConfirm'])){
		
		$invoiceNo = $_GET['payConfirm'];
		$confirmOrderSql = "UPDATE orders SET status='Verified' WHERE invoiceNumber='$invoiceNo'";
		$confirmOrder = mysqli_query($connF,$confirmOrderSql);
		
		if($confirmOrder){
			echo "<script>window.open('index.php?payments','_self')</script>";
		}
		
	}
}

function countCustomerNoOrders($cusId){
	global $connF;
	$getOrderDetailSql = "SELECT * FROM orders WHERE cusId = '$cusId'";
	$getOrderDetail = mysqli_query($connF,$getOrderDetailSql);
	$orderCount = mysqli_num_rows($getOrderDetail);
	
	return $orderCount;
}

function displayCustomers(){
	
	global $connF;
	$getCustomerSql = "SELECT * FROM customer WHERE 1 ORDER BY cusId ASC";
	$getCustomer = mysqli_query($connF,$getCustomerSql);
	
	while($getCutomerRow = mysqli_fetch_array($getCustomer)){
		
		$cusId = $getCutomerRow['cusId'];
		$cusName = $getCutomerRow['cusName'];
		$cusEmail = $getCutomerRow['cusEmail'];
		$cusAddress = $getCutomerRow['cusAddress'];
		$cusCity = $getCutomerRow['cusCity'];
		$cusPno = $getCutomerRow['cusPNum'];
		$cusOrderCount = countCustomerNoOrders($cusId);
		$cusVerified = $getCutomerRow['cConfirmCode'];
		
		if($cusVerified==''){
			echo "
			
				<tr>
					<td>$cusId</td>
					<td>$cusName</td>
					<td>$cusEmail</td>
					<td>$cusAddress</td>
					<td>$cusCity</td>
					<td>$cusPno</td>
					<td>$cusOrderCount</td>
					<td>Verified</td>
					<td><a href='index.php?deleteCustomer=$cusId'>Delete</a></td>
				</tr>
			
			";
		}
		else{
			echo "
			
				<tr>
					<td>$cusId</td>
					<td>$cusName</td>
					<td>$cusEmail</td>
					<td>$cusAddress</td>
					<td>$cusCity</td>
					<td>$cusPno</td>
					<td>$cusOrderCount</td>
					<td>Not Verified</td>
					<td><a href='index.php?deleteCustomer=$cusId'>Delete</a></td>
				</tr>
			
			";
			
		}
	}
	
}

function deleteCustomer(){
	global $connF;
	if(isset($_GET['deleteCustomer'])){
		
		$cusId = $_GET['deleteCustomer'];
		$deleteCustomerSql = "DELETE FROM customer WHERE cusId='$cusId'";
		$deleteCustomer = mysqli_query($connF,$deleteCustomerSql);
		
		if($deleteCustomer){
			echo "<script>alert('Customer Deleted')</script>";
			echo "<script>window.open('index.php?customers','_self')</script>";
		}
		
	}
}

function addCategory(){
	global $connF;
	if(isset($_POST['addnewcategory'])){
		
		$categoryName = $_POST['productCategoty'];
		$addCategorySql = "INSERT INTO category(catName) VALUES ('$categoryName')";
		$addCategory = mysqli_query($connF,$addCategorySql);
		if($addCategory){
			echo "<script>alert('Category Added')</script>";
			echo "<script>window.open('index.php?addcategory','_self')</script>";
		}
		
	}
}


function displayCategory(){
	global $connF;
	$getCategorySql = "SELECT * FROM category WHERE 1";
	$getCategory = mysqli_query($connF,$getCategorySql);
	while($getCategoryRow = mysqli_fetch_array($getCategory)){
		$categoryId = $getCategoryRow['categoryId'];
		$categoryName = $getCategoryRow['catName'];
		echo "
			<tr>
				<td>$categoryId</td>
				<td>$categoryName</td>
				<td><a href='index.php?deleteCategory=$categoryId'>Delete</a></td>
			</tr>
		
		";
	}
}

function deleteCategory(){
	global $connF;
	if(isset($_GET['deleteCategory'])){
		
		$categoryId = $_GET['deleteCategory'];
		$deleteCategorySql = "DELETE FROM category WHERE categoryId='$categoryId'";
		$deleteCategory = mysqli_query($connF,$deleteCategorySql);
		if($deleteCategory){
			echo "<script>window.open('index.php?viewcategory','_self')</script>";
		}
	}
	
}

function addManufacture(){
	global $connF;
	if(isset($_POST['addnewmanufacture'])){
		
		$manufactureName = $_POST['producManufacture'];
		$addManufactureSql = "INSERT INTO manufacture(manName) VALUES ('$manufactureName')";
		$addManufacture = mysqli_query($connF,$addManufactureSql);
		if($addManufacture){
			echo "<script>alert('Manufacture Added')</script>";
			echo "<script>window.open('index.php?addmanufacture','_self')</script>";
		}
		
	}
	
}

function viewManufacture(){
	global $connF;
	if(isset($_GET['viewmanufacture'])){
		$getManufactureSql = "SELECT * FROM manufacture WHERE 1";
		$getManufacture = mysqli_query($connF,$getManufactureSql);
		while($getManufactureRow = mysqli_fetch_array($getManufacture)){
			$manufactureId = $getManufactureRow['manufactureId'];
			$manufactureName = $getManufactureRow['manName'];
			echo "
				<tr>
					<td>$manufactureId</td>
					<td>$manufactureName</td>
					<td><a href='index.php?deleteManufacture=$manufactureId'>Delete</a></td>
				</tr>
		
			";
		}
		
	}
}

function deleteManufacture(){
	global $connF;
	if(isset($_GET['deleteManufacture'])){
		
		$manufactureId = $_GET['deleteManufacture'];
		$deleteManufactureSql = "DELETE FROM manufacture WHERE manufactureId='$manufactureId'";
		$deleteManufacture = mysqli_query($connF,$deleteManufactureSql);
		if(deleteManufacture){
			echo "<script>window.open('index.php?viewmanufacture','_self')</script>";
		}
	}
}

function addNewAds(){
	global $connF;
	if(isset($_POST['addnewad'])){
		
		$adTitle = $_POST['adname'];
		$adDetail = $_POST['addetail'];
		$addNewAdSql = "INSERT INTO adds(addTitle,addDescription) VALUES ('$adTitle','$adDetail')";
		$addNewAd = mysqli_query($connF,$addNewAdSql);
		if($addNewAd){
			echo "<script>alert('Ad Added')</script>";
			echo "<script>window.open('index.php?addads','_self')</script>";
		}
	}
}
 
function viewAds(){
	global $connF;
	if(isset($_GET['viewads'])){
		$getAdSql = "SELECT * FROM adds WHERE 1";
		$getAd = mysqli_query($connF,$getAdSql);
		while($getAdRow = mysqli_fetch_array($getAd)){
			$adId = $getAdRow['addId'];
			$adTitle = $getAdRow['addTitle'];
			$adDetail = $getAdRow['addDescription'];
			echo "
				<tr>
					<td>$adId</td>
					<td>$adTitle</td>
					<td>$adDetail</td>
					<td><a href='index.php?deleteAd=$adId'>Delete</a></td>
				</tr>
			";
		}
	}
	
}

function deleteAds(){
	global $connF;
	if(isset($_GET['deleteAd'])){
		$adId = $_GET['deleteAd'];
		$deleteAdSql = "DELETE FROM adds WHERE addId='$adId'";
		$deleteAd = mysqli_query($connF,$deleteAdSql);
		if($deleteAd){
			echo "<script>window.open('index.php?viewads','_sel
			f')</script>";
		}
	}
}
 
function displayAds(){
	global $connF;
	$getAdsSql = "SELECT * FROM adds ORDER BY addId LIMIT 3";
	$getAds = mysqli_query($connF,$getAdsSql);
	while($getAdsRow = mysqli_fetch_array($getAds)){
		$adTitle = $getAdsRow['addTitle'];
		$adDetail = $getAdsRow['addDescription'];
		echo "
			<div class='col-sm-4'>
					<div class='box same-height'>
						<h3><a href='#'>$adTitle</a></h3>
						<p>$adDetail</p>
					</div>
				</div>
		
			";
		
	}
}

function addSlide(){
	global $connF;
	if(isset($_POST['addnewslide'])){
		
		$slideName = $_POST['slidename'];
		$slideImg = $_FILES['slideimg']['name'];
		$tempImg1 = $_FILES['slideimg']['tmp_name'];
		move_uploaded_file($tempImg1,"resources/img/slideshow/$slideImg");
		
		$addNewSlideSql = "INSERT INTO slider(sName, sImage) VALUES ('$slideName','$slideImg')";
		$addNewSlide = mysqli_query($connF,$addNewSlideSql);
		if($addNewSlide){
			echo "<script>alert('Slide Added')</script>";
			echo "<script>window.open('index.php?addslideshow','_self')</script>";
		}
	}
}

function viewSlide(){
	global $connF;
	$getSlidesSql = "SELECT * FROM slider WHERE 1";
	$getSlides = mysqli_query($connF,$getSlidesSql);
	while($getSlidesRow = mysqli_fetch_array($getSlides)){
		$slideId = $getSlidesRow['sliderId'];
		$slideName = $getSlidesRow['sName'];
		$slideImg = $getSlidesRow['sImage'];
		echo "	
				<tr>
					<td>$slideId</td>
					<td>$slideName</td>
					<td><img src='resources/img/slideshow/$slideImg' style='width: 50px;height:50px;'></td>
					<td><a href='index.php?deleteSlide=$slideId'>Delete</a></td>
				</tr>
		
			";
	}
}

function deleteSlide(){
	global $connF;
	if(isset($_GET['deleteSlide'])){
		$slideId = $_GET['deleteSlide'];
		$deleteSlideSql = "DELETE FROM slider WHERE sliderId='$slideId'";
		$deleteSlide = mysqli_query($connF,$deleteSlideSql);
		if($deleteSlide){
			echo"<script>alert('Slide Deleted')</script>";
			echo "<script>window.open('index.php?viewslideshow','_self')</script>";
		}
	}
}

function addNewAdmin(){
	global $connF;
	if(isset($_POST['addnewadmin'])){
		$adminName = $_POST['adminName'];
		$adminEmail = $_POST['adminEmail'];
		$adminPass = $_POST['adminPass'];
		$adminCPass = $_POST['adminCPass'];
		$adminImg = $_FILES['adminimg1']['name'];
		$adminTempImg = $_FILES['adminimg1']['tmp_name'];
		$adminPno = $_POST['adminPNo'];
		
		if($adminPass == $adminCPass){
			$adminPassEnc = encNanoSec($adminPass);
			$addAdminSql = "INSERT INTO admin(adminName, adminEmail, adminPassword, adminPhoto, adminPNum) VALUES ('$adminName','$adminEmail','$adminPassEnc','$adminImg','$adminPno')";
			$addAdmin = mysqli_query($connF,$addAdminSql);
			move_uploaded_file($adminTempImg,"resources/admin_img/$adminImg");
			if($addAdmin){
			echo "<script>alert('Admin Added')</script>";
			echo "<script>window.open('index.php?addadmin','_self')</script>";
		}
		}
	}
}

function viewAdmin(){
	global $connF;
	$viewAdminSql ="SELECT * FROM admin WHERE 1";
	$viewAdmin = mysqli_query($connF,$viewAdminSql);
	
	while($viewAdminRow = mysqli_fetch_array($viewAdmin)){
		$adminId = $viewAdminRow['adminId'];
		$adminName = $viewAdminRow['adminName'];
		$adminEmail = $viewAdminRow['adminEmail'];
		$adminPass = $viewAdminRow['adminPassword'];
		$adminPassDec = decNanoSec($adminPass);
		$adminImg = $viewAdminRow['adminPhoto'];
		$adminPno = $viewAdminRow['adminPNum'];
		
		echo "	
				<tr>
					<td>$adminId</td>
					<td>$adminName</td>
					<td>$adminEmail</td>
					<td>$adminPassDec</td>
					<td><img src='resources/admin_img/$adminImg' style='width: 50px;height:50px;'></td>
					<td>$adminPno</td>
					<td><a href='index.php?deleteAdmin=$adminId'>Delete</a></td>
				</tr>
		
			";
	}
}

function deleteAdmin(){
	global $connF;
	if(isset($_GET['deleteAdmin'])){
		$adminId = $_GET['deleteAdmin'];
		$deleteAdminSql = "DELETE FROM admin WHERE adminId='$adminId'";
		$deleteAdmin = mysqli_query($connF,$deleteAdminSql);
		if($deleteAdmin){
			echo"<script>alert('Admin Deleted')</script>";
			echo "<script>window.open('index.php?viewadmins','_self')</script>";
		}
	}
}

function contactUs(){
	global $connF;
	if(isset($_POST['contactus'])){
		$cusName = $_POST['name'];
		$cusEmail = $_POST['email'];
		$subject = $_POST['subject'];
		$message = $_POST['message'];
		
		$saveInqueySql ="INSERT INTO supportticket(ticketDepartment, ticketcusName, ticketcusEmail, ticketcusSub, ticketcusMsg) VALUES ('$department','$cusName','$cusEmail','$subject','$message')";
		$saveInquey = mysqli_query($connF,$saveInqueySql);
		$supportEmail = 'mailer.azone@gmail.com';
		
		//PHPMailer Function
			$mail = new PHPMailer;
			$mail->isSMTP();
			$mail->SMTPDebug = 0;
			$mail->Debugoutput = 'html';
			$mail->Host = 'smtp.gmail.com';
			$mail->Port = 587;
			$mail->SMTPSecure = 'tls';
			$mail->SMTPAuth = true;
			$mail->Username = "typeyourgmailid@gmail.com";
			$mail->Password = "yourpassword";
			$mail->setFrom('yourgmail@gmail.com', 'Mithun Support');
			$mail->addAddress($supportEmail, 'Inquery Handler');
			$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
			$mail->Subject = 'Customer Inquery - Mithun';
			$mail->Body = "
						
						<b> Customer Name : $cusName </b>
						<br><br>
						<b> Customer Email : $cusEmail </b>
						<br><br>
						<b> Subject : $subject </b>
						<br><br>
						<p> Message : $message </p>
						<br><br>
						<br><br>
						<b><i>If you need any kind of assistant, please contact Root Administrator</i></b>
						";
			if (!$mail->send()) {
				echo"<script>alert('Something Wrong, Please Call Us')</script>";
			} 
			else {
				echo"<script>alert('Inquery has been sent, Our customer service will contact you')</script>";
			}
	}
}

function applyCoupon(){
	global $connF;
	if(isset($_POST['coupon'])){
		$couponCode = $_POST['couponcode'];
		$userCookie = setGetCookie();
		if($couponCode != ''){
			$getCouponSql = "SELECT * FROM coupons WHERE couponCode='$couponCode'";
			$getCoupon = mysqli_query($connF,$getCouponSql);
			$getCouponNo = mysqli_num_rows($getCoupon);
		
			if($getCouponNo > 0){
				$getCouponRow = mysqli_fetch_array($getCoupon);
				$couponTitle = $getCouponRow['couponTitle'];
				$couponPrice = $getCouponRow['couponPrice'];
				$couponProduct = $getCouponRow['productId'];
				$availableCoupons = $getCouponRow['availableCoupons'];
				
				
				$cartItemsSql = "SELECT * FROM cart WHERE cartCookie='$userCookie' AND productId='$couponProduct'";
				$cartItems = mysqli_query($connF,$cartItemsSql);
				$cartItemsNo = mysqli_num_rows($cartItems);
				
				if($cartItemsNo > 0){
					$row = mysqli_fetch_array($cartItems);
					$cartProductPrice = $row['cartPrice'];
					$couponApplied = $row['couponApplied'];
					
					if($availableCoupons != 0 && $couponApplied == 0){
						$cartProductPrice -= $couponPrice;		//apply the coupon
						$applyCouponSql = "UPDATE cart SET cartPrice='$cartProductPrice',couponApplied = 1 WHERE productId = '$couponProduct'";
						$applyCoupon = mysqli_query($connF,$applyCouponSql);
						
						$updateCouponSql = "UPDATE coupons SET availableCoupons=availableCoupons - 1 WHERE couponCode = '$couponCode'";
						$updateCoupon = mysqli_query($connF,$updateCouponSql);
						
						echo"<script>alert('Coupon applied successfully!')</script>";
						echo "<script>window.open('cart.php','_self')</script>";
					}
					else{
						echo"<script>alert('Coupon already expired!')</script>";
					}
				}else{
					echo"<script>alert('Not valid for current cart products')</script>";
				}
				
			}else{
				echo"<script>alert('Invalid coupon code!')</script>";
			}
			
		}
	}
}

function addWishList(){
	global $connF;
	if(isset($_POST['addwishlist'])){
		$customerEmail = $_SESSION['cusEmail'];
		$productId = $_POST['productId'];
		
		$getCustomerSql = "SELECT * FROM customer WHERE cusEmail='$customerEmail'";
		$getCustomer = mysqli_query($connF,$getCustomerSql);
		$getCustomerRow = mysqli_fetch_array($getCustomer);
		
		$customerId = $getCustomerRow['cusId'];
		
		$wishlistCheckSql = "SELECT * FROM wishlist WHERE custId='$customerId' AND productId='$productId'";
		
		$wishlistCheck = mysqli_query($connF,$wishlistCheckSql);
		
		if(mysqli_num_rows($wishlistCheck)>0){
			echo"<script>alert('Product already added to wishlist')</script>";
			echo "<script>window.open('details.php?productId=$productId','_self')</script>";
				
		}else{
			$addWishListSql="INSERT INTO wishlist(custId, productId) VALUES ('$customerId','$productId')";
			$addWishList = mysqli_query($connF,$addWishListSql);
			echo "<script>window.open('details.php?productId=$productId','_self')</script>";
			
		}
	}
}

function returnCustomerId(){
	global $connF;
	$customerEmail = $_SESSION['cusEmail'];	
	$getCustomerIdSql = "SELECT * FROM customer WHERE cusEmail='$customerEmail'";
	$getCustomerId = mysqli_query($connF,$getCustomerIdSql);
	$getCustomerIdRow = mysqli_fetch_array($getCustomerId);
	$customerId = $getCustomerIdRow['cusId'];

	return $customerId;

}

function USDToLKR(){

	$api = "https://free.currencyconverterapi.com/api/v6/convert?q=USD_LKR&compact=ultra&apiKey=c03422856ac7d9b094a4";
	$value = json_decode(file_get_contents($api),true);
	$rate = $value['USD_LKR'];
	return $rate;
}

function makeOrderPayPal(){
	global $connF;
	if(isset($_GET['customerId'])){
		
		$cusId = $_GET['customerId'];
		$userCookie = setGetCookie();
		
		$getCartItemSql = "SELECT * FROM cart WHERE cartCookie = '$userCookie'";
		$getCartItem = mysqli_query($connF,$getCartItemSql);
		
		$generateInvoice = mt_rand();

		while($rowGetCartItem = mysqli_fetch_array($getCartItem)){
			
			$productId = $rowGetCartItem['productId'];
			$productQty = $rowGetCartItem['cartQty'];
			$productWarrenty = $rowGetCartItem['cartWarranty'];
			$productColor = $rowGetCartItem['cartColour'];
			$Price = $rowGetCartItem['cartPrice'];
				
			$createOrderSql = "INSERT INTO orders(cusId,productId , orderAmount, invoiceNumber, qty, colour,warranty, date, status) VALUES ('$cusId',$productId ,'$Price','$generateInvoice','$productQty','$productColor','$productWarrenty',NOW(),'Paid')";
			$createOrder = mysqli_query($connF,$createOrderSql);

			$makePaymentSql = "INSERT INTO payement(customerId, pInvoiceNum, amount, payMethod, date) VALUES ('$cusId','$generateInvoice','$Price','PayPal',NOW())";
			$makePayment = mysqli_query($connF,$makePaymentSql);
				
			$removeCartSql = "DELETE FROM cart WHERE cartCookie = '$userCookie' AND productId = '$productId'";
			$removeCart = mysqli_query($connF,$removeCartSql);

		}
		
		
		$getCustomerEmailSql = "SELECT * FROM customer WHERE cusId='$cusId'";
		$getCustomerEmail = mysqli_query($connF,$getCustomerEmailSql);
		$getCustomerEmailRow = mysqli_fetch_array($getCustomerEmail);
		$cusEmail = $getCustomerEmailRow['cusEmail'];
	
		//PHPMailer Function
			$mail = new PHPMailer;
			$mail->isSMTP();
			$mail->SMTPDebug = 0;
			$mail->Debugoutput = 'html';
			$mail->Host = 'smtp.gmail.com';
			$mail->Port = 587;
			$mail->SMTPSecure = 'tls';
			$mail->SMTPAuth = true;
			$mail->Username = "yourmail@gmail.com";
			$mail->Password = "yourpwd";
			$mail->setFrom('yourmail@gmail.com', 'localhost');
			$mail->addAddress($cusEmail,$cusEmail );
			$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
			$mail->Subject = 'Order Placed Successfully';
			$mail->Body = "
						<b>You order have been successfully placed, Please wait! Our customer care will contact you ASAP</b>
						<br><br>
						<b>Thanks<br>Mithun Team</b>
						
						
						<br><br>
						<b><i>If you need any kind of assistant, please contact Us</i></b>
						";
			if (!$mail->send()) {
				echo "<script>alert('Please contact us')</script>";
				//echo "<script>window.open('myaccount.php?myorders','_self')</script>";
			} 
			else {
   				echo "<script>alert('Order placed successfully!')</script>";
				echo "<script>window.open('myaccount.php?myorders','_self')</script>";
			}
		
	}
}

function showWishList(){
	global $connF;
	$currentUser = $_SESSION['cusEmail'];
	$getCustomerIdSql = "SELECT * FROM customer WHERE cusEmail='$currentUser'";
	$getCustomerId = mysqli_query($connF,$getCustomerIdSql);
	$getCustomerIdRow = mysqli_fetch_array($getCustomerId);
	
	$cusId = $getCustomerIdRow['cusId'];
	
	$getWishListSql = "SELECT * FROM wishlist WHERE custId='$cusId'";
	$getWishList = mysqli_query($connF,$getWishListSql);
	$count = 0;
	while($getWishListRow = mysqli_fetch_array($getWishList)){
		$count++;
		$productId = $getWishListRow['productId'];
		$wishlistId = $getWishListRow['wishListId'];
		$getProductNameSql = "SELECT * FROM product WHERE productId='$productId'";
		$getProductName = mysqli_query($connF,$getProductNameSql);
		$getProductNameRow = mysqli_fetch_array($getProductName);
		
		$productName = $getProductNameRow['productName'];
		echo "
			<tr>
				 	<td>$count</td>
				 	<td>$productName</td>
				 	<td><a href='../details.php?productId=$productId' class='btn btn-success btn-sm' target='_blank'>Buy Now</td>
				 	<td><a href='deletewishlist.php?wishlistId=$wishlistId' class='btn btn-danger btn-sm'>Delete</td>
			</tr>
		";
	}
	
}

function deleteWishlist(){
	global $connF;
	$wishListId = $_GET['wishlistId'];
	$deleteWishListSql = "DELETE FROM wishlist WHERE wishListId ='$wishListId'";
	$deleteWishList = mysqli_query($connF,$deleteWishListSql);

	if($deleteWishList){
		echo "<script>alert('Item Deleted Successfully')</script>";
		echo "<script>window.open('myaccount.php?wishlist','_self')</script>";
	}
	else{
		echo "<script>alert('Something Wrong! Please Contact Us')</script>";
		echo "<script>window.open('myaccount.php?wishlist','_self')</script>";
	}
}

?>