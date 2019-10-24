<html>
  <head>
      <title>FNOC - Connexion</title>
      <meta charset="UTF-8"/>
      <meta http-equiv="content-type" content="text/html;" />
      <meta name="author" content="La FNOC" />
      <link rel="stylesheet" type="text/css" href="../view/design/style.css" />
    </head>

    <body>
      <html lang="en" dir="ltr">
        <head>
          <meta charset="utf-8">
          <meta name="viewport" content="initial-scale=1, width=device-width" />
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

          <link rel="stylesheet" type="text/css" href="../view/design/connexion.view.css" media="screen"/>
          <title>SCR - Inscription</title>
        </head>
        <body>
          <header>
            <img src="../view/design/Fnac_Logo.png" alt="">
          </header>
          <form class="" action="../controler/faireInscription.ctrl.php" method="post">
            <fieldset>
              <h2>Inscrivez-vous</h2>
              <?=$erreur?>
              <?if($erreur)?>
              <div class="input-group mb-3">
                <h3>L'utilisateur existe déjà</h3>
                <?endif?>
              </div>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="nom">Nom</span>
                </div>
                <input type="text" name="nom" class="form-control" aria-label="Default" aria-describedby="nom" required>
              </div>

              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="prenom">Prénom</span>
                </div>
                <input type="text" class="form-control" aria-label="Default" aria-describedby="prenom" name="prenom" required>
              </div>

              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="mail">Mail</span>
                </div>
                <input type="email" class="form-control" aria-label="Default" aria-describedby="mail" name ="mail" required>
              </div>

              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="motDePasse">Mot de passe </span>
                </div>
                <input type="password" class="form-control" aria-label="Default" aria-describedby="motDePasse" name="mdp" required>
              </div>


                <button type="submit" class="btn btn-dark"> S'inscrire</button></p>

            </fieldset>
          </form>
        </body>
      </html>

      <footer>

      </footer>
    </body>
</html>
