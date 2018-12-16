<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>aspare</title>
</head>




<body>

<!-- Styles -->
<style>
#chartdiv {
	width		: 100%;
	height		: 500px;
	font-size	: 11px;
}					
</style>

<!-- Resources -->
<script src="js/amcharts.js"></script>
<script src="js/serial.js"></script>
<script src="js/export.min.js"></script>
<link rel="stylesheet" href="export.css" type="text/css" media="all" />
<script src="js/light.js"></script>

<!-- Chart code -->
<script>



var chart = AmCharts.makeChart( "chartdiv", {
  "type": "serial",
  "theme": "dark",
  "dataProvider": [ {
    "country": "CO1",
    "visits": <?php echo $s1;
    /*if(s1>=1.32)
                      {
                        echo "Substantial (3)";
                      }
                        elseif(s1>=1.26)
                      {
                            echo "Moderate (2)";
                      }elseif(s1>=1.2)
                            {
                              echo "Slightly (1)";
                            }
                            else {
                              # code...
                            echo "Not Achieved (0)";
                          }*/
                          ?>
  }, {
    "country": "CO2",
    "visits": <?php echo $s2?>
  }, {
    "country": "CO3",
    "visits": <?php echo $s3; ?>
  }, {
    "country": "CO4",
    "visits": <?php echo $s4; ?>
  }, {
    "country": "CO5",
    "visits": <?php echo $s5; ?>
  }, {
    "country": "CO6",
    "visits": <?php echo $s6; ?>
  } ],
  "valueAxes": [ {
    "gridColor": "#FFFFFF",
    "gridAlpha": 0.2,
    "dashLength": 0
  } ],
  "gridAboveGraphs": true,
  "startDuration": 1,
  "graphs": [ {
    "balloonText": "[[category]]: <b>[[value]]</b>",
    "fillAlphas": 0.8,
    "lineAlpha": 0.2,
    "type": "column",
    "valueField": "visits"
  } ],
  "chartCursor": {
    "categoryBalloonEnabled": false,
    "cursorAlpha": 0,
    "zoomable": false
  },
  "categoryField": "country",
  "categoryAxis": {
    "gridPosition": "start",
    "gridAlpha": 0,
    "tickPosition": "start",
    "tickLength": 20
  },
  "export": {
    "enabled": true
  }

} );
</script>

<!-- HTML -->
<div id="chartdiv"></div>	





</body>
</html>