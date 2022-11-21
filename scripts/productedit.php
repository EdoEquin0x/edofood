<?php

require_once '../database/init.php';


if (isset($_POST["editproductsubmit"])) {
    $name = $_POST["name"];
    $price = $_POST["price"];
    $tag = $_POST["tag"];
    $type = $_POST["type"];
    $ProductID = $_POST["ProductID"];

    if (isset($_FILES['image'])){
        if ($_FILES['image']['size'] > 200) {
            $filename = "$name-$ProductID";
            $infos = pathinfo($_FILES['image']['name']);
            $extension = $infos['extension'];
            move_uploaded_file($_FILES['image']['tmp_name'], "../assets/products/$filename.$extension");
            $updatepicrequest = "UPDATE products SET image=? WHERE ProductID=?";
            $ddb->prepare($updatepicrequest)->execute(["$filename.$extension", $ProductID]);
            
        }
    }

    

    $ingredient1 = $_POST["ingredient1"];
    $ingredient2 = $_POST["ingredient2"];
    $ingredient3 = $_POST["ingredient3"];
    $ingredient4 = $_POST["ingredient4"];
    $ingredient5 = $_POST["ingredient5"];
    $ingredient6 = $_POST["ingredient6"];
    $ingredient7 = $_POST["ingredient7"];
    $ingredient8 = $_POST["ingredient8"];
    $ingredient9 = $_POST["ingredient9"];
    $ingredient10 = $_POST["ingredient10"];

    $drinkchoicenumber = $_POST["drinkchoicenumber"];
    $otherchoicenumber = $_POST["otherchoicenumber"];
    $pizzachoicenumber = $_POST["pizzachoicenumber"];
    $sandwichchoicenumber = $_POST["sandwichchoicenumber"];
    $dessertchoicenumber = $_POST["dessertchoicenumber"];
    $saucechoicenumber = $_POST["saucechoicenumber"];

    $hidden = $_POST["hidden"];

    $choiceupdaterequest = "UPDATE products SET drinkchoicenumber=?, otherchoicenumber=?, pizzachoicenumber=?, sandwichchoicenumber=?, dessertchoicenumber=?, saucechoicenumber=?, hidden=? WHERE ProductID=?";
    $ddb->prepare($choiceupdaterequest)->execute([$drinkchoicenumber, $otherchoicenumber, $pizzachoicenumber, $sandwichchoicenumber, $dessertchoicenumber, $saucechoicenumber, $hidden, $ProductID]);
                        








    $updateproductrequest = "UPDATE products SET name=?, price=?, tag=?, type=?, ingredient1=?, ingredient2=?, ingredient3=?, ingredient4=?, ingredient5=?, ingredient6=?, ingredient7=?, ingredient8=?, ingredient9=?, ingredient10=? WHERE ProductID=?";
    $ddb->prepare($updateproductrequest)->execute([$name, $price, $tag, $type, $ingredient1, $ingredient2, $ingredient3, $ingredient4, $ingredient5, $ingredient6, $ingredient7, $ingredient8, $ingredient9, $ingredient10, $ProductID]);
                        

    header('Location: ../pannel.php');



}
else {
    echo "Ne marche pas";
}