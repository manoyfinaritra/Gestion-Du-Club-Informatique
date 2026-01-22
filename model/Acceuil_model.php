<?php
class Acceuil_model
{
  private $db;
  public function __construct()
  {
    $this->db = new PDO("mysql:host=localhost;dbname=club_informatique", "root", "");
  }

  public function get_membres()
  {
    $sql = "SELECT * FROM AddMembres";
    $stmt = $this->db->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function insert_membres($nom, $prenom, $age, $email, $nom_facebook, $genre)
  {
    $sql = "INSERT INTO AddMembres (nom,prenom,age,email,nom_facebook,genre) VALUES(?,?,?,?,?,?)";
    $stmt = $this->db->prepare($sql);
    $stmt->execute([$nom, $prenom, $age, $email, $nom_facebook, $genre]);
  }
  public function delete($id)
  {
    $sql = "DELETE FROM AddMembres WHERE id = ? ";
    $stmt = $this->db->prepare($sql);
    $stmt->execute([$id]);
  }
  public function edit($id)
  {
    $sql = "SELECT * FROM AddMembres WHERE id = ?";
    $stmt = $this->db->prepare($sql);
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }
  public function update($nom, $prenom, $age, $email, $nom_facebook, $genre, $id)
  {
    $sql = "UPDATE  AddMembres SET nom = ?, prenom = ?, age = ?, email = ?, nom_facebook = ?, genre = ? WHERE id = ? ";
    $stmt = $this->db->prepare($sql);
    $stmt->execute([$nom, $prenom, $age, $email, $nom_facebook, $genre, $id]);
  }
  public function recherche($nom, $prenom, $age, $nom_facebook)
  {
    $sql = "SELECT * FROM AddMembres WHERE nom LIKE ? OR prenom LIKE ? OR age LIKE ? OR nom_facebook LIKE ?";
    $stmt = $this->db->prepare($sql);
    $stmt->execute([
      "%$nom%",
      "%$prenom%",
      "%$age%",
      "%$nom_facebook%"
    ]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
}
