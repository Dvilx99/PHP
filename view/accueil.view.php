<html>
  <head>
      <title>La FNOC</title>
      <meta charset="UTF-8"/>
      <meta http-equiv="content-type" content="text/html;" />

      <link rel="stylesheet" type="text/css" href="../view/design/style.css" />
    </head>

    <body>
      <header>
        <h1>la FNOC</h1>
        <div id="menu">
        	<ul class="niveau1">
        		<li>
        			<a href="#">Chasse</a>
        			<ul class="niveau2">
        				<li><a href="#">Vêtements de chasse</a></li>
        				<li><a href="#">Chaussures & bottes</a></li>
        				<li><a href="#">Accessoires</a></li>
                <li><a href="#">Accessoire pour chien</a></li>
                <li><a href="#">Munitions, Accessoires de l'arme</a></li>
        			</ul>
        		</li>
        		<li>
        			<a href="#">Echec</a>
        			<ul class="niveau2">
                <li><a href="#">Pieces</a></li>
        				<li><a href="#">Echequier</a></li>
        				<li><a href="#">Livres sur les echecs</a></li>
              </ul>
        		</li>
        		<li>
        			<a href="#">Rugby</a>
        			<ul class="niveau2">
        				<li><a href="#">Ballons et Accessoires</a></li>
        				<li><a href="#">Vêtements de rugby</a></li>
        				<li><a href="#">Haut de rugby</a></li>
                <li><a href="#">Bas de rugby</a></li>
                <li><a href="#">Crampons de rugby</a></li>
        			</ul>
        		</li>
        		<li>
        			<a href="#">Tennis de table</a>
        			<ul class="niveau2">
        				<li><a href="#">Tables et Housses</a></li>
        				<li><a href="#">Raquettes & Bois et revêtements</a></li>
        				<li><a href="#">Balles</a></li>
                <li><a href="#">Filets</a></li>
        			</ul>
        		</li>
            <li>
        			<a href="#">Accueil</a>
        		</li>
        	</ul>
        </div>

      </header>

      <?php foreach ($articles as $key => $value): ?>
        <article class="">
            <h2><?=$value->getLibelCours()?></h2>
            <a href="../controler/afficherArticle.ctrl.php?ref=<?=$value->getRef()?>"><img src="<?=$config['images_path'].$value->getImage()?>" alt=""></a>
            <h2> article : <?=$value->getPrix()?>€</h2>
    </article>
 <?php endforeach; ?>
      <footer>

      </footer>
    </body>
</html>
