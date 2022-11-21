<?php
require_once '../database/init.php';

if (isset($_POST["logincommand"])) { //Si la page est affichée suite à la bonne requête
        $login = $_POST["login"];
        $password = $_POST["password"];

    //On ammorce la requete qui va permettre de réaliser toutes les vérifications
    $loginrequest = $ddb->prepare("SELECT * FROM users WHERE login = '$login'");
    $loginrequest->execute();
    $loginrequest = $loginrequest->fetch();

    //L'utilisateur n'existe pas, donc on le renvoie sur la page de connexion, on insère en get le login pour l'intégrer directement
    // dans la barre (pour éviter que l'user aie à le retaper) et on lui affichera un petit message d'erreur
    if ($loginrequest == false) {header("location: ../login.php?notexisting=true&login=$login");}
    else {
        //L'utilisateur existe, on peux vérifier le mdp
        if (password_verify($password, $loginrequest['password']) == true) { //Le mot de passe est le bon, on connecte l'utilisateur à son compte
            session_start();
            //On défini le niveau de permission de l'utilisateur en raccord à celui qu'il possède sur la BDD
            if ($loginrequest['authlevel'] == 'User'){$_SESSION["authlevel"] = 'User';}
            if ($loginrequest['authlevel'] == 'Seller'){$_SESSION["authlevel"] = 'Seller';}
                                   
            $_SESSION["Email"] = $login; //On stocke l'email de l'utilisateur dans la session, ça pourrai servir                                    
            header("location: ../index.php"); //On le renvoie sur la page d'accueil, désormais en tant qu'utilisateur connecté
        }
        else { //Le mot de passe est pas le bon, donc on renvoie l'user à la page de connexion avec un message de mdp érroné et on réinsère son login pour le confort
            header("location: ../login.php?wrongpassword=true&login=$login");
        }

    }
}
else { // Si la page est affichée suite à une requete non autorisée, on renvoie l'utilisateur sur la page principale
    header("location: ../index.php");
}












    





