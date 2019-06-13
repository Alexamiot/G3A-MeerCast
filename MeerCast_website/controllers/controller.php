<?php
require "models/model.php";

function seeViewAccueil() {
    require "view/PageAccueil/PageAc.php";
}

function suppadminservice(){
  if (isset($_POST["suppservice"])) {
    $service=htmlspecialchars($_POST["suppservice"]);

    suppadminservices($service);
   adminservice();
 }
}




function addCapteurToPiece(){
    if (isset($_GET['propertyName'])) {
            $_SESSION['propertyName'] = htmlspecialchars($_GET['propertyName']);
        }
        if(isset($_POST["chambre"]) && isset($_POST["capteur"]) ){

        $room=htmlspecialchars($_POST["chambre"]);
        $capteur=htmlspecialchars($_POST["capteur"]);
        $valeur="null";
        $houses=getIdHouseByName($_SESSION['propertyName']);
            foreach ($houses as $house ) {
            houseroomsensors($house["id"],$room, $capteur,$valeur);
            }
        }
        see_adminmaison();
}


// function addCapteur(){
//   if (isset($_POST["capteur"])) {

//     $capteur=htmlspecialchars($_POST["capteur"]);

    
//    see_adminmaison();
//   }
  
// else{
//   see_adminmaison();
// }
    
// }



function addapiece(){


      // $service=htmlspecialchars($_POST["service"]);

      // $description=htmlspecialchars($_POST["description"]);

      // $image=htmlspecialchars($_POST["image"]);
      // nouvellepiece();


if (isset($_GET['propertyName'])) {
        $_SESSION['propertyName'] = htmlspecialchars($_GET['propertyName']);
    }
    
    $sensores=lescapteur();
    $room="";
    if(isset($_POST["name"]) && isset($_POST["image"]) ){

    $room=htmlspecialchars($_POST["name"]);
    $picture=htmlspecialchars($_POST["image"]);
    addpiece($room, $picture);
  }
  
    $idroom=idpiece($room);
    
   

    $houses=getIdHouseByName($_SESSION['propertyName']);
  
    foreach ($idroom as $id ) {
     foreach ($houses as $house ) {
       nouvellepiece($house["id"],$id["id"]);
     }
    }

    $valeurcapteur="null";



    if($_POST["Température"]!="non"){
      
      $idroom=idpiece($room);
    $houses=getIdHouseByName($_SESSION['propertyName']);
    $checkbox= htmlspecialchars($_POST["Température"]);
    echo $checkbox;
    echo $valeurcapteur;

      foreach ($idroom as $id ) {
     foreach ($houses as $house ) {
      echo "house id";
      echo $house["id"];
      echo "room id";
    echo $id["id"];
    houseroomsensors($house["id"],$id["id"],$checkbox,$valeurcapteur);
      }
      }
    }
    if ($_POST["Luminosité"]!="non"){
      
      $idroom=idpiece($room);
    $houses=getIdHouseByName($_SESSION['propertyName']);
    $checkbox= htmlspecialchars($_POST["Luminosité"]);
    echo $checkbox;
    echo $valeurcapteur;
    foreach ($idroom as $id ) {
     foreach ($houses as $house ) {
      echo "house id";
      echo $house["id"];
       echo "room id";
    echo $id["id"];
    houseroomsensors($house["id"],$id["id"],$checkbox,$valeurcapteur);
  }}
    }
    if ($_POST["Humidité"]!="non"){
      
      $idroom=idpiece($room);
    $houses=getIdHouseByName($_SESSION['propertyName']);
    $checkbox= htmlspecialchars($_POST["Humidité"]);
    echo $checkbox;
    echo $valeurcapteur;
    foreach ($idroom as $id ) {
     foreach ($houses as $house ) {
      echo "house id";
      echo $house["id"];
       echo "room id";
    echo $id["id"];
    houseroomsensors($house["id"],$id["id"],$checkbox,$valeurcapteur);
}}
    }
    if ($_POST["Télévision"]!="non"){
      
      $idroom=idpiece($room);
    $houses=getIdHouseByName($_SESSION['propertyName']);
    $checkbox= htmlspecialchars($_POST["Télévision"]);
    echo $checkbox;
    echo $valeurcapteur;
    foreach ($idroom as $id ) {
     foreach ($houses as $house ) {
      echo "house id";
      echo $house["id"];
       echo "room id";
    echo $id["id"];
    houseroomsensors($house["id"],$id["id"],$checkbox,$valeurcapteur);
  }}
    }

    $rooms = getRooms();
    // on crée ici des tableaux et grâce aux deux whiles on rajoute les éléments dans les tableaux dont j'ai besoin dans la view
    $roomsArray = array(array());
    $itR = 0; 
    $sensorsArray = array(array(array()));
    $itS1 = 0;
    $itS2 =  0;

    while ($room = $rooms->fetch()) {

        $roomname = $room['room_name'];
        $pictureName = $room['picture_name'];
        $picturePath = "view/Design/imagesMaison/".$pictureName.".jpg";
        $roomId = $room['id'];

        $roomsArray[$itR][0] = $roomname;
        // $roomsArray[$itR][1] = $pictureName;
        $roomsArray[$itR][2] = $picturePath;
        $roomsArray[$itR][1] = $roomId; 

        $sensors = getSensors();

        while ($sensor = $sensors->fetch()) {

            if ($sensor['room_name'] == $roomsArray[$itR][0]) {

                // on stocke dans le tableau le nom de la pièce, celui du capteur et la valeur de sa mesure
                $sensorsArray[$itS1][$itS2][0] = $sensor['room_name'];
                $sensorsArray[$itS1][$itS2][1] = $sensor['sensor_name'];
                $sensorsArray[$itS1][$itS2][2] = $sensor['value'];

                // comme pour les pièces, on crée une variable qui contient le chemin vers les images pour les capteurs
                $sensorPictName = $sensor['picture_name'];
                $sensorPictPath = "view/Design/imagesMaison/".$sensorPictName.".png";
                // et on la stocke dans le tableau
                $sensorsArray[$itS1][$itS2][3] = $sensorPictPath;

                $itS2+=1;
            }
        }
        $itR+=1;
        $itS1+=1;
    }

    /*$admins=getAdmin();
    $bool=true;
    foreach ($admins as $admin) {
        if ($_SESSION["id"] == $admin["id"]) {
            $bool=false;

        }
    }
if($bool==false) {*/
    require "view/PageAccueil/admisnistration/adminmaison.php";/*
}
else {
    require "view/PageMaison/HTML_Page_infos_maison.php";
}*/



}





