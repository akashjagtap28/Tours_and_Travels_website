<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Feedback Page</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/addfeedback.css">
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
	<selection class="saveform">
	<div class="save">
		<h1>FEEDBACK</h1>
		<form action="insertfeedback.php" method="post">
			<label for="bustype">Feedback Type</label>
			<select class="select" name="type">	
				<option class="mainoption"value="" >--Select--</option>
				<option class="option"value="Suggestions">Suggestions</option>
				<option class="option"value="Complaints">Complaints</option>
				<option class="option"value="Enquiry">Enquiry</option>
				<option class="option"value="Compliments">Compliments</option>
				<option class="option"value="Payment/Refunds">Payment/Refunds</option>
			</select>
		</br>
			<label for="busid">Your Name</label>
			<input type="text" id="name" name="name" placeholder="Enter your Name" required>

			<label for="busno">Description </label>
			<textarea id="description" name="description" rows="5" cols="50"> </textarea> 

			
			

			<!--<label for="busno">Bus Capacity</label>
			<input type="text" id="capacity" name="capacity" placeholder="  "required>-->
			
			<div class="rate">
				<h5> Rating :</h5>
				<input type="radio" id="star5" name="rate" value="5" class="star" />
				<label for="star5" title="text">5 stars</label>
				<input type="radio" id="star4" name="rate" value="4" class="star"/>
				<label for="star4" title="text">4 stars</label>
				<input type="radio" id="star3" name="rate" value="3" class="star"/>
				<label for="star3" title="text">3 stars</label>
				<input type="radio" id="star2" name="rate" value="2" class="star"/>
				<label for="star2" title="text">2 stars</label>
				<input type="radio" id="star1" name="rate" value="1" class="star"/>
				<label for="star1" title="text">1 star</label>
			  </div>

			<input class="btn" type="submit" name="save" value="Save">
		</form>
	</div>
</selection>
	

<!-- <div class="last">
  
    <div class="box">
      <h2 style="font-family:Times New Roman;">&nbsp;&nbsp;CONTACT</h2><br>
      <img src="images/location1.png" alt="#" height="20" width="20">&nbsp;&nbsp;Mangalmurti Travels,<br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Near by Bank of Maharashtra,<br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pimpode BK,Koregoan<br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Satara 415525. <br><br>
      <img src="images/phone.png" alt="#" height="20" width="20">&nbsp;&nbsp;9967854933<br><br>
      <img src="images/mail.png" alt="#" height="20" width="20"> &nbsp;&nbsp;mangalmurtitravel00@gmal.com
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
      <img src="images/fb.png" alt="#" height="40" width="40">
      <img src="images/twit.png" alt="#" height="40" width="40">
      <img src="images/youtube.png" alt="#" height="40" width="40">
      <img src="images/linked in.png" alt="#" height="40" width="40">
      <img src="images/insta.png" alt="#" height="40" width="40">
    </div>
  </div>
  
  
  <div class="footer">
    <h4 >@2023 All rights reserved.Manglmurti Travels Satara</h4>
  </div>
  footer coding end -->

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
   
</body>
</html>
