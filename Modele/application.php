<?php
include 'connect_db.php';

function ajouteApp($titre)
{
		 $sql = $GLOBALS['conn']->prepare("INSERT INTO Application VALUES (:titre);");
		 $sql->bindParam(':titre', $titre, PDO::PARAM_STR);
	    /*** execute the prepared statement ***/
	    $sql->execute(); 
}

function ajouteArticle($titre,$ID_editeur,$prix)
{
		 $sql = $GLOBALS['conn']->prepare("INSERT INTO Article VALUES (:titre, :editeur, :prix);");
		 $sql->bindParam(':titre', $titre, PDO::PARAM_STR);
		 $sql->bindParam(':editeur', $ID_editeur, PDO::PARAM_INT);
		 //il n'y pas de data type du Float dans PDO, donc PARAM_STR
		 $sql->bindParam(':prix', $prix, PDO::PARAM_STR); 

	    /*** execute the prepared statement ***/
	    $sql->execute(); 
}

function ajouteEditeur($nom,$contact,$url)
{
	 $sql = $GLOBALS['conn']->prepare("INSERT INTO Editeur VALUES (nextval('editeur_id_seq'), :nom, :contact, :url);");
	 $sql->bindParam(':nom', $nom, PDO::PARAM_STR);
	 $sql->bindParam(':contact', $contact, PDO::PARAM_INT);
	 //il n'y pas de data type du Float dans PDO, donc PARAM_STR
	 $sql->bindParam(':url', $url, PDO::PARAM_STR);

	 $sql->execute(); 
}