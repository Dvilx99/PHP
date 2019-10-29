<html>
  <head>
      <title>La FNOC - Article</title>
      <meta charset="UTF-8"/>
      <meta http-equiv="content-type" content="text/html;" />
      <meta name="author" content="La FNOC" />
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
      <link rel="stylesheet" type="text/css" href="../view/design/style.css" />


    </head>

    <body>
      <header>
        <h1>la FNOC</h1>
        <div id="menu">
        	<ul class="niveau1">
            <li>
              <a href="../controler/afficherAccueil.ctrl.php">Accueil</a>
            </li>
        		<li>
        			<a href="../controler/afficherListeArticles.ctrl.php?categorie=12">Chasse</a>
        			<ul class="niveau2">
        				<li><a href="../controler/afficherListeArticles.ctrl.php?categorie=13">Vêtements de chasse</a></li>
        				<li><a href="../controler/afficherListeArticles.ctrl.php?categorie=14">Chaussures & bottes</a></li>
        				<li><a href="../controler/afficherListeArticles.ctrl.php?categorie=15">Accessoires</a></li>
                <li><a href="../controler/afficherListeArticles.ctrl.php?categorie=16">Accessoire pour chien</a></li>
                <li><a href="../controler/afficherListeArticles.ctrl.php?categorie=17">Munitions, Accessoires de l'arme</a></li>
        			</ul>
        		</li>
        		<li>
        			<a href="../controler/afficherListeArticles.ctrl.php?categorie=18">Echec</a>
        			<ul class="niveau2">
                <li><a href="../controler/afficherListeArticles.ctrl.php?categorie=19">Pieces</a></li>
        				<li><a href="../controler/afficherListeArticles.ctrl.php?categorie=20">Echequier</a></li>
        				<li><a href="../controler/afficherListeArticles.ctrl.php?categorie=21">Livres sur les echecs</a></li>
              </ul>
        		</li>
        		<li>
        			<a href="../controler/afficherListeArticles.ctrl.php?categorie=1">Rugby</a>
        			<ul class="niveau2">
        				<li><a href="../controler/afficherListeArticles.ctrl.php?categorie=2">Ballons et Accessoires</a></li>
        				<li><a href="../controler/afficherListeArticles.ctrl.php?categorie=3">Vêtements de rugby</a></li>
        				<li><a href="../controler/afficherListeArticles.ctrl.php?categorie=4">Haut de rugby</a></li>
                <li><a href="../controler/afficherListeArticles.ctrl.php?categorie=5">Bas de rugby</a></li>
                <li><a href="../controler/afficherListeArticles.ctrl.php?categorie=6">Crampons de rugby</a></li>
        			</ul>
        		</li>
        		<li>
        			<a href="../controler/afficherListeArticles.ctrl.php?categorie=7">Tennis de table</a>
        			<ul class="niveau2">
        				<li><a href="../controler/afficherListeArticles.ctrl.php?categorie=8">Tables et Housses</a></li>
        				<li><a href="../controler/afficherListeArticles.ctrl.php?categorie=9">Raquettes & Bois et revêtements</a></li>
        				<li><a href="../controler/afficherListeArticles.ctrl.php?categorie=10">Balles</a></li>
                <li><a href="../controler/afficherListeArticles.ctrl.php?categorie=11">Filets</a></li>
        			</ul>
        		</li>
            <li>
        			<a href="../controler/afficherPanier.ctrl.php">Mon Panier</a>
        		</li>
            <li>
        			<a href="../view/connexion.view.php">Déconnexion</a>
        		</li>
        	</ul>
        </div>

      </header>
      <article class="articleSeul">
        <h2><?=$article->getLibelCours()?></h2>
        <img src="<?=$chemin?><?=$article->getImage()?>" alt="">
        <p><strong>Ref : <?=$article->getRef()?></strong></p>
        <p><strong>Description :</strong> <br> <?=$article->getDescription()?></p>
        <p><strong>Prix :<?=$article->getPrix()?>€</strong> </p>
        <button type="button" value="Ajouter au panier" class="btn btn-primary">Ajouter au panier</button>
      </article>


      <footer>

      </footer>
    </body>
</html>
