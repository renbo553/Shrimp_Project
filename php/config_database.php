<?php
/* 
 * Database credentials.
 * Assuming you are running MySQL server with default setting.
 * (user 'root' with no password)
 */
define('DB_SERVER', '127.0.0.1');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'shrimp');
 
/* Create connection to MySQL database */
$mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
// Check connection
if($mysqli->connect_error){
    // connection failed
    die("ERROR: Connection failed: " . $mysqli->connect_error);
}

// Configure character set and time zone
$mysqli->query('SET NAMES UTF8');
$mysqli->query('SET time_zone = "+8:00"');

?>