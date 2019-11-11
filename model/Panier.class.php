<?php

class Panier{
    private $user;
    private $article;

    function __construct($utilisateur,$articlee){
      $this->user = $utilisateur;
      $this->article = $articlee;
    }
    function getUser(): Utilisateur{
      return $this->user;
    }
    function getArticle(): Article{
      return $this->article;
    }
}
