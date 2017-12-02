
<?php 
$host = "localhost";
$database = "hospital";
$username= "root";
$password = "Essau!89";

$conn = new mysqli($host ,$username,$password,$database);
if($conn->connect_error) die($conn->connect_error);


?>




<body onload="window.print();">
    <section class="content-header">
      <h1>
        Invoice
        <small>#007612</small>
    </section>


    <!-- Main content -->
    <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-globe"></i> Hospital Management System
            <small class="pull-right">Date: 2/10/2014</small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
          From
          <address>
            <strong>Hospital Management System</strong><br>
            Banjul<br>
            Phone: 3788015<br>
            Email: hospitalmanagemnt@gmail.com
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          To <strong><?php 
            
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
            Address: <strong>Brikama</strong><br>
            Phone: 4848342<br>
            Email: patient.doe@example.com
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          <b>Invoice Number :<?php 
          
          
            $query = "SELECT invoice_number FROM invoice";
                  $result = $conn->query($query);
                  if(!$result) die($conn->error);

                  $rows = $result->num_rows;

                  for ($i=0; $i < $rows ; $i++) {
                    # code...
                    $result->data_seek($i);
                    echo  $result->fetch_assoc()['invoice_number'] . "<br>";

                  }
          
          ?></b><br>
          <br>
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
        <div class="col-xs-12 table-responsive">
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
            </table>
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
  <!-- /.content-wrapper -->