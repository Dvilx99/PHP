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
      <article class="">
        <h2><?=$article->getLibelCours()?></h2>
        <img src="<?=$chemin?><?=$article->getImage()?>" alt="">
        <p><?=$article->getDescription()?></p>
        <p>ref : <?=$article->getRef()?></p>

        <p><?=$article->getPrix()?></p>
      </article>

      </div>
      <div class="">


        <input type="button" value="Ajouter au panier">
      </div>
      <footer>

      </footer>
    </body>
</html>
