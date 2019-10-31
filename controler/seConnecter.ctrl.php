<?php
  require_once("../model/DAO.class.php");
  require_once("../framework/view.class.php");
  $dao = new DAO();
  $vue = new  View();
  //Durée du cookie
  $temps = time() +3*24*3600;
  if (count($_POST) == 2) { //Vérifie qu'il y a assez d'éléments envoyés
    $verif = $dao->MembreExistant($_POST['email'],$_POST['mdp']);
    if($verif == DAO::$MEMBRE_EXISTE) {//valeurs correct
      //Création cookie + sécurisation en le rendant inaccessible par JavaScript
      setCookie('email',$_POST['email'],$temps,null,null,false);
      setCookie('mdp',$_POST['mdp'],$temps,null,null,false);
        $vue->display("../controler/afficherAccueil.ctrl.php");
    } else if ($verif == DAO::$EMAIL_MANQUANT) { // 2 = email inexistant
      $erreur = "Cette adresse mail n'existe pas.";
      $vue->assign('erreur', $erreur);
      $vue->display("../view/connexion.view.php");
    } else if ($verif == DAO::$MDP_MANQUANT) { // 3 = mot de passe incorrect
      $erreur = "Mot de passe incorrect.";
      $vue->assign('erreur', $erreur);
      $vue->display("../view/connexion.view.php");
    }
  } else {
    $erreur = "Il manque des informations pour pouvoir se connecter.";
    $vue->assign('erreur', $erreur);
    $vue->display("../view/connexion.view.php");
  }
