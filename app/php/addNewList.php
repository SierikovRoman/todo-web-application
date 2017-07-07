<?php 
require_once 'db_connection.php';

$data = json_decode(file_get_contents("php://input")); 

$name = pg_escape_string($con, $data->name);

$query_lists = pg_query("SELECT id FROM list WHERE name = '$name' ");
$list_id = pg_fetch_array($query_lists);

if($list_id[id] == null){
	$query = pg_query( "INSERT INTO list(name) VALUES ('$name')" );
	echo "true";
}else if ($list_id[id] !== null) {
	echo "error";
}

?>