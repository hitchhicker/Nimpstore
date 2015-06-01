<?php
session_start();//

//connect to data base
// $host="localhost";
// $port="5432";
// $dbName="postgres";
// $user="postgres";
// $password="asd123zxc";

//BDD du UTC
$host="tuxa.sme.utc";
$port="5432";
$dbName="dbnf17p051";
$user="nf17p051";
$password="kjsCCyJ1";
$dsn = "pgsql:host=$host;port=$port;dbname=$dbName;user=$user;password=$password";

try{
  // create a PostgreSQL database connection
  $conn = new PDO($dsn);
}catch (PDOException $e){
  // report error message
  echo $e->getMessage();
}

include 'Vue/header_base.php';

include 'Control/connection.php';

if(isset($_GET['modele']))
{
	include 'Control/'.$_GET['modele'].'.php';
}
else 
{
	include 'Control/acceuil.php';
}

 include'Vue/fin.php';
?>