<?php

class crud
{
	private $db;

	function __construct($DB_con)
	{
		$this->db = $DB_con;
	}

	public function create($invoice_number,$title,$patient,$due_date,$amount,$status)
	{
		try
		{
			$stmt = $this->db->prepare("INSERT INTO invoice (invoice_number,title,patient,due_date,amount,status) VALUES(:invoice_number,:title,:patient,:due_date,:amount,:status)");
		
			$stmt->bindparam(":invoice_number",$invoice_number);
			$stmt->bindparam(":title",$title);
			$stmt->bindparam(":patient",$patient);
			$stmt->bindparam(":due_date",$due_date);
			$stmt->bindparam(":amount",$amount);
			$stmt->bindparam(":status",$status);
		

			$stmt->execute();
			return true;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
			return false;
		}

	}

	public function getID($id)
	{
		$stmt = $this->db->prepare("SELECT * FROM invoice WHERE id=:id");
		$stmt->execute(array(":id"=>$id));
		$editRow=$stmt->fetch(PDO::FETCH_ASSOC);
		return $editRow;
	}

	public function update($id,$invoice_number,$title,$patient,$due_date,$amount,$status)
	{
		try
		{
			$stmt=$this->db->prepare("UPDATE invoice SET   invoice_number=:invoice_number,
													   title=:title,
													   patient=:patient,
													   due_date=:due_date,
													amount=:amount,
													status=:status,
													
													WHERE id=:id ");

			$stmt->bindparam(":invoice_number",$invoice_number);
			$stmt->bindparam(":title",$title);
			$stmt->bindparam(":patient",$patient);
			$stmt->bindparam(":due_date",$due_date);
			$stmt->bindparam(":amount",$amount);
			$stmt->bindparam(":status",$status);

			$stmt->bindparam(":id",$id);
			$stmt->execute();

			return true;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
			return false;
		}
	}

	public function delete($id)
	{
		$stmt = $this->db->prepare("DELETE FROM invoice WHERE id=:id");
		$stmt->bindparam(":id",$id);
		$stmt->execute();
		return true;
	}


	/* paging */

	public function dataview($query)
	{
		$stmt = $this->db->prepare($query);
		$stmt->execute();

		if($stmt->rowCount()>0)
		{
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				?>
                <tr>
                <td><?php print($row['id']); ?></td>
                <td><?php print($row['invoice_number']); ?></td>
                <td><?php print($row['title']); ?></td>
                <td><?php print($row['patient']); ?></td>
				<td><?php print($row['current_date']); ?></td>
				<td><?php print($row['due_date']); ?></td>							
                <td><?php print($row['amount']); ?></td>
                <td><?php print($row['status']); ?></td>
				


                <td align="center">
               <td align="center">
                <a href="edit-data.php?edit_id=<?php print($row['id']); ?>"><i class="ti ti-settings"></i></a>
                </td>
                <td align="center">
                <a href="delete.php?delete_id=<?php print($row['id']); ?>"><i class="ti ti-trash"></i></a>
                </td>
				<td><a href="../invoice/invoice.php"><i class="ti ti-shine"></i> ViewInvoice</a></td>
                </tr>
                <?php
			}
		}
		else
		{
			?>
            <tr>
            <td>Nothing here...</td>
            </tr>
            <?php
		}

	}

	public function paging($query,$records_per_page)
	{
		$starting_position=0;
		if(isset($_GET["page_no"]))
		{
			$starting_position=($_GET["page_no"]-1)*$records_per_page;
		}
		$query2=$query." limit $starting_position,$records_per_page";
		return $query2;
	}

	public function paginglink($query,$records_per_page)
	{

		$self = $_SERVER['PHP_SELF'];

		$stmt = $this->db->prepare($query);
		$stmt->execute();

		$total_no_of_records = $stmt->rowCount();

		if($total_no_of_records > 0)
		{
			?><ul class="pagination"><?php
			$total_no_of_pages=ceil($total_no_of_records/$records_per_page);
			$current_page=1;
			if(isset($_GET["page_no"]))
			{
				$current_page=$_GET["page_no"];
			}
			if($current_page!=1)
			{
				$previous =$current_page-1;
				echo "<li><a href='".$self."?page_no=1'>First</a></li>";
				echo "<li><a href='".$self."?page_no=".$previous."'>Previous</a></li>";
			}
			for($i=1;$i<=$total_no_of_pages;$i++)
			{
				if($i==$current_page)
				{
					echo "<li><a href='".$self."?page_no=".$i."' style='color:red;'>".$i."</a></li>";
				}
				else
				{
					echo "<li><a href='".$self."?page_no=".$i."'>".$i."</a></li>";
				}
			}
			if($current_page!=$total_no_of_pages)
			{
				$next=$current_page+1;
				echo "<li><a href='".$self."?page_no=".$next."'>Next</a></li>";
				echo "<li><a href='".$self."?page_no=".$total_no_of_pages."'>Last</a></li>";
			}
			?></ul><?php
		}
	}

	/* paging */



	/* invoice */

	public function print_invoice()
	{
	 ?>

	<div class="content-wrapper">
    <!-- Content Header (Page header) -->
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
          To
          <address>
            <strong><?php "SELECT patient from invoice" ?></strong><br>
            Brikama<br>
            Phone: 4848342<br>
            Email: patient.doe@example.com
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          <b>Invoice<?php "SELECT invoice_number FROM invoice"?></b><br>
          <br>
          <b>Payment Due:</b><?php "SELECT due_date FROM invoice"?><br>
        
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
              <th>Qty</th>
              <th>Product</th>
              <th>Serial #</th>
              <th>Description</th>
              <th>Subtotal</th>
            </tr>
            </thead>
            <tbody>
            <tr>
              <td>1</td>
              <td>Call of Duty</td>
              <td>455-981-221</td>
              <td>El snort testosterone trophy driving gloves handsome</td>
              <td>$64.50</td>
            </tr>
            <tr>
              <td>1</td>
              <td>Need for Speed IV</td>
              <td>247-925-726</td>
              <td>Wes Anderson umami biodiesel</td>
              <td>$50.00</td>
            </tr>
            <tr>
              <td>1</td>
              <td>Monsters DVD</td>
              <td>735-845-642</td>
              <td>Terry Richardson helvetica tousled street art master</td>
              <td>$10.70</td>
            </tr>
            <tr>
              <td>1</td>
              <td>Grown Ups Blue Ray</td>
              <td>422-568-642</td>
              <td>Tousled lomo letterpress</td>
              <td>$25.99</td>
            </tr>
            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <!-- /.col -->
        <div class="col-xs-6">
          <p class="lead">Amount Due 2/22/2014</p>

          <div class="table-responsive">
            <table class="table">
             
              <tr>
                <th>Total:</th>
                <td><?php "SELECT amount FROM invoice" ?></td>
              </tr>
            </table>
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">
          <a href="print.php" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
          <button type="button" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment
          </button>
          <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
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

	}

}
