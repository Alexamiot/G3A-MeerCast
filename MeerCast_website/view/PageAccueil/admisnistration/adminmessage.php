<?php $util="active2"?>
<?php  require "view/PageAccueil//admisnistration/templateadmin5.php";?>

<!DOCTYPE html>
<html>
<head>
     <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="view/Design/adminMessage.css">
    <link rel="icon"  href="view/PageAccueil/favicon/favicon-16x16.png" type="image/png" sizes="any">
    
    <title>Gerer les messages</title>
</head>

<body>

    <h2 style="margin:15px;">Les messages reçues :</h2>
    <div class="allMessage">

            <?php  foreach ($messages as $message) {
        ?>
            <div class="messageBody">

                 <?php $messag=  $message["message"];
                  $mail=  $message["email"];
                  $nom =$message["name"];
                  ?>
                <h3><?php echo $mail ?> :  <?php echo $nom ?></h3>
                  <br/>
                  <h3><?php echo $messag ?></h3>

            </div>
            <br/><br/>



            <?php }  ?>
    </div>

 
</body>
</html>


