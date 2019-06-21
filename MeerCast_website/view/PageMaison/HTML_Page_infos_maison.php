<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<!-- <link rel="stylesheet" type="text/css" href="view/Design/CSS_Maison/CSS_Page_infos_maison.css"> -->
	<link rel="stylesheet" type="text/css" href="view/Design/CSS_Maison/CSS_Page_infos_maison.css">
	<link rel="icon"  href="view/PageAccueil/favicon/favicon-16x16.png" type="image/png" sizes="any">
	<title>Informations sur la maison</title>
</head>

<body id="bodyM">

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
        <div id="modal-body">
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
		  <a href="index.php?action=see_PageMonProfil">Mon Profil</a>
		  <a href="index.php?action=see_pagecapteur">Mes capteurs/ actionneurs</a>
		  <a href="index.php?action=see_Ajout_batiment">Ajouter un bâtiment</a>
		  <a href="index.php?action=see_scenario_page" target="blank">Programmer un scénario</a>
		  <a href="index.php?action=see_choose_house_page">Retour au choix de la maison</a>
		  <a href="index.php?action=deconnexion">Se déconnecter</a>
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
								<p hidden="" class="imagePath"><?php echo $sensorInfo[3]; ?></p>
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

	<!-- section d'affichage et traitement des trames -->
	<section>
		<?php 
// code permettant d'afficher les trames sur la page d'info d'une maison ; problème, il faut recharger la page pour que les données s'affichent dans les rectangles des pièces

			$ch = curl_init();
			curl_setopt($ch,CURLOPT_URL,"http://projets-tomcat.isep.fr:8080/appService/?ACTION=GETLOG&TEAM=003A");
			curl_setopt($ch, CURLOPT_HEADER, FALSE);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
			$data = curl_exec($ch);
			curl_close($ch);
			$data_tab = str_split($data, 33);

			for ($i = count($data_tab)-2; $i>count($data_tab)-4; $i--) {

				// décodage avec sscanf
				list($t, $o, $r, $c, $n, $bidon, $v, $a, $x, $year, $month, $day, $hour, $min, $sec) = sscanf($data_tab[$i], "%1s%4s%1s%1s%2s%2s%2s%4s%2s%4s%2s%2s%2s%2s%2s");

				$trame = $data_tab[$i];
				echo "$trame<br />";

				// déclaration de l'ID et de la valeur à stocker
				$id = 0;
				$valeur = $v;

				// test du type de capteur
				if ($c == 3 || $c == 5) {

					if ($c == 3) {
						// on assigne l'ID à 1
						$id = 1;
						echo "Température : ".$valeur."<br />";
					}
					else if ($c == 5) {
						// on assigne l'ID à 2
						$id = 2;

						if ($valeur == "10") {
							$valeur = "Très sombre";
							echo "Luminosité : ".$valeur."<br />";
						}
						else if ($valeur == "11") {
							$valeur = "Sombre";
							echo "Luminosité : ".$valeur."<br />";
						}
						else if ($valeur == "12") {
							$valeur = "Lumineux";
							echo "Luminosité : ".$luminosvaleurite."<br />";
						} 
						else if ($valeur == "13") {
							$valeur = "Très lumineux";
							echo "Luminosité : ".$valeur."<br />";
						}
					}
					// upload des données vers la DB
			        $db = dbConnect();
			    	$req = $db->prepare('UPDATE houseroomssensors SET value = :valeur WHERE id = :id');
			    	$req->execute(array('valeur' => $valeur, 'id' => $id));
					$req->closeCursor();
				}
				// sinon il ne s'agit pas d'une trame de température ou luminosité
				// du coup on passe à 
			}

		?>
	</section>

	<footer class="boutonScenario">
		<a href="index.php?action=see_scenario_page">Programmez un scénario</a>
	</footer>

	<script type="text/javascript" src="view/Design/CSS_Maison/JS_Page_infos_maison.js"></script>

</body>

</html>