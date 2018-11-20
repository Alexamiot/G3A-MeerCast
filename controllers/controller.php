<?php
require "models/model.php";

function seeViewAccueil() {
    require "view/PageAccueil/PageAc.php";
}

function seeViewDevis() {
	$successmessage="";
    require "view/PageAccueil/Devis/pagedevis.php";
}
function seeViewService(){
	require "view/PageAccueil/Services/pageservice.php";
}
function seeViewHistoire(){
	require "view/PageAccueil/Histoire/pagehistoire.php";
}
function seeViewFaq(){
	require "view/PageAccueil/faq/pagefaq.php";
}
function addMessage() {
    if ($_POST["name"] && $_POST["last_name"] && $_POST["email"]&& $_POST["message"]) {

        $name = htmlspecialchars($_POST["name"]);
        $last_name = htmlspecialchars($_POST["last_name"]);
        $email = htmlspecialchars($_POST["email"]);
        $message = htmlspecialchars($_POST["message"]);

        insertMessage($name, $last_name, $email, $message);

       	$successmessage="Votre message à été stocké dans notre base de donnée";
        require "view/PageAccueil/Devis/pagedevis.php";

    } else {
    	$successmessage="Echec de l'envoie de votre formulaire, nos serveurs sont surement en maintenance";
        require "view/PageAccueil/Devis/pagedevis.php";
    }
}
/*function addDevis() {

    if ($_POST["name"] && $_POST["last_name"] && $_POST["email"]&& $_POST["message"]) {

        $name = htmlspecialchars($_POST["name"]);
        $last_name = htmlspecialchars($_POST["last_name"]);
        $email = htmlspecialchars($_POST["email"]);
        $message = htmlspecialchars($_POST["message"]);
        if ($_POST["alarm"]) { $alarme = true;}
        else {$alarme=false;}
        $type = $_POST["building"]

        insertMessage($name, $last_name, $email, $message);

        require "view/success_pages/add_devis_success.php";

    } else {
        require "view/success_pages/add_devis_fail.php";
    }
}*/
?>