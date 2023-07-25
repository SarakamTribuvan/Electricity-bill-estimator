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
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Index</title>
    <style>
        table{
            font-family: arial;
            border-collapse: collapse;
            width: 100%;
        }
        td,th{
            border: 2px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
    </style>
  </head>
  <body>
    <center><h1>Welcome <?php echo $row["username"]; ?></h1><center>
    <h3>HERE ARE YOUR DETAILS: </h3>
    <h3>NOTE: The table indicates the number of electrical appliances.</h3>
    <center>
    <table>
        <tr>
            <th>FANS</th>
            <th>TUBELIGHTS</th>
            <th>BULBS</th>
            <th>TV</th>
            <th>AC</th>
            <th>OVEN</th>
            <th>DESKTOP</th>
            <th>IRON_BOX</th>
            <th>TOASTER</th>
            <th>WATER_HEATER</th>
            <th>FRIDGE</th>
            <th>OTHERS</th>
        </tr>
        <tr>
            <td><?php echo $fans; ?></td>
            <td><?php echo $tubelights; ?></td>
            <td><?php echo $bulbs; ?></td>
            <td><?php echo $tv; ?></td>
            <td><?php echo $ac; ?></td>
            <td><?php echo $oven; ?></td>
            <td><?php echo $desktop; ?></td>
            <td><?php echo $iron_box; ?></td>
            <td><?php echo $toaster; ?></td>
            <td><?php echo $water_heater; ?></td>
            <td><?php echo $fridge; ?></td>
            <td><?php echo $others; ?></td>
        </tr>
    </table>
    <br>
    <br>
    <center>
    <center><a href="index2.php">Bill generator</a>
    <a href="update.php">Update details</a>   
    <a href="logout.php">Logout</a><center>
  </body>
</html>

