<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="nav2.css">
    <link rel="stylesheet" type="text/css" href="table1.css">
    <link rel="stylesheet" type="text/css" href="med.css">
    <link rel="stylesheet" type="text/css" href="form3.css">
    <title>Products - Sale</title>
</head>

<body>
    <?php include 'sidebar.php'; ?>

    <center>
        <div class="head">
            <h2>LIST OF MEDICINES SOLD</h2>
        </div>
    </center>

    <div class="heading">LIST OF MEDICINES SOLD</div>
    <div class="form-container" style="width: 1000px; margin-left: 362px;">
        <form method="POST">
            <div>
                <p>
                    <label for="start">Start Date:</label>
                    <input type="date" name="start">
                </p>
                <p>
                    <label for="end">End Date:</label>
                    <input type="date" name="end">
                </p>
            </div>
            <button type="submit" name="search" class="secondary-btn">Search</button>
            <button type="submit" name="view_all" class="secondary-btn">View All Sold Medicines</button>
			<div class="custom-select">
                <button type="submit" name="desc" class="secondary-btn">Sort by Most Sold (Desc)</button>
                <button type="submit" name="asc" class="secondary-btn">Sort by Least Sold (Asc)</button>
            </div>
        </form>
    </div>

    <table align="right" id="table1" style="margin-right:100px;">
        <tr>
            <th>Medicine ID</th>
            <th>Medicine Name</th>
            <th>Rack</th>
            <th>Price per Unit</th>
            <th>Quantity Sold</th>
			<th>Total Price Sold</th>
        </tr>

        <?php
        include "config.php";

        // Initialize default values
        $start = '2020-01-01';
        $end = date('Y-m-d');

		$orderBy = "ORDER BY SUM(si.sale_qty) DESC";
		if (isset($_POST['asc'])) {
            $orderBy = "ORDER BY SUM(si.sale_qty) ASC";
        } elseif (isset($_POST['desc'])) {
            $orderBy = "ORDER BY SUM(si.sale_qty) DESC";
        }

        // Handle form submissions
        if (isset($_POST['search'])) {
            if (!empty($_POST['start'])) {
                $start = $_POST['start'];
            }
            if (!empty($_POST['end'])) {
                $end = $_POST['end'];
            }
        } elseif (isset($_POST['view_all'])) {
            $start = '2020-01-01';
            $end = date('Y-m-d');
        }

        if ($start > $end) {
			echo "<p style='color: red; font-weight: bold;text-align: center;margin-left : 280px; font-size: 25px;'>INVALID DATES!</p>";
		} else {
        // Query to fetch data
        $sql = "SELECT 
                    m.med_id AS Medicine_ID,
                    m.med_name AS Medicine_Name,
                    m.location_rack AS Rack_Location,
                    m.med_price AS Price_Per_Unit,
                    SUM(si.sale_qty) AS Total_Quantity_Sold,
					SUM(si.tot_price) AS TOTAL_PRICE
                FROM 
                    sales_items si
                JOIN 
                    meds m ON si.med_id = m.med_id
                JOIN 
                    sales s ON si.sale_id = s.sale_id
                WHERE 
                    s.s_date BETWEEN '$start' AND '$end'
                GROUP BY 
                    m.med_id, m.med_name, m.location_rack, m.med_price
                $orderBy";

        $result = $conn->query($sql);

        // Display results in the table
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_row()) {
                echo "<tr>";
                echo "<td>" . $row[0] . "</td>";
                echo "<td>" . $row[1] . "</td>";
                echo "<td>" . $row[2] . "</td>";
                echo "<td>" . $row[3] . "</td>";
                echo "<td>" . $row[4] . "</td>";
			    echo "<td>" . $row[5] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No data found for the selected date range.</td></tr>";
        }
    }
        $conn->close();
        ?>
    </table>
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
