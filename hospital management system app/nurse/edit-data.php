<?php
include_once '../dbconfig.php';
if(isset($_POST['btn-update']))
{
	$id = $_GET['edit_id'];
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$staff_id = $_POST['staff_id'];
	$email = $_POST['email'];
	$address = $_POST['address'];
	$phone = $_POST['phone'];

	if($crud->update($id,$fname,$lname, $staff_id,$email,$address,$phone))
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
				<li class="active">
					<a href="../dashboard/">
						<i class="ti-panel"></i>
						<p>Dashboard</p>
					</a>
				</li>
				<li>
					<a href="user.html">
						<i class="ti-plus"></i>
						<p>New Recruit</p>
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
						<i class="ti ti-patient"></i>
						<p>Patient</p>
					</a>
				</li>
				<li>
					<a href="../visitors/">
						<i class="ti ti-pencil"></i>
						<p>Visitors</p>
					</a>
				</li>
				<li>
					<a href="../appointment/">
						<i class="ti-appointment"></i>
						<p>Appointment</p>
					</a>
				</li>
				<li>
					<a href="../lab/">
						<i class="fa fa-lab"></i>
						<p>Laboratory</p>
					</a>
				</li>
				<li>
					<a href="">
						<i class="fa fa-lab"></i>
						<p>Monitor Hospital</p>
					</a>
				</li>
				<li>
					<a href="../medicine/">
						<i class="fa fa-lab"></i>
						<p>Medicine</p>
					</a>
				</li>
				<li>
					<a href="../medicine_category/">
						<i class="ti ti-spray"></i>
						<p>Medicine Category</p>
					</a>
				</li>
				<li>
					<a href="../user/sign-up.php">
						<i class="ti ti-user"></i>
						<p>user</p>
					</a>
				</li>

<li class="active-pro">
	<a href="#">
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
							<li><a href="#"><b>Waka</b> just added a new empoyee</a></li>
							<li><a href="#">Notification 2</a></li>
							<li><a href="#">Notification 3</a></li>
							<li><a href="#">Notification 4</a></li>
							<li><a href="#">Another notification</a></li>
						</ul>
					</li>
					<li>
						<a href="#">
							<i class="ti-settings"></i>
							<p>Settings</p>
						</a>
					</li>
				</ul>

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

<div class="container">

     <form method='post'>

    <table class='table table-bordered'>

        <tr>
            <td>First Name</td>
            <td><input type='text' name='fname' class='form-control' value="<?php echo $fname; ?>" required></td>
        </tr>

        <tr>
            <td>Last Name</td>
            <td><input type='text' name='lname' class='form-control' value="<?php echo $lname; ?>" required></td>
        </tr>

        <tr>
            <td>Your E-mail ID</td>
            <td><input type='text' name='email' class='form-control' value="<?php echo $email; ?>" required></td>
        </tr>

        <tr>
            <td>Address</td>
            <td><input type='text' name='address' class='form-control' value="<?php echo $address; ?>" required></td>
        </tr>

				<tr>
            <td>Contact No</td>
            <td><input type='text' name='phone' class='form-control' value="<?php echo $phone; ?>" required></td>
        </tr>

        <tr>
            <td colspan="2">
                <button type="submit" class="btn btn-primary" name="btn-update">
    			<span class="glyphicon glyphicon-edit"></span>  Update this Record
				</button>
                <a href="index.php" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp; CANCEL</a>
            </td>
        </tr>

    </table>
</form>


</div>

<?php include_once '../includes/footer.php'; ?>
