<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="view/Design/CSS_Maison/CSS_Page_choix_maison.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/solid.css" integrity="sha384-uKQOWcYZKOuKmpYpvT0xCFAs/wE157X5Ua3H5onoRAOCNkJAMX/6QF0iXGGQV9cP" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/fontawesome.css" integrity="sha384-HU5rcgG/yUrsDGWsVACclYdzdCcn5yU8V/3V84zSrPDHwZEdjykadlgI6RHrxGrJ" crossorigin="anonymous">
	<link rel="icon"  href="view/PageAccueil/favicon/favicon-16x16.png" type="image/png" sizes="any">
	<title>Choix maison</title>
</head>

<body>
	<header class="pageHead">
		<div id="mySidepanel" class="sidepanel">
		  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
		  <a href="index.php?action=see_pagecapteur">Mon Profil</a>
		  <a href="index.php?action=see_pagecapteur">Mes capteurs / Actionneur</a>
		  <a href="#">Se déconnecter</a>
		</div>
<button class="openbtn" onclick="openNav()">☰ </button>
		<div class="logo">
    		<a href="index.php?action=see_PageAc"><img src="view/PageAccueil/image/meercastest.png"></a>
    	</div>
		<h1>Sélectionnez la maison que vous souhaitez contrôler</h1>
		  
	</header>

	<div class="maindDiv">
		
		<!-- Partie contenant les propriétés -->
		<div class="houses">
			
			
			
        	<?php foreach ($propertiesArray as $property) {
        		$name = $property['property_name']; 
        		$type = $property['property_type'];
   				$srcName = "view/Design/imagesMaison/".$type.".jpg";
   				?>
				<!-- Section correspondant à chaque propriété -->
   				<section class="imageSection">
					<!-- <a href="index.php?action=see_info_house_page"><img src=<?php echo $srcName; ?>><br><h2><?php echo $name; ?></h2></a> -->
					<a href=<?php echo "index.php?action=see_info_house_page&propertyName=".$name; ?>><img src=<?php echo $srcName; ?>><br><h2><?php echo $name; ?></h2></a>
				</section>
			<?php } ?>
			
        	
		</div>

		<!-- Partie avec bouton d'ajout de propriété -->
		<div class="addButtonDiv">
			<!-- Section contenant le bouton -->
			<section class="addButtonSection">
				<a href="index.php?action=see_add_house_page" target="blank"><i class="fas fa-plus fa-10x"></i></a>
			</section>

		</div>
	
	</div>
	<ul>
		<!-- <?php foreach ($properties as $property) { ?>
			<p><?php echo $property["property_name"]." - ".$property["property_type"]; ?></p>
		<?php } ?> -->
	</ul>
	
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
