<?php 

include "connection.php";

$sql = "SELECT * FROM shedulebus";

$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html>

<head>
    <title>
        viewschedule Page
    </title>
    <link rel="stylesheet" href="css/viewshedule.css">
 
</head>

<body>
    <div class="maindiv">
        <h1><center>View Schedule Travel</center></h1>
	<hr>
			
		<br/>
        <a href="dashboard.php"><input type="button" style=" background-color: #3B71CA;color: #ffffff;
	font-size: 15px;border-radius: 5px;border: none;padding: 7px; margin-left:55px" value="Back" ></a>
        <a href="addshedule.php"><input type="button" class="btn" value="Add schedule" ></a>
		<div class = "table">
                <table class="list" id="List">
                    <thead>
                        <tr>
                            <th>Schedule Id</th>
                            <th>Bus Id</th>
                            <th>Driver Id</th>
                            <th>Route Id</th>
                            <th>Date</th>
                            <th>Origin Time</th>
                            <th>Destination Time</th>
                            <th>Amount</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php

if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {

?>

        <tr>

        <td><?php echo $row['shedule_id']; ?></td>

        <td><?php echo $row['bus_id']; ?></td>

        <td><?php echo $row['driver_id']; ?></td>

        <td><?php echo $row['route_id']; ?></td>

        <td><?php echo $row['date']; ?></td>

        <td><?php echo $row['origin_time']; ?></td>

        <td><?php echo $row['destination_time']; ?></td>

        <td><?php echo $row['amount']; ?></td>


        <td>
                    <a  href="updateshedule.php?id=<?php echo $row['shedule_id']; ?>"><button class="btnupdate" style=" background-color: #3B71CA; color:white;">Update</button></a>
                    <a href="deleteshedule.php?id=<?php echo $row['shedule_id']; ?>"><button class="btnupdate" style=" background-color: red; color:white;">Delete</button></a>
        </td>

        </tr>                       

<?php       }

}

?>  

                    </tbody>
                </table>
        </div>

    </div>

	
</body>
</html>