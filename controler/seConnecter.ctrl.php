<?php
  require_once("../model/DAO.class.php");
  require_once("../framework/view.class.php");
  require_once("../model/ComposantsControler.class.php");
  $dao = new DAO();
  $vue = new  View();

  //Vérifie que les attributs de la session existe
  //Si oui on lance l'accueil
  //Si non on enregistre les informations pour crée
  //un nouvelle utilisateur et creer une session
  if (isset($_SESSION['isConnected'])){
    $vue->display("../controler/afficherListeArticles.ctrl.php");
  }
  else{
    if (count($_POST) == 2) { //Vérifie qu'il y a assez d'éléments envoyés
      $verif = $dao->MembreExistant($_POST['email'],$_POST['mdp']);
      if($verif == DAO::$MEMBRE_EXISTE) {//valeurs correct
        //Création des parametres de la session
        ComposantsControler::initSession($_POST['email'],$_POST['mdp']);
        $vue->assign('sessionOuverte', "yes");
        $vue->display("../controler/afficherListeArticles.ctrl.php");
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

}
