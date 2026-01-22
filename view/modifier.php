<?php 
session_start();
if(!isset($_SESSION['nom_facebook'])){
    header("location: ../index.php");
}


$membre =$data_acceuil->edit();

 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification</title>
    <link rel="stylesheet" href="http://localhost/club_informatique/public/css/bootstrap.css">
    <link rel="stylesheet" href="http://localhost/club_informatique/public/css/icon.css">
</head>

<body>



    <nav class="navbar navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">M.info</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar"
                aria-labelledby="offcanvasDarkNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Menu</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link active text-dark" aria-current="page"
                                href="../views/acceuil/acceuil.php">Accueil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="#">Link</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-danger"
                                href="http://localhost/club_informatique/index.php?action=deconnexion"
                                onclick=" return confirm('Êtes-vous sûr de vouloir vous déconnecter ?');">Deconnexion</a>
                        </li>
                    </ul>
                    <form class="d-flex mt-3" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" />
                        <button class="btn btn-success" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </div>
    </nav>


    <div class="container" style="margin: 70px;">
        <div class="row">
            <div class="col">
                <h1 class="text-center">Modifier un membre</h1>
                <form action="http://localhost/club_informatique/index.php?action=update" method="post"
                    style=" max-width : 400px;" class="mx-auto">
                    <input class="form-control" type="hidden" name="id" value="<?php echo $membre['id']; ?>">
                    <div class="form-group">
                        <label class="form-label" for="nom">Nom:</label>
                        <input class="form-control" type="text" name="nom" value="<?php echo $membre['nom']; ?>"
                            required>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="prenom">Prénom:</label>
                        <input class="form-control" type="text" name="prenom" value="<?php echo $membre['prenom']; ?>"
                            required>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="age">Âge:</label>
                        <input class="form-control" type="number" name="age" value="<?php echo $membre['age']; ?>"
                            required>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="email">Email:</label>
                        <input class="form-control" type="email" name="email" value="<?php echo $membre['email']; ?>"
                            required>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="nom_facebook">Nom Facebook:</label>
                        <input class="form-control" type="text" name="nom_facebook"
                            value="<?php echo $membre['nom_facebook']; ?>" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="genre">Genre:</label>
                        <select class=" form-select" name="genre" required>
                            <option value="<?= $membre['genre'] == 'masculin' ? 'masculin' : 'féminin'; ?>"
                                <?php echo $membre['genre'] == 'masculin' ? 'selected' : ''; ?>>
                                Masculin
                            </option>
                            <option value="<?= $membre['genre'] == 'féminin' ? 'féminin' : 'masculin'; ?>"
                                <?php echo $membre['genre'] == 'féminin' ? 'selected' : ''; ?>>
                                Féminin
                            </option>
                        </select>
                    </div>

                    <div class="form-group mt-3">
                        <a href="http://localhost/club_informatique/index.php?page=annulermodification"
                            class="btn btn-secondary">Annuler</a>
                        <input type="submit" class=" btn btn-success" name="modifier" value="Modifier">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>

<script src="http://localhost/club_informatique/public/js/bootstrap.js"></script>
<script src="http://localhost/club_informatique/public/js/icon.js"></script>
</body>

</html>