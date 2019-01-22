
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
    <td><a href="index.php?action=see_adminmaison&amp;propertyName=<?php echo $donnees["nomhabitation"]; ?> "><?php echo $donnees["nomhabitation"]; ?></a></td>
    <td><?php echo $donnees["typehabitation"] ?></td>
    
  </tr>
  <?php } ?>
</table>





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



	</div>	
  
    

    <script>
// Get the modal
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
