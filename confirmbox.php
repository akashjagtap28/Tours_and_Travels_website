<?php 
   // if user click on cancle ticket button
if(isset($_POST['delete']))
{  
  $tno=$_POST['ticketno'];
  $mnbo=$_POST['mbno'];
  echo "helloooo";
}
  ?>
<!DOCTYPE html>
<html lang="en" >  
<head>  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="css/manage.css">
    <link rel="stylesheet" href="css/popup.css">
  <meta charset="UTF-8">  
  <title>Manage Booking 
 </title>  
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">  
</head>  
 
  
<body>  
    <nav class="navbar navbar-expand-lg bg-body-tertiary navbar bg-dark border-bottom border-bottom-dark" data-bs-theme="dark">
        <div class="container-fluid">
         
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto pe-5 mb-2 mb-lg-3 ms fs-5">
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
  
<div class="pt-5">  
  <div class="global-container">  
    
    <div class="card login-form">  
    <div class="card-body">  
        
        <div class="card-text">  
            <form action="" method="post">  
              <label style="font-size: 30px;margin-bottom: 40px;font-weight: bold;">Manage Booking</label>
                <div class="form-group">  
                    <label for="exampleInputTicketNo"> Enter Ticket No. </label>  
                    <input type="number" class="form-control form-control-sm"  name="ticketno" id="ticketno" required>  
                </div>  
                <div class="form-group">  
                    
                    <label for="exampleInputMobileNo">Enter Mobile No. </label>    
                    <input type="number" class="form-control form-control-sm" name="mbno" id="mobno" required>  
                </div>  
                
                
                <button type="submit" id="myButton" name="view" class="btn btn-primary btn-block"  > View Ticket </button>
                
               
                <button onclick="return confirm('Are you sure ? ');" type="submit" name="delete" class="btn btn-danger btn-block"> Cancel Ticket </button>
               
                
                
                
            </form>  
        </div>  
    </div>  
</div>  
</div>  

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
        <a href="contact.php">>> Contact</a><br>
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

 <!-- <script>
    function myfun(){
        if(confirm("You want to cancle ticket")==true){
            document.write("cancle success");
  
        }
    }
    </script>
-->

</body>  
</html>  
