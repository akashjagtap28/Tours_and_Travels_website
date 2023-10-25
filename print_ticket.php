<?php
include "connection.php";

  if($_GET)
   {
     $acno=$_GET['acno'];
      $acno;
   }else
	echo "nooooooooooo";

// extract payment details where account no is entered by user

$query="select * from payment where account_no='$acno'";
$result=mysqli_query($conn,$query);
if($row=$result->fetch_assoc())
{
    $name=$row['name'];
    $tno=$row['ticket_no'];
    $mbno=$row['mbno'];
    $amount=$row['amount'];
    $selected_seats=$row['selected_seats'];
    $boarding=$row['boarding'];
    $droping=$row['droping'];
	$date=$row['date'];


}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>View My Ticket</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/print_ticket.css">
	<link rel="stylesheet" href="css/print_ticket1.css" media="print">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

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
			<input type="number" class="num" id="acno" name="acno" value="<?php echo $acno ?>" readonly>

            
			<label for="amount">Amount</label>
			<input type="number" style="margin-bottom: 10px;"  class="num" id="amount" name="amount" value="<?php echo $amount ?>"  readonly>
            <label for="seats">seat Numbers</label>
			<input type="text" style="margin-bottom: 10px;"  class="num" id="seats" name="seats[]" value="<?php echo $selected_seats ?>" readonly>
         
            
			<label for="boarding">Boarding Point</label>
			<input type="text" style="margin-bottom: 10px;"  class="num" id="boarding" name="boarding" value="<?php echo $boarding ?>" readonly>
            <label for="droping">Droping Point</label>
			<input type="text" style="margin-bottom: 10px;"  class="num" id="droping" name="droping" value="<?php echo $droping ?>" readonly>
         
			
            <button onclick="window.print();" class="btn btn-primary" style="margin:10px 20px; width:270px" id="print-btn">Print</button>

			<a href="addfeedback.php"
			class="button" style="background-color: #3d71ca;">Give Feedback</a>

           <a href="homepage.php"
              class="button" >EXIT</a>
		</form>
	</div>
</selection>


</body>

</html>