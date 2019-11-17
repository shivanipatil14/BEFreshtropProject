<?php

 include("dbconn.php");
 # $query = "SELECT * FROM visitors order by 'ID' DESC ";
  $query = "SELECT * FROM visitors";
  $sort="";
if(isset($_POST['submit'])){
	$sort=$_POST['sort'];
}

if ($sort == 'visitdate')
{
    $query .= " ORDER BY Visit_Date DESC";
}
elseif ($sort == 'consernP')
{
    $query .= " ORDER BY Concern_Person";
}
else 
{
    $query .= " order by 'ID' DESC";
}

 $result = mysqli_query($conn,$query);
 
 $visitors = mysqli_fetch_all($result,MYSQLI_ASSOC);
 $visitor = mysqli_fetch_assoc($result);

 mysqli_free_result($result);
 mysqli_close($conn);

?>
 




<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<!--     <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"> 
 --></head>
<body>
	<div class="container" style="padding-top: 30px">
     <h1 class="display-4 text-justify" >Visitor</h1>
     <hr><br>
     <div class="form-group">
     	<form id="myform" name="myform" method="POST">
     		<div class="row">
     		<div class="col-md-9">
     	<!-- <select class="form-control" name="sort" onchange="change()"> -->
     		     	<select class="form-control" name="sort">

                      <option>Sort by</option>
                      <option value="visitdate">Visit Date</option>
                      <option value="concernP">Concern Person</option>
                      </select></div>
                      <div class="col-md-3">
                      <input type="submit" name="submit" class="btn btn-success">
</div>  </div>   </div><br>
 </form>
     <hr>
     <?php foreach ($visitors as $visitor): ?> 
     	<div class="card" style="background-color: #BCBABE; border: round border-radius: 10px">
     		<div class="card-body">
     		<h4><?php echo $visitor['Name']; ?></h4>
     		<h5><?php echo $visitor['Visit_Date']; ?></h5>
     		<h5><?php echo $visitor['Visit_Time']; ?></h5>
     		<h5><?php echo $visitor['Concern_Person']; ?></h5>
     		<hr>
	     		<div class="row">
	     			<div class="col-md-10">
			     		 <!-- <a class="btn btn-primary"  href="exp.php?id=<?php echo $visitor['ID']; ?>"  > -->
                <p type="button" class="btn btn-sm" data-toggle="modal" data-target="#MyModal<?php echo $visitor['ID']?>">Profile</p>
						  Read More
						</a>
					</div>
					<div class="col-md-2">
						<a class="btn btn-danger"  href="deleteIndividual.php?n=<?php echo $visitor['ID'];?>"  >
						  Delete
						</a>
					</div>
				</div>
			</div>

     </div>
     	<br>
 <div class="modal fade" id="MyModal<?php echo $visitor['ID']?>" tabindex="-1" role="dialog" aria-labelledby="MyModal" aria-hidden="true">
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

		<?php endforeach ?>

		<footer class="page-footer text-center" style="padding-bottom: 50px; padding-top: 65px">
		<center><a class="btn btn-primary" href="excelFile.php">DOWNLOAD DATA</a>
						</center>
			</footer>			
	</div>

			<!-- Modal -->

			

	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
		<!-- 	<script>
function change(){
    document.getElementById("myform").submit();
}
</script> -->
</body>
</html>