<?php

    // Un Utilisateur
    class Utilisateur {
        private $nom;
        private $prenom;

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
    }

?>
