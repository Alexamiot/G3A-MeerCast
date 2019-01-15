<?php  


 
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
     <link rel="stylesheet" type="text/css" href="view/Design/CSS_forum/new.css">
    <title>Connexion</title>
</head>

<body>
    <h1 style="text-align: center;  margin: 50px; font-size: 4em;">Connexion</h1>
    <div id="Forum" style="text-align: center;">
    <?php	if(isset($actionner)){?>
<form method="post" action="index.php?action=connexion"   style="display: flex; flex-direction: column;text-align: center; ">
  <?php  }
elseif (!isset($actionner)) { ?>
   <form method="post" action="../index.php?action=connexion" style="display: flex; flex-direction: column;text-align: center; ">
<?php }
    ?>
    	
    <label class="elem">
        Email :<br/>
        <input type="email" name="pseudo" placeholder="Email...." required>
    </label>
    
    <label class="elem">
        Mot de Passe :<br/>
        <input type="password" name="mdp" required>
    </label><br/>
    
    <input type="submit" value="Ajouter" class= "button">
</form>

<?php 
if (isset($erreur)){
echo $erreur; }

?>
    </div>
    
    

</body>
</html>