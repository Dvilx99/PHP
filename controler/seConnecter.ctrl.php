<?php
  require_once("../model/DAO.class.php");
  require_once("../framework/view.class.php");
  $dao = new DAO();
  $vue = new  View();

  if (count($_POST) == 2) { //Vérifie qu'il y a assez d'éléments envoyés
    $verif = $dao->MembreExistant($_POST['email'],$_POST['mdp']);
    if($verif == 1) {
        $vue->display("../controler/afficherAccueil.ctrl.php");
    } else if ($verif == 2) { // 2 = email inexistant
      $erreur = "Cette adresse mail n'existe pas.";
      $vue->assign('erreur', $erreur);
      $vue->display("../view/connexion.view.php");
    } else if ($verif == 3) { // 3 = mot de passe incorrect
      $erreur = "Mot de passe incorrect.";
      $vue->assign('erreur', $erreur);
      $vue->display("../view/connexion.view.php");
    }
  } else {
    $erreur = "Il manque des informations pour pouvoir se connecter.";
    $vue->assign('erreur', $erreur);
    $vue->display("../view/connexion.view.php");
  }
