<?php
session_start();
include "server.php";
extract($_POST);
if(isset($submit))
{
	$rs=mysqli_query($conn,"select * from customer where email='$email' and pass='$pass'");
	if(mysqli_num_rows($rs)<1)
	{
		$found="N";
	}
	else
	{
		$_SESSION["login"]=$email;
		$_SESSION['user_id']=$user_id;
	}
}
if (isset($_SESSION["login"]))
{
	//echo "<h1 align=center>Hye you are sucessfully login!!!</h1>";
	//exit;
	header("location:home.php");
}
?>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script type="text/javascript">
		function validateForm() 
		{
			var x=document.forms["form1"]["email"].value;
			if (x==null || x=="")
			{
				alert("Email must be filled out");
				return false;
				}
				var x=document.forms["form1"]["pass"].value;
				if (x==null || x=="")
				{
					alert("Password must be filled out");
					return false;
					}
					</script>
					<title>Login</title>
					<meta name="viewport" content="width=device-width, initial-scale=1">
					<link rel="stylesheet" href="style.css">
					</head>
					<body>
					<style>
					body{
						background-color:  #e6f5ff;
						}
						</style>
						<table width="20%" style="border:2px solid black;margin-left:auto;margin-right:auto;margin-top:250px;" height="20%" align="center" >
						<div class="floating-box">
						<form name="form1" method="post" onsubmit="return validateForm()">
						<tr>
						<td>
						<label for="uname"><b>Email</b></label></td>
						<td>
						<input type="text" id="loginid2" name="email"></td>
						</tr>
						<tr><td>
						<label for="pwd"><b>Password</b></label></td>
						<td>
						<input type="password" id="pass2" name="pass"></td>
						</tr>
						<td>
						<td>
						<input name="submit" type="submit" id="submit" value="Login"><br>
						<p>New User <a href="signup.php">Register Here</a></p>
						<?php
						if(isset($found))
						{
							echo '<p class="w3-center w3-text-red">Invalid user id or password<br><a href="signin.php">Please try again</p>';
						}
						?>
						</td>
						</td>
						</table>
						</form>
						</div>
						</body>
						</html>