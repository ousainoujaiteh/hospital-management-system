<?php
include_once '../dbconfig.php';

if(isset($_POST['btn-del']))
{
	$id = $_GET['delete_id'];
	$crud->delete($id);
	header("Location: delete.php?deleted");
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

<div class="container" style="margin-top:50px;">

	<?php
	if(isset($_GET['deleted']))
	{
		?>
        <div class="alert alert-success">
    	<strong>Success!</strong> record was deleted...
		</div>
        <?php
	}
	else
	{
		?>
        <div class="alert alert-danger">
    	<strong>Sure !</strong> to remove the following record ?
		</div>
        <?php
	}
	?>
</div>

<div class="clearfix"></div>

<div class="container">

	 <?php
	 if(isset($_GET['delete_id']))
	 {
		 ?>
         <table class='table table-striped'>
         <tr>
					 <th></th>
					<th>Name</th>
		 			<th>Blood Group</th>
		 			<th>Sex</th>
		 			<th>Age</th>
		 			<th>Phone</th>
		 			<th>Email</th>
		 			<th>Address</th>
		 			<th>Last Donation</th>

         </tr>
         <?php
         $stmt = $DB_con->prepare("SELECT * FROM blood_donor WHERE id=:id");
         $stmt->execute(array(":id"=>$_GET['delete_id']));
         while($row=$stmt->fetch(PDO::FETCH_BOTH))
         {
             ?>
             <tr>
               <td><?php print($row['id']); ?></td>
				<td><?php print($row['name']); ?></td>
                <td><?php print($row['blood_group']); ?></td>
                <td><?php print($row['sex']); ?></td>
				<td><?php print($row['age']); ?></td>
				<td><?php print($row['phone']); ?></td>							
                <td><?php print($row['email']); ?></td>
                <td><?php print($row['address']); ?></td>
				<td><?php print($row['last_donation']); ?></td>

             </tr>
             <?php
         }
         ?>
         </table>
         <?php
	 }
	 ?>
</div>

<div class="container">
<p>
<?php
if(isset($_GET['delete_id']))
{
	?>
  	<form method="post">
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>" />
    <button class="btn btn-large btn-primary" type="submit" name="btn-del"><i class="glyphicon glyphicon-trash"></i> &nbsp; YES</button>
    <a href="index.php" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp; NO</a>
    </form>
	<?php
}
else
{
	?>
    <a href="index.php" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp; Back to index</a>
    <?php
}
?>
</p>
</div>

<?php include_once '../includes/footer.php'; ?>
