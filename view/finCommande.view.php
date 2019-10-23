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
        <h1>La FNOC</h1>
      </header>

      <p>Vous êtes sur le point d'acheter ces articles :</p>

      <?php
        $prixFinal = 0;
        foreach ($panier as $key => $value):
      ?>
      <article class="">
          <h2><?=$value->getLibelCours()?></h2>
          <img src="../view/design/imagesArticles/<?=$value->getImage()?>" alt="">
          <h2> article : <?=$value->getPrix()?>€</h2>
      </article>
      <?php
        $prixFinal += $value->getPrix();
        endforeach;
      ?>
      <p>Total : <?= $prixFinal ?></p>

      <footer>

      </footer>
    </body>
</html>
