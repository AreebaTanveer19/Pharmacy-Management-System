<!DOCTYPE html>
<html>

<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="nav2.css">
<link rel="stylesheet" type="text/css" href="table1.css">
<link rel="stylesheet" type="text/css" href="med.css">
<link rel="stylesheet" type="text/css" href="input.css">
<title>
Employees
</title>
</head>

<body>

	<?php include 'sidebar.php'; ?>
	
	<center>
	<div class="head">
	<h2> EMPLOYEE LIST</h2>
	</div>
	</center>
	
	<div class="heading">EMPLOYEE LIST</div>
    <div class="form-container" style="width: 1000px; margin-left: 362px;">
        <form method="POST">
            <div style="display: flex; justify-content: space-between;gap:10px">
                <input type="number" name="search1" placeholder="Enter Employee ID" />
                <input type="text" name="search2" placeholder="Enter Employee Name" />
                <input type="text" name="search3" placeholder="Enter Employee Type" />
            </div>
            <button type="submit">Search</button>
            <button type="submit" name="view_all" class="secondary-btn">View All Employees</button>
        </form>
    </div>
	<table align="right" id="table1" style="margin-right:20px;">
		<tr>
			<th>Employee ID</th>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Date of Birth</th>
			<th>Age</th>
			<th>Sex</th>
			<th>Employee Type</th>
			<th>Date of Joining</th>
			<th>Salary</th>
			<th>Phone Number</th>
			<th>Email Address</th>
			<th>Home Address</th>
			<th>Action</th>
		</tr>
		
	<?php
	
	$searchQueryEmpId = ''; 
    $searchQueryEmpName = ''; 
    $searchQueryEmpType = '';
        
	if (isset($_POST['search1']) && !empty($_POST['search1'])) {
		$searchQueryEmpId = $_POST['search1'];
	}
	if (isset($_POST['search2']) && !empty($_POST['search2'])) {
		$searchQueryEmpName = $_POST['search2'];
	}
	if (isset($_POST['search3']) && !empty($_POST['search3'])) {
		$searchQueryEmpType = $_POST['search3'];
	}

	if (isset($_POST['view_all'])) {
		$searchQueryEmpId = ''; 
   		$searchQueryEmpName = ''; 
    	$searchQueryEmpType = '';
	}

	include "config.php";
	$sql = "SELECT e_id, e_fname, e_lname, bdate, e_age, e_sex, e_type, e_jdate, e_sal, e_phno, e_mail, e_add FROM employee 
	Where
	('$searchQueryEmpId' = '' OR 
    e_id = '$searchQueryEmpId') AND
	('$searchQueryEmpName' = '' OR 
    CONCAT(e_fname,' ',e_lname) LIKE CONCAT('$searchQueryEmpName', '%')) AND
	('$searchQueryEmpType' = '' OR 
    e_type LIKE CONCAT('$searchQueryEmpType', '%'))";
	$result = $conn->query($sql);
	
	if ($result->num_rows > 0) {
	
	while($row = $result->fetch_assoc()) {

	echo "<tr>";
		echo "<td>" . $row["e_id"]. "</td>";
		echo "<td>" . $row["e_fname"] . "</td>";
		echo "<td>" . $row["e_lname"] . "</td>";
		echo "<td>" . $row["bdate"] . "</td>";
		echo "<td>" . $row["e_age"]. "</td>";
		echo "<td>" . $row["e_sex"]. "</td>";
		echo "<td>" . $row["e_type"]. "</td>";
		echo "<td>" . $row["e_jdate"]. "</td>";
		echo "<td>" . $row["e_sal"]. "</td>";
		echo "<td>" . $row["e_phno"]. "</td>";
		echo "<td>" . $row["e_mail"]. "</td>";
		echo "<td>" . $row["e_add"]. "</td>";
		echo "<td align=center>";
		echo "<a class='button1 edit-btn' href=employee-update.php?id=".$row['e_id'].">Edit</a>";
		echo "<a onclick='return confirm('Are you sure to delete?');' class='button1 del-btn' href=employee-delete.php?id=".$row['e_id'].">Delete</a>";
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

