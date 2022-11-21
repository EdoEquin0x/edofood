<?php 
session_start();

if ($_SESSION["authlevel"] == 'Seller') { //L'accès complet, le seller (entre-autre l'admin) possède l'accès à toute les pages ainsi qu'à son pannel


include "pages/header.php";

require_once 'database/init.php';

$requestproducts = $ddb->query('SELECT * FROM products ORDER BY name');
$products = $requestproducts->fetchAll(PDO::FETCH_OBJ); //On récupère absolument tout les articles dans la base de donnée


?>
<script src="scripts/search.js" defer></script>
<link rel="stylesheet" href="style/articles.css">

<script src="scripts/emojis.js"></script>





<div class="pannelcontainer">
    <div class="pannelheader">
        <form class="searchbarcontainer">
            <input class="searchbar" id="searchbar" type="text" title="Rechercher un produit" placeholder="Rechercher un nom ou un tag.." onkeyup="search()">
            <img class="searchicon" src="https://cdn-icons-png.flaticon.com/512/3917/3917754.png">
            

        </form>
        <div class="addbuttoncontainer">
            <button type="button" data-toggle="modal" data-target="#createproduct" class="addproduct">Ajouter un produit</button>
        </div>
    </div>
    <div class="pannelbody">
        <div class="productcontainer">
        <?php
        
        foreach ($products as $product):
                    $productlist = [$product->ingredient1, $product->ingredient2, $product->ingredient3, $product->ingredient4, $product->ingredient5, $product->ingredient6, $product->ingredient7, $product->ingredient8, $product->ingredient9, $product->ingredient10];
?>
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

                            ?>
                                <div class=buttons>
                                    <button class="deleteproductbutton" data-toggle="modal" data-target="#deleteproduct<?php echo ($product->ProductID); ?>">Supprimer</button>
                                    <button class="editbutton" data-toggle="modal" data-target="#editproduct<?php echo ($product->ProductID); ?>">Modifier</button>
                                </div>
                    </div>



                <div class="modal fade" id="editproduct<?php echo ($product->ProductID); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content editproductdummy">
                        <div class="modal-header">
                            <h5 class="modal-title productnameedit" id="exampleModalLabel">MODIFICATION DE PRODUIT</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form class="editform" action="scripts/productedit.php" method="post" enctype="multipart/form-data">

                            <div class="modal-body">
                                    <input name="ProductID" style="display: none;" value="<?php echo ($product->ProductID); ?>" required>

                                    <div class="Formblock">
                                        <p class="material-symbols-outlined productediticon">drive_file_rename_outline</p>
                                        <input type="text" name="name" class="productnamedummy" value="<?php echo ($product->name); ?>" placeholder="Nom du produit" required>
                                        <p class="placeholder">Nom du produit</p>   
                                    </div>
                                    <div class="Formblock">
                                        <p class="material-symbols-outlined productediticon">euro</p>
                                        <input type="number" class="productpricedummy" value="<?php echo ($product->price); ?>" name="price" placeholder="Prix du produit" required>
                                        <p class="placeholder">Prix du produit (€)</p>   

                                    </div>
                                    <div class="Formblock imagepreviewer">
                                        <p class="material-symbols-outlined imageediticon">image</p>
                                        <div class="productimagedummydiv">
                                            <label for="productimageform<?php echo ($product->ProductID); ?>" class="productimagelabel">Choisir un fichier..</label>
                                            <input type="file" id="productimageform<?php echo ($product->ProductID); ?>" class="productimagelabel" name="image" accept=".jpg, .jpeg, .png" />
                                            
                                        </div>
                                    </div>
                                    <div class="Formblock">
                                        <p class="material-symbols-outlined productediticon">sell</p>
                                        <input type="text" class="productnamedummy producttagedit" value="<?php echo ($product->tag); ?>" name="tag" placeholder="Tag du produit" required>
                                        <button type="button" class="emojibutton">😊</button>
                                        <p class="placeholder">Tag attaché au produit</p>  
                                        <script>
                                            new EmojiPicker({
                                                trigger: [
                                                    {
                                                    selector: '.emojibutton',
                                                    insertInto: '.producttagedit'
                                                    }],
                                                    closeButton: true,
                                                    specialButtons: '#A18254'
                                                });
                                        </script>
                                    </div>
                                    <div class="Formblock">
                                        <p class="material-symbols-outlined productediticon">category</p>
                                        <select name="type" value="<?php echo ($product->type); ?>" required>
                                            <option value="menu">Menu 🛍️</option>
                                            <option value="pizza">Pizza 🍕</option>
                                            <option value="sandwich">Sandwichs, Burgers ou Paninis 🥪</option>
                                            <option value="kebab">Kébabs 🥙</option>
                                            <option value="other">Accompagnements 🍟</option>
                                            <option value="pastries">Pâtisseries 🥐</option>
                                            <option value="dessert">Dessert 🍰</option>
                                            <option value="drink">Boissons 🥤</option>   
                                            <option value="sauce">Sauces 🥫</option>    
                                        </select>
                                        <p class="placeholder">Catégorie du produit</p>   

                                    </div>
                                    <div class="Formblock ingredientandparam">
                                        <div class="ingredientlist">

                                            <p class="material-symbols-outlined productediticon">quiz</p>
                                            <input type="text" name="ingredient1" value="<?php echo ($product->ingredient1); ?>" placeholder="Premier ingrédient">
                                            <p class="placeholder">Premier ingrédient</p> 

                                            <p class="material-symbols-outlined productediticon">quiz</p>
                                            <input type="text" name="ingredient2" value="<?php echo ($product->ingredient2); ?>" placeholder="Second ingrédient">
                                            <p class="placeholder">Second ingrédient</p>   

                                            <p class="material-symbols-outlined productediticon">quiz</p>
                                            <input type="text" name="ingredient3" value="<?php echo ($product->ingredient3); ?>" placeholder="Troisième ingrédient">
                                            <p class="placeholder">Troisième ingrédient</p> 

                                            <p class="material-symbols-outlined productediticon">quiz</p>
                                            <input type="text" name="ingredient4" value="<?php echo ($product->ingredient4); ?>" placeholder="Quatrième ingrédient">
                                            <p class="placeholder">Quatrième ingrédient</p> 

                                            <p class="material-symbols-outlined productediticon">quiz</p>
                                            <input type="text" name="ingredient5" value="<?php echo ($product->ingredient5); ?>" placeholder="Cinquième ingrédient">
                                            <p class="placeholder">Cinquième ingrédient</p> 

                                            <p class="material-symbols-outlined productediticon">quiz</p>
                                            <input type="text" name="ingredient6" value="<?php echo ($product->ingredient6); ?>" placeholder="Sixième ingrédient">
                                            <p class="placeholder">Sixième ingrédient</p> 

                                            <p class="material-symbols-outlined productediticon">quiz</p>
                                            <input type="text" name="ingredient7" value="<?php echo ($product->ingredient7); ?>" placeholder="Septième ingrédient">
                                            <p class="placeholder">Septième ingrédient</p> 

                                            <p class="material-symbols-outlined productediticon">quiz</p>
                                            <input type="text" name="ingredient8" value="<?php echo ($product->ingredient8); ?>" placeholder="Huitième ingrédient">
                                            <p class="placeholder">Huitième ingrédient</p> 

                                            <p class="material-symbols-outlined productediticon">quiz</p>
                                            <input type="text" name="ingredient9" value="<?php echo ($product->ingredient9); ?>" placeholder="Neuvième ingrédient">
                                            <p class="placeholder">Neuvième ingrédient</p> 
                                                
                                            <p class="material-symbols-outlined productediticon">quiz</p>
                                            <input type="text" name="ingredient10" value="<?php echo ($product->ingredient10); ?>" placeholder="Dixième ingrédient">
                                            <p class="placeholder">Dixième ingrédient</p> 
                                        </div>
                                        <div class="parameterlist">
                                            <p class="parametertitle">Ce produit nécessite-t-il un choix des boissons ?</p>
                                            <div class="parameterblock">
                                                <p class="material-symbols-outlined productediticon">coffee</p>
                                                <select name="drinkchoicenumber" class="parameternumber">
                                                    <option value="0">Non</option>
                                                    <option value="1">Une</option>
                                                    <option value="2">Deux</option>
                                                    <option value="3">Trois</option>
                                                    <option value="4">Quatre</option>
                                                    <option value="5">Cinq</option>
                                                    <option value="6">Six</option>   
                                                </select>
                                                <p class="placeholder">Nombre de boissons à choisir</p>
                                            </div>
                                            <br/>
                                            <p class="parametertitle">Ce produit nécessite-t-il un choix d'accompagnement ?</p>
                                            <div class="parameterblock">
                                                <p class="material-symbols-outlined productediticon">takeout_dining</p>
                                                <select name="otherchoicenumber" class="parameternumber">
                                                    <option value="0">Non</option>
                                                    <option value="1">Un</option>
                                                    <option value="2">Deux</option>
                                                    <option value="3">Trois</option>
                                                    <option value="4">Quatre</option>
                                                    <option value="5">Cinq</option>
                                                    <option value="6">Six</option>   
                                                </select>
                                                <p class="placeholder">Nombre d'accompagnements à choisir</p>
                                            </div>
                                            <br/>
                                            <p class="parametertitle">Ce produit nécessite-t-il un choix de pizza ?</p>
                                            <div class="parameterblock">
                                                <p class="material-symbols-outlined productediticon">local_pizza</p>
                                                <select name="pizzachoicenumber" class="parameternumber">
                                                    <option value="0">Non</option>
                                                    <option value="1">Une</option>
                                                    <option value="2">Deux</option>
                                                    <option value="3">Trois</option>
                                                    <option value="4">Quatre</option>
                                                    <option value="5">Cinq</option>
                                                    <option value="6">Six</option>   
                                                </select>
                                                <p class="placeholder">Nombre de pizzas à choisir</p>
                                            </div>
                                            <br/>
                                            <p class="parametertitle">Ce produit nécessite-t-il un choix de sandwichs, burgers ou paninis ?</p>
                                            <div class="parameterblock">
                                                <p class="material-symbols-outlined productediticon">lunch_dining</p>
                                                <select name="sandwichchoicenumber" class="parameternumber">
                                                    <option value="0">Non</option>
                                                    <option value="1">Un</option>
                                                    <option value="2">Deux</option>
                                                    <option value="3">Trois</option>
                                                    <option value="4">Quatre</option>
                                                    <option value="5">Cinq</option>
                                                    <option value="6">Six</option>   
                                                </select>
                                                <p class="placeholder">Nombre de sandwichs/burgers/paninis à choisir</p>
                                            </div>
                                            <br/>
                                            <p class="parametertitle">Ce produit nécessite-t-il un choix de desserts ou de pâtisserie ?</p>
                                            <div class="parameterblock">
                                                <p class="material-symbols-outlined productediticon">bakery_dining</p>
                                                <select name="dessertchoicenumber" class="parameternumber">
                                                    <option value="0">Non</option>
                                                    <option value="1">Une</option>
                                                    <option value="2">Deux</option>
                                                    <option value="3">Trois</option>
                                                    <option value="4">Quatre</option>
                                                    <option value="5">Cinq</option>
                                                    <option value="6">Six</option>   
                                                </select>
                                                <p class="placeholder">Nombre de desserts ou de pâtisserie à choisir</p>
                                            </div>
                                            <br/>
                                            <p class="parametertitle">Ce produit nécessite-t-il un choix de sauce ?</p>
                                            <div class="parameterblock">
                                                <p class="material-symbols-outlined productediticon">multicooker</p>
                                                <select name="saucechoicenumber" class="parameternumber">
                                                    <option value="0">Non</option>
                                                    <option value="1">Une</option>
                                                    <option value="2">Deux</option>
                                                    <option value="3">Trois</option>
                                                    <option value="4">Quatre</option>
                                                    <option value="5">Cinq</option>
                                                    <option value="6">Six</option>   
                                                </select>
                                                <p class="placeholder">Nombre de sauce à choisir</p>
                                            </div>
                                        </div>
                                        <div class="hiddenparameter">
                                            <div class="checkbox-rect">
                                                <p class="material-symbols-outlined productediticon">lock</p>
                                                <label>Rendre ce produit impossible à sélectionner ?</label>                                                
                                            </div>
                                            <p>Cacher ce produit le rendra impossible à sélectionner lorsque l'utilisateur doit faire un choix de produit (par exemple un choix de boisson, de pizza ou de sauce)</p>
                                            <p>L'intêret de cette manoeuvre est d'éviter que l'utilisateur puisse englober un menu dans un autre menu, ou de tout simplement interdire un produit dans les menus.</p>
                                            <select name="hidden" class="parameternumber">
                                                <option value="true">Non</option>
                                                <option value="false">Cacher le produit</option>
                                            </select>
                                        </div>
                                    
                                    
                                    
                                    </div>


                                    
                                


                                
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="editproductbutton" data-dismiss="modal">Fermer</button>
                                <button type="submit" name="editproductsubmit" class="editproductbutton">Modifier</button>
                            </div>
                        </form>
                        
                        </div>
                    </div>
                </div>
                
                <div class="modal fade" id="deleteproduct<?php echo ($product->ProductID); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content deleteproductcontent">
                        <div class="modal-header">
                            <h5 class="modal-title productnameedit" id="exampleModalLabel">SUPPRIMER UN PRODUIT</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="scripts/productdelete.php" method="post" class="deleteproductform">
                            <div class="modal-body">
                                <div class="deleteformblock">
                                    <p class="material-symbols-outlined productediticon">delete</p>
                                    <h4>Confirmer la suppression du produit suivant:</h4>

                                </div>
                                <p class="productnamedelete"><?php echo ($product->name); ?></p>
                                
                                <p class="parametertitle warning">*Notez que la suppression d'un produit est irréversible et ne peux être annulée.</p>                
                                    
                                
                                <input name="ProductID" style="display: none;" value=<?php echo ($product->ProductID); ?> required>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="" data-dismiss="modal">Annuler</button>
                                <button type="submit" name="deleteformsubmit" class="deleteproductbutton">Confirmer</button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div> 














                <?php
                endforeach;
                ?>
            </div>
    </div>



























</div>





<div class="modal fade" id="createproduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content editproductdummy">
            <div class="modal-header">
                <h5 class="modal-title productnameedit" id="exampleModalLabel">CREATION D'UN NOUVEAU PRODUIT</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="editform" action="scripts/createproduct.php" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="Formblock">
                        <p class="material-symbols-outlined productediticon">drive_file_rename_outline</p>
                        <input type="text" name="name" class="productnamedummy" value="" placeholder="Nom du produit" required>
                        <p class="placeholder">Nom du produit</p>   
                    </div>
                    <div class="Formblock">
                        <p class="material-symbols-outlined productediticon">euro</p>
                        <input type="number" class="productpricedummy" value="" name="price" placeholder="Prix du produit" required>
                        <p class="placeholder">Prix du produit (€)</p>   
                    </div>
                    <div class="Formblock">
                        <p class="material-symbols-outlined imageediticon">image</p>
                        <div class="productimagedummydiv">
                            <label for="productimageform" class="productimagelabel">Choisir un fichier..</label>
                            <input type="file" id="productimageform" class="productimageform productimagelabel" name="image" accept=".jpg, .jpeg, .png" />
                            
                        </div>
                    </div>
                    <div class="Formblock">
                        <p class="material-symbols-outlined productediticon">sell</p>
                        <input type="text" class="productnamedummy producttagedit" value="" name="tag" placeholder="Tag du produit">
                        <button type="button" class="emojibutton">😊</button>
                        <p class="placeholder">Tag attaché au produit</p>  
                        <script>
                            new EmojiPicker({
                                trigger: [
                                    {
                                        selector: '.emojibutton',
                                        insertInto: '.producttagedit'
                                        }],
                                        closeButton: true,
                                        specialButtons: '#A18254'
                                        });
                        </script>
                    </div>
                    <div class="Formblock">
                        <p class="material-symbols-outlined productediticon">category</p>
                        <select name="type" value="" required>
                            <option value="menu">Menu 🛍️</option>
                            <option value="pizza">Pizza 🍕</option>
                            <option value="sandwich">Sandwichs, Burgers ou Paninis 🥪</option>
                            <option value="kebab">Kébabs 🥙</option>
                            <option value="other">Accompagnements 🍟</option>
                            <option value="pastries">Pâtisseries 🥐</option>
                            <option value="dessert">Dessert 🍰</option>
                            <option value="drink">Boissons 🥤</option>   
                            <option value="sauce">Sauces 🥫</option>    
                        </select>
                        <p class="placeholder">Catégorie du produit</p>   
                    </div>
                    <div class="Formblock ingredientandparam">
                        <div class="ingredientlist">

                            <p class="material-symbols-outlined productediticon">quiz</p>
                            <input type="text" name="ingredient1" value="" placeholder="Premier ingrédient">
                            <p class="placeholder">Premier ingrédient</p> 

                            <p class="material-symbols-outlined productediticon">quiz</p>
                            <input type="text" name="ingredient2" value="" placeholder="Second ingrédient">
                            <p class="placeholder">Second ingrédient</p>   

                            <p class="material-symbols-outlined productediticon">quiz</p>
                            <input type="text" name="ingredient3" value="" placeholder="Troisième ingrédient">
                            <p class="placeholder">Troisième ingrédient</p> 

                            <p class="material-symbols-outlined productediticon">quiz</p>
                            <input type="text" name="ingredient4" value="" placeholder="Quatrième ingrédient">
                            <p class="placeholder">Quatrième ingrédient</p> 

                            <p class="material-symbols-outlined productediticon">quiz</p>
                            <input type="text" name="ingredient5" value="" placeholder="Cinquième ingrédient">
                            <p class="placeholder">Cinquième ingrédient</p> 

                            <p class="material-symbols-outlined productediticon">quiz</p>
                            <input type="text" name="ingredient6" value="" placeholder="Sixième ingrédient">
                            <p class="placeholder">Sixième ingrédient</p> 

                            <p class="material-symbols-outlined productediticon">quiz</p>
                            <input type="text" name="ingredient7" value="" placeholder="Septième ingrédient">
                            <p class="placeholder">Septième ingrédient</p> 

                            <p class="material-symbols-outlined productediticon">quiz</p>
                            <input type="text" name="ingredient8" value="" placeholder="Huitième ingrédient">
                            <p class="placeholder">Huitième ingrédient</p> 

                            <p class="material-symbols-outlined productediticon">quiz</p>
                            <input type="text" name="ingredient9" value="" placeholder="Neuvième ingrédient">
                            <p class="placeholder">Neuvième ingrédient</p> 
                                                    
                            <p class="material-symbols-outlined productediticon">quiz</p>
                            <input type="text" name="ingredient10" value="" placeholder="Dixième ingrédient">
                            <p class="placeholder">Dixième ingrédient</p> 
                        </div>
                        <div class="parameterlist">
                            <p class="parametertitle">Ce produit nécessite-t-il un choix des boissons ?</p>
                            <div class="parameterblock">
                                <p class="material-symbols-outlined productediticon">coffee</p>
                                <select name="drinkchoicenumber" class="parameternumber">
                                    <option value="0">Non</option>
                                    <option value="1">Une</option>
                                    <option value="2">Deux</option>
                                    <option value="3">Trois</option>
                                    <option value="4">Quatre</option>
                                    <option value="5">Cinq</option>
                                    <option value="6">Six</option>   
                                </select>
                                <p class="placeholder">Nombre de boissons à choisir</p>
                            </div>
                            <br/>
                            <p class="parametertitle">Ce produit nécessite-t-il un choix d'accompagnement ?</p>
                            <div class="parameterblock">
                                <p class="material-symbols-outlined productediticon">takeout_dining</p>
                                <select name="otherchoicenumber" class="parameternumber">
                                    <option value="0">Non</option>
                                    <option value="1">Un</option>
                                    <option value="2">Deux</option>
                                    <option value="3">Trois</option>
                                    <option value="4">Quatre</option>
                                    <option value="5">Cinq</option>
                                    <option value="6">Six</option>   
                                </select>
                                <p class="placeholder">Nombre d'accompagnements à choisir</p>
                            </div>
                            <br/>
                            <p class="parametertitle">Ce produit nécessite-t-il un choix de pizza ?</p>
                            <div class="parameterblock">
                                <p class="material-symbols-outlined productediticon">local_pizza</p>
                                <select name="pizzachoicenumber" class="parameternumber">
                                    <option value="0">Non</option>
                                    <option value="1">Une</option>
                                    <option value="2">Deux</option>
                                    <option value="3">Trois</option>
                                    <option value="4">Quatre</option>
                                    <option value="5">Cinq</option>
                                    <option value="6">Six</option>   
                                </select>
                                <p class="placeholder">Nombre de pizzas à choisir</p>
                            </div>
                            <br/>
                            <p class="parametertitle">Ce produit nécessite-t-il un choix de sandwichs, burgers ou paninis ?</p>
                            <div class="parameterblock">
                                <p class="material-symbols-outlined productediticon">lunch_dining</p>
                                <select name="sandwichchoicenumber" class="parameternumber">
                                    <option value="0">Non</option>
                                    <option value="1">Un</option>
                                    <option value="2">Deux</option>
                                    <option value="3">Trois</option>
                                    <option value="4">Quatre</option>
                                    <option value="5">Cinq</option>
                                    <option value="6">Six</option>   
                                </select>
                                <p class="placeholder">Nombre de sandwichs/burgers/paninis à choisir</p>
                            </div>
                            <br/>
                            <p class="parametertitle">Ce produit nécessite-t-il un choix de desserts ou de pâtisserie ?</p>
                            <div class="parameterblock">
                                <p class="material-symbols-outlined productediticon">bakery_dining</p>
                                <select name="dessertchoicenumber" class="parameternumber">
                                    <option value="0">Non</option>
                                    <option value="1">Une</option>
                                    <option value="2">Deux</option>
                                    <option value="3">Trois</option>
                                    <option value="4">Quatre</option>
                                    <option value="5">Cinq</option>
                                    <option value="6">Six</option>   
                                </select>
                                <p class="placeholder">Nombre de desserts ou de pâtisserie à choisir</p>
                            </div>
                            <br/>
                            <p class="parametertitle">Ce produit nécessite-t-il un choix de sauce ?</p>
                            <div class="parameterblock">
                                <p class="material-symbols-outlined productediticon">multicooker</p>
                                <select name="saucechoicenumber" class="parameternumber">
                                    <option value="0">Non</option>
                                    <option value="1">Une</option>
                                    <option value="2">Deux</option>
                                    <option value="3">Trois</option>
                                    <option value="4">Quatre</option>
                                    <option value="5">Cinq</option>
                                    <option value="6">Six</option>   
                                </select>
                                <p class="placeholder">Nombre de sauce à choisir</p>
                            </div>
                        </div>
                        <div class="hiddenparameter">
                            <div class="checkbox-rect">
                                <p class="material-symbols-outlined productediticon">lock</p>
                                <label>Rendre ce produit impossible à sélectionner ?</label>                                                
                            </div>
                            <p>Cacher ce produit le rendra impossible à sélectionner lorsque l'utilisateur doit faire un choix de produit (par exemple un choix de boisson, de pizza ou de sauce)</p>
                            <p>L'intêret de cette manoeuvre est d'éviter que l'utilisateur puisse englober un menu dans un autre menu, ou de tout simplement interdire un produit dans les menus.</p>
                            <select name="hidden" class="parameternumber">
                                <option value="true">Non</option>
                                <option value="false">Cacher le produit</option>
                            </select>
                        </div>
                    </div>   
                </div>
                <div class="modal-footer">
                    <button type="button" class="" data-dismiss="modal">Fermer</button>
                    <button type="submit" name="createproductsubmit" class="editproductbutton">Créer un produit</button>
                </div>
            </form>         
        </div>
    </div>
</div>






<?php include "pages/footer.php";

                                    }

else {
    header("location: index.php");
}