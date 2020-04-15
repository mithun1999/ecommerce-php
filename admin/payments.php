<?php
	
	if(!isset($_SESSION['email'])){
		echo "<script>window.open('login.php','_self')</script>";
	}
	else{
?>
<!DOCTYPE html>
<html>
	<head>
		<title> Payments - Azone Kurunegala</title>
		
		<!--Add CSS Files-->
		<link rel="stylesheet" type="text/css" href="resources/css/adminstyle.css">
		<link rel="stylesheet" href="resources/css/bootstrap.min.css">
		<link rel="stylesheet"  type="text/css" href="resources/font-awesome/css/font-awesome.min.css">
		<link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,700,900" rel="stylesheet">
		
		
	</head>
	<body>
		<div class="row">
			<div class="col-lg-12">
				<br>
				<br>
				<ol class="breadcrumb">
					<li class="active">
						<i class="fa fa-dashboard"></i> Dashboard / Payments
					</li>
				</ol>
			</div>
		</div>
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<div class="panel-title">
							<i class="fa fa-dollar"></i> Payments
						</div>
					</div>
					<div class="panel-body">
						<div class="table-responsive">
							<table class="table table-bordered table-striped">
							
								<thead>
									<tr>
										<th>Pay Id</th>
										<th>InvoiceNo</th>
										<th>Amount</th>
										<th>Payments Method</th>
										<th>Payment Date</th>
										<th>Branch</th>
										<th>Slip</th>
										<th>Deposited Amount</th>
										<th>Price</th>
										<th>Confim Payment</th>
									</tr>
								</thead>
								<tbody>
									<?php
										displayPayment();
									?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<!--Add JavaScript Files-->
		<script src="resources/js/jquery.min.js"></script>
		<script src="resources/js/bootstrap.min.js"></script>
		<script src="resources/js/sweetalert.min.js"></script>
	</body>
</html>
<?php } ?>