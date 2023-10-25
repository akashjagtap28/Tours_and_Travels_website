<?php 

include "connection.php"; 

if (isset($_GET['id'])) {

    $driver_id = $_GET['id'];

    $sql = "DELETE FROM adddriver WHERE driver_id=$driver_id";

     $result = $conn->query($sql);

     if ($result == TRUE) {

        echo "Record deleted successfully.";
        header('location:viewdriver.php');

    }else{

        echo "Error:" . $sql . "<br>" . $conn->error;

    }

} 

?>