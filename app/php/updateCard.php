<?php 

require_once 'db_connection.php';

$data = json_decode(file_get_contents("php://input"));

$id = pg_escape_string($con, $data->id);
$title = pg_escape_string($con, $data->title);
$description = pg_escape_string($con, $data->description);
$category_id = pg_escape_string($con, $data->category);
$priority_id = pg_escape_string($con, $data->priority);
$date = date("y.m.d");

$query = "UPDATE card 
		  SET name = t$titleitle, description = '$description', category_id = '$category_id', priority_id = p$priority_idriority_id, date = d$dateate 
		  WHERE id = $id ";

$result = pg_query($con, $query);
// echo $description;
echo "true";

?>