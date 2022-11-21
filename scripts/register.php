<?php

require_once '../database/init.php';

if (isset($_POST["registersubmit"])) { // On vérifie la validité de la requête qui affiche la page
    $login = $_POST["registeremail"];
    $password = $_POST["registerpassword"]; //On stocke les infos de l'utilisateur
    $confirmpassword = $_POST["confirmpassword"];

    //On ammorce la requete qui va permettre de réaliser toutes les vérifications
    $loginrequest = $ddb->prepare("SELECT * FROM users WHERE login = '$login'");
    $loginrequest->execute();
    $loginrequest = $loginrequest->fetch();

    if ($loginrequest == false) { // Aucun utilisateur avec un login similaire n'existe, on peux continuer la procédure 
        if (isset($_POST["registersubmit"])) { // On vérifie la validité de la requête qui affiche la page
            

            if ($password === $confirmpassword) { //Si le mot de passe et la confirmation matchent
                $registeruser = "INSERT INTO users VALUES (?, ?, ?, ?)";
                $registeruser = $ddb->prepare($registeruser);
                $registeruser->execute(array(0, $login, password_hash($password, PASSWORD_BCRYPT), 'User'));
                header("location: ../login.php?login=$login"); //L'utilisateur est créer, on l'envoie sur la page de connexion pour se connecter

        
            }
            else { //On renvoie l'utilisateur sur la page en le prévenant que les mdps ne matchent pas
                header("location: ../register.php?passwordmismatch=true&login=$login"); 
            }
        
        
        
        }

    }
    else { //On renvoie l'utilisateur sur la page en le prévenant qu'un utilisateur existe déjà
        header("location: ../register.php?alreadyexist=true&login=$login");
    }


}    
else { // Si la page est affichée suite à une requete non autorisée, on renvoie l'utilisateur sur la page principale
    header("location: ../index.php");
}