<?php

include('dbconn.php');
$remove=$_GET['n'];
$sql="DELETE FROM `visitors` WHERE ID=$remove";
mysqli_query($conn,$sql);


header('location:adminp.php');
?>
