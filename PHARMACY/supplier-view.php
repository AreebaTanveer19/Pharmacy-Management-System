<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="table1.css">
    <link rel="stylesheet" type="text/css" href="nav2.css">
    <link rel="stylesheet" type="text/css" href="med.css">
    <link rel="stylesheet" type="text/css" href="input.css">
    <title>Suppliers</title>
</head>

<body>
    <?php include 'sidebar.php'; ?>

    <center>
        <div class="head">
            <h2>SUPPLIERS LIST</h2>
        </div>
    </center>

    <!-- Search Form -->
    <div class="heading">SUPPLIERS LIST</div>
    <div class="form-container" style="width: 1000px; margin-left: 362px;">
        <form method="POST">
            <div style="display: flex; justify-content: space-between;gap:10px">
                <input class="s" type="number" name="search1" placeholder="Enter Supplier ID" />
				<input class="s" type="text" name="search2" placeholder="Enter Supplier Name" />
				<input class="s" type="text" name="search3" placeholder="Enter Supplier Address" />
            </div>
            <button type="submit" name="search">Search</button>
            <button type="submit" name="view_all" class="secondary-btn">View Entire Inventory</button>
        </form>
    </div>

    <table align="right" id="table1" style="margin-right:100px;">
        <tr>
            <th>Supplier ID</th>
            <th>Company Name</th>
            <th>Address</th>
            <th>Phone Number</th>
            <th>Email Address</th>
            <th>Action</th>
        </tr>

        <?php
        include "config.php";

		$searchQuerySupId = ''; 
		$searchQuerySupName = ''; 
		$searchQuerySupAddress = ''; 

		if (isset($_POST['search1']) && !empty($_POST['search1'])) {
			$searchQuerySupId = $_POST['search1'];
		}
		if (isset($_POST['search2']) && !empty($_POST['search2'])) {
			$searchQuerySupName = $_POST['search2'];
		}
		if (isset($_POST['search3']) && !empty($_POST['search3'])) {
			$searchQuerySupAddress = $_POST['search3'];
		}
		if (isset($_POST['view_all'])) {
			$searchQuerySupId = ''; 
			$searchQuerySupName = '';
		}

		$sql = "SELECT sup_id, sup_name, sup_add, sup_phno, sup_mail FROM suppliers 
				WHERE ('$searchQuerySupId' = '' OR sup_id = '$searchQuerySupId') 
				AND ('$searchQuerySupName' = '' OR sup_name LIKE CONCAT('$searchQuerySupName', '%'))
				AND ('$searchQuerySupAddress' = '' OR sup_add LIKE CONCAT('$searchQuerySupAddress', '%'))";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["sup_id"] . "</td>";
                echo "<td>" . $row["sup_name"] . "</td>";
                echo "<td>" . $row["sup_add"] . "</td>";
                echo "<td>" . $row["sup_phno"] . "</td>";
                echo "<td>" . $row["sup_mail"] . "</td>";
                echo "<td align=center>";
                echo "<a class='button1 edit-btn' href='supplier-update.php?id=" . $row['sup_id'] . "'>Edit</a>";
                echo "<a class='button1 del-btn' href='supplier-delete.php?id=" . $row['sup_id'] . "'>Delete</a>";
                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6' align='center'>No Suppliers Found</td></tr>";
        }

        $conn->close();
        ?>
    </table>

    <script>
        var dropdown = document.getElementsByClassName("dropdown-btn");
        for (var i = 0; i < dropdown.length; i++) {
            dropdown[i].addEventListener("click", function () {
                this.classList.toggle("active");
                var dropdownContent = this.nextElementSibling;
                dropdownContent.style.display = dropdownContent.style.display === "block" ? "none" : "block";
            });
        }
    </script>
</body>

</html>
