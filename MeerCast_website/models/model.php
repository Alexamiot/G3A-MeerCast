<?php

function dbConnect()
{
    try
    {
        $db = new PDO('mysql:host=localhost;dbname=meercast;charset=utf8', 'root', 'root');
        return $db;
    }

    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
}

function getMeesage(){
    $db = dbConnect();
    $req = $db->query("SELECT * FROM message");
        return $req;


}

/*function updateTemperature($temperature) {

    $db = dbConnect();

    //UPDATE houseroomsensors;
    //SET "value" = $temperature;
    //WHERE id = 1;

    $req = $db->prepare('UPDATE houseroomssensors SET value = $temperature WHERE id = 1');
    $req->execute(array($temperature));
    return $req;
}*/


function insertMessage($name, $last_name, $email, $message)
{
    $db = dbConnect();

    $req = $db->prepare("INSERT INTO message(name, last_name, email, message) VALUES(:name, :last_name, :email, :message)");

    $req->bindParam("name", $name);
    $req->bindParam("last_name", $last_name);
    $req->bindParam("email", $email);
    $req->bindParam("message", $message);

    $req->execute();
    $req->closeCursor();
}


function insertDevis($alarm, $elec, $heater, $AC, $pool, $gate, $lighting, $devices, $shutters, $garden,$comment, $name, $last_name, $email, $tel,$phonenumber, $adress, $adress2, $city, $areacode, $building, $construction, $surface, $country, $type, $gender){

    $db= dbConnect();

    $req = $db->prepare("INSERT INTO devis(alarm, elec, heater, AC, pool, gate, lighting, devices, shutters, garden,comment,name, last_name, email,tel,phonenumber, adress, adress2, city, areacode, building, construction, surface, country, type, gender) VALUES(:alarm, :elec, :heater, :AC, :pool, :gate, :lighting, :devices, :shutters, :garden,:comment, :name, :last_name, :email, :tel, :phonenumber, :adress, :adress2, :city, :areacode, :building, :construction, :surface, :country, :type, :gender)");
    $req->bindParam("alarm", $alarm);
    $req->bindParam("elec", $elec);
    $req->bindParam("heater", $heater);
    $req->bindParam("AC", $AC);
    $req->bindParam("pool", $pool);
    $req->bindParam("gate", $gate);
    $req->bindParam("lighting", $lighting);
    $req->bindParam("devices", $devices);
    $req->bindParam("shutters", $shutters);
    $req->bindParam("garden", $garden);
    $req->bindParam("comment", $comment);
    $req->bindParam("name", $name);
    $req->bindParam("last_name", $last_name);
    $req->bindParam("email", $email);
    $req->bindParam("tel", $tel);
    $req->bindParam("phonenumber", $phonenumber);
    $req->bindParam("adress", $adress);
    $req->bindParam("adress2", $adress2);
    $req->bindParam("city", $city);
    $req->bindParam("areacode", $areacode);
    $req->bindParam("building", $building);
    $req->bindParam("construction", $construction);
    $req->bindParam("surface", $surface);
    $req->bindParam("country", $country);
    $req->bindParam("type", $type);
    $req->bindParam("gender", $gender);


    $req->execute();
    $req->closeCursor();

}
function getCatalogue(){
    $db = dbConnect();
        $req = $db->query("SELECT name,bddName FROM catalogue");
        return $req;
}
/*                  Model pour les pages une fois que nous sommes connectés

 * Cette fonction permet de récupérer la liste des propriétés d'un utilisateur
 *
 * Dans un premier temps elle se connecte à la base de données grâce à la fonction dbConnect présente dans le
 * fichier "database_connection.php" (on a appelé ce fichier juste au dessus avec "require")
 * dbConnect nous renvoie une extension PDO (PHP Data Objects), c'est une interface qui nous permettra de communiquer à la base de données
 * C'est pour ça qu'on la stocke dans une variable ($db)
 *
 * Ensuite on fait une requête avec "query" pour récupérer les propriétés. La requête est en SQL
 * On stocke le résultat de cette requête dans une variable ($req)
 *
 * Et pour finir on retourne la variable $req *
 *
 * @return bool|PDOStatement
 */

