
<?php 

include "connection.php";

  if (isset($_POST['save'])) 
  {
    $opoint=$_POST['opoint'];
    $dpoint=$_POST['dpoint'];
    $odate=$_POST['odate'];
    
 
  }
    
$origin=$_POST["opoint"];
$destination=$_POST["dpoint"];
$odate=$_POST["odate"];


// Featching origin and Destination from database  

$query_oroute = "select DISTINCT o_point from addroute";

$query_droute = "select DISTINCT d_point from addroute";


 $stmt_oroute = mysqli_query($conn ,$query_oroute);

 $stmt_droute = mysqli_query($conn ,$query_droute);


 $rows_oroute= mysqli_num_rows( $stmt_oroute);

 $rows_droute= mysqli_num_rows( $stmt_droute);

    $sql = "SELECT * FROM addroute ";

     $result = $conn->query($sql);


?>
<?php

$sql1 = "SELECT * FROM addroute WHERE o_point='$origin' AND d_point='$destination'";
$result1=mysqli_query($conn , $sql1);

if ($result1->num_rows > 0) {

  while ($row = $result1->fetch_assoc()) {

    $final = $row['route_id']; 
       $o  = $row['o_point']; 
        $d = $row['d_point']; 

}
}
     
if($final){


$sql = "SELECT shedulebus.bus_id ,shedulebus.route_id , shedulebus.date , shedulebus.origin_time ,shedulebus.destination_time ,
               shedulebus.amount , addbus.bus_type FROM shedulebus INNER JOIN addbus on  shedulebus.bus_id=addbus.bus_id
               WHERE shedulebus.date= '$odate' AND shedulebus.route_id='$final' ";


$result = $conn->query($sql);


//$result1 = $conn->query($sql1);
/*

$query_book = "select booked_seats from mydemo where bus_id='$bid'";

$stmt_book = mysqli_query($conn ,$query_book);

$book_result = mysqli_fetch_assoc($stmt_book);

 $string_book = implode(" ",$book_result); 

$bookarr = preg_split ("/\,/", $string_book);

$uni=array_unique($bookarr);

$book_length= count($uni);   */

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Search Bus</title>
    <link rel="stylesheet" href="css/searchbus.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  </head>
  <body>
  <nav class="navbar navbar-expand-lg bg-body-tertiary navbar bg-dark border-bottom border-bottom-dark" data-bs-theme="dark">
  <div class="container-fluid">
   
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto pe-5 mb-2 mb-lg-0 ms fs-5">
        <li class="nav-item pe-3">
          <a class="nav-link active" aria-current="page" href="homepage.php">Home</a>
        </li>
        <li class="nav-item pe-3">
          <a class="nav-link" href="gallary.php">Gallery</a>
        </li>
        
        <li class="nav-item pe-3">
          <a class="nav-link "  href="about.php" >About us</a>
        </li>
        
        <li class="nav-item pe-3">
          <a class="nav-link" href="booking.php">Manage Ticket</a>
        </li>

        <li class="nav-item pe-3">
          <a class="nav-link "  href="contact.php">Contact</a>
        </li>
        <li class="nav-item pe-3">
          <a class="nav-link "  href="admin_login.php">Admin</a>
        </li>
        <li class="nav-item">
          <a class="nav-link "  href="addfeedback.php">Feedback</a>
        </li>
      </ul>
      
    </div>
  </div>
</nav>
<img src="logo.png" height="220" width="220" style="position: absolute;left: 0px; bottom:535px">
<div class="row" style="background-image: url('https://s3.rdbuz.com/web/images/homeV2/HomeBannerImg.svg');height:400px; ">


<form  class="frm1"  action=" " method="post" style=" padding-top:150px; text-align:center;">
           
<b>    Origin : &nbsp; </b>

            <select  name="opoint" id="opoint" style=" width: 200px;height: 25px;"required>
            <option selected="selected" value="<?php echo $_POST["opoint"] ?>"><?php echo $_POST["opoint"] ?></option>
              <?php 
                   for($i=1;$i<=$rows_oroute;$i++)
                   {
                      $row=mysqli_fetch_array($stmt_oroute ,MYSQLI_ASSOC);
               ?>
            <option name = "opoint" value="<?php echo $row['o_point']?>"><?php echo $row['o_point']?></option>
               <?php     
               } ?>

              </select>&nbsp;&nbsp;&nbsp;
          
  
 <b> Destination : &nbsp;</b>
         
              
                <select  name="dpoint" id="dpoint" style=" width: 200px;height: 25px;" required>
                <option selected="selected" value="<?php echo $_POST["dpoint"] ?>"><?php echo $_POST["dpoint"] ?></option>
              <?php 
                   for($i=1;$i<=$rows_droute;$i++)
                   {
                      $row=mysqli_fetch_array($stmt_droute ,MYSQLI_ASSOC);
               ?>
            <option name = "dpoint" value="<?php echo $row['d_point']?>"><?php echo $row['d_point']?></option>
               <?php     
               } ?>

              </select>&nbsp;&nbsp;&nbsp;
            
<b>  Onward Date: &nbsp;</b>
            
            <input class=" pe-3" type="date" value="<?php echo $_POST["odate"] ?>" name="odate"    style=" width: 200px;height: 25px;"> <?php echo "\r\n" ?>&nbsp;&nbsp;
  
 <!-- <b> Return Date: &nbsp;</b>
            <input class=" pe-3" type="date" value="<//?php echo $_POST["rdate"] ?>" name="rdate"  style=" width: 200px;height:25px" >//<//?php echo "\r\n" ?>&nbsp;&nbsp; -->

            <input class=" pe-3" type="submit" class="btn btn-primary" id="Origin-destination" name="save"  value="Search" style="color:white; width:150px ; text-align:center; height:30px; background-color: rgb(70, 70, 243);" />
            
   
  
</form>
<div class="ani">
            <img src="ani.png" height="118" width="150">
          </div>
        <div class="col-sm-1"></div>
</div>

<div class = "table">
                <table class="list" id="List">
                    <thead>
                        <tr>
                            <th> Bus Route</th>
                            <th> Bus Type</th>
                            <th> Date </th>
                            <th> Origin Time</th>
                            <th> Destination Time </th>
                            <th> Amount</th>
                            <th> Available Seats</th>
                            <th> View Seats</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php

  
if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {

?>

        <tr>

        <td><?php echo $rid= $row['route_id']; ?></td>

        <td><?php echo $row['bus_type']; ?></td>

        <td><?php echo $da=$row['date']; ?></td>

        <td><?php echo $row['origin_time']; ?></td>

        <td><?php echo $row['destination_time']; ?></td>

        <td><?php echo $amt=$row['amount']; ?></td>

        <td><?php $bid=$row['bus_id'];

           $query_book = "select booked_seats from seatbooking where bus_id='$bid' AND date='$da' ";

           $stmt_book = mysqli_query($conn ,$query_book);

           $book_result = mysqli_fetch_assoc($stmt_book);
         if($book_result)
          {
                // $string_book = implode(" ", $book_result); 

                // $bookarr = preg_split ("/\,/", $string_book);

                // $uni=array_unique($bookarr);

                // $book_length= count($uni);

                 $uarry= implode(",", array_filter($book_result));

                 $book_arr = preg_split ("/\,/", $uarry); 

                 $uarry1= implode(",", array_filter($book_arr));

                 $book_arr1 = preg_split ("/\,/", $uarry1); 
            
                 $uni=array_unique($book_arr1);
           
                 $book_length=count($uni); 

               $sql1 = "select capacity from seatbooking where bus_id='$bid'";
               $result1=mysqli_query($conn , $sql1);

           if ($result1->num_rows > 0) 
            {

                  while ($row = $result1->fetch_assoc())
                   {

                      $capa = $row['capacity']; 

                      //echo $capa-$book_length;

                   }
                   echo $capa-$book_length;
            }
          }
          else echo "45";
       ?></td>

        <td>
               <a  href="seatbooking.php?id=<?php echo $rid; ?> & busid=<?php echo $bid; ?> & date=<?php echo $da; ?> & amount=<?php echo $amt; ?>"><button class="btnupdate" style=" background-color: #3B71CA; color:white;">view Seats</button></a>
        </td>

        </tr>                       



<?php   
    }

}

else {
 ?> 
   </tbody>
   </table>
      <tr>
        <?php echo "<h1 style=color:red; margin-left:150px;>BUS IS NOT AVAILABLE ON THIS DAY .... </h1>" ?>

     </tr> 
   <?php
           }
   }
?>  
                                    
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>
