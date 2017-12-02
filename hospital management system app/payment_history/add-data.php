<?php
include_once '../dbconfig.php';
if(isset($_POST['btn-save']))
{
	//$staff_id = $_POST['staff_id'];
	$invoice_number = $_POST['invoice_number'];
	$title = $_POST['title'];
	$patient = $_POST['patient'];
	$due_date = $_POST['due_date'];
	$amount = $_POST['amount'];
	$status = $_POST['status'];


	if($crud->create($invoice_number,$title,$patient,$due_date,$amount,$status))
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
				<li class="active">
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
				<li>
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
				<a class="navbar-brand" href="#">Payment History</a>
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

<div class="clearfix"></div><br />

		 <div class="content">
 		<div class="container-fluid">

 				</div>
 				<div class="col-lg-8 col-md-7">
 					<div class="card">
 						<div class="header">
 							<h4 class="title">Payment History</h4>
 						</div>
 						<div class="content">
 							<form method="post">

 								<div class="row">
 									<div class="col-md-6">
 										<div class="form-group">
 											<label>Invoice Number</label>
 											<input type="text" name="invoice_number" class="form-control border-input" placeholder="Invoice Number">
 										</div>
 									</div>
 									<div class="col-md-6">
 										<div class="form-group">
 											<label>Title</label>
 											<input type="text" name="title"  class="form-control border-input" placeholder="Title">
 										</div>
 									</div>
 								</div>

 								<div class="row">


								 <div class="col-md-6">
 										<div class="form-group">
 											<label >Patient</label>
 											<input type="text" name="patient" class="form-control border-input" placeholder="Patient">
 										</div>
 									</div>


									 <div class="col-md-6">
 										<div class="form-group">
 											<label>Due Date</label>
 											<input type="date" name="due_date" class="form-control border-input" placeholder="due_date">
 										</div>
 								</div>


 								</div>

 								<div class="row">
 									<div class="col-md-6">
 										<div class="form-group">
 											<label for="phone">Amount</label>
 											<input type="text" name="amount" class="form-control border-input" placeholder="Amount">
 										</div>
 									</div>


									 <div class="col-md-6">
 										<div class="form-group">
 											<label >Status</label>
 											<select name="status" class="form-control border-input">
											 <option value="paid">Paid</option>
											 <option value="unpaid">Unpaid</option>
											 </select>

 										</div>
 									</div>

 								</div>

							</div>


							<div class="text-center">
								<button type="submit" class="btn btn-info btn-fill btn-wd" name="btn-save" style="margin-right:20px;">Add Payment</button>
								<a href="index.php" class="btn btn-large btn-success" style=""><i class="glyphicon glyphicon-backward"></i> &nbsp; Back to index</a>
							</div>
							<div class="clearfix"></div>
						</form>


						<footer class="footer">
							<div class="container-fluid">
								<nav class="pull-left">
									<ul>

										<li>
											<a href="#">
												Hospital Management System
											</a>
										</li>
									</ul>
								</nav>
								<div class="copyright pull-right">
									&copy; <script>document.write(new Date().getFullYear())</script>, made with <i class="fa fa-heart heart"></i> by <a href="#">Hospital Management System</a>
								</div>
							</div>
						</footer>

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

						<!-- Paper Dashboard Core javascript and methods for Demo purpose -->
						<script src="assets/js/paper-dashboard.js"></script>

						<!-- Paper Dashboard DEMO methods, don't include it in your project! -->
						<script src="assets/js/demo.js"></script>