function getProperties()
{
    $db = dbConnect();
    $req = $db->prepare("SELECT * FROM houses WHERE id_user = :id");
    $req -> execute(array("id"=>$_SESSION["id"]));


    return $req;
}

function insertProperty($property_name, $property_type)
{
    $db = dbConnect();

    $req = $db->prepare("INSERT INTO houses(property_name, property_type) VALUES(:property_name, :property_type)");

    $req->bindParam("property_name", $property_name);
    $req->bindParam("property_type", $property_type);

    $req->execute();
    $req->closeCursor();
}

function getRooms() {

    $db = dbConnect();
    $req = $db->prepare("SELECT * FROM ((houses AS h JOIN HouseRooms AS hR ON h.id = hR.id_house) JOIN rooms AS r ON r.id = hR.id_room) WHERE h.property_name = :housename");
    $req->execute(array('housename' => $_SESSION['propertyName']));

    return $req;
}
// function setSensors($sensorName, $sensorPic){
//     $db = dbConnect();

//     $hash = hash("sha256", $mdp);
     
//     $req = $db->prepare("INSERT INTO administrateurs(pseudo, email, mdp) VALUES(:pseudo, :email, :mdp)");
//     $req->execute(array( 'pseudo' => $sensorName, 'email' => $sensorPic )); 
// echo 'Nouvelle Admin !'; 

//     $req->closeCursor();

// }

function getSensors() {

    $db = dbConnect();
    $req = $db->prepare("SELECT * FROM (((houses AS H JOIN HouseRoomsSensors AS HRS ON H.id = HRS.id_house) JOIN rooms AS R ON HRS.id_room = R.id) JOIN sensors AS S ON HRS.id_sensor = S.id) WHERE H.property_name = :housename");
    $req->execute(array('housename' => $_SESSION['propertyName']));

    return $req;
}


function insertUser($pseudo, $email, $mdp, $mdp2){
    $db = dbConnect();

    $hash = hash("sha256", $mdp);
     $hash2 = hash("sha256", $mdp2);
    $req = $db->prepare("INSERT INTO users(pseudo, email, mdp, mdp2) VALUES(:pseudo, :email, :mdp, :mdp2)");
$req->execute(array( 'pseudo' => $pseudo, 'email' => $email, 'mdp' => $hash, 'mdp2' => $hash2)); 
echo 'Nouvelle utilisateur !'; 

    $req->closeCursor();
}

function createAdmin($pseudo, $email, $mdp){
    $db = dbConnect();

    $hash = hash("sha256", $mdp);
     
    $req = $db->prepare("INSERT INTO administrateurs(pseudo, email, mdp) VALUES(:pseudo, :email, :mdp)");
$req->execute(array( 'pseudo' => $pseudo, 'email' => $email, 'mdp' => $hash )); 
echo 'Nouvelle Admin !'; 

    $req->closeCursor();
}


function getUsers($email)
{
        $db = dbConnect();
        $req = $db->prepare("SELECT id, pseudo FROM users WHERE email=:email");
        $req -> execute(array("email"=>$email));
        $req =$req ->fetch();
        $_SESSION["id"]= $req["id"];
        $_SESSION["pseudo"]= $req["pseudo"];
        $_SESSION["email"]=$email;


        return $req;
}  

function getUser($email, $mdp){

        $db = dbConnect();
        $hash = hash("sha256", $mdp);
        $req = $db->prepare("SELECT * FROM users WHERE email=:email AND mdp =:mdp");
        $req -> execute(array("email"=>$email, "mdp"=>$hash));
        $req =$req ->fetch();
        
        return $req;
        }

function getCategories(){

        $db = dbConnect();
        $req = $db->query("SELECT name FROM categories ");
       
        
        return $req;
        }


