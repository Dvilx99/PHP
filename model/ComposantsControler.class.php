<?php
class ComposantsControler{
  static public function initSession(string $email, string $mdp){
    session_start();
    $_SESSION['isConnected'] = "yes";
    $_SESSION['email'] = $email;
    $_SESSION['mdp'] = $mdp;
    $_SESSION['nbArticle'] = 5;
  }
}
