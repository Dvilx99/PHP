<?php

    // Un Utilisateur
    class Utilisateur {
        private $nom;
        private $prenom;
        private $email;
        private $mdp;
        //Getters
        function getNom() : string{
          return $this->nom;
        }
        function getPrenom() : string {
          return $this->prenom;
        }
        function getNomComplet() : string {
          return $this->prenom." ".$this->nom;
        }
        function getEmail() : string{
          return $this->$email;
        }
        function getMdp() : string {
          return $this->mdp;
        }
    }

?>
