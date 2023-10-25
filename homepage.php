
<?php 

include "connection.php";

// Featching origin and Destination from database 

 $query_route = "select DISTINCT o_point from addroute";

 $query_route1 = "select DISTINCT d_point from addroute";

 $stmt_route = mysqli_query($conn ,$query_route);

 $stmt_route1 = mysqli_query($conn ,$query_route1);


 $rows_oroute = mysqli_num_rows( $stmt_route);

 $rows_droute = mysqli_num_rows( $stmt_route1);
 


  if (isset($_POST['save']))
   {

    $opoint=$_POST['opoint'];
    $dpoint=$_POST['dpoint'];
    $odate=$_POST['odate'];
    $rdate=$_POST['rdate'];
 

  }

?>
<?php

$sql = "SELECT shedulebus.bus_id ,shedulebus.route_id , shedulebus.date , shedulebus.origin_time ,shedulebus.destination_time ,
               shedulebus.amount , addbus.bus_type FROM shedulebus INNER JOIN addbus on  shedulebus.bus_id=addbus.bus_id";

$result = $conn->query($sql);
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HOME PAGE</title>
    <link rel="stylesheet" href="css/homepage.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  </head>
  <body>
  <nav class="navbar navbar-expand-lg bg-body-tertiary navbar bg-dark border-bottom border-bottom-dark" data-bs-theme="dark">
  <div class="container-fluid">
   
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto pe-5 mb-2 mb-lg-0 ms fs-5">
        <li class="nav-item pe-3">
          <a class="nav-link " aria-current="page" href="homepage.php">Home</a>
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

<div class="row">
  <img src="main03.jpg"height=470 width=700>        
</div>
<img src="logo.png" height="250" width="250" style="position: absolute;left: 0px; bottom:520px;">

<form  class="frm1"  action="searchbus.php" method="post" style=" padding-top:0px;">
           
        <b style="color:white;">   Origin : &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</b>
        <b style="color:white;"> Destination : &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</b>
        <b style="color:white;"> Onward Date: &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; </b>
        <!-- <b style="color:white;"> Return Date: &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</b><br> --><br>
            <select  name="opoint" id="opoint" style="margin-left:80px; width: 230px;height: 35px;margin-top:10px;"required>
           
              <?php 
                   for($i=1;$i<=$rows_oroute;$i++)
                   {
                      $row=mysqli_fetch_array($stmt_route ,MYSQLI_ASSOC);
               ?>
            <option name = "opoint" value="<?php echo $row['o_point']?>"><?php echo $row['o_point']?></option>
               <?php     
                  } 
               
               ?>

              </select>&emsp;&emsp;&emsp;&emsp;&emsp;
          
               <select  name="dpoint" id="dpoint" style=" width: 230px;height: 35px;margin-top:10px;" required>
              
              <?php 
                   for($i=1;$i<=$rows_droute;$i++)
                   {
                      $row=mysqli_fetch_array($stmt_route1 ,MYSQLI_ASSOC);
               ?>
            <option name = "dpoint" value="<?php echo $row['d_point']?>"><?php echo $row['d_point']?></option>
                  <?php     
                    } 
                    ?>

              </select>
              &emsp;&emsp;&emsp;&emsp;&emsp;
           
            <input class=" pe-3" type="date" name="odate" style=" width: 230px;height: 35px;margin-top:10px;"> <?php echo "\r\n" ?>
  
            &emsp;&emsp;&emsp;&emsp;&emsp;
            <!-- <input class=" pe-3" type="date"  name="rdate" style=" width: 230px;height:35px;margin-top:10px;" >&nbsp;&nbsp; -->

            <input class=" pe-3" type="submit" class="btn btn-primary" id="Origin-destination" name="save"  value="Search" style="color:white; width:150px ;margin-top:10px; text-align:center; height:30px; background-color: rgb(70, 70, 243);" />
 
  
</form>
<div class="back">
<div class="ani">
            <img src="ani.png" height="118" width="150">
          </div>
</div>
<div class="bottom2">

</div>
<!-- Facility div start here... -->
<div class="bottom">
  <div class="bag">

      <img src="run.jpg"height="360" width="350" >
  </div>
               <div class="first">
                <h2>01<h2>
                <img src="charging.png"width="90" height="90" style="margin-left:60px;" ><br>
                <label>CHARGING<BR> POINT</label>

               </div>
               <div class="second">
               <h2>02<h2>
                <img src="fire.png"width="90" height="90" style="margin-left:60px;" ><br>
                <label>FIRE<BR> EXTINGUISHER</label>

               </div>
               <div class="third">
               <h2>03<h2>
                <img src="exit.png"width="90" height="90" style="margin-left:60px;" ><br>
                <label>EMERGENCY<BR> EXIT</label>

               </div>
               <div class="forth">
               <h2>04<h2>
                <img src="traval.png"width="90" height="90" style="margin-left:60px;" ><br>
                <label>SAFE<BR> JOURNEY</label>
                
                </div><br>
               
</div>
<div class="bottom2">

</div>

<!-- footer starts from here-->

<div class="last">
  
  <div class="box">
    <h2 style="font-family:Times New Roman;">&nbsp;&nbsp;CONTACT</h2><br>
    <img src="location.png" alt="#" height="20" width="20">&nbsp;&nbsp;Manglemurti Travels,<br>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Near by Bank of Maharashtra,<br>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pimpode BK,Koregoan<br>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Satara 415525. <br><br>
    <img src="phone.png" alt="#" height="20" width="20">&nbsp;&nbsp;9967854933<br><br>
    <img src="mail.png" alt="#" height="20" width="20"> &nbsp;&nbsp;mangalmurtitravel00@gmail.com
  </div>

  <div class="box">
    <h2 style="font-family:Times New Roman;">QUICK LINKS</h2><br>
      <a href="homepage.php">>> Home</a><br>
      <a href="gallary.php">>> Gallery</a><br>
      <a href="about.php">>> About us</a><br>
      <a href="contact.php">>> Contact </a><br>
      <a href="addfeedback.php">>> Feedback</a>
    </h3>
  </div>
  <div class="box">
    <h2 style="font-family:Times New Roman;">FOLLOW US</h2>
    <img src="fb.png" alt="#" height="40" width="40">
    <img src="twit.png" alt="#" height="40" width="40">
    <img src="youtube.png" alt="#" height="40" width="40">
    <img src="linked in.png" alt="#" height="40" width="40">
    <img src="insta.png" alt="#" height="40" width="40">
  </div>
</div>


<div class="footer">
  <h4 >@2023 All rights reserved.Manglmurti Travels Satara</h4>
</div>
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>
