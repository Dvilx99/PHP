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

      <p>Vous êtes sur le point d'acheter cet article :</p>
      <?php
        echo $article->getLibelCours();
        echo '<img src="/design/imagesArticles/'.$article->getImage().'">';
      ?>

      <footer>

      </footer>
    </body>
</html>
