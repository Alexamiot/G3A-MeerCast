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


?>