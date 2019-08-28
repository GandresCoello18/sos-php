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
