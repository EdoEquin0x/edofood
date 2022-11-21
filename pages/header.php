<?php 
    session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="icon" type="image/png" sizes="32x32" href="./assets/EdofoodLogoSmall.png">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

  <title>EdoFood</title>


  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
  <script src="scripts/cart.js" defer></script>
  <script src="scripts/header.js" defer></script>
  <script src="scripts/navbar.js" defer></script>

  <style>body {font-family: 'Oswald', sans-serif;}</style>
  <link rel="stylesheet" href="style/header.css">

</head>


<header id="header">

    
    
            
    <div class="navmenu" id="navmenu">
        <nav> <!-- Ici je vais devoir mettre des icones à la place, pour rendre l'interface plus présentable -->
            <?php
            if (isset($_SESSION["authlevel"])) {
                if ($_SESSION["authlevel"] == 'User') { // L'utilisateur peux accéder à son panier
                    ?>
                    <div class="headernav">
                      <a href="index.php" id="index">Accueil</a>
                      <a href="selection.php" id="selection">Produits</a>
                    </div>
                    <div class="headerbrand">
                      <img src="assets/EdofoodLogoLarge.png" width=90px height=70px></img>
                    </div>
                    <div class="headeraction">
                      <a href="#" data-toggle="modal" data-target="#cart">Panier</a>
                      <a href="scripts/logout.php" id="logout">Déconnexion</a>
                    </div>
                    
                    <div class="headernavmobile">
                      <a href="index.php" class="material-symbols-outlined headericon" id="index2">home</a>
                      <a href="selection.php" class="material-symbols-outlined headericon" id="selection2">store</a>
                    </div>
                    <div class="headerbrandmobile">
                      <img src="assets/EdofoodLogoLarge.png" width=90px height=70px></img>
                    </div>
                    <div class="headeractionmobile">
                      <a href="#" class="material-symbols-outlined headericon" data-toggle="modal" data-target="#cart">shopping_cart</a>
                      <a href="scripts/logout.php" class="material-symbols-outlined headericon" id="logout2">logout</a>
                    </div>
                    
                    
                    
                <?php
                }
                else if ($_SESSION["authlevel"] == 'Seller') { //L'accès complet, le seller (entre-autre l'admin) possède l'accès à toute les pages ainsi qu'à son pannel
                    ?>
                    <div class="headernav">
                      <a href="index.php" id="index">Accueil</a>
                      <a href="selection.php" id="selection">Produits</a>
                    </div>
                    <div class="headerbrand">
                      <img src="assets/EdofoodLogoLarge.png" width=180px height=140px></img>
                    </div>
                    <div class="headeraction">
                      <a href="#" data-toggle="modal" data-target="#cart">Panier</a>
                      <a href="pannel.php" id="panel">Pannel</a>
                      <a href="scripts/logout.php" id="logout">Déconnexion</a>
                    </div>

                    <div class="headernavmobile">
                      <a href="index.php" class="material-symbols-outlined headericon" id="index2">home</a>
                      <a href="selection.php" class="material-symbols-outlined headericon" id="selection2">store</a>
                    </div>
                    <div class="headerbrandmobile">
                      <img src="assets/EdofoodLogoLarge.png" width=90px height=70px></img>
                    </div>
                    <div class="headeractionmobile">
                      <a href="#" class="material-symbols-outlined headericon" data-toggle="modal" data-target="#cart">shopping_cart</a>
                      <a href="pannel.php" class="material-symbols-outlined headericon" id="panel2">admin_panel_settings</a>
                      <a href="scripts/logout.php" class="material-symbols-outlined headericon" id="logout2">logout</a>
                    </div>









                <?php
                }
            }
            else { //Dans le cas ou l'utilisateur n'est pas connecté, on lui interdit l'accès au panier et on lui propose sois de se connecter, sois de créer un compte,
                // on lui laisse cependant l'accès au catalogue et à la page d'accueil 
                ?> 
                <div class="headernav">
                  <a href="index.php" id="index">Accueil</a>
                  <a href="selection.php" id="selection">Produits</a>
                </div>
                <div class="headerbrand">
                <img src="assets/EdofoodLogoLarge.png" width=180px height=140px></img>
                </div>
                <div class="headeraction">
                  <a href="login.php" id="login">Connexion</a>
                  <a href="register.php" id="register">S'inscrire</a>
                </div>



                <div class="headernavmobile">
                  <a href="index.php" class="material-symbols-outlined headericon" id="index2">home</a>
                  <a href="selection.php" class="material-symbols-outlined headericon" id="selection2">store</a>
                </div>
                <div class="headerbrandmobile">
                <img src="assets/EdofoodLogoLarge.png" width=180px height=140px></img>
                </div>
                <div class="headeractionmobile">
                  <a href="login.php" class="material-symbols-outlined headericon" id="login2">login</a>
                  <a href="register.php" class="material-symbols-outlined headericon" id="register2">person_add</a>
                </div>
                <?php
            }
            




            ?>
            
        </nav>

    </div>

</header>

<div class="modal fade" id="cart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content" id="cartdisplay">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">🛒 VOTRE PANIER</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="show-cart table">
          
        </div>
        <div class="total-cartcontainer">
          Prix Total: <span class="total-cart"></span>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="" data-dismiss="modal">Fermer</button>
        
        <button type="button" class="clear-cart">Vider le panier</button>
        <button type="button" class="">Commander</button>
      </div>
    </div>
  </div>
</div> 
