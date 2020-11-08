function add(sensor_name,sensor_number)
{    
    loadXMLDoc(sensor_name,sensor_number)
    function loadXMLDoc(sensor_name,sensor_number) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
          var response = this.responseText;
          
       
          }
         
        }
       
        xhttp.open("GET", "add.php?count=1&sensor_name="+sensor_name+"&sensor_number="+sensor_number, true);
        xhttp.send();
       
      }
      
}