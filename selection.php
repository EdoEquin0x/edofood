<?php include "pages/header.php";
require_once 'database/init.php';

$requestproducts = $ddb->query('SELECT * FROM products ORDER BY name');
$products = $requestproducts->fetchAll(PDO::FETCH_OBJ); //On récupère absolument tout les articles dans la base de donnée



?>
<script src="scripts/search.js" defer></script>
<link rel="stylesheet" href="style/articles.css">
<br/>

<form class="searchbarcontainer">
    <input class="searchbar" id="searchbar" type="text" title="Rechercher un produit" placeholder="Rechercher un nom ou un tag.." onkeyup="search()">
    <img class="searchicon" src="https://cdn-icons-png.flaticon.com/512/3917/3917754.png">
</form>



<div class="pos-f-t">
  <div class="collapse" id="navbarToggleExternalContent">
    <div class="bg-dark p-4">
      <h5 class="text-white h4">Collapsed content</h5>
      <span class="text-muted">Toggleable via the navbar brand.</span>
    </div>
  </div>
  <nav class="navbar navbar-dark bg-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  </nav>
</div>





<!-- On génère tout les articles étant catégorisé comme des menus -->
<div class="productwrapper" id="productlist">
    <h3>NOS MENUS 🛍️</h3>
    <div class="productcontainer">
        
            <?php
                foreach ($products as $product):
                    $productlist = [$product->ingredient1, $product->ingredient2, $product->ingredient3, $product->ingredient4, $product->ingredient5, $product->ingredient6, $product->ingredient7, $product->ingredient8, $product->ingredient9, $product->ingredient10];

                    if ($product->type == 'menu') { ?>
                        
                        <div class="product">
                            <div class="productimagecontainer">
                                <img width=200px loading="lazy" height=200px class="productpic" src="assets/products/<?php echo ($product->image); ?>">
                            </div>
                            <div class="productnamecontainer">
                                <p class="productname"><?php echo ($product->name); ?></p>
                            </div>
                            <div class="productingredientcontainer">
                            <?php
                                
                                foreach ($productlist as $productingredient) {
                                    if ($productingredient != false) { ?>
                                        <p class="productingredient"><?php echo ($productingredient); ?></p>
                                    <?php } 
                                }
                                
                                ?>
                            </div>
                            <div class="producttagcontainer">
                                <p class="producttaglabel">Tag:</p>
                                <p class="producttag"><?php echo ($product->tag); ?></p>
                            </div>

                            <div class="numbercontainer">


                                <div class="pizzachoicecontainer">
                                    
                                    <?php 
                                    $m = $product->pizzachoicenumber;
                                    if ($m > 0) {?>
                                        <p class="producttaglabel" style="margin-top: 15px;">Choix de pizza:</p> 
                                    <?php
                                        for($i = 0; $m > $i; $i++): ?>
                                            <select class="pizzacontainer<?php echo $i; ?>ID<?php echo($product->ProductID);?> choicecontainer">
                                            <?php  
                                                foreach ($products as $pizza):
                                                    if($pizza->type =="pizza"){
                                                        if($pizza->hidden == "0") {
                                                ?>  
                                                            
                                                            <option><?php echo $pizza->name ?></option>
                                            <?php 
                                                    }
                                                }
                                                endforeach;
                                            ?>
                                            </select>
                                            <?php
                                            ?>
                                    <?php endfor;
                                    }
                                    ?>
                                </div>

                                <div class="sandwichchoicecontainer">
                                    
                                    <?php 
                                    $m = $product->sandwichchoicenumber;
                                    if ($m > 0) {?>
                                        <p class="producttaglabel" style="margin-top: 15px;">Choix de sandwich/burger/panini:</p> 
                                    <?php
                                        for($i = 0; $m > $i; $i++): ?>
                                            <select class="sandwichcontainer<?php echo $i; ?>ID<?php echo($product->ProductID);?> choicecontainer">
                                            <?php  
                                                foreach ($products as $sandwich):
                                                    if($sandwich->type =="sandwich"){
                                                        if($sandwich->hidden == "0") {
                                                ?>  
                                                            
                                                            <option><?php echo $sandwich->name ?></option>
                                            <?php 
                                                    }
                                                }
                                                endforeach;
                                            ?>
                                            </select>
                                            <?php
                                            ?>
                                    <?php endfor;
                                    }
                                    ?>
                                </div>

                                <div class="otherchoicecontainer">
                                    
                                    <?php 
                                    $m = $product->otherchoicenumber;
                                    if ($m > 0) {?>
                                        <p class="producttaglabel" style="margin-top: 15px;">Choix d'accompagnement:</p> 
                                    <?php
                                        for($i = 0; $m > $i; $i++): ?>
                                            <select class="othercontainer<?php echo $i; ?>ID<?php echo($product->ProductID);?> choicecontainer">
                                            <?php  
                                                foreach ($products as $other):
                                                    if($other->type =="other"){
                                                        if($other->hidden == "0") {
                                                ?>  
                                                            
                                                            <option><?php echo $other->name ?></option>
                                            <?php 
                                                    }
                                                }
                                                endforeach;
                                            ?>
                                            </select>
                                            <?php
                                            ?>
                                    <?php endfor;
                                    }
                                    ?>
                                </div>


                                <div class="dessertchoicecontainer">
                                    
                                    <?php 
                                    $m = $product->dessertchoicenumber;
                                    if ($m > 0) {?>
                                        <p class="producttaglabel" style="margin-top: 15px;">Choix de dessert:</p> 
                                    <?php
                                        for($i = 0; $m > $i; $i++): ?>
                                            <select class="dessertcontainer<?php echo $i; ?>ID<?php echo($product->ProductID);?> choicecontainer">
                                            <?php  
                                                foreach ($products as $dessert):
                                                    if($dessert->type =="dessert"){
                                                        if($dessert->hidden == "0") {
                                                ?>  
                                                            
                                                            <option><?php echo $dessert->name ?></option>
                                            <?php 
                                                    }
                                                }
                                                endforeach;
                                            ?>
                                            </select>
                                            <?php
                                            ?>
                                    <?php endfor;
                                    }
                                    ?>
                                </div>


                                <div class="saucechoicecontainer">
                                    
                                    <?php 
                                    $m = $product->saucechoicenumber;
                                    if ($m > 0) {?>
                                        <p class="producttaglabel" style="margin-top: 15px;">Choix de sauce:</p> 
                                    <?php
                                        for($i = 0; $m > $i; $i++): ?>
                                            <select class="saucecontainer<?php echo $i; ?>ID<?php echo($product->ProductID);?> choicecontainer">
                                            <?php  
                                                foreach ($products as $sauce):
                                                    if($sauce->type =="sauce"){
                                                        if($sauce->hidden == "0") {
                                                ?>  
                                                            
                                                            <option><?php echo $sauce->name ?></option>
                                            <?php 
                                                    }
                                                }
                                                endforeach;
                                            ?>
                                            </select>
                                            <?php
                                            ?>
                                    <?php endfor;
                                    }
                                    ?>
                                </div>





                                <div class="drinkchoicecontainer">
                                                                        
                                    <?php 
                                    $m = $product->drinkchoicenumber;
                                    if ($m > 0) {?>
                                        <p class="producttaglabel" style="margin-top: 15px;">Choix de boisson:</p> 
                                    <?php
                                        for($i = 0; $m > $i; $i++): ?>
                                            <select class="drinkcontainer<?php echo $i; ?>ID<?php echo($product->ProductID);?> choicecontainer">
                                            <?php  
                                                foreach ($products as $drink):
                                                    if($drink->type =="drink"){
                                                        if($drink->hidden == "0") {
                                                ?>  
                                                            
                                                            <option><?php echo $drink->name ?></option>
                                            <?php 
                                                    }
                                                }
                                                endforeach;
                                            ?>
                                            </select>
                                            <?php
                                            ?>
                                    <?php endfor;
                                    }
                                    ?>
                                </div>













                            


                            </div>




                            <?php

                            if (isset($_SESSION["authlevel"])) {

                            ?>
                                <div class="productpurchaseinfos">
                                <p class="productprice"><?php echo ($product->price); ?> €</p>
                                <button href="#" data-id="<?php echo($product->ProductID);?>" data-name="<?php echo($product->name);?>" data-price="<?php echo ($product->price); ?>" class="addbutton">Ajouter au panier</button>
                            </div>
                            
                            
                            
                        
                     <?php
                        }
                        
                        else { ?>
                           <div class="nocart"> 
                                <p>Connectez-vous pour commander</p>
                           </div>
                           <?php
                        }
                        ?> 
                    </div>
                    <?php 
                }
            endforeach;
            
            ?>
    </div>


