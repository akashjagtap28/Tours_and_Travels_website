<?php

session_start();

// we use session variables which pass from the seatbooking page 

 $id=$_SESSION['$id']."<br>";
 $bid=$_SESSION['$bid'];
 $date=$_SESSION['$date']."<br>";
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
   }

  if(isset($_POST['save']))
    {
      $name=$_POST['name'];
	    $mbno=$_POST['mobno'];
	    $acno=$_POST['acno'];
	    $amount=$_POST['amount'];
	    $seats=$_POST['seats'];
      $date=$_POST['date'];
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
	<link rel="stylesheet" href="css/payment.css">
</head>
<body>

	<selection class="saveform">
	<div class="save">
		<h1>Payment</h1>
		<form name="frm1" action=" " method="post">
			<label for="name">Name </label>
			<input type="text" id="name" name="name" placeholder="Enter your name" required>

			<label for="mobno">Mobile No</label>
			<input type="number" class="num" id="mobno" name="mobno" placeholder="Enter your mobno" required>

			<label for="acno">Account No</label>
			<input type="number" class="num" id="acno" name="acno" placeholder="Enter your acno" required>

            
			<label for="amount">Amount</label>
			<input type="number" style="margin-bottom: 10px;"  class="num" id="amount" name="amount" value="<?php echo $totalamt ?>" readonly>
            <label for="seats">Selected seats</label>
			<input type="text" style="margin-bottom: 10px;"  class="num" id="seats" name="seats[]" value="<?php echo $allseats; ?>" readonly>
         
            
			<label for="boarding">Boarding Point</label>
			<input type="text" style="margin-bottom: 10px;"  class="num" id="boarding" name="boarding" value="<?php echo $boarding ?>" readonly>
            <label for="droping">Droping Point</label>
			<input type="text" style="margin-bottom: 10px;"  class="num" id="droping" name="droping" value="<?php echo $droping; ?>" readonly>
         
           <div class="">
            <img src="pay.jpg" class="img" height="80px" width="300px"/>
            
           </div>
           
			<input class="btn" type="submit" name="save"  value="Proccess payment" />
		</form>
	</div>
</selection>

</body>

</html>