<?php require_once("../framework/ComposantsVue.class.php"); ?>
<html>
  <head>
      <title>La FNOC</title>
      <meta charset="UTF-8"/>
      <meta http-equiv="content-type" content="text/html;" />
      <meta name="author" content="La FNOC" />
      <link rel="stylesheet" type="text/css" href="../view/design/style.css" />
    </head>

    <body>
      <header>
        <h1>la FNOC</h1>
        <?php ComposantsVue::creationHeader(); ?>
        <h1>Voici votre panier <?=$user->getNomComplet()?></h1>
      <form class="" action="../controler/afficherFinCommande.ctrl.php" method="post">
      <?php
      foreach($liste as $key => $article)
          ComposantsVue::creationUnArticle($article,$chemin);
      }
      ?>
      <p><button type="submit" class="btn btn-dark">Procéder au paiement</button></p>
      </form>
      <footer>

      </footer>
    </body>
</html>
