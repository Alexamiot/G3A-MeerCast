<?php  


 
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0" /> -->
     <link rel="stylesheet" type="text/css" href="view/Design/CSS_forum/inscription.css">
      <link rel="icon"  href="view/PageAccueil/favicon/favicon-16x16.png" type="image/png" sizes="any">
    <title>Inscription</title>
</head>

<body>
    <h1 style="text-align: center; margin: 50px; font-size: 4em;">Inscription</h1>
    <div id="Forum" style="text-align: center;">
    	
    	<form method="post" action="index.php?action=inscription"  id="inscription"  style="display: flex; flex-direction: column;text-align: center;" >
    <label class="elem" >
        Pseudo :<br>
        <input type="text" name="pseudo" placeholder="Pseudo...." required>
    </label>
    <label class="elem" >
        Email :<br>
        <input type="email" name="email"  placeholder="Adresse mail...." required>
    </label >
    <label class="elem">
        Mot de Passe :<br>
        <input type="password" name="mdp" required>
    </label>
    <label class="elem">
        Confirmation :<br>
        <input type="password" name="mdp2" required>
    </label>
    <input type="submit" value="Inscription" class="button" >
</form>

<?php echo $erreur; ?>
    </div>
    
    

</body>
</html>