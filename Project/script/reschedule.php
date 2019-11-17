<?php 
 include 'dbconn.php';
 require '../PHPMailer\PHPMailer.php';
 require '../PHPMailer\SMTP.php';
 require '../PHPMailer\Exception.php';


if(isset($_POST['submit']))
{
$id=$_GET['n'];

$vdate=htmlspecialchars($_POST['date']);
$vtime=htmlspecialchars($_POST['vtime']);
$sql="update `visitors` set `Visit_Date`='$vdate',`Visit_Time`='$vtime',`Status`='Approved' where `ID`=$id";
if(mysqli_query($conn,$sql)){
	$sqlselect = "select * from visitors where `ID`=$id";
$resultselect=mysqli_query($conn,$sqlselect);
$visitor = mysqli_fetch_assoc($resultselect);
$name = $visitor['Name'];
 $concernp = $visitor['Concern_Person'];
 $date = htmlspecialchars($visitor['Visit_Date']);
 $vtime = htmlspecialchars($visitor['Visit_Time']);
 $email = $visitor['Email_ID'];

  $on = ucwords($visitor['Organisation_Name']);
 $vi = ucwords($visitor['Visit_Time']);
 $vd = ucwords($visitor['Visit_Date']);
 $contact = ucwords($visitor['Contact_No']);
 $cp = ucwords($visitor['Concern_Person']);


$our_image = imagecreatefromjpeg('../images/image1.jpg');
$white_color = imagecolorallocate($our_image, 0, 0, 0);
$font_path1 = '../fonts/FiraSans-Italic.ttf';
$font_path = '../fonts/FiraSans-Medium.ttf';

$size=30;
$size2=26;
$size3=20;
$angle=0;
$left1=500;
$top1=230;
$left2=500;
$top2=280;
$left3=600;
$top3=423;
$top4=475;
$top5=527;
$left4=100;
$top6=423;

imagettftext($our_image, $size2,$angle,$left2,$top2, $white_color, $font_path1, $on);
imagettftext($our_image, $size,$angle,$left1,$top1, $white_color, $font_path, $name);
imagettftext($our_image, $size3,$angle,$left3,$top3, $white_color, $font_path, $contact);
imagettftext($our_image, $size3,$angle,$left3,$top4, $white_color, $font_path, $vd);
imagettftext($our_image, $size3,$angle,$left3,$top5, $white_color, $font_path, $vi);
imagettftext($our_image, $size2,$angle,$left4,$top6, $white_color, $font_path, $cp);
imagejpeg($our_image,'gatepass.jpg');

  $mail = new PHPMailer\PHPMailer\PHPMailer();
	$mail->IsSMTP();

	$mail->SMTPDebug = 0;
	$mail->SMTPAuth = true;
	$mail->SMTPSecure = 'ssl';
	$mail->Host = "smtp.gmail.com";
	$mail->Port = 465;
	$mail->IsHTML(true);
	$mail->Username = "gatepassauto@gmail.com";
	$mail->Password = "gatepass@123";
	$mail->SetFrom("gatepassauto@gmail.com");
	$mail->Subject = "RESCHEDULING EMAIL";
	$mail->Body = "Dear $name,<br>
	   Due to some unavoidable work. $concernp regret to inform you that appointment is been rescheduled at<br>
	   $vdate, $vtime.<br> We apologize for the inconvenience caused.";
	$mail->AddAddress("$email");
  $mail->addAttachment("gatepass.jpg");

	if(!$mail->Send()) {
		
	} else {
		   header('location:reject.php');
	}
  

}

}
?>

<!DOCTYPE html>
<html>
<head>
	 <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> 
 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <title>Rescheduling Appointment</title>


</head>
<body onload="myPopUp()">
 <div class="modal fade" id="MyModal" tabindex="-1" role="dialog" aria-labelledby="MyModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content" style="background-color: #F1F3CE">
            <div class="modal-header">
              <h5 class="modal-title" id="MyModal"></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <form method="POST" action="">
			<div class="form-group">			
          <!-- <img src="images/date.png" height="30px" width="30px" style="padding-right: 5px"> -->
          <label>Visit Date</label>
          <input type="date" class="form-control" name="date">
          </div>
          <div class="form-group">
          <!-- <img src="images/time.png" height="30px" width="30px" style="padding-right: 5px"> -->
          <label>Visiting Time</label>
          <input type="time" class="form-control" name="vtime">
          </div>
         <input type="submit" name="submit" class="btn btn-success">
		</form>
            </div>
            <div class="modal-footer">
            </div>
          </div>
        </div>
 </div>
</body>
</html>

<script type="text/javascript">

            function myPopUp() {
              // alert("Page is loaded");
              $('#MyModal').modal('show');
            }
 
</script>
