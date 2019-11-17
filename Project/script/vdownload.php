<?php 
session_start();
 include("dbconn.php");
  $query = "SELECT * FROM visitors";
  $sort="";
if(isset($_POST['submit'])){
  $fdate = $_POST['fdate'];
 $tdate = $_POST['tdate'];
$_SESSION['fdate']=$fdate;
$_SESSION['tdate']=$tdate;

 $query .= " where Visit_Date >= '$fdate' and Visit_Date <= '$tdate'";
 	

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
	<title>Download</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<a class="navbar-brand active" href="../adminP.php">AdminPanel</a>
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
						<a class="dropdown-item" href="../visitdate.php">Visit Date</a>
						<a class="dropdown-item" href="../concernp.php">Concern Person</a>
						<a class="dropdown-item" href="../status.php">Status</a>
					</div>
				</li>
							 <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Download
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="download.php">Whole</a>
          <a class="dropdown-item" href="#">Visit Date</a>
          <a class="dropdown-item" href="cpdownload.php">Concern Person</a>
          <a class="dropdown-item" href="sdownload.php">Status</a>
        </div>
      </li>

			</ul>
			
			    <a class="btn btn-solid btn-danger my-2 my-sm-0" href="../logout.php" style="margin-left: 15px">Logout</a>
		</div>

	</nav>

	<div class="container-fluid" style="padding-top: 30px ;">

		<div class="form-group">
     	<form id="myform" name="myform" method="POST">
     	<div class="row">
     		
          <div class="form-group col-md-3"></div>
          <div class="form-group col-md-3">
          <img src="../images/date.png" height="30px" width="30px" style="padding-right: 5px"><label>From Date</label>
          <input type="date" class="form-control" name="fdate">
          </div>
          <div class="form-group col-md-3">
          <img src="../images/date.png" height="30px" width="30px" style="padding-right: 5px"><label>To Date</label>
          <input type="date" class="form-control" name="tdate">
          </div>
        </div>
             <div class="form-group">
             <center><input type="submit" name="submit" class="btn btn-success"></center>
             </div> 
         


     		
     		   </div><br>
 </form>
     <hr>

		<table class="table table-bordered table-dark">
			<thead>
				<tr>
					<th>Name</th>
					<th>Address</th>
					<th>Email</th>
					<th>Contact</th>
					<th>Gender</th>
					<th>Organisation Name</th>
					<th>Visit Date</th>
					<th>Visit Time</th>
					<th>Leave Time</th>
					<th>Concern Person</th>
					<th>Purpose</th>
					<th>Status</th>




					<?php foreach($visitors as $visitor):?>
						<tr>
							<td><?php echo $visitor['Name']; ?></td>
							<td><?php echo  $visitor['Address']; ?></td>
							<td><?php echo  $visitor['Email_ID']; ?></td>
							<td><?php echo  $visitor['Contact_No']?></td>
							<td><?php echo  $visitor['Gender']; ?></td>

							<td><?php echo  $visitor['Organisation_Name']; ?></td>
							<td><?php echo  $visitor['Visit_Date']; ?></td>			
							<td><?php echo  $visitor['Visit_Time']; ?></td>							
							<td><?php echo  $visitor['Leave_Time']; ?></td>							
							<td><?php echo  $visitor['Concern_Person']; ?></td>							
							<td><?php echo  $visitor['Purpose']; ?></td>							
							<td><?php echo  $visitor['Status']; ?></td>							
							
						</tr>
					<?php endforeach;?>

				</tr>
			</thead>
		</table>
	</div>
</table> 
</div>
		<footer class="page-footer text-center" style="padding-bottom: 50px; padding-top: 65px">
		<center><a class="btn btn-primary" href="excelFile.php?n=3">DOWNLOAD DATA</a>
						</center>
			</footer>
</body>
</html>