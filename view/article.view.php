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
      <div class="">
        <img src="<?=$config['images_path']?><?=$article->getImage()?>" alt="">
      </div>
      <div class="">
        <p>ref : <?=$article->getRef()?></p>
        <h2><?=$article->getLibelCours()?></h2>
        <p><?=$article->getPrix()?></p>
        <p><?=$article->getDescription()?></p>
        <input type="button" value="Ajouter au panier">
      </div>
      <footer>

      </footer>
    </body>
</html>
