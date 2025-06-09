<?php
include "config.php";

// Handle POST request to update data
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {
    $id = $_POST['medid'];
    $name = $_POST['medname'];
    $qty = $_POST['qty'];
    $cat = $_POST['cat'];
    $price = $_POST['sp'];
    $lcn = $_POST['loc'];

    $sql = "UPDATE meds SET med_name='$name', med_qty='$qty', category='$cat', med_price='$price', location_rack='$lcn' WHERE med_id='$id'";
    
    if ($conn->query($sql)) {
        header("Location: inventory-view.php");
        exit; // Stop further execution after redirect
    } else {
        $error_message = "Error! Unable to update.";
    }
}

// Fetch medicine details for editing
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $qry1 = "SELECT * FROM meds WHERE med_id='$id'";
    $result = $conn->query($qry1);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_row();
    } else {
        die("Error fetching medicine details.");
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="nav2.css">
<link rel="stylesheet" type="text/css" href="form4.css">
<title>Medicines</title>
</head>
<body>
    <?php include 'sidebar.php'; ?>
    
    <center>
        <div class="head">
            <h2>UPDATE MEDICINE DETAILS</h2>
        </div>
    </center>

    <div class="one">
        <div class="row">
            <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                <div class="column">
                    <p>
                        <label for="medid">Medicine ID:</label><br>
                        <input type="number" name="medid" value="<?= $row[0]; ?>" readonly>
                    </p>
                    <p>
                        <label for="medname">Medicine Name:</label><br>
                        <input type="text" name="medname" value="<?= $row[1]; ?>">
                    </p>
                    <p>
                        <label for="qty">Quantity:</label><br>
                        <input type="number" name="qty" min = "1" value="<?= $row[3]; ?>" readonly>
                    </p>
                    <p>
                        <label for="category" style="font-weight: bold;">Medicine Category:</label><br>
                        <select id="category" name="cat" required style="width: 85%;">
                            <option value="" disabled selected>Select a category</option>
                            <option value="Tablet" <?= $row[4] == 'Tablet' ? 'selected' : ''; ?>>Tablet</option>
                            <option value="Capsule" <?= $row[4] == 'Capsule' ? 'selected' : ''; ?>>Capsule</option>
                            <option value="Syrup" <?= $row[4] == 'Syrup' ? 'selected' : ''; ?>>Syrup</option>
                            <option value="Ointment" <?= $row[4] == 'Ointment' ? 'selected' : ''; ?>>Ointment</option>
                            <option value="Suppository" <?= $row[4] == 'Suppository' ? 'selected' : ''; ?>>Suppository</option>
                            <option value="Injection" <?= $row[4] == 'Injection' ? 'selected' : ''; ?>>Injection</option>
                            <option value="Inhaler" <?= $row[4] == 'Inhaler' ? 'selected' : ''; ?>>Inhaler</option>
                            <option value="Oral Solution" <?= $row[4] == 'Oral Solution' ? 'selected' : ''; ?>>Oral Solution</option>
                            <option value="Lozenge" <?= $row[4] == 'Lozenge' ? 'selected' : ''; ?>>Lozenge</option>
                            <option value="Drop" <?= $row[4] == 'Drop' ? 'selected' : ''; ?>>Drop</option>
                            <option value="Gel" <?= $row[4] == 'Gel' ? 'selected' : ''; ?>>Gel</option>
                            <option value="Spray" <?= $row[4] == 'Spray' ? 'selected' : ''; ?>>Spray</option>
                            <option value="Emulsion" <?= $row[4] == 'Emulsion' ? 'selected' : ''; ?>>Emulsion</option>
                        </select>
                    </p>
                </div>
                
                <div class="column">
                    <p>
                        <label for="sp">Price: </label><br>
                        <input type="number" step="0.01" name="sp" min = "1" value="<?= $row[5]; ?>">
                    </p>
                    <p>
                        <label for="loc">Location:</label><br>
                        <input type="text" name="loc" value="<?= $row[6]; ?>">
                    </p>
                </div>
                <input type="submit" name="update" value="Update">
            </form>

            <?php if (isset($error_message)): ?>
                <p style="color: red;"><?= $error_message; ?></p>
            <?php endif; ?>
        </div>
    </div>

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
</body>
</html>
