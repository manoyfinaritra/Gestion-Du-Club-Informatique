<?php
include "./model/Inscription_model.php";
class Insription_controller
{
    private $db;

    public function __construct()
    {
        $this->db = new Inscription_model();
    }
    public function insert()
    {
        $nom = trim(htmlspecialchars($_POST['nom']));
        $prenom = trim(htmlspecialchars($_POST['prenom']));
        $age = trim(htmlspecialchars($_POST['age']));
        $genre = trim(htmlspecialchars($_POST['genre']));
        $nom_facebook = trim(htmlspecialchars($_POST['nom_facebook']));
        $motdepasse = trim(htmlspecialchars($_POST['motdepasse']));
        $mot_de_passe = password_hash($motdepasse, PASSWORD_DEFAULT);
        $this->db->insert($nom, $prenom, $age, $genre, $nom_facebook, $mot_de_passe);
        header("location:" . "http://localhost/club_informatique/index.php?page=inscription");
    }

    public function verify_connexion()
    {
        $nom_facebook = trim(htmlspecialchars($_POST['nom_facebook']));
        $motdepasse = trim(htmlspecialchars($_POST['motdepasse']));
        $user = $this->db->verify_connexion($nom_facebook, $motdepasse);
        if ($user) {
            session_start();
            $_SESSION['id'] = $user['id'];
            $_SESSION['nom'] = $user['nom'];
            $_SESSION['prenom'] = $user['prenom'];
            $_SESSION['nom_facebook'] = $user['nom_facebook'];
            header("location:http://localhost/club_informatique/index.php?page=connexion&message=succes");
        } else {
            header("location:http://localhost/club_informatique/index.php?page=connexion&message=erreur");
        }
    }
}