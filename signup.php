<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>user signup</title>
    </head>
    <body>
        <?php
        include "server.php";
        extract($_POST);
        if(isset($submit))
        {
            $sql="SELECT * FROM `customer` WHERE `email`='$email'";
            if(mysqli_num_rows($conn->query($sql)) > 0)
            {
                echo "<script type='text/javascript'> ";
                echo "window.alert('already registered')</script>";
            }
            else 
            {
                $sql="INSERT INTO `customer` (`user_id`, `pass`, `email`) VALUES ('$user_id', '$pass', '$email')";
                $run_sql=mysqli_query($conn,$sql);
                if ($run_sql)
                {
                    echo "<script type='text/javascript'> ";
                    echo "window.alert('sucessfull')</script>";
                }
                else
                {
                    echo mysqli_errorno($conn);  
                }
            }
        }
        ?>
        </body>
        </html>
        <!DOCTYPE html>
        <html>
            <head>
                <script type="text/javascript">
                function validateForm() {
                    var x=document.forms["form1"]["user_id"].value;
                    if (x==null || x=="")
                    {
                        alert("User_id must be filled out");
                        return false;
                        }
                        var x=document.forms["form1"]["pass"].value;
                        if (x==null || x=="")
                        {
                            alert("Password must be filled out");
                            return false;
                            }
                            var x=document.forms["form1"]["email"].value;
                            if (x==null || x=="")
                            {
                                alert("Email must be filled out");
                                return false;
                                }
                                }
                                </script>
                                <title>New user signup</title>
                            </head>
                            <body>
                                <style>
                                body{
                                    background-color:#e6f5ff;
                                    }
                                    </style>
                                    <div class="floating-box">
                                        <form name="form1" method="POST" onsubmit="return validateForm()" onsubmit="return check();">
                                        <table width="20%" style="border:2px solid black;margin-left:auto;margin-right:auto;margin-top:250px" height="20%" align="center"  >
                                        <tr><td>       
                                            <label for=""pwd"><b>User ID</b></label>
                                        </td><td>
                                            <input type="text" id="name" name="user_id" >
                                        </td>
                                    </tr>
                                    <tr><td>
                                        <label for=""pwd"><b>Password</b></label>
                                    </td>
                                    <td>
                                        <input type="password" id="pass" name="pass">
                                    </td></tr>
                                    <tr><td>
                                        <label for="uname"><b>Email id</b></label>
                                    </td><td>
                                        <input type="text" id="email" name="email">
                                    </td></tr>
                                    <tr>
                                        <td>

                                        </td>
                                        <td>
                                            <input type="submit" name="submit" value="Signup">
                                        </td></tr>
                                    </div>
                                    <tr><td>

                                    </td>
                                    <td>
                                        <p>already user <a href="signin.php">sign in</a></p>
                                    </td></tr>
                                </form>
                            </div>
                        </body>
                        </html>

