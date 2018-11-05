<?php

require "controllers/controller.php";

if (isset($_GET["action"])) {
    $action = htmlspecialchars($_GET["action"]); // Petite fonction de sécurité

    switch($action) {
    case "see_view_1":
        seeView1();
        break;

    case "see_view_2":
        seeView2();
        break;

    default:
        echo "Erreur 404";
        break;
    }
} else {
    seeView1();
}
?>         