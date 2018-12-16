<!DOCTYPE html>
<html>
<head>
    <title>bar chart-amcharts-php</title>
    <script type="text/javascript" src="amcharts/amcharts.js"></script>
    <script type="text/javascript" src="amcharts/serial.js"></script>
    <script type="text/javascript" src="amcharts/themes/light.js"></script>
    <script type="text/javascript" src="dataloader.min.js"></script>
</head>
<body>
    <h1 style="color: red;">Dynamic Bar Graph or Column Chart Using Amcharts js in php and json</h1> 
    <div id="chartdiv" style="width: 100%; height: 400px;"></div>
<script type="text/javascript">
    AmCharts.makeChart( "chartdiv", {
  "type": "serial",
  "theme": "light",
  "dataLoader": {
      "url": "data.php",
      "format": "json"
  },
 
  "categoryField": "year",
  "rotate": false,
  "categoryAxis": {
    "gridPosition": "start",
    "axisColor": "#DADADA"
  },
  "valueAxes": [ {
    "axisAlpha": 0.2
  } ],
  "graphs": [ {
    "type": "column",
    "title": "Annual Income",
    "valueField": "income",
    "lineAlpha": 0,
    "fillColors": "blue",
    "fillAlphas": 0.8,
    "balloonText": "[[title]] in [[category]]:<b>[[value]]</b>"
  } ]
} );
</script>
</body>
</html>