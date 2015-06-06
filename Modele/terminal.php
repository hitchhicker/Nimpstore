<?php
include 'connect_db.php';
error_reporting(E_ALL);
function get_terminal($email)
{
/*** prepare the select statement ***/
	// WHERE clientUser = :email");
	$sql = $GLOBALS['conn']->prepare("SELECT numSerie, typeModele FROM Terminal WHERE clientUser = :email;"); 
    /*** bind the parameters ***/
    $sql->bindParam(':email', $email, PDO::PARAM_STR);
    /*** execute the prepared statement ***/
    $sql->execute(); 

    return $sql;
}

function ajouteTerminal($email,$numSerie,$designation,$se,$version,$constru)
{
	//typeModele varchar(50) references Modele(designation) NOT NULL
	//donc ajoute des info dans le table Modele

	//get ID du systeme exploitation
	$id_SE = getIdDuSE($version,$se);

	//ajoute une nouvelle modele
	$sql = $GLOBALS['conn']->prepare("INSERT INTO Modele VALUES (:designation, :nomConstructeur, :idDuSyst);");
    /*** bind the parameters ***/
    //TODO
    $sql->debugDumpParams();
    $sql->bindParam(':designation', $designation, PDO::PARAM_STR);
    $sql->bindParam(':nomConstructeur', $constru, PDO::PARAM_STR);
    $sql->bindParam(':idDuSyst', $id_SE, PDO::PARAM_INT);
    /*** execute the prepared statement ***/
    $sql->execute();
    //ajoute un terminal
    //dans ce cas la idAchatSimple egale NULL
    $sql2 = $GLOBALS['conn']-> prepare("INSERT INTO Terminal (numSerie, typeModele,clientUser) 
    	VALUES (:numSerie, :typeModele, :clientUser);");

    $sql2->bindParam(':numSerie', $numSerie, PDO::PARAM_STR);
    $sql2->bindParam(':typeModele', $designation, PDO::PARAM_STR);
    $sql2->bindParam(':clientUser', $email, PDO::PARAM_STR);

    $sql2->execute();
}

// function supprimerTerminal($numSerie)
// {
// 	//supprimer le terminal selon le numero de serie
// 	$sql = $GLOBALS['conn']->prepare("DELETE FROM Terminal WHERE numSerie=:numSerie;");
// 	$sql->bindParam(':numSerie', $numSerie, PDO::PARAM_STR);
// 	$sql->excute();
// }

function getIdDuSE($version,$nom)
{
	//recupere ID du systeme exploitation selon la version et le nom
	$sql = $GLOBALS['conn']->prepare("SELECT id FROM Systemeexploitation se WHERE se.versiona = :version AND se.nom = :nom;");
	//lier des parametres
	$sql->bindParam(':version',$version,PDO::PARAM_STR);

	$sql->bindParam(':nom',$nom,PDO::PARAM_STR);

	$sql->debugDumpParams();
	//excute le sql
	$sql->execute();

	$res = $sql->fetch(PDO::FETCH_BOTH);

	return $res[0];

}
