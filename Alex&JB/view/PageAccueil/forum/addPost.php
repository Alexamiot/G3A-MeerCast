 	
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
     <link rel="stylesheet" type="text/css" href="view/Design/CSS_forum/design2.css">
    <title>Le Forum Meercast</title>
</head>

<body>
	 <h1 style="text-align: center">Ajouter un Sujet</h1>
    <div id="Forum">
    
    
    	<?php

      if (isset($_SESSION['pseudo'])){
        $name= $_SESSION["pseudo"];
      echo "Bonjour, ".$name." bienvenu sur notre forum";
      ?>

      <a href="index.php?action=deconnexion"> Deconnexion</a>;
    <?php 
    }
    ?>

    <form method="post" action="index.php?action=addPost">
    <label>
        Sujet :<br>
        <input type="text" name="newtopic" placeholder="topic...." required><br>
    </label>
    <label>
        Ecrivez :<br>
        <textarea name ="contenu" placeholder="votre contenu du sujet"> </textarea><br>
    </label>
    <input type="hidden" name="categorie" value="<?= $_GET["categorie"] ?>" >
    
    <input type="submit" value="Ajouter post">
</form>



    </div>
  
    

</body>
</html>
