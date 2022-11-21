<?php
require_once '../database/init.php';


if (isset($_POST["deleteformsubmit"])) {


    $ProductID = $_POST["ProductID"];
    $deleterequest = "DELETE FROM products WHERE ProductID=?";
    $ddb->prepare($deleterequest)->execute([$ProductID]);

    header('Location: ../pannel.php');



}
