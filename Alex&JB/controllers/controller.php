<?php
require "models/model.php";

function seeViewAccueil() {
    require "view/PageAccueil/PageAc.php";
}

function seeViewDevis() {
	$successmessage="";
    $catalogue = getCatalogue();
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
    	$successmessage="Echec de l'envoie de votre formulaire, nos serveurs sont surement en maintenance ou une de vos information est invalide";
        require "view/PageAccueil/Devis/pagedevis.php";
    }
}
function addDevis() {

    echo "<pre>";
    print_r($_POST);
    echo "</pre>";

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

        $catalogue=getCatalogue();
        require "view/PageAccueil/Devis/pagedevis.php";

    } 
    else {
        $catalogue=getCatalogue();
    	$successmessage="Votre devis n'a pas été stocké dans notre base de donnée, veuillez rééssayer sans utiliser l'auto-complétion";
        require "view/PageAccueil/Devis/pagedevis.php";
    }
}
function seeforum() {
    $name="";
    if(isset($_POST["comadditionnel"])){
      
      $comadditionnel = htmlspecialchars($_POST["comadditionnel"]);
      
      if(strlen($comadditionnel)>=1){
        
        $newtopic=$_POST["sujet"];
        
         insertTopic2($newtopic,$comadditionnel);
        

         require "view/PageAccueil/forum/forum.php";
         
      }
     
       
    }
    else{
      require "view/PageAccueil/forum/forum.php";
    }
   
}





function administrateur() {
    $name="";
    if( isset($_POST["comadditionnel"])){
      
      $comadditionnel = htmlspecialchars($_POST["comadditionnel"]);
      
      if( strlen($comadditionnel)>=1){
        
        $newtopic=$_POST["sujet"];
        
         insertTopic2($newtopic,$comadditionnel);
        

         require "view/PageAccueil/forum/administration.php";
         
      }
     
       
    }
     elseif(isset($_GET["supptopic"])){
      
      $supptopic=htmlspecialchars($_GET["supptopic"]);
      suppTopic($supptopic);
      require "view/PageAccueil/forum/administration.php";
    }
    elseif(isset($_GET["suppmessage"])){
        $suppmessage=htmlspecialchars($_GET["suppmessage"]);
      suppmessage($suppmessage);
      require "view/PageAccueil/forum/administration.php";
    }
    else{

      require "view/PageAccueil/forum/administration.php";
    }
   
}

function addPost() {
    $name="";
    if(isset($_GET["newtopic"])){
      $newtopic=$_GET["newtopic"];
      require "view/PageAccueil/forum/forum.php";
    

    }
    elseif(isset($_POST["newtopic"]) && isset($_POST["contenu"])){
      $newtopic =htmlspecialchars($_POST["newtopic"]);
        $contenu = htmlspecialchars($_POST["contenu"]);
        $categorie=htmlspecialchars($_POST["categorie"]);
        if((strlen($newtopic)>4 AND strlen($newtopic)<20) AND strlen($contenu)>=1){

           insertTopic($newtopic,$contenu,$categorie);
           
          require "view/PageAccueil/forum/forum.php";

        }
        else{
          require "view/PageAccueil/forum/addPost.php";
        }
        
    }
else{
    require "view/PageAccueil/forum/addPost.php";
  }
}


function addPost2() {
   $name="";
    if(isset($_GET["newtopic"])){
      $newtopic=htmlspecialchars($_GET["newtopic"]);
      require "view/PageAccueil/forum/administration.php";
    

    }
    elseif(isset($_POST["newtopic"]) && isset($_POST["contenu"])){
      $newtopic = htmlspecialchars($_POST["newtopic"]);
        $contenu = htmlspecialchars($_POST["contenu"]);
        $categorie=htmlspecialchars($_POST["categorie"]);
        if((strlen($newtopic)>4 AND strlen($newtopic)<20) AND strlen($contenu)>=1){

           insertTopic($newtopic,$contenu, $categorie);
           
          require "view/PageAccueil/forum/administration.php";

        }
        else{
          require "view/PageAccueil/forum/addPost.php";
        }
        
    }
else{
    require "views/PageAccueil/forum/addPost.php";
  }
}




