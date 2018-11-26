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
        $req = $db->query("SELECT * FROM houses");

        return $req;
}

function insertProperty($name, $property_type)
{
    $db = dbConnect();

    $req = $db->prepare("INSERT INTO houses(name, property_type) VALUES(:name, :property_type)");

    $req->bindParam("name", $name);
    $req->bindParam("property_type", $property_type);

    $req->execute();
    $req->closeCursor();
}


?>