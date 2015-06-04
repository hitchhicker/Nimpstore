<?php
include 'connect_db.php';
function get_terminal($email)
{
/*** prepare the select statement ***/
 //    $sql = $GLOBALS['conn']->prepare("SELECT numSerie, typeModele FROM Terminal 
	// WHERE clientUser = :email");
	$sql = $GLOBALS['conn']->prepare("SELECT numSerie, typeModele FROM Terminal WHERE clientUser = :email;"); 
    /*** bind the parameters ***/
    $sql->bindParam(':email', $email, PDO::PARAM_STR);
    /*** execute the prepared statement ***/
    $sql->execute(); 

    return $sql;
}