      <html lang="en" dir="ltr">
        <head>
          <meta charset="utf-8">
          <meta name="viewport" content="initial-scale=1, width=device-width" />
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

          <link rel="stylesheet" type="text/css" href="../view/design/connexion.view.css" media="screen"/>
          <title>FNOC - Connexion</title>
        </head>
        <body>
          <header>
            <img src="../view/design/fnoc.png" alt="">
          </header>
          <form class="" action="../controler/seConnecter.ctrl.php" method="post">
            <fieldset>

              <h2>Identifiez-vous</h2>
              <h3><?=$erreur = $erreur ?? ""?></h3>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="email">Mail</span>
                </div>
                <input type="email" name="email" class="form-control" aria-label="Default" aria-describedby="mail" required>
              </div>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="mdp">Mot de passe</span>
                </div>
                <input type="password" name="mdp" class="form-control" aria-label="Default" aria-describedby="motDePasse" required>
              </div>

              <p><button type="submit" class="btn btn-dark">Connexion</button></p>

            </fieldset>
            <a href="../controler/faireInscription.ctrl.php?PATH_INFO=../view/connexion.view.php"><p>S'inscrire</p></a>
          </form>

        </body>
      </html>
