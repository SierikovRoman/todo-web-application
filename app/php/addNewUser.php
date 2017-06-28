<?php
session_start();
require_once 'db_connection.php';
require '../../app/libs/PHPMailer-master/PHPMailerAutoload.php';

$data = json_decode(file_get_contents("php://input"));

$name = pg_escape_string($con, $data->name);
$surname = pg_escape_string($con, $data->surname);
$email = pg_escape_string($con, $data->email);
$password = md5(pg_escape_string($con, $data->password));

$new_user = "Your system has new user $surname $name $email";

$query = pg_query("SELECT * FROM public.user WHERE email = '$email' ");

$member = pg_fetch_array($query);
// echo $member;
// if ($member == null) {
// 	echo "pusto";
// }elseif($member !== null){
// 	echo "ne pusto";
// }

// Erors:
// 1 - sorry, this email already in system 

if ($member == null) {

	$query = pg_query("INSERT INTO public.user(name, surname, email, password) VALUES ('$name', '$surname', '$email', '$password')");
	echo "true";

	$mail = new PHPMailer(true);

	// $mail->SMTPDebug = 1;                                 // Enable verbose debug output

	$mail->isSMTP();                                      // Set mailer to use SMTP
	$mail->Host = 'smtp.gmail.com';  					  // Specify main and backup SMTP servers
	$mail->SMTPAuth = true;                               // Enable SMTP authentication
	$mail->Username = 'fortestingprojectcs@gmail.com';    // SMTP username
	$mail->Password = 'fortestingsystem';                 // SMTP password
	$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
	$mail->Port = 587;                                    // TCP port to connect to //or 587

	$mail->setFrom('todo_system@gmail.com', 'Todo System');   // System email & name
	$mail->addAddress('rebit1love@gmail.com', 'Romek');       // Add a recipient name is optional
	$mail->addReplyTo('todo_system@gmail.com', 'Information');
	// $mail->AddCC('infest0final@gmail.com', 'Mykola');

	$mail->isHTML(true);                                  // Set email format to HTML

	$mail->Subject = 'New user';
	$mail->Body    = $new_user;
	// $mail->AltBody = $new_user;

	$mail->send();

	// if(!$mail->send()) {
	//     echo 'Message could not be sent.';
	//     echo 'Mailer Error: ' . $mail->ErrorInfo;
	// } else {
	//     echo 'Message has been sent';
	// }

}elseif ($member !== null) {
	echo "error:_mail_is_already_exist_in_system";
}


$_SESSION['id']=$member['id'];
?>