<?php


 $type=$_POST['type'];
 $name=$_POST['name'];
 $des=$_POST['description'];
 

if( !empty($type) || !empty($name) || !empty($des) ||
 !empty($capacity)  ) {
    $connection = mysqli_connect("localhost:3306" , "root", "","busbooking");
    if(!$connection){
      die("Eroor " .mysqli_connect_errno());
  
    }
    else{
      
        $query = "INSERT INTO feedback (feedback_type ,  name , discription  ) 
        values (?,?, ?)";

        $stmt = $connection ->prepare($query);
        $stmt ->bind_param("sss" , $type, $name, $des );
        $stmt ->execute();

         echo "successssss";
           
    }

 }


?>
