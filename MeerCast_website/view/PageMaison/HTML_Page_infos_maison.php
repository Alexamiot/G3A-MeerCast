<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<!-- <link rel="stylesheet" type="text/css" href="view/Design/CSS_Maison/CSS_Page_infos_maison.css"> -->
	<link rel="stylesheet" type="text/css" href="view/Design/CSS_Maison/CSS_Page_infos_maison.css">
	<link rel="icon"  href="view/PageAccueil/favicon/favicon-16x16.png" type="image/png" sizes="any">
	<title>Informations sur la maison</title>
</head>

<body>

	<!-- The Modal -->
	<div id="myModal" class="modal">

		<!-- Modal content -->
		<div class="modal-content">

			<!-- en-tête du modal -->
	    	<div class="modal-header">
	      		<span class="close">&times;</span>
	      		<h1 id="modalTitle">Modal Header</h1>
	    	</div>

	    	<!-- body du modal -->
	    	<div class="modal-body">
	    		<!-- partie remplie individuellement pour chaque pièce dans le js -->
	    	</div>

	    	<div class="modal-footer">
	    		<h3>Modal footer</h3>
	    	</div>
	  	</div>

	</div>


	<header class="pageTop">
		<div id="mySidepanel" class="sidepanel">
		  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
		  <a href="#">Mon Profil</a>
		  <a href="index.php?action=see_pagecapteur">Mes capteurs/ actionneurs</a>
		  <a href="index.php?action=see_Ajout_batiment">Ajouter un bâtiment</a>
		  <a href="index.php?action=see_scenario_page" target="blank">Programmer un scénario</a>
		  <a href="index.php?action=see_choose_house_page">Retour au choix de la maison</a>
		  <a href="#">Se déconnecter</a>
		</div>
<button class="openbtn" onclick="openNav()">☰ </button>
		<div class="logo">
    		<a href="index.php?action=see_PageAc"><img src="view/PageAccueil/image/meercastest.png"></a>
    	</div>

		<h1><?php echo htmlspecialchars($_SESSION['propertyName']); ?></h1>
	</header>

<section id="allrooms">

	<!-- Partie de la page avec les pièces -->
	<?php foreach ($roomsArray as $room) { ?>

        <div id=<?php echo $room[1]; ?> class="roomInformation" onclick="clickOnRoom(this.id)">

			<div class="div1">
				<h1 id="titre"><?php echo $room[0]; ?></h1>
				<?php foreach ($sensorsArray as $sensor) { ?>
					<?php foreach ($sensor as $sensorInfo) { ?>
						<?php if ($sensorInfo[0] == $room[0]) { ?>
							<li><?php echo $sensorInfo[1]." : "; ?><span><?php echo $sensorInfo[2]; ?></span></li>
							<p hidden=""><?php echo $sensorInfo[3]; ?></p>
						<?php } ?>
					<?php } ?>
				<?php } ?>
			</div>
			<div class="div2"> 
				<img src=<?php echo $room[2]; ?>>
			</div>
		</div>
	<?php } ?>
</section>

	<!--  -->
	
	<footer class="boutonScenario">
		<a href="index.php?action=see_scenario_page" target="blank">Programmez un scénario</a>
	</footer>

	<script type="text/javascript" src="view/Design/CSS_Maison/JS_Page_infos_maison.js"></script>

</body>

</html>