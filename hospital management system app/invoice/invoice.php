

<?php
$host = "localhost";
$database = "hospital";
$username= "root";
$password = "Essau!89";

$conn = new mysqli($host ,$username,$password,$database);
if($conn->connect_error) die($conn->connect_error);


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
				<a class="navbar-brand" href="#">Invoice</a>
			</div>
		</div>
	</nav>

	<div class="content-wrapper">
    <section class="content-header">
      <h4>
        Invoice :
        <small>#<?php

            $query = "SELECT invoice_number FROM invoice";
                  $result = $conn->query($query);
                  if(!$result) die($conn->error);

                  $rows = $result->num_rows;

                  for ($i=0; $i < $rows ; $i++) {
                    # code...
                    $result->data_seek($i);
                    echo  $result->fetch_assoc()['invoice_number'] . "<br>";

                  }

          ?></small>
          </h4>
    </section>

    <!-- Main content -->
    <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-10">
          <h4 class="page-header">
            <i class="fa fa-globe"></i> Hospital Management System
            <small class="pull-right">Date: 2/10/2014</small>
          </h4>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
            From   :  <strong>Hospital Management System</strong><br>
            Address :Banjul<br>
            Phone: 3788015<br>
            Email: hospitalmanagemnt@gmail.com
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          To : <strong><?php

            $query = "SELECT patient FROM invoice";
            $result = $conn->query($query);
            if(!$result) die($conn->error);

            $rows = $result->num_rows;

            for ($i=0; $i < $rows ; $i++) {
              # code...
              $result->data_seek($i);
              echo  $result->fetch_assoc()['patient'] . "<br>";

            }

             ?></strong>
            Address: Brikama
            Phone: 4848342<br>
            Email: patient.doe@example.com
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          <b>Payment Due:</b><?php

            $query = "SELECT current_date FROM invoice";
                  $result = $conn->query($query);
                  if(!$result) die($conn->error);

                  $rows = $result->num_rows;

                  for ($i=0; $i < $rows ; $i++) {
                    # code...
                    $result->data_seek($i);
                    echo  $result->fetch_assoc()['current_date'] . "<br>";
                  }


          ?><br>

        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Table row -->
      <div class="row">
        <div class="col-xs-10 table-responsive">
          <table class="table table-striped">
            <thead>
            <tr>
              <th>Invoice</th>
              <th>Being Paid For</th>
              <th>Patient</th>
              <th>Description</th>
              <th>Amount</th>
            </tr>
            </thead>
            <tbody>
            <tr>
              <td>

							<?php

            $query = "SELECT invoice_number FROM invoice";
                  $result = $conn->query($query);
                  if(!$result) die($conn->error);

                  $rows = $result->num_rows;

                  for ($i=0; $i < $rows ; $i++) {
                    # code...
                    $result->data_seek($i);
                    echo  $result->fetch_assoc()['invoice_number'] . "<br>";

                  }

          ?>

							</td>
              <td>

							<?php

            $query = "SELECT title FROM invoice";
                  $result = $conn->query($query);
                  if(!$result) die($conn->error);

                  $rows = $result->num_rows;

                  for ($i=0; $i < $rows ; $i++) {
                    # code...
                    $result->data_seek($i);
                    echo  $result->fetch_assoc()['title'] . "<br>";

                  }

          ?>

							</td>
              <td>
							<?php

            $query = "SELECT patient FROM invoice";
                  $result = $conn->query($query);
                  if(!$result) die($conn->error);

                  $rows = $result->num_rows;

                  for ($i=0; $i < $rows ; $i++) {
                    # code...
                    $result->data_seek($i);
                    echo  $result->fetch_assoc()['patient'] . "<br>";

                  }

          ?>

							</td>
              <td>The invoice bill from hospital management system</td>
              <td>


							<?php

            $query = "SELECT amount FROM invoice";
                  $result = $conn->query($query);
                  if(!$result) die($conn->error);

                  $rows = $result->num_rows;

                  for ($i=0; $i < $rows ; $i++) {
                    # code...
                    $result->data_seek($i);
                    echo  $result->fetch_assoc()['amount'] . "<br>";

                  }

          ?></td>
            </tr>
            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <!-- /.col -->
        <div class="col-xs-4">
          <p class="lead">Amount Due 2/22/2014</p>

          <div class="table-responsive">
            <table class="table">

              <tr>
                <th>Total:</th>
                <td><?php
                  $query = "SELECT amount FROM invoice";
                  $result = $conn->query($query);
                  if(!$result) die($conn->error);

                  $rows = $result->num_rows;

                  for ($i=0; $i < $rows ; $i++) {
                    # code...
                    $result->data_seek($i);
                    echo $result->fetch_assoc()['amount'] . "<br>";

                  }
                ?></td>
              </tr>
            </table>
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-8">
          <a href="print.php" target="_blank" class="btn btn-default center"  style="margin-left: 40%;"><i class="fa fa-print"></i> Print</a>
          <button type="button" class="btn btn-primary center" style="margin-right: 10px;">
            <i class="fa fa-download"></i> Generate PDF
          </button>
        </div>
      </div>
    </section>
    <!-- /.content -->
    <div class="clearfix"></div>
  </div>
  <!-- /.content-wrapper -->


<?php
