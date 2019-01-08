
<?php
 $title = "Programmation d'un scénario";
 $pagename = "Scénario";
 $css = "CSS_Scenario.css";
 ?>
<?php ob_start();?>

	 <section id="bandeau">
      <div class="textfor">
      <h3>Comment programmer un scénario</h3>
        <section class="columfor">
        <p >
        On premier lieu vous aller devoir choisir la/les pièces concernée(s) puis les capteurs et les infos qui vont déclencher votre scénario. Ensuite il faut définir l'action que vous voulez que notre système fasse, c'est-a-dire les différents actionneurs qui vont réagir à votre demande.</p>
        <a href="https://pro-domotic.com/content/automatismes-et-sc%C3%A9narios-de-vie-et-domotique" class="button">Exemples de scénario</a>
        </section>
      </div>
      <div>
      <img src="view/Design/imagesMaison/scenario.png" alt="scénario photo" title="scénario photo">
      </div>
    </section>

<?php $content = ob_get_clean();?>
<?php require 'template.php'; ?>
