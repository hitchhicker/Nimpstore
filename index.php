<?php
session_start();

include 'Vue/header_base.php';
// echo (isset($_POST['action']));

include 'Control/connection.php';

if(isset($_REQUEST['modele']))
{
	include 'Control/'.$_REQUEST['modele'].'.php';
}
else 
{
	include 'Control/acceuil.php';
}

 include'Vue/fin.php';
?>
