 
<?php
require "view/PageAccueil/admisnistration/templateadmin4.php";
?>

 <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="view/Design/pageservice.css">
    <link rel="icon"  href="view/PageAccueil/favicon/favicon-16x16.png" type="image/png" sizes="any">
    <title>MeerCast</title>
</head>

<body>

  
  <!-- body -->
  <section id="bandeau">
      <div class="textfor">
      <h3>Admirez les possibilitées</h3>
        <section class="columfor">
        <p >
        Vous pouvez regarder les différents services qu'on peut faire pour vous si vous devenez notre client. </p>
        <span><img src="view/PageAccueil/image/services.png" alt="service photo" title="service photo"></span>
        </section>
      </div>
    </section>



<button onclick="document.getElementById('id01').style.display='block'" style="width:auto; margin-left: 45%;">Modifier le catalogue</button>

<div id="id01" class="modal">
  <div class="modal-content animate">
  <form method="post" action="index.php?action=addtoadminservice"  id="inscription"  style="display: flex; flex-direction: column;text-align: center; " >
    <label class="elem">
        Service :<br>
        <input type="text" name="service" placeholder="service" ><br>
    </label>
    <label class="elem">
        Description :<br>
        <input type="text" name="description" placeholder="description"><br>
    </label>
    <label class="elem">
        Image name (make sure it is a png):<br>
        <input type="text" name="image" placeholder="image"><br>
    </label>

    <button type="submit">Create new Flip Card</button>
     
</form>
<div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn" style="width: 100px;">Cancel</button>
      
    </div>
</div>
</div>



  <section id="cartes">


<?php
foreach ($services as $service) {
?>

      <div class="flip-card">
  <div class="flip-card-inner">
    <div class="flip-card-front">
      <?php
      $image=  $service["image"];
      $lien = "view/PageAccueil/Image/".$image.".png"; 
      ?>

      <img src=<?php echo $lien;?> alt="<?php echo $image ?>" style="width:300px;height:300px;">
    </div>
    <div class="flip-card-back">
      <h1><?php echo $service["service"]?></h1> 
      <p><?php echo $service["description"]?></p> 
    </div>
  </div>
</div>

<?php  } ?>

</section>
  <footer>

        <h3>Designed by Jean-Baptiste de Bellescize & Alexandre Amiot</h3>
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





var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}



</script>
</body>
</html>
