<html>
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="initial-scale=1, width=device-width" />
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

      <link rel="stylesheet" type="text/css" href="../view/design/connexion.view.css" media="screen"/>
      <title>FNOC - Fin commande</title>
    </head>

    <body>
      <header>
        <img src="../view/design/fnoc.png" alt="">
      </header>

      <form class="" action="../controler/finCommande.ctrl.php" method="post">
        <fieldset>
          <h3>Montant total de la commande : <?=$_GET['prixTotal']?>€</h3>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="nom">Numéro de carte</span>
            </div>
            <input type="text" name="nom" class="form-control" aria-label="numero" aria-describedby="numero" required>
          </div>

          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="prenom">Date d'expiration</span>
            </div>
            <input type="text" class="form-control" aria-label="Default" aria-describedby="date" name="date" required>
          </div>

          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="email">Nom du porteur de la carte</span>
            </div>
            <input type="text" class="form-control" aria-label="Default" aria-describedby="email" name ="nom" required>
          </div>

          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="motDePasse">Code de sécurité</span>
            </div>
            <input type="password" class="form-control" aria-label="Default" aria-describedby="code" name="code" required>
          </div>
            <button type="submit" class="btn btn-dark">Valider</button></p>
        </fieldset>
      </form>
      <footer>

      </footer>
    </body>
</html>
