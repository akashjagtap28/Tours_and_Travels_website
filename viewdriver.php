
<?php 

include "connection.php";

$sql = "SELECT * FROM adddriver";

$result = $conn->query($sql);

?>
 <!DOCTYPE html>
<html>

<head>
    <title>
        viewdriver Page
    </title>
    <link rel="stylesheet" href="css/viewdriver.css">
 
</head>

<body>
    <div class="maindiv">
        <h1><center>View Driver</center></h1>
	<hr>
			
		<br/>
        <a href="dashboard.php"><input type="button" style=" background-color: #3B71CA;color: #ffffff;
	font-size: 15px;border-radius: 5px;border: none;padding: 7px; margin-left:55px" value="Back" ></a>
        <a href="adddriver.php"><input type="button" class="btn" value="Add Driver" ></a>
		<div class = "table">
                <table class="list" id="List">
                    <thead>
                        <tr>
                            <th>Driver Id</th>
                            <th>Driver Name</th>
                            <th>Address</th>
                            <th>Contact No</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php

            if ($result->num_rows > 0) {

                while ($row = $result->fetch_assoc()) {

        ?>

                    <tr>

                    <td><?php echo $row['driver_id']; ?></td>

                    <td><?php echo $row['driver_name']; ?></td>

                    <td><?php echo $row['address']; ?></td>

                    <td><?php echo $row['contact']; ?></td>

                    <td>
                    <a  href="updatedriver.php?id=<?php echo $row['driver_id']; ?>"><button class="btnupdate" style=" background-color: #3B71CA; color:white;">Update</button></a>
                    <a href="deletedriver.php?id=<?php echo $row['driver_id']; ?>"><button class="btnupdate" style=" background-color: red; color:white;">Delete</button></a>
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