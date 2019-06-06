<!-- ici il faudra mettre le template admin .....
 --> 
 <?php $util="active2"?>
 <?php  require "view/PageAccueil/admisnistration/templateadmin.php";?>
 	
 
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
     <link rel="stylesheet" type="text/css" href="view/Design/CSS_forum/design.css">
    <title>Administration</title>
</head>

<body>
      
    <div id="Forum">
    <h1 id="nom" style="text-align: center">Administration</h1>
    <a href="index.php?action=see_faq_admin"><img src="view/PageAccueil/Image/arrow2.png" value="Retour" style="width: 40px; height:40px; margin-left: 15px; position: top; cursor:pointer;" ></a>
      <?php

      
   
if(isset($_GET["categorie"])){
  $_GET["categorie"]= htmlspecialchars($_GET["categorie"]);
  ?>
  <img src="view/PageAccueil/Image/arrow2.png" value="Retour" onclick="history.go(-1)" style="width: 4%; height:7%; margin-left: 15px; position: top; cursor:pointer;" >
  <div class = "categories"> 
 <h1> <?php echo $_GET["categorie"];  ?></h1>
 
  <div>
  <?php
   $topic =getcategorie ($_GET["categorie"]);
   while($topic2= $topic->fetch()){?>
    <div class="categorie">
   <a href="index.php?action=addPost2&amp;newtopic=<?php echo $topic2["newtopic"]; ?>"><h1><?php echo "- ".$topic2["newtopic"]; ?></h1></a>
   <a href="index.php?action=administrateur&amp;categorie=<?php echo $_GET["categorie"]; ?>&amp;supptopic=<?php echo $topic2["newtopic"]; ?>"><p>supprimer</p></a>
</div>
<?php } ?>
<div>
<?php
    if (isset($_SESSION['pseudo'])){?>
  <a class="newSubject" href="index.php?action=addPost2&amp;categorie=<?php echo $_GET["categorie"]; ?>">Nouveau sujet</a>

 <?php }?>
</div>  

<?php

}
elseif(isset($newtopic)|| isset($_GET["newtopic"])){?>
<img src="view/PageAccueil/Image/arrow2.png" value="Retour" onclick="history.go(-1)" style="width: 4%; height:7%; margin-left: 15px; position: top; cursor:pointer;" >
 <div class="categories">
 <h1 style="text-transform: uppercase;"> <?php echo $newtopic;  ?></h1>
 
 <?php
 $subjects= getTopic ($newtopic);
 while($subject = $subjects->fetch()){ 
           $proprietary=$subject["proprietary"];
           $proprio= getProprietaryTopic ($proprietary);
           $proprioz= $proprio->fetch();
           $proprio2=$proprioz["pseudo"];
           $dates=$subject["dates"];
    ?>
    <div class = "reponse">  
      <div class="sousrep">
 <h1> <?php echo $subject["contenu"];  ?> </h1>
    <a style="text-decoration: none; color:red;" href="index.php?action=administrateur&amp;suppmessage=<?php echo $subject["contenu"] ; ?>"><p>supprimer</p></a>
 </div>
 <?php
 echo $proprio2." ".$dates;?>
 </div><?php
 }
 
 if (isset($_SESSION['pseudo'])){?>
           <form class="formulaire" method="post" action="index.php?action=administrateur">
           <label>
        Ajouter commentaire:<br>
        <textarea name="comadditionnel" required></textarea>
    </label>
    <input type="hidden" name="sujet" value="<?php echo $newtopic; ?>">
    <input type="submit" value="Ajouter">
 <?php  } ?>
</div>
<?php
}
else { ?>
    <div class = "categories">
   <?php    
        $requete= getcategories();
        while ($donnees = $requete->fetch())
          
{
?>
    <div class = "categorie">
    <a href="index.php?action=administrateur&amp;categorie=<?php echo $donnees["name"]; ?>"><?php echo "- ".$donnees["name"]; ?></a>
    </div>

<?php
}

if (isset($_SESSION['pseudo'])){?>
           <form class="formulaire" method="post" action="index.php?action=addCategorie">
           <label>
        Ajouter une categorie:<br>
        <textarea name="categorie" required></textarea>
    </label>
    
    <input type="submit" value="Ajouter">
    
    </form>
 <?php  } ?>



</div>
<?php
} ?>
    </div>

    

</body>
</html>
