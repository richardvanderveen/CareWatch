// Load the Visualization API and the piechart package.
google.charts.load('current', {'packages':['line']});

// Set a callback to run when the Google Visualization API is loaded.
google.charts.setOnLoadCallback(drawChart);
// id 5 is heartbeat id 6 is temperatrure  for demo purposes
function drawChart() {
  var jsonData = $.ajax({
      url: "https://carew.oudgenoeg.nl/php/chartdata.php?id=6",
      dataType: "json",
      async: false
    }).responseText;
    var jsonClean = JSON.parse(jsonData);
    var jsonDataPoints = jsonClean.datapoints;
    if (jsonDataPoints.length > 100) {
      var last100 = jsonDataPoints.length - 100;
    } else {
      last100 = jsonDataPoints.length;
      //show last max 100
    }
  // Create our data table out of JSON data loaded from server.
  var data = new google.visualization.DataTable();
  data.addColumn('string', 'Time');
  data.addColumn('number', jsonClean.type);

  for (var i = last100; i < jsonDataPoints.length; i++) {
    data.addRow([jsonDataPoints[i].time,parseFloat(jsonDataPoints[i].value)]);
  }
  var options = {
       chart: {
         title: 'Sensor ' + jsonClean.type + ' data',
         subtitle: 'if more than 100 then show last 100'
       },
       width: 900,
       height: 500,
       axes: {
         x: {
           0: {side: 'bottom'}
         }
       }
     };


  // Instantiate and draw our chart, passing in some options.
  var chart = new google.charts.Line(document.getElementById('chart_div'));
  chart.draw(data, google.charts.Line.convertOptions(options));
}
