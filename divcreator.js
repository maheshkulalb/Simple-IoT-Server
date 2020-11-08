function divcreator()
{

    loadXMLDoc()
    function loadXMLDoc() {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
          var response = this.responseText;
          div_creator(response);
       
          }
         
        }
       
        xhttp.open("GET", "check.php", true);
        xhttp.send();
       
      }
      function div_creator(response)
      {
          
          var data=[],temp='',count = 0;
          var len = response.length;
          for(var i=0;i<len;i++)
          {
              if(response[i]==',')
              {
                  data.push(temp);
                  temp = '';
                 len = len +1; 
                
                
              }
              else
              {
                temp = temp + response[i];
                
              }
          }
        
          if(data == '')
          {

          }
          else
          {
          var text = "<div>";
            $("body").append(text);

         for(var i=0;i<data.length;i=i+2)
         {
           
            var text = "<div id='"+data[i+1]+"' class='rectangle'></div><br>";
            $("body").append(text);
         } 
        

         var text = "</div>";
         $("body").append(text);

        }
      }
      
}
