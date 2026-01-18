<?php
require_once __DIR__ . '/Data.php';
class Data_acceuil extends Data
{
    public function __construct()
    {
        parent::__construct();
    }

    public function insertion($nom, $prenom, $age, $email, $nom_facebook, $genre)
    {
        $sql = "INSERT INTO AddMembres(nom,prenom,age,email,nom_facebook,genre) VALUES (?,?,?,?,?,?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$nom, $prenom, $age, $email, $nom_facebook, $genre]);
    }
}