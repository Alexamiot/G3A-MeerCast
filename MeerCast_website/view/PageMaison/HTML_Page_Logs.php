<html>
<head>
	<title>Logs</title>
	<link rel="stylesheet" href="view/Design/CSS_Maison/CSS_Page_Logs.css" />
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<meta charset="utf-8">
</head>

<body>

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
		$i = count($data_tab)-3;
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
</body>