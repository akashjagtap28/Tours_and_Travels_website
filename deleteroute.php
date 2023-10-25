<?php 

include "connection.php"; 

if (isset($_GET['id'])) {

    $route_id = $_GET['id'];

    $sql = "DELETE FROM `addroute` WHERE `route_id`='$route_id'";

     $result = $conn->query($sql);

     if ($result == TRUE) {

        echo "Record deleted successfully.";
        header('location:viewroute.php');

    }else{

        echo "Error:" . $sql . "<br>" . $conn->error;

    }

} 

?>