<!-- On génère tout les articles étant catégorisé comme des pizzas -->
    <h3>NOS PIZZAS 🍕</h3>
    <div class="productcontainer">
        
        <?php
            foreach ($products as $product):
                $productlist = [$product->ingredient1, $product->ingredient2, $product->ingredient3, $product->ingredient4, $product->ingredient5, $product->ingredient6, $product->ingredient7, $product->ingredient8, $product->ingredient9, $product->ingredient10];

                if ($product->type == 'pizza') { ?>
                    <div class="product">
                        <div class="productimagecontainer">
                            <img width=200px loading="lazy" height=200px class="productpic" src="assets/products/<?php echo ($product->image); ?>">
                        </div>
                        <div class="productnamecontainer">
                            <p class="productname"><?php echo ($product->name); ?></p>
                        </div>
                        <div class="productingredientcontainer">
                        <?php
                            
                            foreach ($productlist as $productingredient) {
                                if ($productingredient != false) { ?>
                                    <p class="productingredient"><?php echo ($productingredient); ?></p>
                                <?php } 
                            }
                            
                            ?>
                        </div>
                        <div class="producttagcontainer">
                            <p class="producttaglabel">Tag:</p>
                            <p class="producttag"><?php echo ($product->tag); ?></p>
                        </div>


                        <div class="numbercontainer">


                                <div class="pizzachoicecontainer">
                                    
                                    <?php 
                                    $m = $product->pizzachoicenumber;
                                    if ($m > 0) {?>
                                        <p class="producttaglabel" style="margin-top: 15px;">Choix de pizza:</p> 
                                    <?php
                                        for($i = 0; $m > $i; $i++): ?>
                                            <select class="pizzacontainer<?php echo $i; ?>ID<?php echo($product->ProductID);?> choicecontainer">
                                            <?php  
                                                foreach ($products as $pizza):
                                                    if($pizza->type =="pizza"){
                                                        if($pizza->hidden == "0") {
                                                ?>  
                                                            
                                                            <option><?php echo $pizza->name ?></option>
                                            <?php 
                                                    }
                                                }
                                                endforeach;
                                            ?>
                                            </select>
                                            <?php
                                            ?>
                                    <?php endfor;
                                    }
                                    ?>
                                </div>

                                <div class="sandwichchoicecontainer">
                                    
                                    <?php 
                                    $m = $product->sandwichchoicenumber;
                                    if ($m > 0) {?>
                                        <p class="producttaglabel" style="margin-top: 15px;">Choix de sandwich/burger/panini:</p> 
                                    <?php
                                        for($i = 0; $m > $i; $i++): ?>
                                            <select class="sandwichcontainer<?php echo $i; ?>ID<?php echo($product->ProductID);?> choicecontainer">
                                            <?php  
                                                foreach ($products as $sandwich):
                                                    if($sandwich->type =="sandwich"){
                                                        if($sandwich->hidden == "0") {
                                                ?>  
                                                            
                                                            <option><?php echo $sandwich->name ?></option>
                                            <?php 
                                                    }
                                                }
                                                endforeach;
                                            ?>
                                            </select>
                                            <?php
                                            ?>
                                    <?php endfor;
                                    }
                                    ?>
                                </div>

                                <div class="otherchoicecontainer">
                                    
                                    <?php 
                                    $m = $product->otherchoicenumber;
                                    if ($m > 0) {?>
                                        <p class="producttaglabel" style="margin-top: 15px;">Choix d'accompagnement:</p> 
                                    <?php
                                        for($i = 0; $m > $i; $i++): ?>
                                            <select class="othercontainer<?php echo $i; ?>ID<?php echo($product->ProductID);?> choicecontainer">
                                            <?php  
                                                foreach ($products as $other):
                                                    if($other->type =="other"){
                                                        if($other->hidden == "0") {
                                                ?>  
                                                            
                                                            <option><?php echo $other->name ?></option>
                                            <?php 
                                                    }
                                                }
                                                endforeach;
                                            ?>
                                            </select>
                                            <?php
                                            ?>
                                    <?php endfor;
                                    }
                                    ?>
                                </div>


                                <div class="dessertchoicecontainer">
                                    
                                    <?php 
                                    $m = $product->dessertchoicenumber;
                                    if ($m > 0) {?>
                                        <p class="producttaglabel" style="margin-top: 15px;">Choix de dessert:</p> 
                                    <?php
                                        for($i = 0; $m > $i; $i++): ?>
                                            <select class="dessertcontainer<?php echo $i; ?>ID<?php echo($product->ProductID);?> choicecontainer">
                                            <?php  
                                                foreach ($products as $dessert):
                                                    if($dessert->type =="dessert"){
                                                        if($dessert->hidden == "0") {
                                                ?>  
                                                            
                                                            <option><?php echo $dessert->name ?></option>
                                            <?php 
                                                    }
                                                }
                                                endforeach;
                                            ?>
                                            </select>
                                            <?php
                                            ?>
                                    <?php endfor;
                                    }
                                    ?>
                                </div>


                                <div class="saucechoicecontainer">
                                    
                                    <?php 
                                    $m = $product->saucechoicenumber;
                                    if ($m > 0) {?>
                                        <p class="producttaglabel" style="margin-top: 15px;">Choix de sauce:</p> 
                                    <?php
                                        for($i = 0; $m > $i; $i++): ?>
                                            <select class="saucecontainer<?php echo $i; ?>ID<?php echo($product->ProductID);?> choicecontainer">
                                            <?php  
                                                foreach ($products as $sauce):
                                                    if($sauce->type =="sauce"){
                                                        if($sauce->hidden == "0") {
                                                ?>  
                                                            
                                                            <option><?php echo $sauce->name ?></option>
                                            <?php 
                                                    }
                                                }
                                                endforeach;
                                            ?>
                                            </select>
                                            <?php
                                            ?>
                                    <?php endfor;
                                    }
                                    ?>
                                </div>





                                <div class="drinkchoicecontainer">
                                                                        
                                    <?php 
                                    $m = $product->drinkchoicenumber;
                                    if ($m > 0) {?>
                                        <p class="producttaglabel" style="margin-top: 15px;">Choix de boisson:</p> 
                                    <?php
                                        for($i = 0; $m > $i; $i++): ?>
                                            <select class="drinkcontainer<?php echo $i; ?>ID<?php echo($product->ProductID);?> choicecontainer">
                                            <?php  
                                                foreach ($products as $drink):
                                                    if($drink->type =="drink"){
                                                        if($drink->hidden == "0") {
                                                ?>  
                                                            
                                                            <option><?php echo $drink->name ?></option>
                                            <?php 
                                                    }
                                                }
                                                endforeach;
                                            ?>
                                            </select>
                                            <?php
                                            ?>
                                    <?php endfor;
                                    }
                                    ?>
                                </div>













                            


                            </div>







                        <?php
                        if (isset($_SESSION["authlevel"])) {

                        ?>
                            <div class="productpurchaseinfos">
                                <p class="productprice"><?php echo ($product->price); ?> €</p>
                                <button href="#" data-id="<?php echo($product->ProductID);?>" data-name="<?php echo($product->name);?>" data-price="<?php echo ($product->price); ?>" class="addbutton">Ajouter au panier</button>
                            </div>
                        
                        
                         
                        
                            <?php
                        }
                        
                        else { ?>
                           <div class="nocart"> 
                                <p>Connectez-vous pour commander</p>
                           </div>
                           <?php
                        }
                        ?>
                    </div>
                    <?php 
                }
            endforeach;
         
        ?>
    </div>

    <!-- On génère tout les articles étant catégorisé comme des sandwichs -->
    <h3>NOS SANDWICH, BURGERS ET PANINIS 🥪</h3>
    <div class="productcontainer">
    
    <?php
            foreach ($products as $product):
                $productlist = [$product->ingredient1, $product->ingredient2, $product->ingredient3, $product->ingredient4, $product->ingredient5, $product->ingredient6, $product->ingredient7, $product->ingredient8, $product->ingredient9, $product->ingredient10];

                if ($product->type == 'sandwich') { ?>
                    <div class="product">
                        <div class="productimagecontainer">
                            <img width=200px loading="lazy" height=200px class="productpic" src="assets/products/<?php echo ($product->image); ?>">
                        </div>
                        <div class="productnamecontainer">
                            <p class="productname"><?php echo ($product->name); ?></p>
                        </div>
                        <div class="productingredientcontainer">
                        <?php
                            
                            foreach ($productlist as $productingredient) {
                                if ($productingredient != false) { ?>
                                    <p class="productingredient"><?php echo ($productingredient); ?></p>
                                <?php } 
                            }
                            
                            ?>
                        </div>
                        <div class="producttagcontainer">
                            <p class="producttaglabel">Tag:</p>
                            <p class="producttag"><?php echo ($product->tag); ?></p>
                        </div>


                        <div class="numbercontainer">


                                <div class="pizzachoicecontainer">
                                    
                                    <?php 
                                    $m = $product->pizzachoicenumber;
                                    if ($m > 0) {?>
                                        <p class="producttaglabel" style="margin-top: 15px;">Choix de pizza:</p> 
                                    <?php
                                        for($i = 0; $m > $i; $i++): ?>
                                            <select class="pizzacontainer<?php echo $i; ?>ID<?php echo($product->ProductID);?> choicecontainer">
                                            <?php  
                                                foreach ($products as $pizza):
                                                    if($pizza->type =="pizza"){
                                                        if($pizza->hidden == "0") {
                                                ?>  
                                                            
                                                            <option><?php echo $pizza->name ?></option>
                                            <?php 
                                                    }
                                                }
                                                endforeach;
                                            ?>
                                            </select>
                                            <?php
                                            ?>
                                    <?php endfor;
                                    }
                                    ?>
                                </div>

                                <div class="sandwichchoicecontainer">
                                    
                                    <?php 
                                    $m = $product->sandwichchoicenumber;
                                    if ($m > 0) {?>
                                        <p class="producttaglabel" style="margin-top: 15px;">Choix de sandwich/burger/panini:</p> 
                                    <?php
                                        for($i = 0; $m > $i; $i++): ?>
                                            <select class="sandwichcontainer<?php echo $i; ?>ID<?php echo($product->ProductID);?> choicecontainer">
                                            <?php  
                                                foreach ($products as $sandwich):
                                                    if($sandwich->type =="sandwich"){
                                                        if($sandwich->hidden == "0") {
                                                ?>  
                                                            
                                                            <option><?php echo $sandwich->name ?></option>
                                            <?php 
                                                    }
                                                }
                                                endforeach;
                                            ?>
                                            </select>
                                            <?php
                                            ?>
                                    <?php endfor;
                                    }
                                    ?>
                                </div>

                                <div class="otherchoicecontainer">
                                    
                                    <?php 
                                    $m = $product->otherchoicenumber;
                                    if ($m > 0) {?>
                                        <p class="producttaglabel" style="margin-top: 15px;">Choix d'accompagnement:</p> 
                                    <?php
                                        for($i = 0; $m > $i; $i++): ?>
                                            <select class="othercontainer<?php echo $i; ?>ID<?php echo($product->ProductID);?> choicecontainer">
                                            <?php  
                                                foreach ($products as $other):
                                                    if($other->type =="other"){
                                                        if($other->hidden == "0") {
                                                ?>  
                                                            
                                                            <option><?php echo $other->name ?></option>
                                            <?php 
                                                    }
                                                }
                                                endforeach;
                                            ?>
                                            </select>
                                            <?php
                                            ?>
                                    <?php endfor;
                                    }
                                    ?>
                                </div>


                                <div class="dessertchoicecontainer">
                                    
                                    <?php 
                                    $m = $product->dessertchoicenumber;
                                    if ($m > 0) {?>
                                        <p class="producttaglabel" style="margin-top: 15px;">Choix de dessert:</p> 
                                    <?php
                                        for($i = 0; $m > $i; $i++): ?>
                                            <select class="dessertcontainer<?php echo $i; ?>ID<?php echo($product->ProductID);?> choicecontainer">
                                            <?php  
                                                foreach ($products as $dessert):
                                                    if($dessert->type =="dessert"){
                                                        if($dessert->hidden == "0") {
                                                ?>  
                                                            
                                                            <option><?php echo $dessert->name ?></option>
                                            <?php 
                                                    }
                                                }
                                                endforeach;
                                            ?>
                                            </select>
                                            <?php
                                            ?>
                                    <?php endfor;
                                    }
                                    ?>
                                </div>


                                <div class="saucechoicecontainer">
                                    
                                    <?php 
                                    $m = $product->saucechoicenumber;
                                    if ($m > 0) {?>
                                        <p class="producttaglabel" style="margin-top: 15px;">Choix de sauce:</p> 
                                    <?php
                                        for($i = 0; $m > $i; $i++): ?>
                                            <select class="saucecontainer<?php echo $i; ?>ID<?php echo($product->ProductID);?> choicecontainer">
                                            <?php  
                                                foreach ($products as $sauce):
                                                    if($sauce->type =="sauce"){
                                                        if($sauce->hidden == "0") {
                                                ?>  
                                                            
                                                            <option><?php echo $sauce->name ?></option>
                                            <?php 
                                                    }
                                                }
                                                endforeach;
                                            ?>
                                            </select>
                                            <?php
                                            ?>
                                    <?php endfor;
                                    }
                                    ?>
                                </div>





                                <div class="drinkchoicecontainer">
                                                                        
                                    <?php 
                                    $m = $product->drinkchoicenumber;
                                    if ($m > 0) {?>
                                        <p class="producttaglabel" style="margin-top: 15px;">Choix de boisson:</p> 
                                    <?php
                                        for($i = 0; $m > $i; $i++): ?>
                                            <select class="drinkcontainer<?php echo $i; ?>ID<?php echo($product->ProductID);?> choicecontainer">
                                            <?php  
                                                foreach ($products as $drink):
                                                    if($drink->type =="drink"){
                                                        if($drink->hidden == "0") {
                                                ?>  
                                                            
                                                            <option><?php echo $drink->name ?></option>
                                            <?php 
                                                    }
                                                }
                                                endforeach;
                                            ?>
                                            </select>
                                            <?php
                                            ?>
                                    <?php endfor;
                                    }
                                    ?>
                                </div>













                            


                            </div>












                        <?php
                        if (isset($_SESSION["authlevel"])) {

                        ?>
                            <div class="productpurchaseinfos">
                                <p class="productprice"><?php echo ($product->price); ?> €</p>
                                <button href="#" data-id="<?php echo($product->ProductID);?>" data-name="<?php echo($product->name);?>" data-price="<?php echo ($product->price); ?>" class="addbutton">Ajouter au panier</button>
                            </div>
                        
                        
                        
                        
                            <?php
                        }
                        
                        else { ?>
                           <div class="nocart"> 
                                <p>Connectez-vous pour commander</p>
                           </div>
                           <?php
                        }
                        ?> 
                    </div>
                    <?php 
                }
            endforeach;
         
        ?>
    </div>

    <!-- On génère tout les articles étant catégorisé comme des kébabs -->
    <h3>NOS KEBABS 🥙</h3>
    <div class="productcontainer">
    
    <?php
            foreach ($products as $product):
                $productlist = [$product->ingredient1, $product->ingredient2, $product->ingredient3, $product->ingredient4, $product->ingredient5, $product->ingredient6, $product->ingredient7, $product->ingredient8, $product->ingredient9, $product->ingredient10];

                if ($product->type == 'kebab') { ?>
                    <div class="product">
                        <div class="productimagecontainer">
                            <img width=200px loading="lazy" height=200px class="productpic" src="assets/products/<?php echo ($product->image); ?>">
                        </div>
                        <div class="productnamecontainer">
                            <p class="productname"><?php echo ($product->name); ?></p>
                        </div>
                        <div class="productingredientcontainer">
                        <?php
                            
                            foreach ($productlist as $productingredient) {
                                if ($productingredient != false) { ?>
                                    <p class="productingredient"><?php echo ($productingredient); ?></p>
                                <?php } 
                            }
                            
                            ?>
                        </div>
                        <div class="producttagcontainer">
                            <p class="producttaglabel">Tag:</p>
                            <p class="producttag"><?php echo ($product->tag); ?></p>
                        </div>



                        <div class="numbercontainer">


                                <div class="pizzachoicecontainer">
                                    
                                    <?php 
                                    $m = $product->pizzachoicenumber;
                                    if ($m > 0) {?>
                                        <p class="producttaglabel" style="margin-top: 15px;">Choix de pizza:</p> 
                                    <?php
                                        for($i = 0; $m > $i; $i++): ?>
                                            <select class="pizzacontainer<?php echo $i; ?>ID<?php echo($product->ProductID);?> choicecontainer">
                                            <?php  
                                                foreach ($products as $pizza):
                                                    if($pizza->type =="pizza"){
                                                        if($pizza->hidden == "0") {
                                                ?>  
                                                            
                                                            <option><?php echo $pizza->name ?></option>
                                            <?php 
                                                    }
                                                }
                                                endforeach;
                                            ?>
                                            </select>
                                            <?php
                                            ?>
                                    <?php endfor;
                                    }
                                    ?>
                                </div>

                                <div class="sandwichchoicecontainer">
                                    
                                    <?php 
                                    $m = $product->sandwichchoicenumber;
                                    if ($m > 0) {?>
                                        <p class="producttaglabel" style="margin-top: 15px;">Choix de sandwich/burger/panini:</p> 
                                    <?php
                                        for($i = 0; $m > $i; $i++): ?>
                                            <select class="sandwichcontainer<?php echo $i; ?>ID<?php echo($product->ProductID);?> choicecontainer">
                                            <?php  
                                                foreach ($products as $sandwich):
                                                    if($sandwich->type =="sandwich"){
                                                        if($sandwich->hidden == "0") {
                                                ?>  
                                                            
                                                            <option><?php echo $sandwich->name ?></option>
                                            <?php 
                                                    }
                                                }
                                                endforeach;
                                            ?>
                                            </select>
                                            <?php
                                            ?>
                                    <?php endfor;
                                    }
                                    ?>
                                </div>

                                <div class="otherchoicecontainer">
                                    
                                    <?php 
                                    $m = $product->otherchoicenumber;
                                    if ($m > 0) {?>
                                        <p class="producttaglabel" style="margin-top: 15px;">Choix d'accompagnement:</p> 
                                    <?php
                                        for($i = 0; $m > $i; $i++): ?>
                                            <select class="othercontainer<?php echo $i; ?>ID<?php echo($product->ProductID);?> choicecontainer">
                                            <?php  
                                                foreach ($products as $other):
                                                    if($other->type =="other"){
                                                        if($other->hidden == "0") {
                                                ?>  
                                                            
                                                            <option><?php echo $other->name ?></option>
                                            <?php 
                                                    }
                                                }
                                                endforeach;
                                            ?>
                                            </select>
                                            <?php
                                            ?>
                                    <?php endfor;
                                    }
                                    ?>
                                </div>


                                <div class="dessertchoicecontainer">
                                    
                                    <?php 
                                    $m = $product->dessertchoicenumber;
                                    if ($m > 0) {?>
                                        <p class="producttaglabel" style="margin-top: 15px;">Choix de dessert:</p> 
                                    <?php
                                        for($i = 0; $m > $i; $i++): ?>
                                            <select class="dessertcontainer<?php echo $i; ?>ID<?php echo($product->ProductID);?> choicecontainer">
                                            <?php  
                                                foreach ($products as $dessert):
                                                    if($dessert->type =="dessert"){
                                                        if($dessert->hidden == "0") {
                                                ?>  
                                                            
                                                            <option><?php echo $dessert->name ?></option>
                                            <?php 
                                                    }
                                                }
                                                endforeach;
                                            ?>
                                            </select>
                                            <?php
                                            ?>
                                    <?php endfor;
                                    }
                                    ?>
                                </div>


                                <div class="saucechoicecontainer">
                                    
                                    <?php 
                                    $m = $product->saucechoicenumber;
                                    if ($m > 0) {?>
                                        <p class="producttaglabel" style="margin-top: 15px;">Choix de sauce:</p> 
                                    <?php
                                        for($i = 0; $m > $i; $i++): ?>
                                            <select class="saucecontainer<?php echo $i; ?>ID<?php echo($product->ProductID);?> choicecontainer">
                                            <?php  
                                                foreach ($products as $sauce):
                                                    if($sauce->type =="sauce"){
                                                        if($sauce->hidden == "0") {
                                                ?>  
                                                            
                                                            <option><?php echo $sauce->name ?></option>
                                            <?php 
                                                    }
                                                }
                                                endforeach;
                                            ?>
                                            </select>
                                            <?php
                                            ?>
                                    <?php endfor;
                                    }
                                    ?>
                                </div>





                                <div class="drinkchoicecontainer">
                                                                        
                                    <?php 
                                    $m = $product->drinkchoicenumber;
                                    if ($m > 0) {?>
                                        <p class="producttaglabel" style="margin-top: 15px;">Choix de boisson:</p> 
                                    <?php
                                        for($i = 0; $m > $i; $i++): ?>
                                            <select class="drinkcontainer<?php echo $i; ?>ID<?php echo($product->ProductID);?> choicecontainer">
                                            <?php  
                                                foreach ($products as $drink):
                                                    if($drink->type =="drink"){
                                                        if($drink->hidden == "0") {
                                                ?>  
                                                            
                                                            <option><?php echo $drink->name ?></option>
                                            <?php 
                                                    }
                                                }
                                                endforeach;
                                            ?>
                                            </select>
                                            <?php
                                            ?>
                                    <?php endfor;
                                    }
                                    ?>
                                </div>













                            


                            </div>




                        <?php
                        if (isset($_SESSION["authlevel"])) {

                        ?>
                            <div class="productpurchaseinfos">
                                <p class="productprice"><?php echo ($product->price); ?> €</p>
                                <button href="#" data-id="<?php echo($product->ProductID);?>" data-name="<?php echo($product->name);?>" data-price="<?php echo ($product->price); ?>" class="addbutton">Ajouter au panier</button>
                            </div>
                        
                        
                        
                        
                            <?php
                        }
                        
                        else { ?>
                           <div class="nocart"> 
                                <p>Connectez-vous pour commander</p>
                           </div>
                           <?php
                        }
                        ?>
                    </div>
                    <?php 
                }
            endforeach;
         
        ?>

    </div>

    <!-- On génère tout les articles étant catégorisé comme des accompagnements -->
    <h3>NOS ACCOMPAGNEMENTS 🍟</h3>
    <div class="productcontainer">
    
    <?php
            foreach ($products as $product):
                $productlist = [$product->ingredient1, $product->ingredient2, $product->ingredient3, $product->ingredient4, $product->ingredient5, $product->ingredient6, $product->ingredient7, $product->ingredient8, $product->ingredient9, $product->ingredient10];

                if ($product->type == 'other') { ?>
                    <div class="product">
                        <div class="productimagecontainer">
                            <img width=200px loading="lazy" height=200px class="productpic" src="assets/products/<?php echo ($product->image); ?>">
                        </div>
                        <div class="productnamecontainer">
                            <p class="productname"><?php echo ($product->name); ?></p>
                        </div>
                        <div class="productingredientcontainer">
                        <?php
                            
                            foreach ($productlist as $productingredient) {
                                if ($productingredient != false) { ?>
                                    <p class="productingredient"><?php echo ($productingredient); ?></p>
                                <?php } 
                            }
                            
                            ?>
                        </div>
                        <div class="producttagcontainer">
                            <p class="producttaglabel">Tag:</p>
                            <p class="producttag"><?php echo ($product->tag); ?></p>
                        </div>




                            





                        <?php
                        if (isset($_SESSION["authlevel"])) {

                        ?>
                            <div class="productpurchaseinfos">
                                <p class="productprice"><?php echo ($product->price); ?> €</p>
                                <button href="#" data-id="<?php echo($product->ProductID);?>" data-name="<?php echo($product->name);?>" data-price="<?php echo ($product->price); ?>" class="addbutton">Ajouter au panier</button>
                            </div>
                        
                        
                        
                        
                            <?php
                        }
                        
                        else { ?>
                           <div class="nocart"> 
                                <p>Connectez-vous pour commander</p>
                           </div>
                           <?php
                        }
                        ?>
                    </div>
                    <?php 
                }
            endforeach;
         
        ?>
    </div>

    <!-- On génère tout les articles étant catégorisé comme pâtisseries -->
    <h3>NOS PATISSERIES 🥐</h3>
    <div class="productcontainer">
    
    <?php
            foreach ($products as $product):
                $productlist = [$product->ingredient1, $product->ingredient2, $product->ingredient3, $product->ingredient4, $product->ingredient5, $product->ingredient6, $product->ingredient7, $product->ingredient8, $product->ingredient9, $product->ingredient10];

                if ($product->type == 'pastries') { ?>
                    <div class="product">
                        <div class="productimagecontainer">
                            <img width=200px loading="lazy" height=200px class="productpic" src="assets/products/<?php echo ($product->image); ?>">
                        </div>
                        <div class="productnamecontainer">
                            <p class="productname"><?php echo ($product->name); ?></p>
                        </div>
                        <div class="productingredientcontainer">
                        <?php
                            
                            foreach ($productlist as $productingredient) {
                                if ($productingredient != false) { ?>
                                    <p class="productingredient"><?php echo ($productingredient); ?></p>
                                <?php } 
                            }
                            
                            ?>
                        </div>
                        <div class="producttagcontainer">
                            <p class="producttaglabel">Tag:</p>
                            <p class="producttag"><?php echo ($product->tag); ?></p>
                        </div>
                        <?php
                        if (isset($_SESSION["authlevel"])) {

                        ?>
                            <div class="productpurchaseinfos">
                                <p class="productprice"><?php echo ($product->price); ?> €</p>
                                <button href="#" data-id="<?php echo($product->ProductID);?>" data-name="<?php echo($product->name);?>" data-price="<?php echo ($product->price); ?>" class="addbutton">Ajouter au panier</button>
                            </div>
                        
                        
                        
                        
                            <?php
                        }
                        
                        else { ?>
                           <div class="nocart"> 
                                <p>Connectez-vous pour commander</p>
                           </div>
                           <?php
                        }
                        ?> 
                    </div>
                    <?php 
                }
            endforeach;
         
        ?>
    </div>


    <!-- On génère tout les articles étant catégorisé comme desserts -->
    <h3>NOS DESSERTS 🍰</h3>
    <div class="productcontainer">
    
    <?php
            foreach ($products as $product):
                $productlist = [$product->ingredient1, $product->ingredient2, $product->ingredient3, $product->ingredient4, $product->ingredient5, $product->ingredient6, $product->ingredient7, $product->ingredient8, $product->ingredient9, $product->ingredient10];

                if ($product->type == 'dessert') { ?>
                    <div class="product">
                        <div class="productimagecontainer">
                            <img width=200px loading="lazy" height=200px class="productpic" src="assets/products/<?php echo ($product->image); ?>">
                        </div>
                        <div class="productnamecontainer">
                            <p class="productname"><?php echo ($product->name); ?></p>
                        </div>
                        <div class="productingredientcontainer">
                        <?php
                            
                            foreach ($productlist as $productingredient) {
                                if ($productingredient != false) { ?>
                                    <p class="productingredient"><?php echo ($productingredient); ?></p>
                                <?php } 
                            }
                            
                            ?>
                        </div>
                        <div class="producttagcontainer">
                            <p class="producttaglabel">Tag:</p>
                            <p class="producttag"><?php echo ($product->tag); ?></p>
                        </div>
                        <?php
                        if (isset($_SESSION["authlevel"])) {

                        ?>
                            <div class="productpurchaseinfos">
                                <p class="productprice"><?php echo ($product->price); ?> €</p>
                                <button href="#" data-id="<?php echo($product->ProductID);?>" data-name="<?php echo($product->name);?>" data-price="<?php echo ($product->price); ?>" class="addbutton">Ajouter au panier</button>
                            </div>
                        
                        
                        
                        
                            <?php
                        }
                        
                        else { ?>
                           <div class="nocart"> 
                                <p>Connectez-vous pour commander</p>
                           </div>
                           <?php
                        }
                        ?>
                    </div>
                    <?php 
                }
            endforeach;
         
        ?>
    




    <!-- On génère tout les articles étant catégorisé comme boisson -->
    <h3>NOS BOISSONS 🥤</h3>
    <div class="productcontainer">
    
    <?php
            foreach ($products as $product):
                $productlist = [$product->ingredient1, $product->ingredient2, $product->ingredient3, $product->ingredient4, $product->ingredient5, $product->ingredient6, $product->ingredient7, $product->ingredient8, $product->ingredient9, $product->ingredient10];

                if ($product->type == 'drink') { ?>
                    <div class="product">
                        <div class="productimagecontainer">
                            <img width=200px loading="lazy" height=200px class="productpic" src="assets/products/<?php echo ($product->image); ?>">
                        </div>
                        <div class="productnamecontainer">
                            <p class="productname"><?php echo ($product->name); ?></p>
                        </div>
                        <div class="productingredientcontainer">
                        <?php
                            
                            foreach ($productlist as $productingredient) {
                                if ($productingredient != false) { ?>
                                    <p class="productingredient"><?php echo ($productingredient); ?></p>
                                <?php } 
                            }
                            
                            ?>
                        </div>
                        <div class="producttagcontainer">
                            <p class="producttaglabel">Tag:</p>
                            <p class="producttag"><?php echo ($product->tag); ?></p>
                        </div>
                        <?php
                        if (isset($_SESSION["authlevel"])) {

                        ?>
                            <div class="productpurchaseinfos">
                                <p class="productprice"><?php echo ($product->price); ?> €</p>
                                <button href="#" data-id="<?php echo($product->ProductID);?>" data-name="<?php echo($product->name);?>" data-price="<?php echo ($product->price); ?>" class="addbutton">Ajouter au panier</button>
                            </div>
                        
                        
                        
                        
                            <?php
                        }
                        
                        else { ?>
                           <div class="nocart"> 
                                <p>Connectez-vous pour commander</p>
                           </div>
                           <?php
                        }
                        ?>
                    </div> 

                    <?php 
                }
            endforeach;
                        
                        ?>
    </div>



    <h3>NOS SAUCES 🥫</h3>
    <div class="productcontainer">
    
    <?php
            foreach ($products as $product):
                $productlist = [$product->ingredient1, $product->ingredient2, $product->ingredient3, $product->ingredient4, $product->ingredient5, $product->ingredient6, $product->ingredient7, $product->ingredient8, $product->ingredient9, $product->ingredient10];

                if ($product->type == 'sauce') { ?>
                    <div class="product">
                        <div class="productimagecontainer">
                            <img width=200px loading="lazy" height=200px class="productpic" src="assets/products/<?php echo ($product->image); ?>">
                        </div>
                        <div class="productnamecontainer">
                            <p class="productname"><?php echo ($product->name); ?></p>
                        </div>
                        <div class="productingredientcontainer">
                        <?php
                            
                            foreach ($productlist as $productingredient) {
                                if ($productingredient != false) { ?>
                                    <p class="productingredient"><?php echo ($productingredient); ?></p>
                                <?php } 
                            }
                            
                            ?>
                        </div>
                        <div class="producttagcontainer">
                            <p class="producttaglabel">Tag:</p>
                            <p class="producttag"><?php echo ($product->tag); ?></p>
                        </div>
                        <?php
                        if (isset($_SESSION["authlevel"])) {

                        ?>
                            <div class="productpurchaseinfos">
                                <p class="productprice"><?php echo ($product->price); ?> €</p>
                                <button href="#" data-id="<?php echo($product->ProductID);?>" data-name="<?php echo($product->name);?>" data-price="<?php echo ($product->price); ?>" class="addbutton">Ajouter au panier</button>
                            </div>
                        
                        
                        
                        
                            <?php
                        }
                        
                        else { ?>
                           <div class="nocart"> 
                                <p>Connectez-vous pour commander</p>
                           </div>
                           <?php
                        }
                        ?>
                    </div> 

                    <?php 
                }
            endforeach;
                        
                        ?>
    </div>


































</div>



<?php include "pages/footer.php";