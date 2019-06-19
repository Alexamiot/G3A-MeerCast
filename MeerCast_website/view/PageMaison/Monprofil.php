<head>
    <meta charset="utf-8">	
<?php
 $title = "Mon profil";
 $pagename = "Mon profil";
 $css = "MonProfilcss.css";
 ?>
<?php ob_start();?>
</head>
<!-- <img src="view/PageMaison/websiteBackgroundImage.png" alt="websiteBackgroundImage"> -->
<body>
<div class="profil">
	<div class="indentation">
		<Br></Br>
	<font size="12">Mes informations :</font><Br></Br><!-- 
<h1>Mes coordonnées</h1> --> 
<div class="inscription">
	<form action="index.php?action=updateProfil" method="post">
    <p>
      <br>
     Pseudo : <input class="textInput" type="text" name="pseudo" value="<?php echo $_SESSION["pseudo"]?>"> 
     <br> 
 
    Email : <input class="textInput" type="text" name="email" value="<?php echo $_SESSION["email"]?>" required> 
    <br>
    Mot de passe : <input class="textInput" type="password" name="mdp" value="<?php echo ""?>">
    </p>

   	<input type="submit" name="updateProfil" value="Sauvegarder" style="background-color: darkorange; border: none; color: white; padding: 10px; margin-left: 30%;">
   </form>

<div class="hero">
</div>
</div>
	</div>
	<?php $content = ob_get_clean();?>
	<?php require 'template.php'; ?>
</body>