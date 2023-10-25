<?php
 $busid=$_POST['busid'];
 $busno=$_POST['busno'];
 $bustype=$_POST['bustype'];
 $capacity=$_POST['capacity'];

if( !empty($busid) || !empty($busno) || !empty($bustype) ||
 !empty($capacity)  ) {
    $connection = mysqli_connect("localhost:3306" , "root", "","busbooking");
    if(!$connection){
      die("Eroor " .mysqli_connect_errno());
  
    }
    else{
      
        $query = "INSERT INTO addbus (bus_id ,  bus_no , bus_type , capacity ) 
        values (?,?, ?,?)";

        $stmt = $connection ->prepare($query);
        $stmt ->bind_param("sssi" , $busid, $busno, $bustype ,$capacity);
        $stmt ->execute();

         header('location:viewbus.php');

        echo '<script type = "text/javascript"> alert("record inserted successful") </script> ';
           
    }

 }


?>
