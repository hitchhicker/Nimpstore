<?php
include 'Modele/historique.php';
if(isset($_GET['action']))
{
	switch ($_GET['action']) {
		case 'showinstallation':
			showinstallation();
			break;		
		case 'showachat':
			showachat();
			break;
		case 'installer_form':
			include	'Vue/historique/installer_form.php';
			break;
		case 'installer':
		// echo '<p>dd</p>';
			installer();
			break;
	}
}
function showinstallation()
{
	$res_inst = show_installation();
	include 'Vue/historique/installation.php';
}
function showachat()
{
	$res_simple = show_achat_simple($_SESSION['user_email']);
	$res_auto = show_achat_automatique($_SESSION['user_email']);
	$res_defini = show_achat_defeni($_SESSION['user_email']);	
	include 'Vue/historique/histo_achat.php';
}
function installer()
{
	installe($_GET['terminal'],$_GET['article']);
	include 'Vue/historique/installe_reusit.php';
}