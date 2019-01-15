
<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="view/Design/CSS_Maison/CSS_Page_CapteurActionneur.css">
    <link rel="icon"  href="view/PageAccueil/favicon/favicon-16x16.png" type="image/png" sizes="any">
    <title>Capteurs & Actionneurs</title>
</head>

<body>

<!-- The Modal -->
<div id="myModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
        <div class="modal-header">
            <span class="close">&times;</span>
            <h1 id="modalTitle">Modal Header</h1>
        </div>
        <div class="modal-body">
            <p id="p1">Some text in the Modal Body</p>
            <p id="p2">Some other text...</p>
            <p id="p3">...</p>
            <p id="p4">...</p>
            <p id="info_sur_la_pièce"></p>
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
        <a href="index.php?action=see_page_capteuractionneur">Mes capteurs & actionneurs</a>
        <a href="index.php?action=see_Ajout_batiment">Ajouter un bâtiment</a>
        <a href="index.php?action=see_scenario_page" target="blank">Programmer un scénario</a>
        <a href="index.php?action=see_choose_house_page">Retour au choix de la maison</a>
        <a href="#">Se déconnecter</a>
    </div>
    <button class="openbtn" onclick="openNav()">☰ </button>
    <div class="logo">
        <a href="index.php?action=see_PageAc"><img src="view/PageAccueil/image/meercastest.png"></a>
    </div>
    <div class="titre">
        <h1>Capteurs & Actionneurs</h1>
    </div>

    <!-- <?php $name = htmlspecialchars($_GET['property_name']); ?> -->
    <!-- <h1>Maison</h1> -->
    <h1 id="housename"><?php echo htmlspecialchars($_SESSION['propertyName']); ?></h1>
</header>


<section id="allrooms">
    <div class="rooms">

        <section id="temperature" class="roomInformation">
            <div class="div1">
                <h1 id="titre">Capteurs de Température</h1>
                <li id="Intro">Ce capteur détecte la température de la maison </li>
                <li id="Puissance">Puissance : 2.5 mW</li>
                </br>
            </div>
            <div class="div2">
                <img src="view/Design/imagesMaison/temperature.jpg">
            </div>
        </section>


        <section id="chauffage" class="roomInformation">
            <div class="div1">
                <h1 id="titre">Chauffages</h1>
                <li id="Intro">Chauffage intelligent, change la puissance en fonction de température détectée par le capteur de température.</li>
                <li id="Puissance">Puissance : 100 - 1800 W</li>
            </div>
            <div class="div2">
                <img src="view/Design/imagesMaison/chauffage.jpg">
            </div>

        </section>
    </div>

    <div class="rooms">
        <section id="luminosite" class="roomInformation">
            <div class="div1">
                <h1 id="titre">Capteurs de luminosité</h1>
                <li id="Intro">Ce capteur détecte le niveau de limunosité de l'environnement</li>
                <li id="Puissance">Puissance : 5 mW</li>
                </br>
            </div>
            <div class="div2">
                <img src="view/Design/imagesMaison/luminosite.png">
            </div>
        </section>

        <section id="lampe" class="roomInformation">
            <div class="div1">
                <h1 id="titre">Lampes</h1>
                <li id="Intro">Lampes intelligentes, change le niveau de luminosité en fonction de luminosité détectée.</li>
                <li id="Puissance">Puissance : 10 W</li>
            </div>
            <div class="div2">
                <img src="view/Design/imagesMaison/lampe.png">
            </div>
        </section>
    </div>
</section>

<!--  -->

<footer class="boutonDepannage">
    <a href="" target="blank">Demander l'équipe de dépannage</a>
</footer>

<script type="text/javascript" src="view/Design/CSS_Maison/JS_Page_CapteurActionneur.js"></script>
</body>

</html>