
<?php 

include "connection.php";

$sql = "SELECT * FROM addroute";

$result = $conn->query($sql);

?>

 <!DOCTYPE html>
<html>

<head>
    <title>
        viewroute Page
    </title>
    <link rel="stylesheet" href="css/viewroute.css">
 
</head>

<body>
    <div class="maindiv">
        <h1><center>View Route</center></h1>
	<hr>
			
		<br/>
        <a href="dashboard.php"><input type="button" style=" background-color: #3B71CA;color: #ffffff;
	font-size: 15px;border-radius: 5px;border: none;padding: 7px; margin-left:55px" value="Back" ></a>
        <a href="demoroute.php"><input type="button" class="btn" value="Add Route" ></a>
		<div class = "table">
                <table class="list" id="List">
                    <thead>
                        <tr>
                            <th>Route Id</th>
                            <th>Origin Point</th>
                            <th>Destination Point</th>
                            <th>Bording Point</th>
                            <th>Droping Point</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php

                        if ($result->num_rows > 0) {

                             while ($row = $result->fetch_assoc()) {

                                      ?>

        <tr>

        <td><?php echo $row['route_id']; ?></td>

        <td><?php echo $row['o_point']; ?></td>

        <td><?php echo $row['d_point']; ?></td>

        <td><?php echo $row['b_points']; ?></td>

        <td><?php echo $row['d_points']; ?></td>

        <td>
        <a  href="updateroute.php?id=<?php echo $row['route_id']; ?>"><button class="btnupdate" style=" background-color: #3B71CA; color:white;">Update</button></a>
        <a href="deleteroute.php?id=<?php echo $row['route_id']; ?>"><button class="btnupdate" style=" background-color: red; color:white;">Delete</button></a>
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