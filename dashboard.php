<?php
session_start();
$sess = $_SESSION["login"];
if($sess==null)
{
  header("location:signin.php");
}
else
{
}
?>
<!DOCTYPE html>
<html>
  <head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <title>settings</title>
  </head>
  <body>
    <style>
/*dc_motor_starter text style*/
p.impact {
  font-family: Impact, Charcoal, sans-serif;
}


      /*toggle switch*/
      .switch {
        position: relative;
        display: inline-block;
        width: 100px;
        height: 34px;
      }

      .switch input {display:none;}

      .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ca2222;
        -webkit-transition: .4s;
        transition: .4s;
      }

      .slider.round {
        border-radius: 34px;
      }

      .slider.round:before {
        border-radius: 50%;
      }

      .slider:before {
        position: absolute;
        content: "";
        height: 26px;
        width: 26px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
      }

      input:checked + .slider {
        background-color: #2ab934;
      }

      input:focus + .slider {
        box-shadow: 0 0 1px #2196F3;
      }

      input:checked + .slider:before {
        -webkit-transform: translateX(68px);
        -ms-transform: translateX(68px);
        transform: translateX(68px);
      }

      .on
      {
        display: none;
      }

      .on, .off
      {
        color: white;
        position: absolute;
        transform: translate(-50%,-50%);
        top: 50%;
        left: 50%;
        font-size: 10px;
        font-family: Verdana, sans-serif;
      }

      input:checked+ .slider .on
      {display: block;}

      input:checked + .slider .off
      {display: none;}
      /*toggle*/

.rectangle {
  height: 400px;
  width: 1000px;
  margin-top: auto;
      margin-bottom: auto;
      margin-right: auto;
      margin-left: auto;
  background-color:white;
}
    body{
      background-color: white;
      margin-top: auto;
      margin-bottom: auto;
      margin-right: auto;
      margin-left: auto;
      }
      
      nav{
        margin-top: auto;
        margin-bottom: 100px;
        margin-right: auto;
        margin-left: auto;
        }
      
      .button {
        background-color: #99ccff; /* Green */
        border: none;
        color: white;
        padding: 10px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 10px;
        margin: 4px 2px;
        cursor: pointer;
        -webkit-transition-duration: 0.4s; /* Safari */
        transition-duration: 0.4s;
        }
  
      .button2:hover {
        box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
        }
    </style>
     <table><tr><td>
          <div class="floating-box">
            <form name="form2"  action="home.php" onsubmit="return check();">
            <button class="button button2">Home</button>
          </form>
        </div>
      </td><td>
        <div class="floating-box">
                 <form name="form2">
                        <button type="button"  data-toggle="modal" data-target="#kModal" class="button button2">+Sensors</button>
                      </form>
                    </div>
                    <div class="container">
                
                <!-- The Modal -->
                <div class="modal" id="kModal">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <!-- Modal Header -->
                      <div class="modal-header">
                        <h4 class="modal-title">+sensors</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                      </div>
  
                      <!-- Modal body -->
                      <div class="modal-body">
                        <div class="container">
                          <form name="add_sensor" method="POST" action=add.php?count=1" onsubmit="return validateForm()" onsubmit="return check();">
                          <div class="form-group">
                            <label for="usr">Sensor Name:</label>
                            <input type="text" class="form-control" id="usr" name="sensor_name">
                          </div>
                          <div class="form-group">
                            <label for="pwd">Sensor Number:</label>
                            <input type="text" class="form-control" id="pwd" name="sensor_number">
                          </div>
                          <button type="submit" class="btn btn-primary">add</button>
                        </form>
                      </div>
                    </div>
                    
                    <!-- Modal footer -->
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>
            </td><td>
            <div class="floating-box">
                 <form name="form2">
                        <button type="button"  data-toggle="modal" data-target="#dModal" class="button button2">-Sensors</button>
                      </form>
                    </div>
                    <div class="container">
                
                <!-- The Modal -->
                <div class="modal" id="dModal">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <!-- Modal Header -->
                      <div class="modal-header">
                        <h4 class="modal-title">-sensors</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                      </div>
  
                      <!-- Modal body -->
                      <div class="modal-body">
                        <div class="container">
                          <form name="add_sensor" method="POST" action="remove.php?count=1" onsubmit="return validateForm()" onsubmit="return check();">
                          <div class="form-group">
                            <label for="usr">Sensor Name:</label>
                            <input type="text" class="form-control" id="usr" name="sensor_name">
                          </div>
                          <div class="form-group">
                            <label for="pwd">Sensor Number:</label>
                            <input type="text" class="form-control" id="pwd" name="sensor_number">
                          </div>
                          <button type="submit" class="btn btn-primary">remove</button>
                        </form>
                      </div>
                    </div>
                    
                    <!-- Modal footer -->
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </ul>
        </nav>
      </td></tr></table>
     </div><br>
     <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
     <script type="text/javascript" src="divcreator.js"></script>
     <script type="text/javascript" src="contentadder.js"></script>
     <script type="text/javascript" src="water_level.js"></script>
     <script type="text/javascript" src="dc_motor_starter.js"></script>
 <script type="text/javascript">
 divcreator()
 var a = setInterval(contentadder,1000);
contentadder()
</script>
      </body>
      </html>