<?php
$sensor_number = $_GET['sensor_number'];
$voltage = $_GET["voltage"];
$current = $_GET["current"];
$status = $_GET["status"];
include "include.php";
$sql="UPDATE  `dc_motor_starter` SET `voltage`='$voltage',`current`='$current',`status`='$satatus' WHERE `sensor_number`='$sensor_number'";
        $run_sql=mysqli_query($conn,$sql);
       
        if ($run_sql)
           {
            
            $sql="SELECT  `switch` FROM `dc_motor_starter` WHERE `sensor_number`='$sensor_number'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) 
            { 
                 while($row = $result->fetch_assoc()) 
                 {
                   echo $row["switch"];    
                 }
  

            }
             
          } 
        else
       {
          echo mysqli_errorno($conn); 
            
       }
       $conn->close(); 
?>