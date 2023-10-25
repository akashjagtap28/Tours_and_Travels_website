<?php
 include "connection.php";
 
 ?><!DOCTYPE html>

<html>

<head>
    <title>
        Feedback Page For Admin
    </title>
    <link rel="stylesheet" href="css/viewfeedback.css">
 
</head>

<body>
    <div class="maindiv">
        <h1><center>View Feedback</center></h1>
	<hr>
			
		<br/>
        <a href="dashboard.php"><input type="button" style=" background-color: #3B71CA;color: #ffffff;
	font-size: 15px;border-radius: 5px;border: none;padding: 7px; margin-left:55px" value="Back" ></a>
        <!-- <a href="addbus.html"><input type="button" class="btn" value="Add Bus" ></a> -->
		<div class = "table">
                <table class="list" id="List">
                    <thead>
                        <tr>
                            <th>Feedback Type</th>
                            <th>User Name</th>
                            <th>Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                         $Query= "SELECT * FROM feedback";
                         $result=mysqli_query($conn , $Query);
                         if($result){
                           while( $row=mysqli_fetch_assoc($result)){
                            $type= $row['feedback_type'];
                            $name= $row['name'];
                            $des= $row['discription'];
                            
                            echo '<tr>
                            <th scope="row"> '.$type. ' </th>
                            <td> '.$name.' </td>
                            <td> '.$des.' </td>
                           
            
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