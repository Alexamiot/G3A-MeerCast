
<?php
require "view/PageAccueil/admisnistration/templateadmin.php";
?>

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
     




  <div class="faq">
    <h2>FAQ (Foire aux questions)</h2>
    <input type="text" id="mySearch" onkeyup="myFunction()" placeholder="Search.." title="Type in a category">
    <ul id="myMenu">
    <?php  foreach ($faqs as $faq) { ?>
        <li><button class="accordion" style="color: white;"><?php echo  $faq["question"] ;?>
         <a style="width: 45px; float: left; margin-right: 50px;" href="index.php?action=suppTopicFaq&amp;topicToSupp=<?php echo $faq["question"];?>"><img  style="width: 20px; height: 20px;" src="view/PageAccueil/image/bin.png" id="bin"></a></button>
<div class="panel">

  <p><?php  echo $faq["reponse"]  ;?></p>


</div></li>
   


   <?php }
    ?>
      
      
      
    </ul>


<!-- textContent avec un getelement byid sur element et unn size()    ou ElementsByTagName("textarea")[0]-->
<!-- ici on voudra mettre le js qui nous dit que on est en dessous des 500 charactere limiter  -->
<form style="color: white; margin-left: 22%; " method="post" action="index.php?action=add_faq"  id="inscription"  >
    <label  class="elem">
        Sujet :<br>
        <input type="text" name="question" placeholder="topic...." required><br>
    </label>
    <label class="element">
        Ecrivez :<br>
        <textarea id="changeText" type="text" name="reponse" placeholder="Le contenu" required> </textarea><span id="pseudo_info"></span><br>
        
    </label >
    
    
    
    <input style="margin-left: 0px;" type="submit" value="Ajouter a la FAQ"  class="button" >
</form>


  </div>
  


  <section id="bandeau">
      <div class="textfor">
      <h3>Avons-nous repondu a votre question ?</h3>
        <section class="columfor">
        <p >
        Si vous avez d'autres questions qui ne sont pas présentes dans la faq, cliquez ici pour acceder au forum où vous pourrez posez vos propres questions. Certains utilisateurs et nous, administrateur pourront y répondre, alors n'hésitez pas.</p>


        <a href="index.php?action=see_forum_admin" class="button">Forum</a>
       

        </section>



      </div>
      <div>
      <img src="view/PageAccueil/image/forum1.png" alt="forum photo" title="forum photo">
      </div>
    </section>


     <script type="text/javascript"> 
 const inputElt = document.getElementById("changeText");
const spanInfoElt = document.getElementById("pseudo_info");

inputElt.addEventListener("keypress", keypressFunction);
inputElt.addEventListener("blur", blurInputFunction);

function keypressFunction(event) {
    if(( inputElt.value.length)<=100){
    spanInfoElt.textContent = "On faut 100 charactere max";
    spanInfoElt.style.color = "white"

    }else{
     spanInfoElt.textContent = "vous avez depasez le nombre charactere autoriser";
    spanInfoElt.style.color = "red"
    } 
}

function blurInputFunction(event) {
    
    spanInfoElt.textContent = "";
}
</script>
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