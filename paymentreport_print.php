<?php

include "connection.php";
  session_start();
$tdate=$_SESSION['tdate'];
$fdate=$_SESSION['fdate'];

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
        <b>&nbsp;&nbsp;&nbsp;&nbsp; <?php echo "PAYMENT REPORT FROM : ".$fdate; ?> </b>&nbsp;&nbsp;
        <b> <?php echo "TO  : ".$tdate; ?> </b>
    
       
		<div class = "table">
                <table class="list" id="List">
                    <thead>
                        <tr>
                        <th>Customer Name</th>
                            <th>Mobile No</th>
                            <th>Date</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                $sql="SELECT * FROM payment where  date between '$fdate' and '$tdate' ";
                $result = $conn->query($sql); 
    
    

                  if ($result->num_rows > 0) {

                   while ($row = $result->fetch_assoc()) {

                      ?>

                  <tr>

                    <td><?php echo $row['name']; ?></td>

                     <td><?php echo $row['mbno']; ?></td>

                    <td><?php echo $row['date']; ?></td>

                    <td><?php echo $row['amount']; ?></td>

                    
       
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
        <a href="paymentreport.php"> <button class="btn btn-primary" style="margin-left:40px; position:absolute" id="print-btn">Back</button></a>

    </div>

	
</body>
</html>