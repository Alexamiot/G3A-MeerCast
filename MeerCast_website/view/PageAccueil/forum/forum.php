<?php  




  require "view/PageAccueil/forum/template.php";
?>
 
 	

<html>
<head>
    <meta charset="utf-8">
     <link rel="stylesheet" type="text/css" href="view/Design/CSS_forum/design.css">
    <title>Le Forum Meercast</title>
</head>

<body>
	<!-- <button><a href="index.php?action=inscription">Inscription</a></button> -->
	<!-- <button><a href="index.php?action=connexion">connexion</a></button> -->
    <div id="Forum" >
    <h1 id="nom">Le Forum Meercast</h1>
    
    	<?php

   
   
if(isset($_GET["categorie"])){
  $_GET["categorie"]=htmlspecialchars($_GET["categorie"]);
  ?>
  <img src="view/PageAccueil/Image/arrow2.png" value="Retour" onclick="history.go(-1)" style="width: 4%; height:7%; margin-left: 15px; position: top;cursor:pointer;" >
  <!-- <input type="button" value="Retour" onclick="history.go(-1)" style="color: darkorange; background-color: transparent; border: none;"> -->
  <div class = "categories"> 

 <h1 style="text-transform: uppercase; font-size: 1.7em;"> <?php echo $_GET["categorie"];  ?></h1>
 

  <?php
   $topic =getcategorie($_GET["categorie"]);
   while($topic2= $topic->fetch()){?>
    <div class="categorie">
   <a href="index.php?action=addPost&amp;newtopic=<?php echo $topic2["newtopic"]; ?>"><h1><?php echo "- ".$topic2["newtopic"]; ?></h1></a>
</div>
<?php } ?>
</div> <?php
    if (isset($_SESSION['email'])){?>
  <a class="newSubject" href="index.php?action=addPost&amp;categorie=<?php echo $_GET["categorie"];?>">Nouveau sujet</a>

<?php
}  

}
elseif(isset($newtopic)){?>
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
 <h2> <?php echo $subject["contenu"];  ?></h2>
 <h2></h2>
 <?php
 echo $proprio2." ".$dates; ?>
</h2>
</div> 
 <?php
 }

 if (isset($_SESSION['email'])){?>
           <form class="formulaire" method="post" action="index.php?action=see_forum">
           <label style="font-size: 1.5em; ">
        Ajouter commentaire:<br>
        <textarea name="comadditionnel" required></textarea>
    </label>
    <input type="hidden" name="sujet" value="<?php echo $newtopic?>">
    <input style="margin-bottom: 40px;" type="submit" value="Ajouter">
 <?php  } ?>
</div>
<?php
}
else { ?>
    <div class="categories">
      
   <?php    
        $requete= getcategories();
        while ($donnees = $requete->fetch())
{
?>
<div class = "categorie">
    <a href="index.php?action=see_forum&amp;categorie=<?php echo $donnees["name"]; ?>"><?php echo "- ".$donnees["name"]; ?></a></div>
    

<?php
}
?> </div><?php
} ?>
    </div>

    

</body>
</html>
