<?php 

include "connection.php"; 

if (isset($_GET['id'])) {

    $shedule_id = $_GET['id'];

    $sql = "DELETE FROM `shedulebus` WHERE `shedule_id`='$shedule_id'";

     $result = $conn->query($sql);

     if ($result == TRUE) {

        echo "Record deleted successfully.";
        header('location:viewshedule.php');

    }else{

        echo "Error:" . $sql . "<br>" . $conn->error;

    }

} 

?>