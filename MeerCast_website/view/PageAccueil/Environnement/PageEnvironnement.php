<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="view/Design/pageEnvironnement.css">
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
    <div id="myNav" class="overlay">
        <a href="javascript:void(0)" class="closebtn2" onclick="closeNav2()">&times;</a>
        <div class="overlay-content">
            <h2>Nous envoyer un message</h2>
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
</header>

<!--    content    -->

<section class="content1">
    <div class = content>
  <h1> Démarches Environnementales </h1>

  <div class="board">

    <div class="line" >
      <div class="element" ">
        <img src="view/PageAccueil/image/eau.jpg" alt="eau" />

        <!-- This is a comment -->

      </div>

      
      <div class="element">
        <img src="view/PageAccueil/image/feu.jpg" alt="feu">
      </div>
    </div>


    <div class="line" >
      <div class="element"> 
        <img src="view/PageAccueil/image/air.jpg" class="image1" alt="air">

      </div>

      <div class="element">   
        <img src="view/PageAccueil/image/terre.jpg" alt="terre">
      </div>

    </div> <!-- line -->

    </div> <!-- board -->
</div> <!-- content1 -->

</section> <!-- board -->


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

