<?php session_start();
$nom_facebook = $_SESSION['nom_facebook'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>hello <?= $nom_facebook ?></h1>
</body>

</html>