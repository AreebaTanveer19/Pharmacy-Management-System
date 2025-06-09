<!DOCTYPE html>
<html>

<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="nav2.css">
<link rel="stylesheet" type="text/css" href="form3.css">
<link rel="stylesheet" type="text/css" href="table2.css">
<link rel="stylesheet" type="text/css" href="input.css">
<title>
New Sales
</title>
</head>

<body>

	<?php include 'sidebar.php'; ?>
	
	<center>
	<div class="head">
	<h2> POINT OF SALE</h2>
	</div>
	</center>
	

	<center>
    <form method="post" style="margin-left: 15%; margin-top: 90px;">
        <label for="tax">Set Tax (%):</label>
        <input type="number" name="tax" step="0.01" min="0" style="width: 100px;">
        <input type="submit" name="set_tax" value="Set Tax" style="width: 100px;">
        &nbsp;&nbsp;
        <label for="discount">Set Discount (%):</label>
        <input type="number" name="discount" step="0.01" min="0" style="width: 110px;">
        <input type="submit" name="set_discount" value="Set Discount" style="width: 120px;">
        &nbsp;&nbsp;
        <input type="submit" name="remove_tax_discount" value="Remove Tax and Discount" style="width: 200px;">
    </form>
</center>


<?php
			include "config.php"; // Ensure this file contains the database connection

			if (isset($_POST['set_tax'])) {
				$taxa = $_POST['tax'];
				$qryy = "ALTER TABLE sales MODIFY COLUMN tax DECIMAL(5,2) DEFAULT $taxa;";
				if ($conn->query($qryy) == TRUE) {
					echo "<p style='color: green; text-align: center;'>Tax set to $taxa% successfully.</p>";
				} else {
					echo "<p style='color: red; text-align: center;'>Error setting tax: " . $conn->error . "</p>";
				}
			}

			if (isset($_POST['set_discount'])) {
				$discounta = $_POST['discount'];
				$qryy = "ALTER TABLE sales MODIFY COLUMN discount DECIMAL(5,2) DEFAULT $discounta;";
				if ($conn->query($qryy) == TRUE) {
					echo "<p style='color: green; text-align: center;'>Discount set to $discounta% successfully.</p>";
				} else {
					echo "<p style='color: red; text-align: center;'>Error setting discount: " . $conn->error . "</p>";
				}
			}

			// Optional: Handle the removal of tax and discount
			if (isset($_POST['remove_tax_discount'])) {
				$qryy = "ALTER TABLE sales MODIFY COLUMN tax DECIMAL(5,2) DEFAULT 16.0;"; // or whatever default you want
				$conn->query($qryy);
				$qryy = "ALTER TABLE sales MODIFY COLUMN discount DECIMAL(5,2) DEFAULT 0.00;"; // or whatever default you want
				$conn->query($qryy);
				echo "<p style='color: green; text-align: center;'>Tax and discount removed successfully.</p>";
			}
	?>


	<form action="<?=$_SERVER['PHP_SELF']?>" method="post">
		<center>
		
		<select id="cid" name="cid">
        <option value="0" selected="selected">*Select Customer ID (only once for a customer's sales)</option>
					
					
	<?php	
			
		include "config.php";
		$qry="SELECT c_id FROM customer order by c_id desc";
		$result= $conn->query($qry);
		echo mysqli_error($conn);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				echo "<option>".$row["c_id"]."</option>";
			}
		}
	?>
		
    </select>
	&nbsp;&nbsp;
	<input type="submit" name="custadd" value="Add to Proceed.">
	</form>
	
		
	<?php
	
		session_start();
		
		$qry1="SELECT id from admin where a_username='$_SESSION[user]'";
		$result1=$conn->query($qry1);
		$row1=$result1->fetch_row();
		$eid=$row1[0];
		
			if(isset($_GET['sid'])) 
			{
				$sid=$_GET['sid'];
			}
			
			if(isset($_POST['cid']))
				$cid=$_POST['cid'];
			
		if(isset($_POST['custadd'])) {
			
				$qry2="INSERT INTO sales(c_id,e_id) VALUES ('$cid','$eid')"; 
				if(!($result2=$conn->query($qry2))) {
					echo "<p style='font-size:8; color:red;'>Invalid! Enter valid Customer ID to record Sales.</p>";
				}
		}
	?>
			
		<form method="post">
			<select id="med" name="med">
			<option value="0" selected="selected">Select Medicine</option>
					
					
	<?php	
		$qry3="SELECT med_name FROM meds";
		$result3 = $conn->query($qry3);
		echo mysqli_error($conn);
		if ($result3->num_rows > 0) {
			while($row4 = $result3->fetch_assoc()) {
				
				echo "<option>".$row4["med_name"]."</option>";
			}
		}
	?>
		
    </select>
	&nbsp;&nbsp;
	<input type="submit" name="search" value="Search">
	</form>
	
	<br><br><br>
	</center>
	

	<?php
	
		if(isset($_POST['search'])&&! empty($_POST['med'])) {
			
					$med=$_POST['med'];
					$qry4="SELECT * FROM meds where med_name='$med'";
					$result4=$conn->query($qry4); 
					$row4 = $result4 -> fetch_row();
				
			}
	?>
	
			<div class="one row" style="margin-right:160px;">
			<form method="post">
					<div class="column">
					
					<label for="medid">Medicine ID:</label>
					<input type="number" name="medid" value="<?php echo $row4[0]; ?>"readonly ><br><br>
					
					<label for="mdname">Medicine Name:</label>
					<input type="text" name="mdname" value="<?php echo $row4[1]; ?>" readonly><br><br>
					
					</div>
					<div class="column">
					
					<label for="mcat">Category:</label>
					<input type="text" name="mcat" value="<?php echo $row4[4]; ?>" readonly><br><br>
					
					<label for="mloc">Location:</label>
					<input type="text" name="mloc" value="<?php echo $row4[6]; ?>" readonly><br><br>
					
					</div>
					<div class="column">
					
					<label for="mqty">Quantity Available:</label>
					<input type="number" name="mqty" value="<?php echo $row4[3]; ?>" readonly><br><br>
					
					<label for="mprice">Price of One Unit:</label>
					<input type="number" name="mprice" value="<?php echo $row4[5]; ?>" readonly><br><br>
					
					</div>
					<label for="mcqty">Quantity Required:</label>
					<input type="number" name="mcqty">
					&nbsp;&nbsp;&nbsp;
					<input type="submit" name="add" value="Add Medicine">&nbsp;&nbsp;&nbsp;
	
		<?php
		
		if(isset($_POST['add'])) {
			
					$qry5="select sale_id,tax,discount from sales ORDER BY sale_id DESC LIMIT 1";
					$result5=$conn->query($qry5); 
					$row5=$result5->fetch_row();
					$sid=$row5[0];
					$taxa=$row5[1];
					$discounta=$row5[2];
					echo mysqli_error($conn);
			
					$mid=$_POST['medid'];
					$aqty=$_POST['mqty'];
					$qty=$_POST['mcqty'];
					
					if($qty>$aqty||$qty==0)
					{echo "QUANTITY INVALID!";}
					else {
					$price=$_POST['mprice']*$qty;
					$qry6="INSERT INTO sales_items(`sale_id`,`med_id`,`sale_qty`,`tot_price`) VALUES($sid,$mid,$qty,$price)";
					$result6 = mysqli_query($conn,$qry6);
					echo mysqli_error($conn);
					
					echo "<br><br> <center>";
					echo "<a class='button1 view-btn' href='pos2.php?sid=".$sid."&discounta=".$discounta."&taxa=".$taxa."'>View Order</a>";
					echo "</center>";
					}
		}	
		?>

		
		</form>
	</div>
</body>

<script>
		var dropdown = document.getElementsByClassName("dropdown-btn");
		var i;

			for (i = 0; i < dropdown.length; i++) {
			  dropdown[i].addEventListener("click", function() {
			  this.classList.toggle("active");
			  var dropdownContent = this.nextElementSibling;
			  if (dropdownContent.style.display === "block") {
			  dropdownContent.style.display = "none";
			  } else {
			  dropdownContent.style.display = "block";
			  }
			  });
			}	
</script>

</html>