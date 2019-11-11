<?php
require_once("../model/DAO.class.php");
class ComposantsVue{
  //On a tenter de factorier cette fonction, mais
  //Du a leurs nombreuse sous-sous-sous-...-categrorie nous n'avons pas réussi a donner une fonction correcte
  //Nous mettons donc un affichage par agregat qui n'est pas optimisé
  static public function creationHeader(){
    ?>
      <h1>la FNOC</h1>
      <div id="menu">
        <ul class="niveau1">
          <li>
            <a href="../controler/afficherListeArticles.ctrl.php">Accueil</a>
          </li>
          <li>
            <a href="../controler/afficherListeArticles.ctrl.php?categorie=12">Chasse</a>
            <ul class="niveau2">
              <li><a href="../controler/afficherListeArticles.ctrl.php?categorie=13">Vêtements de chasse</a></li>
              <li><a href="../controler/afficherListeArticles.ctrl.php?categorie=14">Chaussures & bottes</a></li>
              <li><a href="../controler/afficherListeArticles.ctrl.php?categorie=15">Accessoires</a></li>
              <li><a href="../controler/afficherListeArticles.ctrl.php?categorie=16">Accessoire pour chien</a></li>
              <li><a href="../controler/afficherListeArticles.ctrl.php?categorie=17">Munitions, Accessoires de l\'arme</a></li>
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
            <a href="../controler/deconnexion.ctrl.php">Déconnexion</a>
          </li>
        </ul>
      </div>
    </header>

   <?php }

  static public function creationUnArticle(Article $value,string $image_path){
    ?>
    <article class="">
        <h2><?=$value->getLibelCours()?></h2>
        <a href="../controler/afficherArticle.ctrl.php?ref=<?=$value->getRef()?>">
          <p><img src="<?=$image_path?><?=$value->getImage()?>" alt=""></a></p>
        <h2><?=$value->getPrix()?>€</h2>
    </article> <?php
  }
}
