<?php

 include("dbconn.php");
 require '../PHPMailer\PHPMailer.php';
 require '../PHPMailer\SMTP.php';
 require '../PHPMailer\Exception.php';
	
	$id=$_GET['n'];
	$sqlselect = "select * from visitors where `ID`=$id";
$resultselect=mysqli_query($conn,$sqlselect);
$visitor = mysqli_fetch_assoc($resultselect);
$name = $visitor['Name'];
 $concernp = $visitor['Concern_Person'];
 $date = $visitor['Visit_Date'];
 $vtime = $visitor['Visit_Time'];
 $email = $visitor['Email_ID'];
 // $name= ucwords($user['Name']);
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
	$mail->Subject = "APPROVAL EMAIL";
	$mail->Body = "Dear $name,<br>
	   Your request has been approved succesfully.<br>Pleased to inform you that your meeting with $concernp has been schedule as follows:<br>Day/Date: $date<br>Time: $vtime.<br>Please carry the print of this Email. Thank You.";
	$mail->AddAddress("$email");
	$mail->addAttachment("gatepass.jpg");

	
	if(!$mail->Send()) {
				$mail->ErrorInfo;

		echo "not send";
	} else {
$query = "UPDATE visitors SET Status='Approved' where `ID`=$id" ;
	mysqli_query($conn,$query);	
// echo "sent";
			    echo "<script>alert('Appointment scheduled');window.close();</script>";

}
  
  // session_destroy();

?>