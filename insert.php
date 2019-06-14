<?php
session_start();
//insert.php  
if(!empty($_POST))
{
require 'includes/dbh.inc.php';
 $output = '';
    $date = mysqli_real_escape_string($conn, $_POST["date"]);  
    $address = mysqli_real_escape_string($conn, $_POST["address"]);  
    $location = mysqli_real_escape_string($conn, $_POST["location"]);  
    
    $query = "
    INSERT INTO trainings(date, address, location)  
     VALUES('$date', '$address', '$location')
    ";
    if(mysqli_query($conn, $query))
    {
     $output .= '<label class="text-success">Data Inserted</label>';
     $select_query = "SELECT * FROM trainings ORDER BY id DESC";
     $result = mysqli_query($conn, $select_query);
     $output .= '
      <table class="table table-bordered">  
                    <tr>  
                         <th width="70%">Employee Name</th>  
                         <th width="30%">View</th>  
                    </tr>

     ';
     while($row = mysqli_fetch_array($result))
     {
      $output .= '
       <tr>  
                         <td>' . $row["date"] . '</td>  
                         <td><input type="button" name="view" value="view" id="' . $row["id"] . '" class="btn btn-info btn-xs view_data" /></td>  
                    </tr>
      ';
     }
     $output .= '</table>';
    }
    echo $output;
}
?>