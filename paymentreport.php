<?php
session_start();
include "connection.php";
  

?>

<!DOCTYPE html>
<html>

<head>
    <title>
      patment report page
    </title>
    <link rel="stylesheet" href="css/demo1.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

</head>

<body>
    <div class="maindiv">
        <h1><center>Payment Report</center></h1>
	<hr>
   <form action="" method="post">
   <div class="top"> 

 <p style="margin-left: 600px; color:black;"> <?php echo "Please choose Date "; ?> </p>
 <a href="selecttype.php" class="btn btn-primary" style="margin-left: 20px; position:absolute; margin-left: 40px;">Back</a>

   <b><label for="Date" class="date">FROM : </label></b>
    <input type="date" name="fdate" style="height: 25px;width: 120px;" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <b><label for="Date" >TO : </label></b>
    <input type="date" name="tdate" style="height: 25px;width: 120px;" />

   <div class="btns">
     <input type="submit" class="btn btn-primary" name="save"  value="Search" >
    
    <a href="paymentreport_print.php" class="btn btn-primary" style="margin-left: 400px;">Print</a>
              
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
                            <th>Mobile No</th>
                            <th>Date</th>
                            <th>Amount</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                    <?php

         if(isset($_POST['save'])){ 
            $_SESSION['tdate']=$_POST['tdate'];
            $_SESSION['fdate']=$_POST['fdate'];
 

                     $fdate=$_POST['fdate'];
                      $tdate=$_POST['tdate'];
    
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
        }else {

        }
?>   
       

                    </tbody>
                </table>
              
        </div>

    </div>

	
</body>
</html>