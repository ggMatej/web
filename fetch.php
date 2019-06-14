<?php  
 //fetch.php  
 if(isset($_POST["training_id"]))  
 {  
      require 'includes/dbh.inc.php';
      $query = "SELECT * FROM trainings WHERE id = '".$_POST["training_id"]."'";  
      $result = mysqli_query($conn, $query);  
      $row = mysqli_fetch_array($result);  
      echo json_encode($row);  
 }  
 ?>