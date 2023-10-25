<?php

include "connection.php";
  session_start();
$bid=$_SESSION['busid'];
$date=$_SESSION['date'];

?>

<!DOCTYPE html>
<html>

<head>
    <title>
        dailyreport page
    </title>
    <link rel="stylesheet" href="css/dailyreport.css">
    <link rel="stylesheet" href="css/printreport.css" media="print">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

</head>

<body>
  
    <!--<input type="button" class="btn btn-primary"value=" Search "style="margin-left: 10px;">-->
		<br/>
        <b> <?php echo "BUS ID IS : ".$bid; ?> </b><br>
        <b> <?php echo "DATE IS : ".$date; ?> </b>
    
       
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

    
                   $sql="SELECT * FROM payment where bus_id='$bid' and date='$date' ";
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

          session_destroy();
        
?>   
       

                    </tbody>
                </table>
                <div class="text-center">
                    <button onclick="window.print();" class="btn btn-primary" style="margin:30px 20px" id="print-btn">Print</button>


                </div>
        </div>
        <a href="dailyreport.php"> <button class="btn btn-primary" style="margin-left:40px; position:absolute" id="print-btn">Back</button></a>

    </div>


	
</body>
</html>