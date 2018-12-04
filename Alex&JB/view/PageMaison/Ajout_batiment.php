<?php
 $title = "Ajout d'un bâtiment";
 $pagename = "Ajout d'un bâtiment";
 $css = "Ajout_batiment.css"
 ?>
<?php ob_start();?>
<form method="post" action="index.php?action=add_property">
    <section class="devis">
      <div class="mySlides fade debutdevis">
        <div class="numbertext">1 / 3</div>
        <a class="next" onclick="plusSlides(1)">Suivant</a>
        <h2 id="titredevis">Quelle est la nature de vos besoins ?</h2>
        <p><br />
          <div class="debuttest">
          <div id="debutgauche">
            <input type="hidden" name="alarm" value="non"/>
       <label class="labelcheck">Alarme <input type="checkbox" name="alarm" id="alarme" value="oui" /> <span class="checkmark"></span> </label><br />

            <input type="hidden" name="elec" value="non"/>
       <label class="labelcheck" >Chauffage éléctrique<input type="checkbox" name="elec" id="chauffage.éléctrique" value="oui" /> <span class="checkmark"></span> </label><br />

             <input type="hidden" name="heater" value="non"/>
       <label class="labelcheck">Chaudière / Pompe à chaleur <input type="checkbox" name="heater" id="Chaudière/Pompeàchaleur" value="oui" /> <span class="checkmark"></span> </label><br />

               <input type="hidden" name="AC" value="non"/>
        <label class="labelcheck">Climatisation <input type="checkbox" name="AC" id="Climatisation" value="oui" /> <span class="checkmark"></span></label> <br/>

               <input type="hidden" name="pool" value="non"/>
        <label class="labelcheck">Piscine <input type="checkbox" name="pool" id="Piscine" value="oui" /> <span class="checkmark"></span></label>

          </div>
          <div id="debutdroite">
             <input type="hidden" name="gate" value="non"/>
       <label class="labelcheck">Portail <input type="checkbox" name="gate" id="Portail" value="oui" /> <span class="checkmark"></span> </label><br />

               <input type="hidden" name="lighting" value="non"/>
       <label class="labelcheck">Eclairage <input type="checkbox" name="lighting" id="Eclairage" value="oui" /> <span class="checkmark"></span></label>
       <br />

                 <input type="hidden" name="devices" value="non"/>
       <label class="labelcheck">L'électroménager <input type="checkbox" name="devices" id="électroménager" value="oui" /> <span class="checkmark"></span> </label><br />

                 <input type="hidden" name="shutters" value="non"/>
       <label class="labelcheck">Volets / Stores <input type="checkbox" name="shutters" id="volets/stores"  value="oui" /> <span class="checkmark"></span></label> <br/>

             <input type="hidden" name="garden" value="non"/>
       <label class="labelcheck">Jardin<input type="checkbox" name="garden" id="jardin" value="oui" /> <span class="checkmark"></span></label>

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
                <input type="radio" name="property_type" value="house">
                <span class="radiomark"></span>
              </label>

              <label class="radioinner">Appartement
                <input type="radio" name="property_type" value="apartment">
                <span class="radiomark"></span>
              </label>

              <label class="radioinner">Bureau
                <input type="radio" name="property_type" value="office">
                <span class="radiomark"></span>
              </label>

              <label class="radioinner">Autres
                <input type="radio" name="property_type" value="other">
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
          <h2 id="fintitre">Comment voulez vous appeller votre bâtiment ?</h2>
          	<div class="devpart3">
		    <label>
		        Nom :
		        <input type="text" name="name" required style="width: 30%; height: 20px;">
		    </label><br>
            <label id="conditions">Accepter les conditions générales d'utilisation
                <input type="checkbox" name="condition" required style="width: 8%;"></label>
                   <div id="newbuildingsubmit">
                     <input type="submit" value="Envoyer" style="width:40%;" >
                   </div>
            </div>
        </div>
    </section>
    </form>
            <div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span> 
  <span class="dot" onclick="currentSlide(2)"></span> 
  <span class="dot" onclick="currentSlide(3)"></span> 
    </div>
    <script type="text/javascript">
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
<?php $content = ob_get_clean();?>
<?php require 'template.php'; ?>