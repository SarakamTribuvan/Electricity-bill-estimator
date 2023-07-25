<?php
require 'configuration.php';
if(!empty($_SESSION["id"])){
  header("Location: index2.php");
}
if(isset($_POST["submit"])){
  $usernameemail = $_POST["usernameemail"];
  $password = $_POST["password"];
  $result = mysqli_query($conn, "SELECT * FROM regi WHERE username = '$usernameemail'");
  $row = mysqli_fetch_assoc($result);
  if(mysqli_num_rows($result) > 0){
    if($password == $row['password']){
      $_SESSION["login"] = true;
      $_SESSION["id"] = $row["id"];
      header("Location: index2.php");
    }
    else{
      echo
      "<script> alert('Wrong Password'); </script>";
    }
  }
  else{
    echo
    "<script> alert('User Not Registered'); </script>";
  }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <style>
      h2{
        text-align: center;
      }
      a{
        text-align: center;
      }
      input
      {
        border-radius: 20px;
      }
      form {
        box-sizing: border-box;
        padding: 10px;
        border-radius: 20px;
        background-color: #E0FFFF;
        border: 4px solid hsl(0, 0%, 90%);
        display: grid;
        width: 320px;

      }
      form.block {
        margin-left: auto;
        margin-right: auto;
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
    <h2>ENTER YOUR LOGIN DETAILS:</h2>
    <form class="block" action="" method="post" autocomplete="off">
      <label for="usernameemail">USERNAME : </label> 
      <input type="text" name="usernameemail" id = "usernameemail" required value="">
      <label for="password">PASSWORD : </label> 
      <input type="password" name="password" id = "password" required value=""> <br>
      <br>
      <br>
      <button type="submit" name="submit">Login</button>
    </form>
    <br>
    <center><a href="registration.php">Registration</a></center>
  </body>
</html>
