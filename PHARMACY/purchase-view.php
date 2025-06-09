<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="nav2.css">
<link rel="stylesheet" type="text/css" href="med.css">
<link rel="stylesheet" type="text/css" href="table1.css">
<link rel="stylesheet" type="text/css" href="input.css">
<title>
Purchases
</title>
</head>

<body>

	<?php include 'sidebar.php'; ?>
	
	<center>
	<div class="head">
	<h2> STOCK PURCHASE LIST</h2>
	</div>
	</center>
	
	<div class="heading">STOCK PURCHASE LIST</div>
    <div class="form-container" style="width: 1000px; margin-left: 362px;">
        <form method="POST">
            <div style="display: flex; justify-content: space-between;gap:10px">
                <input type="number" name="search1" placeholder="Enter Purchase ID" />
                <input type="number" name="search2" placeholder="Enter Supplier ID" />
                <input type="number" name="search3" placeholder="Enter Medicine ID" />
                <input type="number" name="search4" placeholder="Enter Medicine Name" />
            </div>
            <div style="display: flex; justify-content: space-between;gap:10px;margin-top:10px;">
                <input class="s" type="number" name="search5" min = "1" placeholder="Enter Quantity" />
                <input class="s" type="number" name="search6" min = "1" placeholder="Enter Cost" />
				<label for="search7"></label>
				<select id="search7" name="search7" style="border-radius: 15px;width: 80%;">
					<option value="pur_date">--Select Sort By--</option>
					<option value="pur_date">Purchase Date</option>
					<option value="mfg_date">Manufacturing Date</option>
					<option value="exp_date">Expiry Date</option>
				</select>
            </div>
            <button type="submit">Search</button>
            <button type="submit" name="view_all" class="secondary-btn">View Entire Inventory</button>
            <div class="custom-select">
                <button type="submit" name="desc" class="secondary-btn">Sort in Descending Order</button>
                <button type="submit" name="asc" class="secondary-btn">Sort in Ascending Order</button>
            </div>
        </form>
    </div>

	<table align="right" id="table1" style="margin-right:100px;">
		<tr>
			<th>Purchase ID</th>
			<th>Supplier ID</th>
			<th>Medicine ID</th>
			<th>Medicine Name</th>
			<th>Quantity</th>
			<th>Cost of Purchase</th>
			<th>Date of Purchase</th>
			<th>Manufacturing Date</th>
			<th>Expiry Date</th>
			<th>Action</th>
		</tr>
		
	<?php

		$searchQueryPurId = ''; 
		$searchQuerySupId = ''; 
		$searchQueryMedId = '';
		$searchQueryMedName = '';
		$searchQueryQuantity = '';
		$searchQueryCost = '';
		$orderBy = "ORDER BY pur_date DESC"; 

		if (isset($_POST['search1']) && !empty($_POST['search1'])) {
			$searchQueryPurId = $_POST['search1'];
		}
		if (isset($_POST['search2']) && !empty($_POST['search2'])) {
			$searchQuerySupId = $_POST['search2'];
		}
		if (isset($_POST['search3']) && !empty($_POST['search3'])) {
			$searchQueryMedId = $_POST['search3'];
		}
		if (isset($_POST['search4']) && !empty($_POST['search4'])) {
			$searchQueryMedName = $_POST['search4'];
		}
		if (isset($_POST['search5']) && !empty($_POST['search5'])) {
			$searchQueryQuantity = $_POST['search5'];
		}
		if (isset($_POST['search6']) && !empty($_POST['search6'])) {
			$searchQueryCost = $_POST['search6'];
		}
		
		if (isset($_POST['view_all'])) {
            $searchQueryPurId = ''; 
            $searchQuerySupId = '';
            $searchQueryMedId = '';
            $searchQueryMedName = '';
            $searchQueryQuantity = '';
            $searchQueryCost = '';
        }

		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			if (!empty($_POST['search7'])) {
				$sortBy = $_POST['search7'];

				$allowedColumns = ['pur_date', 'mfg_date', 'exp_date'];
				if (in_array($sortBy, $allowedColumns)) {
					if (isset($_POST['asc'])) {
						$orderBy = "ORDER BY $sortBy ASC";
					} elseif (isset($_POST['desc'])) {
						$orderBy = "ORDER BY $sortBy DESC";
					}
				} else {
					echo "Invalid sort option selected.";
				}
			} else {
				echo "Please select a sort criteria.";
			}
		}



		include "config.php";
		$sql = "
		SELECT 
			p.p_id AS purchase_id,
			s.sup_id AS supplier_id,
			m.med_id AS medicine_id,
			m.med_name AS medicine_name,
			p.p_qty AS quantity,
			p.p_cost AS cost_of_purchase,
			p.pur_date AS purchase_date,
			p.mfg_date AS manufacturing_date,
			p.exp_date AS expiry_date
		FROM 
			purchase p
		INNER JOIN meds m ON m.med_id = p.med_id
		INNER JOIN suppliers s ON s.sup_id = p.sup_id
		WHERE 
			('$searchQueryPurId' = '' OR p.p_id = '$searchQueryPurId') AND
			('$searchQuerySupId' = '' OR s.sup_id = '$searchQuerySupId') AND
			('$searchQueryMedId' = '' OR m.med_id = '$searchQueryMedId') AND
			('$searchQueryMedName' = '' OR m.med_name LIKE CONCAT('$searchQueryMedName', '%')) AND
			('$searchQueryQuantity' = '' OR p.p_qty = '$searchQueryQuantity') AND
			('$searchQueryCost' = '' OR p.p_cost = '$searchQueryCost')";

	if (!empty($orderBy)) {
		$sql .= " $orderBy";
	}


	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		while ($row = $result->fetch_assoc()) {
			echo "<tr>";
			echo "<td>" . $row["purchase_id"] . "</td>";
			echo "<td>" . $row["supplier_id"] . "</td>";
			echo "<td>" . $row["medicine_id"] . "</td>";
			echo "<td>" . $row["medicine_name"] . "</td>";
			echo "<td>" . $row["quantity"] . "</td>";
			echo "<td>" . $row["cost_of_purchase"] . "</td>";
			echo "<td>" . $row["purchase_date"] . "</td>";
			echo "<td>" . $row["manufacturing_date"] . "</td>";
			echo "<td>" . $row["expiry_date"] . "</td>";
			echo "<td align=center>";		 
			echo "<a class='button1 edit-btn' href=purchase-update.php?pid=".$row['purchase_id']."&sid=".$row['supplier_id']."&mid=".$row['medicine_id'].">Edit</a>";
			echo "<a class='button1 del-btn' href=purchase-delete.php?pid=".$row['purchase_id']."&sid=".$row['supplier_id']."&mid=".$row['medicine_id'].">Delete</a>";
			echo "</td>";
			echo "</tr>";
		}
		echo "</table>";
	} else {
		echo "<tr><td colspan='10'>No records found</td></tr>";
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
