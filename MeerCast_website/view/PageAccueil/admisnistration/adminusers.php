
<?php  require "view/PageAccueil/admisnistration/templateadmin2.php";?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
     <link rel="stylesheet" type="text/css" href="view/Design/gererutilisateur.css">
    <title>Gerer les utilisateurs</title>
</head>

<body >
	<div id="Forum"  >


		<table >
  <tr>
    <th>Pseudo</th>
    <th>Email</th>
    <th>habitation </th>
    <th>type Habitation </th>
  </tr>

 <?php  

foreach($lesUsersetMaison as $donnees){

  ?>
  <tr>
    <td><?php echo $donnees["pseudo"] ?></td>
    <td><?php echo  $donnees["email"] ?></td>
    <td><a style="color: white;" href="index.php?action=see_adminmaison&amp;propertyName=<?php echo $donnees["nomhabitation"]; ?> "><?php echo $donnees["nomhabitation"]; ?></a></td>
    <td><?php echo $donnees["typehabitation"] ?></td>
    
  </tr>
  <?php } ?>
</table>


<button onclick="document.getElementById('id02').style.display='block'" class="button" style="width: auto; margin-left: 15px;">supprimer utilisateur</button>

<div id="id02" class="modal">
  <div class="modal-content animate">
  <form method="post" action="index.php?action=suppAdmin"  id="inscription"  style="display: flex; flex-direction: column;text-align: center; padding: 50px; " >
    

    <label>Quel utilisateur souhaitez vous retirez ? <br>
        <select name="suppuser">
          <option value="nothing">Rien</option>
            <?php  

foreach($lesUsersetMaison2 as $donnees){

  ?>
                <option value="<?php echo $donnees['pseudo'];?>"><?php echo $donnees['pseudo'];?></option>
              <?php }?>  
        </select>
    </label>

    
    <input type="submit" value="supprimer"  class="button" style="width: 20%; padding: 5px; margin-left: 40%">
</form>
<div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn" style="width: 100px; border:none; color: white;">Annuler</button>
      
    </div>

</div>
</div>


<button onclick="document.getElementById('id01').style.display='block'" class="button" style="width: auto; margin-left: 15px;">New Admin</button>

<div id="id01" class="modal">
  <div class="modal-content animate">
          <form method="post" action="index.php?action=ajoutAdmin"  id="inscription"  style="display: flex; flex-direction: column;text-align: center; padding: 50px; " >
            <label class="elem">
                Pseudo:<br>
                <input type="text" name="pseudo" placeholder="pseudo" ><br>
            </label>
           <label class="elem">
                Email:<br>
                <input type="email" name="email" placeholder="Email" ><br>
            </label>
            <label class="elem">
                mot de passe:<br>
                <input type="password" name="mdp" placeholder="mdp" ><br>
            </label>
            <label class="elem">
                Vérification de mot de passe:<br>
                <input type="password" name="mdp2" placeholder="mdp2" ><br>
            </label>


            <input type="submit" value="Ajouter"  class="button" style="width: 20%; padding: 5px; margin-left: 40%">
        </form>
    </div>
</div>


        <button onclick="document.getElementById('id03').style.display='block'" class="button" style="width: auto; margin-left: 15px;">New User</button>

        <div id="id03" class="modal">
            <div class="modal-content animate">
                <form method="post" action="index.php?action=inscription"  id="inscription"  style="display: flex; flex-direction: column;text-align: center; padding:50px;" >
                    <label class="elem" >
                        Pseudo : (4 caractère min)<br>
                        <input type="text" name="pseudo" placeholder="Pseudo...." required>
                    </label>
                    <label class="elem" >
                        Email :<br>
                        <input type="email" name="email"  placeholder="Adresse mail...." required>
                    </label >
                    <label class="elem">
                        Mot de Passe :<br>
                        <input type="password" name="mdp" required>
                    </label>
                    <label class="elem">
                        Confirmation :<br>
                        <input type="password" name="mdp2" required>
                    </label>
                    <input type="submit" value="Ajouter" class="button" >
                </form>
                <button type="button" onclick="document.getElementById('id03').style.display='none'" class="cancelbtn" style="width: 100px; border:none; color: white;">Annuler</button>
            </div>

        </div>



	</div>	
  
    

    <script>
// Get the modal
var modal = document.getElementById('id01');
var modal2 = document.getElementById('id02');
var modal3 = document.getElementById('id03');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal ||event.target == modal2 ||event.target == modal3) {
        modal.style.display = "none";
        modal2.style.display = "none";
        modal3.style.display = "none";
    }
}
</script>

</body>
</html>
