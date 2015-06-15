<?php
include 'connect_db.php';

function ajouteEditeur($nom,$contact,$url)
{
	//ajoute une nouvelle modele
	$sql = $GLOBALS['conn']->prepare("INSERT INTO Editeur VALUES (nextval('editeur_id_seq'),:nom, :contact, :url);");
    /*** bind the parameters ***/
    // $sql->debugDumpParams();
    $sql->bindParam(":nom", $nom, PDO::PARAM_STR);
    $sql->bindParam(":contact", $contact, PDO::PARAM_STR);
    $sql->bindParam(":url", $url, PDO::PARAM_STR);
    /*** execute the prepared statement ***/
    $sql->execute();
}
?>