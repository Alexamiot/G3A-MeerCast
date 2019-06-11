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

    case "see_environment_page":
        seeViewEnvironment();
        break;

    case "add_message":
    addMessage();
    break;

    case "add_devis":
    addDevis();
    break;

    case "see_forum":
        seeforum();
        break;
    case "inscription":
        inscription();
        break;

    case "ajoutAdmin":
        ajoutAdmin();
        break;

    case "deconnexion":
        deconnexion();
        break;
    case "connexion":
        connexion();
        break;
    case "addPost":
        addPost();
        break;
    case "addPost2":
        addPost2();
        break;
    case "administrateur":
        administrateur();
        break;

 /* index des pages une fois que nous sommes connectés.*/
    case "see_choose_house_page":
        displayUserProperties();
        break;

    // Idem pour la page d'ajout de maison
    case 'see_add_house_page':
        seeAddHousePage();
        break;
        
    case "see_PageMonProfil":
        seeViewMonprofil();
            break;

    case "updateProfil":
    updateProfil();
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

    case 'see_pagecapteur':
        seeCapteurPage();
        break;

    case 'see_admin_users':
        seeAdminUers();
        break;

    case 'see_pagedevis_admin':
        seepagedevisadmin();
        break;

    case 'see_forum_admin':
        seeforumadmin();
        break;

    case 'see_faq_admin':
        seefaqadmin();
        break;

    case 'add_faq':
        addfaq();
        break;

    case 'suppTopicFaq':
        suppTopicFaq();
        break;

     case 'changecatalogue':
        changecatalogue();
        break;

    case 'inscription2':
        inscription2();
    break;

    case 'adminservice':
        adminservice();
    break;

    case 'addtoadminservice':
        addtoadminservice();
    break;

    case 'see_adminmaison':
        see_adminmaison();
    break;

    case 'addapiece':
        addapiece();
    break;

    case 'addCategorie':
        addCategorie();
    break;
    case 'suppAdmin':
        suppAdmin();
    break;
    case 'suppadminservice':
        suppadminservice();
    break;

    case 'addCapteurToPiece':
        addCapteurToPiece();
    break;
    case 'addCapteur':
        addCapteur();
    break;
     case 'see_admin_messages':
        lesmessages();
    break;
    
   

    default:
        echo "Erreur 404";
        break;
    }
} else {
    seeViewAccueil();
}
?>        