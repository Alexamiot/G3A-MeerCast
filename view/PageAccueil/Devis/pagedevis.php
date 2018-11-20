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
              <li><a href="index.php?action=see_pagefaq">FAQ / FORUM</a></li>
              <li><button class="openbtn" onclick="openNav()">SE CONNECTER</button></li>
              </ul>
            </div>
            <!--Overlay pour nous conctacter  -->
            <div id="myNav" class="overlay">
                    <a href="javascript:void(0)" class="closebtn2" onclick="closeNav2()">&times;</a>
                  <div class="overlay-content">
                  <h2>Envoyez-nous un message</h2>
                  <div class="container">
        <form method="post" action="index.php?action=add_message" target="_blank">
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
          <input type="submit" id="connexion" value="Se Connecter">
          <a href=""><p class="compte1" >Créer un Compte</p></a>
          <a href=""><p class="compte1" >Mot de passe oublié</p></a>
          </p>

        </div>
      </div>
  </header>
  <p style="text-align: center; border: 2px darkblue; margin:5px; padding: 1px; font-size: 25px;">
  <?php echo $successmessage; ?></p>
  <!-- body -->
<section id="bandeau">
      <div class="textfor">
      <h3>Votre devis en 5min</h3>
        <section class="columfor">
        <p >
          Détaillez votre projet dans notre formulaire ci-dessous. Notre équipe va récuperer vos informations pour vous créer un compte, auquel vous aurez accés une fois l'installation terminée.
          Nous vous recontacterons dès que votre dossier sera traité et qu'une date d'installation sera disponible.</p>
        </section>
      </div>
      <div>
      <a href="indexphp"  class= "image_forum"><img src="view/PageAccueil/image/forum1.png" alt="forum photo" title="forum photo"></a>
      </div>
    </section>
    <form method="post" action="index.php?action=add_devis">
    <section class="devis">
      <div class="mySlides fade debutdevis">
        <div class="numbertext">1 / 3</div>
        <a class="next" onclick="plusSlides(1)">Suivant</a>
        <h2 id="titredevis">Quelle est la nature de vos besoins ?</h2>
        <p><br />
          <div class="debuttest">
          <div id="debutgauche">
       <label class="labelcheck">Alarme <input type="checkbox" name="alarm" id="alarme" /> <span class="checkmark"></span> </label><br />

       <label class="labelcheck" >Chauffage éléctrique<input type="checkbox" name="elec.heating" id="chauffage.éléctrique" /> <span class="checkmark"></span> </label><br />

       <label class="labelcheck">Chaudière / Pompe à chaleur <input type="checkbox" name="heater" id="Chaudière/Pompeàchaleur" /> <span class="checkmark"></span> </label><br />

        <label class="labelcheck">Climatisation <input type="checkbox" name="AC" id="Climatisation" /> <span class="checkmark"></span></label> <br/>

        <label class="labelcheck">Piscine <input type="checkbox" name="pool" id="Piscine" /> <span class="checkmark"></span></label>

          </div>
          <div id="debutdroite">
       <label class="labelcheck">Portail <input type="checkbox" name="gate" id="Portail" /> <span class="checkmark"></span> </label><br />

       <label class="labelcheck">Eclairage <input type="checkbox" name="lighting" id="Eclairage" /> <span class="checkmark"></span></label>
       <br />

       <label class="labelcheck">L'électroménager <input type="checkbox" name="devices" id="électroménager" /> <span class="checkmark"></span> </label><br />


       <label class="labelcheck">Volets / Stores <input type="checkbox" name="shutters" id="volets/stores" /> <span class="checkmark"></span></label> <br/>

       <label class="labelcheck">Jardin<input type="checkbox" name="garden" id="jardin" /> <span class="checkmark"></span></label>

       </div>
       </div>
     </p>
      </div>
        <div class="mySlides fade suitedevis">
          <div class="numbertext">2 / 3</div>
            <a class="prev" onclick="plusSlides(-1)">Précédent</a>
            <a class="next" onclick="plusSlides(1)">Suivant</a>
          <h2 id="titredevis2">Quel type de lieu est concerné ?</h2>
            <p class="radiotitle"> Quel type de batiment est concerné ? *
              <label class="radioinner">Maison
                <input type="radio" name="building" value="house">
                <span class="radiomark"></span>
              </label>

              <label class="radioinner">Appartement
                <input type="radio" name="building" value="flat">
                <span class="radiomark"></span>
              </label>

              <label class="radioinner">Bureau
                <input type="radio" name="building" value="office">
                <span class="radiomark"></span>
              </label>

              <label class="radioinner">Autres
                <input type="radio" name="building" value="other">
                <span class="radiomark"></span>
              </label>
            </p>
            <p class="radiotitle"> Quel type de construction ? *
              <label class="radioinner2">Inexistante
                <input type="radio" name="construction" value="inexistante">
                <span class="radiomark2"></span>
              </label>

              <label class="radioinner2">Existante
                <input type="radio" name="construction" value="exist">
                <span class="radiomark2"></span>
              </label>
            </p>
          <p id="surface">
            <label>Quel surface avez-vous ?</label>
              <select id="rollliste2" name="surface">
                <option value="none">Non définie</option>
                <option value="50">moins de 50 m²</option>
                <option value="100">Entre 50m² et 100 m²</option>
                <option value="150">Entre 100m² et 150m²</option>
                <option value="200">Entre 150m² et 200m²</option>
                <option value="200+">Plus de 200m²</option>
              </select>
          </p>
          <label id="comment" >Précisions complémentaires sur votre besoin : <br>
            <textarea id="préc" name="comment" rows="5" cols="50" placeholder="Vos précisions"></textarea>
          </label>
        </div>
        <div class="mySlides fade findevis">
          <div class="numbertext">3 / 3</div>
            <a class="prev" onclick="plusSlides(-1)">Précédent</a>
          <h2 id="fintitre">Vos informations personnels : </h2>
            <p class="radiotitle"> Vous êtes : *
              <label class="radioinner">Un particulier
                <input type="radio" name="type">
                <span class="radiomark"></span>
              </label>

              <label class="radioinner">Un professionel
                <input type="radio" name="type">
                <span class="radiomark"></span>
              </label>
            </p>
            <p class="radiotitle"> Civilité : *
                <label class="radioinner">M.
                  <input type="radio" name="gender" value="M">
                  <span class="radiomark"></span>
                </label>

                <label class="radioinner">Mme
                  <input type="radio" name="gender" value="Mme">
                  <span class="radiomark"></span>
                </label>
              </p> 

             <div id="info">
              <div id="flex1">
               <input type="text" name="name" placeholder="Votre Prénom">
               <input type="text" name="last_name" placeholder="Votre Nom">
                      <select id="rollliste" name="tel">
                        <option value="france">France (+33)</option>
                        <option value="belgium">Belgique (+32)</option>
                        <option value="switzerland">Suisse (+41)</option>
                        <option value="uk">Royaume Unis (+44)</option>
                        <option value="italy">Italie (+39)</option>
                        <option value="germany">Allemagne (+49)</option>
                        <option value="spain">Espagne (+34)</option>
                      </select>
                <input type="text" name="phonenumber" placeholder="Votre téléphone">
               <input type="text" name="email" placeholder="Votre e-mail">
             </div>
             <div id="flex2">
               <input type="text" name="adress" placeholder="Votre adresse">
               <input type="text" name="adress2" placeholder="Complément d'adresse">
               <input type="text" name="areacode" placeholder="Code postal">
               <input type="text" name="city" placeholder="Ville">
                      <select id="rollliste" name="surface">
                        <option value="none">France</option>
                        <option value="50">Belgique</option>
                        <option value="100">Suisse</option>
                        <option value="150">Royaume Unis</option>
                        <option value="200">Italie</option>
                        <option value="200+">Allemagne</option>
                        <option value="200+">Espagne</option>
                      </select>
              </div>
             </div>  
            <label id="conditions">Accepter les conditions générales d'utilisation
                <input type="checkbox" name="condition" required></label>
                   <div id="devissubmit">
                     <input type="submit" value="Envoyer">
                   </div>
        </div>
    </section>
    </form>
            <div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span> 
  <span class="dot" onclick="currentSlide(2)"></span> 
  <span class="dot" onclick="currentSlide(3)"></span> 
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
// script pour le slideshow du devis
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}
</script>
</body>
</html>