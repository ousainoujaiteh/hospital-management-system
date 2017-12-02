<?php

class crud
{
	private $db;

	function __construct($DB_con)
	{
		$this->db = $DB_con;
	}

	public function create($patient_id,$staff_id,$symptoms,$charge,$date_time)
	{
		try
		{
			$stmt = $this->db->prepare("INSERT INTO lab  (patient_id,staff_id,symptoms,charge,date_time) VALUES(:patient_id,:staff_id,:symptoms,:charge,:date_time)");
			$stmt->bindparam(":patient_id",$patient_id);
			$stmt->bindparam(":doctor_id",$staff_id);
			$stmt->bindparam(":symptoms",$symptoms);
			$stmt->bindparam(":charge",$charge);
			$stmt->bindparam(":date_time",$date_time);
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
		$stmt = $this->db->prepare("SELECT * FROM lab WHERE id=:id");
		$stmt->execute(array(":id"=>$id));
		$editRow=$stmt->fetch(PDO::FETCH_ASSOC);
		return $editRow;
	}

	public function update($id,$patient_id,$doctor_id,$symptoms,$charge,$date_time)
	{
		try
		{
			$stmt=$this->db->prepare("UPDATE lab SET patient_id=:patient_id,
		                                               staff_id=:staff_id,
													   symptoms=:symptoms,
													   charge=:charge,
														 date_time=:date_time

													WHERE id=:id ");
													$stmt->bindparam(":patient_id",$patient_id);
													$stmt->bindparam(":staff_id",$staff_id);
													$stmt->bindparam(":symptoms",$symptoms);
													$stmt->bindparam(":charge",$charge);
													$stmt->bindparam(":date_time",$date_time);
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
		$stmt = $this->db->prepare("DELETE FROM lab WHERE id=:id");
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
                <td><?php print($row['patient_id']); ?></td>
                <td><?php print($row['staff_id']); ?></td>
                <td><?php print($row['symptoms']); ?></td>
                <td><?php print($row['charge']); ?></td>
							  <td><?php print($row['date_time']); ?></td>

               <td align="center">
                <a href="edit-data.php?edit_id=<?php print($row['id']); ?>"><i class="ti ti-settings"></i></a>
                </td>
                <td align="center">
                <a href="delete.php?delete_id=<?php print($row['id']); ?>"><i class="ti ti-trash"></i></a>
                </td>
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

}
