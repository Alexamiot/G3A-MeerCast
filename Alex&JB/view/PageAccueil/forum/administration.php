
 <?php  require "view/PageAccueil/forum/template.php";?>
 	
 
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
    
      <?php

      
   
if(isset($_GET["categorie"])){
  $_GET["categorie"]= htmlspecialchars($_GET["categorie"]);
  ?>
  <div class = "categories"> 
 <h1> <?php echo $_GET["categorie"];  ?></h1>
 

  <?php
   $topic =getcategorie ($_GET["categorie"]);
   while($topic2= $topic->fetch()){?>
    <div class="categorie">
   <a href="index.php?action=addPost2&amp;newtopic=<?php echo $topic2["newtopic"]; ?>"><h1><?php echo "- ".$topic2["newtopic"]; ?></h1></a>
   <a href="index.php?action=administrateur&amp;categorie=<?php echo $_GET["categorie"]; ?>&amp;supptopic=<?php echo $topic2["newtopic"]; ?>"><p>supprimer</p></a>
</div>
<?php } ?>
</div>  
<?php
    if (isset($_SESSION['pseudo'])){?>
  <a class="newSubject" href="index.php?action=addPost2&amp;categorie=<?php echo $_GET["categorie"];?>">Nouveau sujet</a>

<?php
}
}
else if(isset($newtopic)|| isset($_GET["newtopic"])){?>
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
    <input type="hidden" name="sujet" value='<?php echo $newtopic?>'>
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
?>
</div>
<?php
} ?>
    </div>

    

</body>
</html>
