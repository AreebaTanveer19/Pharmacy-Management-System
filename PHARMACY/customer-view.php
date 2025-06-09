<!DOCTYPE html>
<html>

<head>
<link rel="stylesheet" type="text/css" href="nav2.css">
<link rel="stylesheet" type="text/css" href="table1.css">
<link rel="stylesheet" type="text/css" href="med.css">
<link rel="stylesheet" type="text/css" href="input.css">

<title>
Customers
</title>
</style>
</head>

<body>

	<?php include 'sidebar.php'; ?>
	
	<center>
	<div class="head">
	<h2>  CUSTOMER LIST</h2>
	</div>
	</center>

	<div class="heading">CUSTOMERS LIST</div>
<div class="form-container" style="width: 1000px; margin-left: 362px;">
    <form method="POST">
        <div style="display: flex; justify-content: space-between; gap: 20px;">
            <input type="number" name="search1" placeholder="Enter Customer ID" class="input-style" />
            <input type="text" name="search2" placeholder="Enter Customer Name" class="input-style" />
        </div>
        <button type="submit">Search</button>
        <button type="submit" name="view_all" class="secondary-btn">View All Customers</button>
    </form>
</div>

	
	<table align="right" id="table1" style="margin-right:100px;">
		<tr>
			<th>Customer ID</th>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Age</th>
			<th>Sex</th>
			<th>Phone Number</th>
			<th>Email Address</th>
			<th>Action</th>
		</tr>
	<?php
	
	$searchQueryCusId = ''; 
    $searchQueryCusName = ''; 

	if (isset($_POST['search1']) && !empty($_POST['search1'])) {
		$searchQueryCusId = $_POST['search1'];
	}
	if (isset($_POST['search2']) && !empty($_POST['search2'])) {
		$searchQueryCusName = $_POST['search2'];
	}

	if (isset($_POST['view_all'])) {
		$searchQueryCusId = ''; 
   	 	$searchQueryCusName = ''; 
	}

	include "config.php";
	$sql = "SELECT c_id,c_fname,c_lname,c_age,c_sex,c_phno,c_mail FROM customer
	Where
	('$searchQueryCusId' = '' OR 
    c_id = '$searchQueryCusId') AND
	('$searchQueryCusName' = '' OR 
	CONCAT(c_fname,' ',c_lname) LIKE CONCAT('$searchQueryCusName','%'))";
	
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
	
		while($row = $result->fetch_assoc()) {

		echo "<tr>";
			echo "<td>" . $row["c_id"]. "</td>";
			echo "<td>" . $row["c_fname"] . "</td>";
			echo "<td>" . $row["c_lname"]. "</td>";
			echo "<td>" . $row["c_age"]. "</td>";
			echo "<td>" . $row["c_sex"] . "</td>";
			echo "<td>" . $row["c_phno"]. "</td>";
			echo "<td>" . $row["c_mail"]. "</td>";
			echo "<td align=center>";
				echo "<a class='button1 edit-btn' href=customer-update.php?id=".$row['c_id'].">Edit</a>";
				echo "<a class='button1 del-btn' href=customer-delete.php?id=".$row['c_id'].">Delete</a>";
			echo "</td>";
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
