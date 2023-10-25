<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Add route Page</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/addroute.css">
</head>
<body>
	<selection class="saveform">
	<div class="save">
		<h1>Add Route</h1>
		<form action="insert.php"  method="post">
			<label for="routeid">Route Id</label>
			<input type="text" id="routeid" name="routeid" placeholder="Enter Route id" required>

			<label for="origin"></label> Origin Point</label>
			<input type="text" id="origin" name="origin" placeholder="Enter origin"required>

			<label for="destination"> Destination Point</label>		
			<input type="text" id="destination" name="destination" placeholder="Enter Destination"required>
			<label for="boarding"> Boarding Point</label>
			<input type="text" name="n" placeholder="1,2,3,4,5" />
            <?php
						
							if (empty($result)) $result=' result comes here' ;
							if(isset($_POST['save']))
	               				{
							$result=0;
							$n1=$_POST['n'];
							
                           
                              	echo "</br>";
                            echo "values separated by comma's are : ".$n1;
							echo "</br>";
							
							$n1arr=explode(',', $n1);
							echo "________________________";
							echo "</br>";
                            echo "array: " .$n1arr ;							
					echo "value after spliting comma separated values by variable in array is given below </br>";
					for ($i=0; $i <count($n1arr) ; $i++) 
					{ 
						echo "$n1arr[$i]". " | ";
					      }
				 	echo "</br>";
				 	  echo "________________________";
				 	  echo "</br>";
					       }  
                          	
		   	?>

			<label for="droping"> Droping Point</label>
			<input type="text" name="n1" placeholder="1,2,3,4,5" />
            <?php
						
							if (empty($result)) $result=' result comes here' ;
							if(isset($_POST['save']))
	               {
							$result=0;
							$n1=$_POST['n1'];
							
                           
                              	echo "</br>";
                            echo "values separated by comma's are : ".$n1;
							echo "</br>";
							
							$n1arr=explode(',', $n1);
							echo "________________________";
							echo "</br>";
                            echo "array: " .$n1arr ;							
					echo "value after spliting comma separated values by variable in array is given below </br>";
					for ($i=0; $i <count($n1arr) ; $i++) 
					{ 
						echo "$n1arr[$i]". " | ";
					      }
				 	echo "</br>";
				 	  echo "________________________";
				 	  echo "</br>";
					       }  
                          		
					
                

		   	?>



			<input class="btn" type="submit" value="Save"name="save">
		</form>

		<a href="viewroute.php" > <input class="btn" style="width:300px; margin-top:5px" type="submit" name="save1" value="Back"> </a>


	</div>
</selection>

	
</body>
</html>