function insertTopic($newtopic,$contenu, $categorie){

        $db = dbConnect();
        $req = $db->prepare("INSERT INTO sujet(newtopic, categorie) VALUES(:newtopic, :categorie)");
       $req -> execute(array("newtopic"=>$newtopic, "categorie"=>$categorie));
        
        $req2= $db->prepare("INSERT INTO postsujet(proprietary, contenu, sujet,dates) VALUES(:proprietary,:contenu,:newtopic,NOW() )");
       $req2 -> execute(array("proprietary"=> $_SESSION["id"],"contenu"=>$contenu ,"newtopic"=>$newtopic));

       $req->closeCursor();
       $req2->closeCursor();
        }

function getTopic ($newtopic){
    $db = dbConnect();
    
        $req = $db->prepare("SELECT * FROM postsujet  WHERE sujet=:newtopic ORDER BY dates");
        $req -> execute(array("newtopic"=>$newtopic));
        
        return $req;
        
}

function getProprietaryTopic ($proprietary){
    $db = dbConnect();
        $req = $db->prepare("SELECT * FROM users  WHERE id=:id");
        $req -> execute(array("id"=>$proprietary));
        
        return $req;
        
}




      
function insertTopic2($newtopic,$contenu){

        $db = dbConnect();
       
        
        $req2= $db->prepare("INSERT INTO postsujet(proprietary, contenu, sujet,dates) VALUES(:proprietary,:contenu,:newtopic,NOW() )");
       $req2 -> execute(array("proprietary"=> $_SESSION["id"],"contenu"=>$contenu ,"newtopic"=>$newtopic));

      
       $req2->closeCursor();
        }

function getcategorie($categorie){
  $db = dbConnect();
        $req = $db->prepare("SELECT * FROM sujet  WHERE categorie=:categorie");
        $req -> execute(array("categorie"=>$categorie));
        
        return $req;

}



function suppTopic($supptopic){
     $db = dbConnect();
        $req = $db->prepare("DELETE FROM postsujet  WHERE sujet=:supptopic");
        $req -> execute(array("supptopic"=>$supptopic));
        $req2 = $db->prepare("DELETE FROM sujet  WHERE newtopic=:supptopic ");
        $req2 -> execute(array("supptopic"=>$supptopic));
        echo "did everything execute allright";
        $req->closeCursor();
        $req2->closeCursor();
}

function suppmessage($suppmessage){
        $db = dbConnect();
        $req = $db->prepare("DELETE FROM postsujet  WHERE contenu =:suppmessage");
        $req -> execute(array("suppmessage"=>$suppmessage));
        echo "did everything execute allright";
        $req->closeCursor();
        


}


function getAdmin(){
        $db = dbConnect();
        $req = $db->query("SELECT email, mdp FROM administrateurs ");
        
        
        return $req;



}
function getMdp($email)
{
    $db = dbConnect();
    $req = $db->prepare("SELECT mdp FROM users WHERE email=:$email");
    $req->bindParam("email", $email);

    return $req;
}

function profilupd($id,$pseudo, $email, $mdp, $mdp2){
    $db = dbConnect();
    $hash = hash("sha256", $mdp);
    $hash2 = hash("sha256", $mdp2);
    $update = $db->prepare("UPDATE  users SET pseudo= :pseudo, email=:email, mdp=:mdp, mdp2=:mdp2 WHERE id=:id");
    $successmessage="Votre profil à bien été mis à jour";   
    $update->execute(array('id' => $id, 'pseudo' => $pseudo, 'email' => $email, 'mdp' => $hash, 'mdp2' => $hash2)); 

    $_SESSION["pseudo"]= $pseudo;
    $_SESSION["email"]=$email;

    $update->closeCursor();
}



function myFaq (){
    $db = dbConnect();
    $req = $db->query("SELECT * FROM faq ");
    return $req;
}

function AddTomyFaq($question,$reponse){
    $db = dbConnect();
    $req2= $db->prepare("INSERT INTO faq(question, reponse) VALUES(:question,:reponse)");
       $req2 -> execute(array("question"=> $question,"reponse"=>$reponse));

      
       $req2->closeCursor();
}
function SuppFromMyFaq ($question){
    $db = dbConnect();
    $req = $db->prepare("DELETE FROM faq  WHERE question =:question");
    $req -> execute(array("question"=> $question));
    return $req;
}

