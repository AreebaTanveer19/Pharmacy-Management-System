<!DOCTYPE html>
<html>

<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="nav2.css">
<link rel="stylesheet" type="text/css" href="table1.css">
<link rel="stylesheet" type="text/css" href="form3.css">
<title>
Reports
</title>
<style>
body {font-family:Arial;}
</style>
</head>

<body>

	<?php include 'sidebar.php'; ?>
	
	<center>
	<div class="head">
	<h2> TRANSACTION REPORTS</h2>
	</div>
	
	<br><br><br><br><br><br><br><br><br>
	<div style = "margin-left : 200px;">
		<form action="<?=$_SERVER['PHP_SELF']?>" method="post">
			<p>
				<label for="start">Start Date:</label>
				<input type="date" name="start">
			</p>
			<p>
				<label for="end">End Date:</label>
				<input type="date" name="end">
			</p>
			
			<input type="submit" name="submit" value="View Records">
		</form>	
	</div>
	
	<?php

	include "config.php";
	
	$start = null;
	$end = null;
	$pamt = 0.00;
	$samt = 0.00;
	$profits = 0.00;

	if (isset($_POST['submit'])) {
		$start = $_POST['start'];
		$end = $_POST['end'];

		if ($start > $end) {
			echo "<p style='color: red; font-weight: bold;text-align: center;margin-left : 220px; font-size: 25px;'>INVALID DATES!</p>";
		} else {

		// Calculate Total Purchase Amount
		$res = mysqli_query($conn, "SELECT SUM(P_COST) AS PAMT FROM PURCHASE WHERE PUR_DATE >= '$start' AND PUR_DATE <= '$end'") or die(mysqli_error($conn));
		$row = mysqli_fetch_assoc($res);
		$pamt = $row['PAMT'] ? $row['PAMT'] : 0.00; // Default to 0 if NULL

		// Calculate Total Sales Amount
		$res = mysqli_query($conn, "SELECT SUM(TOTAL_AMT) AS SAMT FROM SALES WHERE S_DATE >= '$start' AND S_DATE <= '$end'") or die(mysqli_error($conn));
		$row = mysqli_fetch_assoc($res);
		$samt = $row['SAMT'] ? $row['SAMT'] : 0.00; // Default to 0 if NULL

		// Calculate Profit
		$profit = $samt - $pamt;
		$profits = number_format($profit, 2);
	}
}
	?>
			
		<table align="right" id="table1" style="margin-right:100px;">
			<tr>
				<th>Purchase ID</th>
				<th>Supplier ID</th>
				<th>Medicine ID</th>
				
				<th>Quantity</th>
				<th>Date of Purchase</th>
				<th>Cost of Purchase(in Rs)</th>
			</tr>
	<?php

	if ($start > $end) {
	// echo "<p style='color: red; font-weight: bold;text-align: center;margin-left : 280px; font-size: 25px;'>INVALID DATES!</p>";
	} else {
	$sql = "SELECT p_id,sup_id,med_id,p_qty,p_cost,pur_date FROM purchase 
			WHERE pur_date >= '$start' AND pur_date <= '$end'
			order by p_qty desc;";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
	
		while($row = $result->fetch_assoc()) {
			
		echo "<tr>";
			echo "<td>" . $row["p_id"]. "</td>";
			echo "<td>" . $row["sup_id"]. "</td>";
			echo "<td>" . $row["med_id"]. "</td>";
			echo "<td>" . $row["p_qty"]. "</td>";
			echo "<td>" . $row["pur_date"]. "</td>";
			echo "<td>" . $row["p_cost"]. "</td>";
			
		echo "</tr>";
		}
	}
	
	echo "<tr>";
	echo "<td colspan=5>Total</td>";
	echo"<td >Rs.".$pamt."</td>";
	echo "</tr>";
	echo "</table>";
	echo "</table>";
}
	?>	
	
	<table align="right" id="table1" style="margin-right:100px;">
		<tr>
			<th>Sale ID</th>
			<th>Customer ID</th>
			<th>Employee ID</th>
			<th>Date</th>
			<th>Sale Amount(in Rs)</th>
		</tr>
	
	<?php
	include "config.php";
	if ($start > $end) {
		// echo "<p style='color: red; font-weight: bold;text-align: center;margin-left : 280px; font-size: 25px;'>INVALID DATES!</p>";
	} else {
	$sql = "SELECT sale_id, c_id,s_date,s_time,total_amt,e_id FROM sales
			WHERE s_date >= '$start' AND s_date <= '$end';";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
	
		while($row = $result->fetch_assoc()) {
			
			
		echo "<tr>";
		echo "<td><a href='receipt.php?sale_id=" . $row["sale_id"] . "'>" . $row["sale_id"] . "</a></td>";
			echo "<td>" . $row["c_id"] . "</td>";
			echo "<td>" . $row["e_id"]. "</td>";
			echo "<td>" . $row["s_date"]."</td>";
			echo "<td>" . $row["total_amt"]. "</td>";
			
		echo "</tr>";
		}
	echo "<tr>";
	echo "<td colspan=4>Total</td>";
	echo"<td >Rs.".$samt."</td>";
	echo "</tr>";
	echo "</table>";
	}
}
	?>
	
	<table align="right" id="table1" style="margin-bottom:100px;margin-right:100px;">
	<tr style="background-color: #f2f2f2;" >
		<td>Transaction Amount </td>
				<td>Rs.<?php echo $profits; ?></td>
	</tr>
	</table>
					
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
