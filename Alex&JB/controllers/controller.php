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
function addDevis() {

    if (($_POST["alarm"] || $_POST["elec"] || $_POST["heater"]|| $_POST["AC"] || $_POST["pool"]||  $_POST["gate"]||  $_POST["lighting"]||  $_POST["devices"]||  $_POST["shutters"]||  $_POST["garden"])&& ($_POST["building"] && $_POST["construction"] && $_POST["surface"] && $_POST["type"] && $_POST["gender"] && $_POST["name"] && $_POST["last_name"] && $_POST["tel"] && $_POST["phonenumber"] && $_POST["email"] && $_POST["adress"] && $_POST["areacode"] && $_POST["city"] && $_POST["country"] && $_POST["condition"])) {

        $comment= htmlspecialchars($_POST["comment"]);
		$name = htmlspecialchars($_POST["name"]);
        $last_name = htmlspecialchars($_POST["last_name"]);
        $email = htmlspecialchars($_POST["email"]);
        $phonenumber= htmlspecialchars($_POST["phonenumber"]);
        $adress= htmlspecialchars($_POST["adress"]);
        $adress2= htmlspecialchars($_POST["adress2"]);
        $city= htmlspecialchars($_POST["city"]);
        $areacode= htmlspecialchars($_POST["areacode"]);
        $building =$_POST["building"];
        $construction =$_POST["construction"];
        $surface =$_POST["surface"];
        $country =$_POST["country"];
        $tel =$_POST["tel"];
        $type =$_POST["type"];
        $gender =$_POST["gender"];
        $alarm =$_POST["alarm"];
        $elec =$_POST["elec"];
        $heater =$_POST["heater"];
        $AC =$_POST["AC"];
        $pool =$_POST["pool"];
        $gate =$_POST["gate"];
        $lighting =$_POST["lighting"];
        $devices =$_POST["devices"];
        $shutters =$_POST["shutters"];
        $garden =$_POST["garden"];


        $successmessage="Votre devis à été stocké dans notre base de donnée, vous pouvez continuer votre navigation";
        insertDevis($alarm, $elec, $heater, $AC, $pool, $gate, $lighting, $devices, $shutters, $garden,$comment, $name, $last_name, $email, $tel, $phonenumber, $adress, $adress2, $city, $areacode, $building, $construction, $surface, $country, $type, $gender);

        require "view/PageAccueil/Devis/pagedevis.php";

    } 
    else {
    	$successmessage="Votre devis n'a pas été stocké dans notre base de donnée, veuillez rééssayer";
        require "view/PageAccueil/Devis/pagedevis.php";
    }
}
/*              Controller pour les pages une fois que nous sommes connectés.
 Cette fonction définit une variable $users dans laquelle on va stocker toutes les propriétés d'un utilisateur
  Ces propriétés sont stockées dans la base de données, donc pour les récupérer on fait appel à une fonction du modèle
 */
function displayUserProperties() {
    $properties = getProperties();
    $propertiesArray = []; 
    $it = 0;
    while ($property = $properties->fetch()) {
        $propertiesArray[$it] = $property; 
        $it += 1;
    }

    require "View/PageMaison/HTML_Page_choix_maison.php";
}

// fonction qui demande l'affichage de la page de choix de maison ( page d'accueil en gros )
/*function seeChooseHousePage() {
     require "Views/HTML_Page_choix_maison.php";
}
*/
// Affichage de la page pour ajouter une maison
function seeAddHousePage() {
    require "View/PageMaison/HTML_Ajout_maison.php";
}

// Ajout d'une propriété
function addPropertyMethod() {
    if ($_POST["name"] && $_POST["property_type"]) {

        $name = htmlspecialchars($_POST["name"]);
        $property_type = htmlspecialchars($_POST["property_type"]);

        insertProperty($name, $property_type);

        require "View/PageMaison/HTML_Ajout_maison_succes.php";

    } else {
        require "View/PageMaison/HTML_Ajout_maison_echec.php";
    }
}

// Affichage de la page pour consulter les infos relatives à une maison
function seeInfoHousePage() {
    require "View/PageMaison/HTML_Page_infos_maison.php";
}

// Affichage de la page où l'on peut programmer un scénario
function seeScenarioPage() {
    require "View/PageMaison/HTML_Scenario.php";
}
?>