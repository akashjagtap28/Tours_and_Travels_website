<?php

$connection = mysqli_connect("localhost:3306" , "root", "","busbooking");
if(!$connection){
  die("Eroor " .mysqli_connect_errno());

}
else

 if(isset($_GET['deleteid'])){
    $busid=$_GET['deleteid'];

    $sql= "delete from addbus where bus_id=$busid ";
    $result=mysqli_query($connection,$sql);
    if($result){

        echo "delete succefully";
        header('location:viewbus.php');
    }else
       echo "error";
 }
?>