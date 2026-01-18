<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./assets/css/bootstrap.css">
    <link rel="stylesheet" href="./assets/css/icon.css">
    <link rel="stylesheet" href="assets/css/connexion.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="data_php/data.php" method="post">
                    <h1 class="text-center text-white">Inscription</h1>
                    <?php if ($_GET['message']) {
                      echo '<p class="text-white"> ' . $_GET['message'] . ' </p>';
                    } ?>
                    <div class="form-group">
                        <label for="nom">Nom :</label>
                        <input type="text" class="form-control" id="nom" name="nom" placeholder="Entrez votre nom"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="text">Prenom :</label>
                        <input type="text" class="form-control" id="prenom" name="prenom"
                            placeholder="Entrez votre prénom" required>
                    </div>
                    <div class="form-group">
                        <label for="text">Age :</label>
                        <input type="text" class="form-control" id="age" name="age" placeholder="Entrez votre âge"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="genre">Genre :</label>
                        <select name="genre" id="genre" class="form-control" required>
                            <option disabled value="">Genre</option>
                            <option value="Homme">Homme</option>
                            <option value="Femme">Femme</option>
                        </select>

                        <div class="form-group">
                            <label for="nom_facebook">Nom facebook : </label>
                            <input type="text" class="form-control" id="nom_facebook" name="nom_facebook"
                                placeholder="Entrez votre nom facebook" required>
                        </div>

                        <div class="form-group">
                            <label for="motdepasse">Mot de passe</label>
                            <input type="password" class="form-control" id="motdepasse" name="motdepasse"
                                placeholder="Entrez votre mot de passe">
                        </div>
                        <div class="form-group mt-3">
                            <button type="submit" class="btn btn-primary" name="inscription">Inscription</button>
                        </div>
                        <div>
                            <p class="mt-3 text-white">Vous avez deja un compte? <a href="index.php">Connexion</a></p>
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