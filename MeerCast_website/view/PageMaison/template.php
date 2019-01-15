<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="view/Design/CSS_Maison/template.css">
	<link rel="stylesheet" type="text/css" href="view/Design/CSS_Maison/<?php echo $css?>">
	<link rel="icon"  href="view/PageAccueil/favicon/favicon-16x16.png" type="image/png" sizes="any">
	<title><?= $pagename;?></title>
</head>

<body>
	<header class="pageTop">
		<div id="mySidepanel" class="sidepanel">
		  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
		  <a href="#">Mon Profil</a>
		  <a href="index.php?action=see_pagecapteur">Mes capteurs / actionneurs</a>
		  <a href="index.php?action=see_Ajout_batiment">Ajouter un bâtiment</a>
		  <a href="index.php?action=see_scenario_page" target="blank">Programmer un scénario</a>
		  <a href="index.php?action=see_info_house_page">Mes pièces</a>
		  <a href="index.php?action=see_choose_house_page">Retour au choix de la maison</a>
		  <a href="#">Se déconnecter</a>
		</div>
<button class="openbtn" onclick="openNav()">☰ </button>
		<div class="logo">
    		<a href="index.php?action=see_PageAc"><img src="view/PageAccueil/image/meercastest.png"></a>
		<h1><?= $title;?></h1>
	</header>

	<div><?php echo $content?> </div>
		
	
</body>
<script>
function openNav() {
    document.getElementById("mySidepanel").style.width = "350px";
}

function closeNav() {
    document.getElementById("mySidepanel").style.width = "0";
}
</script>
</html>