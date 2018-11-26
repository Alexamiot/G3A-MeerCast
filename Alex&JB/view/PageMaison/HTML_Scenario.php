<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<!-- <link rel="stylesheet" type="text/css" href="CSS_Page_choix_maison.css"> -->
	<link rel="stylesheet" type="text/css" href="view/Design/CSS Maison/CSS_Scenario.css">
	<title>Scénario</title>
</head>

<body>
	<header class="pageTop">
		<div id="mySidepanel" class="sidepanel">
		  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
		  <a href="#">Mon Profil</a>
		  <a href="#">Mes capteurs</a>
		  <a href="#">Mes actionneurs</a>
		  <a href="#">Ajouter un bâtiment</a>
		  <a href="index.php?action=see_scenario_page" target="blank">Programmer un scénario</a>
		  <a href="index.php?action=see_choose_house_page">Mes pièces</a>
		  <a href="index.php?action=see_choose_house_page">Retour au choix de la maison</a>
		  <a href="#">Se déconnecter</a>
		</div>
<button class="openbtn" onclick="openNav()">☰ </button>
		<div class="logo">
    		<a href="index.php?action=see_PageAc"><img src="view/PageAccueil/image/meercastest.png"></a>
		<h1>Programmation scénario</h1>
	</header>
	
	<!-- <header class="pageHead">
		<h1>Sélectionnez la maison que vous souhaitez contrôler</h1>
	</header>

	<div class="maindDiv">
		
		<div class="houses">
			<section class="imageSection">
				<a href="HTML_Page_Infos_Maison.html"><img src="building_4.jpg"><br><h2>Maison 1</h2></a>
			</section>
			<section class="imageSection">
				<a href="HTML_Page_Infos_Maison.html"i><img src="house_4.jpg"><br><h2>Maison 2</h2></a>
			</section>
		</div>
		<div class="addButtonDiv">
			<section class="addButtonSection">
				<a href="HTML_Ajout_maison.html" target="blank"><img src="addButton.png"></a>
			</section>
		</div>
	
	</div> -->
	
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
