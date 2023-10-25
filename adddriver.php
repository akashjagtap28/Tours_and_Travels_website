
<?php 

include "connection.php";

  if (isset($_POST['save'])) {

    $driverid=$_POST['driverid'];
 $name=$_POST['drivername'];
 $address=$_POST['address'];
 $contact=$_POST['contact'];

 $sql = "INSERT INTO `adddriver`(`driver_id`, `driver_name`, `address`, `contact`)
         VALUES ('$driverid','$name','$address','$contact')";


    $result = $conn->query($sql);

    if ($result == TRUE) {

      echo "New record inserted successfully.";
	  header('location:viewdriver.php');

    }else{

      echo "Error:". $sql . "<br>". $conn->error;

    } 

    $conn->close(); 

  }

?>
 <!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Add Driver Page</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/adddriver.css">
</head>
<body>
	<selection class="saveform">
	<div class="save">
		<h1>Add Driver</h1>
		<form action="" method="POST">
			<label for="driverid">Driver Id </label>
			<input type="text" id="busid" name="driverid" placeholder="Enter Driver id" required>

			<label for="drivername"></label> Name</label>
			<input type="text" id="name" name="drivername" placeholder="Enter Driver Name" required>

			<label for="address"> Address</label>		
			<input type="text" id="address" name="address" placeholder="Enter Driver Address" required>
			<label for="contactno"> Contact Number</label>
			<input type="text" id="contact" name="contact" placeholder="Enter Driver Contact Number" required>

			<input class="btn" type="submit" value="Save"name="save">
		</form>
		<a href="viewdriver.php" > <input class="btn" style="width:300px; margin-top:5px" type="submit" name="save1" value="Back"> </a>

	</div>
</selection>
	
</body>
</html>
