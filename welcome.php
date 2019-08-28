<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}


// Include config file
require_once "config.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="favicon.png">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Emergencias</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.4/dist/leaflet.css"
   integrity="sha512-puBpdR0798OZvTTbP4A8Ix/l+A4dHDD0DGqYW6RQ+9jxkRFclaxxQb/SJAWZfWAkuyeQUytO7+7N4QKrDh+drA=="
   crossorigin=""/>
   <script src="https://unpkg.com/leaflet@1.3.4/dist/leaflet.js"
   integrity="sha512-nMMmRyTVoLYqjP9hrbed9S+FzjZHW5gY1TWCHA5ckwXZBadntCNs8kEqAWdrb9O7rxbCaA4lKTIWjDXZxflOcA=="
   crossorigin=""></script>
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body>
    <div class="container-fluid">
    <nav class="navbar navbar-default">

  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">
        <img alt="Alerta" src="favicon.png" height="16" width="16">
      </a>
      <a class="navbar-brand" href="#">Emergencias</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="javascript:location.reload(true);">Actualizar</a></li>
        <li><a href="delete.php">Borrar</a></li>
        <li><a href="reset-password.php">Password</a></li>
        <li><a href="logout.php">Salir</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
    <div class="row">
        <div class="col-md-12">
            <div id="mapid" style="width: 100%; height: 400px;"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <td>Fecha</td>
                        <td>Usuario</td>
                        <td>Ubicación</td>
                    </tr>
                </thead>
                <tbody id="recargarDiv">
                    <?php
                    $sql = "SELECT * FROM notificaciones order by fecha desc";

                    if($stmt = $pdo->prepare($sql)){
                        if($stmt->execute()){
                            while ($row = $stmt->fetch()) {
                                echo "<tr>";
                                echo "<td>" . $row['fecha']."</td>\n";
                                echo "<td>" . $row['usuario']."</td>\n";
                                $fecha = "'". $row['fecha'] . "'";
                                $usuario = "'". $row['usuario'] . "'";
                                $lat = $row['latitude'];
                                $lon = $row['longitude'];
                                echo '<td><button class="btn btn-warning btn-xs" onclick="mostrar('.$fecha.', '.$usuario.','.$lat.','.$lon.')">mostrar</button></td';
                                echo "</tr>";
                            }
                        }
                    }

                     ?>
                </tbody>
            </table>
        </div>
    </div>

    </div>
</body>

<script>

    var mymap = L.map('mapid').setView([-0.1920,-78.4826], 6);

    L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
        maxZoom: 18,
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
            '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>',
        id: 'mapbox.streets'
    }).addTo(mymap);

    //var marker = L.marker([-0.1943560000,-78.4848260000]).addTo(mymap);

    function mostrar(fecha, usuario, lat, lon){
        var marker = L.marker([lat,lon]).addTo(mymap);
        marker.bindPopup("<b>" + usuario + "</b><br>" + fecha);
    }

    $(document).ready(function() {
      function recargarDiv(){

        var contenido;

        $.ajax({
            // la URL para la petición
            url : 'reload.php',

            // especifica si será una petición POST o GET
            type : 'GET',

            // código a ejecutar si la petición es satisfactoria;
            // la respuesta es pasada como argumento a la función
            success : function(html) {
                $('#recargarDiv').html(html);
            },

            // código a ejecutar si la petición falla;
            // son pasados como argumentos a la función
            // el objeto de la petición en crudo y código de estatus de la petición
            error : function(xhr, status) {
                console.log('Disculpe, existió un problema');
            },

            // código a ejecutar sin importar si la petición falló o no
            complete : function(xhr, status) {
                console.log('Petición realizada');
            }
        });


      }

      setInterval(recargarDiv, 5000);
  });



</script>

</html>
