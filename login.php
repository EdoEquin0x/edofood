<?php include "pages/header.php";

if (isset($_GET["notexisting"])) { //Message d'erreur envoyé depuis le script d'authentification, dans le cas ou l'utilisateur n'existe pas ?> 
    <p class="error">Erreur: Cet utilisateur n'existe pas</p>
    
    <?php
}
if (isset($_GET["wrongpassword"])) {  //Message d'erreur envoyé depuis le script d'authentification, dans le cas ou le mot de passe n'est pas le bon  ?>
    <p class="error">Erreur: Le mot de passe ou le nom d'utilisateur n'est pas le bon</p>


    
    <?php
}
$languages = array("PHP", "JS", "Python");
echo(implode(',',$languages));


?>
<link rel="stylesheet" href="style/login.css">
<script src="scripts/showpassword.js"></script>


<div class="loginblock">
    <form class="loginform" action="scripts/authentification.php" method="post">
        <h2>Connexion</h2>
        <div class="Formblock">
            <p class="material-symbols-outlined inputicon">person</p>
            <input type="text" name="login" placeholder="Adresse Email" required pattern="[^ @]*@[^ @]*" value="<?php if (isset($_GET["login"])) {echo $_GET["login"];} ?>" title="L'adresse email doit contenir une arobase (@) et se terminer par un nom de domaine (.fr, .com etc).">
            <p class="placeholder">Addresse email</p>
        </div>  
        <br>
        <div class="Formblock">
            <p class="material-symbols-outlined inputicon">lock</p>
            <input id="passwordfield" type="password" name="password" placeholder="Mot de passe" required title="Le mot de passe doit comporter au minimum 8 caractères, une minuscule, une majuscule, un chiffre et un caractère spécial." required>
            <p class="placeholder">Mot de passe</p>
            <p class="material-symbols-outlined showpassword" id="showpassword" onclick="showpassword()">visibility_off</p>
            
        </div>
        <br>
        <button type="submit" name="logincommand">C'est parti!</button>
        <p class="textnoaccount">Pas de compte ? <a href='register.php'>Créez en un !</a></p>
    </form>
    
</div>





<?php include "pages/footer.php";