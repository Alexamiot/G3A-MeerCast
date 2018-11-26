<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<!-- <link rel="stylesheet" type="text/css" href="CSS_Page_choix_maison.css"> -->
	<title>Ajouter une maison</title>
</head>

<body>
	<header>
		<h1>Page pour ajouter une maison - À lier avec page en question</h1>
	</header>
		
	
	<section>

		<h2>Mettons que vous ajoutiez une propriété</h2>
		<h2>Choisissez un nom pour cette propriété, et un type entre 'house' et 'apartment'.</h2>
		<p><strong>La propriété a été ajoutée avec succès !</strong></p>

		<form method="post" action="index.php?action=add_property">
		    <label>
		        Nom :
		        <input type="text" name="name" required>
		    </label>
		    <label>
		        Type :
		        <input type="text" name="property_type" required>
		    </label>
		    <input type="submit" value="Ajouter">
		</form>

	</section>
	
</body>

</html>
