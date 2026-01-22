<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Se connecter</title>
    <link rel="stylesheet" href="http://localhost/club_informatique/public/css/bootstrap.css" />
    <link rel="stylesheet" href="http://localhost/club_informatique/public/css/icon.css" />
    <link rel="stylesheet" href="http://localhost/club_informatique/public/css/auth.css" />
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="http://localhost/club_informatique/index.php?action=connexion" method="post">
                    <h1 class="text-center text-white">Se connecter</h1>
                    <?php 
                    if (isset($_GET['erreur']) && $_GET['erreur'] == true ) : ?>
                    <i class=" text-danger">mot de passe incorect</i> <?php endif ?> <div class="form-group mt-3">
                        <label for="nom" class="text-white">Nom d'Utilisateur</label>
                        <input type="text" class="form-control mt-1" id="nom" name="nom_facebook"
                            placeholder="Entrez votre nom d'utilisateur" required />
                    </div>
                    <div class="form-group mt-3">
                        <label for="motdepasse" class="text-white">Mot de passe</label>
                        <input type="password" class="form-control mt-1" id="motdepasse" name="motdepasse"
                            placeholder="Entrez votre mot de passe" required />
                    </div>
                    <div class="form-group mt-3">
                        <button type="submit" class="btn btn-primary w-100" name="connexion">Connexion</button>
                    </div>
                    <div class="mt-1">
                        <small class="text-white">
                            Vous n'avez pas de compte?
                            <a href="http://localhost/club_informatique/view/inscription1.php">Inscrivez-vous
                                ici</a>
                        </small>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>