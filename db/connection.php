<?php
$servername = $_SERVER['HTTP_HOST'];
$username   = 'root';
$password   = '';
$db         = 'medicine-inventory';
// Connection to database.
$conn = mysqli_connect( $servername, $username, $password, $db ) or die( 'Connection Failed' );
?>