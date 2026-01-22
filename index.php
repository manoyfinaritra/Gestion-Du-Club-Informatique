<?php
include "./controller/Insription_controller.php";
include "./controller/Acceuil_controller.php";
$data_acceuil = new Acceuil_controller();
$data = new Insription_controller();

if (isset($_GET['action'])) {
    if ($_GET['action'] == "insert") {
        $data->insert();
    }
    if ($_GET['action'] == "connexion") {
        $data->verify_connexion();
    }
    if ($_GET['action'] == "insert_membres") {
        $data_acceuil->insert_membres();
    }
    if ($_GET['action'] == "delete") {
        $data_acceuil->delete();
    }
    if ($_GET['action'] == "edit") {
        $data_acceuil->edit();
        require_once("./view/modifier.php");
    }
    if ($_GET['action'] == "update") {
        $data_acceuil->update();
    }
    if ($_GET['action'] == "deconnexion") {
        $data_acceuil->deconnexion();
    }
} elseif (isset($_GET['page'])) {
    if ($_GET['page'] == "inscription") {
        $message = "insertion reussi";
        header("location:http://localhost/club_informatique/view/inscription1.php?message=$message");
    }
    if ($_GET['page'] == "connexion" && $_GET['message'] == "succes") {
        require_once("./view/acceuil.php");
    }
    if ($_GET['page'] == "connexion" && $_GET['message'] == "erreur") {
        header("location:http://localhost/club_informatique/view/connexion.php?erreur=true");
    }
    if ($_GET['page'] == "ajout_membres") {
        require_once("./view/acceuil.php");
    }
    if ($_GET['page'] == "delete_membre") {
        require_once("./view/acceuil.php");
    }
    if ($_GET['page'] == "update_membre") {
        require_once("./view/acceuil.php");
    }
    if ($_GET['page'] == "deconnexion") {
        require_once("./view/connexion.php");
    }
    if ($_GET['page'] == "annulermodification") {
        require_once("./view/acceuil.php");
    }
} else {
    require("./view/connexion.php");
}