<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Acesso', 'Cantidad'],
          <?php foreach($resultado as $res): ?>
          ['<?php echo $res['marca'] ?>', <?php echo $res['cantidad'] ?>],
          <?php endforeach; ?>
        ]);

        var options = {
          chart: {
            title: 'Rxt',
            subtitle: 'Cantidad de accesos: 2025',
          },
          bars: 'horizontal' 
        };

        var chart = new google.charts.Bar(document.getElementById('barchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
  </head>
  <body>
    <div style="margin:3rem;">
        <div id="barchart_material" style="width: 900px; height: 500px;"></div>
    </div>
  </body>
</html>