function see_adminmaison(){
if (isset($_GET['propertyName'])) {
        $_SESSION['propertyName'] = $_GET['propertyName'];
    }
    $rooms = getRooms();
    $rooms2 = getRooms();
    $sensores=lescapteur();
    $sensorAdd=lescapteur();
    
    // on crée ici des tableaux et grâce aux deux whiles on rajoute les éléments dans les tableaux dont j'ai besoin dans la view
    $roomsArray = array(array());
    $itR = 0; 
    $sensorsArray = array(array(array()));
    $itS1 = 0;
    $itS2 = 0;

    while ($room = $rooms->fetch()) {

        $roomname = $room['room_name'];
        $pictureName = $room['picture_name'];
        $picturePath = "view/Design/imagesMaison/".$pictureName.".jpg";
        $roomId = $room['id'];

        $roomsArray[$itR][0] = $roomname;
        // $roomsArray[$itR][1] = $pictureName;
        $roomsArray[$itR][2] = $picturePath;
        $roomsArray[$itR][1] = $roomId; 

        $sensors = getSensors();

        while ($sensor = $sensors->fetch()) {

            if ($sensor['room_name'] == $roomsArray[$itR][0]) {

                // on stocke dans le tableau le nom de la pièce, celui du capteur et la valeur de sa mesure
                $sensorsArray[$itS1][$itS2][0] = $sensor['room_name'];
                $sensorsArray[$itS1][$itS2][1] = $sensor['sensor_name'];
                $sensorsArray[$itS1][$itS2][2] = $sensor['value'];

                // comme pour les pièces, on crée une variable qui contient le chemin vers les images pour les capteurs
                $sensorPictName = $sensor['picture_name'];
                $sensorPictPath = "view/Design/imagesMaison/".$sensorPictName.".png";
                // et on la stocke dans le tableau
                $sensorsArray[$itS1][$itS2][3] = $sensorPictPath;

                $itS2+=1;
            }
        }
        $itR+=1;
        $itS1+=1;
    }
require "view/PageAccueil/admisnistration/adminmaison.php";

}

