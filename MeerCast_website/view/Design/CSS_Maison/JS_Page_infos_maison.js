// code Alex pour l'affichage du menu latéral
function openNav() {
    document.getElementById("mySidepanel").style.width = "350px";
}

function closeNav() {
    document.getElementById("mySidepanel").style.width = "0";
}


// On récupère le modal
var modal = document.getElementById('myModal');

// On récupère le span qui permet de fermer le modal
var span = document.getElementsByClassName("close")[0];

// on navigue jusqu'au body du modal
const body = document.body;
var c = body.childNodes[3].childNodes[3].childNodes[7];


// fonction appelée lors du clic sur une pièce
function clickOnRoom(id) {
	
	console.log('id_room : '+id);

	// Quand l'utilisateur clique sur la section, le modal apparaît 
	modal.style.display = "block";

	// on crée la variable room comme étant la div de la pièce sur laquelle on vient de cliquer
	var room = document.getElementById(id);
	//console.log(room);

	// on définit roomTitle comme le contenu du h1 (en l'occurence le nom de la pièce)
	var roomTitle = room.getElementsByTagName("h1");

	// on paramètre le modal pour que son titre soit celui de la pièce sur laquelle on vient de cliquer
	document.getElementById("modalTitle").innerHTML = roomTitle[0].innerHTML;

	// on définit sensors comme étant l'ensemble des span
	var sensors = room.getElementsByTagName("span");
	for (var i=0; i<sensors.length; i++) {

		// dans le body du modal, on crée une div qui a pour id 'sensor_name'
		var capteur = document.createElement("div");
		capteur.id = "sensor_name";
		c.appendChild(capteur);
		

		// Dans celui-ci on va créer trois sections 
		// une première avec la photo
		var pict_section = document.createElement("section");
		capteur.appendChild(pict_section);

		var pict = document.createElement("img");
		pict.src = document.getElementsByTagName("p")[i].innerHTML;
		pict_section.appendChild(pict);


		// une seconde avec  la valeur
		var value_section = document.createElement("section");
		value_section.classList.add("value");
		capteur.appendChild(value_section);

		var value = document.createElement("h2");
		value.innerHTML = sensors[i].innerHTML;
		value_section.appendChild(value);

		// on print la valeur enregistrée par chaque capteur
		console.log(sensors[i]);


		// une dernière avec le bouton de paramètre
		var setting_section = document.createElement("section");
		setting_section.classList.add("set");
		capteur.appendChild(setting_section);


		capteur.style.display = 'flex';

		// On print la div contenant les trois sections créées précédemment (les deux lignes ci-dessous sont identiques)
		// console.log(c.lastChild);
		console.log(capteur);

		// fin du test
	}	
}

var sensors = c.getElementsByTagName("div");

// fonction appelée lors du clic sur le bouton pour fermer le modal
span.onclick = function() {
	modal.style.display = "none";

	for(var i = 0; i < sensors.length; i++) {
		sensors[i].style.display = 'none';
	}
}

// Foncion qui ferme aussi le modal quand l'utilisateur clique n'importe où ailleurs
window.onclick = function(event) {
    if (event.target == modal) {
		modal.style.display = "none";

		for(var i = 0; i < sensors.length; i++) {
			sensors[i].style.display = 'none';
		}
    }
}