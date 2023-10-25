<?php

  include "connection.php";
 
  $id = $_GET['id'];

  $sql="SELECT * FROM addroute WHERE route_id='$id' ";

  $result=mysqli_query($conn,$sql);
  $row=mysqli_fetch_assoc($result);

  $routeid= $row['route_id'];

  $opoint= $row['o_point'];

  $dpoint= $row['d_point'];

  $bpoints= $row['b_points'];

  $dpoints= $row['d_points'];

  if(isset($_POST['save'])){

	  $bpoints=$_POST["n"];

      $routeid=$_POST["routeid"];

      $opoint=$_POST["origin"];

      $dpoint=$_POST["destination"];

      $dpoints=$_POST["n1"];
   
	$query = " update addroute set route_id='$routeid', o_point='$opoint' , d_point='$dpoint' , b_points= '$bpoints' , d_points='$dpoints'  WHERE route_id='$id' ";
	$result=mysqli_query($conn,$query);
	
	if($result){
        echo "update succufully";
		header('location:viewroute.php');
	}else
	    echo "error";
  }
 ?>
 <!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Add route Page</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/addroute.css">
</head>
<body>
	<selection class="saveform">
	<div class="save">
		<h1>Update Route</h1>
		<form   method="post">
			<label for="routeid">Route Id</label>
			<input type="text" id="routeid" name="routeid" placeholder="Enter Route id" value=<?php echo $routeid ?> required>

			<label for="origin"></label> Origin Point</label>
			<input type="text" id="origin" name="origin" placeholder="Enter origin" value=<?php echo $opoint ?> required>

			<label for="destination"> Destination Point</label>		
			<input type="text" id="destination" name="destination" placeholder="Enter Destination" value=<?php echo $dpoint ?> required>
			<label for="boarding"> Boarding Point</label>
			<input type="text" name="n" placeholder="1,2,3,4,5" value=<?php echo $bpoints ?>  />
            

			<label for="droping"> Droping Point</label>
			<input type="text" name="n1" placeholder="1,2,3,4,5" value=<?php echo $dpoints ?>  />
           



			<input class="btn" type="submit" value="Update" name="save">
		</form>
		<a href="viewroute.php" > <input class="btn" style="width:300px; margin-top:5px" type="submit" name="save1" value="Back"> </a>



	</div>
</selection>

	
</body>
</html>
