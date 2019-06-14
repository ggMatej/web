<?php
    require "header.php";
    require 'includes/dbh.inc.php';
    $query = "SELECT * FROM trainings ORDER BY date DESC";
    $result = mysqli_query($conn, $query);
?>

<main>
<div class="container" style="width:700px;">  
   <h3 align="center">Training calendar</h3>  
   <br />  
   <div class="table-responsive">
    <div align="center">
     <button type="button" name="age" id="age" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-warning">Add</button>
    </div>
    <br />
    <div id="training_table">
     <table class="table table-bordered">
      <tr>
       <th width="70%">Date</th>  
       <th width="30%">View</th>
      </tr>
      <?php
      while($row = mysqli_fetch_array($result))
      {
      ?>
      <tr>
       <td><?php echo $row["date"]; ?></td>
       <td><input type="button" name="view" value="view" id="<?php echo $row["id"]; ?>" class="btn btn-info btn-xs view_data" /></td>
      </tr>
      <?php
      }
      ?>
     </table>
    </div>
   </div>  
  </div>
</main>

<div id="add_data_Modal" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
   <h4 class="modal-title">Add training</h4>
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    
   </div>
   <div class="modal-body">
    <form method="post" id="insert_form">
     <label>Enter date</label>
     <input type="date" name="date" id="date" class="form-control" />
     <br />
     <label>Enter adress</label>
     <textarea name="address" id="address" class="form-control"></textarea>
     <br />
     <label>Select location</label>
     <select name="location" id="location" class="form-control">
      <option value="Osijek">Osijek</option>  
      <option value="Viškovci">Viškovci</option>
      <option value="Požega">Požega</option>
      <option value="Pakrac">Pakrac</option>
     </select>
     <br />  
     <br />
     <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-success" />

    </form>
   </div>
   <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
   </div>
  </div>
 </div>
</div>

<div id="dataModal" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
   <h4 class="modal-title">Training Details</h4>
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    
   </div>
   <div class="modal-body" id="training_detail">
    
   </div>
   <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
   </div>
  </div>
 </div>
</div>

<script>  
$(document).ready(function(){
 $('#insert_form').on("submit", function(event){  
  event.preventDefault();  
  if($('#date').val() == "")  
  {  
   alert("Date is required");  
  }  
  else if($('#address').val() == '')  
  {  
   alert("Address is required");  
  }  
  else  
  {  
   $.ajax({  
    url:"insert.php",  
    method:"POST",  
    data:$('#insert_form').serialize(),  
    beforeSend:function(){  
     $('#insert').val("Inserting");  
    },  
    success:function(data){  
     $('#insert_form')[0].reset();  
     $('#add_data_Modal').modal('hide');  
     $('#training_table').html(data);  
    }  
   });  
  }  
 });




 $(document).on('click', '.view_data', function(){
  //$('#dataModal').modal();
  var training_id = $(this).attr("id");
  $.ajax({
   url:"select.php",
   method:"POST",
   data:{training_id:training_id},
   success:function(data){
    $('#training_detail').html(data);
    $('#dataModal').modal('show');
   }
  });
 });
});  
 </script>