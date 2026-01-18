<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>S'inscrire</title>
    <link rel="stylesheet" href="./assets/css/bootstrap.css">
    <link rel="stylesheet" href="./assets/css/icon.css">
    <link rel="stylesheet" href="assets/css/auth.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="data_php/data.php" method="post">
                    <h1 class="text-center text-white">S'inscrire</h1>
                    <?= isset($_GET['message']) ? '<p class="text-white">'.$_GET['message'].'</p>' : '' ?>
                    <div class="form-group mt-3">
                        <label for="nom" class="text-white">Nom :</label>
                        <input type="text" class="form-control mt-1" id="nom" name="nom" placeholder="Entrez votre nom"
                            required>
                    </div>
                    <div class="form-group mt-3">
                        <label for="text" class="text-white">Prenom :</label>
                        <input type="text" class="form-control mt-1" id="prenom" name="prenom"
                            placeholder="Entrez votre prénom" required>
                    </div>
                    <div class="form-group mt-3">
                        <label for="text" class="text-white">Age :</label>
                        <input type="text" class="form-control mt-1" id="age" name="age" placeholder="Entrez votre âge"
                            required>
                    </div>
                    <div class="form-group mt-3">
                        <label for="genre" class="text-white">Genre :</label>
                        <select name="genre" id="genre" class="form-control mt-1" required>
                            <option disabled value="">Genre</option>
                            <option value="Homme">Homme</option>
                            <option value="Femme">Femme</option>
                        </select>

                        <div class="form-group mt-3">
                            <label for="nom_facebook" class="text-white">Nom facebook : </label>
                            <input type="text" class="form-control mt-1" id="nom_facebook" name="nom_facebook"
                                placeholder="Entrez votre nom facebook" required>
                        </div>

                        <div class="form-group mt-3">
                            <label for="motdepasse" class="text-white">Mot de passe</label>
                            <input type="password" class="form-control mt-1" id="motdepasse" name="motdepasse"
                                placeholder="Entrez votre mot de passe">
                        </div>
                        <div class="form-group mt-3">
                            <button type="submit" class="btn btn-primary w-100" name="inscription">Inscription</button>
                        </div>
                        <div class="mt-1">
                            <small class="text-white">Vous avez deja un compte? <a
                                    href="index.php">Connexion</a></small>
                        </div>
                </form>
            </div>
        </div>
    </div>

    <script src="./assets/js/jquery.js"></script>
    <script src="./assets/js/bootstrap.js"></script>
    <script src="./assets/js/icon.js"></script>
</body>

</html>