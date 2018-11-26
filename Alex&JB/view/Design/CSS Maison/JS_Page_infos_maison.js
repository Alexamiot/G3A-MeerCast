// On récupère le modal
var modal = document.getElementById('myModal');
// On récupère le span qui permet de fermer le modal
var span = document.getElementsByClassName("close")[0];
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


// on récupère la section contenant les éléments liés au salon
const salon = document.getElementById("salon");
// on crée une fonction appelée lors du clique
salon.addEventListener("click", clickOnLivingR);
// on récupère tous les <li> du salon
var x = salon.getElementsByTagName("li");

/* on décrit cette fonction */
function clickOnLivingR(event) {
	console.log("clique sur le salon");
	console.log("Type de l'event");
	console.log(event.type);
	console.log("Cible de l'event");
	console.log(event.target);

	// Quand l'utilisateur clique sur la section, le modal apparaît 
	modal.style.display = "block";
	document.getElementById("modalTitle").innerHTML = "Salon";
	document.getElementById("p1").innerHTML = document.getElementById("tempSalon").innerHTML;
	document.getElementById("p2").innerHTML = document.getElementById("lumSalon").innerHTML;
	document.getElementById("p3").innerHTML = document.getElementById("tvSalon").innerHTML;

	document.getElementById("info_sur_la_pièce").innerHTML 
	= 'La température dans la pièce est de ' + x[0].innerHTML +
	', la luminosité est ' + x[1].innerHTML +
	'. La TV est ' + x[2].innerHTML + '.';
}


// idem pour la salle à manger
const salleAManger = document.getElementById("salle_a_manger");
salleAManger.addEventListener("click", clickOnDiningR);

function clickOnDiningR(event) {
	console.log("clique sur la salle a manger");
	console.log("Type de l'event");
	console.log(event.type);
	console.log("Cible de l'event");
	console.log(event.target);

	// Quand l'utilisateur clique sur la section, le modal apparaît
	modal.style.display = "block";
	document.getElementById("modalTitle").innerHTML = "Salle à manger";
	document.getElementById("p1").innerHTML = document.getElementById("tempSAM").innerHTML;
	document.getElementById("p2").innerHTML = document.getElementById("lumSAM").innerHTML;
	document.getElementById("p3").style.display = "none";
}


// et pour la chambre
const chambre = document.getElementById("chambre");
chambre.addEventListener("click", clickOnBedR);

function clickOnBedR(event) {
	console.log("clique sur la chambre");
	console.log("Type de l'event");
	console.log(event.type);
	console.log("Cible de l'event");
	console.log(event.target);

	// Quand l'utilisateur clique sur la section, le modal apparaît
	modal.style.display = "block";
	document.getElementById("modalTitle").innerHTML = "Chambre";
	document.getElementById("p1").innerHTML = document.getElementById("tempChambre").innerHTML;
	document.getElementById("p2").innerHTML = document.getElementById("lumChambre").innerHTML;
	document.getElementById("p3").style.display = "none";
}

// et pour la salle de bain
const salleDeBain = document.getElementById("salle_de_bain");
salleDeBain.addEventListener("click", clickOnBathR);

function clickOnBathR(event) {
	console.log("clique sur la salle de bain");
	console.log("Type de l'event");
	console.log(event.type);
	console.log("Cible de l'event");
	console.log(event.target);

	// Quand l'utilisateur clique sur la section, le modal apparaît
	modal.style.display = "block";
	document.getElementById("modalTitle").innerHTML = "Salle de bain";
	document.getElementById("p1").innerHTML = document.getElementById("tempSDB").innerHTML;
	document.getElementById("p2").innerHTML = document.getElementById("lumSDB").innerHTML;
	document.getElementById("p3").innerHTML = document.getElementById("tvSDB").innerHTML;
}
function openNav() {
    document.getElementById("mySidepanel").style.width = "350px";
}

function closeNav() {
    document.getElementById("mySidepanel").style.width = "0";
}