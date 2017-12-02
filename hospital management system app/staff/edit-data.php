<?php
include_once '../dbconfig.php';
if(isset($_POST['btn-update']))
{
	$id = $_GET['edit_id'];
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$dep_id = $_POST['dep_id'];
	$address = $_POST['address'];
	$email = $_POST['email'];
	$dob = $_POST['dob'];
	$phone = $_POST['phone'];
	$nationality = $_POST['nationality'];


	if($crud->update($id,$fname,$lname,$dep_id,$address,$email,$dob,$phone,$nationality))
	{
		$msg = "<div class='alert alert-info'>
				<strong>WOW!</strong> Record was updated successfully <a href='index.php'>HOME</a>!
				</div>";
	}
	else
	{
		$msg = "<div class='alert alert-warning'>
				<strong>SORRY!</strong> ERROR while updating record !
				</div>";
	}
}

if(isset($_GET['edit_id']))
{
	$id = $_GET['edit_id'];
	extract($crud->getID($id));
}

?>
<<html lang="en">
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
				<li class="active">
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
				<a class="navbar-brand" href="#">Staff</a>
			</div>
		</div>
	</nav>


<div class="clearfix"></div>

<div class="container">
<?php
if(isset($msg))
{
	echo $msg;
}
?>
</div>

<div class="clearfix"></div><br />

<div class="col-lg-8 col-md-7">
	<div class="card">
		<div class="header">
			<h4 class="title">Update Staff</h4>
		</div>
		<div class="content">
			<form method="post">

				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>First Name</label>
							<input type="text" name="fname" class="form-control border-input" placeholder="First Name" value="<?php echo $fname; ?>">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Last Name</label>
							<input type="text" name="lname"  class="form-control border-input" placeholder="Last Name" value="<?php echo $lname; ?>">
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label >Department ID</label>
							<input type="text" name="dep_id" class="form-control border-input" placeholder="department" value="<?php echo $dep_id; ?>">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label >Address</label>
							<input type="text" name="address" class="form-control border-input" placeholder="Address" value="<?php echo $address; ?>">
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="exampleInputEmail1">Email</label>
							<input type="text" name="email" class="form-control border-input" placeholder="email" value="<?php echo $email; ?>">
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group">
							<label>Date of Birth</label>
							<input type="date" name="dob" class="form-control border-input" placeholder="date of birth" value="<?php echo $date; ?>">
						</div>
				</div>

					<div class="col-md-4">
						<div class="form-group">
							<label>Phone</label>
							<input type="number" name="phone" class="form-control border-input" placeholder="phone" value="<?php echo $phone; ?>">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label>Nationality</label>
							<input type="text" name="nationality" class="form-control border-input" placeholder="Nationality" value="<?php echo $nationality; ?>">
						</div>
					</div>
				</div>

			</div>

			<div class="text-center">
				<button type="submit" class="btn btn-info btn-fill btn-wd" name="btn-update" style="margin-right:20px; margin-bottom:20px;">Update Staff</button>
				  <a href="index.php" class="btn btn-large btn-success" style="margin-bottom:20px;"><i class="glyphicon glyphicon-backward"></i> &nbsp; Cancel</a>
			</div>
			<div class="clearfix"></div>
</form>


</div>

<?php include_once '../includes/footer.php'; ?>
