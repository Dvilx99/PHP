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
      <nav>
    <!-- Bouton de retour au début de la liste -->
    <a href="../controler/afficherListeArticles.ctrl.php?categorie=0"><img src="../view/design/home.jpeg"/></a>
    <!-- Bouton de retour à la page précédente -->
    <a href="../controler/afficherListeArticles.ctrl.php?ref=<?=$prevRef?>"><img src="../view/design/flecheG.png"/> </a>
    <!-- Bouton pour passer à la page suivante -->
    <a href="../controler/afficherListeArticles.ctrl.php?ref=<?=$nextRef?>"><img src="../view/design/flecheD.png"/></a>
  </nav>
      <!-- >Choix du nombre d'article -->
      <form class="choixNbArticle" action="../controler/afficherListeArticles.ctrl.php?categorie=<?=$catCourante?>" method="POST">
       <fieldset>
        <label for="name">Nombre d'article présent sur la page:</label>
        <input type="number" id="nbArticle" name="nbArticle" value="<?=$_SESSION['nbArticle']?>" size = "2">
         <input type="submit" value=" Valider " size = "10">
       </fieldset>
       <!--Affichage des articles-->
       <?php foreach ($liste as $key => $value): ?>
         <?php ComposantsVue::creationUnArticle($value,$chemin); ?>
       <?php endforeach; ?>
      <footer>

      </footer>
    </body>
</html>
