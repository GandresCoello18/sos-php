<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
// https://www.tutorialrepublic.com/php-tutorial/php-mysql-login-system.php
define('DB_SERVER', 'remotemysql.com');
define('DB_USERNAME', 'p7wbe4fKzY');
define('DB_PASSWORD', '97UnoLaBA5');
define('DB_NAME', 'p7wbe4fKzY');
 
/* Attempt to connect to MySQL database */
try{
    $pdo = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    die("ERROR: Could not connect. " . $e->getMessage());
}
?>
