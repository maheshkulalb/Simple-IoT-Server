<?php
session_start();
$sess=$_SESSION["login"];
$sensor_number = $_GET['sensor_number'];
if($sess==null)
{

}
else
{
include "server.php";
$sql = "SELECT `level` FROM  water_level WHERE  `sensor_number`='$sensor_number'";
$result = $conn->query($sql);
if ($result->num_rows > 0) 
{ 
  while($row = $result->fetch_assoc()) 
  {
  echo $row['level'];
  }
  

}
  

}
?>