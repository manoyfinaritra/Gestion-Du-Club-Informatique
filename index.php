<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="./assets/css/bootstrap.css" />
    <link rel="stylesheet" href="./assets/css/icon.css" />
    <link rel="stylesheet" href="assets/css/auth.css" />
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="" method="post">
                    <h1 class="text-center text-white">Connexion</h1>
                    <div class="form-group">
                        <label for="nom">Nom d'Utilisateur</label>
                        <input type="text" class="form-control" id="nom" name="nom"
                            placeholder="Entrez votre nom d'utilisateur" />
                    </div>
                    <div class="form-group">
                        <label for="motdepasse">Mot de passe</label>
                        <input type="password" class="form-control" id="motdepasse" name="motdepasse"
                            placeholder="Entrez votre mot de passe" />
                    </div>
                    <div class="form-group mt-3">
                        <button type="submit" class="btn btn-primary">Connexion</button>
                    </div>
                    <div>
                        <p class="mt-3 text-white">
                            Vous n'avez pas de compte?
                            <a href="inscription.php">Inscrivez-vous ici</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>