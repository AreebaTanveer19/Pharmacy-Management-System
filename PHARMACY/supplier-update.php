<?php
// Start output buffering to avoid premature output
ob_start();

// Include configuration file
include "config.php";

// Check if id is passed via GET
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $qry1 = "SELECT * FROM suppliers WHERE sup_id='$id'";
    $result = $conn->query($qry1);

    // Fetch row for pre-filling form
    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_row();
    } else {
        echo "<p style='color: red;'>Error: Supplier not found.</p>";
        exit;
    }
}

// Handle form submission for updates
if (isset($_POST['update'])) {
    $id = $_POST['sid'];
    $name = $_POST['sname'];
    $add = $_POST['sadd'];
    $phno = $_POST['sphno'];
    $mail = $_POST['smail'];

    // Update query
    $sql = "UPDATE suppliers SET sup_name='$name', sup_add='$add', sup_phno='$phno', sup_mail='$mail' WHERE sup_id='$id'";
    
    // Execute query and redirect or show error
    if ($conn->query($sql)) {
        header("Location: supplier-view.php");
        exit;
    } else {
        echo "<p style='color: red;'>Error! Unable to update supplier details.</p>";
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
    <title>Suppliers</title>
</head>
<body>
    <?php include 'sidebar.php'; ?>

    <center>
        <div class="head">
            <h2>UPDATE SUPPLIER DETAILS</h2>
        </div>
    </center>

    <div class="one">
        <div class="row">
            <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                <div class="column">
                    <p>
                        <label for="sid">Supplier ID:</label><br>
                        <input type="number" name="sid" value="<?= htmlspecialchars($row[0]); ?>" readonly>
                    </p>
                    <p>
                        <label for="sname">Supplier Company Name:</label><br>
                        <input type="text" name="sname" value="<?= htmlspecialchars($row[1]); ?>">
                    </p>
                    <p>
                        <label for="sadd">Address:</label><br>
                        <input type="text" name="sadd" value="<?= htmlspecialchars($row[2]); ?>">
                    </p>
                </div>
                <div class="column">
                    <p>
                        <label for="sphno">Phone Number:</label><br>
                        <input type="number" name="sphno" value="<?= htmlspecialchars($row[3]); ?>">
                    </p>
                    <p>
                        <label for="smail">Email Address:</label><br>
                        <input type="mail" name="smail" value="<?= htmlspecialchars($row[4]); ?>">
                    </p>
                </div>
                <input type="submit" name="update" value="Update">
            </form>
        </div>
    </div>

    <script>
        var dropdown = document.getElementsByClassName("dropdown-btn");
        for (var i = 0; i < dropdown.length; i++) {
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

<?php
// End output buffering and send the output
ob_end_flush();
?>