 <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="view/Design/pageservice.css">
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
              <li><a href="index.php?action=see_PageAc">ACCUEIL</a></li>
              <li class="active"><a href="">SERVICES</a></li>
              <li><a href="index.php?action=see_pagedevis" >DEMANDER UN DEVIS</a></li>
                <li><button class="openbtn" onclick="openNav2()">NOUS CONTACTER</button>
              <li><a href="">FAQ</a></li>
              <li><button class="openbtn" onclick="openNav()">SE CONNECTER</button></li>
              </ul>
            </div>
            <!--Overlay pour nous conctacter  -->
            <div id="myNav" class="overlay">
                    <a href="javascript:void(0)" class="closebtn2" onclick="closeNav2()">&times;</a>
                  <div class="overlay-content">
                  <h2>Envoyez-nous un message</h2>
                  <div class="container">
        <form action="/action_page.php">
          <label class="form"><br>Prénom<br></label>
          <input type="text" id="fname" name="firstname" placeholder="Votre Prénom">

          <label class="form"><br>Nom<br></label>
          <input type="text" id="lname" name="lastname" placeholder="Votre Nom de famille">

         <label class="form"><br>Email<br></label>
          <input type="email" name="email" placeholder="Ex: jack.sparrow@sea.com" id="email2" required>


          <label class="form"><br>Que voulez-vous nous dire ?<br></label>
          <textarea id="subject" name="subject" placeholder="Ce que vous voulez nous dire" style="height: 200px"></textarea><br>

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
          <input type="submit" id="connexion" value="Se Connecter">
          <a href=""><p class="compte1" >Créer un Compte</p></a>
          <a href=""><p class="compte1" >Mot de passe oublié</p></a>
          </p>

        </div>
      </div>
  </header>
  <!-- body -->
  <section id="bandeau">
      <div class="textdev">
      <h1>Admirez toutes les possibilitées</h1>
        <p align="justify">Pour obtenir une maison connecté complète et fonctionnelle, il faut de nombreux
          appareils pouvant être automatisé et géré pas notre site. Vous pouvez voir ici différentes applications
          que nous proposons.
       </p>
      </div>
    </section>
  <section id="cartes">
      <div class="flip-card">
  <div class="flip-card-inner">
    <div class="flip-card-front">
      <img src="view/PageAccueil/Image/lumière.png" alt="Lampes" style="width:300px;height:300px;">
    </div>
    <div class="flip-card-back">
      <h1>Lumière</h1> 
      <p>N'avez vous jamais rêvé que les lumières s'allument toutes seules quand vous arriver ?</p> 
      <p>C'est maintenant possible</p>
    </div>
  </div>
</div>
<div class="flip-card">
  <div class="flip-card-inner">
    <div class="flip-card-front">
      <img src="view/PageAccueil/Image/chauffage.png" alt="Chauffage" style="width:300px;height:300px;">
    </div>
    <div class="flip-card-back">
      <h1>Chauffage</h1> 
      <p>Que ce soit un chaffage éléctrique ou </p> 
      <p>We love that guy</p>
    </div>
  </div>
</div>
<div class="flip-card">
  <div class="flip-card-inner">
    <div class="flip-card-front">
      <img src="view/PageAccueil/Image/alarme.png" alt="Alarme" style="width:300px;height:300px;">
    </div>
    <div class="flip-card-back">
      <h1>Alarme</h1> 
      <p>Architect & Engineer</p> 
      <p>We love that guy</p>
    </div>
  </div>
</div>
<div class="flip-card">
  <div class="flip-card-inner">
    <div class="flip-card-front">
      <img src="view/PageAccueil/Image/portail.png" alt="Portail" style="width:300px;height:300px;">
    </div>
    <div class="flip-card-back">
      <h1>Portail</h1> 
      <p>Architect & Engineer</p> 
      <p>We love that guy</p>
    </div>
  </div>
</div>
<div class="flip-card">
  <div class="flip-card-inner">
    <div class="flip-card-front">
      <img src="view/PageAccueil/Image/électroménager.png" alt="Electroménager" style="width:300px;height:300px;">
    </div>
    <div class="flip-card-back">
      <h1>Electroménager</h1> 
      <p>Entre machine à café, lave linge, frigo et même votre bain </p> 
      <p>Tout peut être controlés avec votre smartphone</p>
    </div>
  </div>
</div>
<div class="flip-card">
  <div class="flip-card-inner">
    <div class="flip-card-front">
      <img src="view/PageAccueil/Image/jardin.png" alt="Jardin" style="width:300px;height:300px;">
    </div>
    <div class="flip-card-back">
      <h1>Jardin</h1> 
      <p>Le pelouse squi s'arrose automatiquement en fonction de la météo</p> 
      <p>Vos statistique pour votre potager</p>
    </div>
  </div>
</div>
<div class="flip-card">
  <div class="flip-card-inner">
    <div class="flip-card-front">
      <img src="view/PageAccueil/Image/stores.jpg" alt="Stores" style="width:300px;height:300px;">
    </div>
    <div class="flip-card-back">
      <h1>Volets / Stores</h1> 
      <p>Et même vos fenêtres</p> 
      <p>Une fermeture en fonction de l'heure, de la luminosité, plein de possibilité qui s'offre à vous</p>
    </div>
  </div>
</div>
<div class="flip-card">
  <div class="flip-card-inner">
    <div class="flip-card-front">
      <img src="view/PageAccueil/Image/scénario.jpg" alt="Scénario" style="width:300px;height:300px;">
    </div>
    <div class="flip-card-back">
      <h1>Scénario</h1> 
      <p>C'est bien d'avoir quelques objets connectés mais si c'est automatisé entre ces derniers, c'est mieux</p> 
      <p>We love that guy</p>
    </div>
  </div>
</div>
</section>
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
