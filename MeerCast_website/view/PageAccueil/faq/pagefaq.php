<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="view/Design/pagefaq.css">
    <link rel="stylesheet" type="text/css" href="responsive.css">
    <link rel="icon"  href="view/PageAccueil/favicon/favicon-16x16.png" type="image/png" sizes="any">
    <title>MeerCast</title>
</head>
 <body>
     <header>
    	<div class="logo">
    		<a href="index.php?action=see_PageAc"><img src="view/PageAccueil/image/meercastest.png"></a>
    	</div>
    	<div class="row">
    		<ul class="mainNav">
    		<li ><a href="index.php?action=see_PageAc">ACCUEIL</a></li>
    		<li><a href="index.php?action=see_pageservice">SERVICES</a></li>
    		<li><a href="index.php?action=see_pagedevis">DEMANDER UN DEVIS</a></li>
       		<li><button class="openbtn" onclick="openNav2()">NOUS CONTACTER</button>
    		<li class="active2"><a href="">FAQ / FORUM</a></li>
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





     <div class="faq">
         <h2>FAQ (Foire aux questions)</h2>
         <input type="text" id="mySearch" onkeyup="myFunction()" placeholder="Search.." title="Type in a category">
         <ul id="myMenu">
             <?php  foreach ($faqs as $faq) { ?>
             <li><button class="accordion" style="color: white;"><?php echo  $faq["question"] ;?>
                     </button>
                 <div class="panel">

                     <p><?php  echo $faq["reponse"]  ;?></p>


                 </div></li>


             <?php }
             ?>



         </ul>

<!--
             <div class="faq">
    <h2>FAQ (Foire aux questions)</h2>
    <input type="text" id="mySearch" onkeyup="myFunction()" placeholder="Search.." title="Type in a category">
    <ul id="myMenu">
      <li><button class="accordion" style="color: white;">Changer temperature</button>
<div class="panel">

  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat ecuoiiiecoewn iewosjfeowic ewiopsjfoiewnm fwiopwejmfoimcew weiopeimfcoew fweoijfciewomc weofmipoewmfk ewiofmpweofm ewoifmipewmf.</p>
</div></li>
      <li><button class="accordion"  style="color: white;">La climatisation</button>
<div class="panel">
  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
</div></li>
      <li><button class="accordion" style="color: white;">Jardin</button>
<div class="panel">
  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
</div></li>

    </ul>
  </div>
-->


  <section id="bandeau">
      <div class="textfor">
      <h3>Avons-nous repondu a votre question ?</h3>
        <section class="columfor">
        <p >
        Si vous avez d'autres questions qui ne sont pas présentes dans la faq, cliquez ici pour acceder au forum où vous pourrez posez vos propres questions. Certains utilisateurs et nous, administrateur pourront y répondre, alors n'hésitez pas.</p>
        <a href="index.php?action=see_forum" class="button">Forum</a>
        </section>
      </div>
      <div>
      <img src="view/PageAccueil/image/forum1.png" alt="forum photo" title="forum photo">
      </div>
    </section>



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
function bodyFunction() {
    document.body.scrollTop = 770; // For Safari
    document.documentElement.scrollTop = 770; // For Chrome, Firefox, IE and Opera
}


function myFunction() {
    var input, filter, ul, li, a, i;
    input = document.getElementById("mySearch");
    filter = input.value.toUpperCase();
    ul = document.getElementById("myMenu");
    li = ul.getElementsByTagName("li");
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("button")[0];
        if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";
        }
    }
}


var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
    acc[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var panel = this.nextElementSibling;
        if (panel.style.display === "block") {
            panel.style.display = "none";
        } else {
            panel.style.display = "block";
        }
    });
}

</script>
</body>
</html>
