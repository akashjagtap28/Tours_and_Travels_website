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

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>View My Ticket</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <link rel="stylesheet" href="print_ticket.css">
  <link rel="stylesheet" href="css/payment1.css">
  <link rel="stylesheet" href="print_ticket1.css" media="print">
</head>
<body>

  <selection class="saveform">
  <div class="save">
      <h1><b>TICKET<hr></b></h1>
      <div class="row ">
          <img src="info.jpg" alt="info" class="" width="100%" height="100">
      </div>
      
      <form name="frm1" action=" " method="post">
          <div class="row pt-5">
              <div class="col-6">
                  <label for="ticketn">Ticket No : </label>
          <input type="text" id="ticketno" name="ticketno" value="<?php echo $tno ?>" readonly>

          <label for="na">Name :</label>
          <input type="text" id="name" name="name" value="<?php echo $name ?>" readonly>

          <label for="mobno">Mobile No :</label>
          <input type="number" class="num" id="mobno" name="mobno" value="<?php echo $mbno ?>" readonly>

          <label for="acno">Date :</label>
          <input type="text" class="num" id="acno" name="acno" value="<?php echo $date ?>" readonly>

              </div>
          <div class="col-6">
              <label for="amount">Amount :</label>
          <input type="number"  class="num" id="amount" name="amount" value="<?php echo $amount ?>"  readonly>
          <label for="seats">seat Numbers :</label>
          <input type="text"  class="num" id="seats" name="seats[]" value="<?php echo $selected_seats ?>" readonly>
       
          
          <label for="boarding">Boarding Point :</label>
          <input type="text"  class="num" id="boarding" name="boarding" value="<?php echo $boarding ?>" readonly>
          <label for="droping">Droping Point :</label>
          <input type="text"  class="num" id="droping" name="droping" value="<?php echo $droping ?>" readonly>

          </div>
          </div>
         
          <div class="row">
          <a href="booking.php"
               class="btn btn-primary" style="margin:20px; width:480px" id="print-btn">OK</a>
          </div>
      </form>
  </div>
</selection>

<?php } ?>
</body>

</html>