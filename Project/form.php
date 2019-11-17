

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link rel="stylesheet" href="css/bootstrap.min.css"> -->
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


    <title>Freshtrop</title>
    <!-- <script src="js/bootstrap.min.js"></script> -->
        <!-- <script src="js/collapse.js"></script> -->

  </head>
  <body>
    <div class="jumbotron" style="height: 250px;">
      <div class="row">
        <div class="col-md-3">
        <!-- <img src="images/logo.png" class="float-left" position="fixed"> -->
        </div>
        <div class="col-md-6 text-center">
      <h1 class="display-4" style="margin-top: -20px;">Hello, Visitor!</h1>
      <p class="lead">Need an Appointment of our Employer?</p>
      <hr>
      <p>Kindly fill up the following form. We will let you know shortly.</p>
         </div>
         <div class="col-md-3"></div>
      </div>
    </div>

    <div class="container">
      <form method="POST" action="emailsent.php">
      <div class="row">  
        <div class="form-group col-md-6">
          <img src="images/user.png" height="20px" width="20px" style="padding-right: 5px"><label style="font-size: 14px; color: grey; font-family: Arial, Helvetica, sans-serif";>Name*</label>
          <input type="text" class="form-control" name="name" value="<?php echo isset($_POST['name']) ? $name : ''; ?>">
        </div>
        <div class="form-group col-md-6">
          <img src="images/mail.png" height="20px" width="20px" style="padding-right: 5px"><label style="font-size: 14px; color: grey; font-family: Arial, Helvetica, sans-serif";>Email ID*</label>
          <input type="email" class="form-control" name="email" value="<?php echo isset($_POST['email']) ? $email : '' ; ?>">
        </div>
      </div>
         <div class="form-group">
          <img src="images/address.png" height="20px" width="20px" style="padding-right: 5px"><label style="font-size: 14px; color: grey; font-family: Arial, Helvetica, sans-serif";>Address*</label>
          <input type="text" class="form-control" name="address" value="<?php echo isset($_POST['address']) ? $address : '' ; ?>">
        </div>
        <div class="row">
          <div class="form-group col-md-6">
          <img src="images/mobile.png" height="20px" width="20px" style="padding-right: 5px" max-length=10><label style="font-size: 14px; color: grey; font-family: Arial, Helvetica, sans-serif";>Contact Number*</label>
            <input type="text" class="form-control" name="mobile" minlength="10 " maxlength="10" value="<?php echo isset($_POST['mobile']) ? $mobile : '' ; ?>">
          </div>
          <div class="form-group col-md-6">
            <img src="images/gender.png" height="20px" width="20px" style="padding-right: 5px"><label style="font-size: 14px; color: grey; font-family: Arial, Helvetica, sans-serif";>Gender*</label><br>
             <select class="form-control" name="gender">
                      <option>Select</option>
                      <option value="Male">Male</option>
                      <option value="Female">Female</option>
                       <option value="Other">Other</option>
                     </select>
                   </div>
        </div>
        <div class="row">
        <div class="form-group col-md-6">
          <img src="images/org.png" height="20px" width="20px" style="padding-right: 5px"><label style="font-size: 14px; color: grey; font-family: Arial, Helvetica, sans-serif";>Organisation Name*</label>
          <input type="text" class="form-control" name="org" value="<?php echo isset($_POST['org']) ? $org : '' ; ?>">
        </div>
        <div class="form-group col-md-6">
                   <img src="images/user.png" height="20px" width="20px" style="padding-right: 5px; padding-bottom: 5px" > <label for="exampleFormControlSelect1" style="font-size: 14px; color: grey; font-family: Arial, Helvetica, sans-serif";>Concerned Person*</label>
                    <select class="form-control" name="concernp">
                      <option>Select</option>
                      <option value="Sachin Shejul#sachin09shejul@gmail.com">Sachin Shejul</option>
                      <option value="Aniket Kulkarni#kulkarnianiket14@gmail.com">Aniket Kulkarni</option>
                       <option value="Shivani Patil#patil.shivani235@gmail.com">Shivani Patil</option>
                      <option value="Pradnya Gite#pradnyagite98@gmail.com">Pradnya Gite</option>
                      <option value="Sanket Ingale#sanket.ingale1998@gmail.com">Sanket Ingale</option>
                      <option value="Ruchika Shelke#ruchikashelke6475@gmail.com">Ruchika Shelke</option>
                      <option value="Varsha Ajith#varsha469@gmail.com">Varsha Ajith</option>
                    </select>
          </div>
        </div>
        <div class="row">
          <div class="form-group col-md-4">
          <img src="images/date.png" height="20px" width="20px" style="padding-right: 5px"><label style="font-size: 14px; color: grey; font-family: Arial, Helvetica, sans-serif";>Visit Date*</label>
          <input type="date" class="form-control" name="date">
          </div>
          <div class="form-group col-md-4">
          <img src="images/time.png" height="20px" width="20px" style="padding-right: 5px"><label style="font-size: 14px; color: grey; font-family: Arial, Helvetica, sans-serif";>Visiting Time*</label>
          <input type="time" class="form-control" name="vtime">
          </div>
          <div class="form-group col-md-4">
          <img src="images/duration.png" height="20px" width="20px" style="padding-right: 5px"><label style="font-size: 14px; color: grey; font-family: Arial, Helvetica, sans-serif";>Leaving Time*</label>
          <input type="time" class="form-control" name="ltime">
          </div>
        </div>
        <div class="row">
          
          <div class="form-group col-md-12">
            <img src="images/purpose.png" height="20px" width="20px" style="padding-right: 5px"><label style="font-size: 14px; color: grey; font-family: Arial, Helvetica, sans-serif">Purpose of Meeting*</label>
            <textarea class="form-control" rows="3" name="purpose"><?php echo isset($_POST['purpose']) ? $purpose : '' ; ?></textarea>
          </div>
        </div><br>
          <div class="row">
            <div class="form-group col-md-10">
              <input type="submit" class="btn btn-success" style="width: 100px; background-color: rgb(160, 206, 78);border-color: rgb(160, 206, 78);" name="submit" value="SUBMIT">
            </div>
            <div class="form-group col-md-2">
              <input type="reset" class="btn btn-danger" style="width: 100px;" name="reset" value="RESET">
            </div>
        </div>

      </form>
    </div>
    <hr>
    <div class="container">
      <footer class="page-footer text-center" style="padding-bottom: 40px; padding-top: 25px">
        <!-- <div class="text-center" style="font-size: 22px; font-weight:900"><strong>Freshtrop</strong></div>
        <div class="text-center">Appointments</div> -->
        <center><img src="images/logo.png" class="float-center" position="fix"></center>
      </footer>
      </div>



  </body>
</html>

<script  type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
