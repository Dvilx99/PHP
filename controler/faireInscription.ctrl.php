<?php
  require_once("../model/DAO.class.php");
  require_once("../framework/view.class.php");
  $dao = new DAO();
  $vue = new  View();

  $path = $_GET['PATH_INFO'] ?? "";

  if ($path == "../view/connexion.view.html") {
    $erreur = "";
    $vue->assign('erreur', $erreur);
    $vue->display("../view/inscription.view.php");
  } else {
    if (count($_POST) == 4) { //Vérifie qu'il y a assez d'éléments envoyés
      if($dao->ajoutUtilisateur($_POST['nom'],$_POST['prenom'],$_POST['email'],$_POST['mdp'])) {
          $vue->display("../view/accueil.view.php");
      } else {
        $erreur = "Cette adresse mail a déjà été utilisé";
      }
    } else {
      $erreur = "Il manque des informations pour poursuivre l'inscription";
  }
  $vue->assign('erreur', $erreur);
  $vue->display("../view/inscription.view.php");
}
