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
 
}
echo $value;
$value = $value + $sens_count;
$sql="INSERT INTO `sensor_count` (`email`,`count`,`sensor_name`, `sensor_number`) VALUES ('$sess','$value' ,'$sensor_name', '$sensor_number')";
$run_sql=mysqli_query($conn,$sql);
if ($run_sql)
{

    //header("location:dasboard.php");   
}
else
{
    //header("location:dashboard.php");
}
$sql = "SELECT `count` FROM sensor_count WHERE `email`='$sess'";
$result = $conn->query($sql);
$value = 0;
if ($result->num_rows > 0) 
{ 
   
  while($row = $result->fetch_assoc()) 
  {
     
  }
  echo $row['count'];
  header("location:dashboard.php");   
}
}

?>