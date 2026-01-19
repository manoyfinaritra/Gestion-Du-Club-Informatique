<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Se connecter</title>
    <link rel="stylesheet" href="./assets/css/bootstrap.css" />
    <link rel="stylesheet" href="./assets/css/icon.css" />
    <link rel="stylesheet" href="assets/css/auth.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="./data_php/data.php" method="post">
                    <h1 class="text-center text-white">Se connecter</h1>
                    <?= isset($_GET['message']) ? '<p class="text-danger">'.$_GET['message'].'</p>' : '' ?>
                    <div class="form-group mt-3">
                        <label for="nom" class="text-white">Nom d'Utilisateur</label>
                        <input type="text" class="form-control mt-1" id="nom" name="nom_facebook"
                            placeholder="Entrez votre nom d'utilisateur" required />
                    </div>
                    <div class="form-group mt-3">
                        <label for="motdepasse" class="text-white">Mot de passe</label>
                        <input type="password" class="form-control mt-1" id="motdepasse" name="motdepasse"
                            placeholder="Entrez votre mot de passe" required />
                    </div>
                    <div class="form-group mt-5">
                        <button type="submit" class="btn btn-primary w-100" name="connexion">Connexion</button>
                    </div>
                    <div class="mt-1">
                        <small class="text-white">
                            Vous n'avez pas de compte?
                            <a href="inscription.php">Inscrivez-vous ici</a>
                        </small>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
</body>

</html>