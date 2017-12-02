<?php
include_once '../dbconfig.php';
if(isset($_POST['btn-save']))
{

	$employee = $_POST['employee'];
	$month = $_POST['month'];
	$year = $_POST['year'];
	$allo_type = $_POST['allo_type'];
	$allo_amount = $_POST['allo_amount'];
	$deduc_type = $_POST['deduc_type'];
	$deduc_amount = $_POST['deduc_amount'];
	$basic = $_POST['basic'];
	$total_allo = $_POST['total_allo'];
	$total_deduc = $_POST['total_deduc'];
	$net_salary = $_POST['net_salary'];
	$status = $_POST['status'];


	if($crud->create($employee,$month,$year ,$allo_type,$allo_amount ,$deduc_type,$deduc_amount, $basic,$total_allo,$total_deduc,$net_salary,$status))
	{
		header("Location: add-data.php?inserted");
	}
	else
	{
		header("Location: add-data.php?failure");
	}
}


?>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Hospital Management System</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
	<meta name="viewport" content="width=device-width" />


	<!-- Bootstrap core CSS     -->
	<link href="../dashboard/assets/css/bootstrap.min.css" rel="stylesheet" />

	<!-- Animation library for notifications   -->
	<link href="../dashboard/assets/css/animate.min.css" rel="stylesheet"/>

	<!--  Paper Dashboard core CSS    -->
	<link href="../dashboard/assets/css/paper-dashboard.css" rel="stylesheet"/>



	<!--  Fonts and icons     -->
	<link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
	<link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
	<link href="../dashboard/assets/css/themify-icons.css" rel="stylesheet">

</head>
<body>

	<div class="wrapper">
		<div class="sidebar" data-background-color="white" data-active-color="danger">

			<!--
			Tip 1: you can change the color of the sidebar's background using: data-background-color="white | black"
			Tip 2: you can change the color of the active button using the data-active-color="primary | info | success | warning | danger"
		-->

		<div class="sidebar-wrapper">
			<div class="logo">
				<a href="#" class="simple-text">
					Hospital
				</a>
			</div>

		<ul class="nav">
				<li>
					<a href="../dashboard/">
						<i class="ti-panel"></i>
						<p>Dashboard</p>
					</a>
				</li>
				<li>
					<a href="../staff/index.php">
						<i class="ti-user"></i>
						<p>Staff</p>
					</a>
				</li>
				<li>
					<a href="../patient/">
						<i class="ti ti-wheelchair"></i>
						<p>Patient</p>
					</a>
				</li>
				<li>
					<a href="../visitors/">
						<i class="ti ti-face-smile"></i>
						<p>Visitors</p>
					</a>
				</li>
				<li>
					<a href="../appointment/">
						<i class="ti-star"></i>
						<p>Appointment</p>
					</a>
				</li>
				<li>
					<a href="../lab/">
						<i class="ti ti-home"></i>
						<p>Laboratory</p>
					</a>
				</li>
				<li>
					<a href="../payment_history/">
						<i class="ti ti-money"></i>
						<p>Payment History</p>
					</a>
				</li>
				
				<li>
					<a href="../medicine/">
						<i class="ti ti-spray"></i>
						<p>Medicine</p>
					</a>
				</li>
				<li>
					<a href="../blood_donor/">
						<i class="ti ti-share"></i>
						<p>blood donor</p>
					</a>
				</li>
				<li>
					<a href="../medicine_category/">
						<i class="ti ti-package"></i>
						<p>Medicine Category</p>
					</a>
				</li>
				<li class="active">
					<a href="../payroll/">
						<i class="ti ti-package"></i>
						<p>Payroll</p>
					</a>
				</li>
				<li>
					<a href="../user/home.php">
						<i class="ti ti-plus"></i>
						<p>Add user</p>
					</a>
				</li>

				<li>
					<a href="../user/logout.php?logout=true">
						<i class="ti-export"></i>
						<p>Log Out</p>
					</a>
				</li>
</ul>
</div>
</div>


<div class="main-panel">
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar bar1"></span>
					<span class="icon-bar bar2"></span>
					<span class="icon-bar bar3"></span>
				</button>
				<a class="navbar-brand" href="#">Create Payroll</a>
			</div>
		</div>
	</nav>


<div class="clearfix"></div>

<?php
if(isset($_GET['inserted']))
{
	?>
    <div class="container">
	<div class="alert alert-info">
    <strong>WOW!</strong> Record was inserted successfully <a href="index.php">HOME</a>!
	</div>
	</div>
    <?php
}
else if(isset($_GET['failure']))
{
	?>
    <div class="container">
	<div class="alert alert-warning">
    <strong>SORRY!</strong> ERROR while inserting record !
	</div>
	</div>
    <?php
}
?>

<?php


$host = "localhost";
$database = "hospital";
$username= "root";
$password = "Essau!89";

$conn = new mysqli($host ,$username,$password,$database);
if($conn->connect_error) die($conn->connect_error);



 ?>

