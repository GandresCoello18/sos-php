<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
 
// Include config file
require_once "config.php";

// Prepare a select statement
$sql = "DELETE FROM notificaciones";

$stmt = $pdo->prepare($sql);
$stmt->execute();

header("location: login.php");
exit;