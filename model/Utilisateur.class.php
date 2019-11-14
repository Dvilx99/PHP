<?php

    // Un Utilisateur
    class Utilisateur {
        private $nom;
        private $prenom;
        private $email;
        private $mdp;

        /*function __construct(string $nom,string $prenom,string $email,string $mdp) {
          $this->nom = $nom;
          $this->prenom = $prenom;
          $this->email = $email;
          $this->mdp = $mdp;
        }*/

        //Getters
        function getNom() : string{
          return $this->nom;
        }

        function getPrenom() : string {
          return $this->prenom;
        }

        function getEmail() : string {
          return $this->email;
        }

        function getMdp() : string {
          return $this->mdp;
        }
    }
