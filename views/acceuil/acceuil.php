<?php
session_start();
if (!isset($_SESSION['nom_facebook'])) {
    header("location: ../../index.php");
}
$nom_facebook = $_SESSION['nom_facebook'];

include "../../data_php/data.php";
$data = new Data();
if (isset($_SESSION['search_results'])) {
    $all_membres = $_SESSION['search_results'];
    
    // unset($_SESSION['search_results']);
} else {
    $all_membres = $data->Select_all_members();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../assets/css/bootstrap.css">
    <link rel="stylesheet" href="../../assets/css/icon.css">
    <link rel="stylesheet" href="../../assets/css/acceuil.css">
</head>

<body>

    <nav class="navbar navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <?php echo $nom_facebook; ?></a>
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
                            <a class="nav-link active text-dark" aria-current="page" href="acceuil.php">Accueil</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-danger" href="../../data_php/data.php?action=deconnexion"
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



    <div class=" container-fluid border" style=" margin-top : 70px">
        <div class="row">
            <div class="col">
                <h1 class=" text-center">Ajouter un membre</h1>
                <?= isset($_GET['message']) ? '<p class="text-dark">' . $_GET['message'] . '</p>' : '' ?>
                <form action="../../data_php/data.php" method="post">

                    <div class=" form-group">
                        <label for="nom" class=" form-label">Nom :</label>
                        <input type="text" class="form-control" id="nom" name="nom" placeholder="Entrer votre nom"
                            required>
                    </div>
                    <div class=" form-group">
                        <label for="prenom" class=" form-label">Prenon :</label>
                        <input type="text" class="form-control" id="prenom" name="prenom"
                            placeholder="Entrer votre prenom" required>
                    </div>
                    <div class=" form-group">
                        <label for="age" class=" form-label">Age :</label>
                        <input type="number" class="form-control" id="age" name="age" placeholder="Entrer votre age"
                            required>
                    </div>
                    <div class=" form-group">
                        <label for="email" class=" form-label">Email :</label>
                        <input type="email" class="form-control" id="email" name="email"
                            placeholder="Entrer votre email">
                    </div>
                    <div class=" form-group">
                        <label for="nom_facebook" class=" form-label">Nom Facebook :</label>
                        <input type="text" class="form-control" id="nom_facebook"
                            placeholder="Entrer votre Nom facebook" name="nom_facebook" required>
                    </div>
                    <div class=" form-group">
                        <select name="genre" id="genre" class=" form-select" required>
                            <option value="">Sélectionner le genre</option>
                            <option value="masculin">Masculin</option>
                            <option value="féminin">Féminin</option>
                        </select>
                    </div>
                    <div class=" form-group mt-3">
                        <button class=" btn btn-primary" name="ajouter">Ajouter <i
                                class=" fa-solid fa-add"></i></button>
                    </div>
                </form>
            </div>


            <div class="col">
                <h1 class="text-center ">Liste des membres</h1>
                <div class="table-responsive">
                    <form action="../../data_php/data.php?action=recherche" method="post" class="d-flex mt-3"
                        role="search">
                        <input class="form-control me-2" type="search" name="search" placeholder="Rechercher..."
                            aria-label="Search" required />
                        <button class="btn btn-success" type="submit">Rechercher</button>
                    </form>
                    <?php if (isset($_SESSION['search_results'])) : ?>
                    <a href="../../views/acceuil/acceuil.php" class=" mt-3">Retour à la liste</a>
                    <?php unset($_SESSION['search_results']); ?>
                    <?php endif; ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Prenom</th>
                                <th>Age</th>
                                <th>Email</th>
                                <th>Nom Facebook</th>
                                <th>Genre</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($all_membres as $membre) : ?>
                            <tr>
                                <td class=" text-capitalize"><?= $membre['nom'] ?></td>
                                <td class=" text-capitalize"><?= $membre['prenom'] ?></td>
                                <td><?= $membre['age'] ?></td>
                                <td><?= $membre['email'] ?></td>
                                <td><?= $membre['nom_facebook'] ?></td>
                                <td><?= $membre['genre'] ?></td>
                                <td>
                                    <a href="../../data_php/data.php?action=edit&id=<?= $membre['id'] ?>"
                                        class="btn btn-success"><i class="fa-solid fa-edit"></i></a>
                                    <a href="../../data_php/data.php?action=delete&id=<?= $membre['id'] ?>"
                                        class=" btn btn-danger"
                                        onclick=" return confirm('vous voulez le supprimer ?')"><i
                                            class="fa-solid fa-trash"></i></a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="../../assets/js/jquery.js"></script>
    <script src="../../assets/js/bootstrap.js"></script>
    <script src="../../assets/js/icon.js"></script>
</body>

</html>