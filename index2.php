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
if(isset($_POST['unit-submit'])){
    $fans = $row["fans"];
    $tubelights = $row["tubelights"];
    $bulbs = $row["bulbs"];  
    $tv = $row["tv"];
    $ac = $row["ac"];
    $oven = $row["oven"];
    $desktop = $row["desktop"];
    $iron_box = $row["iron_box"];
    $toaster = $row["toaster"];
    $water_heater = $row["water_heater"];
    $fridge = $row["fridge"];
    $others = $row["others"];
    $fan_hour = $_POST['fan_hour'];
    $tube_hour = $_POST['tube_hour'];
    $bulb_hour = $_POST['bulb_hour'];
    $tv_hour = $_POST['tv_hour'];
    $ac_hour = $_POST['ac_hour'];
    $oven_hour = $_POST['oven_hour'];
    $desktop_hour = $_POST['desktop_hour'];
    $iron_box_hour = $_POST['iron_hour'];
    $toaster_hour = $_POST['toast_hour'];
    $water_heater_hour = $_POST['water_heater_hour'];
    $fridge_hour = $_POST['fridge_hour'];
    $others_hour = $_POST['others_hour'];
    $fan_avg =  75;
    $tube_avg = 55;
    $bulb_avg = 100;
    $tv_avg = 150;
    $ac_avg = 1500;
    $oven_avg = 3500;
    $desktop_avg = 180;
    $iron_box_avg = 1100;
    $toaster_avg = 1100;
    $water_heater_avg = 1125;
    $fridge_avg = 565;
    $others_avg = $_POST['others_avg'];
    $fan_units = 0;
    $tube_units = 0;
    $bulb_units = 0;
    $tv_units = 0;
    $ac_units = 0;
    $oven_units = 0;
    $desktop_units = 0;
    $iron_box_units = 0;
    $toaster_units = 0;
    $water_heater_units = 0;
    $fridge_units = 0;
    $others_units = 0;
    if(!empty($fans) || !empty($fan_hour)){
            $fan_units = $fan_hour * $fan_avg * $fans * 30;
            $fan_units = $fan_units/1000;
        }
        if(!empty($tubelights) || !empty($tube_hour)){
            $tube_units = $tube_hour * $tube_avg * $tubelights * 30;
            $tube_units = $tube_units/1000;
        }
        if(!empty($bulbs) || !empty($bulb_hour)){
            $bulb_units = $bulb_hour * $bulb_avg * $bulbs * 30;
            $bulb_units = $bulb_units/1000;
        }
        if(!empty($tv) || !empty($tv_hour)){
            $tv_units = $tv_hour * $tv_avg * $tv * 30;
            $tv_units = $tv_units/1000;
        }
        if(!empty($ac) || !empty($ac_hour)){
            $ac_units = $ac_hour * $ac_avg * $ac * 30;
            $ac_units = $ac_units/1000;
        }
        if(!empty($oven) || !empty($oven_hour)){
            $oven_units = $oven_hour * $oven_avg * $oven * 30;
            $oven_units = $oven_units/1000;
        }
        if(!empty($desktop) || !empty($desktop_hour)){
            $desktop_units = $desktop_hour * $desktop_avg * $desktop * 30;
            $desktop_units = $desktop_units/1000;
        }
        if(!empty($iron_box) || !empty($iron_box_hour)){
            $iron_box_units = $iron_box_hour * $iron_box_avg * $iron_box * 30;
            $iron_box_units = $iron_box_units/1000;
        }
        if(!empty($toaster) || !empty($toaster_hour)){
            $toaster_units = $toaster_hour * $toaster_avg * $toaster * 30;
            $toaster_units = $toaster_units/1000;
        }
        if(!empty($water_heater) || !empty($water_heater_hour)){
            $water_heater_units = $water_heater_hour * $water_heater_avg * $water_heater * 30;
            $water_heater_units = $water_heater_units/1000;
        }
        if(!empty($fridge) || !empty($fridge_hour)){
            $fridge_units = $fridge_hour * $fridge_avg * $fridge * 30;
            $fridge_units = $fridge_units/1000;
        }
        if(!empty($others) || !empty($others_hour)){
            $others_units = $others_hour * $others_avg * $others * 30;
            $others_units = $others_units/1000;
        }
        $result = $fan_units + $tube_units + $bulb_units + $tv_units + $ac_units + $oven_units + $desktop_units + $iron_box_units + $toaster_units + $water_heater_units + $fridge_units + $others_units;
        if (!empty($result)) {
            $result_1 = calculate_bill($result);
            $result_str = 'Total amount of ' . $result . ' - ' . $result_1;
        }
    }
    function calculate_bill($result) {
        $unit_cost_first = 1.90;
        $unit_cost_second = 3.00;
        $unit_cost_third = 4.50;
        $unit_cost_fourth = 6.00;
    
        if($result <= 50) {
            $bill = $result * $unit_cost_first;
        }
        else if($result > 50 && $result <= 100) {
            $temp = 50 * $unit_cost_first;
            $remaining_units = $result - 50;
            $bill = $temp + ($remaining_units * $unit_cost_second);
        }
        else if($result > 100 && $result <= 200) {
            $temp = (50 * 3.5) + (100 * $unit_cost_second);
            $remaining_units = $result - 150;
            $bill = $temp + ($remaining_units * $unit_cost_third);
        }
        else {
            $temp = (50 * 3.5) + (100 * $unit_cost_second) + (100 * $unit_cost_third);
            $remaining_units = $result - 250;
            $bill = $temp + ($remaining_units * $unit_cost_fourth);
        }
        return number_format((float)$bill, 2, '.', '');

    }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Index</title>
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
      h1{
        text-align: center;
      }
      h2{
        text-align: center;
      }
      input
      {
        border-radius: 20px;
      }
      div{
        background-color: #ffd700
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
    <h1>Welcome <?php echo $row["username"]; ?></h1>
    <h2>ENTER THE NUMBER OF HOURS USED BY AN APPLIANCES IN YOUR HOUSE PER DAY :</h2>
    <br>
		<form class = "block" action="" method="post" id="quiz-form">
                <label>FAN:</label>
                <input type="number" name="fan_hour" id="fan_hour" placeholder="Hours used in a day" /><br>
                <label>TUBELIGHT:</label>
                <input type="number" name="tube_hour" id="tube_hour" placeholder="Hours used in a day" /><br>
                <label>BULB:</label>
                <input type="number" name="bulb_hour" id="bulb_hour" placeholder="Hours used in a day" /><br>
                <label>TV:</label>
                <input type="number" name="tv_hour" id="tv_hour" placeholder="Hours used in a day" /><br>
                <label>AC:</label>
                <input type="number" name="ac_hour" id="ac_hour" placeholder="Hours used in a day" /><br>
                <label>OVEN:</label>
                <input type="number" name="oven_hour" id="oven_hour" placeholder="Hours used in a day" /><br>
                <label>DESKTOP:</label>
                <input type="number" name="desktop_hour" id="desktop_hour" placeholder="Hours used in a day" /><br>
                <label>IRON:</label>
                <input type="number" name="iron_hour" id="iron_hour" placeholder="Hours used in a day" /><br>
                <label>TOASTER:</label>
                <input type="number" name="toast_hour" id="toast_hour" placeholder="Hours used in a day" /><br>
                <label>WATER HEATER:</label>
                <input type="number" name="water_heater_hour" id="water_heater_hour" placeholder="Hours used in a day" /><br>
                <label>FRIDGE:</label>
                <input type="number" name="fridge_hour" id="fridge_hour" placeholder="Hours used in a day" /><br>
                <label>OTHER ELECTRICAL APPLIANCES:</label>
                <input type="number" name="others_hour" id="others_hour" placeholder="Hours used in a day" />
                <input type="number" name="others_avg" id="others_avg" placeholder="watts" /><br>
                <br>
                <label>CLICK ON SUBMIT TO GET THE ESTIMATED ELECTRICITY BILL VALUE</LABEL>
            	<input type="submit" name="unit-submit" id="unit-submit" value="Submit" />
		</form>
        <br>
        <h1>RESULTS:</h1>
        <br>
        <center>
		<div>
		    <?php 
            echo "<br>";
            echo "Total Number of units consumed in kilowatt ".$result;
            echo "<br>";
            echo "<br>";
            echo "The Estimated Electricity bill value is " .($result_1 - $result_1 * (5.0/100.0)). " to " .($result_1 + $result_1 * (5.0/100.0));
            echo "<br>";
            echo "<br>";
            ?>
		</div>
        </center>
    <br>
    <br>
    <br>
      <center><a href="details.php">View details</a>
      <a href="logout.php">Logout</a></center>
    <br>
    <br>
    <br>
    <br>
  </body>
</html>
