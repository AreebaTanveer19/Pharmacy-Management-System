<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="nav2.css">
    <link rel="stylesheet" type="text/css" href="form4.css">
    <title>Customers</title>
</head>

<body>

<?php include 'sidebar.php'; ?>

    <center>
        <div class="head">
            <h2> ADD CUSTOMER DETAILS</h2>
        </div>
    </center>

    <br><br><br><br><br><br><br><br>

    <div class="one">
        <div class="row">
            <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
                <div class="column">
                    <p>
                        <label for="cfname">First Name:</label><br>
                        <input type="text" name="cfname" required>
                    </p>
                    <p>
                        <label for="clname">Last Name:</label><br>
                        <input type="text" name="clname">
                    </p>
                    <p>
                        <label for="age">Age:</label><br>
                        <input min="1" type="number" name="age"  min="1" required>
                    </p>

                    <p>
                        <label for="sex">Sex: </label><br>
                        <select id="sex" name="sex" required>
                            <option value="">Select</option>
                            <option>Female</option>
                            <option>Male</option>
                            <option>Others</option>
                       
						</select>
					</p>
					
				</div>
				<div class="column">
					
					<p>
						<label for="phno">Phone Number: </label><br>
						<input type="number" name="phno"required>
					</p>
					<p>
						<label for="emid">Email ID:</label><br>
						<input type="email" name="emid" style="width: 80%;padding: 12px;border: 1px solid #ccc;border-radius: 4px;">
					</p> 
				</div>
				
			
			<input type="submit" name="add" value="Add Customer">
			</form>
		<br>
		
		
			<?php
			include "config.php";
			 
			if(isset($_POST['add']))
			{
			$fname = mysqli_real_escape_string($conn, $_REQUEST['cfname']);
			$lname = mysqli_real_escape_string($conn, $_REQUEST['clname']);
			$age = mysqli_real_escape_string($conn, $_REQUEST['age']);
			$sex = mysqli_real_escape_string($conn, $_REQUEST['sex']);
			$phno = mysqli_real_escape_string($conn, $_REQUEST['phno']);
			$mail = mysqli_real_escape_string($conn, $_REQUEST['emid']);

			
			 
			$sql = "INSERT INTO customer (c_fname,c_lname,c_age,c_sex,c_phno,c_mail)
			 VALUES ('$fname', '$lname',$age,'$sex',$phno, '$mail')";
			if(mysqli_query($conn, $sql)){
				echo "<p style='font-size:8;'>Customer successfully added!</p>";
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