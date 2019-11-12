<?php require_once("ComposantsVue.class.php"); ?>
<html>
  <head>
      <title>La FNOC</title>
      <meta charset="UTF-8"/>
      <meta http-equiv="content-type" content="text/html;" />
      <meta name="author" content="La FNOC" />
      <link rel="stylesheet" type="text/css" href="../view/design/style.css" />
    </head>

    <body>
      <?php ComposantsVue::creationHeader(); ?>

      <!-- >Choix du nombre d'article -->
      <form class="choixNbArticle" action="../controler/afficherListeArticles.ctrl.php?categorie=<?=$catCourante?>" method="POST">
       <fieldset>
        <label for="name">Nombre d'article présent sur la page :</label>
        <input type="number" id="nbArticle" name="nbArticle" value="<?=$nbArticle?>" size = "2">
         <input type="submit" value=" Valider " size = "10">
       </fieldset>
       <!--Affichage des articles-->
       <?php
        if ($nbArticle > sizeof($liste)) $nbArticle = sizeof($liste);
        for ($i=0; $i < $nbArticle; $i++) {
         // code...
        //each ($liste as $key => $value):
         ComposantsVue::creationUnArticle($liste[$i],$chemin);
       } //endforeach; ?>
      <footer>

      </footer>
    </body>
</html>
