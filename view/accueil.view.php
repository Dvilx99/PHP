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
      </header>

      <?php foreach ($articles as $key => $value): ?>
        <article class="">
            <h2><?=$value->getLibelCours()?></h2>
            <a href="../controler/afficherArticle.ctrl.php?ref=<?=$value->getRef()?>">
              <img src="<?=$chemin?><?=$value->getImage()?>" alt=""></a>
            <h2><?=$value->getPrix()?>€</h2>
            <button type="button" class="btn btn-primary">Ajouter au panier</button>
    </article>
 <?php endforeach; ?>
      <footer>

      </footer>
    </body>
</html>
