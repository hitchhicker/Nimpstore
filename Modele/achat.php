<?php
include 'connect_db.php';
function show_article()
{
    /*** prepare the select statement ***/
	$sql = $GLOBALS['conn']->prepare("SELECT titre, editeur, prix FROM article;"); 
    /*** execute the prepared statement ***/
    $sql->execute(); 
}

function add_ressource($email,$password)
{
    // $stmt = $GLOBALS['conn']->prepare("INSERT INTO Article VALUES (:titre, :editeur, :prix ,:application )");
    // /*** bind the parameters ***/
    // $stmt->bindParam(':titre', $titre, PDO::PARAM_STR);
    // $stmt->bindParam(':editeur', $editeur, PDO::PARAM_STR);
    // $stmt->bindParam(':prix', $prix, PDO::PARAM_STR);
    // $stmt->bindParam(':application', $prix, PDO::PARAM_STR);
    // /*** execute the prepared statement ***/
    // $stmt->execute();
}

function add_app($titre)
{
         $sql = $GLOBALS['conn']->prepare("INSERT INTO Application VALUES (:titre);");
         $sql->bindParam(':titre', $titre, PDO::PARAM_STR);
        /*** execute the prepared statement ***/
        $sql->execute(); 
}

function add_article($titre,$ID_editeur,$prix)
{
         $sql = $GLOBALS['conn']->prepare("INSERT INTO Article VALUES (:titre, :editeur, :prix);");
         $sql->bindParam(':titre', $titre, PDO::PARAM_STR);
         $sql->bindParam(':editeur', $ID_editeur, PDO::PARAM_INT);
         //il n'y pas de data type du Float dans PDO, donc PARAM_STR
         $sql->bindParam(':prix', $prix, PDO::PARAM_STR); 

        /*** execute the prepared statement ***/
        $sql->execute(); 
}

function add_editeur($nom,$contact,$url)
{
     $sql = $GLOBALS['conn']->prepare("INSERT INTO Editeur VALUES (nextval('editeur_id_seq'), :nom, :contact, :url);");
     $sql->bindParam(':nom', $nom, PDO::PARAM_STR);
     $sql->bindParam(':contact', $contact, PDO::PARAM_INT);
     //il n'y pas de data type du Float dans PDO, donc PARAM_STR
     $sql->bindParam(':url', $url, PDO::PARAM_STR);

     $sql->execute(); 
}

function get_resssouce($application)
{
     $sql = $GLOBALS['conn']->prepare("SELECT res.titre,art.prix FROM ressource res, application app ,article art WHERE res.application=app.titre AND app.titre= :application AND art.titre = res.titre;");
        $sql->bindParam(':application', $application, PDO::PARAM_STR);
    $sql->execute(); 

     return $sql;
    
}
function get_nom_editeur($ID_editeur)
{
     $sql = $GLOBALS['conn']->prepare("SELECT nom FROM Editeur WHERE $:id = id;");
     $sql->bindParam(':id', $ID_editeur, PDO::PARAM_INT);

     $sql->execute(); 

     $res = $sql->fetch(PDO::FETCH_BOTH);

     return $res[0];
}
function get_all_app()
{
     $sql = $GLOBALS['conn']->prepare("SELECT art.titre,edi.nom,art.prix FROM application app,article art, editeur edi WHERE app.titre=art.titre AND  edi.id=art.editeur;");
     $sql->execute();
     return $sql;
}
function get_app($application)
{
    $sql = $GLOBALS['conn']->prepare("SELECT art.titre, art.prix FROM article art WHERE art.titre =:application;");
     $sql->bindParam(':application', $application, PDO::PARAM_STR);

     $sql->execute();

     return $sql;
    
}
function commenter($note, $commentaire,$email,$titreDuTire)
{
     $sql = $GLOBALS['conn']->prepare("INSERT INTO emetUnAvis VALUES (:note, :commentaire, :email, :article);");
     $sql->bindParam(':note', $note, PDO::PARAM_INT);
     $sql->bindParam(':commentaire', $commentaire, PDO::PARAM_INT);
     $sql->bindParam(':email', $email, PDO::PARAM_STR);
     $sql->bindParam(':article', $titreDuTire, PDO::PARAM_STR);

     $sql->execute();   
}
function get_commentaire($application)
{
    $sql = $GLOBALS['conn']->prepare("SELECT * FROM emetUnAvis WHERE article = :application"); 
    $sql->bindParam(':application', $application, PDO::PARAM_STR);
    $sql->execute(); 
    return $sql;
}