function addtoadminservice(){

  if (isset($_FILES['monfichier']) AND $_FILES['monfichier']['error'] == 0)
{
  echo "debug1";
 
    if ($_FILES['monfichier']['size'] <= 1000000)
        {
          echo "debug2";
 
                            // Testons si l'extension est autorisée
                $infosfichier = pathinfo($_FILES['monfichier']['name']);
                $extension_upload = $infosfichier['extension'];
                $extensions_autorisees = array('png');
                if (in_array($extension_upload, $extensions_autorisees))

                {
                  echo "debug3";
                
                   move_uploaded_file($_FILES['monfichier']['tmp_name'], 'view/PageAccueil/Image/' . basename($_FILES['monfichier']['name']));
                        echo "L'envoi a bien été effectué !";


                }else {
            echo "Choisissez une image";
        }
 



    
    }else {
        echo "Fichier trop gros";

        }
}

$service=htmlspecialchars($_POST["service"]);
echo $service;
$description=htmlspecialchars($_POST["description"]);
echo $description;
$image=htmlspecialchars(basename($_FILES['monfichier']['name'], ".png"));
echo $image;
addadminservice($service,$description,$image);

$services2= getadminservice();
$services= getadminservice();
require "view/PageAccueil/admisnistration/adminservice.php";

}

function adminservice(){

$services= getadminservice();
$services2= getadminservice();


  require "view/PageAccueil/admisnistration/adminservice.php";
}

function seeAdminUers(){
  $erreur="";
  $lesUsersetMaison= userEtMaison();
  $lesUsersetMaison2= userEtMaison();


  require "view/PageAccueil/admisnistration/adminusers.php";
}

function suppAdmin (){
  if ($_POST["suppuser"]) {
    $pseudo=htmlspecialchars($_POST["suppuser"]);
    suppUsers ($pseudo);
  suppAdmins($pseudo);
  seeAdminUers();
  }
  
  
}
function seepagedevisadmin(){
  $successmessage="";
    $catalogue = getCatalogue();
    $catalogue2 = getCatalogue();
require "view/PageAccueil/admisnistration/admindevis.php";

}

function changecatalogue(){
 if($_POST["newbox"] && $_POST["name"] ){
  $name = htmlspecialchars($_POST["name"]);
  $newbox = htmlspecialchars($_POST["newbox"]);
  AddTomyCatalogue($name,$newbox);
 }
  if($_POST["suppbox"]){

    $suppbox=htmlspecialchars($_POST["suppbox"]);
    SuppFromMyCatalogue ($suppbox);
  }

$successmessage="";
$catalogue = getCatalogue();
$catalogue2 = getCatalogue();

require "view/PageAccueil/admisnistration/admindevis.php";

}

function seeforumadmin(){
  require "view/PageAccueil/admisnistration/pageadmin.php";
}

function seefaqadmin(){

  $faqs=myFaq();
require "view/PageAccueil/admisnistration/faqadmin.php";
}

