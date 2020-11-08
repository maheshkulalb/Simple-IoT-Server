<?php
session_start();
extract($_POST);
$sens_count = $_GET['count'];
$sess = $_SESSION['login'];
if($sess == null)
{

}
else
{
include "server.php";
$sql = "SELECT `count` FROM sensor_count WHERE `email`='$sess'";
$result = $conn->query($sql);
$value = 0;
if ($result->num_rows > 0) 
{ 
   
  while($row = $result->fetch_assoc()) 
  {
      $value = $row['count'];
  }
 $value =$value -1;
}
$sql="DELETE FROM `sensor_count`  WHERE `email`='$sess' AND `sensor_number`='$sensor_number'";
    $run_sql=mysqli_query($conn,$sql);
    if ($run_sql)
    {
        header("location:dashboard.php");
    }
    else
    {
        header("location:dashboard.php");
    } 
}
?>