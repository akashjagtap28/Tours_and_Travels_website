<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible"content="IE=edge">
	<meta name="viewport"content="width=device-width,initial-scale=1.0">
	<title>Dashboard</title>
	<link rel="stylesheet"href="css/dashboard1.css">
	<link rel="stylesheet"href="css/dashboard2.css">
</head>

<body>

	<!-- for header part -->
	<header>

		<div class="logosec">
			<div class="logo">MangalMurti Travls..</div>
			<img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210182541/Untitled-design-(30).png"
				class="icn menuicn"
				id="menuicn"
				alt="menu-icon">
		</div>

		

		<div class="message">
			
			<div class="dp">
			<img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210180014/profile-removebg-preview.png"
					class="dpicn"
					alt="dp">
			</div>
		</div>

	</header>

	<div class="main-container">
		<div class="navcontainer">
			<nav class="nav">
				<div class="nav-upper-options">
					<div class="nav-option option1">
						<img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210182148/Untitled-design-(29).png"
							class="nav-img"
							alt="dashboard">
						<h3> Dashboard</h3>
					</div>

					<a style="text-decoration: none;" href="viewbus.php">
					<div class="option2 nav-option">
						<img src="bus.png"class="nav-img"alt="bus">
						<h3> Bus</h3>
						
					</div></a>

					<a style="text-decoration: none;" href="viewdriver.php">
					<div class="nav-option option4">
						<img src="driver.png"class="nav-img"alt="driver">
						<h3> Driver</h3>
					</div></a>

					<a  style="text-decoration: none;"  href="viewroute.php">
					<div class="nav-option option3">
						<img src="destination.png"class="nav-img"alt="route">
						<h3> Route</h3>
					</div></a>

					
					<a  style="text-decoration: none;"  href="viewshedule.php">
					<div class="nav-option option3">
						<img src="schedule.png"class="nav-img"alt="route">
						<h3> Schedule</h3>
					</div></a>

					<a style="text-decoration: none;" href="selecttype.php">
					<div class="nav-option option5">
						<img src="view.png"class="nav-img"alt="reports">
						<h3> Reports</h3>
					</div></a>

					<a style="text-decoration: none;" href="viewfeedback.php">
					<div class="nav-option option6">
						<img src="feedback.png"class="nav-img"alt="Feedback">
						<h3> Feedback</h3>
					</div></a>
					
					<a style="text-decoration: none;" href="homepage.php">
					<div class="nav-option logout">
						<img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210183321/7.png"
							class="nav-img"
							alt="logout">
						<h3>Logout</h3>
					</div></a>

				</div>
			</nav>
		</div>
		<div class="main">
			<div class="box-container">
				<a style="text-decoration: none;" href="viewbus.php">
				<div class="box box1">
					<div class="text">
						<h1 class="topic-heading"></h1>
						<h1 class="topic">Bus</h1>
				      
					</div>

					<img src="bus.png"
						alt="Views">
				</div></a>

				<a style="text-decoration: none;" href="viewdriver.php">
				<div class="box box3">
					<div class="text">
						<h2 class="topic-heading"></h2>
						<h2 class="topic">Driver</h2>
					</div>
                    <img src="driver.png"
						alt="Views">
				</div></a>
              
				<a  style="text-decoration: none;"  href="viewroute.php">
					<div class="box box2">
					<div class="text">
						<h2 class="topic-heading"></h2>
						<h2 class="topic">Route</h2>
                    </div>
                    <img src="destination.png"
						alt="Views">
				</div></a>

				<a style="text-decoration: none;" href="viewshedule.php">
				<div class="box box3">
					<div class="text">
						<h2 class="topic-heading"></h2>
						<h2 class="topic">Schedule</h2>
					</div>
                    <img src="schedule.png"
						alt="Views">
				</div></a>

				<a style="text-decoration: none;" href="selecttype.php">
				<div class="box box4" style="background-color: #0E2954;">
					<div class="text">
						<h2 class="topic-heading"></h2>
						<h2 class="topic">View Reports</h2>
					</div>
                    <img src="view.png"
						alt="Views">
				</div></a>

				<a style="text-decoration: none;" href="viewfeedback.php">
				<div class="box box5" style="background-color: #0E2954;">
					<div class="text">
						<h2 class="topic-heading"></h2>
						<h2 class="topic">Feedback</h2>
					</div>
                    <img src="feedback.png"
						alt="feedback">
				</div></a>


				
			</div>

			
		</div>
	</div>

	<script src="./dashboard.js"></script>
</body>
</html>
