<?php

$vuelo = new Vuelo();
$vuelos = $vuelo->consultarPorOrigen();

$id = $_SESSION["id"];
if ($_SESSION["rol"] != "admin") {
    header('Location: ?pid=' . base64_encode("noAutorizado.php"));
}
//$admin = new Admin($id);
//$admin->consultarPorId();
?>

    <div class="container">
        <div class="row mt-5">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h3>Destinos</h3>
                    </div>
                    <div class="card-body">
                    	<div id="destinosPie" style="width: 600px; height: 400px;"></div>

                    </div>
                </div>
            </div>
        </div>
    </div>

<script type="text/javascript">
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
    var data = google.visualization.arrayToDataTable([
      ['Destino', 'Cantidad'],
      <?php 
      foreach ($vuelos as $d){
        echo "['" . $d[0] . "', " . $d[1] . "],\n";
      }
      ?>
    ]);
    
    var options = {
      title: 'Vuelos por Destino',
      pieHole: 0.4
    };
    
    var chart = new google.visualization.PieChart(document.getElementById('destinosPie'));
    
    chart.draw(data, options);
}
</script>


