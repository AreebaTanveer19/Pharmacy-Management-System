<?php

include 'config.php'; 
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="med.css">
    <link rel="stylesheet" type="text/css" href="nav2.css">
    <link rel="stylesheet" type="text/css" href="table1.css">
    <link rel="stylesheet" type="text/css" href="input.css">
    <title>Medicines</title>   
</head>

<body>
    
    <?php include 'sidebar.php'; ?>

    <center>
        <div class="head">
            <h2>MEDICINE INVENTORY SEARCH</h2>
        </div>
    </center>

    <div class="heading">MEDICINE INVENTORY SEARCH</div>
    <div class="form-container" style="width: 1000px; margin-left: 362px;">
        <form method="POST">
            <div style="display: flex; justify-content: space-between;gap:10px;">
                <input class="s" type="text" name="search1" placeholder="Enter Medicine Name" />
                <input class="s" type="text" name="search2" placeholder="Enter Used For" />
                <input class="s" type="text" name="search3" placeholder="Enter Category" />
                <input class="s" type="text" name="search4" placeholder="Enter Brand Name" />
            </div>
            <div style="display: flex; justify-content: space-between;gap:10px;margin-top:10px;">
                <input class="s" type="number" name="search5" placeholder="Enter Rack Location" />
                <input class="s" type="number" name="search6" placeholder="Enter Quantity" />
                <input class="s" type="number" name="search7" placeholder="Enter Price" />
                <input class="s" type="number" name="search8" placeholder="Enter Items Sold" />
            </div>
            <button type="submit">Search</button>
            <button type="submit" name="view_all" class="secondary-btn">View Entire Inventory</button>
            <div class="custom-select">
                <button type="submit" name="desc" class="secondary-btn">Sort by Items Sold (Desc)</button>
                <button type="submit" name="asc" class="secondary-btn">Sort by Items Sold (Asc)</button>
            </div>
        </form>
    </div>

    <table align="right" id="table1" style="margin-right:100px;">
        <tr>
            <th>Medicine ID</th>
            <th>Medicine Name</th>
            <th>Brand Name</th>
            <th>Quantity Available</th>
            <th>Category</th>
            <th>Price</th>
            <th>Location in Store</th>
            <th>Used for</th>
            <th>Sold</th>
            <th>Action</th>
        </tr>
        <?php
        // Initialize the search parameters
        $searchQueryMedName = ''; 
        $searchQueryIllness = ''; 
        $searchQueryCategory = '';
        $searchQueryBrand = '';
        $searchQueryRack = 0;
        $searchQueryQuantity = 0;
        $searchQueryPrice = 0;
        $searchQuerySold = 0;
        $orderBy = "ORDER BY total_sales DESC"; // Default to descending order for items sold

        // Collect the search terms from POST
        if (isset($_POST['search1']) && !empty($_POST['search1'])) {
            $searchQueryMedName = $_POST['search1'];
        }
        if (isset($_POST['search2']) && !empty($_POST['search2'])) {
            $searchQueryIllness = $_POST['search2'];
        }
        if (isset($_POST['search3']) && !empty($_POST['search3'])) {
            $searchQueryCategory = $_POST['search3'];
        }
        if (isset($_POST['search4']) && !empty($_POST['search4'])) {
            $searchQueryBrand = $_POST['search4'];
        }
        if (isset($_POST['search5']) && !empty($_POST['search5'])) {
            $searchQueryRack = $_POST['search5'];
        }
        if (isset($_POST['search6']) && !empty($_POST['search6'])) {
            $searchQueryQuantity = $_POST['search6'];
        }
        if (isset($_POST['search7']) && !empty($_POST['search7'])) {
            $searchQueryPrice = $_POST['search7'];
        }
        if (isset($_POST['search8']) && !empty($_POST['search8'])) {
            $searchQuerySold = $_POST['search8'];
        }

        // Reset the search queries if "View Entire Inventory" is clicked
        if (isset($_POST['view_all'])) {
            $searchQueryMedName = ''; 
            $searchQueryIllness = '';
            $searchQueryCategory = '';
            $searchQueryBrand = '';
            $searchQueryRack = 0;
            $searchQueryQuantity = 0;
            $searchQueryPrice = 0;
            $searchQuerySold = 0;
        }

        // Adjust the order based on user selection for ascending or descending order
        if (isset($_POST['asc'])) {
            $orderBy = "ORDER BY total_sales ASC";
        } elseif (isset($_POST['desc'])) {
            $orderBy = "ORDER BY total_sales DESC";
        }

        // Query to get inventory data
        $sql = "
        SELECT 
            m.med_id, 
            m.med_name, 
            m.brand_name, 
            m.med_qty, 
            m.category, 
            m.med_price, 
            m.location_rack, 
            m.usedfor, 
            SUM(s.sale_qty) AS total_sales
        FROM 
            meds m 
            LEFT JOIN sales_items s ON m.med_id = s.med_id
        WHERE 
            ('$searchQueryMedName' = '' OR 
            m.med_name LIKE CONCAT('$searchQueryMedName', '%')) AND
            ('$searchQueryIllness' = '' OR 
                m.usedfor LIKE CONCAT('% ', '$searchQueryIllness', ' %') OR
                m.usedfor LIKE CONCAT('$searchQueryIllness', ' %') OR
                m.usedfor LIKE CONCAT('% ', '$searchQueryIllness') OR
                m.usedfor LIKE CONCAT('$searchQueryIllness', '%') OR
                m.usedfor = '$searchQueryIllness') AND
            ('$searchQueryCategory' = '' OR 
                m.category LIKE CONCAT('$searchQueryCategory', '%')) AND
            ('$searchQueryBrand' = '' OR 
                m.brand_name LIKE CONCAT('% ', '$searchQueryBrand', ' %') OR
                m.brand_name LIKE CONCAT('$searchQueryBrand', ' %') OR
                m.brand_name LIKE CONCAT('% ', '$searchQueryBrand') OR
                m.brand_name LIKE CONCAT('$searchQueryBrand', '%') OR
                m.brand_name = '$searchQueryBrand') AND
            ($searchQueryRack = 0 OR 
                m.location_rack = $searchQueryRack) AND
            ($searchQueryQuantity = 0 OR 
               m.med_qty = $searchQueryQuantity) AND
            ($searchQueryPrice = 0 OR 
                m.med_price = $searchQueryPrice) AND
            ($searchQuerySold = 0 OR 
                (SELECT SUM(sale_qty) 
                FROM sales_items s2 
                WHERE s2.med_id = m.med_id) = $searchQuerySold)
            GROUP BY 
            m.med_id, m.med_name, m.brand_name, m.med_qty, m.category, m.med_price, m.location_rack, m.usedfor
        $orderBy
        ";

        // Execute the query
        $result = $conn->query($sql);

        // Display the results
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["med_id"] . "</td>";
                echo "<td>" . $row["med_name"] . "</td>";
                echo "<td>" . $row["brand_name"] . "</td>";
                echo "<td>" . $row["med_qty"] . "</td>";
                echo "<td>" . $row["category"] . "</td>";
                echo "<td>" . $row["med_price"] . "</td>";
                echo "<td>" . $row["location_rack"] . "</td>";
                echo "<td>" . $row["usedfor"] . "</td>";
                echo "<td>" . $row["total_sales"] . "</td>";
                echo "<td align='center'>";
                echo "<a class='button1 edit-btn' href='inventory-update.php?id=" . $row['med_id'] . "'>Edit</a>";
                echo "<a class='button1 del-btn' href='inventory-delete.php?id=" . $row['med_id'] . "'>Delete</a>";
                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='10'>No results found</td></tr>";
        }

        $conn->close();
        ?>
    </table>

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
</body>

</html>
