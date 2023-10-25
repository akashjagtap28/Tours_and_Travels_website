<?php
  
  $servername = "localhost";

$username = "root"; 

$password = ""; 

$dbname = "busbooking"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {

    die("Connection failed: " . $conn->connect_error);

}

else {

  $sql = "SELECT * FROM signin";

  $result = mysqli_query($conn,$sql);

  if ($result->num_rows > 0) {

	while ($row = $result->fetch_assoc()) {

        $user= $row['username']; 
		$pass=$row['password'];
	
if(isset($_POST['submit']))
   {
	$username=$_POST['username'];
	$password=$_POST['password'];

 if ($username== $user && $password==$pass) {

      echo "login suucess";

}
else{
	echo "failed";
}

}
}
}


}
?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Login Page</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/admin_login.css">
</head>
<body>

	<selection class="loginform">

	<div class="login">
		<h1>Login</h1>
		<form action="" method="post">
			<label for="username">Username</label>
			<input type="text" id="username" name="username" placeholder="Enter your username" required>

			<label for="password">Password</label>
			<input type="password" id="password" name="password" placeholder="Enter your password"required>

			<input type="submit" class="btn"  name="submit" value="Login">
		</form>
		<a href="homepage.php">
			<input type="submit" style="background-color: #0d6efd; width:300px; height:fit-content;  margin-top:10px;" class="btn"  name="submit1" value="Back"></a>

	</div>
</selection>
	<!---<script src="admin_login.js"></script> -->
</body>
</html>