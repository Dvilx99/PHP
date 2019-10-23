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
        <h1>Votre panier</h1>
      </header>
      <form class="" action="../controler/afficherFinCommande.ctrl.php" method="post">
      <?php
      foreach($monPanier as $article){
        echo'<article class="">';
        echo'<h2>'.$article->getLibelCours().'</h2>';
        echo'<img src="../view/design/'.$article->getImage().'" alt="">';
        echo '<p>'.$article->getPrix().'€</p>';
        echo'</article>';
      }
      ?>
      <p><button type="submit" class="btn btn-dark">Procéder au paiement</button></p>
      </form>
      <footer>

      </footer>
    </body>
</html>
