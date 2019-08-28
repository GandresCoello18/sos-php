<?php

// Include config file
require_once "config.php";

$SECRET = "854ACDAFCC7896B9815A3652D";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "GET"){

	$response = "";
	$procesar = true;
	
	if(empty(trim($_GET["t"]))){
		$response .= "Token vacio.";
		$procesar = false;
	}else{
		$token = trim($_GET["t"]);
	}

	if(empty(trim($_GET["u"]))){
		$response .= "Usuario vacio";
		$procesar = false;
	}else{
		$usuario = trim($_GET["u"]);
	}

	if(empty(trim($_GET["lat"]))){
		$response .= "Latitud vacia";
		$procesar = false;
	}else{
		$latitud = trim($_GET["lat"]);
	}

	if(empty(trim($_GET["lon"]))){
		$response .= "Longitud vacia";
		$procesar = false;
	}else{
		$longitud = trim($_GET["lon"]);
	}

	if (!$procesar){
		echo $response;
		exit;
	}

	if ($token != $SECRET){
		echo "Token incorrecto";
		exit;
	}

	$sql = "INSERT INTO notificaciones (fecha, usuario, latitude, longitude) VALUES (:fecha, :usuario, :latitud, :longitud)";

	if($stmt = $pdo->prepare($sql)){
		$stmt->bindParam(":fecha", $param_fecha, PDO::PARAM_STR);
		$stmt->bindParam(":usuario", $param_usuario, PDO::PARAM_STR);
		$stmt->bindParam(":latitud", $param_lat, PDO::PARAM_STR);
		$stmt->bindParam(":longitud", $param_lon, PDO::PARAM_STR);

		$param_fecha = date("Y-m-d H:i:s");
		$param_usuario = $usuario;
		$param_lat = $latitud;
		$param_lon = $longitud;

		if($stmt->execute()){
            echo "Notificación recibida " . $param_fecha;
        } else{
            echo "Error: No se pudo registrar la notificación.";
        }
	}
}