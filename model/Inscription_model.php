<?php 
class Inscription_model 
{
    private $db;
    public function __construct()
    {
       $this->db = new PDO("mysql:host=localhost;dbname=club_informatique","root","");
    }

    public function insert($nom,$prenom,$age,$genre,$nom_facebook,$mot_de_passe){
        $sql = "INSERT INTO users (nom,prenom,age,genre,nom_facebook,mot_de_passe) VALUE (?,?,?,?,?,?)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$nom,$prenom,$age,$genre,$nom_facebook,$mot_de_passe]);
    }
    public function verify_connexion($nom_facebook, $mot_de_passe)
  {
    $sql = "SELECT * FROM users WHERE nom_facebook = ?";
    $stmt = $this->db->prepare($sql);
    $stmt->execute([$nom_facebook]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($user && password_verify($mot_de_passe, $user['mot_de_passe'])) {
      return $user;
    }
    return false;
  }
}