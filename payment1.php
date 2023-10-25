<?php

session_start();

// we use session variables which pass from the seatbooking page 

 $id=$_SESSION['$id']."<br>";
 $bid=$_SESSION['$bid'];
 $date=$_SESSION['$date'];
 $cap=$_SESSION['$cap']."<br>";

if(isset($_POST['tamount']))
  $_SESSION['amount']=$_POST['tamount'];

?>
<?php 
include "connection.php";

if(isset($_POST['bpoints']))
$_SESSION['boarding']=$_POST['bpoints'];
if(isset($_POST['dpoints']))
$_SESSION['droping']=$_POST['dpoints'];



$seat=$_POST["seats"];

$allseats=implode("," ,$seat);
  $allseats;
 
$totalamt=$_SESSION['amount'];
$boarding=$_SESSION['boarding'];
$droping=$_SESSION['droping'];




if(isset($_POST['save']))

  {       

     $sql= "SELECT * FROM seatbooking WHERE bus_id='$bid'  AND date='$date' ";

     $result=mysqli_query($conn , $sql);

   // here we check if record is allredy exist in database or not for that bus
   // if record is available the update and add new seats into record

    if ($result->num_rows > 0) 
      {

             $query = " update seatbooking set booked_seats = concat (booked_seats , ',$allseats' )  WHERE bus_id='$bid' AND date='$date' ";
             $result=mysqli_query($conn,$query);

        if($result)
              {
          }else
                 echo "error";
      }

    // if record is not available for that bus then we insert the new record into database 
    else
         {
   
            $query="INSERT INTO seatbooking( bus_id, date,capacity, booked_seats) VALUES ( '$bid', '$date' ,'$cap','$allseats')";     

            $result=mysqli_query($conn,$query);

           if($result)
            {
               // after use here we distroy sesson variable 
                unset($_SESSION['amount']);
               
                session_destroy();
            } 
          }
         // echo $finaldate;
   }
   

  if(isset($_POST['save']))
    {
      $name=$_POST['name'];
	    $mbno=$_POST['mobno'];
	    $acno=$_POST['acno'];
	    $amount=$_POST['amount'];
	    $seats=$_POST['seats'];

  // insert payment details into payment table into database

     $sql="INSERT into payment(bus_id,name,mbno,account_no , date, amount ,selected_seats ,boarding,droping)
	      VALUES ('$bid','$name','$mbno','$acno','$date','$amount','$allseats' ,'$boarding','$droping')";

	  $res=mysqli_query($conn,$sql);
	  if($res)
    {
	      //	echo "payment inserted successss";
	  }

  // add total amount paid by user into admin account 

   $sql="update admin set balance=balance+$amount";
   $result=mysqli_query($conn,$sql);

   // minus the amount of payment from user account 

   $sql1="update user set balance=balance-$amount where account_no='$acno'";
   $result=mysqli_query($conn,$sql1);

  // after the payment is successfully done go to print ticket page 
  
    header("Location:print_ticket2.php?acno=".$acno);
    exit();
  }
  
  ?>
  <!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Payment</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
	<link rel="stylesheet" href="print_ticket.css">
	<link rel="stylesheet" href="print_ticket1.css" >
    <link rel="stylesheet" href="css/payment1.css" >

    
</head>
<body>

	<selection class="saveform">
	<div class="save">
		<h1><b>PAYMENT<hr></b></h1>
		<!-- <div class="row ">
			<img src="info.jpg" alt="info" class="" width="100%" height="100">
		</div> -->
		
		<form name="frm1" action=" " method="post">
			<div class="row pt-5">
				<div class="col-6">
                <label for="name">Name :</label>
			<input type="text" id="name" name="name" placeholder="Enter your name" required>

			<label for="mobno">Mobile No :</label>
			<input type="number" class="num" id="mobno" name="mobno" placeholder="Enter your mobno" required>

            <label for="seats">seat Numbers :</label>
			<input type="text"  class="num" id="seats" name="seats[]" value="<?php echo $allseats ?>" readonly>

            
			<label for="boarding">Boarding Point :</label>
			<input type="text"  class="num" id="boarding" name="boarding" value="<?php echo $boarding ?>" readonly>
         

			

				</div>
			<div class="col-6">
            <label for="acno">Account No :</label>
			<input type="number" class="num" id="acno" name="acno" placeholder="Enter your acno" required>
      
			<label for="date">Date :</label>
			<input type="text" class="num" id="date" name="date" value=" <?php echo $date ?>" readonly>

			<label for="amount">Amount :</label>
			<input type="number"  class="num" id="amount" name="amount" value="<?php echo $totalamt ?>" >
            
            
            <label for="droping">Droping Point :</label>
			<input type="text"  class="num" id="droping" name="droping" value="<?php echo $droping ?>" readonly>

			</div>
			</div>
            <input onclick="return confirm('Are you sure ? ');" class="btn btn-primary" type="submit" name="save"  value="Proccess payment" />
         
		</form>
    <a href="homepage.php">
            <input  class="btn btn-danger" style="width: 500px; height:50px;" type="submit" name="cancel"  value="Back" /></a>

	</div>
</selection>


</body>

</html>