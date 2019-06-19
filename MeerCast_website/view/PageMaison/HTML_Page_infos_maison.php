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

	<!-- section d'affichage des trames -->
	<section>
		<!-- <a href="index.php?action=logs">Pour afficher les logs</a>  -->
		
		<?php 

			//require_once("../../models/model.php");

			$ch = curl_init();
			curl_setopt($ch,CURLOPT_URL,"http://projets-tomcat.isep.fr:8080/appService/?ACTION=GETLOG&TEAM=003A");
			curl_setopt($ch, CURLOPT_HEADER, FALSE);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
			$data = curl_exec($ch);
			curl_close($ch);
			$data_tab = str_split($data, 33);
			// echo "<table>
			//   <tr>
			//     <th>Trame</th>
			//     <th>Objet</th> 
			//     <th>Capteur</th>
			//     <th>Numéro</th>
			//     <th>Valeur</th>
			//     <th>Date</th>
			//   </tr>";

			// affichage de toutes les trames
			/*for($i=0;  $i<count($data_tab); $i++) {
				$trame = $data_tab[$i];
				echo "$trame<br />";
			}*/

			// affichage de la dernière trame
			$i = count($data_tab)-2;
			echo "$data_tab[$i]<br />";

			
			// décodage avec sscanf
			list($t, $o, $r, $c, $n, $v, $a, $x, $year, $month, $day, $hour, $min, $sec) = sscanf($data_tab[$i], "%1s%4s%1s%1s%2s%4s%4s%2s%4s%2s%2s%2s%2s%2s");

			// pour voir le type de la variable
			//var_dump($v);

			// test du type de capteur
			if ($c == 3) {
				// il s'agit du capteur de température
				$temperature = $v;
				echo "Température : ".$v;
			}

			// upload des données vers la DB
			//$temperature = htmlspecialchars($temperature);
	        
	        $db = dbConnect();

	    	//UPDATE houseroomsensors;
	    	//SET "value" = $temperature;
	    	//WHERE id = 1;
	    
	    	$req = $db->prepare('UPDATE houseroomssensors SET value = :temperature WHERE id = 1');
	    	$req->execute(array('temperature' => $temperature));
			$req->closeCursor();
	    	

	        //UPDATE houseroomsensors;
	    	//SET "value" = $temperature;
	    	//WHERE id = 1;
			

			// echo("
			//   <tr>
			//     <td>$i</td>
			//     <td>$o</td> 
			//     <td>$c</td>
			//     <td>$n</td>
			//     <td>$v</td>
			//     <td>$day/$month/$year $hour:$min:$sec</td>
			//   </tr>
			// ");

			// code de Lucas
			/*
			if ($c == 3) { //température
				$val = round((hexdec($v)*3.3)/(4095*0.01));
				getTempLog($val);
			}
			if ($c == 1) { //distance
				$val = hexdec($v);
				if ($val > 2000) {
					$val = 1;
				}
				else {
					$val = 0;
				}
			}
			if ($c == 5) { //luminosite
				$val = hexdec($v);
				if ($val > 2000) {
					$val = 1;
				}
				else {
					$val = 0;
				}
			}*/
			//echo "</table>";
		?>
	</section>

	<footer class="boutonScenario">
		<a href="index.php?action=see_scenario_page">Programmez un scénario</a>
	</footer>

	<script type="text/javascript" src="view/Design/CSS_Maison/JS_Page_infos_maison.js"></script>

</body>

</html>