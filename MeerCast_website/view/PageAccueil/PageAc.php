
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
    <link rel="stylesheet" type="text/css" href="view/Design/pageAc.css">
    <link rel="stylesheet" type="text/css" href="view/Design/responsive.css">
    <title>MeerCast</title>
    <link rel="icon"  href="view/PageAccueil/favicon/favicon-16x16.png" type="image/png" sizes="any">

</head>

<body>

    <header>

    	<div class="logo">
    		<img src="view/PageAccueil/image/meercastest.png">
    	</div>

    	<div class="row">
    		<ul class="mainNav">
    		<li class="active"><a href="#">ACCUEIL</a></li>
    		<li><a href="index.php?action=see_pageservice">SERVICES</a></li>
        <li><a href="index.php?action=see_pagedevis">DEMANDER UN DEVIS</a></li>
       		<li><button class="openbtn" onclick="openNav2()">NOUS CONTACTER</button>
    		<li><a href="index.php?action=see_pagefaq">FAQ / FORUM</a></li>
    		<?php

      if (isset($_SESSION['email'])){?>
      <li><a href="index.php?action=see_choose_house_page">MES MAISONS</a></li>
        
        <?php }  else{?>
        <li><button class="openbtn" onclick="openNav()">SE CONNECTER</button></li>

<?php
      }
        

      if (isset($_SESSION['email'])){?>
       <li><a href="index.php?action=deconnexion">DECONNEXION</a></li>
      
    <?php 
   }
   ?>
    		</ul>
    	</div>
                 <div id="forResponsive">
                    <div id="respons" class="respon">
                      <a href="javascript:void(0)" id="closebtnR" onclick="closeNavR()">×</a>
                      <a class="active" href="#">ACCUEIL</a>
                      <a href="index.php?action=see_pageservice">SERVICES</a>
                      <a href="index.php?action=see_pagedevis">DEMANDER UN DEVIS</a>
                      <button class="openbtn" onclick="openNav2()">NOUS CONTACTER</button>
                      <a href="index.php?action=see_pagefaq">FAQ / FORUM</a>
                      <?php

                              if (isset($_SESSION['email'])){?>
                                  <a href="index.php?action=see_choose_house_page">MES MAISONS</a>
                                
                                <?php }  else{?>
                                <button class="openbtn" onclick="openNav()">SE CONNECTER</button>

                        <?php
                              }
                                

                              if (isset($_SESSION['email'])){?>
                               <a href="index.php?action=deconnexion">DECONNEXION</a>
                              
                            <?php 
                           }
                           ?>
                    </div>
                  <button id="openbtnR" onclick="openNavR()">☰ </button>
                </div>

    	<div id="myNav" class="overlay">
       		<a href="javascript:void(0)" class="closebtn2" onclick="closeNav2()">&times;</a>
       		<div class="overlay-content">
	   				  <h2>Envoyez-nous un message</h2>
                <div class="container">
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
    	<div id="mySidepanel" class="sidepanel">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
  <div class="identification">
  <p>
       <h2 class="sidetitle">Votre compte : </h2>

       <form method="post" action="index.php?action=connexion">

    <label>
        Email :<br>
        <input type="email" name="email" placeholder="Email...." id="email" required>
    </label><br>
    
    <label>
        Mot de Passe :<br>
        <input type="password" name="mdp" id="mdp" required>
    </label><br>
    
    <input type="submit" value="Se Connecter" id="connexion">
</form>

    <a href="index.php?action=inscription"><p class="compte1" >Créer un Compte</p></a>
    <a href=""><p class="compte1" >Mot de passe oublié</p></a>
    </p>
   </div>
</div>
    	<div class="hero">
    		<h1>Entrez dans la Maison du Futur </h1>
    		<div class="button">
    			<a href="#inner" class="btn btnOne">Entrer</a>
    			<a href="http://youtube.com" class="btn btnTwo">Regarder la vidéo</a>
    		</div>
    	</div>
    </header>
    <!-- Les petits articles -->
    <section class="wrapper style1">
				<div id="inner">
					<article class="article1">
						<span class="image"><img src="view/PageAccueil/image/MeercastBlack.png" alt="MeerCast" /></span>
						<div class="content">
							<h2>Notre Histoire</h2>
							<p align="justify">MEERCAST, une nouvelle entreprise créée pour répondre à un appel d'offre de DOMISEP, peut-être jeune mais avec une belle page d'accueil. </p>
							<a href="index.php?action=see_pagehistoire"><button class="boutton">Voir Plus</button></a>
						</div>

					</article>
					<article class="article2">
						<span class="image"><img src="view/PageAccueil/image/nouveautées.jpg" alt="Nouveautés" /></span>
						<div class="content2">
							<h2>Nouveautés</h2>
							<p align="justify">Nous sommes encore dans la conception de notre système, nous écoutons les besoins de nos clients et utilisons la méthode agile.</p>
							<a href="index.php?action=see_choose_house_page"><button class="boutton">Voir Plus</button></a>
						</div>
					</article>

                    </article>
                    <article class="article2">
                        <span class="image"><img src="view/PageAccueil/image/environnement.jpg" alt="Nouveautés" /></span>
                        <div class="content">
                            <h2>Démarches Environnementales
                            </h2>
                            <p align="justify">Nous sommes encore dans la conception de cette partie. Elle vous donne une idée de comment nous économisons de l'énergie pour l'environnement.</p>
                            <a href="index.php?action=see_environment_page"><button class="boutton">Voir Plus</button></a>
                        </div>
                    </article>
				</div>
			</section>
	  <footer>

	  		<h3>Designed by Alexandre Amiot</h3>
	  </footer>
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
function openNavR() {
    document.getElementById("respons").style.width = "200px";
}

function closeNavR() {
    document.getElementById("respons").style.width = "0";
}
</script>
</body>
</html>
