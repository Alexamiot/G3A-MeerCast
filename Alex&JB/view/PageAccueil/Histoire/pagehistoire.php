 <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="view/Design/pagehistoire.css">
    <link rel="icon"  href="view/PageAccueil/favicon/favicon-16x16.png" type="image/png" sizes="any">
    <title>MeerCast</title>
</head>

<body>

  <header>
    <!-- Barre de navigation -->
            <div class="logo">
              <img src="view/PageAccueil/image/meercastest.png">
            </div>
            <div class="row">
              <ul class="mainNav">
              <li class="active"><a href="index.php?action=see_PageAc">ACCUEIL</a></li>
              <li><a href="index.php?action=see_pageservice">SERVICES</a></li>
              <li><a href="index.php?action=see_pagedevis" >DEMANDER UN DEVIS</a></li>
                <li><button class="openbtn" onclick="openNav2()">NOUS CONTACTER</button>
              <li><a href="index.php?action=see_pagefaq">FAQ / FORUM</a></li>
              <li><button class="openbtn" onclick="openNav()">SE CONNECTER</button></li>
              </ul>
            </div>
            <!--Overlay pour nous conctacter  -->
            <div id="myNav" class="overlay">
                    <a href="javascript:void(0)" class="closebtn2" onclick="closeNav2()">&times;</a>
                  <div class="overlay-content">
                  <h2>Envoyez-nous un message</h2>
                  <div class="container2">
        <form method="post" action="index.php?action=add_message">
    <label class="form"><br>Prénom<br></label>
    <input type="text" name="name" placeholder="Votre Prénom">

    <label class="form"><br>Nom<br></label>
    <input type="text" name="last_name" placeholder="Votre Nom de famille">

   <label class="form"><br>Email<br></label>
    <input type="email" name="email" placeholder="Ex: jack.sparrow@sea.com" required>


    <label class="form"><br>Que voulez-vous nous dire ?<br></label>
    <textarea name="message" placeholder="Ce que vous voulez nous dire" style="height:200px"></textarea>

    <input type="submit" value="Envoyer">
  </form>
      </div>
                </div>
          </div>
          <!-- Overlay de connexion -->
            <div id="mySidepanel" class="sidepanel">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
        <div class="identification">
        <p>
             <h2 class="sidetitle">Votre compte : </h2>
             <label>
              Email : <br>
              <input type="email" name="email" placeholder="Ex: nom-prenom@gmail.com" id="email" required><br>
          </label>
          <label>
              Mot de passe :  <br>
              <input type="password" name="password" id="mdp" required><br>
          </label>
          <a href="index.php?action=connexion"><input type="submit" id="connexion" value="Se Connecter"></a>
          <a href="index.php?action=inscription""><p class="compte1" >Créer un Compte</p></a>
          <a href=""><p class="compte1" >Mot de passe oublié</p></a>
          </p>

        </div>
      </div>
  </header>
  <!-- body -->
  <section id="bandeau">
      <div class="textfor">
      <h3>Voici notre histoire</h3>
        <section class="columfor">
        <p >
        Cette timeline explique notre parcours, de la crétion de l'entreprise à ses dernières améliorations. 
      Les dates clées et les grandes étapes que nous avons passées y sont présentes. </p>
        </section>
      </div>
      <div>
      <a href="indexphp"  class= "image_histoire"><img src="view/PageAccueil/image/histoire.png" alt="histoire photo" title="histoire photo"></a>
      </div>
    </section>

    <div class="timeline">
  <div class="container left">
    <div class="content">
      <h2>24 septembre 2018</h2>
      <p>Création de l'entreprise</p>
      <p>C'est suite à la demande de notre collaborateur Domisep que notre équipe est entrée dans le domaine de l'habitat, avec comme optique d'automatiser et de rendre autonome les maisons de nos clients</p>
    </div>
  </div>
  <div class="container right">
    <div class="content">
      <h2>8 octobre 2018</h2>
      <p>Début de la création du site web permettant: la gestion pour chaque client de leur(s) maison(s) respective(s), l'interraction entre les clients et l'administrateur,...</p>
    </div>
  </div>
<div class="container left">
    <div class="content">
      <h2>2017</h2>
      <p>Lorem ipsum..</p>
    </div>
  </div>
  <div class="container right">
    <div class="content">
      <h2>2016</h2>
      <p>Lorem ipsum..</p>
    </div>
  </div>
</div>

    <footer>

        <h3>Designed by Alexandre Amiot</h3>
    </footer>
    <!--Mes fonctions javascript -->
    <script>
function openNav() {
    document.getElementById("mySidepanel").style.width = "350px";
}
function closeNav() {
    document.getElementById("mySidepanel").style.width = "0";
}

function openNav2() {
  document.getElementById("myNav").style.height = "100%";
}

function closeNav2() {
  document.getElementById("myNav").style.height = "0%";
}
</script>
</body>
</html>
