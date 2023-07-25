<?php
require 'configuration.php';
if(!empty($_SESSION["id"])){
  $id = $_SESSION["id"];
  $result = mysqli_query($conn, "SELECT * FROM regi WHERE id = $id");
  $row = mysqli_fetch_assoc($result);
}
else{
  header("Location: login.php");
}
$result_str = $result = $result_1 = 0;
    $fans_pre = $row["fans"];
    $tubelights_pre = $row["tubelights"];
    $bulbs_pre = $row["bulbs"];  
    $tv_pre = $row["tv"];
    $ac_pre = $row["ac"];
    $oven_pre = $row["oven"];
    $desktop_pre = $row["desktop"];
    $iron_box_pre = $row["iron_box"];
    $toaster_pre = $row["toaster"];
    $water_heater_pre = $row["water_heater"];
    $fridge_pre = $row["fridge"];
    $others_pre = $row["others"];
    if(isset($_POST["submit"])){
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
        if($fans == ""){
             $final_fan = $fans_pre;
        }
        else{
            $final_fan = $fans;
        }
        if($tubelights == ""){
            $final_tubelights = $tubelights_pre;
        }
        else{
            $final_tubelights = $tubelights;
        }
        if($bulbs == ""){
        $final_bulbs = $bulbs_pre;
        }
        else{
            $final_bulbs = $bulbs;
        }
        if($tv == ""){
            $final_tv = $tv_pre;
        }
        else{
            $final_tv = $tv;
        }
        if($ac == ""){
            $final_ac = $ac_pre;
        }
        else{
            $final_ac = $ac;
        }
        if($oven == ""){
            $final_oven = $oven_pre;
        }
        else{
            $final_oven = $oven;
        }
        if($desktop == ""){
            $final_desktop = $desktop_pre;
        }
        else{
            $final_desktop = $desktop;
        }
        if($iron_box == ""){
            $final_iron_box = $iron_box_pre;
        }
        else{
            $final_iron_box = $iron_box;
        }
        if($toaster == ""){
            $final_toaster = $toaster_pre;
        }
        else{
            $final_toaster = $toaster;
        }
        if($water_heater == ""){
            $final_water_heater = $water_heater_pre;
        }
        else{
            $final_water_heater = $water_heater;
        }
        if($fridge == ""){
            $final_fridge = $fridge_pre;
        }
        else{
            $final_fridge = $fridge;
        }
        if($others == ""){
            $final_others = $others_pre;
        }
        else{
            $final_others = $others;
        }

        $result = mysqli_query($conn,"UPDATE regi SET fans=$final_fan , tubelights=$final_tubelights , bulbs=$final_bulbs,tv=$final_tv, ac=$final_tv , oven=$final_oven , desktop=$final_desktop , iron_box=$final_iron_box , toaster=$final_toaster , water_heater=$final_water_heater , fridge=$final_fridge , others=$final_others WHERE id = $id");
        if($result){
            echo "<b>DATA UPDATED</b>";
        }
        else{
            echo "data not updated";
        }
    }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>update</title>
    <style>
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
    <center><h1>Welcome <?php echo $row["username"]; ?></h1><center>
    <label>ENTER THE UPDATED DETAILS :</label><br>
    <form class="block" action="" method="post" autocomplete="off">
        <input type="number" name="fans" id="fans" placeholder="Number of fans" /><br>
        <input type="number" name="tubelights" id="tubelights" placeholder="Number of Tubelights" /><br>
        <input type="number" name="bulbs" id="bulbs" placeholder="Number of Bulbs" /><br>
        <input type="number" name="tv" id="tv" placeholder="Number of TVs" /><br>
        <input type="number" name="ac" id="ac" placeholder="Number of ACs" /><br>
        <input type="number" name="oven" id="oven" placeholder="Number of ovens" /><br>
        <input type="number" name="desktop" id="desktop" placeholder="Number of desktops" /><br>
        <input type="number" name="iron" id="iron" placeholder="Number of iron boxes" /><br>
        <input type="number" name="toast" id="toast" placeholder="Number of toasters" /><br>
        <input type="number" name="water_heater" id="water_heater" placeholder="Number of water heaters" /><br>
        <input type="number" name="fridge" id="fridge" placeholder="Number of fridges" /><br>
        <input type="number" name="others" id="others" placeholder="Number of other appliances" /><br>
        <br>
        <br>
        <br>
      <button type="submit" name="submit">update</button>
    </form>
    <br>
    <center>
    <center><a href="index2.php">Bill generator</a>
    <a href="details.php">view details</a>   
    <a href="logout.php">Logout</a><center>
  </body>
</html>

