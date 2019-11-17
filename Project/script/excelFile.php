<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<?php
	session_start();
			include('dbconn.php');

	$query = "SELECT * FROM visitors";
	$n=$_GET['n'];
	if($n==2){
			$concernp=$_SESSION['concernp'];
			$query .= " where Concern_Person = '$concernp'";

	}
	elseif($n==3){
		  $fdate = $_SESSION['fdate'];
 $tdate =$_SESSION['tdate'];

 $query .= " where Visit_Date >= '$fdate' and Visit_Date <= '$tdate'";
	}
	elseif($n==4){
		$status=$_SESSION['status'];
   $query .= " where Status = '$status'";
	
	}

	// $sql = "select * from visitors where 1";
		$result = mysqli_query($conn,$query);
		$filename = "Visitor_Tracking";
		$flie_ext = "xls";

		header("Content-Type: application/xls");    
		header("Content-Disposition: attachment; filename=$filename.xls");  
		header("Pragma: no-cache"); 
		header("Expires: 0");


		echo '<table border="1">';

		echo '<tr><th>ID</th><th>Name</th><th>Address</th><th>Gender</th><th>Email ID</th><th>Contact No</th><th>Concern Person</th><th>Visit Date</th><th>Visit Time</th><th>Leave Time</th><th>Organisation Name</th><th>Purpose</th><th>Status</th></tr>';

		while ($row = mysqli_fetch_assoc($result)) {
			echo "<tr><td>".$row['ID']."</td><td>".$row['Name']."</td><td>".$row['Address']."</td><td>".$row['Gender']."</td><td>".$row['Email_ID']."</td><td>".$row['Contact_No']."</td><td>".$row['Concern_Person']."</td><td>".$row['Visit_Date']."</td><td>".$row['Visit_Time']."</td><td>".$row['Leave_Time']."</td><td>".$row['Organisation_Name']."</td><td>".$row['Purpose']."</td><td>".$row['Status']."</td></tr>";
		}

		echo '</table>';
		?>

	</body>
	</html>