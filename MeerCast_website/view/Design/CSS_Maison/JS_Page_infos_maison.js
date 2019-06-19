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
const body = document.getElementById('bodyM');
var c =document.getElementById('modal-body');
console.log("bonjour",c);
	/*document.getElementsByClassName('modal-body')
	body.childNodes[3].childNodes[3].childNodes[7]
	*/


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

	// on passe en revue tous les sensors
	for (var i=0; i<sensors.length; i++) {

		// dans le body du modal, on crée une div qui a pour id 'sensor_name'
		var capteur = document.createElement("div");
		capteur.id = "sensor_name";
		c.appendChild(capteur);


		// Dans cette div, on va créer trois sections
		//
		// une première avec la photo
		//
		// 1. on crée la section
		var pict_section = document.createElement("section");
		// 2. on l'ajoute à la div intitulée capteur
		capteur.appendChild(pict_section);
		// 3. on crée une image
		var pict = document.createElement("img");
		// 4. on lui attribue celle correspondate
		// pict.src = document.getElementsByTagName("p")[i].innerHTML;
		pict.src = document.getElementsByClassName("imagePath")[i].innerHTML;
		// 5. on ajoute l'image à la section intitulée pict_section
		pict_section.appendChild(pict);


		// une deuxième section avec  la valeur
		//
		var value_section = document.createElement("section");
		value_section.classList.add("value");
		capteur.appendChild(value_section);

		var value = document.createElement("h2");
		value.innerHTML = sensors[i].innerHTML;
		value_section.appendChild(value);

		// on print la valeur enregistrée par chaque capteur
		console.log(sensors[i]);


		// une troisième section avec le bouton de paramètre
		//
		var setting_section = document.createElement("section");
		setting_section.classList.add("set");
		capteur.appendChild(setting_section);


		// condition toute pourrie pour savoir s'il s'agit bien de la température
		if (sensors[i].innerHTML > "15" && sensors[i].innerHTML < "25") {
			// alors il s'agit bien de la température et par conséquent on peut créer la silde bar

			// création et paramétrage du slider
			var sliderInput = document.createElement("input");
			sliderInput.type = "range";
			sliderInput.min = "15";
			sliderInput.max = "25";
			sliderInput.value = sensors[i].innerHTML;
			// on renseigne sa classe
			sliderInput.classList.add("tempSlider");
			// et son id
			sliderInput.id = "myRange";
			// puis on ajoute l'élément à la section
			setting_section.appendChild(sliderInput);


			// création d'une zone de texte pour afficher la valeur du slider
			//
			// on crée d'abord un p pour le texte température
			var tempTxt = document.createElement('p');
			tempTxt.innerHTML = "Température : ";
			// puis un span qui servira pour afficher la valeur du slider
			var curTemp = document.createElement('span');
			curTemp.id = "demo";
			tempTxt.appendChild(curTemp);
			setting_section.appendChild(tempTxt);

			// affichage de la température actuelle
			curTemp.innerHTML = sliderInput.value;

			sliderInput.oninput = function() {
				// mise à jour du texte quand on bouge le slider
				curTemp.innerHTML = this.value;
			}
		}


		// condition pourrie pour savoir s'il s'agit bien de la lumière
		if (sensors[i].innerHTML == "allumé" || sensors[i].innerHTML == "éteint") {
			// alors il s'agit bien de la lumière et par conséquent on peut créer le toggle switch

			// mise en place du form
			var form = document.createElement("form");
			form.method = "post";
			form.action = "index.php?action=updateDB";
			setting_section.appendChild(form);

			// création du switch et ajout de celui-ci à la section setting_section
			var label = document.createElement("label");
			label.classList.add("switch");
			form.appendChild(label);

			// création de l'input dans le switch
			var labelInput = document.createElement("input");
			labelInput.type = "checkbox";
			labelInput.name = "newValue";
			labelInput.checked = (sensors[i].innerHTML == "éteint")? false : true;
			label.appendChild(labelInput);

			// création du span dans le switch
			var spanInput = document.createElement("span");
			spanInput.classList.add("slider");
			spanInput.classList.add("round");
			label.appendChild(spanInput);


			// fonction appelée lorsque l'on clique sur le switch de la lumière
			labelInput.onclick = function() {
				// location.href = "index.php?action=updateDB";
			}
		}


		// autre condition toute pourrie pour voir s'il s'agit bien de la télé
		if (sensors[i].innerHTML == "éteinte" || sensors[i].innerHTML == "allumée") {
			// alors il s'agit bien de la télé et par conséquent on peut créer le toggle switch

			// mise en place du form
			var form = document.createElement("form");
			form.method = "post";
			form.action = "index.php?action=updateDB";
			setting_section.appendChild(form);

			// création du switch et ajout de celui-ci à la section setting_section
			var label = document.createElement("label");
			label.classList.add("switch");
			form.appendChild(label);

			// création de l'input dans le switch
			var labelInput = document.createElement("input");
			labelInput.type = "checkbox";
			labelInput.name = "newValue";
			labelInput.checked = (sensors[i].innerHTML == "éteinte")? false : true;
			label.appendChild(labelInput);

			// création du span dans le switch
			var spanInput = document.createElement("span");
			spanInput.classList.add("slider");
			spanInput.classList.add("round");
			label.appendChild(spanInput);


			// fonction appelée lorsque l'on clique sur le switch de la télé
			labelInput.onclick = function() {
				// location.href = "index.php?action=updateDB";
			}
		}


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