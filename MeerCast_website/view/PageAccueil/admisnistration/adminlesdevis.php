<?php $util="active2"?>
<?php  require "view/PageAccueil//admisnistration/templateadmin6.php";?>

<!DOCTYPE html>
<html>
<head>
     <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="view/Design/pagedevisadmin.css">
    <link rel="icon"  href="view/PageAccueil/favicon/favicon-16x16.png" type="image/png" sizes="any">
   
    <title>Gerer les Devis</title>
</head>

<body>

<div id="lesDevis">
     <?php  foreach ($devis as $devi) {
?>
 


<?php
$name=$devi["name"];
$last_name=$devi["last_name"];
$email=$devi["email"];
$gender=$devi["gender"];
$tel=$devi["tel"];
$phonenumber=$devi["phonenumber"];
$adress=$devi["adress"];
$adress2=$devi["adress2"];
$city=$devi["city"];
$areacode=$devi["areacode"];

$building=$devi["building"];
$construction=$devi["construction"];
$surface=$devi["surface"];
$country=$devi["country"];
$type=$devi["type"];

$comment=$devi["comment"];

     $alarm=  $devi["alarm"];
     $elec=  $devi["elec"];
      $heater =$devi["heater"];
      $AC=  $devi["AC"]; 
      $pool =$devi["pool"];
      $gate=  $devi["gate"]; 
      $lighting =$devi["lighting"];
      $devices=  $devi["devices"]; 
      $shutters =$devi["shutters"];
      $garden =$devi["garden"];
      ?>


    <div id="devisinfo">
      <div>
          <h2 style="text-align: center"><?php echo $name ." ". $last_name ?></h2>
                  <div class="flip-card">
                  <div class="flip-card-inner">
                    <div class="flip-card-front">
                     <?php if($gender=="M") { ?><img src="view/Design/imagesMaison/manIcon.png" alt="Avatar" style="width:100%;height:100%;"> <?php }else { ?><img src="view/Design/imagesMaison/womanIcon.png" alt="Avatar" style="width:100%;height:100%;"> <?php } ?>
                    </div>
                    <div class="flip-card-back">
                      <h4><?php echo $type.": " ?></h4>
                      <h1><?php echo $name ." ". $last_name ?></h1>
                      <p><?php echo $email ?></p>
                      <br/>
                      <p><?php echo $tel."".$phonenumber ?></p>
                      <br/>
                      <p><?php echo $adress." ".$adress2 ?></p>
                      <br/>
                      <p><?php echo $city." ".$areacode." ".$country ?></p>


                    </div>
                  </div>

                </div>

        </div>

      <div>
                 <label> <br>
                    <select style="width: 100%;" name="country">

                            <option  value="">Les options choisies sont :</option>
                            <?php if($alarm=="oui" ){ ?><option value= "<?php echo $alarm ?>"> Alarme </option> <?php } ?>
                            <?php if($elec=="oui" ){?><option value="<?php echo $elec ?>">chauffage électrique</option><?php } ?>
                            <?php if($AC=="oui" ){?><option value="<?php echo $AC ?>">Climatisation</option><?php } ?>
                            <?php if($pool=="oui" ){?><option value= "<?php echo $pool ?>"> Piscine </option><?php } ?>
                            <?php if($gate=="oui" ){?><option value="<?php echo $gate ?>">Portail</option><?php } ?>
                           <?php if($lighting=="oui" ){ ?><option value="<?php echo $lighting ?>">Eclairage</option><?php } ?>
                            <?php if($devices=="oui" ){?><option value= "<?php echo $devices ?>"> Electroménager </option><?php } ?>
                           <?php if($shutters=="oui" ){?> <option value="<?php echo $shutters ?>">Volets</option><?php } ?>
                           <?php if($garden=="oui" ){?> <option value="<?php echo $garden ?>">Jardin</option><?php } ?>


                    </select>
                </label>
      </div>
      <div>
                   <button  class="myBtne">Other info</button>

                  <!-- The Modal -->
                  <div class="myModale modal">

                    <!-- Modal content -->
                    <div class="modal-content">
                      <span class="close">&times;</span>
                      <p><?php echo "type de batiment est concerné : ".$building ?></p>
                      <br/>
                      <p><?php echo "type de construction : ".$construction ?></p>
                      <br/>
                      <p><?php echo "La surface est  : ".$surface ?></p>
                      <br/>
                      <p><?php echo "Commentaire:   : ".$comment ?></p>

                      <br/>
                    </div>


                  </div>
      </div>




    </div>

    <?php }  ?>
</div>










 <script>
// Get the modal
var modale = document.getElementsByClassName("myModale");

// Get the button that opens the modal
var btne = document.getElementsByClassName("myBtne");

// Get the <span> element that closes the modal
var spane = document.getElementsByClassName("close");

// When the user clicks the button, open the modal 
for (let k = 0; k < btne.length; k++) {
  
    btne[k].onclick = function() {
  modale[k].style.display = "block";

}
}




// When the user clicks on <span> (x), close the modal
for (let k = 0; k < spane.length; k++) {
spane[k].onclick = function() {
  modale[k].style.display = "none";
}
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  for (let k = 0; k < modale.length; k++) {
  if (event.target == modale[k]) {
    modale[k].style.display = "none";
  }
  }

}
</script>
</body>
</html>


