<?php
/*
define('DB_HOST', "localhost");
define('DB_USER', "u590198431_jwellery");
define('DB_PASSWORD', "So9685861552@#");
define('DB_DATABASE', "u590198431_jwellery"); */

define('DB_HOST', "localhost");
define('DB_USER', "u404061508_srfcnew");
define('DB_PASSWORD', "So9685861552@");
define('DB_DATABASE', "u404061508_srfcnew");
// Create connection
$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql_details = array('user' => DB_USER, 'pass' => DB_PASSWORD, 'db' => DB_DATABASE, 'host' => DB_HOST);
?>