<?php
session_start();

if(isset($_SESSION['user'])){
 include("dbconn.php");
 # $query = "SELECT * FROM visitors order by 'ID' DESC ";
  $query = "SELECT * FROM visitors";
  $sort="";
if(isset($_POST['submit'])){
	$sort=$_POST['sort'];
	$_SESSION["sort"]=$sort;
}

if ($sort == 'visitdate')
{
  
    $query .= " ORDER BY Visit_Date DESC";
}
elseif ($sort == 'concernP')
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
}
else {
      header( 'location:login.php' );

}
?>





<!DOCTYPE html>
<html>
<head>
	<title></title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</head>
<body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<a class="navbar-brand active" href="#">AdminPanel</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarText">
  <ul class="navbar-nav mr-auto">
    <li class="nav-item">
      <a class="nav-link" href="form.php">Form <span class="sr-only">(current)</span></a>
    </li>
     <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Sort
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="visitdate.php">Visit Date</a>
          <a class="dropdown-item" href="Concernp.php">Concern Person</a>
          <a class="dropdown-item" href="status.php">Status</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Download
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="script/download.php">Whole</a>
          <a class="dropdown-item" href="script/vdownload.php">Visit Date</a>
          <a class="dropdown-item" href="script/cpdownload.php">Concern Person</a>
          <a class="dropdown-item" href="script/sdownload.php">Status</a>
        </div>
      </li>

  </ul>
    <a class="btn btn-solid btn-danger my-2 my-sm-0" href="logout.php" style="margin-left: 15px">Logout</a>
</div>

</nav>
    	<div class="container-fluid" style="padding-top: 30px ;">
     <div class="form-group">
     	<form id="myform" name="myform" method="POST">



</div><br>
 </form>
     <hr>


 <div class="row">
     <?php foreach ($visitors as $visitor): ?>
     	<div class="card" style="background-color: #fff; border-radius: 10px; margin-left:30px; margin-bottom: 20px; width: 30%;box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.3);">
     		<div class="card-body" >
     		<h4><?php echo $visitor['Name']; ?></h4>
     		<h5><?php echo $visitor['Visit_Date']; ?></h5>
     		<h5><?php echo $visitor['Visit_Time']; ?></h5>
     		<h5><?php echo $visitor['Concern_Person']; ?></h5>
     		<hr>
	     		<div class="row">
	     			<div class="col-md-8 shadow">

                <a type="button" class="btn btn-sm btn-primary" style="color:white;box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.3);"  data-toggle="modal" data-target="#MyModal<?php echo $visitor['ID']?>">Read More</a>

					</div>
					<div class="col-md-4">
						<a class="btn btn-danger btn-sm" style="box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.3);" href="deleteIndividual.php?n=<?php echo $visitor['ID'];?>"  >
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
             <strong>Email ID:</strong>  <?php echo $visitor['Email_ID']; ?><br>
              <strong>Mobile No.:</strong> <?php echo $visitor['Contact_No']; ?><br>
              <strong>Visit Date:</strong> <?php echo $visitor['Visit_Date']; ?><br>
              <strong>Visit Time:</strong> <?php echo $visitor['Visit_Time']; ?><br>
              <strong>Leave Time:</strong> <?php echo $visitor['Leave_Time']; ?><br>
              <strong>Concern Person:</strong> <?php echo $visitor['Concern_Person']; ?><br>
              <strong>Organisation Name:</strong> <?php echo $visitor['Organisation_Name']; ?><br>
              <strong>Purpose of Meet:</strong> <?php echo $visitor['Purpose']; ?><br>
              <strong>Status:</strong> <?php echo $visitor['Status']; ?><br>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
 </div>

		<?php endforeach ?>
</div>

	</div>

			<!-- Modal -->


    <!-- 	<script>
function change(){
    document.getElementById("myform").submit();
}
</script> -->
</body>
</html>
