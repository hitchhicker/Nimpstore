<?php
include 'Modele/achat.php';
include 'Modele/terminal.php';
include 'Vue//achat/achat.php';

if(isset($_GET['action']))
{
	switch ($_GET['action']){
		case 'savoirplus':
			savoirplus();
			break;
		
		case 'acheter':
			acheter();
			break;
		case 'confirmer':
			if(isset($_SESSION['user_email']))
			{
				if(!empty($_GET['carte']))
					confirmer();				
				else
					$message = "Numero de la carte est vide";
			}
			else
				$message = "Vous ne pouvez pas acheter sans connecter !";	
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
		if($_GET['systeme'] == 'Autre')
			$res = get_app_du_autre_system();
		else 
			$res = get_app_du_systeme($_GET['systeme']);
	}
	else 
	{
		if(isset($_GET['terminal']) && $_GET['terminal']!='Tout')
			$res = showbyterminal();
		else
			$res = get_all_app();
	}
	include 'Vue/achat/application.php';
}

if(!empty($message))
{
	echo "<script language=\"JavaScript\">\r\n"; 
	echo " alert('$message');\r\n"; 
	echo " history.back();\r\n"; 
	echo "</script>";
}

function savoirplus()
{
	$res_app = get_app($_GET['application']);
	$res_res = get_resssouce($_GET['application']);
	$res_com = get_commentaire($_GET['application']);
	$res_editeur = get_editeur_saisir_application($_GET['application']);
	$res_note = get_note_moyenne($_GET['application']);

	include 'Vue/achat/detailAPP.php';
}

function acheter()
{
	include 'Vue/achat/achat_simple.php';
}

function confirmer()
{
		if($_GET['optionsPay']=='cb')	
			acheter_simple_cb($_SESSION['user_email'],$_GET['carte'],$_GET['article']);
		else //TO DISCUSS !!!!
		{
			$toto=NULL; 
		}
}
function showbyterminal()
{
	if(isset($_SESSION['user_email']))
	{
		return get_app_by_terminal($_GET['terminal']);
	}
}
