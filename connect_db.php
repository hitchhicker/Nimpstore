<?php

// $host="localhost";
// $port="5432";
// $dbName="postgres";
// $user="postgres";
// $password="asd123zxc";
// $dsn = "pgsql:host=$host;port=$port;dbname=$dbName;user=$user;password=$password";

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
