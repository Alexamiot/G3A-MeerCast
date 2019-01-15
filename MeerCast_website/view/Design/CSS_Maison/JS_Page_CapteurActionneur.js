// On récupère le modal
var modal = document.getElementById('myModal');
// On récupère le span qui permet de fermer le modal
var span = document.getElementsByClassName("close")[0];

// Variable fonctionne et en panne
var fonctionne = "Fonctionne bien";
var panne = "En panne";

// fonction appelée lors du clic sur le bouton pour fermer le modal
span.onclick = function() {
    modal.style.display = "none";
}
// Foncion qui ferme aussi le modal quand l'utilisateur clique n'importe où ailleurs
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}


// on récupère la section contenant les éléments liés au temperature
const temperature = document.getElementById("temperature");
// on crée une fonction appelée lors du clique
temperature.addEventListener("click", clickOnTemperature);
// on récupère tous les <li> du temperature
var x = temperature.getElementsByTagName("li");

/* on décrit cette fonction */
function clickOnTemperature(event) {

    // Quand l'utilisateur clique sur la section, le modal apparaît
    modal.style.display = "block";
    document.getElementById("modalTitle").innerHTML = "Capteur de température ";
    document.getElementById("p1").innerHTML = "Capteur de température dans le salon : "+fonctionne;
    document.getElementById("p2").innerHTML = "Capteur de température dans la salle à manger : "+fonctionne;
    document.getElementById("p3").innerHTML = "Capteur de température dans la chambre : "+fonctionne;
    document.getElementById("p4").innerHTML = "Capteur de température dans la salle de bain : "+fonctionne;

}


// idem pour les chauffages
const chauffage = document.getElementById("chauffage");
chauffage.addEventListener("click", clickOnDiningR);

function clickOnDiningR(event) {
    // Quand l'utilisateur clique sur la section, le modal apparaît
    modal.style.display = "block";
    document.getElementById("modalTitle").innerHTML = "Chauffage";
    document.getElementById("p1").innerHTML = "Chauffage dans le salon : "+fonctionne;
    document.getElementById("p2").innerHTML = "Chauffage dans la salle à manger : "+fonctionne;
    document.getElementById("p3").innerHTML = "Chauffage dans la chambre : "+fonctionne;
    document.getElementById("p4").innerHTML = "Chauffage dans la salle de bain : "+fonctionne;

}


// et pour les capteurs de luminosite
const luminosite = document.getElementById("luminosite");
luminosite.addEventListener("click", clickOnLuminosite);

function clickOnLuminosite(event) {

    // Quand l'utilisateur clique sur la section, le modal apparaît
    modal.style.display = "block";
    document.getElementById("modalTitle").innerHTML = "Capteurs de luminosité";
    document.getElementById("p1").innerHTML = "Capteur de luminosité dans le salon : "+fonctionne;
    document.getElementById("p2").innerHTML = "Capteur de luminosité dans la salle à manger : "+fonctionne;
    document.getElementById("p3").innerHTML = "Capteur de luminosité dans la chambre : "+fonctionne;
    document.getElementById("p4").innerHTML = "Capteur de luminosité dans la salle de bain : "+fonctionne;
}

// et pour les lampes
const lampe = document.getElementById("lampe");
lampe.addEventListener("click", clickOnlampe);

function clickOnlampe(event) {

    // Quand l'utilisateur clique sur la section, le modal apparaît
    modal.style.display = "block";
    document.getElementById("modalTitle").innerHTML = "Lampes";
    document.getElementById("p1").innerHTML = "Lampe dans le salon : "+fonctionne;
    document.getElementById("p2").innerHTML = "Lampe dans la salle à manger : "+fonctionne;
    document.getElementById("p3").innerHTML = "Lampe dans la chambre : "+fonctionne;
    document.getElementById("p4").innerHTML = "Lampe dans la salle de bain : "+fonctionne;
}
function openNav() {
    document.getElementById("mySidepanel").style.width = "350px";
}

function closeNav() {
    document.getElementById("mySidepanel").style.width = "0";
}