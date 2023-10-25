<?php
 include "connection.php" ;

if($_GET)
{
   $tno=$_GET['tno'];
echo $tno;
}else{
	echo "nooooooooooo";
}
$query="SELECT * FROM payment WHERE ticket_no='$tno'";
$result=mysqli_query($conn,$query);
if($result){
if($row=$result->fetch_assoc())
{
 	$name=$row['name'];
	$mbno=$row['mbno'];
	$account_no=$row['account_no'];
	$date=$row['date'];
	$amount=$row['amount'];
	$selected_seats=$row['selected_seats'];
	$boarding=$row['boarding'];
	$droping=$row['droping'];
}

?><!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>View My Ticket</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/viewmyticket.css">
</head>
<body>

	<selection class="saveform">
	<div class="save">
		<h1>TICKET</h1>
		<form name="frm1" action=" " method="post">
		<label for="ticketn">Ticket No </label>
			<input type="text" id="ticketno" name="ticketno" value="<?php echo $tno ?>" readonly>

			<label for="name">Name </label>
			<input type="text" id="name" name="name" value="<?php echo $name ?>" readonly>

			<label for="mobno">Mobile No</label>
			<input type="number" class="num" id="mobno" name="mobno" value="<?php echo $mbno ?>" readonly>

			<label for="acno">Account No</label>
			<input type="number" class="num" id="acno" name="acno" value="<?php echo $account_no ?>" readonly>

            
			<label for="amount">Amount</label>
			<input type="number" style="margin-bottom: 10px;"  class="num" id="amount" name="amount" value="<?php echo $amount ?>"  readonly>
            <label for="seats">Selected seats</label>
			<input type="text" style="margin-bottom: 10px;"  class="num" id="seats" name="seats[]" value="<?php echo $selected_seats ?>" readonly>
         
            
			<label for="boarding">Boarding Point</label>
			<input type="text" style="margin-bottom: 10px;"  class="num" id="boarding" name="boarding" value="<?php echo $boarding ?>" readonly>
            <label for="droping">Droping Point</label>
			<input type="text" style="margin-bottom: 10px;"  class="num" id="droping" name="droping" value="<?php echo $droping ?>" readonly>
         
           
           <a href="booking.php" style=" text-decoration: none ;">
		<h1 style="background-color: #3b71ca; color:white;">OK</h1></a>
		</form>
	</div>
</selection>
<?php } ?>

</body>

</html>