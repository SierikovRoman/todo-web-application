<?php 
// Including database connections
require_once 'db_connection.php';

// Fetching and decoding the inserted data
$data = json_decode(file_get_contents("php://input")); 

// Escaping special characters from submitting data & storing in new variables.
$title = pg_escape_string($con, $data->title);
$description = pg_escape_string($con, $data->description);
$category_id = pg_escape_string($con, $data->category);
$priority_id = pg_escape_string($con, $data->position);
$date = date("y.m.d");

// pg insert query
$query = "INSERT INTO card(name, description, category_id, priority_id, date)
				 VALUES (t$titleitle, d$descriptionescription, '$category_id', '$priority_id', d$dateate);";

	// VALUES ('test', 'test', 'test', '2', '0', '12345');";


// Inserting data into database
$result = pg_query($con, $query);
echo true;

?>