<div class="clearfix"></div><br />

	 <div class="content">
 		<div class="container-fluid">

 				</div>
 				<div class="col-lg-12 col-md-12">
 					<div class="card">
 						<div class="header">
 							<h4 class="title">Create Payroll</h4>
 						</div>
 						<div class="content">
 							<form method="post">

 								<div class="row">
									<div class="col-md-4">
 										<div class="form-group">
 											<label >Employee</label>
 											<select name="employee" class="form-control border-input">
											 <option value="">Ousainou</option>
											 	 <option value="">Jaiteh</option>
											 </select>

 										</div>
 									</div>
 									<div class="col-md-4">
 										<div class="form-group">
 											<label>Month</label>
 											<input type="text" name="month"  class="form-control border-input" placeholder="month" required="required">
 										</div>
 									</div>

									<div class="col-md-4">
										<div class="form-group">
											<label>year</label>
											<input type="text" name="year"  class="form-control border-input" placeholder="year" required="required">
										</div>
									</div>
 								</div>
							</div>

							<div class="clearfix"></div>
						</form>

						</div>
						</div>

						<!--   create payroll ends here   -->




						<div class="content">
				  		<div class="container-fluid">

				  				</div>
				  				<div class="col-lg-6 col-md-6">
				  					<div class="card">
				  						<div class="header">
				  							<h4 class="title">Allowances</h4>
				  						</div>
				  						<div class="content">
				  							<form method="post">

				  								<div class="row">
				  									<div class="col-md-6">
				  										<div class="form-group">
				  											<label>Type</label>
				  											<input type="text" name="allo_type"  class="form-control border-input" placeholder="Type" required="required">
				  										</div>
				  									</div>

				 									<div class="col-md-6">
				 										<div class="form-group">
				 											<label>Amount</label>
				 											<input type="text" name="allo_amount"  class="form-control border-input" placeholder="amount"  required="required">
				 										</div>
				 									</div>
				  								</div>
				 							</div>
				 							<div class="clearfix"></div>
				 						</form>

				 					</div>
				 						</div>


										<div class="main-content" >
										<div class="content" >
											<div class="container-fluid" >

													</div>
													<div class="col-lg-6 col-md-6" style="float:right; margin-top:-15%;">
														<div class="card">
															<div class="header">
																<h4 class="title">Deductions</h4>
															</div>
															<div class="content" >
																<form method="post">

																	<div class="row">
																		<div class="col-md-6">
																			<div class="form-group">
																				<label>Type</label>
																				<input type="text" name="deduc_type"  class="form-control border-input" placeholder="type" required="required">
																			</div>
																		</div>

																	<div class="col-md-6">
																		<div class="form-group">
																			<label>Amount</label>
																			<input type="text" name="deduc_amount"  class="form-control border-input" placeholder="amount" required="required">
																		</div>
																	</div>
																	</div>
															</div>
															
															<div class="clearfix"></div>
														</form>

													</div>
														</div>
													</div>
															<!--   allowances ends here   -->

	<div class="clearfix"></div>

															<!--   summary starts here   -->
															<div class="content">
		 		<div class="container-fluid">

		 				</div>
		 				<div class="col-lg-12 col-md-12">
		 					<div class="card">
		 						<div class="header">
		 							<h4 class="title">Summary</h4>
		 						</div>
		 						<div class="content">
		 							<form method="post">

		 								<div class="row">
		 									<div class="col-md-6">
		 										<div class="form-group">
		 											<label>Basic</label>
		 											<input type="text" name="basic" class="form-control border-input" placeholder="Basic" required="required">
		 										</div>
		 									</div>
		 									<div class="col-md-6">
		 										<div class="form-group">
		 											<label>Total Alowances</label>
		 											<input type="text" name="total_allo"  class="form-control border-input" placeholder="Total Allowance" required="required">
		 										</div>
		 									</div>
		 								</div>

		 								<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label>Total Deductions</label>
													<input type="text" name="total_deduc" class="form-control border-input" placeholder="Total Deductions" required="required">
												</div>
											</div>

		 									<div class="col-md-6">
		 										<div class="form-group">
		 											<label >Net Salary</label>
		 											<input type="text" name="net_salary" class="form-control border-input" placeholder="Net Salary" required="required">
		 										</div>
		 									</div>
		 								</div>

		 								<div class="row">
											<div class="col-md-12">
		 										<div class="form-group">
		 											<label >Status</label>
		 											<select name="status" class="form-control border-input">
													 <option value="paid">Paid</option>
													  <option value="unpaid">Unpaid</option>
													 </select>

		 										</div>
		 									</div>




		 								</div>



									<div class="text-center">
										<button type="submit" class="btn btn-info btn-fill btn-wd" name="btn-save" style="margin-right:20px;">Create Payroll</button>
										<a href="index.php" class="btn btn-large btn-success" style=""><i class="glyphicon glyphicon-backward"></i> &nbsp; Back to index</a>
									</div>
									<div class="clearfix"></div>
								</form>

							</div>
						</div>



						</body>

						<!--   Core JS Files   -->
						<script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
						<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

						<!--  Checkbox, Radio & Switch Plugins -->
						<script src="assets/js/bootstrap-checkbox-radio.js"></script>

						<!--  Charts Plugin -->
						<script src="assets/js/chartist.min.js"></script>

						<!--  Notifications Plugin    -->
						<script src="assets/js/bootstrap-notify.js"></script>

						<!--  Google Maps Plugin    -->
						<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>
