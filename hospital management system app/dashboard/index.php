<?php require_once("../user/session.php");

require_once("../user/class.user.php");
$auth_user = new USER();


$user_id = $_SESSION['user_session'];

$stmt = $auth_user->runQuery("SELECT * FROM users WHERE user_id=:user_id");
$stmt->execute(array(":user_id"=>$user_id));

$userRow=$stmt->fetch(PDO::FETCH_ASSOC);

?>


<?php 
$host = "localhost";
$database = "hospital";
$username= "root";
$password = "Essau!89";

$conn = new mysqli($host ,$username,$password,$database);
if($conn->connect_error) die($conn->connect_error);


?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title> Welcome - <?php print($userRow['user_email']); ?>To Hospital Management System</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
	<meta name="viewport" content="width=device-width" />


	<!-- Bootstrap core CSS     -->
	<link href="assets/css/bootstrap.min.css" rel="stylesheet" />

	<!-- Animation library for notifications   -->
	<link href="assets/css/animate.min.css" rel="stylesheet"/>

	<!--  Paper Dashboard core CSS    -->
	<link href="assets/css/paper-dashboard.css" rel="stylesheet"/>



	<!--  Fonts and icons     -->
	<link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
	<link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
	<link href="assets/css/themify-icons.css" rel="stylesheet">

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
				<li class="active">
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
				<a class="navbar-brand" href="#">Dashboard</a>
			</div>
			<div class="collapse navbar-collapse">
				<ul class="nav navbar-nav navbar-right">
					<li>
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="ti-panel"></i>
							<p>Stats</p>
						</a>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="ti-bell"></i>
							<p class="notification">5</p>
							<p>Notifications</p>
							<b class="caret"></b>
						</a>
						<ul class="dropdown-menu">
							<li><a href="#"><b>Ousainou</b> just Login</a></li>
							<li><a href="#">Notification 2</a></li>
							<li><a href="#">Notification 3</a></li>
							<li><a href="#">Notification 4</a></li>
							<li><a href="#">Another notification</a></li>
						</ul>
					</li>
				</ul>

			</div>
		</div>
	</nav>


	<div class="content">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-3 col-sm-6">
						<div class="card">
							<div class="content">
								<div class="row">
									<div class="col-xs-3">
										<div class="icon-big icon-warning text-center">
											<i class="ti ti-user"></i>
										</div>
									</div>
									<div class="col-xs-9">
										<div class="numbers">
											<p>Staff</p>
											
											<?php 
          
                  $query = "SELECT COUNT(*) AS 'count'  FROM staff";
                  $result = $conn->query($query);
                  if(!$result) die($conn->error);

                  $rows = $result->num_rows;

                  for ($i=0; $i < $rows ; $i++) {
                    # code...
                    $result->data_seek($i);
                    echo  $result->fetch_assoc()['count'] . "<br>";

                  }
                  
				
          
          ?>
										</div>
									</div>
								</div>
								<div class="footer">
									<hr />
									<div class="stats">
										<i class="ti ti-user"></i> Users
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-sm-6">
						<div class="card">
							<div class="content">
								<div class="row">
									<div class="col-xs-3">
										<div class="icon-big icon-success text-center">
											<i class="ti ti-user"></i>
										</div>
									</div>
									<div class="col-xs-9">
										<div class="numbers">
											<p>Visitors</p>
											<?php 
          
                  $query = "SELECT COUNT(*) AS 'count'  FROM visitors";
                  $result = $conn->query($query);
                  if(!$result) die($conn->error);

                  $rows = $result->num_rows;

                  for ($i=0; $i < $rows ; $i++) {
                    # code...
                    $result->data_seek($i);
                    echo  $result->fetch_assoc()['count'] . "<br>";

                  }
                  
				
          
          ?>
										</div>
									</div>
								</div>
								<div class="footer">
									<hr />
									<div class="stats">
										<i class="ti-calendar"></i> Visitors
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-sm-6">
						<div class="card">
							<div class="content">
								<div class="row">
									<div class="col-xs-3">
										<div class="icon-big icon-danger text-center">
											<i class="ti-spray"></i>
										</div>
									</div>
									<div class="col-xs-9">
										<div class="numbers">
											<p>Medicine</p>
											<?php 
          
                  $query = "SELECT COUNT(*) AS 'count'  FROM medicine";
                  $result = $conn->query($query);
                  if(!$result) die($conn->error);

                  $rows = $result->num_rows;

                  for ($i=0; $i < $rows ; $i++) {
                    # code...
                    $result->data_seek($i);
                    echo  $result->fetch_assoc()['count'] . "<br>";

                  }
                  
				
          
          ?>
										</div>
									</div>
								</div>
								<div class="footer">
									<hr />
									<div class="stats">
										<i class="ti-spray"></i> Medicne
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-sm-6">
						<div class="card">
							<div class="content">
								<div class="row">
									<div class="col-xs-3">
										<div class="icon-big icon-info text-center">
											<i class="ti-user"></i>
										</div>
									</div>
									<div class="col-xs-9">
										<div class="numbers">
											<p>Appointments</p>
											<?php 
          
                  $query = "SELECT COUNT(*) AS 'count'  FROM appointment";
                  $result = $conn->query($query);
                  if(!$result) die($conn->error);

                  $rows = $result->num_rows;

                  for ($i=0; $i < $rows ; $i++) {
                    # code...
                    $result->data_seek($i);
                    echo  $result->fetch_assoc()['count'] . "<br>";

                  }
                  
				
          
          ?>
										</div>
									</div>
								</div>
								<div class="footer">
									<hr />
									<div class="stats">
										<i class="ti-reload"></i> Appointments
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>