function AddTomyCatalogue($name,$newbox){
    $db = dbConnect();
    $req2= $db->prepare("INSERT INTO catalogue(name, bddName) VALUES(:name,:newbox)");
       $req2 -> execute(array("name"=> $name, "newbox"=>  $newbox ));

      
       $req2->closeCursor();
}



function SuppFromMyCatalogue ($question){
    $db = dbConnect();
    $req = $db->prepare("DELETE FROM catalogue  WHERE name =:question");
    $req -> execute(array("question"=> $question));
    return $req;
}

function addCategories ($namecategorie){

$db = dbConnect();
    
    $req2= $db->prepare("INSERT INTO categories (name) VALUES(:name)");
    
    $req2 -> execute(array("name"=> $namecategorie ));
   
      
    $req2->closeCursor();

}



function userEtMaison(){
$db = dbConnect();
    $req = $db->query("SELECT u.pseudo pseudo, u.email email, h.property_name nomhabitation, h.property_type typehabitation FROM users u LEFT JOIN houses h ON u.id = h.id_user");
    return $req;
}


function getadminservice(){
   $db = dbConnect();
    $req = $db->query("SELECT * FROM services");
    return $req;


}


function addadminservice($service,$description,$image){
    $db = dbConnect();
    $req2= $db->prepare("INSERT INTO services (service,description,image) VALUES(:service,:description, :image)");
    $req2 -> execute(array("service"=> $service, "description"=>  $description ,"image"=>  $image ));

      
    $req2->closeCursor();


}



function lescapteur(){
    $db = dbConnect();
    $req = $db->query("SELECT * FROM sensors");
    return $req;

}

   function addpiece($room,$picture){
    $db = dbConnect();
    $req2= $db->prepare("INSERT INTO rooms (room_name,picture_name) VALUES(:room,:picture)");
    $req2 -> execute(array("room"=> $room, "picture"=>  $picture ));

      
    $req2->closeCursor();

   }


   function idpiece($room){
   

     $db = dbConnect($room);
        $req = $db->prepare("SELECT id FROM rooms  WHERE room_name=:room");
        $req -> execute(array("room"=>$room));
        
        return $req;

   }



   function getIdHouseByName($propertyName){

        $db = dbConnect();
        $req = $db->prepare("SELECT id FROM houses  WHERE property_name=:propertyName");
        $req -> execute(array("propertyName"=>$propertyName));
        
        return $req;

   }





 function nouvellepiece($house,$room){
    $db = dbConnect();
    $req2= $db->prepare("INSERT INTO houserooms (id_house,id_room) VALUES(:service,:description)");
    $req2 -> execute(array("service"=> $house, "description"=>  $room  ));

      
    $req2->closeCursor();


}

function houseroomsensors($house,$room,$sensor,$valeur){
    $db = dbConnect();
    echo "debeug1";
    $req2= $db->prepare("INSERT INTO houseroomssensors (id_house,id_room,id_sensor,value) VALUES(:house,:room,:sensor,:value)");
    echo "debeug3";
    $req2 -> execute(array("house"=> $house, "room"=>  $room , "sensor"=> $sensor,"value"=>$valeur ));
    echo "debeug2";
      
    $req2->closeCursor();
}


function suppUsers ($pseudo){

    $db = dbConnect();
    $req = $db->prepare("DELETE FROM users  WHERE pseudo =:pseudo");
    $req -> execute(array("pseudo"=> $pseudo));
    return $req;


}
function suppAdmins ($pseudo){

    $db = dbConnect();
    $req = $db->prepare("DELETE FROM administrateurs  WHERE pseudo =:pseudo");
    $req -> execute(array("pseudo"=> $pseudo));
    return $req;


}

function suppadminservices($service) {
    $db = dbConnect();
    $req = $db->prepare("DELETE FROM services WHERE service =:service");
    $req -> execute(array("service"=> $service));
    return $req;

}
?>