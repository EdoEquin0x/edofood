<?php include "pages/header.php";

if (isset($_GET["alreadyexist"])) { //Message d'erreur envoyé depuis le script d'authentification, dans le cas ou l'utilisateur n'existe pas ?> 
    <p class="error">Erreur: Un utilisateur avec cet identifiant existe déjà, choisissez-en un autre</p>
    
    <?php
}
if (isset($_GET["passwordmismatch"])) {  //Message d'erreur envoyé depuis le script d'authentification, dans le cas ou le mot de passe n'est pas le bon  ?>
    <p class="error">Erreur: Le mot de passe et la confirmation ne correspondent pas</p>


    
    <?php
}



?>
<script src="scripts/showpassword.js"></script>
<link rel="stylesheet" href="style/register.css">


<div class="registerblock">
    
    <br/>
    <form class="registerform" action="scripts/register.php" method="post">
        <h2>Création d'un compte utilisateur</h2>
        <div class="Formblock">
            <p class="material-symbols-outlined inputicon">person</p>
            <input type="text" name="registeremail" placeholder="Adresse Email" required pattern="[^ @]*@[^ @]*" value="<?php if (isset($_GET["login"])) {echo $_GET["login"];} ?>" title="L'adresse email doit contenir une arobase (@) et se terminer par un nom de domaine (.fr, .com etc).">
            <p class="placeholder">Addresse email</p>

        </div>
        <div class="Formblock">
            <p class="material-symbols-outlined inputicon">lock</p>
            <input id="passwordfield" type="password" name="registerpassword" placeholder="Mot de passe" required title="Le mot de passe doit comporter au minimum 8 caractères, une minuscule, une majuscule, un chiffre et un caractère spécial." required pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$">
            <p class="placeholder">Mot de passe</p>
            <p class="material-symbols-outlined showpassword" id="showpassword" onclick="showpassword()">visibility_off</p>
            
        </div>
        <div class="Formblock">
            <p class="material-symbols-outlined inputicon">lock_reset</p>
            <input id="confirmpasswordfield" type="password" name="confirmpassword" placeholder="Confirmer le Mot de passe" required title="Le mot de passe doit comporter au minimum 8 caractères, une minuscule, une majuscule, un chiffre et un caractère spécial." required pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$">
            <p class="placeholder">Confirmation du mot de passe</p>
            
        </div>
        <br/>
        <p class="text">Le Mot de passe doit comporter au moins 8 caractères, une minuscule, une majuscule, un chiffre et un caractère spécial.</p>
        <br/>
        <button type="submit" name="registersubmit">Créer un compte</button>  
    </form>
</div>

<?php include "pages/footer.php";