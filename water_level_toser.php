
<?php
header('Access-Control-Allow-Origin: *');
	$servername = "localhost";
	$username = "root";
	$password = "";
	$db="mb_technology";
	// Create connection
	$conn = new mysqli($servername, $username, $password,$db);
	// Check connection
	
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 
	
	else
	{
        $sensor_number=$_GET["sn"];
$level = $_GET["level"];
    $sql="UPDATE `water_level` SET `level`='$level' WHERE `sensor_number`='$sensor_number'";
        $run_sql=mysqli_query($conn,$sql);
       
        if ($run_sql)
           {
            
             echo "updated" ;
             
          } 
        else
       {
          echo mysqli_errorno($conn); 
            
       }
       $conn->close(); 
   }
	?>


