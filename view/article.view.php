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
      <?php  ComposantsVue::creationHeader(); ?>
      <article class="articleSeul">
        <h2><?=$article->getLibelCours()?></h2>
        <img src="<?=$chemin?><?=$article->getImage()?>" alt="">
        <p><strong>Ref : <?=$article->getRef()?></strong></p>
        <p><strong>Description :</strong> <br> <?=$article->getDescription()?></p>
        <p><strong>Prix : <?=$article->getPrix()?>€</strong> </p>

        <form class="" action="../controler/modifPanier.ctrl.php?" method="get">
          <input type="hidden" name="ref" value= <?=$ref?>>
          <input type="hidden" name="action" value= "ajout" >
          <button type="submit" value="Ajouter au panier" class="btn btn-primary">Ajouter au panier</button>
        </form>

      </article>


      <footer>

      </footer>
    </body>
</html>
