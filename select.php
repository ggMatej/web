<?php  
session_start();
//select.php  
if(isset($_POST["training_id"]))
{
    require 'includes/dbh.inc.php';

 $output = '';
 $query = "SELECT * FROM trainings WHERE id = '".$_POST["training_id"]."'";
 $result = mysqli_query($conn, $query);
 $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">';
    while($row = mysqli_fetch_array($result))
    {
     $output .= '
     <tr>  
            <td width="30%"><label>Date</label></td>  
            <td width="70%">'.$row["date"].'</td>  
        </tr>
        <tr>  
            <td width="30%"><label>Address</label></td>  
            <td width="70%">'.$row["address"].'</td>  
        </tr>
        <tr>  
            <td width="30%"><label>Location</label></td>  
            <td width="70%">'.$row["location"].'</td>  
        </tr>
        
     ';
    }
    $output .= '</table></div>';
    echo $output;
}
?>