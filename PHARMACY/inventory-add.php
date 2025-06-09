<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="nav2.css">
<link rel="stylesheet" type="text/css" href="form4.css">
<title>
Medicines
</title>
</head>

<body>

	<?php include 'sidebar.php'; ?>
    
	
	<center>
	<div class="head">
	<h2> ADD MEDICINE DETAILS</h2>
	</div>
	</center>
	
	
	<br><br><br><br><br><br><br><br>
	
	
	<div class="one">
    <div class="row">
        <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
            <div class="row">
                <div class="column" style="width: 48%; margin-right: 4%;">
                    <p>
                        <label for="medname" style="font-weight: bold;">Medicine Name:</label><br>
                        <input type="text" name="medname" id="medname" required>
                    </p>
                    <p>
                        <label for="brdname" style="font-weight: bold;">Brand Name:</label><br>
                        <input type="text" name="brdname" id="brdname" required>
                    </p>
                    <p>
                        <label for="category" style="font-weight: bold;">Medicine Category:</label><br>
                        <select id="category" name="category" required style="width: 85%" required>
                            <option value="Tablet">Tablet</option>
                            <option value="Capsule">Capsule</option>
                            <option value="Syrup">Syrup</option>
                            <option value="Ointment">Ointment</option>
                            <option value="Suppository">Suppository</option>
                            <option value="Injection">Injection</option>
                            <option value="Inhaler">Inhaler</option>
                            <option value="Oral Solution">Oral Solution</option>
                            <option value="Lozenge">Lozenge</option>
                            <option value="Drop">Drop</option>
                            <option value="Gel">Gel</option>
                            <option value="Spray">Spray</option>
                            <option value="Emulsion">Emulsion</option>
                        </select>
                    </p>
                </div>
                
                <div class="column" style="width: 48%;">
                    <p>
                        <label for="usedfor" style="font-weight: bold;">Used for:</label><br>
                        <input type="text" name="usedfor" id="usedfor" required >
                    </p>
                    <p>
                        <label for="sp" style="font-weight: bold;">Price:</label><br>
                        <input type="number" step="0.01" name="sp" min = "1" id="sp" required>
                    </p>
                    <p>
                        <label for="loc" style="font-weight: bold;">Storage Location:</label><br>
                        <input type="text" name="loc" id="loc" min = "1" required >
                    </p>
                </div>
            </div>

            <div style="text-align: center; margin-top: 20px;">
    			<input type="submit" name="add" value="Add Medicine" style="background-color:rgb(76, 92, 175); color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">
			</div>

        </form>
    </div>
</div>
		
	<?php
	
		include "config.php";
		 

		if(isset($_POST['add']))
		{
		$name = mysqli_real_escape_string($conn, $_REQUEST['medname']);
		$brd = mysqli_real_escape_string($conn, $_REQUEST['brdname']);
		// $qty = mysqli_real_escape_string($conn, $_REQUEST['qty']);
		$category = mysqli_real_escape_string($conn, $_REQUEST['category']);
		$sprice = mysqli_real_escape_string($conn, $_REQUEST['sp']);
		$location = mysqli_real_escape_string($conn, $_REQUEST['loc']);
		$uf = mysqli_real_escape_string($conn, $_REQUEST['usedfor']);

		 
		$sql = "INSERT INTO meds (med_name,brand_name,category,med_price,location_rack,usedfor) VALUES ('$name', '$brd' , '$category',$sprice, '$location' , '$uf')";
		if(mysqli_query($conn, $sql)){
			echo "<p style='color: green; font-weight: bold;text-align: center;margin-left : 280px; font-size: 25px;'>Medicine details successfully added!</p>";
		} else{
			echo "<p style='font-size:8; color:red;'>Error! Check details.</p>";
		}
		}
		 

		$conn->close();
	?>
		</div>
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
