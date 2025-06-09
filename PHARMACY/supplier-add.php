<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="nav2.css">
<link rel="stylesheet" type="text/css" href="form4.css">
<title>
Suppliers
</title>
</head>

<body>

	<?php include 'sidebar.php'; ?>
	
	<center>
	<div class="head">
	<h2> ADD SUPPLIER DETAILS</h2>
	</div>
	</center>

	
	
	<div class="one row">
		
			<form action="<?=$_SERVER['PHP_SELF']?>" method="post">
				<div class="column">
					<p>
						<label for="sname">Supplier Company Name:</label><br>
						<input type="text" name="sname" required>
					</p>
					<p>
						<label for="sadd">Address:</label><br>
						<input type="text" name="sadd"required>
					</p>
					
					
				</div>
				<div class="column">
					<p>
						<label for="sphno">Phone Number:</label><br>
						<input type="number" name="sphno" required>
					</p>
					
					<p>
						<label for="smail">Email Address </label><br>
						<input type="email" name="smail" style="width: 80%;padding: 12px;border: 1px solid #ccc;border-radius: 4px;" required>
					</p>
					
				</div>
				
			
			<input type="submit" name="add" value="Add Supplier">
			</form>
		<br>
		
		
	<?php
			include "config.php";
			 
			if(isset($_POST['add']))
			{
			$name = mysqli_real_escape_string($conn, $_REQUEST['sname']);
			$add = mysqli_real_escape_string($conn, $_REQUEST['sadd']);
			$phno = mysqli_real_escape_string($conn, $_REQUEST['sphno']);
			$mail = mysqli_real_escape_string($conn, $_REQUEST['smail']);

			 
			$sql = "INSERT INTO suppliers (sup_name,sup_add,sup_phno,sup_mail) VALUES ('$name','$add',$phno, '$mail')";
			if(mysqli_query($conn, $sql)){
				echo "<p style='font-size:8;'>Supplier details successfully added!</p>";
			} else{
				echo "<p style='font-size:8; color:red;'>Error! Check details.</p>";
			}
			}
			 
			$conn->close();
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