
<?php  require "view/PageAccueil/admisnistration/templateadmin2.php";?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
     <link rel="stylesheet" type="text/css" href="view/Design/gererutilisateur.css">
    <title>Gerer les utilisateurs</title>
</head>

<body>
	<div id="Forum">


		<table>
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





<button class="button" onclick="document.getElementById('id01').style.display='block'" style="width:auto;">New Admin</button>

<div id="id01" class="modal">
  
  <form class="modal-content animate" action="index.php?action=deconnexion">
    

    <div class="container">
      <label for="uname"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="pseudo" required>

      <label for="mail"><b>email</b></label>
      <input type="email" placeholder="Enter Username" name="email" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="mdp" required>
        
        <label for="psw"><b>Password check</b></label>
      <input type="password" placeholder="Enter Password" name="mdp2" required>
        
      <button type="submit">Create new admin</button>
     <?php echo $erreur  ?>
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
      
    </div>
  </form>
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
