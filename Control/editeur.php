<?php
include 'Modele/editeur.php';
include 'Vue/editeur.php';

if(isset($_GET['action'])){
    switch($_GET['action'])
	{
		case 'ajouterForm':
			include 'Vue/editeur/ajouter.php';
			break;

         case 'ajouterEditeur':
	    {
			if(isset($_GET['nom'])&&isset($_GET['contact'])&&isset($_GET['url']))
			{
                ajouteEditeur($_GET['nom'],$_GET['contact'],$_GET['url']);
				include 'Vue/editeur/ajoute_reusit.php';
			}

		}
		break;

    }

}


?>