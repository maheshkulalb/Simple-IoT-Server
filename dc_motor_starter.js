function dc_motor_starter(sensor_number)
{   
  
 var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
      var response = this.responseText;
      var res = response.split(",");
      dc_motor_starter1(sensor_number, res);

      }
     
    }
   xhttp.open("GET", "dc_motor_starter_user.php?task=0&sensor_number="+sensor_number, true);
    xhttp.send();
      function dc_motor_starter1(sensor_number, response)
      {
        var text1 = "<center><div>DC MOTOR STARTER</div></center>";
        var text2 = "<center><div>voltage : "+response[0]+"</div></center>";
        var text3 = "<center><div>Current : "+response[1]+"</div></center>";
        var text4 = "<center><div>Status : "+response[2]+"</div></center>";
        var text5 = "<center><div  id='bit00_3'><label class='switch'><input type='checkbox' id='checkbox1'><div class='slider round'><span class='on'>ON</span><span class='off'>OFF</span></div></label></div></center>";
       document.getElementById(sensor_number).innerHTML=text1+text2+text3+text4+text5;
       if(response[2]==0)
       {
         var switc = false;
       }
       else
       {
          var switc = true;
       }
       var value = switc;
       var checkbox1 = document.getElementById("checkbox1")
       checkbox1.checked = value
        document.getElementById("checkbox1").addEventListener("change", function(element){
    if(checkbox1.checked==false)
         {
           var switc = 0;
         }
         else{
  var switc = 1;
         }
         var xhttp = new XMLHttpRequest();
         xhttp.onreadystatechange = function() {
           if (this.readyState == 4 && this.status == 200) {
           var response = this.responseText;
     
           }
          
         }
        xhttp.open("GET", "dc_motor_starter_user.php?task=1&sensor_number="+sensor_number+"&switch="+switc, true);
         xhttp.send(); 
       
        });
       
      }
    
  }