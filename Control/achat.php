<?php
include 'Modele/achat.php';
include 'Vue/achat.php';

if(isset($_GET['action']))
{
	switch ($_GET['action']){
		case 'savoirplus':
			savoirplus();
			break;
		
		case 'acheter':
			acheter();
			break;
	}
	if(isset($_GET['note'])&&isset($_GET['commentaire']))
		if(isset($_SESSION['user_email']))
			commenter($_GET['note'],$_GET['commentaire'],$_SESSION['user_email'],$_GET['application']);
		else
			$message = "vous etes pas connecte!";
}
else
{
	if(isset($_GET['systeme']))
	{
		$res = get_app_du_systeme($_GET['systeme']);
	}
	else 
	{
		$res = get_all_app();
	}
	include 'Vue/achat/application.php';
}


function savoirplus()
{
	$res_app = get_app($_GET['application']);
	$res_res = get_resssouce($_GET['application']);
	$res_com = get_commentaire($_GET['application']);
	$res_note = get_note_moyenne($_GET['application']);
	include 'Vue/achat/detailAPP.php';
}

if(!empty($message))
{
	echo "<script language=\"JavaScript\">\r\n"; 
	echo " alert('$message');\r\n"; 
	echo " history.back();\r\n"; 
	echo "</script>";
}