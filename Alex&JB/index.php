<?php

require "controllers/controller.php";
session_start();

if (isset($_GET["action"])) {
    $action = htmlspecialchars($_GET["action"]); // Petite fonction de s�curit�

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

    case "see_pagehistoire":
        seeViewHistoire();       
        break;

    case "see_pagefaq":
        seeViewFaq();       
        break;

    case "add_message":
    addMessage();
    break;

    case "add_devis":
    addDevis();
    break;
 /* index des pages une fois que nous sommes connectés.*/
        case "see_choose_house_page":
            displayUserProperties();
            break;

        // Idem pour la page d'ajout de maison
        case 'see_add_house_page':
            seeAddHousePage();
            break;

        // méthode pour ajouter une propriété
        case 'add_property':
            addPropertyMethod();
            break;

        // Page pour voir les infos sur une maison
        case "see_info_house_page":
            seeInfoHousePage();
            break;

        case 'see_Ajout_batiment':
            seeAjoutBatiment();
            break;    

        // Page pour programmer un scénario
        case 'see_scenario_page':
            seeScenarioPage();
            break;

    default:
        echo "Erreur 404";
        break;
    }
} else {
    seeViewAccueil();
}
?>        