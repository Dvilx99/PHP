<?php
  require_once("../model/DAO.class.php");
  require_once("../framework/view.class.php");
  require_once("ComposantsControler.class.php");
  $dao = new DAO();
  $vue = new  View();

  $path = $_GET['PATH_INFO'] ?? "";

  if ($path == "../view/connexion.view.php") {
    $erreur = "";
    $vue->assign('erreur', $erreur);
    $vue->display("../view/inscription.view.php");
  } else {
    if (count($_POST) == 4) { //Vérifie qu'il y a assez d'éléments envoyés
      //Crypte le mdp
      do{
        $mdpCrypter = password_hash ($_POST['mdp'] , PASSWORD_BCRYPT);
      } while(!password_needs_rehash ($_POST['mdp'] , PASSWORD_BCRYPT));
      var_dump($dao->ajoutUtilisateur($_POST['nom'],$_POST['prenom'],$_POST['email'],$mdpCrypter));
      if($dao->ajoutUtilisateur($_POST['nom'],$_POST['prenom'],$_POST['email'],$mdpCrypter)) {
        //Affiche l'accueil et initialise la session
          ComposantsControler::initSession($_POST['email'],$_POST['mdp']);
          $vue->assign('sessionOuverte', "yes");
          $vue->display("../controler/afficherListeArticles.ctrl.php");
      } else {
        $erreur = "Cette adresse mail a déjà été utilisé";
        $vue->assign('erreur', $erreur);
        $vue->display("../view/inscription.view.php");
      }
    } else {
      $erreur = "Il manque des informations pour poursuivre l'inscription";
      $vue->assign('erreur', $erreur);
      $vue->display("../view/inscription.view.php");
    }
  }
