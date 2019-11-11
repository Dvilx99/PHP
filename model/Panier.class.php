<?php

class Panier{
    private $email; //email referant a l'utilisateur
    private $ref; //ref referant à l'article

    function __construct(string $emaill,int $reff){
      $this->email = $emaill;
      $this->ref = $reff;
    }
    function getEmail(): string{
      return $this->$email;
    }
    function getRef(): int{
      return $this->ref;
    }
}
