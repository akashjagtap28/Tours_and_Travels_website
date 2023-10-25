<?php
  $connection = mysqli_connect("localhost:3306" , "root", "","busbooking");
  if(!$connection){
    die("Eroor " .mysqli_connect_errno());

  }
  else
 

  //if(isset($_POST['save'])){
	//$busid=$_POST['busid'];
	//$busno=$_POST['busno'];
/*	$bustype=$_POST['bustype'];
	$capacity=$_POST['capacity'];
   
	$query = "INSERT INTO addbus (bus_id ,  bus_no , bus_type , capacity ) 
        values ('$busid','$busno' ,'$bustype' ,'$capacity' )";
	$result=mysqli_query($connection,$query);
	if($result){
		header('location:viewbus.php');
	}else	
	    echo "error";
  }*/
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Add Bus Page</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/addbus.css">
</head>
<body>
	<selection class="saveform">
	<div class="save">
		<h1>Add Bus</h1>
		<form  action="insertbus.php" method="POST">
			<label for="busid">Bus Id</label>
			<input type="text" id="busid" name="busid" placeholder="Enter your bus id" required>

			<label for="busno">Bus Number</label>
			<input type="text" id="busno" name="busno" placeholder="Enter your Bus Number"required>

			<label for="bustype">Bus Type</label>
		<select class="select" name="bustype">	
				<option class="mainoption"value="">Select Bus Type</option>
				<option class="option">Seater</option>
				<option class="option">Ac/Seater</option>
				<option class="option">Sleeper</option>
				<option class="option">Ac/Sleeper</option>
			</select>
		</br>
			

			<label for="busno">Bus Capacity</label>
			<input type="text" id="capacity" name="capacity" placeholder="Enter your Bus Capacity"required>

			<input class="btn" type="submit" name="save" value="Save">

		</form>
		<a href="viewbus.php" > <input class="btn" style="width:300px; margin-top:5px" type="submit" name="save1" value="Back"> </a>


	</div>
</selection>
	
</body>
</html>



