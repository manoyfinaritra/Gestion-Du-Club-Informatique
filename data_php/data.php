<?php
class Data
{
  private $conn;

  public function __construct()
  { 
    $DB_HOST = getenv("DB_HOST") ?: "localhost";
    $DB_NAME = getenv("DB_NAME") ?: "club_informatique";
    $DB_USER = getenv("DB_USER") ?: "root";
    $DB_PWD = getenv("DB_PWD") ?: "";

    try {
      $this->conn = new PDO("mysql:host=".$DB_HOST.";dbname=".$DB_NAME, $DB_USER, $DB_PWD);
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


  public function verify_connexion($utilisateur, $mot_de_passe)
  {
    $sql = "SELECT * FROM membres WHERE nom_facebook = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute([$utilisateur]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($user && password_verify($mot_de_passe, $user['mot_de_passe'])) {
      return $user;
    }
    return false;
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
if (isset($_POST['connexion'])) {
  $nom_facebook = trim(htmlspecialchars($_POST['nom_facebook']));
  $mot_de_passe = trim(htmlspecialchars($_POST['motdepasse']));

  $user = $data->verify_connexion($nom_facebook, $mot_de_passe);
  if ($user) {
    // Connexion réussie, vous pouvez démarrer une session ou rediriger
    session_start();
    $_SESSION['nom'] = $user['nom'];
    $_SESSION['prenom'] = $user['prenom'];
    $_SESSION['age'] = $user['age'];
    $_SESSION['nom_facebook'] = $user['nom_facebook'];
    
    header("location: ../acceuil/acceuil.php");
  
    exit();
  } else {
    $message = "Nom d'utilisateur ou mot de passe incorrect.";
    header("Location: ../connexion.php?message=" . urlencode($message));
    exit();
  }
}