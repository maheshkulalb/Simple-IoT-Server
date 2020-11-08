function water_level(sensor_number)
{ 
  var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
          var response = this.responseText;
          var res = response.split(",");
        water_level1(sensor_number,res)

          }
         
        }
       
        xhttp.open("GET", "water_level_user.php?sensor_number="+sensor_number, true);
        xhttp.send();
       function water_level1(sensor_number,response)
       {  
         google.charts.load('current', {packages: ['corechart', 'bar']});
google.charts.setOnLoadCallback(drawAxisTickColors);

function drawAxisTickColors() {
      var data = google.visualization.arrayToDataTable([
        ['Sensor number', 'Level'],
         [String(sensor_number),parseInt(response)]
      ]);

      var options = {
        animation:{
          duration: 1000,
          easing: 'out',
        },
        title: 'Water level indicator',
        chartArea: {width: '50%'},
        hAxis: {
          title: 'Level(%)',
          minValue: 0,
          maxValue:100,
          textStyle: {
            bold: true,
            fontSize: 12,
            color: '#4d4d4d'
          },
          titleTextStyle: {
            bold: true,
            fontSize: 18,
            color: '#4d4d4d'
          }
        },
        vAxis: {
          title: 'Sensor number',
          textStyle: {
            fontSize: 14,
            bold: true,
            color: '#848484'
          },
          titleTextStyle: {
            fontSize: 14,
            bold: true,
            color: '#848484'
          }
        }
      };
      var chart = new google.visualization.BarChart(document.getElementById(sensor_number));
      chart.draw(data, options);
    }

}
}