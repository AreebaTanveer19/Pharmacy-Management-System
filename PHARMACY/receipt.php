<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="nav2.css">
    <link rel="stylesheet" type="text/css" href="table1.css">
    <link rel="stylesheet" type="text/css" href="med.css">
    <link rel="stylesheet" type="text/css" href="receiptstyle.css">

    <title>Pharmacy Receipt</title>
</head>
<body>

    <?php include 'sidebar.php'; ?>

    <div class="content">
        <h1>Pharmacy Receipt</h1>
        <?php
            include "config.php"; 

            if (isset($_GET['sale_id'])) {
                $sale_id = $_GET['sale_id'];

                // Fetch sale details
                $sale_query = "SELECT * FROM sales WHERE sale_id = $sale_id";
                $sale_result = $conn->query($sale_query);
                $sale = $sale_result->fetch_row();

                // Fetch sold items
                $items_query = "SELECT si.sale_qty, si.tot_price, m.med_name, m.med_price 
                                FROM sales_items si 
                                JOIN meds m ON si.med_id = m.med_id 
                                WHERE si.sale_id = $sale_id";
                $items_result = $conn->query($items_query);

                $names_query = "SELECT c_fname,c_lname 
                                FROM customer
                                WHERE c_id = $sale[1]";
                $names_result = $conn->query($names_query);
                $names_rows=$names_result->fetch_row();

                // Display sale details
                echo "<p><strong>Sale ID:</strong> " . $sale_id . "</p>";
                echo "<p><strong>Customer ID:</strong> " . $sale[1] . "</p>";
                echo "<p><strong>Customer Name:</strong> " . $names_rows[0] . " " . $names_rows[1] . "</p>";
                echo "<p><strong>Employee ID:</strong> " . $sale[5] . "</p>";
                echo "<p><strong>Date:</strong> " . $sale[2] . "</p>";
                echo "<p><strong>Time:</strong> " . $sale[3] . "</p>";

                // Display items table
                echo "<table>";
                echo "<tr><th>Item Name</th><th>Qty</th><th>Unit Price</th><th>Total</th></tr>";

                $total_price = 0;
                while ($item = $items_result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $item['med_name'] . "</td>";
                    echo "<td>" . $item['sale_qty'] . "</td>";
                    echo "<td>$" . number_format($item['med_price'], 2) . "</td>";
                    echo "<td>$" . number_format($item['tot_price'], 2) . "</td>";
                    echo "</tr>";
                    $total_price += $item['tot_price'];
                }
                echo "</table>";

                // Display totals
                $discount = $sale[7];
                $tax = $sale[6];
                $price_after_discount = $total_price - ($discount / 100) * $total_price;
                $price_after_tax = $sale[4];

                echo "<div class='totals'>";
                echo "<p>Total: <span>$" . number_format($total_price, 2) . "</span></p>";
                echo "<p>Discount: <span>-" . $discount . "%</span></p>";
                echo "<p>Price after Discount: <span>$" . number_format($price_after_discount, 2) . "</span></p>";
                echo "<p>Tax: <span>+" . $tax . "%</span></p>";
                echo "<p>Final Total: <span>$" . number_format($price_after_tax, 2) . "</span></p>";
                echo "</div>";

                echo "<div class='footer'>";
                echo "<p>Thank you for shopping at Pharmacy!</p>";
                echo "<p>Visit again!</p>";
                echo "</div>";
            } else {
                echo "<p>No sale ID provided.</p>";
            }
        ?>
    </div>

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
