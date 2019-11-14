<?php require_once("../model/ComposantsVue.class.php"); ?>
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
        <h2>Voici votre panier <?php echo $user->getNom()." ".$user->getPrenom();?></h2>
      <form class="" action="../view/erreur.view.php">
      <?php
      foreach($panier as $key => $article)
          ComposantsVue::creationUnArticle($article, $image);
      ?>
      <h3>Prix total : <?=$prixTotal?>€</h3>
      <p><button type="submit" class="btn btn-dark">Procéder au paiement</button></p>
      </form>
      <footer>

      </footer>
    </body>
</html>
