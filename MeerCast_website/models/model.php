<?php

function dbConnect()
{
    try
    {
        $db = new PDO('mysql:host=localhost;dbname=meercast;charset=utf8', 'root', '');
        return $db;
    }

    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
}




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

function insertService($newService, $bddService){
    $db= dbConnect();
    $req = $db-> prepare("INSERT INTO catalogue(name,bddName) VALUES (:newService, :bddService)");
    
    $req->bindParam("newService",$newService);
    $req->bindParam("bddService",$bddService);
  

    $req->execute();
    $req->closeCursor();
}

function insertServiceIntoDevis($bddService){
    $db= dbConnect();
    $req = $db-> prepare("ALTER TABLE devis ADD :bddService VARCHAR(20) NOT NULL DEFAULT 'non' AFTER garden");
    $req->bindParam("bddService",$bddService);

    $req->execute();
    $req->closeCursor();
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

    $req = $db->prepare("INSERT INTO houses(property_name, property_type, id_user) VALUES(:property_name, :property_type, :id_user)");

    $req->bindParam("property_name", $property_name);
    $req->bindParam("property_type", $property_type);
    $req->bindParam("id_user", $_SESSION["id"]);


    $req->execute();
    $req->closeCursor();
}

function getRooms() {

    $db = dbConnect();
    $req = $db->prepare("SELECT * FROM ((houses AS h JOIN HouseRooms AS hR ON h.id = hR.id_house) JOIN rooms AS r ON r.id = hR.id_room) WHERE h.property_name = :housename");
    $req->execute(array('housename' => $_SESSION['propertyName']));

    return $req;
}

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
        $req = $db->query("SELECT email, pseudo, mdp FROM administrateurs ");
        
        
        return $req;



}
?>