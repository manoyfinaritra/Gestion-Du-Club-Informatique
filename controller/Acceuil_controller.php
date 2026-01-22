<?php
include "../config.php";
include "./model/Acceuil_model.php";
class Acceuil_controller
{
    private $db;
    public function __construct()
    {
        $this->db = new Acceuil_model();
    }

    public function get_membres()
    {
        return $this->db->get_membres();
    }

    public function insert_membres()
    {
        $nom = trim(htmlspecialchars($_POST['nom']));
        $prenom = trim(htmlspecialchars($_POST['prenom']));
        $age = trim(htmlspecialchars($_POST['age']));
        $email = trim(htmlspecialchars($_POST['email']));
        $nom_facebook = trim(htmlspecialchars($_POST['nom_facebook']));
        $genre = trim(htmlspecialchars($_POST['genre']));
        $this->db->insert_membres($nom, $prenom, $age, $email, $nom_facebook, $genre);
        header("location:" . BASE_URL . "index.php?page=ajout_membres");
    }

    public function delete()
    {
        $id = trim(htmlspecialchars($_GET['id']));
        $this->db->delete($id);
        header("location:" . BASE_URL . "index.php?page=delete_membre");
    }
    public function edit()
    {
        $id = trim(htmlspecialchars($_GET['id']));
        return $this->db->edit($id);
    }
    public function update()
    {
        $id = trim(htmlspecialchars($_POST['id']));
        $nom = trim(htmlspecialchars($_POST['nom']));
        $prenom = trim(htmlspecialchars($_POST['prenom']));
        $age = trim(htmlspecialchars($_POST['age']));
        $email = trim(htmlspecialchars($_POST['email']));
        $nom_facebook = trim(htmlspecialchars($_POST['nom_facebook']));
        $genre = trim(htmlspecialchars($_POST['genre']));
        $this->db->update($nom, $prenom, $age, $email, $nom_facebook, $genre, $id);
        header("location:" . BASE_URL . "index.php?page=update_membre");
    }
    public function deconnexion()
    {
        session_start();
        session_destroy();
        header("location:" . BASE_URL . "index.php?page=deconnexion");
    }
    public function recherche()
    {
        $recherche = trim(htmlspecialchars($_POST['search']));
        
        $stmt = $this->db->recherche($recherche,$recherche,$recherche,$recherche);
        
        session_start();
        $_SESSION["search_results"] = $stmt;
        header("location:". BASE_URL . "index.php?page=recherche");
    }
}