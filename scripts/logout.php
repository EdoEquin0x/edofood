<?php

//Script de déconnexion, on déconnecte l'utilisateur et on le renvoie sur la page d'accueil

session_start();
session_destroy();
header('Location: ../index.php');
?>