<?php
  $connection = mysqli_connect("localhost:3306" , "root", "","project");
  if(!$connection){
    die("Eroor " .mysqli_connect_errno());

  }
  else
 
  $id = $_GET['updateid'];
  $sql="SELECT * FROM addbus WHERE bus_id='$id' ";
  $result=mysqli_query($connection,$sql);
  $row=mysqli_fetch_assoc($result);
  $busid= $row['bus_id'];
  $busno= $row['bus_no'];
  $bustype= $row['bus_type'];
  $capacity= $row['capacity'];

  if(isset($_POST['submit'])){
	$busid=$_POST['busid'];
	$busno=$_POST['busno'];
	$bustype=$_POST['bustype'];
	$capacity=$_POST['capacity'];
   
	$query = " update addbus set bus_id='$busid', bus_no='$busno' , bus_type='$bustype' , capacity=$capacity  WHERE bus_id='$id' ";
	$result=mysqli_query($connection,$query);
	if($result){
       // echo "update succufully";
		header('location:viewbus.php');
	}else
	    echo "error";
  }
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
		<h1>Update Bus</h1>
		<form   method="POST">
			<label for="busid">Bus Id</label>
			<input type="text" id="busid" name="busid" placeholder="Enter your bus id" value=<?php echo $busid ?> required>

			<label for="busno">Bus Number</label>
			<input type="text" id="busno" name="busno" placeholder="Enter your Bus Number" value=<?php echo $busno ?> required>

			<label for="bustype">Bus Type</label>
		<select class="select" name="bustype" >	
				<option class="mainoption" value=<?php echo $bustype ?>>Select Bus Type</option>
				<option class="option">Seater</option>
				<option class="option">Ac/Seater</option>
				<option class="option">Sleeper</option>
				<option class="option">Ac/Sleeper</option>
			</select>
		</br>
			

			<label for="busno">Bus Capacity</label>
			<input type="text" id="capacity" name="capacity" placeholder="Enter your Bus Capacity"required value=<?php echo $capacity ?>>

			<input class="btn" type="submit" name="submit" value="Update">

        
		</form>
		<a href="viewbus.php" > <input class="btn" style="width:300px; margin-top:5px" type="submit" name="save1" value="Back"> </a>

	</div>
</selection>
	
</body>
</html>



