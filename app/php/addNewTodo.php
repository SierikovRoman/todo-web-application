<?php 
require_once 'db_connection.php';

$data = json_decode(file_get_contents("php://input")); 

$name = pg_escape_string($con, $data->name);
$detail = pg_escape_string($con, $data->detail);
$list_id = pg_escape_string($con, $data->list_id);
$priority_id = pg_escape_string($con, $data->priority_id);
$date_created = date("Y-m-d");
$date_assigned = pg_escape_string($con, $data->date_assigned);
$date_deadline = pg_escape_string($con, $data->date_deadline);
$is_done = 'false';


$query = "INSERT INTO card(name, detail, list_id, date_created, date_assigned, date_deadline, is_done, priority_id) VALUES ('$name', '$detail', $list_id, '$date_created', '$date_assigned', '$date_deadline', $is_done, $priority_id);";

$result = pg_query($con, $query);
echo true;

?>