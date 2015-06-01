<?php

include 'connect_db.php';   

function create_user($email,$password)
{
    $stmt = $GLOBALS['conn']->prepare("INSERT INTO Client VALUES (:email, :password )");
    /*** bind the parameters ***/
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':password', $password, PDO::PARAM_STR, 40);
    /*** execute the prepared statement ***/
    $stmt->execute();
}
function get_email($email,$password)
{
/*** prepare the select statement ***/
    $stmt = $GLOBALS['conn']->prepare("SELECT email, password FROM Client 
	WHERE email = :email AND password = :password");
    /*** bind the parameters ***/
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':password', $password, PDO::PARAM_STR, 40);
    /*** execute the prepared statement ***/
    $stmt->execute(); 
    /*** check for a result ***/
    $res = $stmt->fetchColumn(0); //recuperer l'email
    // echo $res;
    return $res;
}
