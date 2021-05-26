<?php 
    include 'connect.php';              

    $q = mysql_query('SELECT * FROM task');  

    $k = '';
    while($r1 = mysql_fetch_array($q))
    {
        $tname =  $r1['name'];

        $orderdate = preg_split("/-/",$r1['start']);/*list($month, $day, $year) = split('[/.-]', $start);*/
        $syear = $orderdate[0];
        $smonth   = $orderdate[1];
        $sday  = $orderdate[2];       

        $orderdate1 = preg_split("/-/",$r1['end1']);/*list($month, $day, $year) = split('[/.-]', $start);*/
        $eyear = $orderdate1[0];
        $emonth   = $orderdate1[1];
        $eday  = $orderdate1[2];       

        $k.= "['".$tname."', '".$tname."', '".$tname."',new Date(".$syear.",".$smonth."," .$sday."), new Date(".$eyear.",".$emonth.",".$eday." ), null, 100, null],";
    }
    echo $k;

    /*echo "['".$r1['name']."',".$r1['val']."],"; */
    /*echo "['".$tname."', '".$tname."', '".$tname"',new Date(".$syear.",".$smonth."," .$sday."), new Date(".$eyear.",".$emonth.",".$eday." ), null, 100, null],";*/

?>  

<html>
<head>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load('current', {'packages':['gantt']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

      var data = new google.visualization.DataTable();
      data.addColumn('string', 'Task ID');
      data.addColumn('string', 'Task Name');
      data.addColumn('string', 'Resource');
      data.addColumn('date', 'Start Date');
      data.addColumn('date', 'End Date');
      data.addColumn('number', 'Duration');
      data.addColumn('number', 'Percent Complete');
      data.addColumn('string', 'Dependencies');

      data.addRows([
        <?php                               
            echo $k;
        ?>
      ]);

      var options = {
        height: 400,
        gantt: {
          trackHeight: 30
        }
      };

      var chart = new google.visualization.Gantt(document.getElementById('chart_div'));

      chart.draw(data, options);
    }
  </script>
</head>
<body>
  <div id="chart_div"></div>
</body>
</html>