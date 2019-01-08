<?php  


 
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
     <link rel="stylesheet" type="text/css" href="view/Design/CSS_forum/design2.css">
      <link rel="icon"  href="view/PageAccueil/favicon/favicon-16x16.png" type="image/png" sizes="any">
    <title>Connexion</title>
</head>

<body>
    <h1>Connexion</h1>
    <div id="Forum">
    <?php	if(isset($actionner)){?>
<form method="post" action="index.php?action=connexion">
  <?php  }
elseif (!isset($actionner)) { ?>
   <form method="post" action="../index.php?action=connexion">
<?php }
    ?>
    	
    <label>
        Pseudo :
        <input type="text" name="pseudo" placeholder="Pseudo...." required>
    </label>
    
    <label>
        Mot de Passe :
        <input type="password" name="mdp" required>
    </label>
    
    <input type="submit" value="Ajouter">
</form>

<?php 
if (isset($erreur)){
echo $erreur; }

?>
    </div>
    
    

</body>
</html>