 	
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
     <link rel="stylesheet" type="text/css" href="view/Design/CSS_forum/new.css">
    <title>Le Forum Meercast</title>
</head>

<body>
	 <h1 style="text-align: center;  margin: 50px; font-size: 4em;">Ajouter un Sujet</h1>
    <div id="Forum" style="text-align: center;">
    
    
    	<?php

      if (isset($_SESSION['pseudo'])){
        $name= $_SESSION["pseudo"];
      echo "Bonjour, ".$name." bienvenu sur notre forum";
      ?>

      <a href="index.php?action=deconnexion"> Deconnexion</a>;
    <?php 
    }
    ?>

    <form method="post" action="index.php?action=addPost"  id="inscription"  style="display: flex; flex-direction: column;text-align: center; " >
    <label class="elem">
        Sujet :<br>
        <input type="text" name="newtopic" placeholder="topic...." required><br>
    </label>
    <label class="elem">
        Ecrivez :<br>
        <textarea name ="contenu" placeholder="votre contenu du sujet"> </textarea><br>
    </label >
    <input  type="hidden" name="categorie" value="<?php echo $_GET["categorie"]; ?>" >
    
    <input type="submit" value="Ajouter post"  class="button">
</form>



    </div>
  
    

</body>
</html>
