 
<!DOCTYPE html>
<html>
  <head><title>my profile</title>
</head>
<body>
  <style>
  body{
    font-family: Charcoal, sans-serif;
    background-color:#e6f5ff;
    }
    </style>
    <?php
    session_start();
    $user_id=$_SESSION["user_id"];
    $email=$_SESSION["login"];
    if($email==null)
    {
      header("location:signin.php");
    }
    else
    {
      include "server.php";
      $sql = "SELECT photo FROM photos WHERE `email`='$email'";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          echo "<html><body><center><img src='profile_images/".$row['photo']."' width='250' height='166'></center></body></html>";
        }
      }
      else 
      {
        
      }
      echo "";
      echo "<center>User ID : ".$user_id."</center>";
      echo "<center>Email : ".$email."</center>";
    }
    ?>
    </body>
    </html>
    <?php
    error_reporting(0); 
    ?> 
    <?php
    $msg = ""; 
    // If upload button is clicked ... 
    if (isset($_POST['upload'])) 
    { 
      $filename = $_FILES["uploadfile"]["name"]; 
	    $tempname = $_FILES["uploadfile"]["tmp_name"];	 
		  $folder = "C:/wamp/www/profile_images/".$filename; 
      $db = mysqli_connect("localhost", "root", "", "mb_technology"); 
      $sql="SELECT * FROM `photos` WHERE `email`='$email'";
      if(mysqli_num_rows($conn->query($sql)) > 0)
      {
        $sql = "SELECT `photo` FROM photos WHERE `email`='$email'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) 
        {
          while($row = $result->fetch_assoc()) 
          {
            $photoname=$row['photo'];
            $file_pointer = "C:/wamp/www/profile_images/$photoname"; 
            // Use unlink() function to delete a file 
            if (!unlink($file_pointer)) { 
              echo ("$file_pointer cannot be deleted due to an error"); 
            } 
            else 
            { 
              echo ("$file_pointer has been deleted"); 
            } 
          }
        }
        $sql = "UPDATE `photos` SET `email`='$email',`photo`='$filename' WHERE `email`='$email'"; 
        $run_sql=mysqli_query($conn,$sql);
        if ($run_sql)
        {

        } 
        else
        {
           
        }
      }
      else 
      {
        $sql="INSERT INTO `photos`( `email`, `photo`) VALUES ('$email','$filename')";
        $run_sql=mysqli_query($conn,$sql);
        if ($run_sql)
        {

        }
        else
        {

        }
        // Execute query 
      }
      // Now let's move the uploaded image into the folder: image 
      if (move_uploaded_file($tempname, $folder)) 
      { 
        header("location:profile.php");
      }
      else
      { 
        
      } 
    } 
    ?> 
    <!DOCTYPE html> 
    <html> 
      <head> 
        <title>Image Upload</title> 
        <link rel="stylesheet" type= "text/css" href ="style.css"/> 
        <div id="content"> 
          <form method="POST" action="" enctype="multipart/form-data"> 
          <input type="file" name="uploadfile" value=""/> 
          <div> 
            <button type="submit" name="upload">UPLOAD</button> 
          </div> 
        </form> 
      </div> 
    </body> 
    </html> 
