<?php session_start();
$nom_facebook = $_SESSION['nom_facebook'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/css/icon.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Nom facebook</th>
                                <th>action</th>
                                </ttr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>manoy</td>
                                <td>finaritra</td>
                                <td>
                                    <a href="#" class="btn btn-success">modifer</a>
                                    <a href="#" class=" btn btn-danger">supprimer</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/js/bootstrap.js"></script>
</body>

</html>