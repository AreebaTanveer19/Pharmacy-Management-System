<!DOCTYPE html>
<html>

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="nav2.css">
	<link rel="stylesheet" type="text/css" href="table1.css">
	<link rel="stylesheet" type="text/css" href="med.css">
	<title>
		Reports
	</title>
</head>

<body>

	<?php include 'sidebar.php'; ?>

	<center>
		<div class="head">
			<h2> MEDICINES LOW ON STOCK</h2>
		</div>
	</center>

	<div class="heading">MEDICINES LOW ON STOCK</div>
	<div class="form-container" style="width: 1000px; margin-left: 362px;">
		<form method="POST">
			<div style="display: flex; flex-direction: column; align-items: center; gap: 10px;">
				<label style="font-weight: bold; color : purple" for="qty">Quantity:</label>
				<input style="width: 250px; padding: 8px; border: 1px solid black; border-radius: 5px;" type="number"
					name="qty" min = "1" required>
			</div>
			<button type="submit">Check</button>
		</form>
	</div>

	<table align="right" id="table1" style="margin-right:100px;">
		<tr>
			<th>Medicine ID</th>
			<th>Medicine Name</th>
			<th>Quantity Available</th>
			<th>Category</th>
			<th>Price</th>
		</tr>

		<?php

		$searchQueryQty = 50;

		if (isset($_POST['qty']) && !empty($_POST['qty'])) {
			$searchQueryQty = $_POST['qty'];
		}

		include "config.php";
		$sql = "SELECT med_id, med_name,med_qty,category,med_price,location_rack FROM meds where med_qty<= $searchQueryQty order by med_qty;";
		$result = mysqli_query($conn, $sql);
		if ($result->num_rows > 0) {

			while ($row = $result->fetch_assoc()) {

				echo "<tr>";
				echo "<td>" . $row["med_id"] . "</td>";
				echo "<td>" . $row["med_name"] . "</td>";
				echo "<td style='color:red;'>" . $row["med_qty"] . "</td>";
				echo "<td>" . $row["category"] . "</td>";
				echo "<td>" . $row["med_price"] . "</td>";
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