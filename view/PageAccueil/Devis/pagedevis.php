 <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="view/Design/pagedevis.css">
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
              <li><a href="index.php?action=see_pageservice">SERVICES</a></li>
              <li class="active"><a href="#" >DEMANDER UN DEVIS</a></li>
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
      <h1>Votre demande de devis en 5 minutes</h1>
        <p align="justify">Détaillez votre projet dans notre formulaire ci-dessous. Notre équipe va récuperer vos informations pour vous créer un compte, auquel vous aurez accés une fois l'installation terminée.
          Nous vous recontacterons dès que votre dossier sera traité et qu'une date d'installation sera disponible.
       </p>
      </div>
    </section>
    <section class="devis">
      <h2 id="titredevis">Quelle est la nature de vos besoins ?</h2>
      <div class="debutdevis">
        <p><br />
          <div id="debutgauche">
       <label class="labelcheck" for="alarme">Alarme <input type="checkbox" name="alarme" id="alarme" /> <span class="checkmark"></span> </label><br />

       <label class="labelcheck" for="chauffage.éléctrique">Chauffage éléctrique<input type="checkbox" name="chauffage.électrique" id="chauffage.éléctrique" /> <span class="checkmark"></span> </label><br />

       <label class="labelcheck" for="Chaudière/Pompeàchaleur">Chaudière / Pompe à chaleur <input type="checkbox" name="Chaudière/Pompeàchaleur" id="Chaudière/Pompeàchaleur" /> <span class="checkmark"></span> </label><br />

        <label class="labelcheck" for="Climatisation">Climatisation <input type="checkbox" name="Climatisation" id="Climatisation" /> <span class="checkmark"></span></label> <br/>

        <label class="labelcheck" for="Piscine">Piscine <input type="checkbox" name="piscine" id="Piscine" /> <span class="checkmark"></span></label>

          </div>
          <div id="debutdroite">
       <label class="labelcheck" for="Portail">Portail <input type="checkbox" name="Portail" id="Portail" /> <span class="checkmark"></span> </label><br />

       <label class="labelcheck" for="Eclairage">Eclairage <input type="checkbox" name="Eclairage" id="Eclairage" /> <span class="checkmark"></span></label>
       <br />

       <label class="labelcheck" for="électroménager">L'électroménager <input type="checkbox" name="électroménager" id="électroménager" /> <span class="checkmark"></span> </label><br />


       <label class="labelcheck" for="volets/stores">Volets / Stores <input type="checkbox" name="volets/stores" id="volets/stores" /> <span class="checkmark"></span></label> <br/>

       <label class="labelcheck" for="jardin">Jardin<input type="checkbox" name="jardin" id="jardin" /> <span class="checkmark"></span></label>

       </div>
     </p>
      </div>
        <h2 id="titredevis2">Quel type de lieu est concerné ?</h2>
        <div class="milieudevis">
          
        </div>

      <div id="devissubmit">
        <input type="submit" value="Envoyer">
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
