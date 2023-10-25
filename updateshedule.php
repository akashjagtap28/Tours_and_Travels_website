<?php
  
  include "connection.php";

  $query_bus = "select bus_id from addbus";
$query_driver = "select driver_id from adddriver";
$query_route = "select route_id from addroute";


 $stmt_bus = mysqli_query($conn ,$query_bus);

 $stmt_driver = mysqli_query($conn ,$query_driver);

 $stmt_route = mysqli_query($conn ,$query_route);

 $rows_busid = mysqli_num_rows( $stmt_bus);
   // echo "There are " . $rows_busid . " rows in my table.";
	   
 $rows_driverid = mysqli_num_rows( $stmt_driver);

 $rows_routeid = mysqli_num_rows( $stmt_route);


  $id=$_GET['id'];
	
  $sql="SELECT * FROM shedulebus WHERE shedule_id='$id' ";

  $result=mysqli_query($conn ,$sql);

  $row=mysqli_fetch_assoc($result);

  $sheduleid = $row['shedule_id'];

  $busid = $row['bus_id'];

  $driverid = $row['driver_id'];

  $routeid  = $row['route_id'];

  $date = $row['date'];


  $otime  = $row['origin_time'];

  $dtime  = $row['destination_time'];

  $amount  = $row['amount'];

  if(isset($_POST['save'])){

	 $sheduleid=$_POST['sheduleid'];
 $busid=$_POST['busid'];
 $driverid=$_POST['driverid'];
 $routeid=$_POST['routeid'];
 $date=$_POST['date'];
 $otime=$_POST['otime'];
 $dtime=$_POST['dtime'];
 $amount=$_POST['amount'];
   
	$query = " update shedulebus set shedule_id= '$sheduleid' ,bus_id='$busid', driver_id='$driverid', route_id='$routeid',date='$date' , origin_time='$otime' ,destination_time='$dtime' , amount= '$amount'  WHERE shedule_id='$id' ";
	$result=mysqli_query($conn,$query);

	if($result){
        echo "update succufully";
		header('location:viewshedule.php');
	}else
	    echo "error";
  }

 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Add Schedule Page</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/addshedule.css">
</head>
<body>
	<selection class="saveform">
	<div class="save">
		<h1>Update Schedule</h1>
		<form action="" method="post">
			<label for="date">Schedule Id</label>
			<input type="text" id="sheduleid" name="sheduleid" class="sheduleid" placeholder="Add Shedule Id" value=<?php echo $sheduleid ?>>
			<label for="busid">Bus Id</label>
			<select  name="busid" id="busid" required>
                            <?php 
                  for($i=1;$i<=$rows_busid;$i++){
                    $row=mysqli_fetch_array($stmt_bus ,MYSQLI_ASSOC);
                ?>
                <option name = "busid" value="<?php echo $row['bus_id']?>"><?php echo $row['bus_id']?></option>
                 <?php      } ?>
                            </select>

			<label for="driverid">Driver Id</label>
			<select  name="driverid" id="driverid" required>
                            <?php 
                  for($i=1;$i<=$rows_driverid;$i++){
                    $row2=mysqli_fetch_array($stmt_driver ,MYSQLI_ASSOC);
                ?>
                <option name="driverid" value="<?php echo $row2['driver_id']?>"><?php echo $row2['driver_id']?></option>
                 <?php      } ?>
                            </select>

			<label for="routeid">Route Id</label>
			<select  name="routeid" id="routeid" required>
                            <?php 
                  for($i=1;$i<=$rows_routeid;$i++){
                    $row=mysqli_fetch_array($stmt_route ,MYSQLI_ASSOC);
                ?>
                <option name = "routeid" value="<?php echo $row['route_id']?>"><?php echo $row['route_id']?></option>
                 <?php      } ?>
                            </select>
			<label for="date">Date</label>
			<input type="date" id="date" name="date" class="dta" value=<?php echo $date ?>  required>

			<label for="time">Origin Time</label>
			<input type="Time" id="otime" name="otime" class="dta" value=<?php echo $otime ?> required>

      <label for="time">Destination Time</label>
			<input type="Time" id="dtime" name="dtime" class="dta" value=<?php echo $dtime ?> required>

			<label for="amount">Amount</label>
			<input type="amount" id="amount" name="amount" class="dta" placeholder="Enter Amount" value=<?php echo $amount ?> required>

			<input class="btn" type="submit" name="save" value="Update">
		</form>
    <a href="viewshedule.php" > <input class="btn" style="width:300px; margin-top:5px" type="submit" name="save1" value="Back"> </a>

	</div>
</selection>
	
</body>
</html>
