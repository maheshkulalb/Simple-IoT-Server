<?php
session_start();
$sess = $_SESSION["login"];
if($sess==null)
{
  
}
else
{
  include "server.php";
$sql = "SELECT `sensor_name`, `sensor_number` FROM sensor_count WHERE `email`='$sess'";
$result = $conn->query($sql);
 $data1 = [];
 $data2 = [];
if ($result->num_rows > 0) 
{ 
  while($row = $result->fetch_assoc()) 
  {
  
    array_push($data1,$row['sensor_name']);
    array_push($data2,$row['sensor_number']);
    
  }
  $count = count($data1);
  for($i=0;$i<$count;$i++)
{
  echo $data1[$i].",".$data2[$i].",";
}

  }
  
}
?>


