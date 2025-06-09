<!DOCTYPE html>
<html>

<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="nav2.css">
<link rel="stylesheet" type="text/css" href="form3.css">
<link rel="stylesheet" type="text/css" href="table2.css">
<title>
New Sales
</title>
</head>

<body>

	<?php include 'sidebar.php'; ?>
	
	<center>
	<div class="head">
	<h2> SALES INVOICE</h2>
	</div>
	</center>

	<table align='right' id='table1'>
		<tr>
			<th>Medicine ID</th>
			<th>Medicine Name</th>
			<th>Quantity</th>
			<th>Price</th>
			<th>Total Price</th>
			<th>Action</th>
		</tr>
	
	<?php
	
	include "config.php";
			
		if(isset($_GET['sid'])) {
		$sid=$_GET['sid'];
		}
		
		if(isset($_GET['taxa'])) {
			$tax=$_GET['taxa'];
			}
		else
		{
			echo "Error no tax: " . mysqli_error($conn);
		}

		if(isset($_GET['discounta'])) {
			$disc=$_GET['discounta'];
				}
				else
				{
					echo "Error no discount: " . mysqli_error($conn);
				}
		// if(empty($sid))
		// {
		// 	$sql ="SHOW TABLE STATUS LIKE 'sales'";

		// 	if(!$result = $conn->query($sql)){
		// 	die('There was an error running the query [' . $conn->error . ']');
		// 	}
		// 	$row = $result->fetch_assoc();
		// 	$sid=$row['Auto_increment']-1;
		// }
	
		if(!empty($sid)) {
		$qry1 = "SELECT med_id,sale_qty,tot_price FROM sales_items where sale_id=$sid";
		$result1 = $conn->query($qry1);
		$sum=0;

			if ($result1->num_rows > 0) {
	
			while($row1 = $result1->fetch_assoc()) {
		
			$medid=$row1["med_id"];
			$qry2 = "SELECT med_name,med_price FROM meds where med_id=$medid";
			$result2 = $conn->query($qry2);
			$row2=$result2->fetch_row();
			
			echo "<tr>";
				echo "<td>" . $row1["med_id"]. "</td>";
				echo "<td>" . $row2[0] . "</td>";
				echo "<td>" . $row1["sale_qty"]. "</td>";
				echo "<td>" . $row2[1] . "</td>";
				echo "<td>" . $row1["tot_price"]. "</td>";
				echo "<td align=center>";
				echo "<a name='delete' class='button1 del-btn' href=pos-delete.php?mid=".$row1['med_id']."&slid=".$sid.">Delete</a>";
				echo "</td>";
			echo "</tr>";
			}
			
	echo "</table>";
			}}
	?>
		
		<div class="one" style="background-color:white;">
		<form method=post>
		<a name='pos1' class='button1 view-btn' href=pos1.php?sid=".$sid.">Go Back to Sales Page</a> 
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		
		<input type='submit' name='custadd' value='Complete Order'><br>
		</form>
		</div>
		
	<?php
		
		if (isset($_POST['custadd'])) {
			// Calculate the total amount
			$qryTotal = "SELECT SUM(tot_price) AS total FROM sales_items WHERE sale_id = $sid";
			$resultTotal = mysqli_query($conn, $qryTotal) or die(mysqli_error($conn));
			
			if ($rowTotal = mysqli_fetch_assoc($resultTotal)) {
				$tot = $rowTotal['total'];
				$qryDisc=$tot-$tot*($disc/100);
				$qryTax=$qryDisc*($tax/100)+$qryDisc;
				
				// Update the sales record with the total amount, date, and time
				$updateSales = "UPDATE sales 
								SET s_date = SYSDATE(), 
									s_time = CURRENT_TIMESTAMP(), 
									total_amt = $qryTax
								WHERE sale_id = $sid";
				
				if (mysqli_query($conn, $updateSales)) {
					// Successfully updated the sales record
						echo "<table align='right' id='table1'>
						<tr style='background-color: #f2f2f2;'>
							<td>Total</td>
							<td>" . $tot . "</td>
						</tr>
						<tr>
							<td>Discount</td>
							<td>" ."-" . $disc . "%". "</td>
						</tr>
						<tr>
							<td>Total After Discount</td>
							<td>" . $qryDisc . "</td>
						</tr>
						<tr>
							<td>Tax</td>
							<td>" . "+" . $tax . "%" . "</td>
						</tr>
						<tr>
							<td>Total After Tax</td>
							<td>" . $qryTax . "</td>
						</tr>
					</table>";
					echo "<p style='color: green; font-weight: bold;text-align: center;margin-left : 280px; font-size: 25px;'>Order Completed Successfully!</p>";
				} 
				else {
					// Handle error in updating sales record
					echo "<p style='color: red; font-weight: bold;text-align: center;'>Error updating sales record: " . mysqli_error($conn). "</p>";
				}
			} else {
				// Handle error in calculating total
				echo "<p style='color: red; font-weight: bold;text-align: center;'>Error calculating total: " . mysqli_error($conn) . "</p>";
			}
		}
					
	?>
	
	
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