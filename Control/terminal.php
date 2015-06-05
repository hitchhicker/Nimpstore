<?php
include 'Modele/terminal.php';
error_reporting(E_ALL);	

if(isset($_GET['action']))
{
	switch($_GET['action'])
	{
		case 'ajouterForm':
			include 'Vue/terminal/ajouter.php';
			break;
		case 'supprimerForm':
			supprimerForm();
			break;
		case 'ajouterTerminal':
		{
			if(isset($_GET['numSerie'])&&isset($_GET['designation'])&&isset($_GET['se'])&&isset($_GET['version'])&&($_GET['constru']))
			{
				ajouteTerminal($_SESSION['user_email'],$_GET['numSerie'],$_GET['designation'],$_GET['se'],$_GET['version'],$_GET['constru']);
				header("Location:./index.php?modele=terminal");
			}
			else
			{
				$message="error";
				echo "<script language=\"JavaScript\">\r\n"; 
			    echo " alert('$message');\r\n"; 
			    echo " history.back();\r\n"; 
			    echo "</script>"; 
			}	
		}
			break;
	}
}
else
{
		
	$sql = get_terminal($_SESSION['user_email']);
	
	include 'Vue/terminal/affichage.php'; //afficher tous les terminaux.
	
}

function supprimerForm()
{
	//TODO
	//quand on supprime, il faut supprimer tous les liens les reference quoi......
	supprimerTerminal($_GET['numSerie']);
}

