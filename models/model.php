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
?>
