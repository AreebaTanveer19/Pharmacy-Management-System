<!DOCTYPE html>
<html>

<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="nav2.css">
<link rel="stylesheet" type="text/css" href="table1.css">
<link rel="stylesheet" type="text/css" href="med.css">
<link rel="stylesheet" type="text/css" href="input.css">
<title>
Sales Invoice
</title>
</head>

<body>

	<?php include 'sidebar.php'; ?>
	
	<center>
	<div class="head">
	<h2> SALES INVOICE DETAILS</h2>
	</div>
	</center>
	
	<div class="heading">SALES INVOICE DETAILS</div>
    <div class="form-container" style="width: 1000px; margin-left: 362px;">
        <form method="POST">
            <div style="display: flex; justify-content: space-between;gap:10px;">
                <input type="number" name="search1" placeholder="Enter Sales ID" />
                <input type="number" name="search2" placeholder="Enter Customer ID" />
                <input type="number" name="search3" placeholder="Enter Employee ID" />
            </div>
            <button type="submit">Search</button>
            <button type="submit" name="view_all" class="secondary-btn">View All Sales</button>
        </form>
    </div>

	<table align="right" id="table1" style="margin-right:100px;">
		<tr>
			<th>Sale ID</th>
			<th>Customer ID</th>
			<th>Date and Time </th>
			<th>Sale Amount</th>
			<th>Employee ID</th>
		</tr>
		
	<?php

	$searchQuerySalesId = ''; 
	$searchQueryCusId = ''; 
	$searchQueryEmpId = '';

	if (isset($_POST['search1']) && !empty($_POST['search1'])) {
		$searchQuerySalesId = $_POST['search1'];
	}
	if (isset($_POST['search2']) && !empty($_POST['search2'])) {
		$searchQueryCusId = $_POST['search2'];
	}
	if (isset($_POST['search3']) && !empty($_POST['search3'])) {
		$searchQueryEmpId = $_POST['search3'];
	}

	if (isset($_POST['view_all'])) {
		$searchQuerySalesId = ''; 
		$searchQueryCusId = ''; 
		$searchQueryEmpId = '';
	}

	include "config.php";
	
		$sql = "SELECT sale_id, c_id,s_date,s_time,total_amt,e_id FROM sales
		where
		('$searchQuerySalesId' = '' OR 
        sale_id = '$searchQuerySalesId') AND
		('$searchQueryCusId' = '' OR 
        c_id = '$searchQueryCusId') AND
		('$searchQueryEmpId' = '' OR 
        e_id = '$searchQueryEmpId')";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
		
		while($row = $result->fetch_assoc()) {
			
			
		echo "<tr>";
		echo "<td><a href='receipt.php?sale_id=" . $row["sale_id"] . "'>" . $row["sale_id"] . "</a></td>";
			echo "<td>" . $row["c_id"] . "</td>";
			echo "<td>" . $row["s_date"]."&nbsp;&nbsp;".$row["s_time"]."</td>";
			echo "<td>" . $row["total_amt"]. "</td>";
			echo "<td>" . $row["e_id"]. "</td>";
		echo "</tr>";
		}
	echo "</table>";
	} 
	$conn->close();
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
