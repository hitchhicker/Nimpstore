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
			include 'Vue/terminal/supprimer.php';
			supprimerForm();
			break;
		case 'supprimerTerminal':
			supprimerTerminal();
			break;
		case 'ajouterTerminal':
		{
			if(isset($_GET['numSerie'])&&isset($_GET['designation'])&&isset($_GET['se'])&&isset($_GET['version'])&&($_GET['constru']))
			{
				$nombre_terminal = check_nombre_de_terminal($_SESSION['user_email']);
				if($nombre_terminal <5)
				{
					ajouteTerminal($_SESSION['user_email'],$_GET['numSerie'],$_GET['designation'],$_GET['se'],$_GET['version'],$_GET['constru']);
					include 'Vue/terminal/ajoute_reusit.php';
				}
				else 
				{
					$message = "plus de 5, error!";			
				}
			}
			else
			{
				$message="error";
			}	
			if(!empty($message))
			{
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

function supprimerTerminal()
{
	supprimer_terminal($_GET['terminal'],$_SESSION['user_email']);
	include 'Vue/terminal/supprime_reusit.php';
}