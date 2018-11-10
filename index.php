<?php

require "controllers/controller.php";

if (isset($_GET["action"])) {
    $action = htmlspecialchars($_GET["action"]); // Petite fonction de sécurité

    switch($action) {
    case "see_PageAc":
        seeViewAccueil();
        break;

    case "see_pagedevis":
        seeViewDevis();
        break;

    case "see_pageservice":
        seeViewService();
        break;    

    default:
        echo "Erreur 404";
        break;
    }
} else {
    seeViewAccueil();
}
?>        