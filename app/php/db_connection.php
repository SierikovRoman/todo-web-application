<?php
// Connecting to database as mysqli_connect("hostname", "username", "password", "database name");

$con = pg_connect("
	host=ec2-107-21-99-176.compute-1.amazonaws.com 
	port=5432 
	dbname=d3c61t0ne622qg 
	user=vusnbpashokbzw 
	password=c383cb26bab0ebb3e8fa35ec2e0af395377952cfc9f48013e852c280c4f104e1
	") or die("Could not connect" . pg_last_error());

// $stat = pg_connection_status($con);
// if ($stat === PGSQL_CONNECTION_OK) {
//   echo 'Connection status ok';
// } else {
//   echo 'Connection status bad';
// }
?>