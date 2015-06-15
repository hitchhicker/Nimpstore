<?php
include 'connect_db.php';

function showinstallation_by_user($email)
{
	$sql = $GLOBALS['conn']->prepare("SELECT * FROM Installation;"); 
	$sql->execute();
	return $sql;
}

function show_achat_simple($email)
{
	$sql = $GLOBALS['conn']->prepare("SELECT titre, dateDePaiment 
	FROM  AchatSimple
	WHERE idclient=:email;"); 
	$sql->bindParam(':email', $email, PDO::PARAM_STR);
	$sql->execute();
	return $sql;
}
function show_achat_automatique($email)
{
	$sql = $GLOBALS['conn']->prepare("SELECT titre, dateDePaiment 
	FROM  Automatique
	WHERE idclient=:email");
	$sql->bindParam(':email', $email, PDO::PARAM_STR);
	$sql->execute();
	return $sql;
}

function show_achat_defeni($email)
{
	$sql = $GLOBALS['conn']->prepare("SELECT titre, dateDePaiment 
	FROM  Defini
	WHERE idclient=:email");
	$sql->bindParam(':email', $email, PDO::PARAM_STR);
	$sql->execute();
	return $sql;
}

function get_terminal_by_app($email,$application)
{
	$sql = $GLOBALS['conn']->prepare("SELECT mod.designation
	FROM terminal ter, modele mod, compatibleavec com
	WHERE ter.clientuser=:email
	AND ter.typemodele = mod.designation
	AND com.titrea = :application
	AND mod.iddusyst = com.iddusyst;");
	
	$sql->bindParam(':email', $email, PDO::PARAM_STR);
	$sql->bindParam(':application', $application, PDO::PARAM_STR);
	$sql->execute();
	return $sql;
}

function installe($terminal,$article,$email)
{
	$sql = $GLOBALS['conn']->prepare("SELECT numserie FROM terminal 
	WHERE typemodele=:terminal
	AND clientuser=:email 
	;");
	//get the number of terminal
	
	$sql->bindParam(':terminal', $terminal, PDO::PARAM_STR);
	$sql->bindParam(':email', $email, PDO::PARAM_STR);
	$sql->execute();
	$row = $sql->fetch(PDO::FETCH_BOTH);
	$numserie = $row[0];
	// echo '<p>'.$numserie.'</p>';

	$sql = $GLOBALS['conn']->prepare("INSERT INTO installation
	VALUES (:numserie,:article,CURRENT_DATE);");
	$sql->bindParam(':numserie', $numserie, PDO::PARAM_STR);
	$sql->bindParam(':article', $article, PDO::PARAM_STR);
	$sql->execute();
}