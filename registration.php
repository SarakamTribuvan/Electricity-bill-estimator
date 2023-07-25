<?php
require 'configuration.php';
if(!empty($_SESSION["id"])){
  header("Location: index2.php");
}
if(isset($_POST["submit"])){
  $fans = 0;
  $tubelights = 0;
  $bulbs = 0;
  $tv = 0;
  $ac = 0;
  $oven = 0;
  $desktop = 0;
  $iron_box = 0;
  $toaster = 0;
  $water_heater = 0;
  $fridge = 0;
  $others = 0;
  $username = $_POST["username"];
  $password = $_POST["password"];
  $confirmpassword = $_POST["confirmpassword"];
  $fans = $_POST['fans'];
  $tubelights = $_POST['tubelights'];
  $bulbs = $_POST['bulbs'];  
  $tv = $_POST['tv'];
  $ac = $_POST['ac'];
  $oven = $_POST['oven'];
  $desktop = $_POST['desktop'];
  $iron_box = $_POST['iron'];
  $toaster = $_POST['toast'];
  $water_heater = $_POST['water_heater'];
  $fridge = $_POST['fridge'];
  $others = $_POST['others'];
  $duplicate = mysqli_query($conn, "SELECT * FROM regi WHERE username = '$username'");
  if(mysqli_num_rows($duplicate) > 0){
    echo
    "<script> alert('Username Has Already Taken'); </script>";
  }
  else{
    if($password == $confirmpassword){
      $query = "INSERT INTO regi VALUES('','$username','$password','$fans','$tubelights','$bulbs','$tv','$ac','$oven','$desktop','$iron_box','$toaster','$water_heater','$fridge','$others')";
      mysqli_query($conn, $query);
      echo
      "<script> alert('Registration Successful'); </script>";
    }
    else{
      echo
      "<script> alert('Password Does Not Match'); </script>";
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Registration</title>
    <style>
      a {
        text-align: center;
      }
      form {
        box-sizing: border-box;
        padding: 10px;
        border-radius: 20px;
        background-color: #E0FFFF;
        border: 4px solid hsl(0, 0%, 90%);
        display: grid;
        width: 1000px;
      }
      form.block {
        margin-left: auto;
        margin-right: auto;
      }
      h2{
        text-align: center;
      }
      input
      {
        border-radius: 20px;
      }
      body{
        background-image: url('tower.jpg');
        background-size: 100%;
        background-repeat: no-repeat;
        background-attachment: fixed;

      }
    </style>
  </head>
  <body>
    <h2>REGISTRATION PAGE :</h2>
    <form class="block" action="" method="post" autocomplete="off">
        <label for="username">USERNAME : </label>
        <input type="text" name="username" id = "username" required value=""> <br>
        <label for="password">PASSWORD : </label>
        <input type="password" name="password" id = "password" required value=""> <br>
        <label for="confirmpassword">CONFIRM PASSWORD : </label>
        <input type="password" name="confirmpassword" id = "confirmpassword" required value=""> <br>
        <label>ENTER THE NUMBER OF RESPECTIVE APPLIANCES YOU HAVE :</label><br>
        <label>FAN:</label>
        <input type="number" name="fans" id="fans" placeholder="Number of fans" /><br>
        <label>TUBELIGHT:</label>
        <input type="number" name="tubelights" id="tubelights" placeholder="Number of Tubelights" /><br>
        <label>BULB:</label>
        <input type="number" name="bulbs" id="bulbs" placeholder="Number of Bulbs" /><br>
        <label>TV:</label>
        <input type="number" name="tv" id="tv" placeholder="Number of TVs" /><br>
        <label>AC:</label>
        <input type="number" name="ac" id="ac" placeholder="Number of ACs" /><br>
        <label>OVEN:</label>
        <input type="number" name="oven" id="oven" placeholder="Number of ovens" /><br>
        <label>DESKTOP:</label>
        <input type="number" name="desktop" id="desktop" placeholder="Number of desktops" /><br>
        <label>IRON:</label>
        <input type="number" name="iron" id="iron" placeholder="Number of iron boxes" /><br>
        <label>TOASTER:</label>
        <input type="number" name="toast" id="toast" placeholder="Number of toasters" /><br>
        <label>WATER HEATER:</label>
        <input type="number" name="water_heater" id="water_heater" placeholder="Number of water heaters" /><br>
        <label>FRIDGE:</label>
        <input type="number" name="fridge" id="fridge" placeholder="Number of fridges" /><br>
        <label>OTHER ELECTRICAL APPLIANCES:</label>
        <input type="number" name="others" id="others" placeholder="Number of other appliances" /><br>
        <br>
        <br>
        <br>
      <button type="submit" name="submit">Register</button>
    </form>
    <br>
    <center><a href="login.php">Login</a></center>
  </body>
</html>
