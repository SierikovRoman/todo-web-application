<?php
session_start();
require_once 'db_connection.php';

$data = json_decode(file_get_contents("php://input"));

$email = pg_escape_string($con, $data->email);
$password = md5(pg_escape_string($con, $data->password));

$query = pg_query("SELECT * FROM public.user WHERE email ='$email' AND password = '$password' ");

$member = pg_fetch_array($query);

// Erors:
// 1 - sorry, your email or password is incorrect 

if ($member != null){
	echo "true";
}else{
	echo "1";
}


$_SESSION['id']=$member['id'];
?>