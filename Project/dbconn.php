<?php
$conn=mysqli_connect("localhost","root","","freshtrop")
or die(mysqli_connect_error());		// Check connection
	

if (mysqli_connect_errno())
		  {
		  echo "Failed to connect to MySQL: " . mysqli_connect_error();
		  }
?>