<?php
  require_once("../model/DAO.class.php");
  require_once("../framework/view.class.php");
  session_start();
  $dao = new DAO();
  $vue = new  View();
  //Durée du cookie
  $temps = time() +3*24*3600;
//Vérifieque les attribut de la session $existe
//Si oui on lance l'acceuil
//Si non on enregistre les informations pour crée
//un nouvelle utilisateur et session
  if (isset($_SESSION['email'])&& isset($_SESSION['mdp'])){
    $vue->display("../controler/afficherAccueil.ctrl.php");
  }
  else{
    if (count($_POST) == 2) { //Vérifie qu'il y a assez d'éléments envoyés
      $verif = $dao->MembreExistant($_POST['email'],$_POST['mdp']);
      if($verif == DAO::$MEMBRE_EXISTE) {//valeurs correct
        //Création des parametre de la session
        $_SESSION['mdp'] = $_POST['mdp'];
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
}
