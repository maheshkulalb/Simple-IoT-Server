<?php
$sensor_number = $_GET['sn'];
$voltage = $_GET['voltage'];
$current = $_GET['current'];
$status = $_GET['status'];
include "server.php";
$sql = "SELECT * FROM dc_motor_starter WHERE `sensor_number`='$sensor_number'";
$result = $conn->query($sql);
if ($result->num_rows > 0) 
{ 
    $sql="UPDATE `dc_motor_starter` SET `sensor_number`='$sensor_number',`voltage`='$voltage',`current`='$current',`status`='$status' WHERE `sensor_number`='$sensor_number'";
    $run_sql=mysqli_query($conn,$sql);
       
    if ($run_sql)
       {
        $sql = "SELECT `switch` FROM `dc_motor_starter` WHERE `sensor_number`='$sensor_number'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) 
        { 
        while($row = $result->fetch_assoc()) 
        {
         echo $row['switch'];
        }
      
    
    }
  
}
}
else
{
  
    $sql="INSERT INTO `dc_motor_starter`(`sensor_number`, `voltage`, `current`, `status`) VALUES ('$sensor_number','$voltage','$current','$status')";
    $run_sql=mysqli_query($conn,$sql);
    if ($run_sql)
    {
        $sql = "SELECT `switch` FROM `dc_motor_starter` WHERE `sensor_number`='$sensor_number'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) 
        { 
        while($row = $result->fetch_assoc()) 
        {
         echo $row['switch'];
        }
      
    
    }
    }
    else
    {
        //header("location:dashboard.php");
    }
}
?>
