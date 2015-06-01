<?php
if(isset($_SESSION['user_email']))
{
	include 'Vue/connection/logged_in.php';
}
else 
{
	include 'Vue/connection/connect_form.php';
}