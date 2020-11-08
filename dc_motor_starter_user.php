<?php
session_start();
$sensor_number = $_GET['sensor_number'];
$sess = $_SESSION['login'];
$task = $_GET['task'];
if($sess == null)
{

}
else
{   
  include "server.php";
  if($task == '1')
  {
    $switch = $_GET['switch'];
     $sql="UPDATE `dc_motor_starter` SET `switch`='$switch' WHERE `sensor_number`='$sensor_number'";
  $run_sql=mysqli_query($conn,$sql);
       
    if ($run_sql)
       {
   
  
     }
    }
  if($task == '0')
    {
    $sql = "SELECT  `voltage`, `current`, `status`, `switch` FROM `dc_motor_starter` WHERE `sensor_number`='$sensor_number'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) 
    { 
    while($row = $result->fetch_assoc()) 
    {
      echo $row['voltage'].",".$row['current'].",".$row['status'].",".$row['switch'];
    }
  

}
    }
}
?>