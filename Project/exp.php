<?php

include("dbconn.php");

 $id = mysqli_real_escape_string($conn,$_GET['id']);
 $query = "SELECT * FROM visitors WHERE id = ".$id;
 $result = mysqli_query($conn,$query);
 
 $visitor = mysqli_fetch_assoc($result);

 mysqli_free_result($result);
 mysqli_close($conn);


?>



<!DOCTYPE html>
<html>
<head>
	<title></title>

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body>
 <div class="modal fade" id="MyModal" tabindex="-1" role="dialog" aria-labelledby="MyModal" aria-hidden="true">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content" style="background-color: #F1F3CE">
			      <div class="modal-header">
			        <h5 class="modal-title" id="MyModal"><?php echo $visitor['Name']; ?></h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body">
			      	Email ID: <?php echo $visitor['Email_ID']; ?><br>
			      	Mobile No.: <?php echo $visitor['Contact_No']; ?><br>
			        Visit Date: <?php echo $visitor['Visit_Date']; ?><br>
     				Visit Time: <?php echo $visitor['Visit_Time']; ?><br>
			      	Leave Time: <?php echo $visitor['Leave_Time']; ?><br>
     				Concern Person: <?php echo $visitor['Concern_Person']; ?><br>
			      	Organisation Name: <?php echo $visitor['Organisation_Name']; ?><br>
			 	 	Purpose of Meet: <?php echo $visitor['Purpose']; ?><br>
			 	 	Status: <?php echo $visitor['Status']; ?><br>
     				
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			      </div>
			    </div>
			  </div>
			
    	


     </div>




	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>
<script type="text/javascript">
    $(window).on('load',function(){
        $('#MyModal').modal('show');
    });
</script>