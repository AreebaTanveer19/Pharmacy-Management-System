<!DOCTYPE html>
<html>

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="nav2.css">
	<link rel="stylesheet" type="text/css" href="table1.css">
	<link rel="stylesheet" type="text/css" href="med.css">
	<link rel="stylesheet" type="text/css" href="form4.css">
	<title>
		Reports
	</title>
</head>

<body>

	<?php include 'sidebar.php'; ?>

	<center>
		<div class="head">
			<h2> STOCK EXPIRY</h2>
		</div>
	</center>

	<div class="heading">STOCK EXPIRY</div>
	<div class="form-container" style="width: 1000px; margin-left: 362px;">
		<form method="POST">
			<div style="display: flex; justify-content: space-between;gap:10px;">
				<label style="font-weight: bold;" for="start">Start Date: </label><br><br>
				<input type="date" name="start" required>
				<label style="font-weight: bold;" for="end">End Date: </label><br><br>
				<input type="date" name="end" required>
			</div>
			<button type="submit">Check</button>
		</form>
	</div>
	<table align="right" id="table1" style="margin-right:100px;">
		<tr>
			<th>Purchase ID</th>
			<th>Supplier ID</th>
			<th>Medicine ID</th>
			<th>Quantity</th>
			<th>Cost of Purchase</th>
			<th>Date of Purchase</th>
			<th>Manufacturing Date</th>
			<th>Expiry Date</th>
		</tr>

		<?php

		$searchQuerySDate = (new DateTime())->format('Y-m-d');
		$searchQueryEDate = (new DateTime())->modify('+6 months')->format('Y-m-d');

		if (isset($_POST['start']) && !empty($_POST['start'])) {
			$searchQuerySDate = $_POST['start'];
		}
		if (isset($_POST['end']) && !empty($_POST['end'])) {
			$searchQueryEDate = $_POST['end'];
		}
		
		include "config.php";
		if ($searchQuerySDate > $searchQueryEDate) {
			echo "<p style='color: red; font-weight: bold;text-align: center;margin-left : 280px; font-size: 25px;'>INVALID DATES!</p>";
		} else {
			$sql = "SELECT p_id, sup_id, med_id, p_qty, p_cost, pur_date, mfg_date, exp_date 
        FROM purchase 
        WHERE exp_date BETWEEN '$searchQuerySDate'  AND '$searchQueryEDate';";
			$result = mysqli_query($conn, $sql);
			if ($result->num_rows > 0) {

				while ($row = $result->fetch_assoc()) {

					echo "<tr>";
					echo "<td>" . $row["p_id"] . "</td>";
					echo "<td>" . $row["sup_id"] . "</td>";
					echo "<td>" . $row["med_id"] . "</td>";
					echo "<td>" . $row["p_qty"] . "</td>";
					echo "<td>" . $row["p_cost"] . "</td>";
					echo "<td>" . $row["pur_date"] . "</td>";
					echo "<td>" . $row["mfg_date"] . "</td>";
					echo "<td style='color:red;'>" . $row["exp_date"] . "</td>";
					echo "</tr>";
				}
				echo "</table>";
			}
		}

		$conn->close();

		?>

</body>

<script>

	var dropdown = document.getElementsByClassName("dropdown-btn");
	var i;

	for (i = 0; i < dropdown.length; i++) {
		dropdown[i].addEventListener("click", function () {
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