function seeViewDevis() {
	$successmessage="";
    $catalogue = getCatalogue();
    $catalogue2 = getCatalogue();
    require "view/PageAccueil/Devis/pagedevis.php";
}
function seeViewService(){
  $services= getadminservice();
	require "view/PageAccueil/Services/pageservice.php";
}
function seeViewHistoire(){
	require "view/PageAccueil/Histoire/pagehistoire.php";
}
function addfaq(){
  if ($_POST["question"] && $_POST["reponse"] ){
     $question = htmlspecialchars($_POST["question"]);
      $reponse = htmlspecialchars($_POST["reponse"]);
      AddTomyFaq($question,$reponse);
      $faqs=myFaq();
    require "view/PageAccueil/admisnistration/faqadmin.php";
  }
  else{
    $faqs=myFaq();
    require "view/PageAccueil/admisnistration/faqadmin.php";
  }
}

function suppTopicFaq(){
    if(isset($_GET["topicToSupp"])){
    $question = htmlspecialchars($_GET["topicToSupp"]);
    SuppFromMyFaq($question);
    $faqs=myFaq();
    require "view/PageAccueil/admisnistration/faqadmin.php";
    }else{
    $faqs=myFaq();
    require "view/PageAccueil/admisnistration/faqadmin.php";
  }
}

function seeViewFaq(){

  $faqs=myFaq();
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
        seeViewDevis();

    } else {
    	$successmessage="Echec de l'envoie de votre formulaire, nos serveurs sont surement en maintenance ou une de vos information est invalide";
        seeViewDevis();
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

        $catalogue=getCatalogue();
        require "view/PageAccueil/Devis/pagedevis.php";

    } 
    else {
        $catalogue=getCatalogue();
    	$successmessage="Votre devis n'a pas été stocké dans notre base de donnée, veuillez rééssayer sans utiliser l'auto-complétion";
        require "view/PageAccueil/Devis/pagedevis.php";
    }
}
function seeViewEnvironment(){
    require "view/PageAccueil/Environnement/PageEnvironnement.php";
}

function seeforum() {
    $name="";
    
    if( isset($_POST["comadditionnel"])){
      
      $comadditionnel = htmlspecialchars($_POST["comadditionnel"]);
      
      if( strlen($comadditionnel)>=1){
        
        $newtopic=$_POST["sujet"];
        
         insertTopic2($newtopic,$comadditionnel);
        

         require "view/PageAccueil/forum/forum.php";
         
      }
     
       
    }
    else{
      require "view/PageAccueil/forum/forum.php";
    }
   
}

function addCategorie(){

  $newcategorie=htmlspecialchars($_POST["categorie"]);
  addCategories($newcategorie);
  require 'view/PageAccueil/admisnistration/pageadmin.php';
}




function administrateur() {
    $name="";
    if( isset($_POST["comadditionnel"])){
      
      $comadditionnel = htmlspecialchars($_POST["comadditionnel"]);
      
      if( strlen($comadditionnel)>=1){
        
        $newtopic=$_POST["sujet"];
        
         insertTopic2($newtopic,$comadditionnel);
        

         require "view/PageAccueil/admisnistration/pageadmin.php";
         
      }
     
       
    }
     elseif(isset($_GET["supptopic"])){
      
      $supptopic=htmlspecialchars($_GET["supptopic"]);
      suppTopic($supptopic);
      require "view/PageAccueil/admisnistration/pageadmin.php";
    }
    elseif(isset($_GET["suppmessage"])){
        $suppmessage=htmlspecialchars($_GET["suppmessage"]);
      suppmessage($suppmessage);
      require "view/PageAccueil/admisnistration/pageadmin.php";
    }
    else{

      require "view/PageAccueil/admisnistration/pageadmin.php";
    }
   
}

