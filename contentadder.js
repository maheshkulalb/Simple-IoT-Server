function contentadder()
{
  
loadXMLDoc1();
    function loadXMLDoc1() {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
          var response = this.responseText;
          var res = response.split(",");
          content_adder1(res);
          
          }
         
        }
        xhttp.open("GET", "checksensors.php", true);
        xhttp.send();
       
      }
      function content_adder1(data)
     {
     
      
       for(var i =0;i<data.length;i=i+2)
       {
           if(data[i]=="water_level")
           {   

               water_level(data[i+1])
               
           }
         
           if(data[i]=="dc_motor_starter")
           {
             dc_motor_starter(data[i+1])
           }
       }
      }
    }