function inscription() {
    $erreur="";
    $name="";
    if ( isset($_POST["pseudo"]) && isset($_POST["email"]) && isset($_POST["mdp"])&& isset($_POST["mdp2"])) {
        
        $pseudo = htmlspecialchars($_POST["pseudo"]);
        $email = htmlspecialchars($_POST["email"]);
        $mdp = htmlspecialchars($_POST["mdp"]);
        $mdp2 = htmlspecialchars($_POST["mdp2"]);
        $syntaxe = '#^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,6}$#';
        if ((strlen($pseudo)>4 AND strlen($pseudo)<20) AND preg_match($syntaxe, $email) AND (strlen($mdp)>4 AND strlen($mdp)<20) AND ($mdp==$mdp2)) {
            

            insertUser($pseudo, $email, $mdp);
            getUsers($pseudo);
            
           require "view/PageAccueil/forum/forum.php";
        }
        else{
         if (!preg_match($syntaxe, $email)) {
           $erreur="Syntaxe du email n'est pas la bonne";
            }


        if (!(strlen($pseudo)>4 AND strlen($pseudo)<20) ){
            $erreur ="il faut un speudo de bonne taille ";
         }

         if (!(strlen($mdp)>4 AND strlen($mdp)<20)) {

        $errreur ="Il faut un mdp de la bonne taille";
    }
    if (!($mdp==$mdp2 ) ){
            $erreur ="les mdp ne correspondent pas !! ";
         }
          require "view/PageAccueil/forum/inscription.php";
    }


    } else {
        require "view/PageAccueil/forum/inscription.php";
   
}
}


function deconnexion(){

require   "view/PageAccueil/forum/deconnexion.php";


}


function connexion(){

   $erreur="";

    if ( isset($_POST["pseudo"]) && isset($_POST["mdp"])) {
        
        $pseudo = htmlspecialchars($_POST["pseudo"]);
       
        $mdp = htmlspecialchars($_POST["mdp"]);
        
        $rep2=getAdmin($pseudo, $mdp);
        $rep= getUser($pseudo, $mdp);

        if ($rep){
            getUsers($pseudo);
            $actionner=true;
           require "view/PageAccueil/forum/forum.php";
        }
        elseif($rep2){
            $_SESSION['id']=$rep2['idAdmin'];
            $_SESSION['pseudo']=$rep2['pseudo'];
            $actionner=true;
            require "view/PageAccueil/forum/forum.php";
        }
            
        
        else{
         $erreur ="L'un des parametre est faux !";
         $actionner=true;
          require "view/PageAccueil/forum/connexion.php";
    }


    } /*else {
        $actionner=true;
        require "view/PageAccueil/forum/connexion.php";
   
}*/
   
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

    require "view/PageMaison/HTML_Page_choix_maison.php";
}

// fonction qui demande l'affichage de la page de choix de maison ( page d'accueil en gros )
/*function seeChooseHousePage() {
     require "Views/HTML_Page_choix_maison.php";
}
*/
// Affichage de la page pour ajouter une maison
function seeAddHousePage() {
    require "view/PageMaison/HTML_Ajout_maison.php";
}
function seeAjoutBatiment() {
    require "view/PageMaison/Ajout_batiment.php";
}

// Ajout d'une propriété
function addPropertyMethod() {
    if ($_POST["name"] && $_POST["property_type"]) {

        $name = htmlspecialchars($_POST["name"]);
        $property_type = htmlspecialchars($_POST["property_type"]);

        insertProperty($name, $property_type);

        require "view/PageMaison/HTML_Ajout_maison_succes.php";

    } else {
        require "view/PageMaison/HTML_Ajout_maison_echec.php";
    }
}

// Affichage de la page pour consulter les infos relatives à une maison
function seeInfoHousePage() {
    if (isset($_GET['propertyName'])) {
        $_SESSION['propertyName'] = $_GET['propertyName'];
    }
    require "view/PageMaison/HTML_Page_infos_maison.php";
}

// Affichage de la page où l'on peut programmer un scénario
function seeScenarioPage() {
    require "view/PageMaison/HTML_Scenario.php";
}
function seeCapteurPage() {
    require "view/PageMaison/HTML_Page_CapteurActionneur.php";
}
