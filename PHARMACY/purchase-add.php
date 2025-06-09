<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" type="text/css" href="nav2.css">
	<link rel="stylesheet" type="text/css" href="form4.css">
	<title>
		Purchases
	</title>
</head>

<body>

	<?php include 'sidebar.php'; ?>

	<center>
		<div class="head">
			<h2> ADD PURCHASE DETAILS</h2>
		</div>
	</center>


	<br><br><br><br><br><br><br><br>


	<div class="one row">
		<form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">

			<?php
			include "config.php";

			if (isset($_POST['add'])) {
				$sid = mysqli_real_escape_string($conn, $_REQUEST['sid']);
				$sql1 = "SELECT SUP_ID FROM SUPPLIERS WHERE SUP_ID=$sid";
				$result1 = $conn->query($sql1);
				$row1 = ($result1 && $result1->num_rows > 0) ? $result1->fetch_row() : null;

				$mid = mysqli_real_escape_string($conn, $_REQUEST['mid']);
				$sql2 = "SELECT MED_ID FROM MEDS WHERE MED_ID=$mid";
				$result2 = $conn->query($sql2);
				$row2 = ($result2 && $result2->num_rows > 0) ? $result2->fetch_row() : null;

				$qty = mysqli_real_escape_string($conn, $_REQUEST['pqty']);
				$cost = mysqli_real_escape_string($conn, $_REQUEST['pcost']);
				$pdate = mysqli_real_escape_string($conn, $_REQUEST['pdate']);
				$mdate = mysqli_real_escape_string($conn, $_REQUEST['mdate']);
				$edate = mysqli_real_escape_string($conn, $_REQUEST['edate']);

				if ($pdate > $edate || $edate < $mdate || $pdate < $mdate) {
					echo "<p style='color: red; font-weight: bold;text-align: center;margin-right : 50px; font-size: 25px;'>INVALID DATES!</p>";
				} else {
					if ($row1 && $row2 && $sid === $row1[0] && $mid === $row2[0]) {
						$sql = "INSERT INTO purchase (sup_id, med_id, p_qty, p_cost, pur_date, mfg_date, exp_date) VALUES ($sid, $mid, '$qty', '$cost', '$pdate', '$mdate', '$edate')";
						if (mysqli_query($conn, $sql)) {
							echo "<p style='font-size:8;'>Purchase details successfully added!</p>";
						} else {
							echo "<p style='font-size:8;color:red;'>Error! Check details.</p>";
						}
					} else {
						echo "<p style='font-size:8;'>Invalid ID</p>";
					}
				}
			}

			$conn->close();
			?>


			<div class="column">
				<!-- <p>
						<label for="pid">Purchase ID:</label><br>
						<input type="number" name="pid">
					</p> -->
				<p>
					<label for="sid">Supplier ID:</label><br>
					<input type="number" name="sid" required>
				</p>
				<p>
					<label for="mid">Medicine ID:</label><br>
					<input type="number" name="mid" required>
				</p>
				<p>
					<label for="pqty">Purchase Quantity:</label><br>
					<input type="number" name="pqty" min="1" required>
				</p>

				<p>
					<label for="pcost">Purchase Cost:</label><br>
					<input type="number" step="1" name="pcost" min="1" required>
				</p>


			</div>
			<div class="column">


				<p>
					<label for="pdate">Date of Purchase:</label><br>
					<input type="date" name="pdate" required>
				</p>
				<p>
					<label for="mdate">Manufacturing Date:</label><br>
					<input type="date" name="mdate" required>
				</p>
				<p>
					<label for="edate">Expiry Date:</label><br>
					<input type="date" name="edate" required>
				</p>

			</div>

			<input type="submit" name="add" value="Add Purchase">
		</form>
		<br>

	</div>

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