<div class="content">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-3 col-sm-6">
						<div class="card">
							<div class="content">
								<div class="row">
									<div class="col-xs-3">
										<div class="icon-big icon-warning text-center">
											<i class="ti ti-money"></i>
										</div>
									</div>
									<div class="col-xs-9">
										<div class="numbers">
											<p>Payments</p>
											<?php 
          
                  $query = "SELECT COUNT(*) AS 'count'  FROM invoice";
                  $result = $conn->query($query);
                  if(!$result) die($conn->error);

                  $rows = $result->num_rows;

                  for ($i=0; $i < $rows ; $i++) {
                    # code...
                    $result->data_seek($i);
                    echo  $result->fetch_assoc()['count'] . "<br>";

                  }
                  
				
          
          ?>
										</div>
									</div>
								</div>
								<div class="footer">
									<hr />
									<div class="stats">
										<i class="ti-money"></i> Payments
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-sm-6">
						<div class="card">
							<div class="content">
								<div class="row">
									<div class="col-xs-3">
										<div class="icon-big icon-success text-center">
											<i class="ti ti-face-sad"></i>
										</div>
									</div>
									<div class="col-xs-9">
										<div class="numbers">
											<p>Death Report</p>
											3
										</div>
									</div>
								</div>
								<div class="footer">
									<hr />
									<div class="stats">
										<i class="ti ti-face-sad"></i> Death Report
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-sm-6">
						<div class="card">
							<div class="content">
								<div class="row">
									<div class="col-xs-3">
										<div class="icon-big icon-danger text-center">
											<i class="ti ti-wheelchair"></i>
										</div>
									</div>
									<div class="col-xs-9">
										<div class="numbers">
											<p>Patients</p>
											
											<?php 
          
                  $query = "SELECT COUNT(*) AS 'count'  FROM patient";
                  $result = $conn->query($query);
                  if(!$result) die($conn->error);

                  $rows = $result->num_rows;

                  for ($i=0; $i < $rows ; $i++) {
                    # code...
                    $result->data_seek($i);
                    echo  $result->fetch_assoc()['count'] . "<br>";

                  }
                  
				
          
          ?>
										</div>
									</div>
								</div>
								<div class="footer">
									<hr />
									<div class="stats">
										<i class="ti ti-wheelchair"></i> Patients
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-sm-6">
						<div class="card">
							<div class="content">
								<div class="row">
									<div class="col-xs-3">
										<div class="icon-big icon-info text-center">
											<i class="ti-share"></i>
										</div>
									</div>
									<div class="col-xs-9">
										<div class="numbers">
											<p>Blood Donors</p>
											<?php 
          
                  $query = "SELECT COUNT(*) AS 'count'  FROM blood_donor";
                  $result = $conn->query($query);
                  if(!$result) die($conn->error);

                  $rows = $result->num_rows;

                  for ($i=0; $i < $rows ; $i++) {
                    # code...
                    $result->data_seek($i);
                    echo  $result->fetch_assoc()['count'] . "<br>";

                  }
                  
				
          
          ?>
										</div>
									</div>
								</div>
								<div class="footer">
									<hr />
									<div class="stats">
										<i class="ti-share"></i> Blood Donors
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>







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

<script type="text/javascript">
$(document).ready(function(){

	demo.initChartist();

	$.notify({
		icon: 'ti-bell',
		message: "Welcome to <b>KARMA</b> - Hospital Management System."

	},{
		type: 'success',
		timer: 1000
	});

});
</script>

</html>
