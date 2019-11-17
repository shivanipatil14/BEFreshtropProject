<?php 
	session_start();
	$name = $_SESSION['name'];
	$address = $_SESSION['address'];
	$email = $_SESSION['email'];
	$mobile = $_SESSION['mobile'];
	$org = $_SESSION['org'];
	$concernp = $_SESSION['concernp'];
	$purpose = $_SESSION['purpose'];
	$date = $_SESSION['date'];
	$vtime = $_SESSION['vtime'];
	$ltime = $_SESSION['ltime'];
	$gender = $_SESSION['gender'];
?>


<!DOCTYPE html>
<html lang="en">
<head>
	    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">


	<title>Testing</title>
</head>
<body>
		<div class="container" style="padding-top: 50px">
			<h1>HELLO <?php echo $name; ?></h1>
			<hr>
				
				<table class="table table-striped table-hover table-dark">
				<thead></thead>
					<tr>
						<th scope="row" style="padding-left:15px">Address</th>
						<td style="padding-left:30px"><?php echo $address; ?></td>
					</tr>
					<tr>
						<th class="row" style="padding-left:30px">Email</th>
						<td style="padding-left:30px"><?php echo $email; ?></td>
					</tr>
					<tr>
						<th class="row" style="padding-left:30px">Gender</th>
						<td style="padding-left:30px"><?php echo $gender; ?></td>
					</tr>
					<tr>
						<th class="row" style="padding-left:30px">Mobile</th>
						<td style="padding-left:30px"><?php echo $mobile; ?></td>
					</tr>
					<tr>
						<th class="row" style="padding-left:30px">Visit Date</th>
						<td style="padding-left:30px"><?php echo $date; ?></td>
					</tr>
					<tr>
						<th class="row" style="padding-left:30px">Visiting Time</th>
						<td style="padding-left:30px"><?php echo $vtime; ?></td>
					</tr>
					<tr>	
						<th class="row" style="padding-left:30px">Leaving Time</th>
						<td style="padding-left:30px"><?php echo $ltime; ?></td>
					</tr>
					<tr>
						<th class="row" style="padding-left:30px">Organisation</th>
						<td style="padding-left:30px"><?php echo $org; ?></td>
					</tr>
					<tr>
						<th class="row" style="padding-left:30px">Concern Person</th>
						<td style="padding-left:30px"><?php echo $concernp; ?></td>
					</tr>
					<tr>
						<th class="row" style="padding-left:30px">Purpose</th>
						<td style="padding-left:30px"><?php echo $purpose; ?></td>
					</tr>
					

				
			</table>

		</div>



	    <script src="js/bootstrap.min.js"></script>

</body>
</html>