<?php
  include "connection.php";
 
 ?>
 <!DOCTYPE html>
<html>

<head>
    <title>
        viewbus Page
    </title>
    
    <link rel="stylesheet" href="css/viewbus.css">
 
</head>

<body>
    <div class="maindiv">
        <h1><center>View Bus</center></h1>
	<hr>
			
		<br/>
        <a href="dashboard.php"><input type="button" style=" background-color: #3B71CA;color: #ffffff;
	font-size: 15px;border-radius: 5px;border: none;padding: 7px; margin-left:55px" value="Back" ></a>
        <a href="addbus.php"><input type="button" class="btn" value="Add Bus" ></a>
		<div class = "table">
                <table class="list" id="List">
                    <thead>
                        <tr>
                            <th>Bus Id</th>
                            <th>Bus No</th>
                            <th>Bus Type</th>
                            <th>Capacity</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php 
                         $Query= "SELECT * FROM addbus";
                         $result=mysqli_query($conn , $Query);
                         if($result){
                           while( $row=mysqli_fetch_assoc($result)){
                            $busid= $row['bus_id'];
                            $busno= $row['bus_no'];
                            $bustype= $row['bus_type'];
                            $capacity= $row['capacity'];
                            echo '<tr>
                            <th scope="row"> '.$busid. ' </th>
                            <td> '.$busno.' </td>
                            <td> '.$bustype.' </td>
                            <td> '.$capacity.' </td>
                            <td>
                            <a href="updatebus.php? updateid='.$busid.'"><button class="btnupdate">Update</button></a>
                            <a href="deletebus.php? deleteid='.$busid.'"> <button class="btndelete">Delete</button></a>
                      </td>
                            </tr>';
                           }
                            
                         }
                      ?>

                      
                    </tbody>
                </table>
        </div>

    </div>

	
</body>
</html>