<?php
include 'Modele/terminal.php';
$message ='test';
// echo "ici";
if(isset($_GET['action']))
{
	include 'Vue/'.$_GET['action'].'.php'; //TODO!!!
}
else
{
	// $email = filter_var($_SESSION['user_email'], FILTER_SANITIZE_STRING);
	$sql = get_terminal($_SESSION['user_email']);

	include 'Vue/terminal.php';
}