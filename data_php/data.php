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

  public function getConnection()
  {
    return $this->conn;
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


  // Vérifier si le nom_facebook existe déjà
  $sql = "SELECT COUNT(*) FROM membres WHERE nom_facebook = ?";
  $stmt = $data->getConnection()->prepare($sql);
  $stmt->execute([$nom_facebook]);
  $count = $stmt->fetchColumn();

  if ($count > 0) {
    $message = "Ce nom Facebook existe déjà.";
    header("Location: ../inscription.php?message=" . urlencode($message));
    exit();
  }

  // Sécurisation du mot de passe
  $mot_de_passe = password_hash($mot_de_passe, PASSWORD_DEFAULT);
  $data->insert($nom, $prenom, $age, $genre, $nom_facebook, $mot_de_passe);
  $message = "Inscription réussie !";
  header("Location: ../inscription.php?message=" . urlencode($message));
  exit();
}
if (isset($_POST['connexion'])) {
  $nom_facebook = trim(htmlspecialchars($_POST['nom_facebook']));
  $mot_de_passe = trim(htmlspecialchars($_POST['motdepasse']));

  $user = $data->verify_connexion($nom_facebook, $mot_de_passe);
  if ($user) {
    // Connexion réussie, vous pouvez démarrer une session ou rediriger
    session_start();
    $_SESSION['user'] = $user;
    header("Location: ../index.php?message=" . urlencode("Connexion réussie !"));
    exit();
  } else {
    $message = "Nom d'utilisateur ou mot de passe incorrect.";
    header("Location: ../index.php?message=" . urlencode($message));
    exit();
  }
}
