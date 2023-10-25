<?php
  
  include "connection.php";

  $id=$_GET['id'];
	
  $sql="SELECT * FROM adddriver WHERE driver_id='$id' ";

  $result=mysqli_query($conn ,$sql);
  $row=mysqli_fetch_assoc($result);

  $driverid = $row['driver_id'];

  $drivername = $row['driver_name'];

  $address = $row['address'];

  $contact  = $row['contact'];

  if(isset($_POST['save'])){

	$driverid=$_POST['driverid'];

	$drivername=$_POST['name'];

	$address=$_POST['address'];

	$contact=$_POST['contact'];
   
	$query = " update adddriver set driver_id='$driverid', driver_name='$drivername' , address='$address' , contact= '$contact'  WHERE driver_id='$id' ";
	$result=mysqli_query($conn,$query);

	if($result){
        echo "update succufully";
		header('location:viewdriver.php');
	}else
	    echo "error";
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
		<h1>Update Driver</h1>
		<form  method="POST">
			<label for="driverid">Driver Id</label>
			<input type="text" id="busid" name="driverid" placeholder="Enter Driver id" value=<?php echo $driverid ?>  required>

			<label for="drivername"></label> Name</label>
			<input type="text" id="name" name="name" placeholder="Enter Driver Name" value=<?php echo $drivername ?> required>

			<label for="address"> Address</label>		
			<input type="text" id="address" name="address" placeholder="Enter Driver Address" value=<?php echo $address ?> required>
			<label for="contactno"> Contact Number</label>
			<input type="text" id="contact" name="contact" placeholder="Enter Driver Contact Number" value=<?php echo $contact ?> required>

			<input class="btn" type="submit" value="Update"name="save">
		</form>
		<a href="viewdriver.php" > <input class="btn" style="width:300px; margin-top:5px" type="submit" name="save1" value="Back"> </a>

	</div>
</selection>
	
</body>
</html>
