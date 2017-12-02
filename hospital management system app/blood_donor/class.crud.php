<?php

class crud
{
	private $db;

	function __construct($DB_con)
	{
		$this->db = $DB_con;
	}

	public function create($name,$blood_group,$sex,$age,$phone,$email,$address,$last_donation)
	{
		try
		{
			$stmt = $this->db->prepare("INSERT INTO blood_donor (name,blood_group,sex,age,phone,email,address,last_donation) VALUES(:name,:blood_group,:sex,:age,:phone,:email,:address,:last_donation)");
		//	$stmt->bindparam(":staff_id",$staff_id);
			$stmt->bindparam(":name",$name);
			$stmt->bindparam(":blood_group",$blood_group);
			$stmt->bindparam(":sex",$sex);
			$stmt->bindparam(":age",$age);
			$stmt->bindparam(":phone",$phone);
			$stmt->bindparam(":email",$email);
			$stmt->bindparam(":address",$address);
			$stmt->bindparam(":last_donation",$last_donation);

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
		$stmt = $this->db->prepare("SELECT * FROM blood_donor WHERE id=:id");
		$stmt->execute(array(":id"=>$id));
		$editRow=$stmt->fetch(PDO::FETCH_ASSOC);
		return $editRow;
	}

	public function update($id,$name,$blood_group,$sex,$age,$phone,$email,$address,$last_donation)
	{
		try
		{
			$stmt=$this->db->prepare("UPDATE blood_donor SET   name=:name,
													   blood_group=:blood_group,
													   sex=:sex,
													   age=:age,
													phone=:phone,
													email=:email,
													address=:address,
													last_donation=:last_donation

													WHERE id=:id ");

			$stmt->bindparam(":name",$name);
			$stmt->bindparam(":blood_group",$blood_group);
			$stmt->bindparam(":sex",$sex);
			$stmt->bindparam(":age",$age);
			$stmt->bindparam(":phone",$phone);
			$stmt->bindparam(":email",$email);
			$stmt->bindparam(":address",$address);
			$stmt->bindparam(":last_donation",$last_donation);

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
		$stmt = $this->db->prepare("DELETE FROM blood_donor WHERE id=:id");
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
                <td><?php print($row['name']); ?></td>
                <td><?php print($row['blood_group']); ?></td>
                <td><?php print($row['sex']); ?></td>
				<td><?php print($row['age']); ?></td>
				<td><?php print($row['phone']); ?></td>							
                <td><?php print($row['email']); ?></td>
                <td><?php print($row['address']); ?></td>
				<td><?php print($row['last_donation']); ?></td>



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
