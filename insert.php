<?php
  $connection = mysqli_connect("localhost:3306" , "root", "","busbooking");
  if(!$connection){
    die("Eroor " .mysqli_connect_errno());

  }
  else
  echo "connection established";
 echo "</br>";


$bpoints=$_POST["n"];
$routeid=$_POST["routeid"];
$opoint=$_POST["origin"];
$dpoint=$_POST["destination"];
$dpoints=$_POST["n1"];


if( !empty($routeid) || !empty($opoint) || !empty($dpoint) || !empty($bpoints) || !empty($dpoints) ) {
    $connection = mysqli_connect("localhost:3306" , "root", "","busbooking");
    if(!$connection){
      die("Eroor " .mysqli_connect_errno());
  
    }
    else{
      
        $insert = "INSERT INTO addroute (route_id , o_point, d_point , b_points , d_points  ) 
        values (?,?,?,?,?)";

        $stmt = $connection ->prepare($insert);
        $stmt ->bind_param("sssss" , $routeid , $opoint , $dpoint ,$bpoints, $dpoints);
        $stmt ->execute();
            header('location:viewroute.php');

        echo '<script type = "text/javascript"> alert("record inserted successful") </script> ';
           
    }

 }else{
    echo "All Fields Are Required";
    die();
 }


?>
