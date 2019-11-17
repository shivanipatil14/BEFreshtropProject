    <link rel="stylesheet" href="css/bootstrap.min.css">



<?php

session_start();

 $_SESSION['name'] = $_POST['name'];
 $_SESSION['concernp'] = $_POST['concernp'];
 $_SESSION['date'] = $_POST['date'];
 $_SESSION['vtime'] = $_POST['vtime'];
 $_SESSION['email'] = $_POST['email'];
 include("dbconn.php");
 require 'PHPMailer\PHPMailer.php';
 require 'PHPMailer\SMTP.php';
 require 'PHPMailer\Exception.php';

  if(isset($_POST['submit']))
  {
     $name = htmlspecialchars($_POST['name']);
     $address = htmlspecialchars($_POST['address']);
     $email = htmlspecialchars($_POST['email']);
     $mobile = htmlspecialchars($_POST['mobile']);
     $gender = htmlspecialchars($_POST['gender']);
     $org = htmlspecialchars($_POST['org']);
     $date = htmlspecialchars($_POST['date']);
     $vtime = htmlspecialchars($_POST['vtime']);
     $ltime = htmlspecialchars($_POST['ltime']);
     $concernp = htmlspecialchars($_POST['concernp']);
     $purpose = htmlspecialchars($_POST['purpose']);
     $status = 'Pending';
     $admin = 'gatepassauto@gmail.com';
$str_arr = explode ("#", $concernp);

    

      $sql = "insert into visitors(Name,Address,Email_ID,Contact_No,Gender,Organisation_Name,Visit_Date,Visit_Time,Leave_Time,Concern_Person,Purpose,Status) values('$name','$address','$email','$mobile','$gender','$org','$date','$vtime','$ltime','$str_arr[0]','$purpose','$status')";
      
        if(mysqli_query($conn,$sql))
        {
          // echo "<script> alert('Successfully sent.')</script>";
$sqlselect = "select `ID` from visitors where `Contact_No`='$mobile' and `Concern_Person` ='$str_arr[0]'";
$resultselect=mysqli_query($conn,$sqlselect);
$visitor = mysqli_fetch_assoc($resultselect);

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
           $mail->Subject = "Request of Meeting";
           $mail->Body = '<html><body>';
           $mail->Body .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
          $mail->Body .= "<tr style='background: #eee;'><td><strong>Name:</strong> </td><td>" . strip_tags(ucwords($_POST['name'])) . "</td></tr>";
          $mail->Body .= "<tr><td><strong>Email:</strong> </td><td>" . strip_tags($_POST['email']) . "</td></tr>";
          $mail->Body .= "<tr><td><strong>Mobile No.:</strong> </td><td>" . strip_tags($_POST['mobile']) . "</td></tr>";
          $mail->Body .= "<tr><td><strong>Organisation Name:</strong> </td><td>" . strip_tags($_POST['org']) . "</td></tr>";
          $mail->Body .= "<tr><td><strong>Date of Visit:</strong> </td><td>" . $_POST['date'] . "</td></tr>";
          $mail->Body .= "<tr><td><strong>Visiting Time:</strong> </td><td>" . $_POST['vtime'] . "</td></tr>";
          $mail->Body .= "<tr><td><strong>Leaving Time:</strong> </td><td>" . $_POST['ltime'] . "</td></tr>";
          $mail->Body .= "<tr><td><strong>Concern Person:</strong> </td><td>" . $str_arr[0] . "</td></tr>";
          $mail->Body .= "<tr><td><strong>Purpose of Meet:</strong> </td><td>" . $_POST['purpose'] . "</td></tr>";
          $mail->Body .= "<tr><td><a href='localhost/Freshtrop/Project/script/success.php?n=$visitor[ID]'  style='background-color: #4CAF50;border: none;color: white; padding: 10px 15px;text-align: center;text-decoration: none;display: inline-block; font-size: 16px;' role='button'>ACCEPT</a></td>";
          $mail->Body .= "<td><a href='localhost/Freshtrop/Project/script/reschedule.php?n=$visitor[ID]' style='background-color: #f44336;border: none;color: white; padding: 10px 15px;text-align: center;text-decoration: none;display: inline-block; font-size: 16px;' role='button'>RESCHEDULE</a></td></tr>";

         $mail->AddAddress("$str_arr[1]");
         $mail->AddAddress("gatepassauto@gmail.com");         

         if(!$mail->Send()) {
          echo "<script> alert('Email not sent.');
                     header('location:form.php');
                     </script>";
          } else {
            echo "<script> alert('Successfully sent. You will receive an email.');
                     header('location:form.php');

            </script>";
          }


        }

       
         
   //   header('location:form.php');

    else
    {
      echo "<script>alert('FAILED')</script>";
    }
  }
?>

<script  type="text/javascript" src="js/jquery.js"></script>        
<script type="text/javascript" src="js/bootstrap.js"></script>



