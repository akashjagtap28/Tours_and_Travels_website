<?php
session_start();
include "connection.php";
  
  $query_bus = "select bus_id from addbus";
  $stmt_bus = mysqli_query($conn ,$query_bus);
$rows_busid = mysqli_num_rows( $stmt_bus);



?>

<!DOCTYPE html>
<html>

<head>
    <title>
        dailyreport page
    </title>
    <!-- <link rel="stylesheet" href="dailyreport.css"> -->
    <link rel="stylesheet" href="css/demo1.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

</head>

<body>
    <div class="maindiv">
        <h1><center>Daily Report</center></h1>
	<hr>
   <form action="" method="post">
    
   <div class="top"> 
  <p style="margin-left: 600px; color:black;"> <?php echo "Please Select Date And Bus Id"; ?> </p>
  <a href="selecttype.php" class="btn btn-primary" style="margin-left: 20px; position:absolute; margin-left: 40px;">Back</a>

   <b><label for="Date" class="date">Date : </label></b>
    <input type="date" name="date" style="height: 25px;width: 120px;" />

   <b> <label for="origin" class="busid">Bus Id :</label></b>
   <select  name="busid" id="busid" required>
                            <?php 
                  for($i=1;$i<=$rows_busid;$i++){
                    $row=mysqli_fetch_array($stmt_bus ,MYSQLI_ASSOC);
                ?>
                <option name = "busid" value="<?php echo $row['bus_id']?>"><?php echo $row['bus_id']?></option>
                 <?php      } ?>
          
                </select>
     <div class="btns">

        <input type="submit" class="btn btn-primary" name="save"  value="Search" >
    
    <a href="dailyreport_print.php" class="btn btn-primary" style="margin-left: 400px;">Print</a>
     
</div>

       <!-- <a href="dailyreport_print.php"><input type="submit" class="btn1" class="btn btn-primary" value="Print" ></a> -->

    </div>
   
   </form>
    <!--<input type="button" class="btn btn-primary"value=" Search "style="margin-left: 10px;">-->
		<br/>
    
       
		<div class = "table">
                <table class="list" id="List">
                    <thead>
                        <tr>
                            <th>Customer Name</th>
                            <th>Bording Point</th>
                            <th>Droping Point</th>
                            <th>Seat No</th>
                            <th>Mobile No</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php

         if(isset($_POST['save'])){ 
            $_SESSION['busid']=$_POST['busid'];
            $_SESSION['date']=$_POST['date'];
 

                     $date=$_POST['date'];
                      $busid=$_POST['busid'];
    
                   $sql="SELECT * FROM payment where bus_id='$busid' and date='$date' ";
                   $result = $conn->query($sql);
    
    

                  if ($result->num_rows > 0) {

                   while ($row = $result->fetch_assoc()) {

                      ?>

                  <tr>

                    <td><?php echo $row['name']; ?></td>

                     <td><?php echo $row['boarding']; ?></td>

                    <td><?php echo $row['droping']; ?></td>

                    <td><?php echo $row['selected_seats']; ?></td>

                    <td><?php echo $row['mbno']; ?></td>

       
                    </tr>                       

            <?php                   }

          }
        }else {

        }
?>   
       

                    </tbody>
                </table>
              
        </div>

    </div>

	
</body>
</html>