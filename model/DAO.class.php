<?php

  require_once("../model/Categorie.class.php");
  require_once("../model/Article.class.php");
  require_once("../model/Utilisateur.class.php");
  // Le Data Access Object
  // Il représente la base de donnée
  class DAO {

    //Reponse dans membre existant
    public static $MEMBRE_EXISTE =1;
    public static $EMAIL_MANQUANT = 2;
    public static $MDP_MANQUANT =3;

    // L'objet local PDO de la base de donnée
    private $db;
    // Le type, le chemin et le nom de la base de donnée
    private $database = 'sqlite:../data/fnoc.db';

    // Constructeur chargé d'ouvrir la BD
    function __construct() {
        try {
          $this->db = new PDO($this->database);
        }
        catch (PDOException $e){
          die("erreur de connexion:".$e->getMessage());
        }
    }


    // Accès aux n premiers articles
    // Cette méthode retourne un tableau contenant les n permier articles de
    // la base sous la forme d'objets de la classe Article.
    function firstN(int $n) : array {
        $req = "SELECT * FROM article LIMIT $n";
        $statement = $this->db->query($req);
        $liste = $statement->fetchAll(PDO::FETCH_CLASS, "article");
        return $liste;
    }

    // Acces à une catégorie
    // Retourne un objet de la classe Categorie connaissant son identifiant
    function getCat(int $id) : Categorie {
        $req = "SELECT * FROM categorie WHERE id = $id";
        $statement = $this->db->query($req);
        $liste = $statement->fetchAll(PDO::FETCH_CLASS, "categorie");
        return $liste[0];
    }

    function getArticle(int $ref) : Article {
      $req = "SELECT * FROM article WHERE ref = $ref";
      $statement = $this->db->query($req);
      $liste = $statement->fetchAll(PDO::FETCH_CLASS, "article");
      return $liste[0];
    }

    function getArticlesParCategorie(int $int) : array {
      $categories = array();
      $categories[] = $this->getCat($int);
      $test = array();
      while ($test != $categories) {
        $test = $categories;

        foreach ($test as $categorie) {
          $sousCategories = $this->getSousCategorie($categorie->getId());

          foreach ($sousCategories as $sousCategorie) {
            if (!in_array($sousCategorie, $categories)) {
              array_push($categories, $sousCategorie);
            }
          }

        }
      }

      $lesArticles = array();
      foreach ($categories as $categorie) {
        $int = $categorie->getId();
        $req = "SELECT * FROM article WHERE categorie = $int";
        $statement = $this->db->query($req);
        $articles = $statement->fetchAll(PDO::FETCH_CLASS, "article");

        foreach ($articles as $article) {
          if ($article != null) {
            array_push($lesArticles, $article);
          }
        }

      }
      return $lesArticles;
    }

    function getSousCategorie(string $pere) : array{
      $req = "SELECT * FROM categorie WHERE pere=$pere";
      $statement = $this->db->query($req);
      $liste = $statement->fetchAll(PDO::FETCH_CLASS, "categorie");
      return $liste;
    }

    function ajoutUtilisateur(string $nom, string $prenom, string $email, string $mdp) {
      $req = ("SELECT email FROM utilisateur WHERE email = '$email'");
      $statement = $this->db->query($req);
      $existingUser = $statement->fetchAll(PDO::FETCH_CLASS,'Utilisateur');
      if (count($existingUser)!=0) {
        return 0;
      } else {
        $utilisateur = new Utilisateur($nom, $prenom, $email, $mdp);
        $serialized = serialize($utilisateur);
        $stmt = $this->db->prepare("INSERT INTO utilisateur(nom, prenom, email, mdp) VALUES (:nom, :prenom, :email, :mdp)");
        $stmt->execute(array(
          'nom' => $nom,
          'prenom' => $prenom,
          'email' => $email,
          'mdp' => $mdp
        ));
        return 1;
      }
    }

    //renvoie l'utilisarteur qui est associé a l'email
    function getUtilisateur(string $email) : Utilisateur {
      $req = "SELECT * FROM utilisateur WHERE email = '$email'";
      $statement = $this->db->query($req);
      $monUser = $statement->fetchAll(PDO::FETCH_CLASS,'utilisateur');
      return $monUser[0];
    }
    //ajoute un Panier a la base de données
    function ajoutPanier(string $utilisateur, string $article) {
      //$panier = new Panier($utilisateur, $article);
      //$serialized = serialize($panier);
      $stmt = $this->db->prepare("INSERT INTO panier(utilisateur,article) VALUES (:utilisateur, :article)");
      $stmt->execute(array(
        'utilisateur' => $utilisateur,
        'article' => $article
      ));
      return 1;
    }
    //Supprime un panier à la base de données
    function supprimePanier(string $utilisateur, string $article) {
      $req = "DELETE FROM panier WHERE utilisateur = '$utilisateur' and article = $article";
      return $this->db->exec($req);
    }

    function retirerPanier(string $utilisateur) {
      $req = "DELETE FROM panier where utilisateur = '$utilisateur'";
      return $this->db->exec($req);
    }

    //donne le Panier de l'utilisateur
    function getPanier(string $utilisateur) : array {
      $req = "SELECT * FROM article WHERE ref IN (SELECT article FROM panier WHERE utilisateur = '$utilisateur')";
      $statement = $this->db->query($req);
      $articles = $statement->fetchAll(PDO::FETCH_CLASS, 'article');
      return $articles;
    }

    function MembreExistant(string $email, string $mdp) {
      $req = ("SELECT email FROM utilisateur WHERE email = '$email'");
      $statement = $this->db->query($req);
      $existingMail = $statement->fetchAll(PDO::FETCH_ASSOC);
      $mail = $existingMail[0] ?? "";
      if ($mail == "") {
        return self::$EMAIL_MANQUANT;
      } else {
        $semi_User = $this->getUtilisateur($email);
        if(password_verify ($mdp ,$semi_User->getMdp())) {
          return self::$MEMBRE_EXISTE;
        } else {
          return self::$MDP_MANQUANT;
        }
      }
    }

  }
