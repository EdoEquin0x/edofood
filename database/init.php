<?php

$db="edofood";
$dbhost="localhost";
$dbport=3306;
$dbuser="root";
$dbpasswd="";

$ddb = new PDO('mysql:host='.$dbhost.';port='.$dbport.';dbname='.$db.'', $dbuser, $dbpasswd);


if (!$ddb) {
    die("Erreur: Connexion à la base de donnée échouée");
}
else {
}