function ajoutAdmin() {
    echo $_SESSION["id"];
    $erreur="";
    

 if ( isset($_POST["pseudo"]) && isset($_POST["email"]) && isset($_POST["mdp"]) && isset($_POST["mdp2"])) {
        $pseudo = htmlspecialchars($_POST["pseudo"]);
        $email = htmlspecialchars($_POST["email"]);
        $mdp = htmlspecialchars($_POST["mdp"]);
        $mdp2 = htmlspecialchars($_POST["mdp2"]);


        $syntaxe = '#^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,6}$#';
        if ((strlen($pseudo)>4 AND strlen($pseudo)<20) AND preg_match($syntaxe, $email) AND (strlen($mdp)>4 AND strlen($mdp)<20) AND ($mdp==$mdp2)) {
            

            insertUser($pseudo, $email, $mdp, $mdp2);
            createAdmin($pseudo, $email, $mdp);
            echo 'Nouvelle utilisateur !'; 
            
           seeAdminUers();
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
         seeAdminUers();
        }
      
  }else {
        seeAdminUers();
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
        if((strlen($newtopic)>4 AND strlen($newtopic)<200) AND strlen($contenu)>=1){

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
      require "view/PageAccueil/admisnistration/pageadmin.php";
    

    }
    elseif(isset($_POST["newtopic"]) && isset($_POST["contenu"])){
      $newtopic = htmlspecialchars($_POST["newtopic"]);
        $contenu = htmlspecialchars($_POST["contenu"]);
        $categorie=htmlspecialchars($_POST["categorie"]);
        if((strlen($newtopic)>4 AND strlen($newtopic)<200) AND strlen($contenu)>=1){

           insertTopic($newtopic,$contenu, $categorie);
           
          require "view/PageAccueil/admisnistration/pageadmin.php";

        }
        else{
          require "view/PageAccueil/forum/addPost2.php";
        }
        
    }
else{
    require "view/PageAccueil/forum/addPost2.php";
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
        if ((strlen($pseudo)>=4 AND strlen($pseudo)<20) AND preg_match($syntaxe, $email) AND (strlen($mdp)>4 AND strlen($mdp)<20) AND ($mdp==$mdp2)) {
            

            insertUser($pseudo, $email, $mdp, $mdp2);
            getUsers($email);



           require "view/PageAccueil/PageAc.php";
        }
        else{
         if (!preg_match($syntaxe, $email)) {
           $erreur="Syntaxe du email n'est pas la bonne";
            }


        if (!(strlen($pseudo)>4 AND strlen($pseudo)<20) ){
            $erreur ="il faut un pseudo de bonne taille ";
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






function inscription2() {
    $erreur="";
    

 if ( isset($_POST["pseudo"]) && isset($_POST["email"]) && isset($_POST["mdp"]) && isset($_POST["mdp2"])) {
        $pseudo = htmlspecialchars($_POST["pseudo"]);
        $email = htmlspecialchars($_POST["email"]);
        $mdp = htmlspecialchars($_POST["mdp"]);
        $mdp2 = htmlspecialchars($_POST["mdp2"]);


        $syntaxe = '#^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,6}$#';
        if ((strlen($pseudo)>4 AND strlen($pseudo)<20) AND preg_match($syntaxe, $email) AND (strlen($mdp)>4 AND strlen($mdp)<20) AND ($mdp==$mdp2)) {
            

            insertUser($pseudo, $email, $mdp, $mdp2);
            createAdmin($pseudo, $email, $mdp);
            echo 'Nouvelle utilisateur !'; 
            


           require "view/PageAccueil/admisnistration/adminusers.php";
        }else{
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
          require "view/PageAccueil/admisnistration/adminusers.php";
        }


        
  }else {
        require "view/PageAccueil/admisnistration/adminusers.php";
   }


 require "view/PageAccueil/admisnistration/adminusers.php";

}













function connexion(){

   $erreur="";

    if ( isset($_POST["email"]) && isset($_POST["mdp"])) {
        
        $email = htmlspecialchars($_POST["email"]);
       
        $mdp = htmlspecialchars($_POST["mdp"]);
        
        
        $rep= getUser($email, $mdp);
        if ($rep){
            $bool=true;
            getUsers($email);
            $actionner=true;
            $admins=getAdmin();
            $mdp = hash("sha256", $mdp);
            foreach ($admins as $admin) {
              
              if ($admin["email"]== $email && $admin["mdp"]== $mdp ) {
                $bool=false;
                $faqs=myFaq();
                require "view/PageAccueil/admisnistration/faqadmin.php";
              }

            }
            if($bool){
           
           require "view/PageAccueil/PageAc.php";
         }
        }

            
        
        else{
         $erreur ="L'un des parametre est faux !";
         $actionner=true;
          require "view/PageAccueil/forum/connexion.php";
    }


    } else {
        $actionner=true;
        require "view/PageAccueil/forum/connexion.php";
   
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

    require "view/PageMaison/HTML_Page_choix_maison.php";
}




function deconnexion(){

require   "view/PageAccueil/forum/deconnexion.php";


}
// fonction qui demande l'affichage de la page de choix de maison ( page d'accueil en gros )
/*function seeChooseHousePage() {
     require "view/PageAccueil/forum/HTML_Page_choix_maison.php";
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
    if ($_POST["property_name"] && $_POST["property_type"]) {

        $property_name = htmlspecialchars($_POST["property_name"]);
        $property_type = htmlspecialchars($_POST["property_type"]);

        insertProperty($property_name, $property_type);

        displayUserProperties();

    } else {
        require "view/PageMaison/HTML_Ajout_maison_echec.php";
    }
}

function updateProfil() {
    if ($_POST["email"] && $_POST["pseudo"] && $_POST["mdp"]) {

        $id= $_SESSION["id"];
        $pseudo= htmlspecialchars($_POST["pseudo"]);
        $email = htmlspecialchars($_POST["email"]);
        $mdp = htmlspecialchars($_POST["mdp"]);

        profilupd($id, $pseudo, $email, $mdp, $mdp);

        seeViewMonprofil();

    } else {
        seeViewMonprofil();
    }
}
function seeViewMonprofil(){
    $successmessage="";
    require "view/PageMaison/Monprofil.php";
}
// Affichage de la page pour consulter les infos relatives à une maison
function seeInfoHousePage() {
    if (isset($_GET['propertyName'])) {
        $_SESSION['propertyName'] = $_GET['propertyName'];
    }
    $rooms = getRooms();
    $rooms2 = getRooms();
    $sensores=lescapteur();
    $sensorAdd=lescapteur();

    // on crée ici des tableaux et grâce aux deux whiles on rajoute les éléments dans les tableaux dont j'ai besoin dans la view
    $roomsArray = array(array());
    $itR = 0;
    $sensorsArray = array(array(array()));
    $itS1 = 0;
    $itS2 = 0;

    while ($room = $rooms->fetch()) {

        $roomname = $room['room_name'];
        $pictureName = $room['picture_name'];
        $picturePath = "view/Design/imagesMaison/".$pictureName.".jpg";
        $roomId = $room['id'];

        $roomsArray[$itR][0] = $roomname;
        // $roomsArray[$itR][1] = $pictureName;
        $roomsArray[$itR][2] = $picturePath;
        $roomsArray[$itR][1] = $roomId;

        $sensors = getSensors();

        while ($sensor = $sensors->fetch()) {

            if ($sensor['room_name'] == $roomsArray[$itR][0]) {

                // on stocke dans le tableau le nom de la pièce, celui du capteur et la valeur de sa mesure
                $sensorsArray[$itS1][$itS2][0] = $sensor['room_name'];
                $sensorsArray[$itS1][$itS2][1] = $sensor['sensor_name'];
                $sensorsArray[$itS1][$itS2][2] = $sensor['value'];

                // comme pour les pièces, on crée une variable qui contient le chemin vers les images pour les capteurs
                $sensorPictName = $sensor['picture_name'];
                $sensorPictPath = "view/Design/imagesMaison/".$sensorPictName.".png";
                // et on la stocke dans le tableau
                $sensorsArray[$itS1][$itS2][3] = $sensorPictPath;

                $itS2+=1;
            }
        }
        $itR+=1;
        $itS1+=1;
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

function lesmessages(){
  $messages= getMeesage();    
      

  require "view/PageAccueil/admisnistration/adminmessage.php";
}
function lesdevis(){
  $devis= devis();    
  
    require "view/PageAccueil/admisnistration/adminlesdevis.php";
}