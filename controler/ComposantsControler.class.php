<?php
class ComposantsControler{
  static public function initSession(string $email, string $mdp){
    $_SESSION['isConnected'] = true;
    $_SESSION['email'] = $email;
    $_SESSION['mdp'] = $mdp;
    $_SESSION['nbArticle'] = 5;
  }
}
