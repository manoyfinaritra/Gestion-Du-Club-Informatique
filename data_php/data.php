<?php
class Data
{
  private $conn;

  public function __construct()
  {
    try {
      $this->conn = new PDO("mysql:host=localhost;dbname=club_informatique", "root", "");
      $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
    }
  }

  public function insert($nom, $prenom, $age, $genre, $nom_facebook, $mot_de_passe)
  {
    $sql = "INSERT INTO membres (nom, prenom, age, genre, nom_facebook, mot_de_passe) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute([$nom, $prenom, $age, $genre, $nom_facebook, $mot_de_passe]);
  }


  public function verify_connexion($utilisateur,$mot_de_passe){
    
  }
 
}
$message = "";
$data = new Data();
if (isset($_POST["inscription"])) {
 
  $nom = trim(htmlspecialchars($_POST["nom"]));
  $prenom = trim(htmlspecialchars($_POST["prenom"]));
  $age = trim(htmlspecialchars($_POST["age"]));
  $genre = trim(htmlspecialchars($_POST["genre"]));
  $nom_facebook = trim(htmlspecialchars($_POST["nom_facebook"]));
  $mot_de_passe = trim(htmlspecialchars($_POST["motdepasse"]));


  

  // Sécurisation du mot de passe
  // $mot_de_passe_hash = password_hash($mot_de_passe, PASSWORD_DEFAULT);
  $mot_de_passe = password_hash($mot_de_passe, PASSWORD_DEFAULT);
  $data->insert($nom, $prenom, $age, $genre, $nom_facebook, $mot_de_passe);
  $message = "Inscription réussie !";
  header("Location: ../inscription.php?message=" . urlencode($message));
} 