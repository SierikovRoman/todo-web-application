<?php
// Connecting to database as mysqli_connect("hostname", "username", "password", "database name");

$con = pg_connect("
	host=ec2-23-23-93-255.compute-1.amazonaws.com 
	port=5432 
	dbname=d4534uc1p8js9a 
	user=qjbfryfoxhmsdp 
	password=6fb532e056f5eeee54b4605a07183364eb1b17eda436fb19716d822942b7d772
	") or die("Could not connect" . pg_last_error());

// $stat = pg_connection_status($con);
// if ($stat === PGSQL_CONNECTION_OK) {
//   echo 'Connection status ok';
// } else {
//   echo 'Connection status bad';
// }
?>